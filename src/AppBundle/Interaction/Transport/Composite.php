<?php

namespace AppBundle\Interaction\Transport;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

class Composite implements TransportInterface
{
    /**
     * @var TransportInterface[]
     */
    private $list;

    /**
     * @param TransportInterface[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(ApiRequestInterface $request)
    {
        return
            array_map(
                function(TransportInterface $transport) use ($request) {
                    return $transport->dispatch($request);
                },
                $this->list
            );
    }
}
