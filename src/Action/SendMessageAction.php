<?php

namespace Psr\OneBot\Action;

use InvalidArgumentException;
use Psr\OneBot\Contracts\Entity\ChannelInterface;
use Psr\OneBot\Contracts\Entity\EntityInterface;
use Psr\OneBot\Contracts\Entity\FriendInterface;
use Psr\OneBot\Contracts\Entity\GroupInterface;
use Psr\OneBot\Contracts\Message\MessageInterface;
use Psr\OneBot\Message\Message;
use Psr\OneBot\Self\SelfInterface;

class SendMessageAction extends Action
{
    /**
     * 构造函数
     *
     * @param EntityInterface $entity 接收消息的实体（好友、群组或频道）
     * @param Message $message 要发送的消息对象
     * @param \ Psr\OneBot\Self\SelfInterface $self 机器人自身标识
     * @param string|null $echo 可用于标识动作请求的 echo 字段
     */
    public function __construct(
        protected EntityInterface $entity,
        protected MessageInterface $message,
        SelfInterface $self,
        ?string $echo = null
    ) {
        parent::__construct(action: "send_message", self: $self, params: $this->getParams(), echo: $echo);
    }

    /**
     * 获取动作请求的参数
     *
     * @return array 动作请求的参数数组
     */
    public function getParams(): array
    {
        // 基本参数
        $params = [
            'detail_type' => $this->entity->getDetailType(), // 使用方法获取细节类型
            'message'     => $this->message->toArray(), // 确保这个方法存在
        ];

        // 根据实体类型添加额外参数
        $params = match (true) {
            $this->entity instanceof FriendInterface => array_merge($params, ['user_id' => $this->entity->getUserId()]),
            $this->entity instanceof GroupInterface => array_merge($params, ['group_id' => $this->entity->getGroupId()]
            ),
            $this->entity instanceof ChannelInterface => array_merge($params, [
                'guild_id'   => $this->entity->getGuildId(),
                'channel_id' => $this->entity->getChannelId(),
            ]),
            default => throw new InvalidArgumentException('Invalid entity type')
        };

        return ['params' => $params];
    }
}
