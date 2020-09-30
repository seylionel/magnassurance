<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200929141031 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car ADD power SMALLINT NOT NULL, ADD gas VARCHAR(255) NOT NULL, ADD registration VARCHAR(255) NOT NULL, ADD insurance_exist TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE quote ADD quote_validation TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP power, DROP gas, DROP registration, DROP insurance_exist');
        $this->addSql('ALTER TABLE quote DROP quote_validation');
    }
}
