<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180803152115 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_project (skill_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_35464EC75585C142 (skill_id), INDEX IDX_35464EC7166D1F9C (project_id), PRIMARY KEY(skill_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_project ADD CONSTRAINT FK_35464EC75585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_project ADD CONSTRAINT FK_35464EC7166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(50) NOT NULL, CHANGE password password VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE project ADD id_category_id INT DEFAULT NULL, CHANGE name name VARCHAR(30) NOT NULL, CHANGE url url VARCHAR(40) DEFAULT NULL, CHANGE image image VARCHAR(30) NOT NULL, CHANGE created_at created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEA545015 ON project (id_category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA545015');
        $this->addSql('ALTER TABLE skill_project DROP FOREIGN KEY FK_35464EC75585C142');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_project');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE password password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('DROP INDEX IDX_2FB3D0EEA545015 ON project');
        $this->addSql('ALTER TABLE project DROP id_category_id, CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE image image VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE created_at created_at DATETIME NOT NULL');
    }
}
