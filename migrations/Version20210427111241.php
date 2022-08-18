<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427111241 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE FULLTEXT INDEX IDX_ED91257B47975B47ADF3F363D3936783 ON liburuxka (deskribapena, data, azalpenak)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_D97E401A943C98CE14D741DF ON obratxikiak (espedientea, sailkapena)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_9E01AA0D943C98CEADF3F363 ON pendientes (espedientea, data)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_5C8B623C8E28DBF64F3178AE399CA53DADF3F36360230A9A9614CD5490A ON protokoloak (artxiboa, saila, eskribaua, data, laburpena, datuak, oharrak, bilatzaileak)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_639CF26E943C98CEA61DCAD2ACA278CDA8C051FE ON salidas (espedientea, eskatzailea, irteera, sarrera)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_ED91257B47975B47ADF3F363D3936783 ON liburuxka');
        $this->addSql('DROP INDEX IDX_D97E401A943C98CE14D741DF ON obratxikiak');
        $this->addSql('DROP INDEX IDX_9E01AA0D943C98CEADF3F363 ON pendientes');
        $this->addSql('DROP INDEX IDX_5C8B623C8E28DBF64F3178AE399CA53DADF3F36360230A9A9614CD5490A ON protokoloak');
        $this->addSql('DROP INDEX IDX_639CF26E943C98CEA61DCAD2ACA278CDA8C051FE ON salidas');
    }
}
