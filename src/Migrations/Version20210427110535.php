<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427110535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE FULLTEXT INDEX IDX_EF599CEA943C98CE14D741DF ON kontratazioa (espedientea, sailkapena)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_822B1695943C98CE14D741DFADF3F36390A206A7 ON kultura (espedientea, sailkapena, data, oharrak)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_EF599CEA943C98CE14D741DF ON kontratazioa');
        $this->addSql('DROP INDEX IDX_822B1695943C98CE14D741DFADF3F36390A206A7 ON kultura');
    }
}
