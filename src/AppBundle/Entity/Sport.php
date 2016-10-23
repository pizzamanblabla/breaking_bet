<?php

namespace AppBundle\Entity;

/**
 * Sport
 */
class Sport extends Entity
{
    /**
     * @ORM\Column(type="string" column="name" length="255" nullable="false")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string" column="code" length="255" nullable="false")
     * @var string
     */
    private $code;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Sport
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
     * @return Sport
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
