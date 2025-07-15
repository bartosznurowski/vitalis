<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220193843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advisory (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amino_acid (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_10A498C6989D9B62 (slug), INDEX IDX_10A498C612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amino_acid_property (amino_acid_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_22B879DE9B404831 (amino_acid_id), INDEX IDX_22B879DE549213EC (property_id), PRIMARY KEY(amino_acid_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amino_acid_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_AF067CC1989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, energy_value INT NOT NULL, fat DOUBLE PRECISION NOT NULL, of_which_saturates DOUBLE PRECISION NOT NULL, carbohydrates DOUBLE PRECISION NOT NULL, of_which_sugars DOUBLE PRECISION NOT NULL, protein DOUBLE PRECISION NOT NULL, fibre DOUBLE PRECISION NOT NULL, salt DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_file_name VARCHAR(1024) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_23A0E66989D9B62 (slug), INDEX IDX_23A0E6612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_vitamin (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', vitamin_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_10F32E17294869C (article_id), INDEX IDX_10F32E18F77E7C7 (vitamin_id), PRIMARY KEY(article_id, vitamin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_mineral (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', mineral_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_F049EDC87294869C (article_id), INDEX IDX_F049EDC821F4A72C (mineral_id), PRIMARY KEY(article_id, mineral_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_property (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_DE1AE8B57294869C (article_id), INDEX IDX_DE1AE8B5549213EC (property_id), PRIMARY KEY(article_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_polyphenol (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', polyphenol_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_1EC4D85B7294869C (article_id), INDEX IDX_1EC4D85B549BA264 (polyphenol_id), PRIMARY KEY(article_id, polyphenol_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_fatty_acid (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', fatty_acid_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_D90AA7D67294869C (article_id), INDEX IDX_D90AA7D6690DA0FE (fatty_acid_id), PRIMARY KEY(article_id, fatty_acid_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_fiber (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', fiber_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_C1B2FD47294869C (article_id), INDEX IDX_C1B2FD421505D3A (fiber_id), PRIMARY KEY(article_id, fiber_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_amino_acid (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', amino_acid_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_2C7D49477294869C (article_id), INDEX IDX_2C7D49479B404831 (amino_acid_id), PRIMARY KEY(article_id, amino_acid_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_enzyme (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', enzyme_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_1717F2FC7294869C (article_id), INDEX IDX_1717F2FCA5F3194F (enzyme_id), PRIMARY KEY(article_id, enzyme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_terpene (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', terpene_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_5037381E7294869C (article_id), INDEX IDX_5037381EE302836F (terpene_id), PRIMARY KEY(article_id, terpene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_advisory (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', advisory_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_14FA49B27294869C (article_id), INDEX IDX_14FA49B246CB6A73 (advisory_id), PRIMARY KEY(article_id, advisory_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_usage (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', usage_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_A75C2C617294869C (article_id), INDEX IDX_A75C2C612150E69A (usage_id), PRIMARY KEY(article_id, usage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_contraindication (article_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', contraindication_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_AB2A18A47294869C (article_id), INDEX IDX_AB2A18A417EA8266 (contraindication_id), PRIMARY KEY(article_id, contraindication_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_53A4EDAA989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalog (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image_file_name VARCHAR(255) NOT NULL, entity_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1B2C3247989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contraindication (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enzyme (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_7DD0657C989D9B62 (slug), INDEX IDX_7DD0657C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enzyme_property (enzyme_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_37D1DAFAA5F3194F (enzyme_id), INDEX IDX_37D1DAFA549213EC (property_id), PRIMARY KEY(enzyme_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enzyme_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BA6FDFE5989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fatty_acid (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E5D37657989D9B62 (slug), INDEX IDX_E5D3765712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fatty_acid_property (fatty_acid_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_59C7EFF690DA0FE (fatty_acid_id), INDEX IDX_59C7EFF549213EC (property_id), PRIMARY KEY(fatty_acid_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fatty_acid_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_88227BE0989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiber (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7BAC5DC5989D9B62 (slug), INDEX IDX_7BAC5DC512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiber_property (fiber_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_78AFBDB621505D3A (fiber_id), INDEX IDX_78AFBDB6549213EC (property_id), PRIMARY KEY(fiber_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiber_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F511B8A9989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mineral (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D9BA97F989D9B62 (slug), INDEX IDX_1D9BA97F12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mineral_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E0139F81989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polyphenol (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_221D09DA989D9B62 (slug), INDEX IDX_221D09DA12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polyphenol_property (polyphenol_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_7739D001549BA264 (polyphenol_id), INDEX IDX_7739D001549213EC (property_id), PRIMARY KEY(polyphenol_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polyphenol_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FA87D51E989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terpene (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BDE57CA9989D9B62 (slug), INDEX IDX_BDE57CA912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terpene_property (terpene_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', property_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_E10660CDE302836F (terpene_id), INDEX IDX_E10660CD549213EC (property_id), PRIMARY KEY(terpene_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terpene_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6CB865D2989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `usage` (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vitamin (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_ECDD7656989D9B62 (slug), INDEX IDX_ECDD765612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vitamin_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E8694536989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE amino_acid ADD CONSTRAINT FK_10A498C612469DE2 FOREIGN KEY (category_id) REFERENCES amino_acid_category (id)');
        $this->addSql('ALTER TABLE amino_acid_property ADD CONSTRAINT FK_22B879DE9B404831 FOREIGN KEY (amino_acid_id) REFERENCES amino_acid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE amino_acid_property ADD CONSTRAINT FK_22B879DE549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article_vitamin ADD CONSTRAINT FK_10F32E17294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_vitamin ADD CONSTRAINT FK_10F32E18F77E7C7 FOREIGN KEY (vitamin_id) REFERENCES vitamin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_mineral ADD CONSTRAINT FK_F049EDC87294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_mineral ADD CONSTRAINT FK_F049EDC821F4A72C FOREIGN KEY (mineral_id) REFERENCES mineral (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_property ADD CONSTRAINT FK_DE1AE8B57294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_property ADD CONSTRAINT FK_DE1AE8B5549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_polyphenol ADD CONSTRAINT FK_1EC4D85B7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_polyphenol ADD CONSTRAINT FK_1EC4D85B549BA264 FOREIGN KEY (polyphenol_id) REFERENCES polyphenol (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_fatty_acid ADD CONSTRAINT FK_D90AA7D67294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_fatty_acid ADD CONSTRAINT FK_D90AA7D6690DA0FE FOREIGN KEY (fatty_acid_id) REFERENCES fatty_acid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_fiber ADD CONSTRAINT FK_C1B2FD47294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_fiber ADD CONSTRAINT FK_C1B2FD421505D3A FOREIGN KEY (fiber_id) REFERENCES fiber (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_amino_acid ADD CONSTRAINT FK_2C7D49477294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_amino_acid ADD CONSTRAINT FK_2C7D49479B404831 FOREIGN KEY (amino_acid_id) REFERENCES amino_acid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_enzyme ADD CONSTRAINT FK_1717F2FC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_enzyme ADD CONSTRAINT FK_1717F2FCA5F3194F FOREIGN KEY (enzyme_id) REFERENCES enzyme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_terpene ADD CONSTRAINT FK_5037381E7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_terpene ADD CONSTRAINT FK_5037381EE302836F FOREIGN KEY (terpene_id) REFERENCES terpene (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_advisory ADD CONSTRAINT FK_14FA49B27294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_advisory ADD CONSTRAINT FK_14FA49B246CB6A73 FOREIGN KEY (advisory_id) REFERENCES advisory (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_usage ADD CONSTRAINT FK_A75C2C617294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_usage ADD CONSTRAINT FK_A75C2C612150E69A FOREIGN KEY (usage_id) REFERENCES `usage` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_contraindication ADD CONSTRAINT FK_AB2A18A47294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_contraindication ADD CONSTRAINT FK_AB2A18A417EA8266 FOREIGN KEY (contraindication_id) REFERENCES contraindication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enzyme ADD CONSTRAINT FK_7DD0657C12469DE2 FOREIGN KEY (category_id) REFERENCES enzyme_category (id)');
        $this->addSql('ALTER TABLE enzyme_property ADD CONSTRAINT FK_37D1DAFAA5F3194F FOREIGN KEY (enzyme_id) REFERENCES enzyme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enzyme_property ADD CONSTRAINT FK_37D1DAFA549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fatty_acid ADD CONSTRAINT FK_E5D3765712469DE2 FOREIGN KEY (category_id) REFERENCES fatty_acid_category (id)');
        $this->addSql('ALTER TABLE fatty_acid_property ADD CONSTRAINT FK_59C7EFF690DA0FE FOREIGN KEY (fatty_acid_id) REFERENCES fatty_acid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fatty_acid_property ADD CONSTRAINT FK_59C7EFF549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiber ADD CONSTRAINT FK_7BAC5DC512469DE2 FOREIGN KEY (category_id) REFERENCES fiber_category (id)');
        $this->addSql('ALTER TABLE fiber_property ADD CONSTRAINT FK_78AFBDB621505D3A FOREIGN KEY (fiber_id) REFERENCES fiber (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiber_property ADD CONSTRAINT FK_78AFBDB6549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mineral ADD CONSTRAINT FK_1D9BA97F12469DE2 FOREIGN KEY (category_id) REFERENCES mineral_category (id)');
        $this->addSql('ALTER TABLE polyphenol ADD CONSTRAINT FK_221D09DA12469DE2 FOREIGN KEY (category_id) REFERENCES polyphenol_category (id)');
        $this->addSql('ALTER TABLE polyphenol_property ADD CONSTRAINT FK_7739D001549BA264 FOREIGN KEY (polyphenol_id) REFERENCES polyphenol (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE polyphenol_property ADD CONSTRAINT FK_7739D001549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE terpene ADD CONSTRAINT FK_BDE57CA912469DE2 FOREIGN KEY (category_id) REFERENCES terpene_category (id)');
        $this->addSql('ALTER TABLE terpene_property ADD CONSTRAINT FK_E10660CDE302836F FOREIGN KEY (terpene_id) REFERENCES terpene (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE terpene_property ADD CONSTRAINT FK_E10660CD549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vitamin ADD CONSTRAINT FK_ECDD765612469DE2 FOREIGN KEY (category_id) REFERENCES vitamin_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amino_acid DROP FOREIGN KEY FK_10A498C612469DE2');
        $this->addSql('ALTER TABLE amino_acid_property DROP FOREIGN KEY FK_22B879DE9B404831');
        $this->addSql('ALTER TABLE amino_acid_property DROP FOREIGN KEY FK_22B879DE549213EC');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('ALTER TABLE article_vitamin DROP FOREIGN KEY FK_10F32E17294869C');
        $this->addSql('ALTER TABLE article_vitamin DROP FOREIGN KEY FK_10F32E18F77E7C7');
        $this->addSql('ALTER TABLE article_mineral DROP FOREIGN KEY FK_F049EDC87294869C');
        $this->addSql('ALTER TABLE article_mineral DROP FOREIGN KEY FK_F049EDC821F4A72C');
        $this->addSql('ALTER TABLE article_property DROP FOREIGN KEY FK_DE1AE8B57294869C');
        $this->addSql('ALTER TABLE article_property DROP FOREIGN KEY FK_DE1AE8B5549213EC');
        $this->addSql('ALTER TABLE article_polyphenol DROP FOREIGN KEY FK_1EC4D85B7294869C');
        $this->addSql('ALTER TABLE article_polyphenol DROP FOREIGN KEY FK_1EC4D85B549BA264');
        $this->addSql('ALTER TABLE article_fatty_acid DROP FOREIGN KEY FK_D90AA7D67294869C');
        $this->addSql('ALTER TABLE article_fatty_acid DROP FOREIGN KEY FK_D90AA7D6690DA0FE');
        $this->addSql('ALTER TABLE article_fiber DROP FOREIGN KEY FK_C1B2FD47294869C');
        $this->addSql('ALTER TABLE article_fiber DROP FOREIGN KEY FK_C1B2FD421505D3A');
        $this->addSql('ALTER TABLE article_amino_acid DROP FOREIGN KEY FK_2C7D49477294869C');
        $this->addSql('ALTER TABLE article_amino_acid DROP FOREIGN KEY FK_2C7D49479B404831');
        $this->addSql('ALTER TABLE article_enzyme DROP FOREIGN KEY FK_1717F2FC7294869C');
        $this->addSql('ALTER TABLE article_enzyme DROP FOREIGN KEY FK_1717F2FCA5F3194F');
        $this->addSql('ALTER TABLE article_terpene DROP FOREIGN KEY FK_5037381E7294869C');
        $this->addSql('ALTER TABLE article_terpene DROP FOREIGN KEY FK_5037381EE302836F');
        $this->addSql('ALTER TABLE article_advisory DROP FOREIGN KEY FK_14FA49B27294869C');
        $this->addSql('ALTER TABLE article_advisory DROP FOREIGN KEY FK_14FA49B246CB6A73');
        $this->addSql('ALTER TABLE article_usage DROP FOREIGN KEY FK_A75C2C617294869C');
        $this->addSql('ALTER TABLE article_usage DROP FOREIGN KEY FK_A75C2C612150E69A');
        $this->addSql('ALTER TABLE article_contraindication DROP FOREIGN KEY FK_AB2A18A47294869C');
        $this->addSql('ALTER TABLE article_contraindication DROP FOREIGN KEY FK_AB2A18A417EA8266');
        $this->addSql('ALTER TABLE enzyme DROP FOREIGN KEY FK_7DD0657C12469DE2');
        $this->addSql('ALTER TABLE enzyme_property DROP FOREIGN KEY FK_37D1DAFAA5F3194F');
        $this->addSql('ALTER TABLE enzyme_property DROP FOREIGN KEY FK_37D1DAFA549213EC');
        $this->addSql('ALTER TABLE fatty_acid DROP FOREIGN KEY FK_E5D3765712469DE2');
        $this->addSql('ALTER TABLE fatty_acid_property DROP FOREIGN KEY FK_59C7EFF690DA0FE');
        $this->addSql('ALTER TABLE fatty_acid_property DROP FOREIGN KEY FK_59C7EFF549213EC');
        $this->addSql('ALTER TABLE fiber DROP FOREIGN KEY FK_7BAC5DC512469DE2');
        $this->addSql('ALTER TABLE fiber_property DROP FOREIGN KEY FK_78AFBDB621505D3A');
        $this->addSql('ALTER TABLE fiber_property DROP FOREIGN KEY FK_78AFBDB6549213EC');
        $this->addSql('ALTER TABLE mineral DROP FOREIGN KEY FK_1D9BA97F12469DE2');
        $this->addSql('ALTER TABLE polyphenol DROP FOREIGN KEY FK_221D09DA12469DE2');
        $this->addSql('ALTER TABLE polyphenol_property DROP FOREIGN KEY FK_7739D001549BA264');
        $this->addSql('ALTER TABLE polyphenol_property DROP FOREIGN KEY FK_7739D001549213EC');
        $this->addSql('ALTER TABLE terpene DROP FOREIGN KEY FK_BDE57CA912469DE2');
        $this->addSql('ALTER TABLE terpene_property DROP FOREIGN KEY FK_E10660CDE302836F');
        $this->addSql('ALTER TABLE terpene_property DROP FOREIGN KEY FK_E10660CD549213EC');
        $this->addSql('ALTER TABLE vitamin DROP FOREIGN KEY FK_ECDD765612469DE2');
        $this->addSql('DROP TABLE advisory');
        $this->addSql('DROP TABLE amino_acid');
        $this->addSql('DROP TABLE amino_acid_property');
        $this->addSql('DROP TABLE amino_acid_category');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_vitamin');
        $this->addSql('DROP TABLE article_mineral');
        $this->addSql('DROP TABLE article_property');
        $this->addSql('DROP TABLE article_polyphenol');
        $this->addSql('DROP TABLE article_fatty_acid');
        $this->addSql('DROP TABLE article_fiber');
        $this->addSql('DROP TABLE article_amino_acid');
        $this->addSql('DROP TABLE article_enzyme');
        $this->addSql('DROP TABLE article_terpene');
        $this->addSql('DROP TABLE article_advisory');
        $this->addSql('DROP TABLE article_usage');
        $this->addSql('DROP TABLE article_contraindication');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE catalog');
        $this->addSql('DROP TABLE contraindication');
        $this->addSql('DROP TABLE enzyme');
        $this->addSql('DROP TABLE enzyme_property');
        $this->addSql('DROP TABLE enzyme_category');
        $this->addSql('DROP TABLE fatty_acid');
        $this->addSql('DROP TABLE fatty_acid_property');
        $this->addSql('DROP TABLE fatty_acid_category');
        $this->addSql('DROP TABLE fiber');
        $this->addSql('DROP TABLE fiber_property');
        $this->addSql('DROP TABLE fiber_category');
        $this->addSql('DROP TABLE mineral');
        $this->addSql('DROP TABLE mineral_category');
        $this->addSql('DROP TABLE polyphenol');
        $this->addSql('DROP TABLE polyphenol_property');
        $this->addSql('DROP TABLE polyphenol_category');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE terpene');
        $this->addSql('DROP TABLE terpene_property');
        $this->addSql('DROP TABLE terpene_category');
        $this->addSql('DROP TABLE `usage`');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE vitamin');
        $this->addSql('DROP TABLE vitamin_category');
    }
}
