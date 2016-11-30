<?php

namespace AppBundle\Interaction\Transformer\Response;

use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use Symfony\Component\HttpFoundation\Response;

interface TransformerInterface
{
    /**
     * @param ApiResponseInterface $request
     * @return Response
     */
    public function transform(ApiResponseInterface $request);
}