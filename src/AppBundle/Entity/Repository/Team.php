<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Team as TeamEntity;

class Team extends EntityRepository
{
    /**
     * @return TeamEntity
     */
    public function getLast()
    {

    }
}