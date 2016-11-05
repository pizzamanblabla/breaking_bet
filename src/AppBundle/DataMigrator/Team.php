<?php

namespace AppBundle\DataMigrator;

use AppBundle\Entity\Team as TeamEntity;
use AppBundle\Entity\Sport as SportEntity;

class Team extends BaseDataMigrator
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
     * @return TeamEntity
     */
    public function migrate()
    {
        $entity = (new TeamEntity())
            ->setName($this->name)
            ->setCode($this->code)
            ->setSport($this->sport)
        ;

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);

        return $entity;
    }

    /**
     * @return TeamEntity
     */
    public function get()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Team');

        return
            !is_null($repository->findOneByCode($this->code))
                ? $repository->findOneByCode($this->code)
                : $this->migrate();
    }

    /**
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $code
     * @return Team
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param SportEntity $sport
     * @return Team
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
        return $this;
    }
}