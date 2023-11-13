<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113182430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE badge (id INT AUTO_INCREMENT NOT NULL, color_id INT NOT NULL, reference VARCHAR(15) NOT NULL, slug VARCHAR(15) NOT NULL, is_valid TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_FEF0481D7ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE batiment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cave (id INT AUTO_INCREMENT NOT NULL, lot_id INT NOT NULL, number VARCHAR(50) NOT NULL, slug VARCHAR(50) NOT NULL, INDEX IDX_57F6D41A8CBA5F7 (lot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etage (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(5) NOT NULL, slug VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locataire (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C47CF6EB76C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, etage_id INT NOT NULL, position_id INT NOT NULL, batiment_id INT NOT NULL, number VARCHAR(10) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_B81291B76C50E4A (proprietaire_id), INDEX IDX_B81291B984CE93F (etage_id), INDEX IDX_B81291BDD842E46 (position_id), INDEX IDX_B81291BD6F6891B (batiment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, is_occupant TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481D7ADA1FB5 FOREIGN KEY (color_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE cave ADD CONSTRAINT FK_57F6D41A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE locataire ADD CONSTRAINT FK_C47CF6EB76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B984CE93F FOREIGN KEY (etage_id) REFERENCES etage (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BDD842E46 FOREIGN KEY (position_id) REFERENCES position (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481D7ADA1FB5');
        $this->addSql('ALTER TABLE cave DROP FOREIGN KEY FK_57F6D41A8CBA5F7');
        $this->addSql('ALTER TABLE locataire DROP FOREIGN KEY FK_C47CF6EB76C50E4A');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B76C50E4A');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B984CE93F');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BDD842E46');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BD6F6891B');
        $this->addSql('DROP TABLE badge');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE cave');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE etage');
        $this->addSql('DROP TABLE locataire');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
