<?php

namespace Weijiajia\OneBot\Entity;

class Friend
{
    public function __construct(public string $userId,public string $detailType = 'private')
    {
    }
}