<?php

namespace BreakingBetBundle\Interaction\Dto\Type;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Proxy
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $ip;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $port;

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return Proxy
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $port
     * @return Proxy
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }
}