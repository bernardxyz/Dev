<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306210836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE check_point CHANGE race_id race_id INT DEFAULT NULL, CHANGE check_point_type_id check_point_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organization CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE race CHANGE city_id city_id INT DEFAULT NULL, CHANGE racetype_id racetype_id INT DEFAULT NULL, CHANGE organizaion_id organizaion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE city_id city_id INT DEFAULT NULL, CHANGE user_type_id user_type_id INT DEFAULT NULL, CHANGE organization_id organization_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user_check_point CHANGE user_id user_id INT DEFAULT NULL, CHANGE check_point_id check_point_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_race CHANGE user_race_status_id user_race_status_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE race_id race_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE check_point CHANGE race_id race_id INT DEFAULT NULL, CHANGE check_point_type_id check_point_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city CHANGE country_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organization CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE race CHANGE city_id city_id INT DEFAULT NULL, CHANGE racetype_id racetype_id INT DEFAULT NULL, CHANGE organizaion_id organizaion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE city_id city_id INT DEFAULT NULL, CHANGE user_type_id user_type_id INT DEFAULT NULL, CHANGE organization_id organization_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE user_check_point CHANGE user_id user_id INT DEFAULT NULL, CHANGE check_point_id check_point_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_race CHANGE user_race_status_id user_race_status_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE race_id race_id INT DEFAULT NULL');
    }
}
