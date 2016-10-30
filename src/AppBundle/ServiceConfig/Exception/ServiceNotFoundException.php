<?php

namespace AppBundle\ServiceConfig\Exception;

class ServiceNotFoundException extends \Exception
{
    protected $message = 'Service not found';
}