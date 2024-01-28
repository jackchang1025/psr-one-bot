<?php

namespace Weijiajia\OneBot\Event\Meta;


class HeartbeatEvent extends MetaEvent
{

    /**
     * @param string $id
     * @param float $time
     * @param string $subType
     * @param int $interval 心跳间隔，单位：毫秒，必须大于 0
     */
    public function __construct(string $id, float $time,string $subType, public int $interval)
    {
        parent::__construct($id, $time, 'heartbeat', $subType);
    }
}