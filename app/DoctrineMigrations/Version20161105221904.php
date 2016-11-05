<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161105221904 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Actual outcome Y\',\'actual_y\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Actual outcome N\',\'actual_n\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM `coefficient_type` WHERE `code` = \'actual_y\'');
        $this->addSql('DELETE FROM `coefficient_type` WHERE `code` = \'actual_n\'');
    }
}
