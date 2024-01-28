<?php

namespace Psr\OneBot\Message;

use Doctrine\Common\Collections\ArrayCollection;
use Psr\OneBot\Contracts\Message\MessageInterface;

class Message implements \JsonSerializable, \IteratorAggregate,MessageInterface
{
    public ArrayCollection $data;

    public function __construct(MessageSegment ...$messageSegment)
    {
        $this->data = new ArrayCollection($messageSegment);
    }

    public static function create(MessageSegment ...$messageSegment): self
    {
        return new self(...$messageSegment);
    }

    public function addMessageSegment(MessageSegment $messageSegment): self
    {
        $this->data->add($messageSegment);
        return $this;
    }

    public function toString(): string
    {
        return $this->data->filter(fn(MessageSegment $messageSegment) => $messageSegment->type == 'text')
            ->map(function (MessageSegment $messageSegment){
            return $messageSegment->data['text'] ?? '';
        });
    }

    public function toArray(): array
    {
        return $this->data->toArray();
    }

    public function jsonSerialize(): string
    {
        return serialize($this->toJson());
    }

    public function toJson(): string
    {
        return json_encode($this->data->toArray());
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this);
    }

    public function getMessageId(): string
    {
        // TODO: Implement getMessageId() method.
    }

    public function getAltMessage(): string
    {
        // TODO: Implement getAltMessage() method.
    }
}