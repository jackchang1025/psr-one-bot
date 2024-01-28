<?php

namespace Weijiajia\OneBot\Event\Message;

use Weijiajia\OneBot\Contracts\Entity\FriendInterface;
use Weijiajia\OneBot\Contracts\Message\MessageInterface;
use Weijiajia\OneBot\Self\SelfInterface;

class PrivateMessageEvent extends MessageEvent
{
    public function __construct(
        string $id,
        float $time,
        string $subType,
        SelfInterface $self,
        MessageInterface $message,
        FriendInterface $friend,
    ) {
        parent::__construct(
            id: $id,
            time: $time,
            detailType: 'private',
            self: $self,
            entity: $friend,
            message: $message,
            subType: $subType
        );
    }
}