<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612065750 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE massnahme (id INT AUTO_INCREMENT NOT NULL, massnahmeart_id INT DEFAULT NULL, teilnehmer_id INT DEFAULT NULL, beginn DATE NOT NULL, ende DATE NOT NULL, INDEX IDX_985244E58607A44 (massnahmeart_id), INDEX IDX_985244E2CF7612C (teilnehmer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE massnahme ADD CONSTRAINT FK_985244E58607A44 FOREIGN KEY (massnahmeart_id) REFERENCES massnahmeart (id)');
        $this->addSql('ALTER TABLE massnahme ADD CONSTRAINT FK_985244E2CF7612C FOREIGN KEY (teilnehmer_id) REFERENCES teilnehmer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE massnahme');
    }
}
