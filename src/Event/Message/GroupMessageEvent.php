<?php

namespace Psr\OneBot\Event\Message;

use Psr\OneBot\Contracts\Entity\GroupInterface;
use Psr\OneBot\Contracts\Message\MessageInterface;
use Psr\OneBot\Self\SelfInterface;

class GroupMessageEvent extends MessageEvent
{
    public function __construct(
        string $id,
        float $time,
        SelfInterface $self,
        MessageInterface $message,
        GroupInterface $entity,
        string $subType = '',
    ) {
        parent::__construct(
            id: $id,
            time: $time,
            detailType: 'group',
            self: $self,
            entity: $entity,
            message: $message,
            subType: $subType
        );
    }
}