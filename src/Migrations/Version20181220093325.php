<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181220093325 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formulaires ADD evenements_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formulaires ADD CONSTRAINT FK_C35839D063C02CD4 FOREIGN KEY (evenements_id) REFERENCES evenements (id)');
        $this->addSql('CREATE INDEX IDX_C35839D063C02CD4 ON formulaires (evenements_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formulaires DROP FOREIGN KEY FK_C35839D063C02CD4');
        $this->addSql('DROP INDEX IDX_C35839D063C02CD4 ON formulaires');
        $this->addSql('ALTER TABLE formulaires DROP evenements_id');
    }
}
