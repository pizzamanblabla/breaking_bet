<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity\Sport as SportEntity;

class Sport extends EntityRepository
{
    /**
     * @return SportEntity
     */
    public function getLast()
    {

    }
}