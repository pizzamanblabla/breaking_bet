<?php

namespace AppBundle\Interaction\Transport\Dto;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

class Request implements ApiRequestInterface
{
    /**
     * @var string
     */
    private $notification;

    /**
     * @var string[]
     */
    private $subscribers = [];

    /**
     * @var string
     */
    private $sender;

    /**
     * @var string
     */
    private $subject;

    /**
     * @return string
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param string $notification
     * @return Request
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getSubscribers()
    {
        return $this->subscribers;
    }

    /**
     * @param string[] $subscribers
     * @return Request
     */
    public function setSubscribers(array $subscribers)
    {
        $this->subscribers = $subscribers;
        return $this;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     * @return Request
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return Request
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }
}
