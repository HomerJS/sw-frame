<?php declare(strict_types=1);

namespace Ihor\Frame\Core\Content\Simpsons;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCustomFieldsTrait;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class SimpsonsEntity extends Entity
{
    use EntityIdTrait;

    public ?string $string;
    public ?string $text;
    public int $int;

    public ?array $json;

//    API
// Translated fields
//Associations

}