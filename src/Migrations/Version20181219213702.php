<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181219213702 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE start_up_relation ADD start_up_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE start_up_relation ADD CONSTRAINT FK_E28CCCF6707A3EED FOREIGN KEY (start_up_id) REFERENCES start_up (id)');
        $this->addSql('CREATE INDEX IDX_E28CCCF6707A3EED ON start_up_relation (start_up_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE start_up_relation DROP FOREIGN KEY FK_E28CCCF6707A3EED');
        $this->addSql('DROP INDEX IDX_E28CCCF6707A3EED ON start_up_relation');
        $this->addSql('ALTER TABLE start_up_relation DROP start_up_id');
    }
}
