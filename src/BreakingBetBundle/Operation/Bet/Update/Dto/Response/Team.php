<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Team
{
    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("externalId")
     */
    private $externalId;

    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return Team
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
}