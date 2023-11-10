<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102092103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD thumbnail_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES thumbnail (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E5FDFF2E92 ON annonce (thumbnail_id)');
        $this->addSql('ALTER TABLE thumbnail DROP image_size');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FDFF2E92');
        $this->addSql('DROP INDEX UNIQ_F65593E5FDFF2E92 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP thumbnail_id');
        $this->addSql('ALTER TABLE thumbnail ADD image_size INT NOT NULL');
    }
}
