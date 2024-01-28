<?php

namespace Weijiajia\OneBot\Event\Meta;

use Weijiajia\OneBot\Contracts\Event\MetaEventInterface;
use Weijiajia\OneBot\Event\Event;

class MetaEvent extends Event implements MetaEventInterface
{
    public function __construct(string $id, float $time,string $detailType, string $subType) {
        parent::__construct($id, $time, 'meta',$detailType,$subType);
    }
}