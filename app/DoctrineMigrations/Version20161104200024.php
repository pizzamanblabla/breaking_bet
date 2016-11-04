<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161104200024 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('coefficient');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('bet_id', 'integer');
        $table->addColumn('coefficient_type_id', 'integer');
        $table->addColumn('date', 'datetime');
        $table->addColumn('value', 'float');
        $table->addColumn('ps', 'float');
        $table->setPrimaryKey(['id']);

        $table = $schema->createTable('coefficient_type');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string');
        $table->addColumn('code', 'string');
        $table->setPrimaryKey(['id']);

        $table = $schema->getTable('bet');
        $table->dropColumn('rate_team_one');
        $table->dropColumn('rate_team_two');
        $table->dropColumn('rate_draw');
        $table->dropColumn('rate_neither_team_one');
        $table->dropColumn('rate_neither_team_two');
        $table->dropColumn('rate_neither_draw');
        $table->dropColumn('coefficient_one');
        $table->dropColumn('coefficient_two');
        $table->dropColumn('allowance_one');
        $table->dropColumn('allowance_two');
        $table->dropColumn('total');
        $table->dropColumn('total_less');
        $table->dropColumn('total_more');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('coefficient');
        $schema->dropTable('coefficient_type');

        $table = $schema->getTable('bet');
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
    }
}
