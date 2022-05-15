<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220515162849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_entity (product_id INT NOT NULL, entity_id INT NOT NULL, INDEX IDX_6C5405CC4584665A (product_id), INDEX IDX_6C5405CC81257D5D (entity_id), PRIMARY KEY(product_id, entity_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_person (product_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_56A090D24584665A (product_id), INDEX IDX_56A090D2217BBB47 (person_id), PRIMARY KEY(product_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_entity ADD CONSTRAINT FK_6C5405CC4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_entity ADD CONSTRAINT FK_6C5405CC81257D5D FOREIGN KEY (entity_id) REFERENCES entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_person ADD CONSTRAINT FK_56A090D24584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_person ADD CONSTRAINT FK_56A090D2217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_entity');
        $this->addSql('DROP TABLE product_person');
    }
}
