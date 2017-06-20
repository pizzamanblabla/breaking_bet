<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

interface ResponseFactoryInterface
{
    /**
     * @return InternalResponseInterface
     */
    public function createResponse();
}