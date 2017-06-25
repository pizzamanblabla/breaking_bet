<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Enumeration\ResponseType;

interface InternalResponseInterface
{
    /**
     * @return ResponseType
     */
    public function getType();
}