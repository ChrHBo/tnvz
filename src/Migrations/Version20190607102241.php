<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607102241 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE eintragung (id INT AUTO_INCREMENT NOT NULL, teilnehmer_id INT DEFAULT NULL, bereich_id INT DEFAULT NULL, datum DATE DEFAULT NULL, text LONGTEXT NOT NULL, INDEX IDX_C719F3E82CF7612C (teilnehmer_id), INDEX IDX_C719F3E8816C1DBE (bereich_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eintragung ADD CONSTRAINT FK_C719F3E82CF7612C FOREIGN KEY (teilnehmer_id) REFERENCES teilnehmer (id)');
        $this->addSql('ALTER TABLE eintragung ADD CONSTRAINT FK_C719F3E8816C1DBE FOREIGN KEY (bereich_id) REFERENCES eintragsbereich (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE eintragung');
    }
}
