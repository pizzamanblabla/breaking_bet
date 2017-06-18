<?php

namespace BreakingBetBundle\Internal\Service;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;

interface ServiceInterface
{
    /**
     * @param ApiRequestInterface $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request);
}
