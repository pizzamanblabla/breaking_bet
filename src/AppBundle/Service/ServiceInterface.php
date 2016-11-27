<?php

namespace AppBundle\Service;

use AppBundle\Common\Dto\Request\ApiRequestInterface;
use AppBundle\Common\Dto\Response\ApiResponseInterface;

interface ServiceInterface
{
    /**
     * @param ApiRequestInterface $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request);
}
