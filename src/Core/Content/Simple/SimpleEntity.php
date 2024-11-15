<?php declare(strict_types=1);

namespace Ihor\Frame\Core\Content\Simple;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as AttributeEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;


#[AttributeEntity('simple')]
class SimpleEntity extends Entity
{
    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $id;

    #[Field(type: FieldType::STRING)]
    public ?string $string;

    #[Field(type: FieldType::TEXT)]
    public ?string $text = null;

    #[Field(type: FieldType::INT)]
    public int $int;

    #[Field(type: FieldType::JSON)]
    public array $json;

    #[ForeignKey(entity: 'product')]
    public ?string $productId = null;

    #[ManyToOne(entity: 'product', onDelete: onDelete::SET_NULL)]
    public ?ProductEntity $product = null;

    //    API
// Translated fields

}