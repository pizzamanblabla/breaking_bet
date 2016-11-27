<?php

namespace AppBundle\Operation\Bet\Get\Dto\Response;

use AppBundle\Entity\Bet;

class ApiResponse
{
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