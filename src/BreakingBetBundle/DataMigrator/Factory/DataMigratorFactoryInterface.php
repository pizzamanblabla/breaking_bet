<?php

namespace BreakingBetBundle\DataMigrator\Factory;

use BreakingBetBundle\DataMigrator\Bet;
use BreakingBetBundle\DataMigrator\Chain;
use BreakingBetBundle\DataMigrator\Coefficient;
use BreakingBetBundle\DataMigrator\CoefficientType;
use BreakingBetBundle\DataMigrator\Event;
use BreakingBetBundle\DataMigrator\Sport;
use BreakingBetBundle\DataMigrator\Team;

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