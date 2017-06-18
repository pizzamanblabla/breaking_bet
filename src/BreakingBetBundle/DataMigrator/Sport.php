<?php

namespace BreakingBetBundle\DataMigrator;

use BreakingBetBundle\Entity\Sport as SportEntity;

class Sport extends BaseDataMigrator
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @return SportEntity
     */
    public function migrate()
    {
        $entity = (new SportEntity())
            ->setName($this->name)
            ->setCode($this->code)
        ;

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);

        return $entity;
    }

    /**
     * @return SportEntity
     */
    public function get()
    {
        $repository = $this->getDoctrine()->getRepository('BreakingBetBundle:Sport');

        return
            !is_null($repository->findOneByName($this->name))
                ? $repository->findOneByName($this->name)
                : $this->migrate();
    }

    /**
     * @param string $name
     * @return Sport
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $code
     * @return Sport
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
}