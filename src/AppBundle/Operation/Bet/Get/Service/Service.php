<?php

namespace AppBundle\Operation\Bet\Get\Service;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Operation\Bet\Get\Dto\Request\ApiRequest;
use AppBundle\Internal\Service\ServiceInterface;

class Service implements ServiceInterface
{
    /**
     * @param ApiRequestInterface|ApiRequest $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        var_dump($request);
        die;
    }
}