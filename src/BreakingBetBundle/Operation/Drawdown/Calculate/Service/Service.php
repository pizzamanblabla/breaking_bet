<?php

namespace BreakingBetBundle\Operation\Drawdown\Calculate\Service;

use BreakingBetBundle\Entity\Drawdown;
use BreakingBetBundle\Enumeration\CoefficientType;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptyInternalSuccessfulResponse;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\BaseEntityService;
use BreakingBetBundle\Operation\Drawdown\Calculate\Dto\Request\Request;
use DateTime;

final class Service extends BaseEntityService
{
    /**
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        foreach ($this->repositoryFactory->event()->getAllActiveByKind($request->getKind()) as $event) {
            foreach (CoefficientType::getValuesList() as $coefficientType) {
                $coefficients = $this->repositoryFactory->coefficient()->getLastByEventAndTypeWithLimit(
                    $event,
                    2,
                    $coefficientType
                );

                if (
                    count($coefficients) == 2 &&
                    $request->getMinDifferenceValue() < abs($coefficients[0]->getValue() - $coefficients[1]->getValue()) &&
                    !$this->repositoryFactory->drawdown()->findOneByCoefficientsAndMinDifference(
                        $coefficients[0],
                        $coefficients[1],
                        $request->getMinDifferenceValue()
                    )
                ) {
                    $this->logger->info(
                        strtr(
                            'Drawdown was found for coefficient type :coefficient and kind :kind. ',
                            [
                                ':coefficient' => $coefficientType,
                                ':kind' => $request->getKind()->getName(),
                            ]
                        )
                    );

                    $entity = (new Drawdown())
                        ->setDate(new DateTime())
                        ->setCoefficientOne($coefficients[0])
                        ->setCoefficientTwo($coefficients[1])
                        ->setMinDifference($request->getMinDifferenceValue())
                        ->setDifference($coefficients[0]->getValue() - $coefficients[1]->getValue())
                    ;

                    $this->entityManager->persist($entity);
                }
            }
        }

        return new EmptyInternalSuccessfulResponse();
    }
}