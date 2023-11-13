<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113212507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481DA8CBA5F7');
        $this->addSql('ALTER TABLE cave DROP FOREIGN KEY FK_57F6D41A8CBA5F7');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B76C50E4A');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B984CE93F');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BD6F6891B');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BDD842E46');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP INDEX IDX_FEF0481DA8CBA5F7 ON badge');
        $this->addSql('ALTER TABLE badge DROP lot_id');
        $this->addSql('DROP INDEX IDX_57F6D41A8CBA5F7 ON cave');
        $this->addSql('ALTER TABLE cave DROP lot_id');
        $this->addSql('ALTER TABLE locataire DROP FOREIGN KEY FK_C47CF6EB76C50E4A');
        $this->addSql('DROP INDEX IDX_C47CF6EB76C50E4A ON locataire');
        $this->addSql('ALTER TABLE locataire DROP proprietaire_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, etage_id INT NOT NULL, position_id INT NOT NULL, batiment_id INT NOT NULL, number VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B81291B76C50E4A (proprietaire_id), INDEX IDX_B81291B984CE93F (etage_id), INDEX IDX_B81291BD6F6891B (batiment_id), INDEX IDX_B81291BDD842E46 (position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B984CE93F FOREIGN KEY (etage_id) REFERENCES etage (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BDD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE badge ADD lot_id INT NOT NULL');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481DA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FEF0481DA8CBA5F7 ON badge (lot_id)');
        $this->addSql('ALTER TABLE cave ADD lot_id INT NOT NULL');
        $this->addSql('ALTER TABLE cave ADD CONSTRAINT FK_57F6D41A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_57F6D41A8CBA5F7 ON cave (lot_id)');
        $this->addSql('ALTER TABLE locataire ADD proprietaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locataire ADD CONSTRAINT FK_C47CF6EB76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C47CF6EB76C50E4A ON locataire (proprietaire_id)');
    }
}
