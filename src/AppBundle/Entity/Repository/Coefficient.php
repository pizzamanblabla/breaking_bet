<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Coefficient as CoefficientEntity;

class Coefficient extends EntityRepository
{
    /**
     * @return CoefficientEntity
     */
    public function getLast()
    {

    }
}