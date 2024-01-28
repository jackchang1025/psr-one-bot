<?php

namespace Psr\OneBot\Contracts\Event;

use Psr\OneBot\Contracts\Entity\FriendInterface;

interface FriendNoticeEventInterface extends NoticeEventInterface
{
    /**
     * @return FriendInterface 发送消息的主体
     */
    public function getFriend(): FriendInterface;
}