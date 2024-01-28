<?php

namespace Weijiajia\OneBot\Event\Message;

use Weijiajia\OneBot\Contracts\Entity\GroupInterface;
use Weijiajia\OneBot\Contracts\Message\MessageInterface;
use Weijiajia\OneBot\Self\SelfInterface;

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