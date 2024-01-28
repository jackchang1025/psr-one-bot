<?php

namespace Psr\OneBot\Event\Meta;

class ConnectEvent extends MetaEvent {

    public function __construct(string $id, float $time,string $subType, public array $version) {
        parent::__construct($id, $time,'connect',$subType);
    }
}