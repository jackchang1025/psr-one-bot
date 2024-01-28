<?php

namespace Weijiajia\OneBot\Event;

class SelfInfo
{

    /**
     * @param string $platform 平台
     * @param string $userId 机器人用户 ID
     */
    public function __construct(public string $platform, public string $userId)
    {
    }
}