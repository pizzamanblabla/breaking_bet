<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity;

class Coefficient extends EntityRepository
{
    /**
     * @param Entity\Event $event
     * @param string $type
     * @return Entity\Coefficient|null
     */
    public function getLastByEventAndType(Entity\Event $event, string $type)
    {
        $queryBuilder = $this->createQueryBuilder('c');

        $queryBuilder
            ->select('c')
            ->setMaxResults(1)
            ->leftJoin('c.bet', 'b')
            ->where('c.coefficientType = :type')
            ->andWhere('b.event = :event')
            ->setParameter('type', $type)
            ->setParameter('event', $event)
            ->orderBy('b.date', 'DESC')
        ;

        $results = $queryBuilder->getQuery()->getResult();

        return
            is_array($results) && count($results)
                ? $results[0]
                : null;
    }

    /**
     * @param Entity\Event $event
     * @param int $limit
     * @param string $type
     * @return Entity\Coefficient[]
     */
    public function getLastByEventAndTypeWithLimit(Entity\Event $event, int $limit, string $type)
    {
        $queryBuilder = $this->createQueryBuilder('c');

        $queryBuilder
            ->select('c')
            ->setMaxResults($limit)
            ->leftJoin('c.bet', 'b')
            ->where('c.coefficientType = :type')
            ->andWhere('b.event = :event')
            ->setParameter('event', $event)
            ->setParameter('type', $type)
            ->orderBy('b.date', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}