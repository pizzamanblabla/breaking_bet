<?php

namespace AppBundle\Entity;

/**
 * Bet
 */
class Bet
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $eventId;

    /**
     * @var float
     */
    private $rateTeamOne;

    /**
     * @var float
     */
    private $rateTeamTwo;

    /**
     * @var float
     */
    private $rateDraw;

    /**
     * @var float
     */
    private $rateNeitherTeamOne;

    /**
     * @var float
     */
    private $rateNeitherTeamTwo;

    /**
     * @var float
     */
    private $rateNeitherDraw;

    /**
     * @var float
     */
    private $coefficientOne;

    /**
     * @var float
     */
    private $coefficientTwo;

    /**
     * @var float
     */
    private $allowanceOne;

    /**
     * @var float
     */
    private $allowanceTwo;

    /**
     * @var float
     */
    private $total;

    /**
     * @var float
     */
    private $totalLess;

    /**
     * @var float
     */
    private $totalMore;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bet
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return Bet
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set rateTeamOne
     *
     * @param float $rateTeamOne
     *
     * @return Bet
     */
    public function setRateTeamOne($rateTeamOne)
    {
        $this->rateTeamOne = $rateTeamOne;

        return $this;
    }

    /**
     * Get rateTeamOne
     *
     * @return float
     */
    public function getRateTeamOne()
    {
        return $this->rateTeamOne;
    }

    /**
     * Set rateTeamTwo
     *
     * @param float $rateTeamTwo
     *
     * @return Bet
     */
    public function setRateTeamTwo($rateTeamTwo)
    {
        $this->rateTeamTwo = $rateTeamTwo;

        return $this;
    }

    /**
     * Get rateTeamTwo
     *
     * @return float
     */
    public function getRateTeamTwo()
    {
        return $this->rateTeamTwo;
    }

    /**
     * Set rateDraw
     *
     * @param float $rateDraw
     *
     * @return Bet
     */
    public function setRateDraw($rateDraw)
    {
        $this->rateDraw = $rateDraw;

        return $this;
    }

    /**
     * Get rateDraw
     *
     * @return float
     */
    public function getRateDraw()
    {
        return $this->rateDraw;
    }

    /**
     * Set rateNeitherTeamOne
     *
     * @param float $rateNeitherTeamOne
     *
     * @return Bet
     */
    public function setRateNeitherTeamOne($rateNeitherTeamOne)
    {
        $this->rateNeitherTeamOne = $rateNeitherTeamOne;

        return $this;
    }

    /**
     * Get rateNeitherTeamOne
     *
     * @return float
     */
    public function getRateNeitherTeamOne()
    {
        return $this->rateNeitherTeamOne;
    }

    /**
     * Set rateNeitherTeamTwo
     *
     * @param float $rateNeitherTeamTwo
     *
     * @return Bet
     */
    public function setRateNeitherTeamTwo($rateNeitherTeamTwo)
    {
        $this->rateNeitherTeamTwo = $rateNeitherTeamTwo;

        return $this;
    }

    /**
     * Get rateNeitherTeamTwo
     *
     * @return float
     */
    public function getRateNeitherTeamTwo()
    {
        return $this->rateNeitherTeamTwo;
    }

    /**
     * Set rateNeitherDraw
     *
     * @param float $rateNeitherDraw
     *
     * @return Bet
     */
    public function setRateNeitherDraw($rateNeitherDraw)
    {
        $this->rateNeitherDraw = $rateNeitherDraw;

        return $this;
    }

    /**
     * Get rateNeitherDraw
     *
     * @return float
     */
    public function getRateNeitherDraw()
    {
        return $this->rateNeitherDraw;
    }

    /**
     * Set coefficientOne
     *
     * @param float $coefficientOne
     *
     * @return Bet
     */
    public function setCoefficientOne($coefficientOne)
    {
        $this->coefficientOne = $coefficientOne;

        return $this;
    }

    /**
     * Get coefficientOne
     *
     * @return float
     */
    public function getCoefficientOne()
    {
        return $this->coefficientOne;
    }

    /**
     * Set coefficientTwo
     *
     * @param float $coefficientTwo
     *
     * @return Bet
     */
    public function setCoefficientTwo($coefficientTwo)
    {
        $this->coefficientTwo = $coefficientTwo;

        return $this;
    }

    /**
     * Get coefficientTwo
     *
     * @return float
     */
    public function getCoefficientTwo()
    {
        return $this->coefficientTwo;
    }

    /**
     * Set allowanceOne
     *
     * @param float $allowanceOne
     *
     * @return Bet
     */
    public function setAllowanceOne($allowanceOne)
    {
        $this->allowanceOne = $allowanceOne;

        return $this;
    }

    /**
     * Get allowanceOne
     *
     * @return float
     */
    public function getAllowanceOne()
    {
        return $this->allowanceOne;
    }

    /**
     * Set allowanceTwo
     *
     * @param float $allowanceTwo
     *
     * @return Bet
     */
    public function setAllowanceTwo($allowanceTwo)
    {
        $this->allowanceTwo = $allowanceTwo;

        return $this;
    }

    /**
     * Get allowanceTwo
     *
     * @return float
     */
    public function getAllowanceTwo()
    {
        return $this->allowanceTwo;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Bet
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set totalLess
     *
     * @param float $totalLess
     *
     * @return Bet
     */
    public function setTotalLess($totalLess)
    {
        $this->totalLess = $totalLess;

        return $this;
    }

    /**
     * Get totalLess
     *
     * @return float
     */
    public function getTotalLess()
    {
        return $this->totalLess;
    }

    /**
     * Set totalMore
     *
     * @param float $totalMore
     *
     * @return Bet
     */
    public function setTotalMore($totalMore)
    {
        $this->totalMore = $totalMore;

        return $this;
    }

    /**
     * Get totalMore
     *
     * @return float
     */
    public function getTotalMore()
    {
        return $this->totalMore;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

