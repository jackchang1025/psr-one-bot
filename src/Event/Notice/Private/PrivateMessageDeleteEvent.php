<?php

namespace Psr\OneBot\Event\Notice\Private;

use Self;
use Psr\OneBot\Event\Notice\NoticeEvent;

class PrivateMessageDeleteEvent extends NoticeEvent
{
    public function __construct(string $id, float $time, Self $self,public string $messageId,public string $userId) {
        parent::__construct($id, $time, 'private_message_delete', '', $self);
    }
}