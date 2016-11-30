<?php

namespace AppBundle\Interaction\Transformer\Request;

use AppBundle\Common\Dto\Request\ApiRequestInterface;
use Symfony\Component\HttpFoundation\Request;

interface TransformerInterface
{
    /**
     * @param Request $request
     * @return ApiRequestInterface
     */
    public function transform(Request $request);
}