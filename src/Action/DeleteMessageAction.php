<?php

namespace Weijiajia\OneBot\Action;

use Weijiajia\OneBot\Self\SelfInterface;

class DeleteMessageAction extends Action
{
    /**
     * 构造函数
     *
     * @param string $messageId
     * @param string|null $echo 可用于标识动作请求的 echo 字段
     * @param SelfInterface|null $self 机器人自身标识
     */
    public function __construct(
        protected string $messageId,
        ?string $echo = null,
        ?SelfInterface $self = null
    ) {
        parent::__construct(action: "delete_message", self: $self, params: $this->getParams(), echo: $echo);
    }

    /**
     * 获取动作请求的参数
     *
     * @return array 动作请求的参数数组
     */
    public function getParams(): array
    {
        return ['params' => ['message_id' => $this->messageId]];
    }
}
