CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `created_at` datetime
);

CREATE TABLE `folders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `name` varchar(255),
  `created_at` datetime
);

CREATE TABLE `tasks` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `folder_id` int,
  `title` varchar(255),
  `is_done` boolean,
  `created_at` datetime
);

ALTER TABLE
  `folders`
ADD
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE
  `tasks`
ADD
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE
  `tasks`
ADD
  FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`);