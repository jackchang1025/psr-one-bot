<?php

namespace Psr\OneBot\Event\Notice\Group;

use Psr\OneBot\Contracts\Entity\GroupInterface;
use Psr\OneBot\Contracts\Event\GroupNoticeEventInterface;
use Psr\OneBot\Event\Notice\NoticeEvent;
use Psr\OneBot\Self\SelfInterface;

class GroupMemberIncreaseEvent extends NoticeEvent implements GroupNoticeEventInterface
{
    public function __construct(string $id, float $time, SelfInterface $self, protected GroupInterface $group,protected string $operatorId) {
        parent::__construct(
            id: $id,
            time: $time,
            detailType: 'group_member_increase',
            entity: $this->group,
            self: $self,
            subType: 'join'
        );
    }

    public function getGroup(): GroupInterface
    {
        return $this->group;
    }
}