<?php

namespace BreakingBetBundle\DataMigrator;

use BreakingBetBundle\DataMigrator\Exception\ElementNotFoundException;
use BreakingBetBundle\Entity\CoefficientType as CoefficientTypeEntity;

class CoefficientType extends BaseDataMigrator
{
    /**
     * @var string
     */
    private $code;

    /**
     * @return CoefficientTypeEntity
     */
    public function migrate()
    {
        return $this->get();
    }

    /**
     * @return CoefficientTypeEntity
     * @throws ElementNotFoundException
     */
    public function get()
    {
        $repository = $this->getDoctrine()->getRepository('BreakingBetBundle:CoefficientType');

        $entity =  $repository->findOneByCode($this->code);

        if (is_null($entity)) {
            throw new ElementNotFoundException();
        }

        return $entity;
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