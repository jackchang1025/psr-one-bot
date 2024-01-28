<?php

namespace Weijiajia\OneBot\Contracts\Event;

use Weijiajia\OneBot\Contracts\Entity\EntityInterface;
use Weijiajia\OneBot\Self\SelfInterface;

interface NoticeEventInterface extends EventInterface
{
    /**
     * @return EntityInterface 发送消息的主体
     */
    public function getEntity(): EntityInterface;

    /**
     * @return SelfInterface 机器人自身标识
     */
    public function getSelf() : SelfInterface;
}