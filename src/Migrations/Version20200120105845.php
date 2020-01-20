<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200120105845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE project_category (project_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_3B02921A166D1F9C (project_id), INDEX IDX_3B02921A12469DE2 (category_id), PRIMARY KEY(project_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_category ADD CONSTRAINT FK_3B02921A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_category ADD CONSTRAINT FK_3B02921A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contribution ADD project_id INT NOT NULL, ADD user_id INT NOT NULL, CHANGE amount amount NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE contribution ADD CONSTRAINT FK_EA351E15166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE contribution ADD CONSTRAINT FK_EA351E15A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EA351E15166D1F9C ON contribution (project_id)');
        $this->addSql('CREATE INDEX IDX_EA351E15A76ED395 ON contribution (user_id)');
        $this->addSql('ALTER TABLE project ADD user_id INT NOT NULL, ADD create_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEA76ED395 ON project (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE project_category');
        $this->addSql('ALTER TABLE contribution DROP FOREIGN KEY FK_EA351E15166D1F9C');
        $this->addSql('ALTER TABLE contribution DROP FOREIGN KEY FK_EA351E15A76ED395');
        $this->addSql('DROP INDEX IDX_EA351E15166D1F9C ON contribution');
        $this->addSql('DROP INDEX IDX_EA351E15A76ED395 ON contribution');
        $this->addSql('ALTER TABLE contribution DROP project_id, DROP user_id, CHANGE amount amount NUMERIC(2, 0) NOT NULL');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('DROP INDEX IDX_2FB3D0EEA76ED395 ON project');
        $this->addSql('ALTER TABLE project DROP user_id, DROP create_at');
    }
}
