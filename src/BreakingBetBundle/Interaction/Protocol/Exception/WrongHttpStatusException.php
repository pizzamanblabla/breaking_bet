<?php

namespace BreakingBetBundle\Interaction\Protocol\Exception;

class WrongHttpStatusException extends \Exception
{
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->message = sprintf('Wrong http status: %s with response: %s', $code, $message);
    }
}