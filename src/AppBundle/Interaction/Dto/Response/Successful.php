<?php

namespace AppBundle\Interaction\Dto\Response;

use AppBundle\Internal\Enum\ResponseType;

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
