<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516084831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recepe_ingredient (recepe_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_8246F3E2E1A626F (recepe_id), INDEX IDX_8246F3E933FE08C (ingredient_id), PRIMARY KEY(recepe_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recepe_ingredient ADD CONSTRAINT FK_8246F3E2E1A626F FOREIGN KEY (recepe_id) REFERENCES recepe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recepe_ingredient ADD CONSTRAINT FK_8246F3E933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recepe ADD nb_people INT DEFAULT NULL, ADD description LONGTEXT NOT NULL, DROP number, DROP step, CHANGE time time INT DEFAULT NULL, CHANGE difficulty difficulty INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE pined is_favorite TINYINT(1) NOT NULL, CHANGE created_at create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recepe_ingredient');
        $this->addSql('ALTER TABLE recepe ADD number SMALLINT DEFAULT NULL, ADD step VARCHAR(255) NOT NULL, DROP nb_people, DROP description, CHANGE time time SMALLINT DEFAULT NULL, CHANGE difficulty difficulty SMALLINT NOT NULL, CHANGE price price SMALLINT NOT NULL, CHANGE is_favorite pined TINYINT(1) NOT NULL, CHANGE create_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
