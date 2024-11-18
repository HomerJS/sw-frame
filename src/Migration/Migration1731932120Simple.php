<?php declare(strict_types=1);

namespace Ihor\Frame\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('IhorFrame')]
class Migration1731932120Simple extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1731932120;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE IF NOT EXISTS `simple_translation` (
                `simple_id` BINARY(16) NOT NULL,
                `language_id` BINARY(16) NOT NULL,
                `trans_string` VARCHAR(255),
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`simple_id`, `language_id`),
                CONSTRAINT `fk.simple_translation.simple_id` FOREIGN KEY (`simple_id`)
                    REFERENCES `simple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.simple_translation.language_id` FOREIGN KEY (`language_id`)
                    REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            )
                ENGINE = InnoDB
                DEFAULT CHARSET = utf8mb4
                COLLATE = utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
