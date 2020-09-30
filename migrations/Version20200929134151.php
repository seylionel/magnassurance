<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200929134151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agency_city (agency_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_3A5C1E3CCDEADB2A (agency_id), INDEX IDX_3A5C1E3C8BAC62AF (city_id), PRIMARY KEY(agency_id, city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, prospect_id INT NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, INDEX IDX_773DE69DD182060A (prospect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agency_city ADD CONSTRAINT FK_3A5C1E3CCDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agency_city ADD CONSTRAINT FK_3A5C1E3C8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DD182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
        $this->addSql('DROP TABLE body_accident');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE cars_forms');
        $this->addSql('DROP TABLE health_forethought');
        $this->addSql('DROP TABLE house_property');
        $this->addSql('DROP TABLE saving_pension');
        $this->addSql('ALTER TABLE agency ADD user_id INT NOT NULL, ADD city_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD phone_number VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE agency ADD CONSTRAINT FK_70C0C6E6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE agency ADD CONSTRAINT FK_70C0C6E68BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_70C0C6E6A76ED395 ON agency (user_id)');
        $this->addSql('CREATE INDEX IDX_70C0C6E68BAC62AF ON agency (city_id)');
        $this->addSql('ALTER TABLE city ADD name VARCHAR(255) NOT NULL, ADD cp SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD user_id INT NOT NULL, ADD filename VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_90651744A76ED395 ON invoice (user_id)');
        $this->addSql('ALTER TABLE prospect ADD first_name VARCHAR(255) NOT NULL, ADD birthdate DATE NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD phone_number LONGTEXT DEFAULT NULL, ADD guid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', ADD created_at DATETIME NOT NULL, CHANGE lastname last_name LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE quote ADD prospect_id INT NOT NULL, ADD agency_id INT NOT NULL, ADD file_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4D182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4CDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4D182060A ON quote (prospect_id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4CDEADB2A ON quote (agency_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agency DROP FOREIGN KEY FK_70C0C6E6A76ED395');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744A76ED395');
        $this->addSql('CREATE TABLE body_accident (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, label LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cars_forms (id INT AUTO_INCREMENT NOT NULL, prospects_id INT NOT NULL, modele LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, model LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, brand LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, power SMALLINT NOT NULL, gas LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, registration VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, has_insurance TINYINT(1) NOT NULL, INDEX IDX_67724871775D63D (prospects_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE health_forethought (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE house_property (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE saving_pension (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cars_forms ADD CONSTRAINT FK_67724871775D63D FOREIGN KEY (prospects_id) REFERENCES prospect (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE agency_city');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE agency DROP FOREIGN KEY FK_70C0C6E68BAC62AF');
        $this->addSql('DROP INDEX IDX_70C0C6E6A76ED395 ON agency');
        $this->addSql('DROP INDEX IDX_70C0C6E68BAC62AF ON agency');
        $this->addSql('ALTER TABLE agency DROP user_id, DROP city_id, DROP name, DROP phone_number');
        $this->addSql('ALTER TABLE city DROP name, DROP cp');
        $this->addSql('DROP INDEX IDX_90651744A76ED395 ON invoice');
        $this->addSql('ALTER TABLE invoice DROP user_id, DROP filename, DROP created_at');
        $this->addSql('ALTER TABLE prospect DROP first_name, DROP birthdate, DROP email, DROP phone_number, DROP guid, DROP created_at, CHANGE last_name lastname LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4D182060A');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4CDEADB2A');
        $this->addSql('DROP INDEX IDX_6B71CBF4D182060A ON quote');
        $this->addSql('DROP INDEX IDX_6B71CBF4CDEADB2A ON quote');
        $this->addSql('ALTER TABLE quote DROP prospect_id, DROP agency_id, DROP file_name');
    }
}
