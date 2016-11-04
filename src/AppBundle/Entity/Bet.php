<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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

//    /**
//     * @ORM\OneToMany(targetEntity="", mappedBy="cart", orphanRemoval=true, cascade={"persist", "remove"})
//     * @var ArrayCollection|CartItem[]
//     **/
//    private $coefficients;

    /**
     * Set date
     *
     * @param \DateTime $date
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
     * @return \DateTime
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
     * Constructor
     */
    public function __construct()
    {
        $this->coefficients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add coefficient
     *
     * @param  $coefficient
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
     * @param  $coefficient
     */
    public function removeCoefficient($coefficient)
    {
        $this->coefficients->removeElement($coefficient);
    }

    /**
     * Get coefficients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoefficients()
    {
        return $this->coefficients;
    }
}
