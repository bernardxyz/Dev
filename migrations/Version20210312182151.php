<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312182151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city CHANGE name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE country CHANGE name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF4515AC81');
        $this->addSql('DROP INDEX IDX_DA6FBBAF4515AC81 ON race');
        $this->addSql('ALTER TABLE race CHANGE organizaion_id organization_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF32C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id)');
        $this->addSql('CREATE INDEX IDX_DA6FBBAF32C8A3DE ON race (organization_id)');
        $this->addSql('ALTER TABLE user CHANGE birth_date birth_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user_type CHANGE name name VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city CHANGE name name VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE country CHANGE name name VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF32C8A3DE');
        $this->addSql('DROP INDEX IDX_DA6FBBAF32C8A3DE ON race');
        $this->addSql('ALTER TABLE race CHANGE organization_id organizaion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF4515AC81 FOREIGN KEY (organizaion_id) REFERENCES organization (id)');
        $this->addSql('CREATE INDEX IDX_DA6FBBAF4515AC81 ON race (organizaion_id)');
        $this->addSql('ALTER TABLE user CHANGE birth_date birth_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user_type CHANGE name name VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
