<?php declare(strict_types=1);

namespace Ihor\Frame\MessageQueue\Message;

use Shopware\Core\Framework\MessageQueue\AsyncMessageInterface;

class AsyncMessage implements AsyncMessageInterface
{
    public function __construct(private readonly string $content)
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }
}