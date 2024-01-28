<?php

namespace Weijiajia\OneBot\Contracts\Message;

interface MessageInterface
{
    /**
     *
     * @return array
     */
    public function toArray():array;

    /**
     * @return string 消息的唯一标识符
     */
    public function getMessageId() : string;

    /**
     * @return string
     */
    public function getAltMessage():string;
}