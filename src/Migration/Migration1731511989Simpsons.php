<?php declare(strict_types=1);

namespace Ihor\Frame\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('IhorFrame')]
class Migration1731511989Simpsons extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1731511989;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            ALTER TABLE simpsons ADD json JSON DEFAULT NULL;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
