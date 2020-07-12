<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200712122638 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pista ADD tipo_id INT NOT NULL');
        $this->addSql('ALTER TABLE pista ADD CONSTRAINT FK_5E8F946EA9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo (id)');
        $this->addSql('CREATE INDEX IDX_5E8F946EA9276E6C ON pista (tipo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pista DROP FOREIGN KEY FK_5E8F946EA9276E6C');
        $this->addSql('DROP INDEX IDX_5E8F946EA9276E6C ON pista');
        $this->addSql('ALTER TABLE pista DROP tipo_id');
    }
}
