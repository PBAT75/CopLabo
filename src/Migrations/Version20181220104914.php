<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181220104914 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE start_up_relation DROP INDEX UNIQ_E28CCCF69393F8FE, ADD INDEX IDX_E28CCCF69393F8FE (partner_id)');
        $this->addSql('ALTER TABLE start_up_relation DROP INDEX UNIQ_E28CCCF68D659504, ADD INDEX IDX_E28CCCF68D659504 (external_company_id)');
        $this->addSql('ALTER TABLE start_up_relation DROP INDEX UNIQ_E28CCCF6707A3EED, ADD INDEX IDX_E28CCCF6707A3EED (start_up_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE start_up_relation DROP INDEX IDX_E28CCCF69393F8FE, ADD UNIQUE INDEX UNIQ_E28CCCF69393F8FE (partner_id)');
        $this->addSql('ALTER TABLE start_up_relation DROP INDEX IDX_E28CCCF68D659504, ADD UNIQUE INDEX UNIQ_E28CCCF68D659504 (external_company_id)');
        $this->addSql('ALTER TABLE start_up_relation DROP INDEX IDX_E28CCCF6707A3EED, ADD UNIQUE INDEX UNIQ_E28CCCF6707A3EED (start_up_id)');
    }
}
