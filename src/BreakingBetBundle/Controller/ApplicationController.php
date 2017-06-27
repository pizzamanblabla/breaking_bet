<?php

namespace BreakingBetBundle\Controller;

use BreakingBetBundle\Enumeration\ResponseType;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Transformer\Request\TransformerInterface as HttpToInternalRequestTransformerInterface;
use BreakingBetBundle\Interaction\Transformer\Response\TransformerInterface as InternalToHttpResponseTransformerInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;

final class ApplicationController extends Controller
{
    /**
     * @var HttpToInternalRequestTransformerInterface
     */
    private $httpToInternalRequestTransformer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @var InternalToHttpResponseTransformerInterface
     */
    private $internalToHttpResponseTransformer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param HttpToInternalRequestTransformerInterface $httpToInternalRequestTransformer
     * @param ValidatorInterface $validator
     * @param ServiceInterface $service
     * @param InternalToHttpResponseTransformerInterface $internalToHttpResponseTransformer
     * @param LoggerInterface $logger
     */
    public function __construct(
        HttpToInternalRequestTransformerInterface $httpToInternalRequestTransformer,
        ValidatorInterface $validator,
        ServiceInterface $service,
        InternalToHttpResponseTransformerInterface $internalToHttpResponseTransformer,
        LoggerInterface $logger
    ) {
        $this->httpToInternalRequestTransformer = $httpToInternalRequestTransformer;
        $this->validator = $validator;
        $this->service = $service;
        $this->internalToHttpResponseTransformer = $internalToHttpResponseTransformer;
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function operationAction(Request $request)
    {
        try {
            $this->logger->info('Transforming request to inner entity');
            $apiRequest = $this->httpToInternalRequestTransformer->transform($request);

            $this->logger->info('Validating request');
            $this->validateApiRequest($apiRequest);

            $this->logger->info('Executing operation');
            $apiResponse = $this->service->behave($apiRequest);

            $this->logger->info('Transforming response to http response');
            return $this->internalToHttpResponseTransformer->transform($apiResponse);
        } catch (Throwable $e) {
            return $this->createErroneousResponse($e);
        }
    }

    /**
     * @param InternalRequestInterface $apiRequest
     * @return void
     * @throws ValidatorException
     */
    private function validateApiRequest(InternalRequestInterface $apiRequest)
    {
        $errors = $this->validator->validate($apiRequest);

        if (count($errors) > 0) {
            throw new ValidatorException((string)$errors);
        }
    }

    /**
     * @param Throwable $e
     * @return JsonResponse
     */
    private function createErroneousResponse(Throwable $e)
    {
        return
            new JsonResponse(
                [
                    'type' => ResponseType::EXCEPTIONAL,
                    'message' => $e->getMessage(),
                ]
            );
    }
}
