<?php

namespace  BreakingBetBundle\Interaction\Dto\Response;

use BreakingBetBundle\Internal\Enum\ResponseType;

interface ApiResponseInterface
{
    /**
     * @return ResponseType
     */
    public function obtainType();
}
