<?php declare(strict_types=1);

namespace Ihor\Frame\Services;

use Ihor\Frame\Core\Content\Simple\Event\TestEvent;
use Ihor\Frame\Core\Content\Simple\SimpleEntity;
use Shopware\Core\Framework\Context;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class SimpleEventService
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function fireEvent(SimpleEntity $simpleEntity, Context $context): void
    {
        var_dump('123');
        $this->eventDispatcher->dispatch(new TestEvent($simpleEntity, $context), "ihor_frame_test_event");
        var_dump('456');
    }
}