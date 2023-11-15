<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114141110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, position_id INT NOT NULL, batiment_id INT NOT NULL, etage_id INT NOT NULL, proprietaire_id INT NOT NULL, lot_number VARCHAR(5) NOT NULL, INDEX IDX_71A6BD8DDD842E46 (position_id), INDEX IDX_71A6BD8DD6F6891B (batiment_id), INDEX IDX_71A6BD8D984CE93F (etage_id), INDEX IDX_71A6BD8D76C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DDD842E46 FOREIGN KEY (position_id) REFERENCES position (id)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D984CE93F FOREIGN KEY (etage_id) REFERENCES etage (id)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE badge ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481DE1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_FEF0481DE1729BBA ON badge (appartement_id)');
        $this->addSql('ALTER TABLE cave ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cave ADD CONSTRAINT FK_57F6D41E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_57F6D41E1729BBA ON cave (appartement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481DE1729BBA');
        $this->addSql('ALTER TABLE cave DROP FOREIGN KEY FK_57F6D41E1729BBA');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DDD842E46');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DD6F6891B');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D984CE93F');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D76C50E4A');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP INDEX IDX_FEF0481DE1729BBA ON badge');
        $this->addSql('ALTER TABLE badge DROP appartement_id');
        $this->addSql('DROP INDEX IDX_57F6D41E1729BBA ON cave');
        $this->addSql('ALTER TABLE cave DROP appartement_id');
    }
}
