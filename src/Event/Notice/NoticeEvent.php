<?php

namespace Weijiajia\OneBot\Event\Notice;

use Weijiajia\OneBot\Contracts\Entity\EntityInterface;
use Weijiajia\OneBot\Contracts\Event\NoticeEventInterface;
use Weijiajia\OneBot\Event\Event;
use Weijiajia\OneBot\Self\SelfInterface;

class NoticeEvent extends Event implements NoticeEventInterface
{
    public function __construct(string $id, float $time, string $detailType,  protected EntityInterface $entity,protected SelfInterface $self,string $subType = '') {
        parent::__construct(id:$id, time: $time, type: 'notice', detailType: $detailType, subType: $subType);
    }

    public function getEntity(): EntityInterface
    {
        return $this->entity;
    }

    public function getSelf(): SelfInterface
    {
        return $this->self;
    }
}