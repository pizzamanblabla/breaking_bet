<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Event as EventEntity;

class Event extends EntityRepository
{
    /**
     * @return EventEntity
     */
    public function getLast()
    {

    }
}