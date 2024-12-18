<?php declare(strict_types=1);

namespace Ihor\Frame\MessageQueue\Message\Middleware;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class AsyncMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        file_put_contents('t1.txt', 'test');

        // don't forget to call the next middleware
        return $stack->next()->handle($envelope, $stack);
    }
}