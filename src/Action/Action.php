<?php

namespace Weijiajia\OneBot\Action;

use Weijiajia\OneBot\Contracts\Action\ActionInterface;
use Weijiajia\OneBot\Self\SelfInterface;

class Action implements ActionInterface
{
    public function __construct(protected string $action,protected SelfInterface $self,protected array $params,protected ?string $echo = null) {

    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function setSelf(SelfInterface $self): void
    {
        $this->self = $self;
    }

    public function setEcho(?string $echo): void
    {
        $this->echo = $echo;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getEcho(): ?string
    {
        return $this->echo;
    }

    public function getSelfInfo(): ?SelfInterface
    {
        return $this->self;
    }

    public function getParam(string $key,mixed $default = null)
    {
        return $this->params[$key] ?? $default;
    }
}