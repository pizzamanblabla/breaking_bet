<?php

namespace BreakingBetBundle\Interaction\RemoteCall;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;

interface RemoteCallInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function call(InternalRequestInterface $request): InternalResponseInterface;
}