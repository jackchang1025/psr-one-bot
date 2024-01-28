<?php

namespace Weijiajia\OneBot\Contracts\Action;

use Weijiajia\OneBot\Contracts\Entity\EntityInterface;

interface MessageActionInterface extends ActionInterface
{
    public function getEntity():EntityInterface;
}