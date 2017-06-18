<?php

namespace BreakingBetBundle\Interaction\Transport;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;

interface TransportInterface
{
    public function dispatch(ApiRequestInterface $request);
}