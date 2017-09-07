<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Bet
{
    /**
     * @var Coefficient[]
     *
     * @Assert\Type("array")
     *
     * @Serializer\Type("array<BreakingBetBundle\Operation\Bet\Update\Dto\Response\Coefficient>")
     */
    private $coefficients;

    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     */
    private $date;

    /**
     * @return Coefficient[]
     */
    public function getCoefficients()
    {
        return $this->coefficients;
    }

    /**
     * @param Coefficient[] $coefficients
     * @return Bet
     */
    public function setCoefficients(array $coefficients)
    {
        $this->coefficients = $coefficients;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Bet
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}