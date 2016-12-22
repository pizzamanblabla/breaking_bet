<?php

namespace AppBundle\Operation\Common\Dto\Response;

use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Dto\Response\Erroneous;

class EmptyErrorResponse implements ApiResponseInterface
{
    use Erroneous;
}
