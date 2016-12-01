<?php

namespace AppBundle\Interaction\Dto\Response;

use AppBundle\Internal\Enum\ResponseType;

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
