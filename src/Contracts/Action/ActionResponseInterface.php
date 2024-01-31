<?php

namespace Weijiajia\OneBot\Contracts\Action;

interface ActionResponseInterface
{
    public function getStatus(): string;

    public function getRetcode(): int;

    public function getData(): array;

    public function getMessage(): string;

    public function getEcho(): ?string;
}