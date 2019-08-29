<?php

declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190829124700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates database schema';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chair (id INT AUTO_INCREMENT NOT NULL, number SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, chair_id INT DEFAULT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C849558CA3C745 (chair_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(100) NOT NULL, phone VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558CA3C745 FOREIGN KEY (chair_id) REFERENCES chair (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558CA3C745');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('DROP TABLE chair');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE client');
    }
}
