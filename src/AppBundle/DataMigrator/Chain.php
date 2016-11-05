<?php

namespace AppBundle\DataMigrator;

use AppBundle\Entity\Chain as ChainEntity;
use AppBundle\Entity\Sport as SportEntity;

class Chain extends BaseDataMigrator
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
     * @var SportEntity
     */
    private $sport;

    /**
     * @return ChainEntity
     */
    public function migrate()
    {
        $entity = (new ChainEntity())
            ->setName($this->name)
            ->setCode($this->code)
            ->setSport($this->sport)
        ;

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);

        return $entity;
    }

    /**
     * @return ChainEntity
     */
    public function get()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Chain');

        return
            !is_null($repository->findOneByCode($this->code))
                ? $repository->findOneByCode($this->code)
                : $this->migrate();
    }

    /**
     * @param string $name
     * @return Chain
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $code
     * @return Chain
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param SportEntity $sport
     * @return Chain
     */
    public function setSport(SportEntity $sport)
    {
        $this->sport = $sport;
        return $this;
    }
}