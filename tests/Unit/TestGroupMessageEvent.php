<?php

namespace  Psr\OneBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use  Psr\OneBot\Contracts\Entity\GroupInterface;
use  Psr\OneBot\Entity\Group;
use  Psr\OneBot\Event\Message\GroupMessageEvent;
use  Psr\OneBot\Message\Message;
use  Psr\OneBot\Message\MessageSegment;
use  Psr\OneBot\Self\SelfInfo;

class TestGroupMessageEvent extends TestCase
{
    public function testBuildGroupMessageEvent()
    {
        $groupMessageEvent = new GroupMessageEvent(
            id: uniqid(),
            time: time(),
            self: new SelfInfo('wechat',uniqid()),
            message: new Message(MessageSegment::text('hello'),MessageSegment::image(unlink(__DIR__ . '/test.jpg'))),
            entity: new Group(uniqid())
        );

        $this->assertEquals('message',$groupMessageEvent->getType());
        $this->assertInstanceOf(GroupInterface::class,$groupMessageEvent->getEntity());

        $group = $groupMessageEvent->getEntity();
        if ( $group instanceof  GroupInterface::class){
            $this->assertNotNull($group->getGroupId());
        }

        $message = $groupMessageEvent->getMessage();
        $message->getMessageId();
        $message->getAltMessage();
        $message->toArray();

        $self = $groupMessageEvent->getSelf();
        $self->getPlatform();
        $self->getBotId();
        $self->getUserId();

    }
}