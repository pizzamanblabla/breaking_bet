<?php

namespace AppBundle\Operation\Bet\Get\Dto\Response;

use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Dto\Response\Successful;
use AppBundle\Internal\Container;

class ApiResponse implements ApiResponseInterface
{
    use Successful, Container;
}
