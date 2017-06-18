<?php

namespace BreakingBetBundle\DataMigrator;

use BreakingBetBundle\Entity\Event as EventEntity;
use BreakingBetBundle\Entity\Team as TeamEntity;
use BreakingBetBundle\Entity\Chain as ChainEntity;

class Event extends BaseDataMigrator
{
    /**
     * @var TeamEntity
     */
    private $teamFirst;

    /**
     * @var TeamEntity
     */
    private $teamSecond;

    /**
     * @var string
     */
    private $code;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var ChainEntity
     */
    private $chain;

    /**
     * @return EventEntity
     */
    public function migrate()
    {
        $entity = (new EventEntity())
            ->setCode($this->code)
            ->setChain($this->chain)
            ->setDate($this->date)
            ->setChain($this->chain)
        ;

        if (!is_null($this->teamSecond)) {
            $entity->setTeamSecond($this->teamSecond);
        }

        if (!is_null($this->teamFirst)) {
            $entity->setTeamFirst($this->teamFirst);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);

        return $entity;
    }

    /**
     * @return EventEntity
     */
    public function get()
    {
        $repository = $this->getDoctrine()->getRepository('BreakingBetBundle:Event');

        return
            !is_null($repository->findOneByCode($this->code))
                ? $repository->findOneByCode($this->code)
                : $this->migrate();
    }

    /**
     * @param TeamEntity $teamFirst
     * @return Event
     */
    public function setTeamFirst($teamFirst)
    {
        $this->teamFirst = $teamFirst;
        return $this;
    }

    /**
     * @param TeamEntity $teamSecond
     * @return Event
     */
    public function setTeamSecond($teamSecond)
    {
        $this->teamSecond = $teamSecond;
        return $this;
    }

    /**
     * @param string $code
     * @return Event
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param ChainEntity $chain
     * @return Event
     */
    public function setChain($chain)
    {
        $this->chain = $chain;
        return $this;
    }
}