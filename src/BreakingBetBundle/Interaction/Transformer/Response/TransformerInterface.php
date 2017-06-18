<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;
use Symfony\Component\HttpFoundation\Response;

interface TransformerInterface
{
    /**
     * @param ApiResponseInterface $request
     * @return Response
     */
    public function transform(ApiResponseInterface $request);
}