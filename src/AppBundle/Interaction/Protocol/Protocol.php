<?php

namespace AppBundle\Interaction\Protocol;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;

class Protocol
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Protocol constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param RequestInterface $request
     */
    public function send(RequestInterface $request)
    {
        $this->client->send($request);
    }
}