<?php

namespace AppBundle\Operation\Bet\Get\Service;

use AppBundle\Common\Dto\Request\ApiRequestInterface;
use AppBundle\Common\Dto\Response\ApiResponseInterface;
use AppBundle\Operation\Bet\Get\Dto\Request\ApiRequest;
use AppBundle\Service\ServiceInterface;

class Service implements ServiceInterface
{
    /**
     * @param ApiRequestInterface|ApiRequest $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        // TODO: Implement behave() method.
    }
}