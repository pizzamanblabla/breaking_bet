<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity\Chain as ChainEntity;

class Chain extends EntityRepository
{
    /**
     * @return ChainEntity[]
     */
    public function findAll()
    {
        return $this->findBy([], ['id' => 'DESC']);
    }
}