<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306224908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notifications ADD organization_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D332C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id)');
        $this->addSql('CREATE INDEX IDX_6000B0D332C8A3DE ON notifications (organization_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D332C8A3DE');
        $this->addSql('DROP INDEX IDX_6000B0D332C8A3DE ON notifications');
        $this->addSql('ALTER TABLE notifications DROP organization_id');
    }
}
