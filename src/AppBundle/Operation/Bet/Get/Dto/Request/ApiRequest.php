<?php

namespace AppBundle\Operation\Bet\Get\Dto\Request;

use AppBundle\Common\Dto\Request\ApiRequestInterface;

class ApiRequest implements ApiRequestInterface
{
    private $sport;

    private $coefficientMore;

    private $coefficientLess;
}