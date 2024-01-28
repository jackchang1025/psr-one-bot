<?php

namespace Weijiajia\OneBot\Contracts\Event;

use Weijiajia\OneBot\Contracts\Entity\FriendInterface;

interface PrivateNoticeEventInterface extends NoticeEventInterface
{
    /**
     * @return FriendInterface 发送消息的主体
     */
    public function getFriend(): FriendInterface;
}