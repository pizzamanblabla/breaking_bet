<?php

namespace BreakingBetBundle\Dbal\Type;

use BreakingBetBundle\Enumeration\CoefficientType;
use BreakingBetBundle\Enumeration\Enumeration;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class Coefficient extends Type
{
    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = parent::convertToPHPValue($value, $platform);

        return
            !is_null($value)
                ? CoefficientType::create($value)
                : null;
    }

    /**
     * @param Enumeration $value
     * @param AbstractPlatform $platform
     * @return mixed|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (is_null($value)) {
            return null;
        }

        return parent::convertToDatabaseValue($value, $platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'varchar(36)';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'coefficient_type';
    }
}