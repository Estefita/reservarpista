<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200716151237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE geoname (id INT AUTO_INCREMENT NOT NULL, geonameid INT NOT NULL, name VARCHAR(200) DEFAULT NULL, asciiname VARCHAR(200) DEFAULT NULL, alternatenames VARCHAR(10000) DEFAULT NULL, latitude NUMERIC(10, 0) DEFAULT NULL, longitude NUMERIC(10, 0) DEFAULT NULL, featureclass VARCHAR(1) DEFAULT NULL, featurecode VARCHAR(10) DEFAULT NULL, countrycode VARCHAR(2) DEFAULT NULL, cc2 VARCHAR(200) DEFAULT NULL, admin1code VARCHAR(20) DEFAULT NULL, admin2code VARCHAR(80) DEFAULT NULL, admin3code VARCHAR(20) DEFAULT NULL, admin4code VARCHAR(20) DEFAULT NULL, population INT DEFAULT NULL, elevation INT DEFAULT NULL, dem INT DEFAULT NULL, timezone VARCHAR(40) DEFAULT NULL, modificationdate DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE geoname');
    }
}
