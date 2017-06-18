<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Internal\Enum\ResponseType;

trait Erroneous
{
    /**
     * @return ResponseType
     */
    public function obtainType()
    {
        return ResponseType::erroneous();
    }
}
