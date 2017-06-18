<?php

namespace BreakingBetBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use BreakingBetBundle\Entity\Event as EventEntity;

class Event extends EntityRepository
{
    /**
     * @return EventEntity
     */
    public function getLast()
    {

    }
}