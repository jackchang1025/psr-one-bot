<?php

namespace Psr\OneBot\Event\Notice\Private;

use Self;
use Psr\OneBot\Event\Notice\NoticeEvent;

class FriendIncreaseEvent extends NoticeEvent
{
    public function __construct(string $id, float $time, Self $self, public string $userId) {
        parent::__construct($id, $time, 'friend_decrease', '', $self);
    }
}