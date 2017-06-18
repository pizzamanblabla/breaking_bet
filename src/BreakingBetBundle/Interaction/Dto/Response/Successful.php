<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Internal\Enum\ResponseType;

trait Successful
{
    /**
     * @return ResponseType
     */
    public function obtainType()
    {
        return ResponseType::successful();
    }
}
