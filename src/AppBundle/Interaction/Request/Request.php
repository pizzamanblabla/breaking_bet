<?php

namespace AppBundle\Interaction\Request;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

class Request implements ApiRequestInterface
{
    /**
     * @var string
     */
    private $serviceId;

    /**
     * {@inheritdoc}
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * {@inheritdoc}
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }
}
