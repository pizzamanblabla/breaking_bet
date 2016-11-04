<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161104204533 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Actual outcome P1\',\'actual_p1\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Actual outcome P2\',\'actual_p2\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Actual outcome X\',\'actual_x\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Double outcome 1X\',\'double_1x\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Double outcome X2\',\'double_x2\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Double outcome 12\',\'double_12\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Handicap Kf_F1\',\'handicap_kf_f1\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Handicap F1\',\'handicap_f2\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Handicap Kf_F2\',\'handicap_kf_f2\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Handicap F2\',\'handicap_f2\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Total\',\'total\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Total Under\',\'total_under\')');
        $this->addSql('INSERT INTO `coefficient_type` (`name`, `code`) VALUES (\'Total Over\',\'total_over\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM `coefficient_type` WHERE 1');
    }
}
