<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260223210727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY `FK_9474526CED5CA9E6`');
        $this->addSql('DROP INDEX IDX_9474526CED5CA9E6 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE service_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_9474526CBCF5E72D ON comment (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBCF5E72D');
        $this->addSql('DROP INDEX IDX_9474526CBCF5E72D ON comment');
        $this->addSql('ALTER TABLE comment CHANGE categorie_id service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT `FK_9474526CED5CA9E6` FOREIGN KEY (service_id) REFERENCES service (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9474526CED5CA9E6 ON comment (service_id)');
    }
}
