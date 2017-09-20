<?php

namespace BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Enumeration\ResponseType;

trait Successful
{
    /**
     * @return ResponseType
     */
    public function getType()
    {
        return ResponseType::successful();
    }
}