<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607095217 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE berufswunsch (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teilnehmer ADD berufswunsch_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teilnehmer ADD CONSTRAINT FK_F25E8A046906FC76 FOREIGN KEY (berufswunsch_id) REFERENCES berufswunsch (id)');
        $this->addSql('CREATE INDEX IDX_F25E8A046906FC76 ON teilnehmer (berufswunsch_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE teilnehmer DROP FOREIGN KEY FK_F25E8A046906FC76');
        $this->addSql('DROP TABLE berufswunsch');
        $this->addSql('DROP INDEX IDX_F25E8A046906FC76 ON teilnehmer');
        $this->addSql('ALTER TABLE teilnehmer DROP berufswunsch_id');
    }
}
