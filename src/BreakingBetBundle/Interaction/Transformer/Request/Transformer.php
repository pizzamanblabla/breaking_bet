<?php

namespace BreakingBetBundle\Interaction\Transformer\Request;

use BreakingBetBundle\Interaction\DataExtractor\DataExtractorInterface;
use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Request\ApiRequestFactoryInterface;
use BreakingBetBundle\Internal\ObjectBuilder\ObjectBuilderInterface;
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
     * @var DataExtractorInterface
     */
    private $dataExtractor;

    /**
     * @param ObjectBuilderInterface $builder
     * @param ApiRequestFactoryInterface $requestFactory
     * @param DataExtractorInterface $dataExtractor
     */
    public function __construct(
        ObjectBuilderInterface $builder,
        ApiRequestFactoryInterface $requestFactory,
        DataExtractorInterface $dataExtractor
    ) {
        $this->builder = $builder;
        $this->requestFactory = $requestFactory;
        $this->dataExtractor = $dataExtractor;
    }

    /**
     * @param Request $request
     * @return ApiRequestInterface
     */
    public function transform(Request $request)
    {
        return
            $this->builder->build(
                $this->requestFactory->getRequest(),
                $this->requestFactory->getRequestType(),
                $this->dataExtractor->extract($request)
            );
    }
}