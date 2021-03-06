<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306225905 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification_type DROP FOREIGN KEY FK_34E21C13EF1A9D84');
        $this->addSql('DROP INDEX IDX_34E21C13EF1A9D84 ON notification_type');
        $this->addSql('ALTER TABLE notification_type DROP notification_id');
        $this->addSql('ALTER TABLE notifications ADD notification_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3D0520624 FOREIGN KEY (notification_type_id) REFERENCES notification_type (id)');
        $this->addSql('CREATE INDEX IDX_6000B0D3D0520624 ON notifications (notification_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification_type ADD notification_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification_type ADD CONSTRAINT FK_34E21C13EF1A9D84 FOREIGN KEY (notification_id) REFERENCES notifications (id)');
        $this->addSql('CREATE INDEX IDX_34E21C13EF1A9D84 ON notification_type (notification_id)');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3D0520624');
        $this->addSql('DROP INDEX IDX_6000B0D3D0520624 ON notifications');
        $this->addSql('ALTER TABLE notifications DROP notification_type_id');
    }
}