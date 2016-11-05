<?php

namespace AppBundle\DataMigrator\Exception;

class ElementNotFoundException extends \Exception
{
    protected $message = 'Element not found';
}