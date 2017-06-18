<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity\Coefficient as CoefficientEntity;

class Coefficient extends EntityRepository
{
    /**
     * @return CoefficientEntity
     */
    public function getLast()
    {

    }
}