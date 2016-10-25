<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="team")
 */
class Team extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="id", nullable=true)
     * @var Sport
     */
    private $sport;

    /**
     * @ORM\Column(type="string", column="name", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", column="code", length=255, nullable=false)
     * @var string
     */
    private $code;

    /**
     * Set sport
     *
     * @param Sport $sport
     *
     * @return Team
     */
    public function setSportId($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sportId
     *
     * @return Sport
     */
    public function getSportId()
    {
        return $this->sport;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
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
     * Set code
     *
     * @param string $code
     *
     * @return Team
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
    public function getCode()
    {
        return $this->code;
    }
}
