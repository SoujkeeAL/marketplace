<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230507233753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sellers (id INT AUTO_INCREMENT NOT NULL, company VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technicals (id INT AUTO_INCREMENT NOT NULL, uid INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE seller');
        $this->addSql('ALTER TABLE goods ADD uid VARCHAR(255) NOT NULL, ADD category_id INT NOT NULL, ADD seller_id INT NOT NULL, DROP name, DROP description, DROP technicals, CHANGE price price VARCHAR(150) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seller (id INT AUTO_INCREMENT NOT NULL, company VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, telephone VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, contact VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE sellers');
        $this->addSql('DROP TABLE technicals');
        $this->addSql('ALTER TABLE goods ADD description VARCHAR(255) NOT NULL, ADD technicals VARCHAR(255) NOT NULL, DROP category_id, DROP seller_id, CHANGE price price VARCHAR(255) NOT NULL, CHANGE uid name VARCHAR(255) NOT NULL');
    }
}
