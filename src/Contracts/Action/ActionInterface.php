<?php

namespace Weijiajia\OneBot\Contracts\Action;

use Weijiajia\OneBot\Self\SelfInterface;

interface ActionInterface
{
    public function getAction(): string;

    public function getParams(): array;

    public function getEcho(): ?string;

    public function getSelfInfo(): ?SelfInterface;

    public function getParam(string $key,mixed $default = null);
}