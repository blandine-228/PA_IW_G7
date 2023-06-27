-- Adminer 4.8.1 PostgreSQL 15.2 (Debian 15.2-1.pgdg110+1) dump

DROP TABLE IF EXISTS "esgi_user";
CREATE TABLE "public"."esgi_user" (
    "firstname" character varying NOT NULL,
    "lastname" character varying NOT NULL,
    "email" character varying NOT NULL,
    "pwd" character varying NOT NULL,
    "country" character varying,
    "status" integer,
    "date_inserted" timestamp,
    "date_updated" timestamp
) WITH (oids = false);
