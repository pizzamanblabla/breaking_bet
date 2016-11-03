<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(type="string", name="name", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", name="date", nullable=false)
     * @var \DateTime
     */
    private $date;

    /**
     * Set teamFirst
     *
     * @param Team $teamFirst
     *
     * @return Event
     */
    public function setTeamFirstId(Team $teamFirst)
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
    public function setTeamSecondId(Team $teamSecond)
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
     * Set name
     *
     * @param string $name
     *
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
}
