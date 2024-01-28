<?php

namespace Psr\OneBot\Event\Meta;

class StatusUpdateEvent extends MetaEvent
{

    public function __construct(string $id, float $time, string $subType, public array $status)
    {
        parent::__construct($id, $time, 'status_update', $subType);
    }
}