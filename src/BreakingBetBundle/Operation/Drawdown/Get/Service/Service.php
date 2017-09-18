<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Service;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;

final class Service implements ServiceInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        // TODO: Implement behave() method.
    }
}