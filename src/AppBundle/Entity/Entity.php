<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Entity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
