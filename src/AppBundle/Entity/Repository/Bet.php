<?php

namespace AppBundle\Entity\Repository\Bet;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Bet as BetEntity;

class Bet extends EntityRepository
{
    /**
     * @return BetEntity
     */
    public function getLast()
    {

    }
}