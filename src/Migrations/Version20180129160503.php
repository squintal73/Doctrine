<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180129160503 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente ADD endereco_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B251BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id)');
        $this->addSql('CREATE INDEX IDX_F41C9B251BB76823 ON cliente (endereco_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente DROP FOREIGN KEY FK_F41C9B251BB76823');
        $this->addSql('DROP INDEX IDX_F41C9B251BB76823 ON cliente');
        $this->addSql('ALTER TABLE cliente DROP endereco_id');
    }
}
