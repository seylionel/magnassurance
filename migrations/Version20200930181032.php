<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200930181032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agency (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, INDEX IDX_70C0C6E6A76ED395 (user_id), INDEX IDX_70C0C6E68BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agency_city (agency_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_3A5C1E3CCDEADB2A (agency_id), INDEX IDX_3A5C1E3C8BAC62AF (city_id), PRIMARY KEY(agency_id, city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, prospect_id INT NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, power SMALLINT NOT NULL, gas VARCHAR(255) NOT NULL, registration VARCHAR(255) NOT NULL, insurance_exist TINYINT(1) NOT NULL, INDEX IDX_773DE69DD182060A (prospect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, cp SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_90651744A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prospect (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, last_name LONGTEXT NOT NULL, first_name VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, email VARCHAR(255) NOT NULL, phone_number LONGTEXT DEFAULT NULL, guid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', created_at DATETIME NOT NULL, INDEX IDX_C9CE8C7D8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote (id INT AUTO_INCREMENT NOT NULL, prospect_id INT NOT NULL, agency_id INT NOT NULL, file_name VARCHAR(255) NOT NULL, quote_validation TINYINT(1) DEFAULT NULL, INDEX IDX_6B71CBF4D182060A (prospect_id), INDEX IDX_6B71CBF4CDEADB2A (agency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birthdate DATE DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, credit SMALLINT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agency ADD CONSTRAINT FK_70C0C6E6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE agency ADD CONSTRAINT FK_70C0C6E68BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE agency_city ADD CONSTRAINT FK_3A5C1E3CCDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agency_city ADD CONSTRAINT FK_3A5C1E3C8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DD182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prospect ADD CONSTRAINT FK_C9CE8C7D8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4D182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4CDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agency_city DROP FOREIGN KEY FK_3A5C1E3CCDEADB2A');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4CDEADB2A');
        $this->addSql('ALTER TABLE agency DROP FOREIGN KEY FK_70C0C6E68BAC62AF');
        $this->addSql('ALTER TABLE agency_city DROP FOREIGN KEY FK_3A5C1E3C8BAC62AF');
        $this->addSql('ALTER TABLE prospect DROP FOREIGN KEY FK_C9CE8C7D8BAC62AF');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DD182060A');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4D182060A');
        $this->addSql('ALTER TABLE agency DROP FOREIGN KEY FK_70C0C6E6A76ED395');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744A76ED395');
        $this->addSql('DROP TABLE agency');
        $this->addSql('DROP TABLE agency_city');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE prospect');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE user');
    }
}
