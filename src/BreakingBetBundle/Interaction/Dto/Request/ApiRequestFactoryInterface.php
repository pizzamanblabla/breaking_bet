<?php

namespace BreakingBetBundle\Interaction\Dto\Request;

interface InternalRequestFactoryInterface
{
    /**
     * @return InternalRequestInterface
     */
    public function createRequest();
}