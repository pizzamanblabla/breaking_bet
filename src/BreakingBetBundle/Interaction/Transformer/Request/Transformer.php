<?php

namespace BreakingBetBundle\Interaction\Transformer\Request;

use BreakingBetBundle\DataExtractor\DataExtractorInterface;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestFactoryInterface;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Internal\ObjectBuilder\ObjectBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

class Transformer implements TransformerInterface
{
    /**
     * @var ObjectBuilderInterface
     */
    private $builder;

    /**
     * @var InternalRequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var DataExtractorInterface
     */
    private $dataExtractor;

    /**
     * @param ObjectBuilderInterface $builder
     * @param InternalRequestFactoryInterface $requestFactory
     * @param DataExtractorInterface $dataExtractor
     */
    public function __construct(
        ObjectBuilderInterface $builder,
        InternalRequestFactoryInterface $requestFactory,
        DataExtractorInterface $dataExtractor
    ) {
        $this->builder = $builder;
        $this->requestFactory = $requestFactory;
        $this->dataExtractor = $dataExtractor;
    }

    /**
     * @param Request $request
     * @return InternalRequestInterface
     */
    public function transform(Request $request)
    {
        return
            $this->builder->build(
                $this->requestFactory->getRequest(),
                $this->dataExtractor->extract($request)
            );
    }
}