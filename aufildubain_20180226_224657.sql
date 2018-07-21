-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "categories" -------------------------------
-- DROP TABLE "categories" -------------------------------------
DROP TABLE IF EXISTS `categories` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "categories" -----------------------------------
CREATE TABLE `categories` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`parent_id` Int( 10 ) UNSIGNED NULL,
	`order` Int( 11 ) NOT NULL DEFAULT '1',
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `categories_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "data_rows" --------------------------------
-- DROP TABLE "data_rows" --------------------------------------
DROP TABLE IF EXISTS `data_rows` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "data_rows" ------------------------------------
CREATE TABLE `data_rows` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`data_type_id` Int( 10 ) UNSIGNED NOT NULL,
	`field` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`type` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`required` TinyInt( 1 ) NOT NULL DEFAULT '0',
	`browse` TinyInt( 1 ) NOT NULL DEFAULT '1',
	`read` TinyInt( 1 ) NOT NULL DEFAULT '1',
	`edit` TinyInt( 1 ) NOT NULL DEFAULT '1',
	`add` TinyInt( 1 ) NOT NULL DEFAULT '1',
	`delete` TinyInt( 1 ) NOT NULL DEFAULT '1',
	`details` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`order` Int( 11 ) NOT NULL DEFAULT '1',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 177;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "data_types" -------------------------------
-- DROP TABLE "data_types" -------------------------------------
DROP TABLE IF EXISTS `data_types` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "data_types" -----------------------------------
CREATE TABLE `data_types` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name_singular` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name_plural` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`icon` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`model_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`policy_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`controller` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`description` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`generate_permissions` TinyInt( 1 ) NOT NULL DEFAULT '0',
	`server_side` TinyInt( 4 ) NOT NULL DEFAULT '0',
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `data_types_name_unique` UNIQUE( `name` ),
	CONSTRAINT `data_types_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 20;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "menu_items" -------------------------------
-- DROP TABLE "menu_items" -------------------------------------
DROP TABLE IF EXISTS `menu_items` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "menu_items" -----------------------------------
CREATE TABLE `menu_items` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`menu_id` Int( 10 ) UNSIGNED NULL,
	`title` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`url` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`target` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
	`icon_class` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`color` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`parent_id` Int( 11 ) NULL,
	`order` Int( 11 ) NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`route` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`parameters` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 25;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "menus" ------------------------------------
-- DROP TABLE "menus" ------------------------------------------
DROP TABLE IF EXISTS `menus` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "menus" ----------------------------------------
CREATE TABLE `menus` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `menus_name_unique` UNIQUE( `name` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "migrations" -------------------------------
-- DROP TABLE "migrations" -------------------------------------
DROP TABLE IF EXISTS `migrations` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "migrations" -----------------------------------
CREATE TABLE `migrations` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`migration` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`batch` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 34;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "pages" ------------------------------------
-- DROP TABLE "pages" ------------------------------------------
DROP TABLE IF EXISTS `pages` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "pages" ----------------------------------------
CREATE TABLE `pages` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`author_id` Int( 11 ) NOT NULL,
	`title` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`excerpt` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`body` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`image` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`meta_description` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`meta_keywords` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`status` Enum( 'ACTIVE', 'INACTIVE' ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `pages_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "password_resets" --------------------------
-- DROP TABLE "password_resets" --------------------------------
DROP TABLE IF EXISTS `password_resets` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "password_resets" ------------------------------
CREATE TABLE `password_resets` ( 
	`email` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`token` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "permission_groups" ------------------------
-- DROP TABLE "permission_groups" ------------------------------
DROP TABLE IF EXISTS `permission_groups` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "permission_groups" ----------------------------
CREATE TABLE `permission_groups` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `permission_groups_name_unique` UNIQUE( `name` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "permission_role" --------------------------
-- DROP TABLE "permission_role" --------------------------------
DROP TABLE IF EXISTS `permission_role` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "permission_role" ------------------------------
CREATE TABLE `permission_role` ( 
	`permission_id` Int( 10 ) UNSIGNED NOT NULL,
	`role_id` Int( 10 ) UNSIGNED NOT NULL,
	PRIMARY KEY ( `permission_id`, `role_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "permissions" ------------------------------
-- DROP TABLE "permissions" ------------------------------------
DROP TABLE IF EXISTS `permissions` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "permissions" ----------------------------------
CREATE TABLE `permissions` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`key` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`table_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`permission_group_id` Int( 10 ) UNSIGNED NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 101;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "posts" ------------------------------------
-- DROP TABLE "posts" ------------------------------------------
DROP TABLE IF EXISTS `posts` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "posts" ----------------------------------------
CREATE TABLE `posts` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`author_id` Int( 11 ) NOT NULL,
	`category_id` Int( 11 ) NULL,
	`title` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`seo_title` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`excerpt` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`body` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`image` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`meta_description` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`meta_keywords` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`status` Enum( 'PUBLISHED', 'DRAFT', 'PENDING' ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
	`featured` TinyInt( 1 ) NOT NULL DEFAULT '0',
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `posts_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "product_categories" -----------------------
-- DROP TABLE "product_categories" -----------------------------
DROP TABLE IF EXISTS `product_categories` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "product_categories" ---------------------------
CREATE TABLE `product_categories` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`deleted_at` Timestamp NULL,
	`description` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`fullname` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`image_alt` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`meta_description` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`meta_keywords` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`meta_title` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`parent_id` Int( 11 ) NULL,
	`image` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `product_categories_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 8;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "products" ---------------------------------
-- DROP TABLE "products" ---------------------------------------
DROP TABLE IF EXISTS `products` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "products" -------------------------------------
CREATE TABLE `products` ( 
	`id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`slug` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`description` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`images` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`product_category_id` Int( 10 ) UNSIGNED NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`deleted_at` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "roles" ------------------------------------
-- DROP TABLE "roles" ------------------------------------------
DROP TABLE IF EXISTS `roles` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "roles" ----------------------------------------
CREATE TABLE `roles` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `roles_name_unique` UNIQUE( `name` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "settings" ---------------------------------
-- DROP TABLE "settings" ---------------------------------------
DROP TABLE IF EXISTS `settings` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "settings" -------------------------------------
CREATE TABLE `settings` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`key` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`value` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`details` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`type` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`order` Int( 11 ) NOT NULL DEFAULT '1',
	`group` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `settings_key_unique` UNIQUE( `key` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "translations" -----------------------------
-- DROP TABLE "translations" -----------------------------------
DROP TABLE IF EXISTS `translations` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "translations" ---------------------------------
CREATE TABLE `translations` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`table_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`column_name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`foreign_key` Int( 10 ) UNSIGNED NOT NULL,
	`locale` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`value` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `translations_table_name_column_name_foreign_key_locale_unique` UNIQUE( `table_name`, `column_name`, `foreign_key`, `locale` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 54;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
-- DROP TABLE "users" ------------------------------------------
DROP TABLE IF EXISTS `users` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`role_id` Int( 11 ) NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`avatar` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'users/default.png',
	`password` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`remember_token` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `users_email_unique` UNIQUE( `email` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "brands" -----------------------------------
-- DROP TABLE "brands" -----------------------------------------
DROP TABLE IF EXISTS `brands` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "brands" ---------------------------------------
CREATE TABLE `brands` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`description` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`meta_description` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`meta_keywords` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`meta_title` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`ord` Int( 10 ) UNSIGNED NOT NULL,
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	`deleted_at` Timestamp NULL,
	`image` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `brands_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "trends" -----------------------------------
-- DROP TABLE "trends" -----------------------------------------
DROP TABLE IF EXISTS `trends` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "trends" ---------------------------------------
CREATE TABLE `trends` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`title` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "bread_templates" --------------------------
-- DROP TABLE "bread_templates" --------------------------------
DROP TABLE IF EXISTS `bread_templates` CASCADE;
-- -------------------------------------------------------------


-- CREATE TABLE "bread_templates" ------------------------------
CREATE TABLE `bread_templates` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`slug` VarChar( 191 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`view` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
	`created_at` Timestamp NULL,
	`updated_at` Timestamp NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `bread_templates_name_unique` UNIQUE( `name` ),
	CONSTRAINT `bread_templates_slug_unique` UNIQUE( `slug` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- Dump data of "categories" -------------------------------
INSERT INTO `categories`(`id`,`parent_id`,`order`,`name`,`slug`,`created_at`,`updated_at`) VALUES ( '1', NULL, '1', 'Category 1', 'category-1', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `categories`(`id`,`parent_id`,`order`,`name`,`slug`,`created_at`,`updated_at`) VALUES ( '2', NULL, '1', 'Category 2', 'category-2', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
-- ---------------------------------------------------------


-- Dump data of "data_rows" --------------------------------
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '1', '1', 'id', 'number', 'ID', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '2', '1', 'author_id', 'text', 'Author', '1', '0', '1', '1', '0', '1', '', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '3', '1', 'category_id', 'text', 'Category', '1', '0', '1', '1', '1', '0', '', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '4', '1', 'title', 'text', 'Title', '1', '1', '1', '1', '1', '1', '', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '5', '1', 'excerpt', 'text_area', 'excerpt', '1', '0', '1', '1', '1', '1', '', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '6', '1', 'body', 'rich_text_box', 'Body', '1', '0', '1', '1', '1', '1', '', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '7', '1', 'image', 'image', 'Post Image', '0', '1', '1', '1', '1', '1', '{"resize":{"width":"1000","height":"null"},"quality":"70%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"},{"name":"small","scale":"25%"},{"name":"cropped","crop":{"width":"300","height":"250"}}]}', '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '8', '1', 'slug', 'text', 'slug', '1', '0', '1', '1', '1', '1', '{"slugify":{"origin":"title","forceUpdate":true}}', '8' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '9', '1', 'meta_description', 'text_area', 'meta_description', '1', '0', '1', '1', '1', '1', '', '9' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '10', '1', 'meta_keywords', 'text_area', 'meta_keywords', '1', '0', '1', '1', '1', '1', '', '10' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '11', '1', 'status', 'select_dropdown', 'status', '1', '1', '1', '1', '1', '1', '{"default":"DRAFT","options":{"PUBLISHED":"published","DRAFT":"draft","PENDING":"pending"}}', '11' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '12', '1', 'created_at', 'timestamp', 'created_at', '0', '1', '1', '0', '0', '0', '', '12' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '13', '1', 'updated_at', 'timestamp', 'updated_at', '0', '0', '0', '0', '0', '0', '', '13' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '14', '2', 'id', 'number', 'id', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '15', '2', 'author_id', 'text', 'author_id', '1', '0', '0', '0', '0', '0', '', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '16', '2', 'title', 'text', 'title', '1', '1', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"r01_lf"}}', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '17', '2', 'excerpt', 'text_area', 'excerpt', '1', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"r02_lf"}}', '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '18', '2', 'body', 'rich_text_box', 'body', '1', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4"}}', '11' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '19', '2', 'slug', 'text', 'slug', '1', '0', '1', '1', '1', '1', '{"slugify":{"origin":"title"},"template":{"slug":"columns-8-4","stack":"r01_lf"}}', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '20', '2', 'meta_description', 'text', 'meta_description', '1', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"r01_lf"}}', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '21', '2', 'meta_keywords', 'text', 'meta_keywords', '1', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"r01_lf"}}', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '22', '2', 'status', 'select_dropdown', 'status', '1', '1', '1', '1', '1', '1', '{"default":"INACTIVE","options":{"INACTIVE":"INACTIVE","ACTIVE":"ACTIVE"},"template":{"slug":"columns-8-4","stack":"r01_rg"}}', '8' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '23', '2', 'created_at', 'timestamp', 'created_at', '1', '1', '1', '0', '0', '0', '{"template":{"slug":"columns-8-4","stack":"r01_rg"}}', '9' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '24', '2', 'updated_at', 'timestamp', 'updated_at', '1', '0', '0', '0', '0', '0', '', '11' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '25', '2', 'image', 'image', 'image', '0', '1', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"r02_rg"}}', '10' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '26', '3', 'id', 'number', 'id', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '27', '3', 'name', 'text', 'name', '1', '1', '1', '1', '1', '1', '', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '28', '3', 'email', 'text', 'email', '1', '1', '1', '1', '1', '1', '', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '29', '3', 'password', 'password', 'password', '0', '0', '0', '1', '1', '0', '', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '30', '3', 'user_belongsto_role_relationship', 'relationship', 'Role', '0', '1', '1', '1', '1', '0', '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"name","pivot_table":"roles","pivot":"0"}', '10' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '31', '3', 'remember_token', 'text', 'remember_token', '0', '0', '0', '0', '0', '0', '', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '32', '3', 'created_at', 'timestamp', 'created_at', '0', '1', '1', '0', '0', '0', '', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '33', '3', 'updated_at', 'timestamp', 'updated_at', '0', '0', '0', '0', '0', '0', '', '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '34', '3', 'avatar', 'image', 'avatar', '0', '1', '1', '1', '1', '1', '', '8' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '35', '5', 'id', 'number', 'id', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '36', '5', 'name', 'text', 'name', '1', '1', '1', '1', '1', '1', '', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '37', '5', 'created_at', 'timestamp', 'created_at', '0', '0', '0', '0', '0', '0', '', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '38', '5', 'updated_at', 'timestamp', 'updated_at', '0', '0', '0', '0', '0', '0', '', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '39', '4', 'id', 'number', 'id', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '40', '4', 'parent_id', 'select_dropdown', 'parent_id', '0', '0', '1', '1', '1', '1', '{"default":"","null":"","options":{"":"-- None --"},"relationship":{"key":"id","label":"name"}}', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '41', '4', 'order', 'text', 'order', '1', '1', '1', '1', '1', '1', '{"default":1}', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '42', '4', 'name', 'text', 'name', '1', '1', '1', '1', '1', '1', '', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '43', '4', 'slug', 'text', 'slug', '1', '1', '1', '1', '1', '1', '{"slugify":{"origin":"name"}}', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '44', '4', 'created_at', 'timestamp', 'created_at', '0', '0', '1', '0', '0', '0', '', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '45', '4', 'updated_at', 'timestamp', 'updated_at', '0', '0', '0', '0', '0', '0', '', '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '46', '6', 'id', 'number', 'id', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '47', '6', 'name', 'text', 'Name', '1', '1', '1', '1', '1', '1', '', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '48', '6', 'created_at', 'timestamp', 'created_at', '0', '0', '0', '0', '0', '0', '', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '49', '6', 'updated_at', 'timestamp', 'updated_at', '0', '0', '0', '0', '0', '0', '', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '50', '6', 'display_name', 'text', 'Display Name', '1', '1', '1', '1', '1', '1', '', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '51', '1', 'seo_title', 'text', 'seo_title', '0', '1', '1', '1', '1', '1', '', '14' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '52', '1', 'featured', 'checkbox', 'featured', '1', '1', '1', '1', '1', '1', '', '15' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '53', '3', 'role_id', 'text', 'role_id', '1', '1', '1', '1', '1', '1', '', '9' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '54', '7', 'id', 'text', 'Id', '1', '0', '0', '0', '0', '0', NULL, '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '55', '7', 'name', 'text', 'Name', '0', '1', '1', '1', '1', '1', '{}', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '56', '7', 'slug', 'text', 'Slug', '0', '1', '1', '1', '1', '1', '{"slugify":{"origin":"name","forceUpdate":true}}', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '57', '7', 'description', 'rich_text_box', 'Description', '0', '1', '1', '1', '1', '1', '{}', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '58', '7', 'images', 'multiple_images', 'Images', '0', '1', '1', '1', '1', '1', '{}', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '59', '7', 'product_category_id', 'hidden', 'Product Category Id', '0', '0', '0', '1', '1', '0', '{}', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '60', '7', 'created_at', 'timestamp', 'Created At', '0', '0', '0', '0', '0', '0', NULL, '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '61', '7', 'updated_at', 'timestamp', 'Updated At', '0', '0', '0', '0', '0', '0', NULL, '8' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '62', '7', 'deleted_at', 'timestamp', 'Deleted At', '0', '0', '0', '0', '0', '0', NULL, '9' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '63', '7', 'product_belongsto_product_category_relationship', 'relationship', 'product_categories', '0', '1', '1', '1', '1', '0', '{"model":"App\\\\Models\\\\ProductCategory","table":"product_categories","type":"belongsTo","column":"product_category_id","key":"id","label":"name","pivot_table":"categories","pivot":"0"}', '10' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '92', '13', 'id', 'text', 'Id', '1', '0', '0', '0', '0', '0', NULL, '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '93', '13', 'description', 'rich_text_box', 'Description', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"lf"}}', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '94', '13', 'meta_description', 'text_area', 'Meta Description', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '95', '13', 'meta_keywords', 'text_area', 'Meta Keywords', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '8' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '96', '13', 'meta_title', 'text', 'Meta Title', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '97', '13', 'ord', 'number', 'Order', '1', '1', '1', '1', '1', '0', '{"default":0,"template":{"slug":"columns-8-4","stack":"rg"}}', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '98', '13', 'title', 'text', 'Title', '1', '1', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"lf"},"validation":{"rule":"required"}}', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '99', '13', 'created_at', 'timestamp', 'Created At', '0', '1', '0', '0', '0', '0', NULL, '10' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '100', '13', 'updated_at', 'timestamp', 'Updated At', '0', '0', '0', '0', '0', '0', NULL, '11' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '101', '13', 'deleted_at', 'timestamp', 'Deleted At', '0', '0', '0', '0', '0', '0', NULL, '12' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '102', '13', 'image', 'image', 'Image', '0', '1', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '9' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '152', '18', 'id', 'text', 'Id', '1', '0', '0', '0', '0', '0', NULL, '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '153', '18', 'name', 'text', 'Name', '1', '1', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"lf"}}', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '154', '18', 'created_at', 'timestamp', 'Created At', '0', '1', '0', '0', '0', '0', NULL, '14' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '155', '18', 'updated_at', 'timestamp', 'Updated At', '0', '0', '0', '0', '0', '0', NULL, '16' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '156', '18', 'deleted_at', 'timestamp', 'Deleted At', '0', '0', '0', '0', '0', '0', NULL, '15' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '157', '18', 'description', 'rich_text_box', 'Description', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"lf"}}', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '158', '18', 'fullname', 'text', 'Fullname', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '159', '18', 'grip', 'hidden', 'Grip', '0', '0', '0', '0', '0', '0', NULL, '7' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '160', '18', 'image_alt', 'text', 'Image Alt', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '13' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '161', '18', 'meta_description', 'text_area', 'Meta Description', '0', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '9' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '162', '18', 'meta_keywords', 'text_area', 'Meta Keywords', '0', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '10' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '163', '18', 'meta_title', 'text', 'Meta Title', '0', '0', '1', '1', '1', '1', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '8' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '164', '18', 'parent_id', 'select_dropdown', 'Parent Id', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"},"default":"0","options":{"0":"-- None --"},"relationship":{"key":"id","label":"name"}}', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '165', '18', 'url', 'hidden', 'Url', '0', '0', '0', '0', '0', '0', NULL, '11' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '166', '18', 'slug', 'text', 'Slug', '1', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"lf"},"slugify":{"origin":"name","forceUpdate":true}}', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '169', '19', 'id', 'number', 'id', '1', '0', '0', '0', '0', '0', '', '1' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '170', '19', 'name', 'text', 'Name', '1', '1', '1', '1', '1', '1', '', '2' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '171', '19', 'slug', 'text', 'slug', '1', '1', '1', '1', '1', '1', '{"slugify":{"origin":"name"}}', '3' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '172', '19', 'view', 'code_editor', 'body', '1', '0', '1', '1', '1', '1', '', '4' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '173', '19', 'created_at', 'timestamp', 'created_at', '1', '1', '1', '0', '0', '0', '', '5' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '174', '19', 'updated_at', 'timestamp', 'updated_at', '1', '0', '0', '0', '0', '0', '', '6' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '175', '18', 'image', 'image', 'Image', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"rg"}}', '12' );
INSERT INTO `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) VALUES ( '176', '13', 'slug', 'text', 'Slug', '0', '0', '1', '1', '1', '0', '{"template":{"slug":"columns-8-4","stack":"lf"},"slugify":{"origin":"title","forceUpdate":true}}', '3' );
-- ---------------------------------------------------------


-- Dump data of "data_types" -------------------------------
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '1', 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', '1', '0', '2018-02-23 07:19:44', '2018-02-23 07:19:44' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '2', 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', '1', '0', '2018-02-23 07:19:44', '2018-02-23 07:19:44' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '3', 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', '1', '0', '2018-02-23 07:19:45', '2018-02-23 07:19:45' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '4', 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', '1', '0', '2018-02-23 07:19:45', '2018-02-23 07:19:45' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '5', 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', '1', '0', '2018-02-23 07:19:45', '2018-02-23 07:19:45' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '6', 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', '1', '0', '2018-02-23 07:19:45', '2018-02-23 07:19:45' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '7', 'products', 'products', 'Product', 'Products', NULL, 'App\\Models\\Product', NULL, 'Back\\ProductsController', NULL, '1', '1', '2018-02-23 07:22:59', '2018-02-26 04:26:50' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '13', 'brands', 'brands', 'Brand', 'Brands', NULL, 'App\\Models\\Brand', NULL, 'Back\\BrandsController', NULL, '1', '0', '2018-02-26 03:38:03', '2018-02-26 04:29:29' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '18', 'product_categories', 'product-categories', 'Product Category', 'Product Categories', NULL, 'App\\Models\\ProductCategory', NULL, 'Back\\ProductCategoriesController', NULL, '1', '0', '2018-02-26 07:57:57', '2018-02-26 07:57:57' );
INSERT INTO `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`created_at`,`updated_at`) VALUES ( '19', 'bread_templates', 'templates', 'Template', 'Templates', 'voyager-news', 'Launcher\\BreadTemplates\\Models\\Template', NULL, '', '', '1', '0', '2018-02-26 13:24:53', '2018-02-26 13:24:53' );
-- ---------------------------------------------------------


-- Dump data of "menu_items" -------------------------------
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '1', '1', 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, '1', '2018-02-23 07:19:47', '2018-02-23 07:19:47', 'voyager.dashboard', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '2', '1', 'Media', '', '_self', 'voyager-images', NULL, NULL, '2', '2018-02-23 07:19:47', '2018-02-23 07:36:44', 'voyager.media.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '3', '1', 'Posts', '', '_self', 'voyager-news', NULL, '17', '2', '2018-02-23 07:19:47', '2018-02-26 06:17:20', 'voyager.posts.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '4', '1', 'Users', '', '_self', 'voyager-person', NULL, '18', '2', '2018-02-23 07:19:47', '2018-02-23 07:36:37', 'voyager.users.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '5', '1', 'Categories', '', '_self', 'voyager-categories', NULL, '17', '1', '2018-02-23 07:19:47', '2018-02-26 06:17:20', 'voyager.categories.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '6', '1', 'Pages', '', '_self', 'voyager-file-text', NULL, '17', '3', '2018-02-23 07:19:47', '2018-02-26 06:17:20', 'voyager.pages.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '7', '1', 'Roles', '', '_self', 'voyager-lock', NULL, '18', '1', '2018-02-23 07:19:47', '2018-02-23 07:36:37', 'voyager.roles.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '8', '1', 'Developer Tools', '', '_self', 'voyager-tools', '#000000', NULL, '6', '2018-02-23 07:19:47', '2018-02-26 06:20:23', NULL, '' );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '9', '1', 'Menu Builder', '', '_self', 'voyager-list', NULL, '8', '1', '2018-02-23 07:19:47', '2018-02-23 07:26:24', 'voyager.menus.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '10', '1', 'Database', '', '_self', 'voyager-data', NULL, '8', '2', '2018-02-23 07:19:47', '2018-02-23 07:26:24', 'voyager.database.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '11', '1', 'Compass', '', '_self', 'voyager-compass', NULL, '8', '3', '2018-02-23 07:19:47', '2018-02-23 07:26:24', 'voyager.compass.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '12', '1', 'Settings', '', '_self', 'voyager-settings', NULL, '18', '3', '2018-02-23 07:19:47', '2018-02-23 07:36:37', 'voyager.settings.index', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '13', '1', 'Hooks', '', '_self', 'voyager-hook', NULL, '8', '5', '2018-02-23 07:19:52', '2018-02-26 06:20:26', 'voyager.hooks', NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '14', '1', 'Products', '/admin/products', '_self', NULL, NULL, '16', '2', '2018-02-23 07:22:59', '2018-02-23 07:26:30', NULL, NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '15', '1', 'Product Categories', '/admin/product-categories', '_self', NULL, NULL, '16', '1', '2018-02-23 07:25:02', '2018-02-23 07:26:30', NULL, NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '16', '1', 'Products Management', '', '_self', NULL, '#000000', NULL, '3', '2018-02-23 07:26:19', '2018-02-23 07:36:44', NULL, '' );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '17', '1', 'CMS', '', '_self', NULL, '#000000', NULL, '4', '2018-02-23 07:35:24', '2018-02-26 06:20:23', NULL, '' );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '18', '1', 'System', '', '_self', NULL, '#000000', NULL, '5', '2018-02-23 07:36:09', '2018-02-26 06:20:23', NULL, '' );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '20', '1', 'Brands', '/admin/brands', '_self', 'voyager-truck', '#000000', '16', '3', '2018-02-26 03:02:22', '2018-02-26 06:20:23', NULL, '' );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '22', '1', 'Trends', '/admin/trends', '_self', NULL, NULL, NULL, '7', '2018-02-26 06:28:04', '2018-02-26 06:28:04', NULL, NULL );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '23', '1', 'Templates', '/admin/templates', '_self', 'voyager-megaphone', '#000000', '8', '4', '2018-02-26 13:24:53', '2018-02-26 13:35:58', NULL, '' );
INSERT INTO `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) VALUES ( '24', '1', 'Tools', '', '_self', 'voyager-tools', NULL, NULL, '9', '2018-02-26 15:02:03', '2018-02-26 15:02:03', NULL, NULL );
-- ---------------------------------------------------------


-- Dump data of "menus" ------------------------------------
INSERT INTO `menus`(`id`,`name`,`created_at`,`updated_at`) VALUES ( '1', 'admin', '2018-02-23 07:19:47', '2018-02-23 07:19:47' );
-- ---------------------------------------------------------


-- Dump data of "migrations" -------------------------------
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '1', '2014_10_12_000000_create_users_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '2', '2014_10_12_100000_create_password_resets_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '3', '2016_01_01_000000_add_voyager_user_fields', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '4', '2016_01_01_000000_create_data_types_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '5', '2016_01_01_000000_create_pages_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '6', '2016_01_01_000000_create_posts_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '7', '2016_02_15_204651_create_categories_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '8', '2016_05_19_173453_create_menu_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '9', '2016_10_21_190000_create_roles_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '10', '2016_10_21_190000_create_settings_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '11', '2016_11_30_135954_create_permission_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '12', '2016_11_30_141208_create_permission_role_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '13', '2016_12_26_201236_data_types__add__server_side', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '14', '2017_01_13_000000_add_route_to_menu_items_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '15', '2017_01_14_005015_create_translations_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '16', '2017_01_15_000000_add_permission_group_id_to_permissions_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '17', '2017_01_15_000000_create_permission_groups_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '18', '2017_01_15_000000_make_table_name_nullable_in_permissions_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '19', '2017_03_06_000000_add_controller_to_data_types_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '20', '2017_04_11_000000_alter_post_nullable_fields_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '21', '2017_04_21_000000_add_order_to_data_rows_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '22', '2017_07_05_210000_add_policyname_to_data_types_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '23', '2017_08_05_000000_add_group_to_settings_table', '1' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '25', '2018_02_26_063656_create_trends_table', '3' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '26', '2018_02_26_063909_create_brands_table', '4' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '27', '2018_02_26_065018_create_product_categories_table', '5' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '28', '2018_02_26_073436_create_product_categories_table', '6' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '29', '2018_02_26_074315_create_product_categories_table', '7' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '30', '2018_02_26_074843_create_product_categories_table', '8' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '31', '2017_06_26_000000_create_bread_templates_table', '9' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '32', '2018_02_26_151249_create_brands_table', '10' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '33', '2018_02_26_151306_create_product_categories_table', '11' );
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES ( '34', '2018_02_26_154050_create_product_categories_table', '12' );
-- ---------------------------------------------------------


-- Dump data of "pages" ------------------------------------
INSERT INTO `pages`(`id`,`author_id`,`title`,`excerpt`,`body`,`image`,`slug`,`meta_description`,`meta_keywords`,`status`,`created_at`,`updated_at`) VALUES ( '1', '0', 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>
<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
-- ---------------------------------------------------------


-- Dump data of "password_resets" --------------------------
-- ---------------------------------------------------------


-- Dump data of "permission_groups" ------------------------
-- ---------------------------------------------------------


-- Dump data of "permission_role" --------------------------
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '1', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '1', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '2', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '2', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '3', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '3', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '4', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '4', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '5', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '5', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '6', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '6', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '7', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '7', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '8', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '8', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '9', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '9', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '10', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '10', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '11', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '11', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '12', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '12', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '13', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '13', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '14', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '14', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '15', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '15', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '16', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '16', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '17', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '17', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '18', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '18', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '19', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '19', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '20', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '20', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '21', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '21', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '22', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '22', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '23', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '23', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '24', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '24', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '25', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '25', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '26', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '26', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '27', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '27', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '28', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '28', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '29', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '29', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '30', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '30', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '31', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '31', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '32', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '32', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '33', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '33', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '34', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '34', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '35', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '35', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '36', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '36', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '37', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '37', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '38', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '38', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '39', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '39', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '40', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '40', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '41', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '41', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '42', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '42', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '43', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '43', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '44', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '44', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '45', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '45', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '66', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '66', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '67', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '67', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '68', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '68', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '69', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '69', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '70', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '70', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '91', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '91', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '92', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '92', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '93', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '93', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '94', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '94', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '95', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '95', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '96', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '96', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '97', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '97', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '98', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '98', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '99', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '99', '3' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '100', '1' );
INSERT INTO `permission_role`(`permission_id`,`role_id`) VALUES ( '100', '3' );
-- ---------------------------------------------------------


-- Dump data of "permissions" ------------------------------
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '1', 'browse_admin', NULL, '2018-02-23 07:19:47', '2018-02-23 07:19:47', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '2', 'browse_database', NULL, '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '3', 'browse_media', NULL, '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '4', 'browse_compass', NULL, '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '5', 'browse_menus', 'menus', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '6', 'read_menus', 'menus', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '7', 'edit_menus', 'menus', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '8', 'add_menus', 'menus', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '9', 'delete_menus', 'menus', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '10', 'browse_pages', 'pages', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '11', 'read_pages', 'pages', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '12', 'edit_pages', 'pages', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '13', 'add_pages', 'pages', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '14', 'delete_pages', 'pages', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '15', 'browse_roles', 'roles', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '16', 'read_roles', 'roles', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '17', 'edit_roles', 'roles', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '18', 'add_roles', 'roles', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '19', 'delete_roles', 'roles', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '20', 'browse_users', 'users', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '21', 'read_users', 'users', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '22', 'edit_users', 'users', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '23', 'add_users', 'users', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '24', 'delete_users', 'users', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '25', 'browse_posts', 'posts', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '26', 'read_posts', 'posts', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '27', 'edit_posts', 'posts', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '28', 'add_posts', 'posts', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '29', 'delete_posts', 'posts', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '30', 'browse_categories', 'categories', '2018-02-23 07:19:48', '2018-02-23 07:19:48', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '31', 'read_categories', 'categories', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '32', 'edit_categories', 'categories', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '33', 'add_categories', 'categories', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '34', 'delete_categories', 'categories', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '35', 'browse_settings', 'settings', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '36', 'read_settings', 'settings', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '37', 'edit_settings', 'settings', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '38', 'add_settings', 'settings', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '39', 'delete_settings', 'settings', '2018-02-23 07:19:49', '2018-02-23 07:19:49', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '40', 'browse_hooks', NULL, '2018-02-23 07:19:52', '2018-02-23 07:19:52', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '41', 'browse_products', 'products', '2018-02-23 07:22:59', '2018-02-23 07:22:59', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '42', 'read_products', 'products', '2018-02-23 07:22:59', '2018-02-23 07:22:59', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '43', 'edit_products', 'products', '2018-02-23 07:22:59', '2018-02-23 07:22:59', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '44', 'add_products', 'products', '2018-02-23 07:22:59', '2018-02-23 07:22:59', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '45', 'delete_products', 'products', '2018-02-23 07:22:59', '2018-02-23 07:22:59', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '66', 'browse_brands', 'brands', '2018-02-26 03:38:03', '2018-02-26 03:38:03', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '67', 'read_brands', 'brands', '2018-02-26 03:38:03', '2018-02-26 03:38:03', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '68', 'edit_brands', 'brands', '2018-02-26 03:38:03', '2018-02-26 03:38:03', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '69', 'add_brands', 'brands', '2018-02-26 03:38:03', '2018-02-26 03:38:03', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '70', 'delete_brands', 'brands', '2018-02-26 03:38:03', '2018-02-26 03:38:03', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '91', 'browse_product_categories', 'product_categories', '2018-02-26 07:57:57', '2018-02-26 07:57:57', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '92', 'read_product_categories', 'product_categories', '2018-02-26 07:57:57', '2018-02-26 07:57:57', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '93', 'edit_product_categories', 'product_categories', '2018-02-26 07:57:57', '2018-02-26 07:57:57', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '94', 'add_product_categories', 'product_categories', '2018-02-26 07:57:57', '2018-02-26 07:57:57', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '95', 'delete_product_categories', 'product_categories', '2018-02-26 07:57:57', '2018-02-26 07:57:57', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '96', 'browse_bread_templates', 'bread_templates', '2018-02-26 13:24:54', '2018-02-26 13:24:54', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '97', 'read_bread_templates', 'bread_templates', '2018-02-26 13:24:54', '2018-02-26 13:24:54', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '98', 'edit_bread_templates', 'bread_templates', '2018-02-26 13:24:54', '2018-02-26 13:24:54', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '99', 'add_bread_templates', 'bread_templates', '2018-02-26 13:24:54', '2018-02-26 13:24:54', NULL );
INSERT INTO `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`,`permission_group_id`) VALUES ( '100', 'delete_bread_templates', 'bread_templates', '2018-02-26 13:24:54', '2018-02-26 13:24:54', NULL );
-- ---------------------------------------------------------


-- Dump data of "posts" ------------------------------------
INSERT INTO `posts`(`id`,`author_id`,`category_id`,`title`,`seo_title`,`excerpt`,`body`,`image`,`slug`,`meta_description`,`meta_keywords`,`status`,`featured`,`created_at`,`updated_at`) VALUES ( '1', '0', NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', '0', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `posts`(`id`,`author_id`,`category_id`,`title`,`seo_title`,`excerpt`,`body`,`image`,`slug`,`meta_description`,`meta_keywords`,`status`,`featured`,`created_at`,`updated_at`) VALUES ( '2', '0', NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>
                <h2>We can use all kinds of format!</h2>
                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', '0', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `posts`(`id`,`author_id`,`category_id`,`title`,`seo_title`,`excerpt`,`body`,`image`,`slug`,`meta_description`,`meta_keywords`,`status`,`featured`,`created_at`,`updated_at`) VALUES ( '3', '0', NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', '0', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `posts`(`id`,`author_id`,`category_id`,`title`,`seo_title`,`excerpt`,`body`,`image`,`slug`,`meta_description`,`meta_keywords`,`status`,`featured`,`created_at`,`updated_at`) VALUES ( '4', '0', NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>
<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>
<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', '0', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
-- ---------------------------------------------------------


-- Dump data of "product_categories" -----------------------
INSERT INTO `product_categories`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`,`description`,`fullname`,`image_alt`,`meta_description`,`meta_keywords`,`meta_title`,`parent_id`,`slug`,`image`) VALUES ( '3', 'Oh my category', '2018-02-23 08:10:46', '2018-02-26 13:56:59', '2018-02-26 13:56:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsa-dasd', NULL );
INSERT INTO `product_categories`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`,`description`,`fullname`,`image_alt`,`meta_description`,`meta_keywords`,`meta_title`,`parent_id`,`slug`,`image`) VALUES ( '4', 'fuck yeah', '2018-02-23 08:22:33', '2018-02-23 08:22:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'da-dadas', NULL );
INSERT INTO `product_categories`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`,`description`,`fullname`,`image_alt`,`meta_description`,`meta_keywords`,`meta_title`,`parent_id`,`slug`,`image`) VALUES ( '5', 'huynh cong dnah', '2018-02-26 08:45:09', '2018-02-26 08:45:09', NULL, 'dsadasdas Danh', NULL, 'product-categories/February2018/qBj1V2mFPjEle2TiTDTp.jpg', NULL, NULL, 'dsad Danh', '0', 'huynh-cong-dnah', NULL );
INSERT INTO `product_categories`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`,`description`,`fullname`,`image_alt`,`meta_description`,`meta_keywords`,`meta_title`,`parent_id`,`slug`,`image`) VALUES ( '6', 'Con Danh', '2018-02-26 08:46:20', '2018-02-26 08:46:20', NULL, 'dsadas', NULL, 'product-categories/February2018/2StkVATgfnZr9CMDLM0B.jpg', 'dasdas', 'dasdasdas', 'dsadas', '5', 'con-danh', NULL );
INSERT INTO `product_categories`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`,`description`,`fullname`,`image_alt`,`meta_description`,`meta_keywords`,`meta_title`,`parent_id`,`slug`,`image`) VALUES ( '7', 'Abc def', '2018-02-26 13:43:04', '2018-02-26 13:52:03', NULL, '<p>sdadsadas</p>', NULL, 'alo alo', 'fasdad dfasd as', 'dsadas, dadas, asda', 'dads', '0', 'abc-def', 'product-categories/February2018/YhN3H40RexmQftiPq3qg.jpg' );
-- ---------------------------------------------------------


-- Dump data of "products" ---------------------------------
INSERT INTO `products`(`id`,`name`,`slug`,`description`,`images`,`product_category_id`,`created_at`,`updated_at`,`deleted_at`) VALUES ( '1', 'Amely', 'amely', '<p>asdasda</p>', NULL, '2', '2018-02-23 07:27:05', '2018-02-23 07:32:13', NULL );
INSERT INTO `products`(`id`,`name`,`slug`,`description`,`images`,`product_category_id`,`created_at`,`updated_at`,`deleted_at`) VALUES ( '2', 'product two', NULL, '<p>asdsadasd</p>', NULL, '1', '2018-02-23 07:46:13', '2018-02-23 07:46:13', NULL );
INSERT INTO `products`(`id`,`name`,`slug`,`description`,`images`,`product_category_id`,`created_at`,`updated_at`,`deleted_at`) VALUES ( '3', 'ba con soi', 'ba-con-soi', '<p>zsdfsdfsd sdfsd</p>
<p>sdsdfsdf</p>
<p><img src="http://localhost:8000/storage/products/February2018/Screenshot from 2018-01-02 23-04-32.png" alt="guug" width="1800" height="1013" /></p>', '["products\\/February2018\\/FxYutCBLpQse9iuBiRbX.png","products\\/February2018\\/6p3qFKirYjDz16OjeyL6.png","products\\/February2018\\/MQLVIhjhqVtLqfPNaZKi.png"]', '3', '2018-02-23 08:18:49', '2018-02-23 08:18:49', NULL );
-- ---------------------------------------------------------


-- Dump data of "roles" ------------------------------------
INSERT INTO `roles`(`id`,`name`,`display_name`,`created_at`,`updated_at`) VALUES ( '1', 'admin', 'Administrator', '2018-02-23 07:19:47', '2018-02-23 07:19:47' );
INSERT INTO `roles`(`id`,`name`,`display_name`,`created_at`,`updated_at`) VALUES ( '2', 'user', 'Normal User', '2018-02-23 07:19:47', '2018-02-23 07:19:47' );
INSERT INTO `roles`(`id`,`name`,`display_name`,`created_at`,`updated_at`) VALUES ( '3', 'developer', 'Developer', '2018-02-23 08:13:09', '2018-02-23 08:13:09' );
-- ---------------------------------------------------------


-- Dump data of "settings" ---------------------------------
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '1', 'site.title', 'Site Title', 'Site Title', '', 'text', '1', 'Site' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '2', 'site.description', 'Site Description', 'Site Description', '', 'text', '2', 'Site' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '3', 'site.logo', 'Site Logo', '', '', 'image', '3', 'Site' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '4', 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', '4', 'Site' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '5', 'admin.bg_image', 'Admin Background Image', '', '', 'image', '5', 'Admin' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '6', 'admin.title', 'Admin Title', 'Voyager', '', 'text', '1', 'Admin' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '7', 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', '2', 'Admin' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '8', 'admin.loader', 'Admin Loader', '', '', 'image', '3', 'Admin' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '9', 'admin.icon_image', 'Admin Icon Image', '', '', 'image', '4', 'Admin' );
INSERT INTO `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) VALUES ( '10', 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', '1', 'Admin' );
-- ---------------------------------------------------------


-- Dump data of "translations" -----------------------------
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '1', 'data_types', 'display_name_singular', '1', 'pt', 'Post', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '2', 'data_types', 'display_name_singular', '2', 'pt', 'Página', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '3', 'data_types', 'display_name_singular', '3', 'pt', 'Utilizador', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '4', 'data_types', 'display_name_singular', '4', 'pt', 'Categoria', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '5', 'data_types', 'display_name_singular', '5', 'pt', 'Menu', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '6', 'data_types', 'display_name_singular', '6', 'pt', 'Função', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '7', 'data_types', 'display_name_plural', '1', 'pt', 'Posts', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '8', 'data_types', 'display_name_plural', '2', 'pt', 'Páginas', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '9', 'data_types', 'display_name_plural', '3', 'pt', 'Utilizadores', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '10', 'data_types', 'display_name_plural', '4', 'pt', 'Categorias', '2018-02-23 07:19:51', '2018-02-23 07:19:51' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '11', 'data_types', 'display_name_plural', '5', 'pt', 'Menus', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '12', 'data_types', 'display_name_plural', '6', 'pt', 'Funções', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '13', 'categories', 'slug', '1', 'pt', 'categoria-1', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '14', 'categories', 'name', '1', 'pt', 'Categoria 1', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '15', 'categories', 'slug', '2', 'pt', 'categoria-2', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '16', 'categories', 'name', '2', 'pt', 'Categoria 2', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '17', 'pages', 'title', '1', 'pt', 'Olá Mundo', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '18', 'pages', 'slug', '1', 'pt', 'ola-mundo', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '19', 'pages', 'body', '1', 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>
<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '20', 'menu_items', 'title', '1', 'pt', 'Painel de Controle', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '21', 'menu_items', 'title', '2', 'pt', 'Media', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '22', 'menu_items', 'title', '3', 'pt', 'Publicações', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '23', 'menu_items', 'title', '4', 'pt', 'Utilizadores', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '24', 'menu_items', 'title', '5', 'pt', 'Categorias', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '25', 'menu_items', 'title', '6', 'pt', 'Páginas', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '26', 'menu_items', 'title', '7', 'pt', 'Funções', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '27', 'menu_items', 'title', '8', 'pt', 'Ferramentas', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '28', 'menu_items', 'title', '9', 'pt', 'Menus', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '29', 'menu_items', 'title', '10', 'pt', 'Base de dados', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '30', 'menu_items', 'title', '12', 'pt', 'Configurações', '2018-02-23 07:19:52', '2018-02-23 07:19:52' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '31', 'menu_items', 'title', '16', 'fr', '', '2018-02-23 07:26:19', '2018-02-23 07:26:19' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '32', 'data_types', 'display_name_singular', '7', 'fr', 'Product', '2018-02-23 07:27:59', '2018-02-23 07:27:59' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '33', 'data_types', 'display_name_plural', '7', 'fr', 'Products', '2018-02-23 07:27:59', '2018-02-23 07:27:59' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '34', 'menu_items', 'title', '17', 'fr', '', '2018-02-23 07:35:24', '2018-02-23 07:35:24' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '35', 'menu_items', 'title', '18', 'fr', '', '2018-02-23 07:36:09', '2018-02-23 07:36:09' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '36', 'menu_items', 'title', '8', 'fr', 'Tools', '2018-02-23 07:36:23', '2018-02-23 07:36:23' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '41', 'menu_items', 'title', '20', 'pt', 'Ferramentas', '2018-02-23 09:04:42', '2018-02-23 09:04:42' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '42', 'menu_items', 'title', '20', 'fr', 'Brands', '2018-02-26 03:04:27', '2018-02-26 03:04:27' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '45', 'data_types', 'display_name_singular', '13', 'fr', 'Brand', '2018-02-26 03:49:44', '2018-02-26 03:49:44' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '46', 'data_types', 'display_name_plural', '13', 'fr', 'Brands', '2018-02-26 03:49:44', '2018-02-26 03:49:44' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '51', 'data_types', 'display_name_singular', '18', 'fr', 'Product Category', '2018-02-26 07:58:56', '2018-02-26 07:58:56' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '52', 'data_types', 'display_name_plural', '18', 'fr', 'Product Categories', '2018-02-26 07:58:56', '2018-02-26 07:58:56' );
INSERT INTO `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) VALUES ( '53', 'menu_items', 'title', '23', 'fr', 'Templates', '2018-02-26 13:35:58', '2018-02-26 13:35:58' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`role_id`,`name`,`email`,`avatar`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES ( '1', '3', 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$J7ev9D1CK3RL7Y2wOeMXp.gXbX9ta9JLCED2IZOw/jM8rdnYgfNf6', '8HSzCr1f3L6E7f12gsZQ1PRClVcrKJXwx2bxJ3qWj0gjawix8Ob6OPp06kof', '2018-02-23 07:19:51', '2018-02-23 08:13:44' );
-- ---------------------------------------------------------


-- Dump data of "brands" -----------------------------------
INSERT INTO `brands`(`id`,`description`,`meta_description`,`meta_keywords`,`meta_title`,`ord`,`title`,`created_at`,`updated_at`,`deleted_at`,`image`,`slug`) VALUES ( '1', '<p>Through the selection of acova products, Au Fil du Bain allows you to imagine your future bathing space by opting for quality materials and modern equipment. Compare shower, tub and furniture designs that fit perfectly into your bathing world. Build a harmonious bathroom thanks to acova brand solutions.</p>', 'Découvrez les produits de la marque acova sélectionnés par Au Fil du Bain pour vous permettre d\'aménager votre salle de bains personnalisée.', 'acova, Au Fil du Bain, collections, sélections, salle de bains, mobilier, équipements, bain, douche, robinetterie, toilettes', 'Acova : Solutions pour la salle de bains.', '1', 'Acova', '2018-02-26 03:59:24', '2018-02-26 04:06:36', NULL, 'brands/February2018/XynH33V7bCOSOVLC27vL.gif', NULL );
INSERT INTO `brands`(`id`,`description`,`meta_description`,`meta_keywords`,`meta_title`,`ord`,`title`,`created_at`,`updated_at`,`deleted_at`,`image`,`slug`) VALUES ( '2', '<p>Discover the Sanijura brand products and identify the solutions that will best fit your bathroom project. Realize your desires by choosing the shower, toilet space, accessories and equipment that suit you. Browse the Sanijura collections and find inspiration for your harmonious bathroom.</p>', 'Retrouvez les solutions Sanijura. Au Fil du Bain a sélectionné les produits adaptés aux différents styles de salle de bains, modernes et confortables.', 'sanijura, Au Fil du Bain, collections, sélections, salle de bains, mobilier, équipements, bain, douche, robinetterie, toilettes', 'Sanijura : Sélection de produits pour la salle de bains', '2', 'Sanijura', '2018-02-26 04:12:18', '2018-02-26 04:12:18', NULL, 'brands/February2018/rhHx2e2Fzw2wl57D5wC5.gif', NULL );
INSERT INTO `brands`(`id`,`description`,`meta_description`,`meta_keywords`,`meta_title`,`ord`,`title`,`created_at`,`updated_at`,`deleted_at`,`image`,`slug`) VALUES ( '3', '<p>Through the selection of ID&Eacute;AL STANDARD products, Au Fil du Bain allows you to imagine your future bathing space by opting for quality materials and modern equipment. Compare shower, tub and furniture designs that fit perfectly into your bathing world. Build a harmonious bathroom thanks to ID&Eacute;AL STANDARD brand solutions.</p>', 'Découvrez les produits de la marque IDÉAL STANDARD sélectionnés par Au Fil du Bain pour vous permettre d\'aménager votre salle de bains personnalisée.', 'IDÉAL STANDARD, Au Fil du Bain, collections, sélections, salle de bains, mobilier, équipements, bain, douche, robinetterie, toilettes', 'IDÉAL STANDARD : Solutions pour la salle de bains.', '3', 'IDÉAL STANDARD', '2018-02-26 04:38:45', '2018-02-26 04:38:45', NULL, 'brands/February2018/ync6YGikO9XcKxkx2ch0.jpg', NULL );
INSERT INTO `brands`(`id`,`description`,`meta_description`,`meta_keywords`,`meta_title`,`ord`,`title`,`created_at`,`updated_at`,`deleted_at`,`image`,`slug`) VALUES ( '4', NULL, NULL, NULL, NULL, '0', 'AZUR LINE', '2018-02-26 14:34:25', '2018-02-26 14:34:25', NULL, 'brands/February2018/fZnmI92GsNpbKPmCK8wg.jpg', 'azur-line' );
-- ---------------------------------------------------------


-- Dump data of "trends" -----------------------------------
-- ---------------------------------------------------------


-- Dump data of "bread_templates" --------------------------
INSERT INTO `bread_templates`(`id`,`name`,`slug`,`view`,`created_at`,`updated_at`) VALUES ( '1', 'Columns 8/4', 'columns-8-4', '<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="panel panel-body">@stack("lf")</div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-body">@stack("rg")</div>
    </div>
</div>', '2018-02-26 13:24:53', '2018-02-26 13:47:19' );
INSERT INTO `bread_templates`(`id`,`name`,`slug`,`view`,`created_at`,`updated_at`) VALUES ( '2', 'Columns 6/6', 'columns-6-6', '<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-body">@stack("lf")</div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-body">@stack("rg")</div>
    </div>
</div>', '2018-02-26 13:24:53', '2018-02-26 13:46:21' );
INSERT INTO `bread_templates`(`id`,`name`,`slug`,`view`,`created_at`,`updated_at`) VALUES ( '3', 'Columns 4/8', 'columns-4-8', '<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-body">@stack("r01_rg")</div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="panel panel-body">@stack("r01_lf")</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-body">@stack("r02_rg")</div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="panel panel-body">@stack("r02_lf")</div>
    </div>
</div>', '2018-02-26 13:24:53', '2018-02-26 13:24:53' );
-- ---------------------------------------------------------


-- CREATE INDEX "categories_parent_id_foreign" -------------
-- CREATE INDEX "categories_parent_id_foreign" -----------------
CREATE INDEX `categories_parent_id_foreign` USING BTREE ON `categories`( `parent_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "data_rows_data_type_id_foreign" -----------
-- CREATE INDEX "data_rows_data_type_id_foreign" ---------------
CREATE INDEX `data_rows_data_type_id_foreign` USING BTREE ON `data_rows`( `data_type_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "menu_items_menu_id_foreign" ---------------
-- CREATE INDEX "menu_items_menu_id_foreign" -------------------
CREATE INDEX `menu_items_menu_id_foreign` USING BTREE ON `menu_items`( `menu_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "password_resets_email_index" --------------
-- CREATE INDEX "password_resets_email_index" ------------------
CREATE INDEX `password_resets_email_index` USING BTREE ON `password_resets`( `email` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "permission_role_permission_id_index" ------
-- CREATE INDEX "permission_role_permission_id_index" ----------
CREATE INDEX `permission_role_permission_id_index` USING BTREE ON `permission_role`( `permission_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "permission_role_role_id_index" ------------
-- CREATE INDEX "permission_role_role_id_index" ----------------
CREATE INDEX `permission_role_role_id_index` USING BTREE ON `permission_role`( `role_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "permissions_key_index" --------------------
-- CREATE INDEX "permissions_key_index" ------------------------
CREATE INDEX `permissions_key_index` USING BTREE ON `permissions`( `key` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "categories_parent_id_foreign" --------------
-- DROP LINK "categories_parent_id_foreign" --------------------
ALTER TABLE `categories` DROP FOREIGN KEY `categories_parent_id_foreign`;
-- -------------------------------------------------------------


-- CREATE LINK "categories_parent_id_foreign" ------------------
ALTER TABLE `categories`
	ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY ( `parent_id` )
	REFERENCES `categories`( `id` )
	ON DELETE Set NULL
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "data_rows_data_type_id_foreign" ------------
-- DROP LINK "data_rows_data_type_id_foreign" ------------------
ALTER TABLE `data_rows` DROP FOREIGN KEY `data_rows_data_type_id_foreign`;
-- -------------------------------------------------------------


-- CREATE LINK "data_rows_data_type_id_foreign" ----------------
ALTER TABLE `data_rows`
	ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY ( `data_type_id` )
	REFERENCES `data_types`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "menu_items_menu_id_foreign" ----------------
-- DROP LINK "menu_items_menu_id_foreign" ----------------------
ALTER TABLE `menu_items` DROP FOREIGN KEY `menu_items_menu_id_foreign`;
-- -------------------------------------------------------------


-- CREATE LINK "menu_items_menu_id_foreign" --------------------
ALTER TABLE `menu_items`
	ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY ( `menu_id` )
	REFERENCES `menus`( `id` )
	ON DELETE Cascade
	ON UPDATE Restrict;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "permission_role_permission_id_foreign" -----
-- DROP LINK "permission_role_permission_id_foreign" -----------
ALTER TABLE `permission_role` DROP FOREIGN KEY `permission_role_permission_id_foreign`;
-- -------------------------------------------------------------


-- CREATE LINK "permission_role_permission_id_foreign" ---------
ALTER TABLE `permission_role`
	ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY ( `permission_id` )
	REFERENCES `permissions`( `id` )
	ON DELETE Cascade
	ON UPDATE Restrict;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "permission_role_role_id_foreign" -----------
-- DROP LINK "permission_role_role_id_foreign" -----------------
ALTER TABLE `permission_role` DROP FOREIGN KEY `permission_role_role_id_foreign`;
-- -------------------------------------------------------------


-- CREATE LINK "permission_role_role_id_foreign" ---------------
ALTER TABLE `permission_role`
	ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY ( `role_id` )
	REFERENCES `roles`( `id` )
	ON DELETE Cascade
	ON UPDATE Restrict;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


