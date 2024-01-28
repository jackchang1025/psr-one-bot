<?php

namespace Psr\OneBot\Event\Notice\Group;

use Psr\OneBot\Contracts\Entity\GroupInterface;
use Psr\OneBot\Contracts\Event\GroupNoticeEventInterface;
use Psr\OneBot\Event\Notice\NoticeEvent;
use Psr\OneBot\Self\SelfInterface;

class GroupMessageDeleteEvent extends NoticeEvent implements GroupNoticeEventInterface
{

    /**
     * @param string $id
     * @param float $time
     * @param \ Psr\OneBot\Self\SelfInterface $self
     * @param GroupInterface $group
     * @param string $operatorId 操作者 ID
     */
    public function __construct(string $id, float $time, SelfInterface $self, protected GroupInterface $group,protected string $operatorId) {
        parent::__construct(
            id: $id,
            time: $time,
            detailType: 'group_message_delete',
            entity: $this->group,
            self: $self,
            subType: 'recall'
        );
    }

    public function getGroup(): GroupInterface
    {
        return $this->group;
    }
}