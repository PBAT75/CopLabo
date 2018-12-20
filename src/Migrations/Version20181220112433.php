<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181220112433 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formulaires DROP FOREIGN KEY FK_C35839D063C02CD4');
        $this->addSql('DROP INDEX IDX_C35839D063C02CD4 ON formulaires');
        $this->addSql('ALTER TABLE formulaires ADD comment TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option1 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option2 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option3 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option4 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option5 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option6 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option7 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option8 TINYINT(1) DEFAULT \'0\' NOT NULL, ADD option9 TINYINT(1) DEFAULT \'0\' NOT NULL, DROP evenements_id, CHANGE satisfaction satisfaction TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE upgrade upgrade TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE growth growth TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE contacts contacts TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE source source TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formulaires ADD evenements_id INT DEFAULT NULL, DROP comment, DROP option1, DROP option2, DROP option3, DROP option4, DROP option5, DROP option6, DROP option7, DROP option8, DROP option9, CHANGE satisfaction satisfaction TINYINT(1) DEFAULT NULL, CHANGE upgrade upgrade TINYINT(1) DEFAULT NULL, CHANGE growth growth TINYINT(1) DEFAULT NULL, CHANGE contacts contacts TINYINT(1) DEFAULT NULL, CHANGE source source TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE formulaires ADD CONSTRAINT FK_C35839D063C02CD4 FOREIGN KEY (evenements_id) REFERENCES evenements (id)');
        $this->addSql('CREATE INDEX IDX_C35839D063C02CD4 ON formulaires (evenements_id)');
    }
}
