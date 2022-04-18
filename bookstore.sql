CREATE TABLE `author` (
  `id` INT PRIMARY KEY,
  `name` varchar(255),
  `description` text
);

CREATE TABLE `categories` (
  `id` INT PRIMARY KEY,
  `name` varchar(255),
  `description` text
);

CREATE TABLE `media` (
  `id` INT PRIMARY KEY,
  `media_name` varchar(255),
  `media_path` varchar(255)
);

CREATE TABLE `products` (
  `id` INT PRIMARY KEY,
  `name` varchar(255),
  `author_id` INT,
  `category_id` INT,
  `sale_price` INT,
  `unit_price` INT,
  `quantity` INT,
  `description` text,
  `media_id` INT
);

CREATE TABLE `user` (
  `id` INT PRIMARY KEY,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `username` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `phonenumber` varchar(255),
  `street` varchar(255),
  `village` varchar(255),
  `district` varchar(255),
  `province` varchar(255),
  `type` varchar(255),
  `created_at` datetime
);

CREATE TABLE `order` (
  `id` INT PRIMARY KEY,
  `user_id` INT,
  `total` INT,
  `sale_time` datetime,
  `order_option` varchar(255)
);

CREATE TABLE `orderdetail` (
  `id` INT PRIMARY KEY,
  `product_id` INT,
  `quantity` INT,
  `price` INT
);
