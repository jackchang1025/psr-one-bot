<?php

namespace Weijiajia\OneBot\Self;

interface SelfInterface
{
    public function getPlatform(): string;

    public function getBotId(): ?string;

    public function getUserId(): ?string;
}