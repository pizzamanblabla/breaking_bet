<?php

namespace AppBundle\Controller;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Transformer\Request\TransformerInterface as HttpToApiRequestTransoformerInterface;
use AppBundle\Interaction\Transformer\Response\TransformerInterface as ApiToHttpResponseTransoformerInterface;
use AppBundle\Internal\Exception\ValidationException;
use AppBundle\Internal\Service\ServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiController extends Controller
{
    /**
     * @var HttpToApiRequestTransoformerInterface
     */
    private $httpToApiRequestTransformer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @var ApiToHttpResponseTransoformerInterface
     */
    private $apiToHttpResponseTransformer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param HttpToApiRequestTransoformerInterface $httpToApiRequestTransformer
     * @param ValidatorInterface $validator
     * @param ServiceInterface $service
     * @param ApiToHttpResponseTransoformerInterface $apiToHttpResponseTransformer
     * @param LoggerInterface $logger
     */
    public function __construct(
        HttpToApiRequestTransoformerInterface $httpToApiRequestTransformer,
        ValidatorInterface $validator,
        ServiceInterface $service,
        ApiToHttpResponseTransoformerInterface $apiToHttpResponseTransformer,
        LoggerInterface $logger
    ) {
        $this->httpToApiRequestTransformer = $httpToApiRequestTransformer;
        $this->validator = $validator;
        $this->service = $service;
        $this->apiToHttpResponseTransformer = $apiToHttpResponseTransformer;
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function operationAction(Request $request)
    {
        $this->logger->info('Transforming request to inner entity');
        $apiRequest = $this->httpToApiRequestTransformer->transform($request);

        $this->logger->info('Validating request');
        $this->validateApiRequest($apiRequest);

        $this->logger->info('Executing operation');
        $apiResponse = $this->service->behave($apiRequest);

        $this->logger->info('Transforming response to http response');
        $this->apiToHttpResponseTransformer->transform($apiResponse);
    }

    /**
     * @param ApiRequestInterface $apiRequest
     * @return void
     * @throws ValidationException
     */
    private function validateApiRequest(ApiRequestInterface $apiRequest)
    {
        $errors = $this->validator->validate($apiRequest);

        if (count($errors) > 0) {
            throw new ValidationException((string)$errors);
        }
    }
}
