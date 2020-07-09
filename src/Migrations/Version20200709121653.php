<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200709121653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE store_data (id INT AUTO_INCREMENT NOT NULL, store_f_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, qta INT DEFAULT NULL, amount INT DEFAULT NULL, total_amount INT DEFAULT NULL, INDEX IDX_4F4A5DAD44B0C52F (store_f_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, name_invoice VARCHAR(255) DEFAULT NULL, client_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store_data ADD CONSTRAINT FK_4F4A5DAD44B0C52F FOREIGN KEY (store_f_id) REFERENCES store (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE store_data DROP FOREIGN KEY FK_4F4A5DAD44B0C52F');
        $this->addSql('DROP TABLE store_data');
        $this->addSql('DROP TABLE store');
    }
}
