-- Adminer 4.8.1 PostgreSQL 15.2 (Debian 15.2-1.pgdg110+1) dump

DROP TABLE IF EXISTS "esgi_user";
DROP SEQUENCE IF EXISTS esgi_user_id_seq;
CREATE SEQUENCE esgi_user_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."esgi_user" (
    "id" integer DEFAULT nextval('esgi_user_id_seq') NOT NULL,
    "firstname" character varying NOT NULL,
    "lastname" character varying NOT NULL,
    "email" character varying NOT NULL,
    "pwd" character varying NOT NULL,
    "country" character varying,
    "status" integer,
    "date_inserted" timestamp,
    "date_updated" timestamp,
    "role" character varying NOT NULL,
    "verificationtoken" character varying(100),
    CONSTRAINT "esgi_user_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "esgi_user" ("id", "firstname", "lastname", "email", "pwd", "country", "status", "date_inserted", "date_updated", "role", "verificationtoken") VALUES
(1,	'Lisa',	'GUEMMAR',	'wp-admin@gmail.com',	'$2y$10$YyqpzxZIYJOXvD3qUbosKe0CG83z5mGcHyqUx3Zg0ZwnYsbO4nM7C',	NULL,	1,	NULL,	NULL,	'user',	'51c9d65a8d6f64499c14aee07d928f84eccd49971d5ab48441538e86a64ab1a9538f05d6ff0288967d9498263d4e714a61fd'),
(2,	'Blandine',	'BA',	'ba@gmail.com',	'$2y$10$dhFfy09yL8uOvrQSePGoR.YJz7xPKoQJJ9.ftNCMSPC3/V7Cz3/4O',	NULL,	1,	NULL,	NULL,	'user',	'f1ec7c31cce1a43378d455c727aabf5793215604cc7b1a2091fe794c60a165b381ad0ff15e344b13a78c8d43c1c1e320c154');

-- 2023-06-28 09:53:25.240648+00