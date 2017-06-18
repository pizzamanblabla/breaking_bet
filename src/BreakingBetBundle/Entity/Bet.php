<?php

namespace BreakingBetBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Bet")
 * @ORM\Table(name="bet")
 */
class Bet extends Entity
{
    /**
     * @ORM\Column(type="datetime", name="date", nullable=false)
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=true)
     * @var Event
     */
    private $event;

    /**
     * @ORM\OneToMany(targetEntity="Coefficient", mappedBy="bet")
     * @var Coefficient[]
     **/
    private $coefficients;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coefficients = new ArrayCollection();
    }

    /**
     * Set date
     *
     * @param DateTime $date
     *
     * @return Bet
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set event
     *
     * @param Event $event
     *
     * @return Bet
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Add coefficient
     *
     * @param Coefficient $coefficient
     *
     * @return Bet
     */
    public function addCoefficient($coefficient)
    {
        $this->coefficients[] = $coefficient;

        return $this;
    }

    /**
     * Remove coefficient
     *
     * @param Coefficient $coefficient
     */
    public function removeCoefficient($coefficient)
    {
        $this->coefficients->removeElement($coefficient);
    }

    /**
     * Get coefficients
     *
     * @return Collection
     */
    public function getCoefficients()
    {
        return $this->coefficients;
    }
}
