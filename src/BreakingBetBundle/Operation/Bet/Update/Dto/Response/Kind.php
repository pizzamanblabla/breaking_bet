<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Kind
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
     * @var Chain[]
     *
     * @Assert\Type("array")
     *
     * @Serializer\Type("array<BreakingBetBundle\Operation\Bet\Update\Dto\Response\Chain>")
     */
    private $chains;

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return Kind
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
     * @return Kind
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Chain[]
     */
    public function getChains()
    {
        return $this->chains;
    }

    /**
     * @param Chain[] $chains
     * @return Kind
     */
    public function setChains(array $chains)
    {
        $this->chains = $chains;
        return $this;
    }
}