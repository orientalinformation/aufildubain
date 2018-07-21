-- MySQL dump 10.13  Distrib 5.5.59, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: aufildubain
-- ------------------------------------------------------
-- Server version	5.5.59-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bread_templates`
--

DROP TABLE IF EXISTS `bread_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bread_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bread_templates_name_unique` (`name`),
  UNIQUE KEY `bread_templates_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bread_templates`
--

LOCK TABLES `bread_templates` WRITE;
/*!40000 ALTER TABLE `bread_templates` DISABLE KEYS */;
INSERT INTO `bread_templates` VALUES (1,'Columns 8/4','columns-8-4','<div class=\"row\">\n    <div class=\"col-sm-8 col-md-8 col-lg-8\">\n        <div class=\"panel panel-body\">@stack(\"r01_lf\")</div>\n    </div>\n    <div class=\"col-sm-4 col-md-4 col-lg-4\">\n        <div class=\"panel panel-body\">@stack(\"r01_rg\")</div>\n    </div>\n</div>\n<div class=\"row\">\n    <div class=\"col-sm-8 col-md-8 col-lg-8\">\n        <div class=\"panel panel-body\">@stack(\"r02_lf\")</div>\n    </div>\n    <div class=\"col-sm-4 col-md-4 col-lg-4\">\n        <div class=\"panel panel-body\">@stack(\"r02_rg\")</div>\n    </div>\n</div>','2018-02-23 00:58:23','2018-02-23 00:58:23'),(2,'Columns 6/6','columns-6-6','<div class=\"row\">\n    <div class=\"col-sm-6 col-md-6 col-lg-6\">\n        <div class=\"panel panel-body\">@stack(\"lf\")</div>\n    </div>\n    <div class=\"col-sm-6 col-md-6 col-lg-6\">\n        <div class=\"panel panel-body\">@stack(\"rg\")</div>\n    </div>\n</div>','2018-02-23 00:58:23','2018-02-23 00:58:23'),(3,'Columns 4/8','columns-4-8','<div class=\"row\">\n    <div class=\"col-sm-4 col-md-4 col-lg-4\">\n        <div class=\"panel panel-body\">@stack(\"r01_rg\")</div>\n    </div>\n    <div class=\"col-sm-8 col-md-8 col-lg-8\">\n        <div class=\"panel panel-body\">@stack(\"r01_lf\")</div>\n    </div>\n</div>\n<div class=\"row\">\n    <div class=\"col-sm-4 col-md-4 col-lg-4\">\n        <div class=\"panel panel-body\">@stack(\"r02_rg\")</div>\n    </div>\n    <div class=\"col-sm-8 col-md-8 col-lg-8\">\n        <div class=\"panel panel-body\">@stack(\"r02_lf\")</div>\n    </div>\n</div>','2018-02-23 00:58:23','2018-02-23 00:58:23');
/*!40000 ALTER TABLE `bread_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2018-02-23 00:19:51','2018-02-23 00:19:51'),(2,NULL,1,'Category 2','category-2','2018-02-23 00:19:51','2018-02-23 00:19:51');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'',1),(2,1,'author_id','text','Author',1,0,1,1,0,1,'',2),(3,1,'category_id','text','Category',1,0,1,1,1,0,'',3),(4,1,'title','text','Title',1,1,1,1,1,1,'',4),(5,1,'excerpt','text_area','excerpt',1,0,1,1,1,1,'',5),(6,1,'body','rich_text_box','Body',1,0,1,1,1,1,'',6),(7,1,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(8,1,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}',8),(9,1,'meta_description','text_area','meta_description',1,0,1,1,1,1,'',9),(10,1,'meta_keywords','text_area','meta_keywords',1,0,1,1,1,1,'',10),(11,1,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(12,1,'created_at','timestamp','created_at',0,1,1,0,0,0,'',12),(13,1,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',13),(14,2,'id','number','id',1,0,0,0,0,0,'',1),(15,2,'author_id','text','author_id',1,0,0,0,0,0,'',2),(16,2,'title','text','title',1,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r01_lf\"}}',3),(17,2,'excerpt','text_area','excerpt',1,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r02_lf\"}}',7),(18,2,'body','rich_text_box','body',1,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\"}}',11),(19,2,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r01_lf\"}}',4),(20,2,'meta_description','text','meta_description',1,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r01_lf\"}}',5),(21,2,'meta_keywords','text','meta_keywords',1,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r01_lf\"}}',6),(22,2,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"},\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r01_rg\"}}',8),(23,2,'created_at','timestamp','created_at',1,1,1,0,0,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r01_rg\"}}',9),(24,2,'updated_at','timestamp','updated_at',1,0,0,0,0,0,'',11),(25,2,'image','image','image',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"r02_rg\"}}',10),(26,3,'id','number','id',1,0,0,0,0,0,'',1),(27,3,'name','text','name',1,1,1,1,1,1,'',2),(28,3,'email','text','email',1,1,1,1,1,1,'',3),(29,3,'password','password','password',0,0,0,1,1,0,'',4),(30,3,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}',10),(31,3,'remember_token','text','remember_token',0,0,0,0,0,0,'',5),(32,3,'created_at','timestamp','created_at',0,1,1,0,0,0,'',6),(33,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),(34,3,'avatar','image','avatar',0,1,1,1,1,1,'',8),(35,5,'id','number','id',1,0,0,0,0,0,'',1),(36,5,'name','text','name',1,1,1,1,1,1,'',2),(37,5,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),(38,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),(39,4,'id','number','id',1,0,0,0,0,0,'',1),(40,4,'parent_id','select_dropdown','parent_id',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),(41,4,'order','text','order',1,1,1,1,1,1,'{\"default\":1}',3),(42,4,'name','text','name',1,1,1,1,1,1,'',4),(43,4,'slug','text','slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),(44,4,'created_at','timestamp','created_at',0,0,1,0,0,0,'',6),(45,4,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),(46,6,'id','number','id',1,0,0,0,0,0,'',1),(47,6,'name','text','Name',1,1,1,1,1,1,'',2),(48,6,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),(49,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),(50,6,'display_name','text','Display Name',1,1,1,1,1,1,'',5),(51,1,'seo_title','text','seo_title',0,1,1,1,1,1,'',14),(52,1,'featured','checkbox','featured',1,1,1,1,1,1,'',15),(53,3,'role_id','text','role_id',1,1,1,1,1,1,'',9),(54,7,'id','text','Id',1,0,0,0,0,0,NULL,1),(55,7,'name','text','Name',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"rg\"}}',2),(56,7,'slug','text','Slug',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"rg\"},\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}',3),(57,7,'description','rich_text_box','Description',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"lf\"}}',4),(58,7,'images','multiple_images','Images',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"rg\"}}',5),(59,7,'product_category_id','hidden','Product Category Id',0,0,0,1,1,0,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"rg\"}}',6),(60,7,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,7),(61,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,8),(62,7,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,9),(63,7,'product_belongsto_product_category_relationship','relationship','product_categories',0,1,1,1,1,0,'{\"model\":\"App\\\\Models\\\\ProductCategory\",\"table\":\"product_categories\",\"type\":\"belongsTo\",\"column\":\"product_category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\"}',10),(70,9,'id','number','id',1,0,0,0,0,0,'',1),(71,9,'name','text','Name',1,1,1,1,1,1,'',2),(72,9,'slug','text','slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',3),(73,9,'view','code_editor','body',1,0,1,1,1,1,'',4),(74,9,'created_at','timestamp','created_at',1,1,1,0,0,0,'',5),(75,9,'updated_at','timestamp','updated_at',1,0,0,0,0,0,'',6),(76,10,'id','checkbox','Id',1,0,0,0,0,0,NULL,1),(77,10,'name','text','Name',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"lf\"}}',2),(78,10,'slug','text','Slug',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-6-6\",\"stack\":\"rg\"},\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}',3),(79,10,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,4),(80,10,'updated_at','timestamp','Updated At',0,0,1,0,0,0,NULL,5),(81,10,'deleted_at','timestamp','Deleted At',0,0,1,0,0,0,NULL,6);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy','','',1,0,'2018-02-23 00:19:44','2018-02-23 00:19:44'),(2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,'2018-02-23 00:19:44','2018-02-23 00:19:44'),(3,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45'),(5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45'),(6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45'),(7,'products','products','Product','Products',NULL,'App\\Models\\Product',NULL,'ProductsController',NULL,1,1,'2018-02-23 00:22:59','2018-02-23 00:42:47'),(9,'bread_templates','templates','Template','Templates','voyager-news','Launcher\\BreadTemplates\\Models\\Template',NULL,'','',1,0,'2018-02-23 00:58:23','2018-02-23 00:58:23'),(10,'product_categories','product-categories','Product Category','Product Categories',NULL,'App\\Models\\ProductCategory',NULL,NULL,NULL,1,0,'2018-02-23 01:09:41','2018-02-23 01:09:41');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2018-02-23 00:19:47','2018-02-23 00:19:47','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,2,'2018-02-23 00:19:47','2018-02-23 00:36:44','voyager.media.index',NULL),(3,1,'Posts','','_self','voyager-news',NULL,17,2,'2018-02-23 00:19:47','2018-02-23 00:35:40','voyager.posts.index',NULL),(4,1,'Users','','_self','voyager-person',NULL,18,2,'2018-02-23 00:19:47','2018-02-23 00:36:37','voyager.users.index',NULL),(5,1,'Categories','','_self','voyager-categories',NULL,17,1,'2018-02-23 00:19:47','2018-02-23 00:35:40','voyager.categories.index',NULL),(6,1,'Pages','','_self','voyager-file-text',NULL,17,3,'2018-02-23 00:19:47','2018-02-23 00:35:40','voyager.pages.index',NULL),(7,1,'Roles','','_self','voyager-lock',NULL,18,1,'2018-02-23 00:19:47','2018-02-23 00:36:37','voyager.roles.index',NULL),(8,1,'Developer Tools','','_self','voyager-tools','#000000',NULL,6,'2018-02-23 00:19:47','2018-02-23 00:36:37',NULL,''),(9,1,'Menu Builder','','_self','voyager-list',NULL,8,1,'2018-02-23 00:19:47','2018-02-23 00:26:24','voyager.menus.index',NULL),(10,1,'Database','','_self','voyager-data',NULL,8,2,'2018-02-23 00:19:47','2018-02-23 00:26:24','voyager.database.index',NULL),(11,1,'Compass','','_self','voyager-compass',NULL,8,3,'2018-02-23 00:19:47','2018-02-23 00:26:24','voyager.compass.index',NULL),(12,1,'Settings','','_self','voyager-settings',NULL,18,3,'2018-02-23 00:19:47','2018-02-23 00:36:37','voyager.settings.index',NULL),(13,1,'Hooks','','_self','voyager-hook',NULL,8,4,'2018-02-23 00:19:52','2018-02-23 00:26:24','voyager.hooks',NULL),(14,1,'Products','/admin/products','_self',NULL,NULL,16,2,'2018-02-23 00:22:59','2018-02-23 00:26:30',NULL,NULL),(15,1,'Product Categories','/admin/product-categories','_self',NULL,NULL,16,1,'2018-02-23 00:25:02','2018-02-23 00:26:30',NULL,NULL),(16,1,'Products Management','','_self',NULL,'#000000',NULL,3,'2018-02-23 00:26:19','2018-02-23 00:36:44',NULL,''),(17,1,'CMS','','_self',NULL,'#000000',NULL,4,'2018-02-23 00:35:24','2018-02-23 00:36:44',NULL,''),(18,1,'System','','_self',NULL,'#000000',NULL,5,'2018-02-23 00:36:09','2018-02-23 00:36:37',NULL,''),(19,1,'Templates','/admin/templates','_self','voyager-megaphone',NULL,NULL,98,'2018-02-23 00:58:23','2018-02-23 00:58:23',NULL,NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2018-02-23 00:19:47','2018-02-23 00:19:47');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_01_01_000000_create_pages_table',1),(6,'2016_01_01_000000_create_posts_table',1),(7,'2016_02_15_204651_create_categories_table',1),(8,'2016_05_19_173453_create_menu_table',1),(9,'2016_10_21_190000_create_roles_table',1),(10,'2016_10_21_190000_create_settings_table',1),(11,'2016_11_30_135954_create_permission_table',1),(12,'2016_11_30_141208_create_permission_role_table',1),(13,'2016_12_26_201236_data_types__add__server_side',1),(14,'2017_01_13_000000_add_route_to_menu_items_table',1),(15,'2017_01_14_005015_create_translations_table',1),(16,'2017_01_15_000000_add_permission_group_id_to_permissions_table',1),(17,'2017_01_15_000000_create_permission_groups_table',1),(18,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(19,'2017_03_06_000000_add_controller_to_data_types_table',1),(20,'2017_04_11_000000_alter_post_nullable_fields_table',1),(21,'2017_04_21_000000_add_order_to_data_rows_table',1),(22,'2017_07_05_210000_add_policyname_to_data_types_table',1),(23,'2017_08_05_000000_add_group_to_settings_table',1),(24,'2017_06_26_000000_create_bread_templates_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2018-02-23 00:19:51','2018-02-23 00:19:51');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_groups`
--

DROP TABLE IF EXISTS `permission_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_groups`
--

LOCK TABLES `permission_groups` WRITE;
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,3),(2,1),(2,3),(3,1),(3,3),(4,1),(4,3),(5,1),(5,3),(6,1),(6,3),(7,1),(7,3),(8,1),(8,3),(9,1),(9,3),(10,1),(10,3),(11,1),(11,3),(12,1),(12,3),(13,1),(13,3),(14,1),(14,3),(15,1),(15,3),(16,1),(16,3),(17,1),(17,3),(18,1),(18,3),(19,1),(19,3),(20,1),(20,3),(21,1),(21,3),(22,1),(22,3),(23,1),(23,3),(24,1),(24,3),(25,1),(25,3),(26,1),(26,3),(27,1),(27,3),(28,1),(28,3),(29,1),(29,3),(30,1),(30,3),(31,1),(31,3),(32,1),(32,3),(33,1),(33,3),(34,1),(34,3),(35,1),(35,3),(36,1),(36,3),(37,1),(37,3),(38,1),(38,3),(39,1),(39,3),(40,3),(41,1),(41,3),(42,1),(42,3),(43,1),(43,3),(44,1),(44,3),(45,1),(45,3),(51,1),(51,3),(52,1),(52,3),(53,1),(53,3),(54,1),(54,3),(55,1),(55,3),(56,1),(56,3),(57,1),(57,3),(58,1),(58,3),(59,1),(59,3),(60,1),(60,3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2018-02-23 00:19:47','2018-02-23 00:19:47',NULL),(2,'browse_database',NULL,'2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(3,'browse_media',NULL,'2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(4,'browse_compass',NULL,'2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(5,'browse_menus','menus','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(6,'read_menus','menus','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(7,'edit_menus','menus','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(8,'add_menus','menus','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(9,'delete_menus','menus','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(10,'browse_pages','pages','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(11,'read_pages','pages','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(12,'edit_pages','pages','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(13,'add_pages','pages','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(14,'delete_pages','pages','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(15,'browse_roles','roles','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(16,'read_roles','roles','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(17,'edit_roles','roles','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(18,'add_roles','roles','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(19,'delete_roles','roles','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(20,'browse_users','users','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(21,'read_users','users','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(22,'edit_users','users','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(23,'add_users','users','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(24,'delete_users','users','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(25,'browse_posts','posts','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(26,'read_posts','posts','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(27,'edit_posts','posts','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(28,'add_posts','posts','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(29,'delete_posts','posts','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(30,'browse_categories','categories','2018-02-23 00:19:48','2018-02-23 00:19:48',NULL),(31,'read_categories','categories','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(32,'edit_categories','categories','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(33,'add_categories','categories','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(34,'delete_categories','categories','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(35,'browse_settings','settings','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(36,'read_settings','settings','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(37,'edit_settings','settings','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(38,'add_settings','settings','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(39,'delete_settings','settings','2018-02-23 00:19:49','2018-02-23 00:19:49',NULL),(40,'browse_hooks',NULL,'2018-02-23 00:19:52','2018-02-23 00:19:52',NULL),(41,'browse_products','products','2018-02-23 00:22:59','2018-02-23 00:22:59',NULL),(42,'read_products','products','2018-02-23 00:22:59','2018-02-23 00:22:59',NULL),(43,'edit_products','products','2018-02-23 00:22:59','2018-02-23 00:22:59',NULL),(44,'add_products','products','2018-02-23 00:22:59','2018-02-23 00:22:59',NULL),(45,'delete_products','products','2018-02-23 00:22:59','2018-02-23 00:22:59',NULL),(51,'browse_bread_templates','bread_templates','2018-02-23 00:58:23','2018-02-23 00:58:23',NULL),(52,'read_bread_templates','bread_templates','2018-02-23 00:58:23','2018-02-23 00:58:23',NULL),(53,'edit_bread_templates','bread_templates','2018-02-23 00:58:23','2018-02-23 00:58:23',NULL),(54,'add_bread_templates','bread_templates','2018-02-23 00:58:23','2018-02-23 00:58:23',NULL),(55,'delete_bread_templates','bread_templates','2018-02-23 00:58:23','2018-02-23 00:58:23',NULL),(56,'browse_product_categories','product_categories','2018-02-23 01:09:41','2018-02-23 01:09:41',NULL),(57,'read_product_categories','product_categories','2018-02-23 01:09:41','2018-02-23 01:09:41',NULL),(58,'edit_product_categories','product_categories','2018-02-23 01:09:41','2018-02-23 01:09:41',NULL),(59,'add_product_categories','product_categories','2018-02-23 01:09:41','2018-02-23 01:09:41',NULL),(60,'delete_product_categories','product_categories','2018-02-23 01:09:41','2018-02-23 01:09:41',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,0,NULL,'Lorem Ipsum Post',NULL,'This is the excerpt for the Lorem Ipsum Post','<p>This is the body of the lorem ipsum post</p>','posts/post1.jpg','lorem-ipsum-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2018-02-23 00:19:51','2018-02-23 00:19:51'),(2,0,NULL,'My Sample Post',NULL,'This is the excerpt for the sample Post','<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>','posts/post2.jpg','my-sample-post','Meta Description for sample post','keyword1, keyword2, keyword3','PUBLISHED',0,'2018-02-23 00:19:51','2018-02-23 00:19:51'),(3,0,NULL,'Latest Post',NULL,'This is the excerpt for the latest post','<p>This is the body for the latest post</p>','posts/post3.jpg','latest-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2018-02-23 00:19:51','2018-02-23 00:19:51'),(4,0,NULL,'Yarr Post',NULL,'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.','<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>','posts/post4.jpg','yarr-post','this be a meta descript','keyword1, keyword2, keyword3','PUBLISHED',0,'2018-02-23 00:19:51','2018-02-23 00:19:51');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'test','test','2018-02-23 00:26:53','2018-02-23 00:26:53',NULL),(2,'no test','no-test','2018-02-23 00:28:40','2018-02-23 00:28:40',NULL),(3,'Oh my category','oh-my-category','2018-02-23 01:10:46','2018-02-23 01:10:46',NULL),(4,'fuck yeah','fuck-yeah','2018-02-23 01:22:33','2018-02-23 01:22:33',NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `images` text COLLATE utf8_unicode_ci,
  `product_category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Amely','amely','<p>asdasda</p>',NULL,2,'2018-02-23 00:27:05','2018-02-23 00:32:13',NULL),(2,'product two',NULL,'<p>asdsadasd</p>',NULL,1,'2018-02-23 00:46:13','2018-02-23 00:46:13',NULL),(3,'ba con soi','ba-con-soi','<p>zsdfsdfsd sdfsd</p>\r\n<p>sdsdfsdf</p>\r\n<p><img src=\"http://localhost:8000/storage/products/February2018/Screenshot from 2018-01-02 23-04-32.png\" alt=\"guug\" width=\"1800\" height=\"1013\" /></p>','[\"products\\/February2018\\/FxYutCBLpQse9iuBiRbX.png\",\"products\\/February2018\\/6p3qFKirYjDz16OjeyL6.png\",\"products\\/February2018\\/MQLVIhjhqVtLqfPNaZKi.png\"]',3,'2018-02-23 01:18:49','2018-02-23 01:18:49',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2018-02-23 00:19:47','2018-02-23 00:19:47'),(2,'user','Normal User','2018-02-23 00:19:47','2018-02-23 00:19:47'),(3,'developer','Developer','2018-02-23 01:13:09','2018-02-23 01:13:09');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'data_types','display_name_singular',1,'pt','Post','2018-02-23 00:19:51','2018-02-23 00:19:51'),(2,'data_types','display_name_singular',2,'pt','Página','2018-02-23 00:19:51','2018-02-23 00:19:51'),(3,'data_types','display_name_singular',3,'pt','Utilizador','2018-02-23 00:19:51','2018-02-23 00:19:51'),(4,'data_types','display_name_singular',4,'pt','Categoria','2018-02-23 00:19:51','2018-02-23 00:19:51'),(5,'data_types','display_name_singular',5,'pt','Menu','2018-02-23 00:19:51','2018-02-23 00:19:51'),(6,'data_types','display_name_singular',6,'pt','Função','2018-02-23 00:19:51','2018-02-23 00:19:51'),(7,'data_types','display_name_plural',1,'pt','Posts','2018-02-23 00:19:51','2018-02-23 00:19:51'),(8,'data_types','display_name_plural',2,'pt','Páginas','2018-02-23 00:19:51','2018-02-23 00:19:51'),(9,'data_types','display_name_plural',3,'pt','Utilizadores','2018-02-23 00:19:51','2018-02-23 00:19:51'),(10,'data_types','display_name_plural',4,'pt','Categorias','2018-02-23 00:19:51','2018-02-23 00:19:51'),(11,'data_types','display_name_plural',5,'pt','Menus','2018-02-23 00:19:52','2018-02-23 00:19:52'),(12,'data_types','display_name_plural',6,'pt','Funções','2018-02-23 00:19:52','2018-02-23 00:19:52'),(13,'categories','slug',1,'pt','categoria-1','2018-02-23 00:19:52','2018-02-23 00:19:52'),(14,'categories','name',1,'pt','Categoria 1','2018-02-23 00:19:52','2018-02-23 00:19:52'),(15,'categories','slug',2,'pt','categoria-2','2018-02-23 00:19:52','2018-02-23 00:19:52'),(16,'categories','name',2,'pt','Categoria 2','2018-02-23 00:19:52','2018-02-23 00:19:52'),(17,'pages','title',1,'pt','Olá Mundo','2018-02-23 00:19:52','2018-02-23 00:19:52'),(18,'pages','slug',1,'pt','ola-mundo','2018-02-23 00:19:52','2018-02-23 00:19:52'),(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2018-02-23 00:19:52','2018-02-23 00:19:52'),(20,'menu_items','title',1,'pt','Painel de Controle','2018-02-23 00:19:52','2018-02-23 00:19:52'),(21,'menu_items','title',2,'pt','Media','2018-02-23 00:19:52','2018-02-23 00:19:52'),(22,'menu_items','title',3,'pt','Publicações','2018-02-23 00:19:52','2018-02-23 00:19:52'),(23,'menu_items','title',4,'pt','Utilizadores','2018-02-23 00:19:52','2018-02-23 00:19:52'),(24,'menu_items','title',5,'pt','Categorias','2018-02-23 00:19:52','2018-02-23 00:19:52'),(25,'menu_items','title',6,'pt','Páginas','2018-02-23 00:19:52','2018-02-23 00:19:52'),(26,'menu_items','title',7,'pt','Funções','2018-02-23 00:19:52','2018-02-23 00:19:52'),(27,'menu_items','title',8,'pt','Ferramentas','2018-02-23 00:19:52','2018-02-23 00:19:52'),(28,'menu_items','title',9,'pt','Menus','2018-02-23 00:19:52','2018-02-23 00:19:52'),(29,'menu_items','title',10,'pt','Base de dados','2018-02-23 00:19:52','2018-02-23 00:19:52'),(30,'menu_items','title',12,'pt','Configurações','2018-02-23 00:19:52','2018-02-23 00:19:52'),(31,'menu_items','title',16,'fr','','2018-02-23 00:26:19','2018-02-23 00:26:19'),(32,'data_types','display_name_singular',7,'fr','Product','2018-02-23 00:27:59','2018-02-23 00:27:59'),(33,'data_types','display_name_plural',7,'fr','Products','2018-02-23 00:27:59','2018-02-23 00:27:59'),(34,'menu_items','title',17,'fr','','2018-02-23 00:35:24','2018-02-23 00:35:24'),(35,'menu_items','title',18,'fr','','2018-02-23 00:36:09','2018-02-23 00:36:09'),(36,'menu_items','title',8,'fr','Tools','2018-02-23 00:36:23','2018-02-23 00:36:23'),(39,'data_types','display_name_singular',10,'fr','Product Category','2018-02-23 01:10:26','2018-02-23 01:10:26'),(40,'data_types','display_name_plural',10,'fr','Product Categories','2018-02-23 01:10:26','2018-02-23 01:10:26');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,3,'Admin','admin@admin.com','users/default.png','$2y$10$J7ev9D1CK3RL7Y2wOeMXp.gXbX9ta9JLCED2IZOw/jM8rdnYgfNf6','8HSzCr1f3L6E7f12gsZQ1PRClVcrKJXwx2bxJ3qWj0gjawix8Ob6OPp06kof','2018-02-23 00:19:51','2018-02-23 01:13:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-23 15:52:34
