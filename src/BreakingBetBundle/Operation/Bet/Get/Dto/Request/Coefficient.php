<?php

namespace BreakingBetBundle\Operation\Bet\Get\Dto\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class Coefficient
{
    /**
     * @var string
     *
     * @Type("string")
     * @SerializedName("type")
     *
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @var float
     *
     * @Type("float")
     * @SerializedName("value")
     *
     * @Assert\NotBlank()
     */
    private $value;

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
}