<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Enumeration\ResponseType;

trait Erroneous
{
    /**
     * @return ResponseType
     */
    public function getType()
    {
        return ResponseType::erroneous();
    }
}