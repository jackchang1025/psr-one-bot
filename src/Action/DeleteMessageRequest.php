<?php

namespace Weijiajia\OneBot\Action;

use Weijiajia\OneBot\Event\SelfInfo;
use InvalidArgumentException;

class DeleteMessageRequest extends Action
{
    /**
     * 构造函数用于创建撤回消息的动作请求
     *
     * @param string $messageId 消息的唯一标识符
     * @param string|null $echo 可选的请求标识符
     * @param SelfInfo|null $self 可选的机器人自身标识
     */
    public function __construct(
        protected string $messageId,
        ?string $echo = null,
        ?SelfInfo $self = null
    ) {
        if (empty($this->messageId)) {
            throw new InvalidArgumentException('Message ID cannot be empty');
        }

        parent::__construct("delete_message", $this->getParams(), $echo, $self);
    }

    /**
     * 获取请求参数数组
     *
     * @return array 请求参数
     */
    protected function getParams(): array
    {
        return ['message_id' => $this->messageId];
    }
}
