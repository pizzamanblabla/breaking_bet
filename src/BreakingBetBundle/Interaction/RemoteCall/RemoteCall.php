<?php

namespace BreakingBetBundle\Interaction\RemoteCall;

use BreakingBetBundle\Interaction\Dto\Response\ResponseFactoryInterface;
use BreakingBetBundle\Internal\DataParser\DataParserInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\RequestAssembler\RequestAssemblerInterface;
use BreakingBetBundle\Internal\ObjectBuilder\Exception\InvalidObjectException;
use BreakingBetBundle\Internal\ObjectBuilder\ObjectBuilderInterface;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleTor\Middleware;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class RemoteCall implements RemoteCallInterface
{
    use LoggerAwareTrait;

    /**
     * @var RequestAssemblerInterface
     */
    private $requestAssembler;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var DataParserInterface
     */
    private $dataParser;

    /**
     * @var ObjectBuilderInterface
     */
    private $objectBuilder;

    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @param RequestAssemblerInterface $requestAssembler
     * @param ClientInterface $client
     * @param DataParserInterface $dataParser
     * @param ObjectBuilderInterface $objectBuilder
     * @param ResponseFactoryInterface $responseFactory
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     */
    public function __construct(
        RequestAssemblerInterface $requestAssembler,
        ClientInterface $client,
        DataParserInterface $dataParser,
        ObjectBuilderInterface $objectBuilder,
        ResponseFactoryInterface $responseFactory,
        ValidatorInterface $validator,
        LoggerInterface $logger
    ) {
        $this->setLogger($logger);

        $this->requestAssembler = $requestAssembler;
        $this->client = $client;
        $this->dataParser = $dataParser;
        $this->objectBuilder = $objectBuilder;
        $this->responseFactory = $responseFactory;
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function call(InternalRequestInterface $request): InternalResponseInterface
    {
        $this->logger->info('Trying to build http request');
        $httpRequest = $this->requestAssembler->assemble($request);

        $this->logger->info('Sending remote request');
        $httpResponse = $this->setUpClient()->send(
            $httpRequest,
            [
                'tor_new_identity' => true,
                'tor_new_identity_sleep' => 15,
                'tor_new_identity_timeout' => 10,
                'tor_new_identity_exception' => false,
                'tor_control_password' => 'password',
            ]
        );

        $this->logger->info('Parsing data from http response');
        $parsed = $this->dataParser->parse($httpResponse);

        if (!count($parsed)) {
            $this->logger->info('Failed. Sending unmasked remote request');
            $httpResponse = $this->client->send($httpRequest);

            $this->logger->info('Extracting data from http response');
            $parsed = $this->dataParser->parse($httpResponse);
        }

        $this->logger->info('Building internal request');
        return $this->buildInternalRequest($parsed);
    }

    /**
     * @param array $extracted
     * @return InternalResponseInterface
     * @throws InvalidObjectException
     */
    private function buildInternalRequest(array $extracted): InternalResponseInterface
    {
        $response = $this->objectBuilder->build(
            $this->responseFactory->createResponse(),
            $extracted
        );

        $errors = $this->validator->validate($response);

        if (count($errors) > 0) {
            throw new InvalidObjectException((string) $errors);
        }

        return $response;
    }

    /**
     * @return Client
     */
    private function setUpClient()
    {
        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());
        $stack->push(Middleware::tor());

        return new Client(['handler' => $stack]);
    }
}