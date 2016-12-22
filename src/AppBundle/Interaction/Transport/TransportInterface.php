<?php

namespace AppBundle\Interaction\Transport;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

interface TransportInterface
{
    /**
     * @param ApiRequestInterface $request
     * @return mixed
     */
    public function dispatch(ApiRequestInterface $request);
}
