<?php declare(strict_types=1);

namespace Ihor\Frame\MessageQueue\Message\Handler;

use Ihor\Frame\MessageQueue\Message\AsyncMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class AsyncHandler
{
    public function __invoke(AsyncMessage $message): void
    {
        file_put_contents('t.txt', $message->getContent());
    }
}