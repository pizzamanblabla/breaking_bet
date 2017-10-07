<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version0001Initial extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<SQL
            CREATE TABLE source (
                id SERIAL NOT NULL PRIMARY KEY,
                name CHARACTER VARYING(128) NOT NULL,
                url CHARACTER VARYING(256) NOT NULL,
                meta JSONB NOT NULL DEFAULT '{}'
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX source_idx ON source (name);
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE kind (
                id SERIAL NOT NULL PRIMARY KEY,
                name CHARACTER VARYING(128) NOT NULL,
                external_id BIGINT NOT NULL,
                source_id BIGINT NOT NULL REFERENCES source(id)
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX kind_external_source_idx ON kind (external_id, source_id);
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE chain (
                id SERIAL NOT NULL PRIMARY KEY,
                name CHARACTER VARYING(256) NOT NULL,
                external_id BIGINT NOT NULL,
                kind_id BIGINT NOT NULL REFERENCES kind(id)
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX chain_external_kind_idx ON chain (external_id, kind_id);
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE team (
                id SERIAL NOT NULL PRIMARY KEY,
                name CHARACTER VARYING(256) NOT NULL,
                external_id BIGINT NOT NULL,
                kind_id BIGINT NOT NULL REFERENCES kind(id)
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX team_external_kind_idx ON team (external_id, kind_id);
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE event (
                id SERIAL NOT NULL PRIMARY KEY,
                name CHARACTER VARYING(256) NOT NULL,
                external_id BIGINT NOT NULL,
                chain_id BIGINT NOT NULL REFERENCES chain(id),
                date TIMESTAMPTZ NOT NULL DEFAULT current_timestamp
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX event_external_chain_idx ON event (external_id, chain_id);
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE bet (
                id SERIAL NOT NULL PRIMARY KEY,
                event_id BIGINT NOT NULL REFERENCES event(id),
                date TIMESTAMPTZ NOT NULL DEFAULT current_timestamp
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE coefficient (
                id SERIAL NOT NULL PRIMARY KEY,
                bet_id BIGINT NOT NULL REFERENCES bet(id),
                coefficient_type varchar(36) NOT NULL,
                value DOUBLE PRECISION NOT NULL,
                ps DOUBLE PRECISION DEFAULT NULL,
                lv DOUBLE PRECISION DEFAULT NULL,
                date TIMESTAMPTZ NOT NULL DEFAULT current_timestamp
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE TABLE event_team(
                event_id INTEGER NOT NULL REFERENCES event(id),
                team_id INTEGER NOT NULL REFERENCES team(id)
            );
SQL
        );

        $this->addSql(<<<SQL
            CREATE UNIQUE INDEX event_team_idx ON event_team (event_id, team_id);
SQL
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('source');
        $schema->dropTable('kind');
        $schema->dropTable('chain');
        $schema->dropTable('team');
        $schema->dropTable('event');
        $schema->dropTable('bet');
        $schema->dropTable('coefficient');
        $schema->dropTable('event_team');
    }
}
