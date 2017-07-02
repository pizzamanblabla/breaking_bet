<?php

namespace BreakingBetBundle\Operation\Bet\Get\Dto\Request;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use DateTime;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Request implements InternalRequestInterface
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $sport;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $chain;

    /**
     * @var DateTime
     *
     * @Serializer\Type("DateTime")
     *
     * @Assert\NotBlank()
     */
    private $dateFrom;

    /**
     * @var DateTime
     *
     * @Serializer\Type("DateTime")
     *
     * @Assert\NotBlank()
     */
    private $dateTo;

    /**
     * @var Coefficient[]
     *
     * @Serializer\Type("array<BreakingBetBundle\Operation\Bet\Get\Dto\Request\Coefficient>")
     */
    private $coefficients;

    /**
     * @return int
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * @param int $sport
     * @return ApiRequest
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
        return $this;
    }

    /**
     * @return int
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * @param int $chain
     * @return ApiRequest
     */
    public function setChainId($chain)
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
     * @return Coefficient[]
     */
    public function getCoefficients()
    {
        return $this->coefficients;
    }

    /**
     * @param Coefficient[] $coefficients
     * @return ApiRequest
     */
    public function setCoefficients($coefficients)
    {
        $this->coefficients = $coefficients;
        return $this;
    }
}
