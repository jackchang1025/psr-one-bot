<?php

namespace Psr\OneBot\Contracts\Entity;

interface FriendInterface extends EntityInterface
{
    public function getUserId();
}