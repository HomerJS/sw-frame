<?php declare(strict_types=1);

namespace Ihor\Frame\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('IhorFrame')]
class Migration1731937038Simple extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1731937038;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
           ALTER TABLE simple ADD custom_fields JSON DEFAULT NULL;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
