<?php

namespace BreakingBetBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Event")
 * @ORM\Table(name="event")
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="event_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="name", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @var Team[]
     *
     * @ORM\ManyToMany(targetEntity="Team", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="event_team",
     *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="team_id", referencedColumnName="id")}
     * )
     */
    private $teams;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="external_id", length=255, nullable=false)
     */
    private $externalId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="date", nullable=false)
     */
    private $date;

    /**
     * @var Chain
     *
     * @ORM\ManyToOne(targetEntity="Chain")
     * @ORM\JoinColumn(name="chain_id", referencedColumnName="id", nullable=true)
     */
    private $chain;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Event
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param Team[] $teams
     * @return Event
     */
    public function setTeams(array $teams)
    {
        $this->teams = $teams;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return Event
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return Event
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
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
    public function setChain(Chain $chain)
    {
        $this->chain = $chain;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
