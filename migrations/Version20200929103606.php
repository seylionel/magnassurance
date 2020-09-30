<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200929103606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars_forms ADD prospects_id INT NOT NULL, ADD model LONGTEXT NOT NULL, ADD brand LONGTEXT NOT NULL, ADD power SMALLINT NOT NULL, ADD gas LONGTEXT NOT NULL, ADD registration VARCHAR(255) NOT NULL, ADD has_insurance TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE cars_forms ADD CONSTRAINT FK_67724871775D63D FOREIGN KEY (prospects_id) REFERENCES prospect (id)');
        $this->addSql('CREATE INDEX IDX_67724871775D63D ON cars_forms (prospects_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars_forms DROP FOREIGN KEY FK_67724871775D63D');
        $this->addSql('DROP INDEX IDX_67724871775D63D ON cars_forms');
        $this->addSql('ALTER TABLE cars_forms DROP prospects_id, DROP model, DROP brand, DROP power, DROP gas, DROP registration, DROP has_insurance');
    }
}
