<?php

namespace Psr\OneBot\Contracts\Event;

use Psr\OneBot\Contracts\Entity\EntityInterface;
use Psr\OneBot\Contracts\Message\MessageInterface;
use Psr\OneBot\Self\SelfInterface;

interface MessageEventInterface extends EventInterface
{
    /**
     * @return EntityInterface 发送消息的主体
     */
    public function getEntity(): EntityInterface;

    /**
     * @return SelfInterface 机器人自身标识
     */
    public function getSelf() : SelfInterface;

    /**
     * @return MessageInterface 消息内容
     */
    public function getMessage(): MessageInterface;
}