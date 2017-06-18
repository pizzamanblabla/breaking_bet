<?php

namespace BreakingBetBundle\Entity\Repository;

interface RepositoryFactoryInterface
{
    /**
     * @return Bet
     */
    public function bet();

    /**
     * @return Chain
     */
    public function chain();

    /**
     * @return Coefficient
     */
    public function coefficient();

    /**
     * @return Event
     */
    public function event();

    /**
     * @return Sport
     */
    public function sport();

    /**
     * @return Team
     */
    public function team();

    /**
     * @return CoefficientType
     */
    public function coefficientType();
}