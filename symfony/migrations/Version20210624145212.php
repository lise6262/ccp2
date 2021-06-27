<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624145212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photos ADD categories_id INT DEFAULT NULL, ADD techniques_id INT DEFAULT NULL, ADD photographe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D9A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D93563B213 FOREIGN KEY (techniques_id) REFERENCES techniques (id)');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D997DB59CB FOREIGN KEY (photographe_id) REFERENCES photographe (id)');
        $this->addSql('CREATE INDEX IDX_876E0D9A21214B7 ON photos (categories_id)');
        $this->addSql('CREATE INDEX IDX_876E0D93563B213 ON photos (techniques_id)');
        $this->addSql('CREATE INDEX IDX_876E0D997DB59CB ON photos (photographe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D9A21214B7');
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D93563B213');
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D997DB59CB');
        $this->addSql('DROP INDEX IDX_876E0D9A21214B7 ON photos');
        $this->addSql('DROP INDEX IDX_876E0D93563B213 ON photos');
        $this->addSql('DROP INDEX IDX_876E0D997DB59CB ON photos');
        $this->addSql('ALTER TABLE photos DROP categories_id, DROP techniques_id, DROP photographe_id');
    }
}
