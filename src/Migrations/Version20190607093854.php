<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607093854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE teilnehmer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, vorname VARCHAR(255) NOT NULL, fon VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, geburtsdatum DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teilnehmer_mitarbeiter (teilnehmer_id INT NOT NULL, mitarbeiter_id INT NOT NULL, INDEX IDX_675DAE712CF7612C (teilnehmer_id), INDEX IDX_675DAE714AB73DC1 (mitarbeiter_id), PRIMARY KEY(teilnehmer_id, mitarbeiter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teilnehmer_mitarbeiter ADD CONSTRAINT FK_675DAE712CF7612C FOREIGN KEY (teilnehmer_id) REFERENCES teilnehmer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teilnehmer_mitarbeiter ADD CONSTRAINT FK_675DAE714AB73DC1 FOREIGN KEY (mitarbeiter_id) REFERENCES mitarbeiter (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE teilnehmer_mitarbeiter DROP FOREIGN KEY FK_675DAE712CF7612C');
        $this->addSql('DROP TABLE teilnehmer');
        $this->addSql('DROP TABLE teilnehmer_mitarbeiter');
    }
}
