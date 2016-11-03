<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bet")
 */
class Bet extends Entity
{
    /**
     * @ORM\Column(type="datetime", name="date", nullable=false)
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=true)
     * @var Event
     */
    private $event;

    /**
     * @ORM\Column(type="float", name="rate_team_one", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $rateTeamOne;

    /**
     * @ORM\Column(type="float", name="rate_team_two", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $rateTeamTwo;

    /**
     * @ORM\Column(type="float", name="rate_draw", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $rateDraw;

    /**
     * @ORM\Column(type="float", name="rate_neither_team_one", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $rateNeitherTeamOne;

    /**
     * @ORM\Column(type="float", name="rate_neither_team_two", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $rateNeitherTeamTwo;

    /**
     * @ORM\Column(type="float", name="rate_neither_draw", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $rateNeitherDraw;

    /**
     * @ORM\Column(type="float", name="coefficient_one", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $coefficientOne;

    /**
     * @ORM\Column(type="float", name="coefficient_two", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $coefficientTwo;

    /**
     * @ORM\Column(type="float", name="allowance_one", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $allowanceOne;

    /**
     * @ORM\Column(type="float", name="allowance_two", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $allowanceTwo;

    /**
     * @ORM\Column(type="float", name="total", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $total;

    /**
     * @ORM\Column(type="float", name="total_less", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $totalLess;

    /**
     * @ORM\Column(type="float", name="total_more", precision=10, scale=0, nullable=false)
     * @var float
     */
    private $totalMore;

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
     * Set event
     *
     * @param Event $event
     *
     * @return Bet
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return Event
     */
    public function getEventId()
    {
        return $this->event;
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
}

