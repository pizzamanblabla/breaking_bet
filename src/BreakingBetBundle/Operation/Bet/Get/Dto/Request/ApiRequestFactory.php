<?php

namespace BreakingBetBundle\Operation\Bet\Get\Dto\Request;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestFactoryInterface;
use BreakingBetBundle\Operation\Bet\Get\Dto\Request\Type\ApiRequestType;

class ApiRequestFactory implements ApiRequestFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        return new ApiRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestType()
    {
        return new ApiRequestType();
    }
}