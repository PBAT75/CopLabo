<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181219201854 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attribution ADD CONSTRAINT FK_C751ED4971F7E88B FOREIGN KEY (event_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE attribution ADD CONSTRAINT FK_C751ED4967B339C5 FOREIGN KEY (startup_id) REFERENCES start_up (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attribution DROP FOREIGN KEY FK_C751ED4971F7E88B');
        $this->addSql('ALTER TABLE attribution DROP FOREIGN KEY FK_C751ED4967B339C5');
    }
}
