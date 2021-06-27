<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624141405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom_categories VARCHAR(100) NOT NULL, description_categories VARCHAR(255) NOT NULL, description_longue_categories LONGTEXT NOT NULL, image_logo_categories VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photographe (id INT AUTO_INCREMENT NOT NULL, nom_photographe VARCHAR(100) NOT NULL, prenom_photographe VARCHAR(100) NOT NULL, email_photographe VARCHAR(255) NOT NULL, avatar_photographe VARCHAR(255) DEFAULT NULL, description_photographe LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, url_photos LONGTEXT NOT NULL, titre_photos VARCHAR(100) NOT NULL, exif_dimensions_photos VARCHAR(20) DEFAULT NULL, exif_date_photos DATE DEFAULT NULL, exif_speed_photos VARCHAR(10) DEFAULT NULL, exif_apperture_photos VARCHAR(10) DEFAULT NULL, exif_iso_photos VARCHAR(10) DEFAULT NULL, exif_focale_photos VARCHAR(10) DEFAULT NULL, exif_objectif_photos VARCHAR(255) DEFAULT NULL, exif_cam_photos VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techniques (id INT AUTO_INCREMENT NOT NULL, nom_techniques VARCHAR(100) NOT NULL, description_longue_techniques VARCHAR(255) NOT NULL, description_courte_techniques VARCHAR(255) NOT NULL, image_logo_techniques VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE photographe');
        $this->addSql('DROP TABLE photos');
        $this->addSql('DROP TABLE techniques');
    }
}
