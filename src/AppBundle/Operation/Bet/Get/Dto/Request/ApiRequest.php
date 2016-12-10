<?php

namespace AppBundle\Operation\Bet\Get\Dto\Request;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class ApiRequest implements ApiRequestInterface
{
    /**
     * @var int
     *
     * @Type("integer")
     * @SerializedName("sport")
     */
    private $sport;

    /**
     * @var int
     *
     * @Type("integer")
     * @SerializedName("chain")
     */
    private $chain;

    /**
     * @var DateTime
     *
     * @Type("DateTime")
     * @SerializedName("dateFrom")
     *
     * @Assert\NotBlank()
     */
    private $dateFrom;

    /**
     * @var DateTime
     *
     * @Type("DateTime")
     * @SerializedName("dateTo")
     *
     * @Assert\NotBlank()
     */
    private $dateTo;

    /**
     * @var Coefficient[]
     *
     * @Type("array<AppBundle\Operation\Bet\Get\Dto\Request\Coefficient>")
     * @SerializedName("coefficients")
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
