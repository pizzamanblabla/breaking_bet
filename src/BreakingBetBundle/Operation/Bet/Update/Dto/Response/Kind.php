<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

class Kind
{
    /**
     * @var string
     */
    private $externalId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Chain[]
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