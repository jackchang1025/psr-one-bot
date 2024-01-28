<?php

namespace Psr\OneBot\Event\Message;

use Psr\OneBot\Contracts\Entity\EntityInterface;
use Psr\OneBot\Contracts\Event\MessageEventInterface;
use Psr\OneBot\Contracts\Message\MessageInterface;
use Psr\OneBot\Event\Event;
use Psr\OneBot\Self\SelfInterface;

class MessageEvent extends Event implements MessageEventInterface
{
    /**
     * 构造函数
     *
     * @param string $id 事件的唯一标识符
     * @param float $time 事件发生的Unix时间戳
     * @param string $detailType 事件的详细类型
     * @param string $subType 事件的子类型
     * @param \ Psr\OneBot\Self\SelfInterface $self 机器人自身的信息
     * @param MessageInterface $message 消息内容
     */
    public function __construct(
        string $id,
        float $time,
        string $detailType,
        protected SelfInterface $self,
        protected EntityInterface $entity,
        protected MessageInterface $message,
        string $subType = '',
    ) {
        parent::__construct($id, $time, 'message', $detailType, $subType);
    }

    public function getSelf(): SelfInterface
    {
        return $this->self;
    }

    public function getMessage(): MessageInterface
    {
        return $this->message;
    }

    public function getEntity(): EntityInterface
    {
        return $this->entity;
    }
}