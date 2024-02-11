<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211194224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity_user (activity_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(activity_id, user_id))');
        $this->addSql('CREATE INDEX IDX_8E570DDB81C06096 ON activity_user (activity_id)');
        $this->addSql('CREATE INDEX IDX_8E570DDBA76ED395 ON activity_user (user_id)');
        $this->addSql('ALTER TABLE activity_user ADD CONSTRAINT FK_8E570DDB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE activity_user ADD CONSTRAINT FK_8E570DDBA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE activity ADD start DATE NOT NULL');
        $this->addSql('ALTER TABLE activity ADD endat DATE NOT NULL');
        $this->addSql('ALTER TABLE activity ADD age INT NOT NULL');
        $this->addSql('ALTER TABLE activity ADD maxpeople INT NOT NULL');
        $this->addSql('ALTER TABLE activity DROP start_date');
        $this->addSql('ALTER TABLE activity DROP end_date');
        $this->addSql('ALTER TABLE activity DROP min_age');
        $this->addSql('ALTER TABLE activity DROP max_participants');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE activity_user DROP CONSTRAINT FK_8E570DDB81C06096');
        $this->addSql('ALTER TABLE activity_user DROP CONSTRAINT FK_8E570DDBA76ED395');
        $this->addSql('DROP TABLE activity_user');
        $this->addSql('ALTER TABLE activity ADD start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE activity ADD end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE activity ADD min_age INT NOT NULL');
        $this->addSql('ALTER TABLE activity ADD max_participants INT NOT NULL');
        $this->addSql('ALTER TABLE activity DROP start');
        $this->addSql('ALTER TABLE activity DROP endat');
        $this->addSql('ALTER TABLE activity DROP age');
        $this->addSql('ALTER TABLE activity DROP maxpeople');
    }
}
