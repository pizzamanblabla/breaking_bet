<?php

namespace BreakingBetBundle\Operation\Notification\Service;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;
use BreakingBetBundle\Interaction\Transformer\Internal\TransformerInterface;
use BreakingBetBundle\Interaction\Transport\TransportInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
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
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        $apiResponse = $this->service->behave($request);

        $this->logger->info('Transforming to notification request');
        $apiRequest = $this->transformer->transform($apiResponse);

        $this->logger->info('Dispatching notification');
        $this->transport->dispatch($apiRequest);

        return $apiResponse;
    }
}