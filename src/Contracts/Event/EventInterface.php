<?php

namespace Weijiajia\OneBot\Contracts\Event;

interface EventInterface
{
    /**
     * @return string 事件唯一标识符
     */
    public function getId(): string;

    /**
     * @return float 事件发生时间（Unix 时间戳），单位：秒，建议优先采用聊天平台给出的时间，其次采用实现中创建事件对象的时间
     */
    public function getTime(): float;

    /**
     * @return string 事件类型，必须是 meta、message、notice、request 中的一个，分别表示元事件、消息事件、通知事件和请求事件
     */
    public function getType(): string;

    /**
     * @return string 事件详细类型
     */

    public function getDetailType(): string;

    /**
     * @return string 事件子类型（详细类型的下一级类型）
     */
    public function getSubType(): string;


}