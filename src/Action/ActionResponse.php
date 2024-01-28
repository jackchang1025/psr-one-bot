<?php

namespace Psr\OneBot\Action;

class ActionResponse
{

    public function __construct(protected string $status, protected int $retcode, protected array $data = [], protected string $message = '', protected ?string $echo = null) {
    }

    public static function createFailed(int $retcode,array $data = [], string $message = '',?string $echo = null): self
    {
        return new self('failed', $retcode, $data, $message,$echo);
    }

    public static function createSuccess(int $retcode = 0,array $data = [], string $message = '',?string $echo = null): self
    {
        return new self('ok', $retcode, $data, $message,$echo);
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getRetcode(): int
    {
        return $this->retcode;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getEcho(): ?string
    {
        return $this->echo;
    }

    public function successful(): bool
    {
        return $this->getStatus() === 'ok';
    }

    public function failed(): bool
    {
        return  $this->getStatus() === 'failed';
    }
}