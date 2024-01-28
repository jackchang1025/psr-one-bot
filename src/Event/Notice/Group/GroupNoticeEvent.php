<?php

namespace Psr\OneBot\Event\Notice\Group;

use Psr\OneBot\Contracts\Entity\GroupInterface;
use Psr\OneBot\Contracts\Event\GroupNoticeEventInterface;
use Psr\OneBot\Event\Notice\NoticeEvent;
use Psr\OneBot\Self\SelfInterface;

class GroupNoticeEvent extends NoticeEvent implements GroupNoticeEventInterface
{

    /**
     * @param string $id
     * @param float $time
     * @param string $detailType
     * @param SelfInterface $self
     * @param GroupInterface $group
     * @param string $operatorId
     * @param string $subType
     */
    public function __construct(string $id, float $time, string $detailType,SelfInterface $self, protected GroupInterface $group,protected string $operatorId,string $subType = '') {
        parent::__construct(
            id: $id,
            time: $time,
            detailType: $detailType,
            entity: $this->group,
            self: $self,
            subType: $subType
        );
    }

    public function getGroup(): GroupInterface
    {
        return $this->group;
    }
}