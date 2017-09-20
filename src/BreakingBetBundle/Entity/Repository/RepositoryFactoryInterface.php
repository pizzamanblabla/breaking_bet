<?php

namespace BreakingBetBundle\Entity\Repository;

interface RepositoryFactoryInterface
{
    /**
     * @return Source
     */
    public function source(): Source;

    /**
     * @return Bet
     */
    public function bet(): Bet;

    /**
     * @return Chain
     */
    public function chain(): Chain;

    /**
     * @return Coefficient
     */
    public function coefficient(): Coefficient;

    /**
     * @return Event
     */
    public function event(): Event;

    /**
     * @return Kind
     */
    public function kind(): Kind;

    /**
     * @return Team
     */
    public function team(): Team;

    /**
     * @return Drawdown
     */
    public function drawdown(): Drawdown;
}