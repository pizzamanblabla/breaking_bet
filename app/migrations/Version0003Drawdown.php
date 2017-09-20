<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version0003Drawdown extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<SQL
            CREATE TABLE drawdown (
                id SERIAL NOT NULL PRIMARY KEY,
                difference DOUBLE PRECISION NOT NULL,
                min_difference DOUBLE PRECISION NOT NULL,
                coefficient_one_id BIGINT NOT NULL REFERENCES coefficient(id),
                coefficient_two_id BIGINT NOT NULL REFERENCES coefficient(id),
                date TIMESTAMPTZ NOT NULL DEFAULT current_timestamp
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX drawdown_coefficient_idx ON drawdown (coefficient_one_id, coefficient_two_id, min_difference);
SQL
        );

        $this->addSql(<<<SQL
            CREATE INDEX drawdown_difference_idx ON drawdown (date, difference);
SQL
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('drawdown');
    }
}
