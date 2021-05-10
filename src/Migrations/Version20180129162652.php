<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180129162652 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE animal_cliente (cliente_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_7BC3F41FDE734E51 (cliente_id), INDEX IDX_7BC3F41F8E962C16 (animal_id), PRIMARY KEY(cliente_id, animal_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_cliente ADD CONSTRAINT FK_7BC3F41FDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_cliente ADD CONSTRAINT FK_7BC3F41F8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE animal_cliente');
    }
}
