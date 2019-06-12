<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612073338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE praktika (id INT AUTO_INCREMENT NOT NULL, firma_id INT DEFAULT NULL, teilnehmer_id INT DEFAULT NULL, inhalt LONGTEXT NOT NULL, beginn DATE NOT NULL, ende DATE NOT NULL, INDEX IDX_8028319E505AEC11 (firma_id), INDEX IDX_8028319E2CF7612C (teilnehmer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE praktika ADD CONSTRAINT FK_8028319E505AEC11 FOREIGN KEY (firma_id) REFERENCES firma (id)');
        $this->addSql('ALTER TABLE praktika ADD CONSTRAINT FK_8028319E2CF7612C FOREIGN KEY (teilnehmer_id) REFERENCES teilnehmer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE praktika');
    }
}
