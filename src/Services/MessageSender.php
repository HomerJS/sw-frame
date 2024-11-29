<?php declare(strict_types=1);

namespace Ihor\Frame\Services;

use Ihor\Frame\MessageQueue\Message\AsyncMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;

class MessageSender
{
    public function __construct(private readonly MessageBusInterface $bus)
    {
    }

    public function sendMessage(string $message): void
    {
        $message = new AsyncMessage($message);
        $this->bus->dispatch(
            (new Envelope($message))
                ->with(new DelayStamp(5000))
        );
    }
}