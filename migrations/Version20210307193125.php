<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307193125 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE check_point (id INT AUTO_INCREMENT NOT NULL, race_id INT DEFAULT NULL, check_point_type_id INT DEFAULT NULL, number INT NOT NULL, INDEX IDX_2DFFC0E66E59D40D (race_id), INDEX IDX_2DFFC0E6E5339EFA (check_point_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE check_point_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, abs_time TIME NOT NULL, rel_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(30) NOT NULL, INDEX IDX_2D5B0234F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notifications (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, organization_id INT DEFAULT NULL, notification_type_id INT DEFAULT NULL, time TIME NOT NULL, createt_at DATETIME NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_6000B0D3A76ED395 (user_id), INDEX IDX_6000B0D332C8A3DE (organization_id), INDEX IDX_6000B0D3D0520624 (notification_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organization (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, address LONGTEXT NOT NULL, email VARCHAR(180) NOT NULL, phone_number VARCHAR(30) NOT NULL, INDEX IDX_C1EE637C8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, racetype_id INT DEFAULT NULL, organizaion_id INT DEFAULT NULL, location VARCHAR(30) NOT NULL, registration_date DATE NOT NULL, race_length DOUBLE PRECISION NOT NULL, total_check_points INT NOT NULL, start_time TIME NOT NULL, max_time TIME NOT NULL, INDEX IDX_DA6FBBAF8BAC62AF (city_id), INDEX IDX_DA6FBBAF562975C3 (racetype_id), INDEX IDX_DA6FBBAF4515AC81 (organizaion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, user_type_id INT DEFAULT NULL, organization_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, birth_date DATETIME NOT NULL, sex TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6498BAC62AF (city_id), INDEX IDX_8D93D6499D419299 (user_type_id), INDEX IDX_8D93D64932C8A3DE (organization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_check_point (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, check_point_id INT DEFAULT NULL, time TIME NOT NULL, INDEX IDX_84E40973A76ED395 (user_id), INDEX IDX_84E409732DD651CC (check_point_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_notifications (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, seen TINYINT(1) NOT NULL, INDEX IDX_8E8E1D83A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_race (id INT AUTO_INCREMENT NOT NULL, user_race_status_id INT DEFAULT NULL, user_id INT DEFAULT NULL, race_id INT DEFAULT NULL, registration_date DATE NOT NULL, INDEX IDX_A0EEF766D9F49FF9 (user_race_status_id), INDEX IDX_A0EEF766A76ED395 (user_id), INDEX IDX_A0EEF7666E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_race_status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE check_point ADD CONSTRAINT FK_2DFFC0E66E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE check_point ADD CONSTRAINT FK_2DFFC0E6E5339EFA FOREIGN KEY (check_point_type_id) REFERENCES check_point_type (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D332C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3D0520624 FOREIGN KEY (notification_type_id) REFERENCES notification_type (id)');
        $this->addSql('ALTER TABLE organization ADD CONSTRAINT FK_C1EE637C8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF562975C3 FOREIGN KEY (racetype_id) REFERENCES race_type (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF4515AC81 FOREIGN KEY (organizaion_id) REFERENCES organization (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499D419299 FOREIGN KEY (user_type_id) REFERENCES user_type (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64932C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id)');
        $this->addSql('ALTER TABLE user_check_point ADD CONSTRAINT FK_84E40973A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_check_point ADD CONSTRAINT FK_84E409732DD651CC FOREIGN KEY (check_point_id) REFERENCES check_point (id)');
        $this->addSql('ALTER TABLE user_notifications ADD CONSTRAINT FK_8E8E1D83A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_race ADD CONSTRAINT FK_A0EEF766D9F49FF9 FOREIGN KEY (user_race_status_id) REFERENCES user_race_status (id)');
        $this->addSql('ALTER TABLE user_race ADD CONSTRAINT FK_A0EEF766A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_race ADD CONSTRAINT FK_A0EEF7666E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_check_point DROP FOREIGN KEY FK_84E409732DD651CC');
        $this->addSql('ALTER TABLE check_point DROP FOREIGN KEY FK_2DFFC0E6E5339EFA');
        $this->addSql('ALTER TABLE organization DROP FOREIGN KEY FK_C1EE637C8BAC62AF');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF8BAC62AF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3D0520624');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D332C8A3DE');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF4515AC81');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64932C8A3DE');
        $this->addSql('ALTER TABLE check_point DROP FOREIGN KEY FK_2DFFC0E66E59D40D');
        $this->addSql('ALTER TABLE user_race DROP FOREIGN KEY FK_A0EEF7666E59D40D');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF562975C3');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3A76ED395');
        $this->addSql('ALTER TABLE user_check_point DROP FOREIGN KEY FK_84E40973A76ED395');
        $this->addSql('ALTER TABLE user_notifications DROP FOREIGN KEY FK_8E8E1D83A76ED395');
        $this->addSql('ALTER TABLE user_race DROP FOREIGN KEY FK_A0EEF766A76ED395');
        $this->addSql('ALTER TABLE user_race DROP FOREIGN KEY FK_A0EEF766D9F49FF9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499D419299');
        $this->addSql('DROP TABLE check_point');
        $this->addSql('DROP TABLE check_point_type');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE notification_type');
        $this->addSql('DROP TABLE notifications');
        $this->addSql('DROP TABLE organization');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_check_point');
        $this->addSql('DROP TABLE user_notifications');
        $this->addSql('DROP TABLE user_race');
        $this->addSql('DROP TABLE user_race_status');
        $this->addSql('DROP TABLE user_type');
    }
}
