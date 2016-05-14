<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160514133806 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('
            CREATE TABLE `articles` (
                `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
                `user_id` INT(11) NOT NULL,
                `title` VARCHAR(255) NOT NULL,
                `text` TEXT NOT NULL,
                `status` TINYINT(1) NOT NULL,
                `view_count` INT(11) NOT NULL,
                `created` DATETIME NOT NULL,
                `updated` DATETIME NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
