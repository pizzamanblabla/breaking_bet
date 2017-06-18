<?php

namespace BreakingBetBundle\Operation\Bet\Get\Service;

use BreakingBetBundle\Entity\Bet as EntityBet;
use BreakingBetBundle\Entity\Coefficient as EntityCoefficient;
use BreakingBetBundle\Entity\CoefficientType as EntityCoefficienType;
use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;
use BreakingBetBundle\Internal\Service\BaseEntityService;
use BreakingBetBundle\Operation\Bet\Get\Dto\Request\ApiRequest;
use BreakingBetBundle\Operation\Bet\Get\Dto\Request\Coefficient;
use BreakingBetBundle\Operation\Bet\Get\Dto\Response\ApiResponse;
use BreakingBetBundle\Operation\Bet\Get\Dto\Response\Bet;
use BreakingBetBundle\Operation\Bet\Get\Dto\Response\Coefficient as ResponseCoefficient;
use Doctrine\Common\Collections\Collection;

class Service extends BaseEntityService
{
    /**
     * @param ApiRequestInterface|ApiRequest $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        $bets = $this->filterBets($request, $this->repositoryFactory->bet()->findByApiRequest($request));

        return $this->createResponse($bets);
    }

    /**
     * @param ApiRequestInterface|ApiRequest $request
     * @param mixed[] $bets
     * @return Bet[]
     */
    private function filterBets(ApiRequestInterface $request, array $bets)
    {
        $targetBets = [];

        foreach ($this->groupByOneEvent($bets) as $group) {
            if (count($group) < 2) {
                continue;
            }

            $leftBet = array_shift($group);
            $rightBet = array_pop($group);
            /** @var EntityBet $leftBet */
            /** @var EntityBet $rightBet */

            $coefficientChange = [];

            foreach ($request->getCoefficients() as $coefficient) {
                /** @var Coefficient $coefficient */
                $leftCoef = $this->findCoefficient($leftBet->getCoefficients()->toArray(), $coefficient->getType());
                $rightCoef = $this->findCoefficient($rightBet->getCoefficients()->toArray(), $coefficient->getType());

                if (
                    !is_null($leftCoef) &&
                    !is_null($rightCoef) &&
                    abs($leftCoef->getValue() - $rightCoef->getValue()) >= $coefficient->getValue()
                ) {
                    $coefficientChange =
                        $this->calculateCoefficientDifference(
                            $leftBet->getCoefficients()->toArray(),
                            $rightBet->getCoefficients()->toArray()
                        );
                }
            }

            if (count($coefficientChange)) {
                $targetBets[] = $this->createResponseBet($rightBet, $coefficientChange);
            }
        }

        return $targetBets;
    }

    /**
     * @param EntityCoefficient[] $coefficients
     * @param $code
     * @return EntityCoefficient|null
     */
    private function findCoefficient(array $coefficients, $code) {
        foreach ($coefficients as $coefficient) {
            if ($coefficient->getCoefficientType()->getCode() == $code) {
                return $coefficient;
            }
        }

        return null;
    }

    /**
     * @param EntityCoefficient[] $left
     * @param EntityCoefficient[] $right
     * @return string[]
     */
    private function calculateCoefficientDifference(array $left, array $right)
    {
        $coefficientChange = [];

        foreach ($left as $leftCoefficient) {
            foreach ($right as $rightCoefficient) {
                if ($leftCoefficient->getCoefficientType() == $rightCoefficient->getCoefficientType()) {
                    $coefficientChange[$leftCoefficient->getCoefficientType()->getCode()] = $rightCoefficient->getValue() - $leftCoefficient->getValue();
                }
            }
        }

        return $coefficientChange;
    }

    /**
     * @param EntityBet[] $bets
     * @return mixed[]
     */
    private function groupByOneEvent(array $bets)
    {
        $sorted = [];

        foreach ($bets as $bet) {
            $sorted[$bet->getEvent()->getId()][] = $bet;
        }

        return $sorted;
    }

    /**
     * @param EntityBet $bet
     * @param array $coefficientChange
     * @return Bet
     */
    private function createResponseBet(EntityBet $bet, array $coefficientChange)
    {
        return
            (new Bet())
                ->setSport($bet->getEvent()->getChain()->getSport()->getName())
                ->setChain($bet->getEvent()->getChain()->getName())
                ->setEvent($bet->getEvent()->getDate()->format('Y-m-d H:i'))
                ->setTeam(
                    sprintf(
                        '%s - %s',
                        $bet->getEvent()->getTeamFirst()->getName(),
                        $bet->getEvent()->getTeamSecond()->getName()
                    )
                )
                ->setCoefficients($this->createResponseCoefficient($bet->getCoefficients(), $coefficientChange))
            ;
    }

    /**
     * @param Collection $coefficients
     * @param string[] $coefficientChange
     * @return ResponseCoefficient[]
     */
    private function createResponseCoefficient(Collection $coefficients, array $coefficientChange)
    {
        return
            array_map(
                function(EntityCoefficienType $coefficientType) use ($coefficientChange, $coefficients) {
                    $coefficientResponse = '';

                    foreach ($coefficients as $coefficient) {
                        if ($coefficientType->getCode() == $coefficient->getCoefficientType()->getCode()) {
                            $coefficientResponse = (new ResponseCoefficient())
                                ->setType($coefficient->getCoefficientType()->getCode())
                                ->setValue($coefficient->getValue());


                            if (array_key_exists($coefficient->getCoefficientType()->getCode(), $coefficientChange)) {
                                $coefficientResponse->setDifference($coefficientChange[$coefficient->getCoefficientType()->getCode()]);
                            }
                        }
                    }

                    if (empty($coefficientResponse)) {
                        $coefficientResponse = (new ResponseCoefficient())
                            ->setType($coefficientType->getCode())
                            ->setValue(0)
                            ->setDifference(0)
                        ;
                    }

                    return $coefficientResponse;
                },
                $this->repositoryFactory->coefficientType()->findAll()
            );
    }

    /**
     * @param $bets
     * @return ApiResponse
     */
    private function createResponse($bets)
    {
        return (new ApiResponse())->setBets($bets);
    }
}