<?php declare(strict_types=1);

namespace Ihor\Frame\Core\Content\Simple\Event;

use Ihor\Frame\Core\Content\Simple\SimpleEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Event\ShopwareEvent;

class TestEvent implements ShopwareEvent
{
    protected SimpleEntity $simpleEntity;

    protected Context $context;

    public function __construct(SimpleEntity $simpleEntity, Context $context)
    {
        $this->simpleEntity = $simpleEntity;
        $this->context = $context;
    }
    public function getEntity(): SimpleEntity
    {
        return $this->simpleEntity;
    }

    public function getContext(): Context
    {
        return $this->context;
    }
}