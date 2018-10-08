<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180928083251 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_2FB3D0EED262AF09 FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EED262AF09 ON resume (project_id)');
        $this->addSql('ALTER TABLE resume ADD company_id INT NOT NULL');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_4FBF094FD262AF09 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094FD262AF09 ON resume (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reusme DROP FOREIGN KEY FK_4FBF094FD262AF09');
        $this->addSql('DROP INDEX IDX_4FBF094FD262AF09 ON resume');
        $this->addSql('ALTER TABLE resume DROP company_id');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_2FB3D0EED262AF09');
        $this->addSql('DROP INDEX IDX_2FB3D0EED262AF09 ON resume');
        $this->addSql('ALTER TABLE resume DROP project_id');
    }
}
