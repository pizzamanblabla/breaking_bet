<?php

namespace AppBundle\DataMigrator\Factory;

use AppBundle\DataMigrator\Bet;
use AppBundle\DataMigrator\Chain;
use AppBundle\DataMigrator\Coefficient;
use AppBundle\DataMigrator\CoefficientType;
use AppBundle\DataMigrator\Event;
use AppBundle\DataMigrator\Sport;
use AppBundle\DataMigrator\Team;

interface DataMigratorFactoryInterface
{
    /**
     * @return Sport
     */
    public function getSport();

    /**
     * @return Team
     */
    public function getTeam();

    /**
     * @return Chain
     */
    public function getChain();

    /**
     * @return Event
     */
    public function getEvent();

    /**
     * @return Bet
     */
    public function getBet();

    /**
     * @return Coefficient
     */
    public function getCoefficient();

    /**
     * @return CoefficientType
     */
    public function getCoefficientType();
}