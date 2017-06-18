<?php

namespace BreakingBetBundle\ServiceConfig\Exception;

class ServiceNotFoundException extends \Exception
{
    protected $message = 'Service not found';
}