<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200716202856 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prueba MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE prueba DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prueba ADD idsecond INT NOT NULL, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE prueba ADD PRIMARY KEY (id, idsecond)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prueba DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prueba DROP idsecond, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE prueba ADD PRIMARY KEY (id)');
    }
}
