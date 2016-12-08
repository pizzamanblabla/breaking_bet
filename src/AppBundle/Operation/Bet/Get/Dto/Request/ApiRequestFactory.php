<?php

namespace AppBundle\Operation\Bet\Get\Dto\Request;

use AppBundle\Interaction\Dto\Request\ApiRequestFactoryInterface;
use AppBundle\Operation\Bet\Get\Dto\Request\Type\ApiRequestType;

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