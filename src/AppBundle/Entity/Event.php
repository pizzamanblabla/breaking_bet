<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Event")
 * @ORM\Table(name="event")
 */
class Event extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_first_id", referencedColumnName="id", nullable=true)
     * @var Team
     */
    private $teamFirst;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_second_id", referencedColumnName="id", nullable=true)
     * @var Team
     */
    private $teamSecond;

    /**
     * @ORM\Column(type="string", name="code", length=255, nullable=false)
     * @var string
     */
    private $code;

    /**
     * @ORM\Column(type="datetime", name="date", nullable=false)
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Chain")
     * @ORM\JoinColumn(name="chain_id", referencedColumnName="id", nullable=true)
     * @var Chain
     */
    private $chain;

    /**
     * Set teamFirst
     *
     * @param Team $teamFirst
     *
     * @return Event
     */
    public function setTeamFirst(Team $teamFirst)
    {
        $this->teamFirst = $teamFirst;

        return $this;
    }

    /**
     * Get teamFirst
     *
     * @return Team
     */
    public function getTeamFirst()
    {
        return $this->teamFirst;
    }

    /**
     * Set teamSecond
     *
     * @param Team $teamSecond
     *
     * @return Event
     */
    public function setTeamSecond(Team $teamSecond)
    {
        $this->teamSecond = $teamSecond;

        return $this;
    }

    /**
     * Get teamSecond
     *
     * @return Team
     */
    public function getTeamSecond()
    {
        return $this->teamSecond;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Event
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getName()
    {
        return $this->code;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Event
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
     * @return Chain
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * @param Chain $chain
     * @return Event
     */
    public function setChain($chain)
    {
        $this->chain = $chain;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
