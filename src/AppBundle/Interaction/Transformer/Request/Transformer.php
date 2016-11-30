<?php

namespace AppBundle\Interaction\Transformer\Request;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use Symfony\Component\HttpFoundation\Request;

class Transformer implements TransformerInterface
{
    private $builder;

    public function __construct(ObjectBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param Request $request
     * @return ApiRequestInterface
     */
    public function transform(Request $request)
    {
        // TODO: Implement transform() method.
    }
}