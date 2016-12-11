<?php

namespace AppBundle\Operation\Bet\Get\Service;

use AppBundle\Entity\Bet;
use AppBundle\Entity\Chain;
use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Internal\Service\BaseEntityService;
use AppBundle\Operation\Bet\Get\Dto\Request\ApiRequest;
use AppBundle\Internal\Service\ServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class Service extends BaseEntityService
{
    /**
     * @param ApiRequestInterface|ApiRequest $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        $bets = $this->repositoryFactory->bet()->findByApiRequest($request);

        var_dump(count($bets));
        //var_dump($this->entityManager);
        /** @var $bets Bet[] **/
        var_dump($request);
        var_dump($bets[0]->getEvent()->getChain()->getName());
        die;
    }
}