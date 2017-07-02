<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version0002Sources extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<SQL
            INSERT INTO source (name, url, meta) 
            VALUES ('betsbc', 'http://www.betsbc.com', '{"proxy":{"ip": "89.107.58.215", "port": "443"}, "initialUrl": "/api/v1/bets/line"}');
SQL
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql(<<<SQL
            DELETE FROM source;
SQL
        );
    }
}
