<?php

namespace Weijiajia\OneBot\Event\Notice\Private;

use Weijiajia\OneBot\Contracts\Entity\FriendInterface;
use Weijiajia\OneBot\Contracts\Event\PrivateNoticeEventInterface;
use Weijiajia\OneBot\Event\Notice\NoticeEvent;
use Weijiajia\OneBot\Self\SelfInterface;

class PrivateNoticeEvent extends NoticeEvent implements PrivateNoticeEventInterface
{
    public function __construct(string $id, float $time, SelfInterface $self,protected FriendInterface $friend,string $subType = '') {
        parent::__construct(
            id: $id,
            time: $time,
            detailType: 'private',
            entity: $friend,
            self: $self,
            subType: $subType
        );
    }

    public function getFriend(): FriendInterface
    {
        return $this->friend;
    }
}