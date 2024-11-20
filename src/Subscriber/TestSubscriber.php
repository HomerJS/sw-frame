<?php declare(strict_types=1);

namespace Ihor\Frame\Subscriber;

use Ihor\Frame\Core\Content\Simple\Event\TestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TestSubscriber implements EventSubscriberInterface
{
    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            'ihor_frame_test_event' => 'testEventListener'
        ];
    }

    public function testEventListener(TestEvent $event)
    {
        $context = $event->getContext();
        $entity = $event->getEntity();

        var_dump('entity: ' . $entity->id);
    }
}