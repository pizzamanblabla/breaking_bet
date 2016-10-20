<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161020181523 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('bet');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('date', 'datetime');
        $table->addColumn('event_id', 'integer');
        $table->addColumn('rate_team_one', 'float');
        $table->addColumn('rate_team_two', 'float');
        $table->addColumn('rate_draw', 'float');
        $table->addColumn('rate_neither_team_one', 'float');
        $table->addColumn('rate_neither_team_two', 'float');
        $table->addColumn('rate_neither_draw', 'float');
        $table->addColumn('coefficient_one', 'float');
        $table->addColumn('coefficient_two', 'float');
        $table->addColumn('allowance_one', 'float');
        $table->addColumn('allowance_two', 'float');
        $table->addColumn('total', 'float');
        $table->addColumn('total_less', 'float');
        $table->addColumn('total_more', 'float');
        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('bet');
    }
}
