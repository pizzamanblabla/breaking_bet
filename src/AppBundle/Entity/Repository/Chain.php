<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Chain as ChainEntity;

class Chain extends EntityRepository
{
    /**
     * @return ChainEntity
     */
    public function getLast()
    {

    }
}