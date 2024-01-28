<?php

namespace Weijiajia\OneBot\Entity;

use Weijiajia\OneBot\Contracts\Entity\EntityInterface;
use Weijiajia\OneBot\Contracts\Entity\GroupInterface;

class Group implements GroupInterface
{
    public function __construct(protected string $groupId,protected string $detailType = 'group')
    {
    }

    public function getDetailType(): string
    {
        return $this->detailType;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }
}