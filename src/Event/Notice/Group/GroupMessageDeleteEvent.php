<?php

namespace Weijiajia\OneBot\Event\Notice\Group;

use Weijiajia\OneBot\Contracts\Entity\GroupInterface;
use Weijiajia\OneBot\Contracts\Event\GroupNoticeEventInterface;
use Weijiajia\OneBot\Event\Notice\NoticeEvent;
use Weijiajia\OneBot\Self\SelfInterface;

class GroupMessageDeleteEvent extends NoticeEvent implements GroupNoticeEventInterface
{

    /**
     * @param string $id
     * @param float $time
     * @param SelfInterface $self
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