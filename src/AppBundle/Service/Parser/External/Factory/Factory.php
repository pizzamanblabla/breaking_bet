<?php

namespace AppBundle\Service\Parser\External\Factory;

class Factory implements FactoryInterface {

    /**
     * {@inheritdoc}
     */
    public function dataProvider($serviceId)
    {
        return $this->create($serviceId, 'DataProvider');
    }

    /**
     * {@inheritdoc}
     */
    public function resolver($serviceId)
    {
        return $this->create($serviceId, 'Resolver');
    }

    /**
     * {@inheritdoc}
     */
    public function assembler($serviceId)
    {
        return $this->create($serviceId, 'Assembler');
    }

    /**
     * @param string $serviceId
     * @param string $class
     * @return mixed
     */
    private function create($serviceId, $class)
    {
        $className = sprintf('\AppBundle\Service\Parser\External\%s\%s\%s', $serviceId, $class, $class);

        return new $className();
    }
}
