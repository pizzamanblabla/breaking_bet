<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity;

class Event extends EntityRepository
{
    /**
     * @param Entity\Kind $kind
     * @return Entity\Event[]
     */
    public function getAllActiveByKind(Entity\Kind $kind)
    {
        $queryBuilder = $this->createQueryBuilder('e');

        $queryBuilder
            ->select('e')
            ->leftJoin('e.chain', 'c')
            ->where('c.kind = :kind')
            ->setParameter('kind', $kind)
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}