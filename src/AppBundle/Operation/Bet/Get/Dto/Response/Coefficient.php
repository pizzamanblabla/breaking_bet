<?php

namespace AppBundle\Operation\Bet\Get\Dto\Response;

class Coefficient
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $value;

    /**
     * @var float
     */
    private $difference;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Coefficient
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Coefficient
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getDifference()
    {
        return $this->difference;
    }

    /**
     * @param float $difference
     * @return Coefficient
     */
    public function setDifference($difference)
    {
        $this->difference = $difference;
        return $this;
    }
}