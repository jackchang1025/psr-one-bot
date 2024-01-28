<?php

namespace Weijiajia\OneBot\Contracts\Event;

use Weijiajia\OneBot\Contracts\Entity\GroupInterface;

interface GroupNoticeEventInterface extends NoticeEventInterface
{
    /**
     * @return GroupInterface
     */
    public function getGroup(): GroupInterface;
}