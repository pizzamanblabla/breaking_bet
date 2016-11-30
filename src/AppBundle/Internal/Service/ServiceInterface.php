<?php

namespace AppBundle\Internal\Service;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;

interface ServiceInterface
{
    /**
     * @param ApiRequestInterface $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request);
}
