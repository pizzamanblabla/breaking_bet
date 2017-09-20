<?php

namespace BreakingBetBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Bet")
 * @ORM\Table(name="bet")
 */
class Bet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="bet_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", name="date", nullable=false)
     */
    private $date;

    /**
     *  @var Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=true)
     */
    private $event;

    /**
     * @var Coefficient[]
     *
     * @ORM\OneToMany(targetEntity="Coefficient", mappedBy="bet")
     **/
    private $coefficients;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Bet
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return Bet
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     * @return Bet
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return Coefficient[]
     */
    public function getCoefficients()
    {
        return $this->coefficients;
    }

    /**
     * @param Coefficient[] $coefficients
     * @return Bet
     */
    public function setCoefficients(array $coefficients)
    {
        $this->coefficients = $coefficients;
        return $this;
    }
}
