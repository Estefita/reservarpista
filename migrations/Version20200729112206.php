<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200729112206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autocomplete (id INT AUTO_INCREMENT NOT NULL, textobusqueda VARCHAR(600) NOT NULL, tipo VARCHAR(2) NOT NULL, admin1code VARCHAR(20) DEFAULT NULL, admin2code VARCHAR(80) DEFAULT NULL, admin3code VARCHAR(20) DEFAULT NULL, admin4code VARCHAR(20) DEFAULT NULL, idclub INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nomres VARCHAR(50) NOT NULL, nomclub VARCHAR(100) NOT NULL, direccion VARCHAR(200) NOT NULL, telefono INT NOT NULL, web VARCHAR(100) NOT NULL, admin1code VARCHAR(200) DEFAULT NULL, admin2code VARCHAR(255) NOT NULL, admin3code VARCHAR(255) NOT NULL, fechacreacion DATETIME NOT NULL, descripcion LONGTEXT DEFAULT NULL, INDEX IDX_B8EE3872A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, mensaje LONGTEXT NOT NULL, fechacreacion DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deporte (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, imagen LONGTEXT DEFAULT NULL, fechacreacion DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE geoname (geonameid INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) DEFAULT NULL, asciiname VARCHAR(200) DEFAULT NULL, alternatenames VARCHAR(10000) DEFAULT NULL, latitude NUMERIC(10, 0) DEFAULT NULL, longitude NUMERIC(10, 0) DEFAULT NULL, featureclass VARCHAR(1) DEFAULT NULL, featurecode VARCHAR(10) DEFAULT NULL, countrycode VARCHAR(2) DEFAULT NULL, cc2 VARCHAR(200) DEFAULT NULL, admin1code VARCHAR(20) DEFAULT NULL, admin2code VARCHAR(80) DEFAULT NULL, admin3code VARCHAR(20) DEFAULT NULL, admin4code VARCHAR(20) DEFAULT NULL, population INT DEFAULT NULL, elevation INT DEFAULT NULL, dem INT DEFAULT NULL, timezone VARCHAR(40) DEFAULT NULL, modificationdate DATETIME DEFAULT NULL, PRIMARY KEY(geonameid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jugador (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, apellidos VARCHAR(80) NOT NULL, direccion VARCHAR(200) NOT NULL, admin1code VARCHAR(255) NOT NULL, admin2code VARCHAR(255) NOT NULL, admin3code VARCHAR(255) NOT NULL, telefono INT NOT NULL, fechacreacion DATETIME NOT NULL, nombre VARCHAR(50) NOT NULL, INDEX IDX_527D6F18A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pista (id INT AUTO_INCREMENT NOT NULL, deporte_id INT NOT NULL, tipo_id INT NOT NULL, club_id INT DEFAULT NULL, nombre VARCHAR(50) NOT NULL, fechacreacion DATETIME NOT NULL, imagen LONGTEXT DEFAULT NULL, INDEX IDX_5E8F946E239C54DD (deporte_id), INDEX IDX_5E8F946EA9276E6C (tipo_id), INDEX IDX_5E8F946E61190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, idclub INT NOT NULL, horadesde TIME NOT NULL, horahasta TIME NOT NULL, fechareserva DATE NOT NULL, idpista INT NOT NULL, idusuario INT NOT NULL, estado INT DEFAULT NULL, precio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, fechacreacion DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, is_club TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jugador ADD CONSTRAINT FK_527D6F18A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pista ADD CONSTRAINT FK_5E8F946E239C54DD FOREIGN KEY (deporte_id) REFERENCES deporte (id)');
        $this->addSql('ALTER TABLE pista ADD CONSTRAINT FK_5E8F946EA9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo (id)');
        $this->addSql('ALTER TABLE pista ADD CONSTRAINT FK_5E8F946E61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pista DROP FOREIGN KEY FK_5E8F946E61190A32');
        $this->addSql('ALTER TABLE pista DROP FOREIGN KEY FK_5E8F946E239C54DD');
        $this->addSql('ALTER TABLE pista DROP FOREIGN KEY FK_5E8F946EA9276E6C');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872A76ED395');
        $this->addSql('ALTER TABLE jugador DROP FOREIGN KEY FK_527D6F18A76ED395');
        $this->addSql('DROP TABLE autocomplete');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE contacto');
        $this->addSql('DROP TABLE deporte');
        $this->addSql('DROP TABLE geoname');
        $this->addSql('DROP TABLE jugador');
        $this->addSql('DROP TABLE pista');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE tipo');
        $this->addSql('DROP TABLE user');
    }
}
