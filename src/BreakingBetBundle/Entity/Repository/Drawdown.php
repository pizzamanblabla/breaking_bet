<?php

namespace BreakingBetBundle\Entity\Repository;

use BreakingBetBundle\Enumeration\CoefficientType;
use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity;

class Drawdown extends EntityRepository
{
    /**
     * @param Entity\Coefficient $coefficientOne
     * @param Entity\Coefficient $coefficientTwo
     * @param float $minDifference
     * @return array
     */
    public function findOneByCoefficientsAndMinDifference(
        Entity\Coefficient $coefficientOne,
        Entity\Coefficient $coefficientTwo,
        float $minDifference
    ) {
        $queryBuilder = $this->createQueryBuilder('d');

        $queryBuilder
            ->select('d')
            ->where('d.coefficientOne = :coefficientOne')
            ->andWhere('d.coefficientTwo = :coefficientTwo')
            ->andWhere('d.minDifference = :minDifference')
            ->setParameter('coefficientOne', $coefficientOne)
            ->setParameter('coefficientTwo', $coefficientTwo)
            ->setParameter('minDifference', $minDifference)
            ->setMaxResults(1)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param float $minDifference
     * @param int $limit
     * @return array
     */
    public function findAllByMinDifferenceWithLimit(float $minDifference, int $limit)
    {
        $queryBuilder = $this->createQueryBuilder('d');

        $queryBuilder
            ->select('d')
            ->where('d.minDifference >= :minDifference')
            ->setParameter('minDifference', $minDifference)
            ->setMaxResults($limit)
            ->orderBy('d.date', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param float $minDifference
     * @param int $limit
     * @param CoefficientType $type
     * @return array
     */
    public function findAllByMinDifferenceAndCoefficientTypeWithLimit(
        float $minDifference,
        int $limit,
        CoefficientType $type
    ) {
        $queryBuilder = $this->createQueryBuilder('d');

        $queryBuilder
            ->select('d')
            ->leftJoin('d.coefficientOne', 'c')
            ->where('c.coefficientType = :type')
            ->andWhere('d.minDifference >= :minDifference')
            ->setParameter('minDifference', $minDifference)
            ->setParameter('type', $type->getValue())
            ->setMaxResults($limit)
            ->orderBy('d.date', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}