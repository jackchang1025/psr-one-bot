<?php

namespace Psr\OneBot\Contracts\Action;

use Psr\OneBot\Contracts\Entity\GroupInterface;

interface GroupMessageActionInterface extends MessageActionInterface
{
    public function getGroup() :GroupInterface;
}