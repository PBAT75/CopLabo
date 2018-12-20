<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181220101317 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE champs_soumis (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, satisfaction VARCHAR(255) DEFAULT NULL, upgrade LONGTEXT DEFAULT NULL, growth VARCHAR(255) DEFAULT NULL, contacts INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, source VARCHAR(255) DEFAULT NULL, option1 VARCHAR(255) DEFAULT NULL, option2 VARCHAR(255) DEFAULT NULL, option3 VARCHAR(255) DEFAULT NULL, option4 VARCHAR(255) DEFAULT NULL, option5 VARCHAR(255) DEFAULT NULL, option6 VARCHAR(255) DEFAULT NULL, option7 VARCHAR(255) DEFAULT NULL, option8 VARCHAR(255) DEFAULT NULL, option9 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE champs_soumis');
    }
}
