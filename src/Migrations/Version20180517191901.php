<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180517191901 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE geocodes (id INT AUTO_INCREMENT NOT NULL, brewery_id_id INT DEFAULT NULL, latitude NUMERIC(50, 20) DEFAULT NULL, longitude NUMERIC(50, 20) DEFAULT NULL, accuracy VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_BCAF9E56597386F1 (brewery_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE geocodes ADD CONSTRAINT FK_BCAF9E56597386F1 FOREIGN KEY (brewery_id_id) REFERENCES breweries (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE geocodes');
    }
}
