<?php

namespace BreakingBetBundle\Interaction\RemoteCall;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;

interface RemoteCallInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return
     */
    public function call(InternalRequestInterface $request);
}