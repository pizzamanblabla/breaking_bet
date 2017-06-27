<?php

namespace BreakingBetBundle\Operation\Bet\Update\Service;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptyInternalSuccessfulResponse;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\BaseEntityService;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;

final class Service extends BaseEntityService
{
    /**
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        var_dump($request);die;

        return new EmptyInternalSuccessfulResponse();
    }
}
