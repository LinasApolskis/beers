<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180517184224 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE beers (id INT AUTO_INCREMENT NOT NULL, brewery_id_id INT DEFAULT NULL, cat_id_id INT DEFAULT NULL, style_id_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, abv NUMERIC(50, 5) DEFAULT NULL, ibu NUMERIC(10, 3) DEFAULT NULL, srm NUMERIC(20, 5) DEFAULT NULL, upc INT DEFAULT NULL, filepath VARCHAR(255) DEFAULT NULL, descript VARCHAR(5000) DEFAULT NULL, add_user INT DEFAULT NULL, last_mod VARCHAR(255) DEFAULT NULL, INDEX IDX_B331E638597386F1 (brewery_id_id), INDEX IDX_B331E638C33F2EBA (cat_id_id), INDEX IDX_B331E638B591D0AC (style_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE breweries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, address1 VARCHAR(255) DEFAULT NULL, address2 VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, filepath VARCHAR(255) DEFAULT NULL, descript VARCHAR(5000) DEFAULT NULL, add_user INT DEFAULT NULL, last_mod VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, cat_name VARCHAR(255) DEFAULT NULL, last_mod DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE geocodes (id INT AUTO_INCREMENT NOT NULL, brewery_id_id INT DEFAULT NULL, latitude NUMERIC(50, 20) DEFAULT NULL, longitude NUMERIC(50, 20) DEFAULT NULL, accuracy VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_BCAF9E56597386F1 (brewery_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE styles (id INT AUTO_INCREMENT NOT NULL, cat_id_id INT DEFAULT NULL, style_name VARCHAR(255) DEFAULT NULL, last_mod VARCHAR(255) DEFAULT NULL, INDEX IDX_B65AFAF5C33F2EBA (cat_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE beers ADD CONSTRAINT FK_B331E638597386F1 FOREIGN KEY (brewery_id_id) REFERENCES breweries (id)');
        $this->addSql('ALTER TABLE beers ADD CONSTRAINT FK_B331E638C33F2EBA FOREIGN KEY (cat_id_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE beers ADD CONSTRAINT FK_B331E638B591D0AC FOREIGN KEY (style_id_id) REFERENCES styles (id)');
        $this->addSql('ALTER TABLE geocodes ADD CONSTRAINT FK_BCAF9E56597386F1 FOREIGN KEY (brewery_id_id) REFERENCES breweries (id)');
        $this->addSql('ALTER TABLE styles ADD CONSTRAINT FK_B65AFAF5C33F2EBA FOREIGN KEY (cat_id_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE beers DROP FOREIGN KEY FK_B331E638597386F1');
        $this->addSql('ALTER TABLE geocodes DROP FOREIGN KEY FK_BCAF9E56597386F1');
        $this->addSql('ALTER TABLE beers DROP FOREIGN KEY FK_B331E638C33F2EBA');
        $this->addSql('ALTER TABLE styles DROP FOREIGN KEY FK_B65AFAF5C33F2EBA');
        $this->addSql('ALTER TABLE beers DROP FOREIGN KEY FK_B331E638B591D0AC');
        $this->addSql('DROP TABLE beers');
        $this->addSql('DROP TABLE breweries');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE geocodes');
        $this->addSql('DROP TABLE styles');
    }
}
