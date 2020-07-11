<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710210333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nomres VARCHAR(50) NOT NULL, nomclub VARCHAR(100) NOT NULL, direccion VARCHAR(200) NOT NULL, telefono INT NOT NULL, web VARCHAR(100) NOT NULL, provincia VARCHAR(255) NOT NULL, poblacion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) DEFAULT NULL, email VARCHAR(50) NOT NULL, mensaje LONGTEXT NOT NULL, fechacreacion DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deporte (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, imagen LONGTEXT DEFAULT NULL, fechacreacion DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jugador (id INT AUTO_INCREMENT NOT NULL, apellidos VARCHAR(80) NOT NULL, direccion VARCHAR(200) NOT NULL, provincia VARCHAR(255) NOT NULL, poblacion VARCHAR(255) NOT NULL, telefono INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pista (id INT AUTO_INCREMENT NOT NULL, deporte_id INT NOT NULL, nombre VARCHAR(50) NOT NULL, fechacreacion DATETIME NOT NULL, imagen LONGTEXT DEFAULT NULL, INDEX IDX_5E8F946E239C54DD (deporte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, fechacreacion DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pista ADD CONSTRAINT FK_5E8F946E239C54DD FOREIGN KEY (deporte_id) REFERENCES deporte (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pista DROP FOREIGN KEY FK_5E8F946E239C54DD');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE contacto');
        $this->addSql('DROP TABLE deporte');
        $this->addSql('DROP TABLE jugador');
        $this->addSql('DROP TABLE pista');
        $this->addSql('DROP TABLE tipo');
        $this->addSql('DROP TABLE user');
    }
}
