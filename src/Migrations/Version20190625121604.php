<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190625121604 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE liburuxka ADD deskribapena LONGTEXT DEFAULT NULL, ADD azalpenak TINYTEXT DEFAULT NULL, DROP espedientea, DROP sailkapena, DROP oharrak');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE liburuxka ADD espedientea LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD sailkapena VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD oharrak LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP deskribapena, DROP azalpenak');
    }
}
