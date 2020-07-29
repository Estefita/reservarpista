<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722140741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autocomplete (id INT AUTO_INCREMENT NOT NULL, textobusqueda VARCHAR(600) NOT NULL, tipo VARCHAR(2) NOT NULL, admin1code VARCHAR(20) DEFAULT NULL, admin2code VARCHAR(80) DEFAULT NULL, admin3code VARCHAR(20) DEFAULT NULL, admin4code VARCHAR(20) DEFAULT NULL, idclub INT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE prueba');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prueba (id INT NOT NULL, idsecond INT NOT NULL, PRIMARY KEY(id, idsecond)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE autocomplete');
    }
}
