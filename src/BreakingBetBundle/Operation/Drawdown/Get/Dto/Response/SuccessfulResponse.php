<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Dto\Response;

use BreakingBetBundle\Entity\Drawdown;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\Dto\Response\Successful;
use Symfony\Component\Validator\Constraints as Assert;

class SuccessfulResponse implements InternalResponseInterface
{
    use Successful;

    /**
     * @var Drawdown[]
     *
     * @Assert\Type("array")
     */
    private $drawdowns;

    /**
     * @return Drawdown[]
     */
    public function getDrawdowns()
    {
        return $this->drawdowns;
    }

    /**
     * @param Drawdown[] $drawdowns
     * @return SuccessfulResponse
     */
    public function setDrawdowns(array $drawdowns)
    {
        $this->drawdowns = $drawdowns;
        return $this;
    }
}