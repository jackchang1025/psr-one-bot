<?php

namespace Psr\OneBot\Event\Meta;

use Psr\OneBot\Contracts\Event\MetaEventInterface;
use Psr\OneBot\Event\Event;

class MetaEvent extends Event implements MetaEventInterface
{
    public function __construct(string $id, float $time,string $detailType, string $subType) {
        parent::__construct($id, $time, 'meta',$detailType,$subType);
    }
}