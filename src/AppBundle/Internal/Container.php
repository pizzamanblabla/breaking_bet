<?php

namespace AppBundle\Internal;

trait Container
{
    /**
     * @var mixed[]
     */
    private $container;

    /**
     * @return mixed[]
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed[] $container
     * @param string $className
     * @return Container
     */
    public function setContainer(array $container, $className = '')
    {
        if (!empty($className)) {
            array_walk(
                $container,
                function($element) use ($className) {
                    if (is_a($element, $className)) {
                        $this->container[] = $element;
                    }
                }
            );
        } else {
            $this->container = $container;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return assert(count($this->container));
    }
}
