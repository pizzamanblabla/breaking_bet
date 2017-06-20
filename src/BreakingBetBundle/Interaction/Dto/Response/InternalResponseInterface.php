<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Interaction\Enum\ResponseType;

interface InternalResponseInterface
{
    /**
     * @return ResponseType
     */
    public function getType();
}