<?php

namespace Psr\OneBot\Message;

use App\Service\Adapter\EventBuild;
use App\Service\Adapter\MessageType;
use Self;
use Psr\OneBot\Event\Event;

class MessageFormat
{
    public static function formatRemoteServiceOneBot(array $data): Event
    {
        $eventBuild = new EventBuild();
        $eventBuild->setId(uniqid())
            ->setTime($data['data']['timestamp'] / 1000)
            ->setSelf(new Self('wechat', $data['wcId']))
            ->setMessageId((string)$data['data']['msgId'])
            ->setUserId((string)$data['wcId']);

        // 根据消息类型设置事件类型
        $messageType     = (string)$data['messageType'];
        $messageTypeEnum = MessageType::tryFrom($messageType);

        if ($messageTypeEnum === null) {
            throw new \Exception('Unknown message type: '.$messageType);
        }

        $message = self::formatRemoteServiceMessage($data);

        $eventBuild->setType(self::determineType($messageTypeEnum))
            ->setSubType($messageTypeEnum->name)
            ->setDetailType(self::determineDetailType($messageTypeEnum))
            ->setMessage($message)
            ->setAltMessage($message->toString());

        var_dump($eventBuild);

        return $eventBuild->build();
    }

    private static function determineType(MessageType $messageTypeEnum): string
    {
        return match (true) {
            in_array($messageTypeEnum, MessageType::metaTypes()) => 'meta',
            in_array($messageTypeEnum, MessageType::noticeTypes()) => 'notice',
            in_array($messageTypeEnum, MessageType::privateMessageTypes()), in_array(
                $messageTypeEnum,
                MessageType::groupMessageTypes()
            ) => 'message',
            default => throw new \Exception('Unsupported message type: '.$messageTypeEnum->value),
        };
    }

    private static function determineDetailType(MessageType $messageTypeEnum): string
    {
        return match (true) {
            in_array($messageTypeEnum, MessageType::privateMessageTypes()) => 'private',
            in_array($messageTypeEnum, MessageType::groupMessageTypes()) => 'group',
            default => throw new \Exception('Unsupported message type: '.$messageTypeEnum->value),
        };
    }

    public static function formatRemoteServiceMessage(array $data): Message
    {
        // 使用枚举值进行匹配
        return match ($data['messageType']) {
            // 文本
            MessageType::PRIVATE_TEXT->value, MessageType::GROUP_TEXT->value => new Message(
                MessageSegment::text($data['data']['content'])
            ),
            // 图片
            MessageType::PRIVATE_IMAGE->value, MessageType::GROUP_IMAGE->value => new Message(
                MessageSegment::image($data['data']['content'])
            ),
            // 语音
            MessageType::PRIVATE_VOICE->value, MessageType::GROUP_VOICE->value => new Message(
                MessageSegment::voice($data['data']['content'])
            ),
            // 视频
            MessageType::PRIVATE_VIDEO->value, MessageType::GROUP_VIDEO->value => new Message(
                MessageSegment::video($data['data']['content'])
            ),
            // 卡片
            MessageType::PRIVATE_CARD->value, MessageType::GROUP_CARD->value => new Message(
                MessageSegment::create('card', $data['data'])
            ),
            // emoji
            MessageType::PRIVATE_EMOJI->value, MessageType::GROUP_EMOJI->value => new Message(
                MessageSegment::create('emoji', $data['data'])
            ),
            // link
            MessageType::PRIVATE_LINK->value, MessageType::GROUP_LINK->value => new Message(
                MessageSegment::create('link', $data['data'])
            ),
            // file
            MessageType::PRIVATE_FILE->value, MessageType::GROUP_FILE->value => new Message(
                MessageSegment::create('file', $data['data'])
            ),
            // 小程序
            MessageType::PRIVATE_MINI_PROGRAM->value, MessageType::GROUP_MINI_PROGRAM->value => new Message(
                MessageSegment::create('mini_program', $data['data'])
            ),
            // 聊天历史
            MessageType::PRIVATE_CHAT_HISTORY->value, MessageType::GROUP_CHAT_HISTORY->value => new Message(
                MessageSegment::create('chat_history', $data['data'])
            ),
            // 语音聊天
            MessageType::PRIVATE_VOICE_CHAT->value, MessageType::GROUP_VOICE_CHAT->value => new Message(
                MessageSegment::create('voice_chat', $data['data'])
            ),
            // 语音聊天结束
            MessageType::PRIVATE_VOICE_CHAT_HANGUP->value => new Message(
                MessageSegment::create('voice_chat_hangup', $data['data'])
            ),
            // 引用消息
            MessageType::PRIVATE_QUOTE_MESSAGE->value, MessageType::GROUP_QUOTE_MESSAGE->value => new Message(
                MessageSegment::create('quote_message', $data['data'])
            ),
            // 转账
            MessageType::PRIVATE_TRANSFER->value, MessageType::GROUP_TRANSFER->value => new Message(
                MessageSegment::create('transfer', $data['data'])
            ),
            // 撤回消息
            MessageType::PRIVATE_RED_PACKET->value, MessageType::GROUP_RED_PACKET->value => new Message(
                MessageSegment::create('recalled_message', $data['data'])
            ),
            // 默认情况处理未识别的消息类型
            default => new Message(MessageSegment::text("Unrecognized message type: " . $data['messageType']))
        };
    }

}