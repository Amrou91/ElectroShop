<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210409201426 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, libel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produits ADD sous_categorie_id INT NOT NULL, ADD marque_id INT NOT NULL, ADD processeur_id INT NOT NULL, ADD carte_graphique_id INT NOT NULL, ADD disque_dur_id INT NOT NULL, ADD memoire_id INT NOT NULL, ADD systeme_exploitation_id INT NOT NULL, ADD featured_image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C365BF48 FOREIGN KEY (sous_categorie_id) REFERENCES sous_categories (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C4827B9B2 FOREIGN KEY (marque_id) REFERENCES marques (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C5C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C21E1B659 FOREIGN KEY (carte_graphique_id) REFERENCES carte_graphique (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C74D9D5A FOREIGN KEY (disque_dur_id) REFERENCES disque_dur (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CDE665C15 FOREIGN KEY (memoire_id) REFERENCES memoires (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C1B83D934 FOREIGN KEY (systeme_exploitation_id) REFERENCES systeme_exploitation (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C365BF48 ON produits (sous_categorie_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C4827B9B2 ON produits (marque_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C5C9BE5AD ON produits (processeur_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C21E1B659 ON produits (carte_graphique_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C74D9D5A ON produits (disque_dur_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CDE665C15 ON produits (memoire_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C1B83D934 ON produits (systeme_exploitation_id)');
        $this->addSql('ALTER TABLE sous_categories ADD categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE sous_categories ADD CONSTRAINT FK_DC8B1382A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_DC8B1382A21214B7 ON sous_categories (categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C4827B9B2');
        $this->addSql('DROP TABLE marques');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C365BF48');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C5C9BE5AD');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C21E1B659');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C74D9D5A');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CDE665C15');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C1B83D934');
        $this->addSql('DROP INDEX IDX_BE2DDF8C365BF48 ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C4827B9B2 ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C5C9BE5AD ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C21E1B659 ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C74D9D5A ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8CDE665C15 ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C1B83D934 ON produits');
        $this->addSql('ALTER TABLE produits DROP sous_categorie_id, DROP marque_id, DROP processeur_id, DROP carte_graphique_id, DROP disque_dur_id, DROP memoire_id, DROP systeme_exploitation_id, DROP featured_image');
        $this->addSql('ALTER TABLE sous_categories DROP FOREIGN KEY FK_DC8B1382A21214B7');
        $this->addSql('DROP INDEX IDX_DC8B1382A21214B7 ON sous_categories');
        $this->addSql('ALTER TABLE sous_categories DROP categories_id');
    }
}
