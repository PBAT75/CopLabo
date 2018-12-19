<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181219172041 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE start_up_relation (id INT AUTO_INCREMENT NOT NULL, partner_id INT DEFAULT NULL, external_company_id INT DEFAULT NULL, action VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, other LONGTEXT DEFAULT NULL, INDEX IDX_E28CCCF69393F8FE (partner_id), INDEX IDX_E28CCCF68D659504 (external_company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE start_up_relation ADD CONSTRAINT FK_E28CCCF69393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE start_up_relation ADD CONSTRAINT FK_E28CCCF68D659504 FOREIGN KEY (external_company_id) REFERENCES external_company (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE start_up_relation');
    }
}
