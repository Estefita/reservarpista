<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200803120404 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE precio_pista (id INT AUTO_INCREMENT NOT NULL, pista_id INT NOT NULL, precio DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_7CDE80314C22F2EB (pista_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE precio_pista ADD CONSTRAINT FK_7CDE80314C22F2EB FOREIGN KEY (pista_id) REFERENCES pista (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE precio_pista');
    }
}
