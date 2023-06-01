-- Adminer 4.8.1 PostgreSQL 15.2 (Debian 15.2-1.pgdg110+1) dump
-- Adminer 4.8.1 PostgreSQL 15.2 (Debian 15.2-1.pgdg110+1) dump

DROP TABLE IF EXISTS "Address";
CREATE TABLE "public"."Address" (
    "user_id" character(1) NOT NULL,
    "name" character(1) NOT NULL,
    "address" text NOT NULL,
    "district" text NOT NULL,
    "city" text NOT NULL,
    "postal_code" numeric NOT NULL,
    "phone" numeric NOT NULL,
    "updated_at" timestamp NOT NULL
) WITH (oids = false);


DROP TABLE IF EXISTS "Image";
CREATE TABLE "public"."Image" (
    "file_name" character(1) NOT NULL,
    "user_id" uuid,
    "created_at" timestamp NOT NULL
) WITH (oids = false);


DROP TABLE IF EXISTS "Menu";
CREATE TABLE "public"."Menu" (
    "title" text NOT NULL,
    "description" text NOT NULL,
    "image" path,
    "created_at" timestamp NOT NULL,
    "updated_at" timestamp NOT NULL,
    "active" integer NOT NULL
) WITH (oids = false);


DROP TABLE IF EXISTS "Page";
CREATE TABLE "public"."Page" (
    "title" text NOT NULL,
    "image" path,
    "html" xml NOT NULL,
    "created_at" timestamp NOT NULL,
    "updated_at" timestamp NOT NULL,
    "active" integer NOT NULL
) WITH (oids = false);


DROP TABLE IF EXISTS "Product";
CREATE TABLE "public"."Product" (
    "name" character(1) NOT NULL,
    "description" character varying NOT NULL,
    "quantity" numeric NOT NULL,
    "price" integer NOT NULL,
    "image" path NOT NULL,
    "created_at" timestamp NOT NULL,
    "updated_at" timestamp NOT NULL
) WITH (oids = false);


DROP TABLE IF EXISTS "User";
CREATE TABLE "public"."User" (
    "firstname" character varying NOT NULL,
    "lastname" character varying NOT NULL,
    "email" character varying NOT NULL,
    "pwd" character varying NOT NULL,
    "country" character varying NOT NULL,
    "status" integer,
    "date_inserted" timestamp NOT NULL,
    "date_updated" timestamp NOT NULL
) WITH (oids = false);


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


ALTER TABLE ONLY "public"."article_category" ADD CONSTRAINT "article_category_article_id_fkey" FOREIGN KEY (article_id) REFERENCES articles(id) NOT DEFERRABLE;
ALTER TABLE ONLY "public"."article_category" ADD CONSTRAINT "article_category_category_id_fkey" FOREIGN KEY (category_id) REFERENCES categories(id) NOT DEFERRABLE;

ALTER TABLE ONLY "public"."articles" ADD CONSTRAINT "articles_author_id_fkey" FOREIGN KEY (author_id) REFERENCES users(id) NOT DEFERRABLE;

-- 2023-06-01 08:05:19.103674+00