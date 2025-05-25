CREATE TABLE "users" (
  "id" integer PRIMARY KEY,
  "name" varchar,
  "user_image" varchar,
  "email" varchar NOT NULL,
  "password" varchar NOT NULL,
  "created_at" timestamp
);

CREATE TABLE "posts" (
  "id" integer PRIMARY KEY,
  "title" varchar,
  "image" varchar,
  "description" text,
  "Admin_id" integer NOT NULL,
  "category_id" integer NOT NULL,
  "created_at" timestamp
);

CREATE TABLE "Admins" (
  "id" integer PRIMARY KEY,
  "name" varchar,
  "admin_image" varchar,
  "email" varchar NOT NULL,
  "password" varchar NOT NULL,
  "role" enum(super-admin,admin,editor),
  "created_at" timestamp
);

CREATE TABLE "comments" (
  "id" integer PRIMARY KEY,
  "commant" varchar,
  "post_id" integer,
  "user_id" integer,
  "admin_id" integer
);

CREATE TABLE "categories" (
  "id" integer PRIMARY KEY,
  "name" varchar
);

CREATE TABLE "tags" (
  "id" integer PRIMARY KEY,
  "name" varchar
);

CREATE TABLE "post_tags" (
  "post_id" integer NOT NULL,
  "tag_id" integer NOT NULL
);

CREATE TABLE "about_us" (
  "image" varchar,
  "description" text
);

CREATE TABLE "contact_us" (
  "id" integer PRIMARY KEY,
  "name" varchar,
  "email" varchar,
  "subject" varchar,
  "massage" varchar
);

CREATE TABLE "settings" (
  "id" integer PRIMARY KEY,
  "icon" varchar,
  "url_twitter" varchar,
  "url_facebook" varchar,
  "url_whatsapp" varchar,
  "email" varchar,
  "phone" varchar,
  "address" varchar
);

ALTER TABLE "posts" ADD FOREIGN KEY ("Admin_id") REFERENCES "Admins" ("id");

ALTER TABLE "posts" ADD FOREIGN KEY ("category_id") REFERENCES "categories" ("id");

ALTER TABLE "comments" ADD FOREIGN KEY ("post_id") REFERENCES "posts" ("id");

ALTER TABLE "comments" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "post_tags" ADD FOREIGN KEY ("post_id") REFERENCES "posts" ("id");

ALTER TABLE "post_tags" ADD FOREIGN KEY ("tag_id") REFERENCES "tags" ("id");

ALTER TABLE "comments" ADD FOREIGN KEY ("admin_id") REFERENCES "Admins" ("id");
