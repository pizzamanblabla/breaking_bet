<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Sport as SportEntity;

class Sport extends EntityRepository
{
    /**
     * @return SportEntity
     */
    public function getLast()
    {

    }
}