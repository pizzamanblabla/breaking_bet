<?php

namespace BreakingBetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Team")
 * @ORM\Table(name="team")
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="team_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Kind")
     * @ORM\JoinColumn(name="kind_id", referencedColumnName="id", nullable=false)
     * @var Kind
     */
    private $kind;

    /**
     * @ORM\Column(type="string", name="name", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", name="external_id", length=255, nullable=false)
     * @var string
     */
    private $externalId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Team
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Kind
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param Kind $kind
     * @return $this
     */
    public function setKind(Kind $kind)
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Team
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }
}
