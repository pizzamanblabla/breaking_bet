<?php

namespace BreakingBetBundle\Interaction\DataUpdater;

use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;

interface DataUpdaterInterface
{
    /**
     * @param InternalResponseInterface $response
     * @return void
     */
    public function update(InternalResponseInterface $response);
}