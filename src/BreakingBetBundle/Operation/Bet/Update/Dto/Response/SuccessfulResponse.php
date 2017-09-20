<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\Dto\Response\Successful;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class SuccessfulResponse implements InternalResponseInterface
{
    use Successful;

    /**
     * @var Kind[]
     *
     * @Assert\Type("array")
     *
     * @Serializer\Type("array<BreakingBetBundle\Operation\Bet\Update\Dto\Response\Kind>")
     */
    private $kinds;

    /**
     * @return Kind[]
     */
    public function getKinds()
    {
        return $this->kinds;
    }

    /**
     * @param Kind[] $kinds
     * @return SuccessfulResponse
     */
    public function setKinds(array $kinds)
    {
        $this->kinds = $kinds;
        return $this;
    }
}