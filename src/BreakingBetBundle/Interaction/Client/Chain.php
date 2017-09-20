<?php

namespace BreakingBetBundle\Interaction\Client;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;

final class Chain implements ClientInterface
{
    /**
     * @var ClientInterface[]
     */
    private $container;

    public function __construct(array $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function send(RequestInterface $request, array $options = [])
    {
        // TODO: Implement send() method.
    }

    /**
     * {@inheritdoc}
     */
    public function sendAsync(RequestInterface $request, array $options = [])
    {
        // TODO: Implement sendAsync() method.
    }

    /**
     * {@inheritdoc}
     */
    public function request($method, $uri, array $options = [])
    {
        // TODO: Implement request() method.
    }

    /**
     * {@inheritdoc}
     */
    public function requestAsync($method, $uri, array $options = [])
    {
        // TODO: Implement requestAsync() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig($option = null)
    {
        // TODO: Implement getConfig() method.
    }
}