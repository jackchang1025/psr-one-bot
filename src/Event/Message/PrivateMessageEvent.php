<?php

namespace Psr\OneBot\Event\Message;

use Psr\OneBot\Contracts\Entity\FriendInterface;
use Psr\OneBot\Contracts\Message\MessageInterface;
use Psr\OneBot\Self\SelfInterface;

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
            subType: $subType,
            self: $self,
            entity: $friend,
            message: $message
        );
    }
}