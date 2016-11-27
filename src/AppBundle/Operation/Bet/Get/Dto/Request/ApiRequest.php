<?php

namespace AppBundle\Operation\Bet\Get\Dto\Request;

use AppBundle\Common\Dto\Request\ApiRequestInterface;
use AppBundle\Entity\Chain;
use AppBundle\Entity\CoefficientType;
use AppBundle\Entity\Sport;
use DateTime;

class ApiRequest implements ApiRequestInterface
{
    /**
     * @var Sport
     */
    private $sport;

    /**
     * @var Chain
     */
    private $chain;

    /**
     * @var DateTime
     */
    private $dateFrom;

    /**
     * @var DateTime
     */
    private $dateTo;

    /**
     * @var CoefficientType
     */
    private $coefficientType;

    /**
     * @var float
     */
    private $coefficientValue;

    /**
     * @return Sport
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * @param Sport $sport
     * @return ApiRequest
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
        return $this;
    }

    /**
     * @return Chain
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * @param Chain $chain
     * @return ApiRequest
     */
    public function setChain($chain)
    {
        $this->chain = $chain;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param DateTime $dateFrom
     * @return ApiRequest
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param DateTime $dateTo
     * @return ApiRequest
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    /**
     * @return CoefficientType
     */
    public function getCoefficientType()
    {
        return $this->coefficientType;
    }

    /**
     * @param CoefficientType $coefficientType
     * @return ApiRequest
     */
    public function setCoefficientType($coefficientType)
    {
        $this->coefficientType = $coefficientType;
        return $this;
    }

    /**
     * @return float
     */
    public function getCoefficientValue()
    {
        return $this->coefficientValue;
    }

    /**
     * @param float $coefficientValue
     * @return ApiRequest
     */
    public function setCoefficientValue($coefficientValue)
    {
        $this->coefficientValue = $coefficientValue;
        return $this;
    }
}