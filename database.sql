-- Adminer 4.8.1 PostgreSQL 15.2 (Debian 15.2-1.pgdg110+1) dump

DROP TABLE IF EXISTS "article_category";
CREATE TABLE "public"."article_category" (
    "article_id" integer NOT NULL,
    "category_id" integer NOT NULL,
    CONSTRAINT "article_category_pkey" PRIMARY KEY ("article_id", "category_id")
) WITH (oids = false);


DROP TABLE IF EXISTS "articles";
DROP SEQUENCE IF EXISTS articles_id_seq;
CREATE SEQUENCE articles_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."articles" (
    "id" integer DEFAULT nextval('articles_id_seq') NOT NULL,
    "title" character varying(255) NOT NULL,
    "content" text,
    "author_id" integer NOT NULL,
    "published_at" timestamp,
    CONSTRAINT "articles_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "categories";
DROP SEQUENCE IF EXISTS categories_id_seq;
CREATE SEQUENCE categories_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."categories" (
    "id" integer DEFAULT nextval('categories_id_seq') NOT NULL,
    "name" character varying(255) NOT NULL,
    "description" text,
    CONSTRAINT "categories_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "comments";
DROP SEQUENCE IF EXISTS comments_id_seq;
CREATE SEQUENCE comments_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."comments" (
    "id" integer DEFAULT nextval('comments_id_seq') NOT NULL,
    "content" text,
    "user_id" integer NOT NULL,
    "page_id" integer NOT NULL,
    "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT "comments_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "pages";
DROP SEQUENCE IF EXISTS pages_id_seq;
CREATE SEQUENCE pages_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."pages" (
    "id" integer DEFAULT nextval('pages_id_seq') NOT NULL,
    "title" character varying(255) NOT NULL,
    "content" text,
    "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT "pages_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying(255) NOT NULL,
    "email" character varying(255) NOT NULL,
    "password" character varying(255) NOT NULL,
    "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


ALTER TABLE ONLY "public"."article_category" ADD CONSTRAINT "article_category_article_id_fkey" FOREIGN KEY (article_id) REFERENCES articles(id) NOT DEFERRABLE;
ALTER TABLE ONLY "public"."article_category" ADD CONSTRAINT "article_category_category_id_fkey" FOREIGN KEY (category_id) REFERENCES categories(id) NOT DEFERRABLE;

ALTER TABLE ONLY "public"."articles" ADD CONSTRAINT "articles_author_id_fkey" FOREIGN KEY (author_id) REFERENCES users(id) NOT DEFERRABLE;

-- 2023-06-01 06:47:44.567421+00