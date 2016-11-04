<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161104160812 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->getTable('event');

        $table->dropColumn('team_first_id');
        $table->dropColumn('team_second_id');
        $table->addColumn('team_first_id', 'integer', ['notnull' => false]);
        $table->addColumn('team_second_id', 'integer', ['notnull' => false]);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $table = $schema->getTable('event');
        $table->dropColumn('team_first_id');
        $table->dropColumn('team_second_id');
        $table->addColumn('team_first_id', 'integer');
        $table->addColumn('team_second_id', 'integer');
    }
}
