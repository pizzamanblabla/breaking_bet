<?php

namespace AppBundle\Interaction\Dto\Request;

use Symfony\Component\Form\AbstractType;

interface ApiRequestFactoryInterface
{
    /**
     * @return ApiRequestInterface
     */
    public function getRequest();

    /**
     * @return AbstractType
     */
    public function getRequestType();
}