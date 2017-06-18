<?php

namespace BreakingBetBundle\Interaction\DataExtractor\Request;

use BreakingBetBundle\Interaction\DataExtractor\DataExtractorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class UrlDataExtractor implements DataExtractorInterface
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $data
     * @return string[]
     */
    public function extract($data)
    {
        return $this->router->match($data->getPathInfo());
    }
}