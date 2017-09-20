<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Dto\Request;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestFactoryInterface;

final class RequestFactory implements InternalRequestFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createRequest()
    {
        return new Request();
    }
}