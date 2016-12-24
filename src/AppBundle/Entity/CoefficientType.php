<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoefficientType
 *
 * @ORM\Table(name="coefficient_type")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\CoefficientType")
 */
class CoefficientType extends Entity
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CoefficientType
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return CoefficientType
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
}

