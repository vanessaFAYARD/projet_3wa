<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180928091138 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume ADD project_id INT DEFAULT NULL, ADD company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A0166D1F9C ON resume (project_id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A0979B1AD6 ON resume (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0166D1F9C');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0979B1AD6');
        $this->addSql('DROP INDEX IDX_60C1D0A0166D1F9C ON resume');
        $this->addSql('DROP INDEX IDX_60C1D0A0979B1AD6 ON resume');
        $this->addSql('ALTER TABLE resume DROP project_id, DROP company_id');
    }
}
