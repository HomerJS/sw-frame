<?php declare(strict_types=1);

namespace Ihor\Frame\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('IhorFrame')]
class Migration1731678392Simple extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1731678392;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            ALTER TABLE simple ADD product_id BINARY(16) DEFAULT NULL;

ALTER TABLE simple ADD CONSTRAINT fk_simple_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE CASCADE ON DELETE SET NULL;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
