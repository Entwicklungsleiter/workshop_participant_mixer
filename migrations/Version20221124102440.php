<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124102440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise_group (id INT AUTO_INCREMENT NOT NULL, exercise_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_48F6B307E934951A (exercise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercise_group_student (exercise_group_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_737BFBE6F83879AF (exercise_group_id), INDEX IDX_737BFBE6CB944F1A (student_id), PRIMARY KEY(exercise_group_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercise_group ADD CONSTRAINT FK_48F6B307E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('ALTER TABLE exercise_group_student ADD CONSTRAINT FK_737BFBE6F83879AF FOREIGN KEY (exercise_group_id) REFERENCES exercise_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercise_group_student ADD CONSTRAINT FK_737BFBE6CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise_group DROP FOREIGN KEY FK_48F6B307E934951A');
        $this->addSql('ALTER TABLE exercise_group_student DROP FOREIGN KEY FK_737BFBE6F83879AF');
        $this->addSql('ALTER TABLE exercise_group_student DROP FOREIGN KEY FK_737BFBE6CB944F1A');
        $this->addSql('DROP TABLE exercise_group');
        $this->addSql('DROP TABLE exercise_group_student');
    }
}
