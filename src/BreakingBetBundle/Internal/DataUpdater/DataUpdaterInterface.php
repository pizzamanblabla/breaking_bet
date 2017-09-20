<?php

namespace BreakingBetBundle\Internal\DataUpdater;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;

interface DataUpdaterInterface
{
    /**
     * @param InternalRequestInterface $request
     * @param InternalResponseInterface $response
     * @return void
     */
    public function update(InternalRequestInterface $request, InternalResponseInterface $response);
}