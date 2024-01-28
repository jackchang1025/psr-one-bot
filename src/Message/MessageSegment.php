<?php

namespace Weijiajia\OneBot\Message;

class MessageSegment
{
    public function __construct(public string $type, public array $data) {

    }

    public function getData(): array
    {
        return $this->data;
    }

    public function extendedMessageSegmentParameters(array $params): static
    {
        $this->data = array_merge($this->data, $params);
        return $this;
    }

    public static function text(string $text): MessageSegment
    {
        return new MessageSegment('text', ['text' => $text]);
    }

    public static function mention(string $user_id): MessageSegment
    {
        return new self('mention', ['user_id' => $user_id]);
    }

    public static function mentionAll(): MessageSegment
    {
        return new self('mention_all', []);
    }

    public static function image(string $file_id): MessageSegment
    {
        return new self('image', ['file_id' => $file_id]);
    }
    public static function video(string $file_id): MessageSegment
    {
        return new self('video', ['file_id' => $file_id]);
    }

    public static function voice(string $file_id): MessageSegment
    {
        return new self('voice', ['file_id' => $file_id]);
    }

    public static function file(string $file_id): MessageSegment
    {
        return new self('file', ['file_id' => $file_id]);
    }

    public static function create(string $type,array $data = []): MessageSegment
    {
        return new self($type, $data);
    }

    public static function location($latitude, $longitude, string $title, string $content): MessageSegment
    {
        return new self('location', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'content' => $content,
        ]);
    }

    public static function reply(string $message_id, ?string $user_id = null): MessageSegment
    {
        $data = ['message_id' => $message_id];
        if ($user_id !== null) {
            $data['user_id'] = $user_id;
        }
        return new self('reply', $data);
    }

}