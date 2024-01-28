<?php

namespace Weijiajia\OneBot\Event\Notice\Group;

use Weijiajia\OneBot\Contracts\Entity\GroupInterface;
use Weijiajia\OneBot\Contracts\Event\GroupNoticeEventInterface;
use Weijiajia\OneBot\Event\Notice\NoticeEvent;
use Weijiajia\OneBot\Self\SelfInterface;

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