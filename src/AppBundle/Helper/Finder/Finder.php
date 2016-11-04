<?php

namespace AppBundle\Helper\Finder;

class Finder
{
    /**
     * @param string $needle
     * @param mixed[] $container
     * @param mixed $else
     * @return mixed
     */
    public function findOrElse($needle, array $container, $else)
    {
        foreach ($container as $key => $value) {
            if ($needle == $key) {
                return $value;
            } elseif (is_array($value)) {
                $this->find($needle, $value);
            }
        }

        return $else;
    }
}