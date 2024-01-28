<?php

namespace Weijiajia\OneBot\Event;

use Weijiajia\OneBot\Contracts\Event\EventInterface;

class Event implements EventInterface
{

    /**
     * @param string $id 事件唯一标识符
     * @param float $time 事件发生时间（Unix 时间戳），单位：秒，建议优先采用聊天平台给出的时间，其次采用实现中创建事件对象的时间
     * @param string $type 事件类型，必须是 meta、message、notice、request 中的一个，分别表示元事件、消息事件、通知事件和请求事件
     * @param string $detailType 事件详细类型
     * @param string $subType 事件子类型（详细类型的下一级类型）
     */
    public function __construct(protected string $id, protected float $time,protected string $type,protected string $detailType,protected string $subType = '')
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTime(): float
    {
        return $this->time;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDetailType(): string
    {
        return $this->detailType;
    }

    public function getSubType(): string
    {
        return $this->subType;
    }


}