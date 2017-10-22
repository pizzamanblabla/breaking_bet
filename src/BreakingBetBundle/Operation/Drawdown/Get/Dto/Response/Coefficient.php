<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Dto\Response;

use Datetime;

class Coefficient
{
    /**
     * @var float
     */
    private $value;

    /**
     * @var float
     */
    private $ps;

    /**
     * @var float
     */
    private $lv;

    /**
     * @var Datetime
     */
    private $data;

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Coefficient
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getPs()
    {
        return $this->ps;
    }

    /**
     * @param float $ps
     * @return Coefficient
     */
    public function setPs($ps)
    {
        $this->ps = $ps;
        return $this;
    }

    /**
     * @return float
     */
    public function getLv()
    {
        return $this->lv;
    }

    /**
     * @param float $lv
     * @return Coefficient
     */
    public function setLv($lv)
    {
        $this->lv = $lv;
        return $this;
    }

    /**
     * @return Datetime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Datetime $data
     * @return Coefficient
     */
    public function setData(Datetime $data)
    {
        $this->data = $data;
        return $this;
    }
}