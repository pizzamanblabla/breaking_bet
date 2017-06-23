<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\Dto\Response\Successful;

class SuccessfulResponse implements InternalResponseInterface
{
    use Successful;

    /**
     * @var Kind[]
     */
    private $kinds;
}