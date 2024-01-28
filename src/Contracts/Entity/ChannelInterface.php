<?php

namespace Psr\OneBot\Contracts\Entity;

interface ChannelInterface extends EntityInterface
{
    public function getGuildId();
    public function getChannelId();
}