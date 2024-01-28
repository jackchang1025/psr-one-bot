<?php

namespace Psr\OneBot\Self;

class SelfInfo implements SelfInterface
{

    /**
     * @param string $platform 平台
     * @param string $botId
     * @param string|null $userId 机器人用户 ID
     */
    public function __construct(public string $platform, public string $botId,public ?string $userId = null)
    {
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function getBotId(): string
    {
        return $this->botId;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }


}