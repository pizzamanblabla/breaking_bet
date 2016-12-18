<?php

namespace AppBundle\Interaction\Transport;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

interface TransportInterface
{
    public function dispatch(ApiRequestInterface $request);
}