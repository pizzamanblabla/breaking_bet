<?php

namespace BreakingBetBundle\Entity\Repository;

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
}