<?php

namespace AppBundle\Interaction\Transformer\Request;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Request\ApiRequestFactoryInterface;
use AppBundle\Internal\ObjectBuilder\ObjectBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

class Transformer implements TransformerInterface
{
    /**
     * @var ObjectBuilderInterface
     */
    private $builder;

    /**
     * @var ApiRequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @param ObjectBuilderInterface $builder
     * @param ApiRequestFactoryInterface $requestFactory
     */
    public function __construct(
        ObjectBuilderInterface $builder,
        ApiRequestFactoryInterface $requestFactory
    ) {
        $this->builder = $builder;
        $this->requestFactory = $requestFactory;
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