<?php

namespace Psr\OneBot\Contracts\Action;

use Psr\OneBot\Contracts\Entity\EntityInterface;

interface MessageActionInterface extends ActionInterface
{
    public function getEntity():EntityInterface;
}