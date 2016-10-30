<?php

namespace AppBundle\ServiceConfig\Exception;

class MissedElementException extends \Exception
{
    protected $protected = 'Could not find element';
}