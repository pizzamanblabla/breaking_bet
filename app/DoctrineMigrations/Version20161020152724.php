<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161020152724 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('event');

        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('team_first_id', 'integer');
        $table->addColumn('team_second_id', 'integer');
        $table->addColumn('name', 'string');
        $table->addColumn('date', 'datetime');
        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('event');
    }
}
