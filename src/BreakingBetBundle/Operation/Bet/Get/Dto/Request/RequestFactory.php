<?php

namespace BreakingBetBundle\Operation\Bet\Get\Dto\Request;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestFactoryInterface;

final class RequestFactory implements InternalRequestFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        return new ApiRequest();
    }
}