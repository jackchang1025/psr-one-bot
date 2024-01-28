<?php

namespace Weijiajia\OneBot\Event;

class OneBotEvent
{
    /**
     * @var string 事件唯一标识符
     */
    public string $id;
    /**
     * @var float 事件发生时间（Unix 时间戳），单位：秒，建议优先采用聊天平台给出的时间，其次采用实现中创建事件对象的时间
     */
    public float $time;
    /**
     * @var string 事件类型，必须是 meta、message、notice、request 中的一个，分别表示元事件、消息事件、通知事件和请求事件
     */
    public string $type;

    /**
     * @var string 事件详细类型
     */
    public string $detailType;
    /**
     * @var string 事件子类型（详细类型的下一级类型）
     */
    public string $subType;

    public function __construct(string $id, float $time, string $type, string $detailType, string $subType)
    {
        $this->id         = $id;
        $this->time       = $time;
        $this->type       = $type;
        $this->detailType = $detailType;
        $this->subType    = $subType;
    }
}