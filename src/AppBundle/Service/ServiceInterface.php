<?php

namespace AppBundle\Service;

use AppBundle\Interaction\Request\RequestInterface;
use AppBundle\Interaction\Response\ResponseInterface;

interface ServiceInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function behave(RequestInterface $request);
}
