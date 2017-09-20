<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity;

class Chain extends EntityRepository
{
    /**
     * @return Entity\Chain[]
     */
    public function findAllWithOrderDesc()
    {
        return $this->findBy([], ['id' => 'DESC']);
    }
}