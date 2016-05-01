<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160501132939 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE IF NOT EXISTS `users` (
              `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
              `username` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `username_canonical` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
              `email_canonical` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
              `enabled` TINYINT(1) NOT NULL,
              `salt` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
              `password` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
              `last_login` DATETIME DEFAULT NULL,
              `locked` TINYINT(1) NOT NULL,
              `expired` TINYINT(1) NOT NULL,
              `expires_at` DATETIME DEFAULT NULL,
              `confirmation_token` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `password_requested_at` DATETIME DEFAULT NULL,
              `roles` longtext COLLATE utf8_unicode_ci NOT NULL,
              `credentials_expired` TINYINT(1) NOT NULL,
              `credentials_expire_at` DATETIME DEFAULT NULL,
              `confirmation_token_generation_date` DATETIME DEFAULT NULL,
              `updated` DATETIME NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
SQL
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
