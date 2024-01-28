<?php

namespace Weijiajia\OneBot\Contracts\Action;

use Weijiajia\OneBot\Contracts\Entity\GroupInterface;

interface GroupMessageActionInterface extends MessageActionInterface
{
    public function getGroup() :GroupInterface;
}