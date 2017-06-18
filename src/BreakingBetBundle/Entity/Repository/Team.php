<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity\Team as TeamEntity;

class Team extends EntityRepository
{
    /**
     * @return TeamEntity
     */
    public function getLast()
    {

    }
}