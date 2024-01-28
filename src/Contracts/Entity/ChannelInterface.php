<?php

namespace Weijiajia\OneBot\Contracts\Entity;

interface ChannelInterface extends EntityInterface
{
    public function getGuildId();
    public function getChannelId();
}