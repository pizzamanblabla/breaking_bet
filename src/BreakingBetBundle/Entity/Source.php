<?php

namespace BreakingBetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Source")
 * @ORM\Table(name="source")
 */
class Source
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="source_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="name", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="url", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string[]
     *
     * @ORM\Column(type="jsonb", name="meta", nullable=false)
     */
    private $meta = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Source
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param string[] $meta
     * @return Source
     */
    public function setMeta(array $meta)
    {
        $this->meta = $meta;
        return $this;
    }
}
