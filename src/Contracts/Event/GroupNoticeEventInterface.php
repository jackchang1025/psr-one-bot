<?php

namespace Psr\OneBot\Contracts\Event;

use Psr\OneBot\Contracts\Entity\GroupInterface;

interface GroupNoticeEventInterface extends NoticeEventInterface
{
    /**
     * @return GroupInterface
     */
    public function getGroup(): GroupInterface;
}