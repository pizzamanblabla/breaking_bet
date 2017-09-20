<?php

namespace BreakingBetBundle\Interaction\RemoteCall;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptyInternalErroneousResponse;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

final class Chain implements RemoteCallInterface
{
    use LoggerAwareTrait;

    /**
     * @var RemoteCallInterface[]
     */
    private $container;

    /**
     * @param RemoteCallInterface[] $container
     * @param LoggerInterface $logger
     */
    public function __construct(array $container, LoggerInterface $logger) {
        $this->setLogger($logger);

        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function call(InternalRequestInterface $request): InternalResponseInterface
    {
        foreach ($this->container as $remoteCall) {
            $response = $remoteCall->call($request);

            if ($response->getType()->isSuccessful()) {
                return $response;
            }

            $this->logger->warning('Unsuccessful response received.');
        }

        return new EmptyInternalErroneousResponse();
    }
}