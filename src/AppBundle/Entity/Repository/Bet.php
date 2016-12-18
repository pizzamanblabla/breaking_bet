<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Operation\Bet\Get\Dto\Request\ApiRequest;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Bet as BetEntity;
use DateTime;

class Bet extends EntityRepository
{
    /**
     * @param DateTime $from
     * @param DateTime $to
     * @return BetEntity[]
     */
    public function findByTimeSpan(DateTime $from, DateTime $to)
    {
        $queryBuilder = $this->createQueryBuilder('b');

        $queryBuilder->where('b.date BETWEEN :from AND :to')
            ->setParameter('from', $from->format('Y-m-d H:i:s'))
            ->setParameter('to', $to->format('Y-m-d H:i:s'))
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param ApiRequest $apiRequest
     * @return BetEntity[]
     */
    public function findByApiRequest(ApiRequest $apiRequest)
    {
        $queryBuilder = $this->createQueryBuilder('b');

        $queryBuilder
            ->leftJoin('b.event','e')
            ->leftJoin('e.chain', 'c')
            ->leftJoin('c.sport', 's')
            ->where('b.date BETWEEN :from AND :to')
            ->setParameter('from', $apiRequest->getDateFrom()->format('Y-m-d H:i:s'))
            ->setParameter('to', $apiRequest->getDateTo()->format('Y-m-d H:i:s'))
        ;

        if (!empty($apiRequest->getSport())) {
            $queryBuilder
                ->andWhere('s.id=:sport')
                ->setParameter('sport', $apiRequest->getSport());
        }

        if (!empty($apiRequest->getChain())) {
            $queryBuilder
                ->andWhere('c.id=:chain')
                ->setParameter('chain', $apiRequest->getChain());
        }

        $queryBuilder->orderBy('b.date', 'DESC');

        return $queryBuilder->getQuery()->getResult();
    }
}