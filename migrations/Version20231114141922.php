<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114141922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locataire ADD proprietaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locataire ADD CONSTRAINT FK_C47CF6EB76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('CREATE INDEX IDX_C47CF6EB76C50E4A ON locataire (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locataire DROP FOREIGN KEY FK_C47CF6EB76C50E4A');
        $this->addSql('DROP INDEX IDX_C47CF6EB76C50E4A ON locataire');
        $this->addSql('ALTER TABLE locataire DROP proprietaire_id');
    }
}
