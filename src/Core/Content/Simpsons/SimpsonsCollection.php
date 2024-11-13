<?php declare(strict_types=1);

namespace Ihor\Frame\Core\Content\Simpsons;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class SimpsonsCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SimpsonsEntity::class;
    }
}