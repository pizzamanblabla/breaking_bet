<?php

namespace BreakingBetBundle\Interaction\Protocol;

use BreakingBetBundle\Interaction\Protocol\Exception\WrongHttpStatusException;
use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;

class Protocol implements ProtocolInterface
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
     * {@inheritdoc}
     */
    public function send(RequestInterface $request, array $options)
    {
        $response =  $this->client->send(
            $request,
            $options
        );

        if ($response->getStatusCode() != 200) {
            throw new WrongHttpStatusException(
                $response->getBody()->getContents(),
                $response->getStatusCode()
            );
        }

        return $response;
    }
}