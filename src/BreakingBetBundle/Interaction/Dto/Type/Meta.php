<?php

namespace BreakingBetBundle\Interaction\Dto\Type;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Meta
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $initialUrl;

    /**
     * @var Proxy
     *
     * @Serializer\Type("BreakingBetBundle\Interaction\Dto\Type\Proxy")
     */
    private $proxy;

    /**
     * @return string
     */
    public function getInitialUrl()
    {
        return $this->initialUrl;
    }

    /**
     * @param string $initialUrl
     * @return Meta
     */
    public function setInitialUrl($initialUrl)
    {
        $this->initialUrl = $initialUrl;
        return $this;
    }

    /**
     * @return Proxy
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param Proxy $proxy
     * @return Meta
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }
}