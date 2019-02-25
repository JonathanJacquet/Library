<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190214105713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, id_library_id INT DEFAULT NULL, name VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, age INT NOT NULL, card_number INT NOT NULL, city VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, postal_code INT NOT NULL, UNIQUE INDEX UNIQ_58DF06515E237E06 (name), UNIQUE INDEX UNIQ_58DF06515BAFC100 (id_library_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, borrower_id INT DEFAULT NULL, category_id INT NOT NULL, id_library_id INT DEFAULT NULL, author VARCHAR(255) NOT NULL, date_publication DATE NOT NULL, resume LONGTEXT NOT NULL, status TINYINT(1) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_CBE5A33111CE312B (borrower_id), INDEX IDX_CBE5A33112469DE2 (category_id), INDEX IDX_CBE5A3315BAFC100 (id_library_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF06515BAFC100 FOREIGN KEY (id_library_id) REFERENCES library (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33111CE312B FOREIGN KEY (borrower_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3315BAFC100 FOREIGN KEY (id_library_id) REFERENCES library (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33111CE312B');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33112469DE2');
        $this->addSql('ALTER TABLE administrator DROP FOREIGN KEY FK_58DF06515BAFC100');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3315BAFC100');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE library');
    }
}
