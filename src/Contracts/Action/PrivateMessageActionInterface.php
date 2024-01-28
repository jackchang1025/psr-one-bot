<?php

namespace Psr\OneBot\Contracts\Action;

use Psr\OneBot\Contracts\Entity\FriendInterface;

interface PrivateMessageActionInterface extends MessageActionInterface
{
    public function getFriend() :FriendInterface;
}