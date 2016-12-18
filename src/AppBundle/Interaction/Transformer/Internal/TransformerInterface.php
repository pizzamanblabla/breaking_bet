<?php

namespace AppBundle\Interaction\Transformer\Internal;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;

interface TransformerInterface
{
    /**
     * @param ApiResponseInterface $response
     * @return ApiRequestInterface
     */
    public function transform(ApiResponseInterface $response);
}