<?php

namespace BreakingBetBundle\Interaction\RemoteCall;

use BreakingBetBundle\Interaction\Dto\Response\ResponseFactoryInterface;
use GuzzleHttp\ClientInterface;
use BreakingBetBundle\DataExtractor\DataExtractorInterface;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\RequestAssembler\RequestAssemblerInterface;
use BreakingBetBundle\Internal\ObjectBuilder\Exception\InvalidObjectException;
use BreakingBetBundle\Internal\ObjectBuilder\ObjectBuilderInterface;
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
     * @var DataExtractorInterface
     */
    private $dataExtractor;

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
     * @param DataExtractorInterface $dataExtractor
     * @param ObjectBuilderInterface $objectBuilder
     * @param ResponseFactoryInterface $responseFactory
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     */
    public function __construct(
        RequestAssemblerInterface $requestAssembler,
        ClientInterface $client,
        DataExtractorInterface $dataExtractor,
        ObjectBuilderInterface $objectBuilder,
        ResponseFactoryInterface $responseFactory,
        ValidatorInterface $validator,
        LoggerInterface $logger
    ) {
        $this->setLogger($logger);

        $this->requestAssembler = $requestAssembler;
        $this->client = $client;
        $this->dataExtractor = $dataExtractor;
        $this->objectBuilder = $objectBuilder;
        $this->responseFactory = $responseFactory;
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function call(InternalRequestInterface $request)
    {
        $this->logger->info('Trying to build http request');
        $httpRequest = $this->requestAssembler->assemble($request);

        $this->logger->info('Sending remote request');
        $httpResponse = $this->client->send($httpRequest);

        $this->logger->info('Extracting data from http response');
        $extracted = $this->dataExtractor->extract($httpResponse);

        $this->logger->info('Building internal request');
        return $this->buildInternalRequest($extracted);
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
}