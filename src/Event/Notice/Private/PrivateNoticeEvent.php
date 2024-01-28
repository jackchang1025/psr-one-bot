<?php

namespace Psr\OneBot\Event\Notice\Private;

use Self;
use Psr\OneBot\Event\Notice\NoticeEvent;

class PrivateNoticeEvent extends NoticeEvent
{
    public function __construct(string $id, float $time, Self $self,string $userId, string $subType) {
        parent::__construct($id, $time, 'private', $subType, $userId,$self);
    }
}