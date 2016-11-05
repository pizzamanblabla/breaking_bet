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
        $result = $this->find($needle, $container);

        return is_null($result) ? $else : $result;
    }

    /**
     * @param $needle
     * @param mixed[] $container
     * @return mixed
     */
    public function find($needle, array $container)
    {
        foreach ($container as $key => $value) {
            if ($needle == $key) {
                return $value;
            } elseif (is_array($value)) {
                return $this->find($needle, $value);
            }
        }
    }
}