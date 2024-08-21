<?php declare(strict_types=1);

namespace Ihor\Frame\Entity;

use Shopware\Core\Framework\Api\Context\AdminApiSource;
use Shopware\Core\Framework\Api\Context\SalesChannelApiSource;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\AutoIncrement;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToMany;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OneToMany;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OneToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Serialized;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Translations;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCustomFieldsTrait;
use Shopware\Core\Framework\DataAbstractionLayer\FieldSerializer\PriceFieldSerializer;
use Shopware\Core\Framework\DataAbstractionLayer\Pricing\PriceCollection;
use Shopware\Core\Framework\Struct\ArrayEntity;
use Shopware\Core\System\Currency\CurrencyEntity;

#[EntityAttribute('test_entity')]
class TestEntity extends Entity
{
    use EntityCustomFieldsTrait;

    #[PrimaryKey]
    #[Field(type: FieldType::UUID, api: true)]
    public string $id;

    #[Field(type: FieldType::STRING)]
    public string $string;

    #[Field(type: FieldType::TEXT)]
    public ?string $text = null;

    #[Field(type: FieldType::INT)]
    public ?int $int;

    #[AutoIncrement]
    public int $autoIncrement;

    #[ForeignKey(entity: 'currency')]
    public ?string $foreignKey;

    #[Serialized(serializer: PriceFieldSerializer::class)]
    public ?PriceCollection $serialized = null;

    #[Field(type: FieldType::STRING, api: true)]
    public string $everywhere;

    #[Field(type: FieldType::STRING, api: [AdminApiSource::class])]
    public string $adminOnly;

    #[Field(type: FieldType::STRING, api: [SalesChannelApiSource::class])]
    public string $storeOnly;

    #[Field(type: FieldType::STRING, translated: true)]
    public ?string $trans = null;

    /**
     * @var array<string, ArrayEntity>|null
     */
    #[Translations]
    public ?array $translations = null;

    #[Required]
    #[Field(type: FieldType::STRING, translated: true)]
    public ?string $required = null;

    //////////////// Associations
    #[ForeignKey(entity: 'currency')]
    public ?string $currencyId = null;

    #[ForeignKey(entity: 'currency')]
    public ?string $followId = null;

    #[ManyToOne(entity: 'currency')]
    public ?CurrencyEntity $currency = null;

    #[OneToOne(entity: 'currency')]
    public ?CurrencyEntity $follow = null;

    #[OneToMany(entity: 'example_entity_agg', ref: 'example_entity_id')]
    public ?array $aggs = null;

    /**
     * @var array<string, CurrencyEntity>|null
     */
    #[ManyToMany(entity: 'currency')]
    public ?array $currencies = null;
}