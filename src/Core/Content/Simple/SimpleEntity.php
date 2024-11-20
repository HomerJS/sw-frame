<?php declare(strict_types=1);

namespace Ihor\Frame\Core\Content\Simple;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\CustomFields;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as AttributeEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Translations;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCustomFieldsTrait;
use Shopware\Core\Framework\Struct\ArrayEntity;


#[AttributeEntity('simple')]
class SimpleEntity extends Entity
{
    use EntityCustomFieldsTrait;

    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $id;

//    #[Field(type: FieldType::STRING)]
//    public ?string $string;
//
//    #[Field(type: FieldType::TEXT)]
//    public ?string $text = null;

//    #[Field(type: FieldType::INT)]
//    public int $int;

    #[Field(type: FieldType::JSON)]
    public array $json;

    #[Field(type: FieldType::STRING, translated: true)]
    public ?string $transString = null;

    /**
     * @var array<string, ArrayEntity>|null
     */
    #[Required]
    #[Translations]
    public ?array $translations = null;

    #[ForeignKey(entity: 'product')]
    public ?string $productId = null;

    #[ManyToOne(entity: 'product', onDelete: onDelete::SET_NULL)]
    public ?ProductEntity $product = null;

    //    API

}