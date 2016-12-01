<?php

namespace  AppBundle\Interaction\Dto\Response;

use AppBundle\Internal\Enum\ResponseType;

interface ApiResponseInterface
{
    /**
     * @return ResponseType
     */
    public function obtainType();
}
