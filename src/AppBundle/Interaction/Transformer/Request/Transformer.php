<?php

namespace AppBundle\Interaction\Transformer\Request;

use AppBundle\Interaction\DataExtractor\DataExtractorInterface;
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