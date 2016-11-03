<?php

namespace AppBundle\Interaction\Request;

class Request implements RequestInterface
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
