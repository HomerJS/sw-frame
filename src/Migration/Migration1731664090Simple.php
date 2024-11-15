<?php declare(strict_types=1);

namespace Ihor\Frame\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('IhorFrame')]
class Migration1731664090Simple extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1731664090;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE simple (id BINARY(16) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
