<?php

namespace AppBundle\Interaction\Transport;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Transport\Dto\Request;
use Swift_Mailer;
use Swift_Message;
use Swift_Mime_MimePart;

class Email implements TransportInterface
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * @param Swift_Mailer $mailer
     */
    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(ApiRequestInterface $request)
    {
        $this->mailer->send($this->createMessage($request));
    }

    /**
     * @param ApiRequestInterface|Request $request
     * @return Swift_Mime_MimePart
     */
    private function createMessage(ApiRequestInterface $request)
    {
        return
            (new Swift_Message)
                ->setSubject($request->getSubject())
                ->setFrom($request->getSender())
                ->setTo($request->getSubscribers())
                ->setBody($request->getNotification());
    }
}
