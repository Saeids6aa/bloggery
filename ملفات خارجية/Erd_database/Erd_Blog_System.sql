CREATE TABLE `users` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `user_image` varchar(255),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp
);

CREATE TABLE `posts` (
  `id` integer PRIMARY KEY,
  `title` varchar(255),
  `image` varchar(255),
  `description` text,
  `Admins_id` integer NOT NULL,
  `categories_id` integer NOT NULL,
  `tag_id` integer NOT NULL,
  `created_at` timestamp
);

CREATE TABLE `Admins` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `admin_image` varchar(255),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role_id` integer NOT NULL,
  `created_at` timestamp
);

CREATE TABLE `comments` (
  `id` integer PRIMARY KEY,
  `commant` varchar(255),
  `post_id` integer,
  `user_id` integer
);

CREATE TABLE `categories` (
  `id` integer PRIMARY KEY,
  `name` varchar(255)
);

CREATE TABLE `tags` (
  `id` integer PRIMARY KEY,
  `name` varchar(255)
);

CREATE TABLE `post_tags` (
  `post_id` integer NOT NULL,
  `tag_id` integer NOT NULL,
  PRIMARY KEY (`post_id`, `tag_id`)
);

CREATE TABLE `about_us` (
  `image` varchar(255),
  `description` text
);

CREATE TABLE `contact_us` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `email` varchar(255),
  `subject` varchar(255),
  `massage` varchar(255)
);

CREATE TABLE `settings` (
  `id` integer PRIMARY KEY,
  `icon` varchar(255),
  `url_twitter` varchar(255),
  `url_facebook` varchar(255),
  `url_whatsapp` varchar(255),
  `email` varchar(255),
  `phone` varchar(255),
  `address` varchar(255)
);

CREATE TABLE `Roles` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `role_name` enum
);

ALTER TABLE `posts` ADD FOREIGN KEY (`Admins_id`) REFERENCES `Admins` (`id`);

ALTER TABLE `posts` ADD FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `Admins` ADD FOREIGN KEY (`Role_id`) REFERENCES `Roles` (`id`);

ALTER TABLE `post_tags` ADD FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

ALTER TABLE `post_tags` ADD FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
