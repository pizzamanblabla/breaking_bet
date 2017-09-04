<?php

namespace BreakingBetBundle\Operation\Bet\Update\Service;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\RemoteCall\RemoteCallInterface;
use BreakingBetBundle\Internal\DataUpdater\DataUpdaterInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Throwable;

final class Service implements ServiceInterface
{
    use LoggerAwareTrait;

    /**
     * @var RemoteCallInterface
     */
    private $remoteCall;

    /**
     * @var DataUpdaterInterface
     */
    private $dataUpdater;

    /**
     * @param RemoteCallInterface $remoteCall
     * @param DataUpdaterInterface $dataUpdater
     * @param LoggerInterface $logger
     */
    public function __construct(
        RemoteCallInterface $remoteCall,
        DataUpdaterInterface $dataUpdater,
        LoggerInterface $logger
    ) {
        $this->setLogger($logger);

        $this->remoteCall = $remoteCall;
        $this->dataUpdater = $dataUpdater;
    }

    /**
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        $response = $this->remoteCall->call($request);

        if ($response->getType()->isSuccessful()) {
            $this->logger->info('Successful response received');
            $this->dataUpdater->update($response);
        } else {
            $this->logger->info('Erroneous response received');
        }

        return $response;
    }
}
