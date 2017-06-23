<?php

namespace BreakingBetBundle\Operation\Bet\Get\Dto\Response;

use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;
use BreakingBetBundle\Interaction\Dto\Response\Successful;

class ApiResponse implements ApiResponseInterface
{
    use Successful;

    /**
     * @var Bet[]
     */
    private $bets;

    /**
     * @return Bet[]
     */
    public function getBets()
    {
        return $this->bets;
    }

    /**
     * @param Bet[] $bets
     * @return ApiResponse
     */
    public function setBets(array $bets)
    {
        $this->bets = $bets;
        return $this;
    }
}