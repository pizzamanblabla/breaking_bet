<?php

namespace AppBundle\DataMigrator;

use AppBundle\Entity\Bet as BetEntity;
use AppBundle\Entity\Event as EventEntity;

class Bet extends BaseDataMigrator
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var EventEntity
     */
    private $event;

    /**
     * @return BetEntity
     */
    public function migrate()
    {
        $entity = (new BetEntity())
            ->setDate($this->date)
            ->setEvent($this->event)
        ;

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        return $entity;
    }

    /**
     * @param \DateTime $date
     * @return Bet
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param EventEntity $event
     * @return Bet
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }
}