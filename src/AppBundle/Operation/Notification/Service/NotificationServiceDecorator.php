<?php

namespace AppBundle\Operation\Notification\Service;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Transformer\Internal\TransformerInterface;
use AppBundle\Interaction\Transport\TransportInterface;
use AppBundle\Internal\Container;
use AppBundle\Internal\Service\ServiceInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

class NotificationServiceDecorator implements ServiceInterface
{
    use LoggerAwareTrait;

    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @var TransformerInterface
     */
    private $transformer;

    /**
     * @param ServiceInterface $service
     * @param TransportInterface $transport
     * @param TransformerInterface $transformer
     * @param LoggerInterface $logger
     */
    public function __construct(
        ServiceInterface $service,
        TransportInterface $transport,
        TransformerInterface $transformer,
        LoggerInterface $logger
    ) {
        $this->setLogger($logger);

        $this->service = $service;
        $this->transport = $transport;
        $this->transformer = $transformer;
    }

    /**
     * @param ApiRequestInterface $request
     * @return ApiResponseInterface|Container
     */
    public function behave(ApiRequestInterface $request)
    {
        $apiResponse = $this->service->behave($request);

        if ($apiResponse->obtainType()->isSuccessful()) {
            $this->logger->info('Transforming to notification request');
            $apiRequest = $this->transformer->transform($apiResponse);

            $this->logger->info('Dispatching notification');
            $this->transport->dispatch($apiRequest);
        }

        return $apiResponse;
    }
}
