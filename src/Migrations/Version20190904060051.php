<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904060051 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kirola (id INT AUTO_INCREMENT NOT NULL, espedientea LONGTEXT DEFAULT NULL, data LONGTEXT DEFAULT NULL, sailkapena LONGTEXT DEFAULT NULL, signatura VARCHAR(255) DEFAULT NULL, oharrak LONGTEXT DEFAULT NULL, numdoc VARCHAR(255) DEFAULT NULL, knosysid VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP INDEX fulltext_index ON amp');
        $this->addSql('DROP INDEX fulltex_index ON anarbe');
        $this->addSql('DROP INDEX fulltex_index ON argazki');
        $this->addSql('DROP INDEX fulltex_index ON ciriza');
        $this->addSql('DROP INDEX fulltex_index ON consultas');
        $this->addSql('DROP INDEX fulltex_index ON entradas');
        $this->addSql('DROP INDEX fulltex_index ON euskera');
        $this->addSql('DROP INDEX fulltex_index ON gazteria');
        $this->addSql('DROP INDEX fulltex_index ON hutsak');
        $this->addSql('DROP INDEX fulltex_index ON kontratazioa');
        $this->addSql('DROP INDEX fulltex_index ON kultura');
        $this->addSql('DROP INDEX fulltex_index ON liburuxka');
        $this->addSql('DROP INDEX fulltex_index ON obratxikiak');
        $this->addSql('DROP INDEX fulltex_index ON pendientes');
        $this->addSql('DROP INDEX fulltex_index ON protokoloak');
        $this->addSql('DROP INDEX fulltex_index ON salidas');
        $this->addSql('DROP INDEX fulltex_index ON tablas');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE kirola');
        $this->addSql('CREATE FULLTEXT INDEX fulltext_index ON amp (clasificacion, expediente, fecha, observaciones, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON anarbe (clasificacion, expediente, fecha, observaciones, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON argazki (barrutia, deskribapena, fecha, gaia, kolorea, neurria, oharrak, zenbakia)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON ciriza (data, deskribapena, oharrak, sailkapena, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON consultas (enpresa, gaia, helbidea, izena, kontsulta)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON entradas (data, deskribapena, igorlea, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON euskera (data, espedientea, oharrak, sailkapena, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON gazteria (data, espedientea, oharrak, sailkapena, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON hutsak (berria, egoera, signatura, zaharra)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON kontratazioa (espedientea, sailkapena, signatura, urtea)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON kultura (data, espedientea, oharrak, sailkapena, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON liburuxka (azalpenak, data, deskribapena, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON obratxikiak (espedientea, sailkapena, signatura, urtea)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON pendientes (data, espedientea, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON protokoloak (artxiboa, bilatzaileak, data, datuak, eskribaua, laburpena, oharrak, saila, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON salidas (eskatzailea, espedientea, irteera, sarrera, signatura)');
        $this->addSql('CREATE FULLTEXT INDEX fulltex_index ON tablas (fecha, observaciones, resolucion, serie, unidad)');
    }
}
