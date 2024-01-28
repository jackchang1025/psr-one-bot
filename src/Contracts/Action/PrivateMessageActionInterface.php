<?php

namespace Weijiajia\OneBot\Contracts\Action;

use Weijiajia\OneBot\Contracts\Entity\FriendInterface;

interface PrivateMessageActionInterface extends MessageActionInterface
{
    public function getFriend() :FriendInterface;
}