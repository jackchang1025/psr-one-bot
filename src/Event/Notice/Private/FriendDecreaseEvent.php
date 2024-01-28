<?php

namespace Psr\OneBot\Event\Notice\Private;

use Psr\OneBot\Contracts\Entity\FriendInterface;
use Psr\OneBot\Contracts\Event\FriendNoticeEventInterface;
use Psr\OneBot\Event\Notice\NoticeEvent;
use Psr\OneBot\Self\SelfInterface;

class FriendDecreaseEvent extends NoticeEvent implements FriendNoticeEventInterface
{
    public function __construct(string $id, float $time, SelfInterface $self, public string $userId) {
        parent::__construct($id, $time, 'friend_decrease', '', $self);
    }

    public function getFriend(): FriendInterface
    {
        return $this->entity;
    }
}