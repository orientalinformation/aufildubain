-- MySQL dump 10.15  Distrib 10.0.32-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: aufildubain
-- ------------------------------------------------------
-- Server version	10.0.32-MariaDB-0+deb8u1

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
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (2,1,'author_id','text','Author',1,0,1,1,0,1,NULL,2);
INSERT INTO `data_rows` VALUES (3,1,'category_id','text','Category',0,0,1,1,1,0,NULL,3);
INSERT INTO `data_rows` VALUES (4,1,'title','text','Titre',1,1,1,1,1,1,NULL,4);
INSERT INTO `data_rows` VALUES (5,1,'excerpt','text_area','Extrait',0,0,1,1,1,1,NULL,5);
INSERT INTO `data_rows` VALUES (6,1,'body','rich_text_box','Corps',1,0,1,1,1,1,NULL,6);
INSERT INTO `data_rows` VALUES (7,1,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7);
INSERT INTO `data_rows` VALUES (8,1,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}',8);
INSERT INTO `data_rows` VALUES (9,1,'meta_description','text_area','Meta Description',0,0,1,1,1,1,NULL,9);
INSERT INTO `data_rows` VALUES (10,1,'meta_keywords','text_area','Meta keywords',0,0,1,1,1,1,NULL,10);
INSERT INTO `data_rows` VALUES (11,1,'status','select_dropdown','Statut',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11);
INSERT INTO `data_rows` VALUES (12,1,'created_at','timestamp','Date de création',0,1,1,0,0,0,NULL,12);
INSERT INTO `data_rows` VALUES (13,1,'updated_at','timestamp','updated_at',0,0,0,0,0,0,NULL,13);
INSERT INTO `data_rows` VALUES (14,2,'id','number','id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (15,2,'author_id','text','Auteur id',1,0,0,0,0,0,NULL,2);
INSERT INTO `data_rows` VALUES (16,2,'title','text','Titre',1,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',3);
INSERT INTO `data_rows` VALUES (17,2,'excerpt','text_area','Extrait',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',7);
INSERT INTO `data_rows` VALUES (18,2,'body','rich_text_box','Corps',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\"}}',12);
INSERT INTO `data_rows` VALUES (19,2,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',4);
INSERT INTO `data_rows` VALUES (20,2,'meta_description','text','Meta description',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',5);
INSERT INTO `data_rows` VALUES (21,2,'meta_keywords','text','Meta keywords',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',6);
INSERT INTO `data_rows` VALUES (22,2,'status','select_dropdown','Statut',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"},\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',8);
INSERT INTO `data_rows` VALUES (23,2,'created_at','timestamp','Date de création',0,1,1,0,0,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',9);
INSERT INTO `data_rows` VALUES (24,2,'updated_at','timestamp','updated_at',0,0,0,0,0,0,NULL,13);
INSERT INTO `data_rows` VALUES (25,2,'image','image','Image',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',11);
INSERT INTO `data_rows` VALUES (26,3,'id','number','id',1,0,0,0,0,0,'',1);
INSERT INTO `data_rows` VALUES (27,3,'name','text','name',1,1,1,1,1,1,'',2);
INSERT INTO `data_rows` VALUES (28,3,'email','text','email',1,1,1,1,1,1,'',3);
INSERT INTO `data_rows` VALUES (29,3,'password','password','password',0,0,0,1,1,0,'',4);
INSERT INTO `data_rows` VALUES (30,3,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}',10);
INSERT INTO `data_rows` VALUES (31,3,'remember_token','text','remember_token',0,0,0,0,0,0,'',5);
INSERT INTO `data_rows` VALUES (32,3,'created_at','timestamp','created_at',0,1,1,0,0,0,'',6);
INSERT INTO `data_rows` VALUES (33,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7);
INSERT INTO `data_rows` VALUES (34,3,'avatar','image','avatar',0,1,1,1,1,1,'',8);
INSERT INTO `data_rows` VALUES (35,5,'id','number','id',1,0,0,0,0,0,'',1);
INSERT INTO `data_rows` VALUES (36,5,'name','text','name',1,1,1,1,1,1,'',2);
INSERT INTO `data_rows` VALUES (37,5,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3);
INSERT INTO `data_rows` VALUES (38,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4);
INSERT INTO `data_rows` VALUES (39,4,'id','number','id',1,0,0,0,0,0,'',1);
INSERT INTO `data_rows` VALUES (40,4,'parent_id','select_dropdown','parent_id',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2);
INSERT INTO `data_rows` VALUES (41,4,'order','text','order',1,1,1,1,1,1,'{\"default\":1}',3);
INSERT INTO `data_rows` VALUES (42,4,'name','text','name',1,1,1,1,1,1,'',4);
INSERT INTO `data_rows` VALUES (43,4,'slug','text','slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5);
INSERT INTO `data_rows` VALUES (44,4,'created_at','timestamp','created_at',0,0,1,0,0,0,'',6);
INSERT INTO `data_rows` VALUES (45,4,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7);
INSERT INTO `data_rows` VALUES (46,6,'id','number','id',1,0,0,0,0,0,'',1);
INSERT INTO `data_rows` VALUES (47,6,'name','text','Name',1,1,1,1,1,1,'',2);
INSERT INTO `data_rows` VALUES (48,6,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3);
INSERT INTO `data_rows` VALUES (49,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4);
INSERT INTO `data_rows` VALUES (50,6,'display_name','text','Display Name',1,1,1,1,1,1,'',5);
INSERT INTO `data_rows` VALUES (51,1,'seo_title','text','SEO Titre',0,1,1,1,1,1,NULL,14);
INSERT INTO `data_rows` VALUES (52,1,'featured','checkbox','En vedette',1,1,1,1,1,1,NULL,15);
INSERT INTO `data_rows` VALUES (53,3,'role_id','text','role_id',1,1,1,1,1,1,'',9);
INSERT INTO `data_rows` VALUES (54,7,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (56,7,'slug','text','Slug',0,0,1,1,1,0,'{\"readonly\":true,\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"slugify\":{\"origin\":\"title\"}}',3);
INSERT INTO `data_rows` VALUES (57,7,'description','rich_text_box','Description',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',11);
INSERT INTO `data_rows` VALUES (58,7,'images','multiple_images','Image',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',17);
INSERT INTO `data_rows` VALUES (60,7,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,25);
INSERT INTO `data_rows` VALUES (61,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,26);
INSERT INTO `data_rows` VALUES (62,7,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,27);
INSERT INTO `data_rows` VALUES (92,13,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (93,13,'description','rich_text_box','Description',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',4);
INSERT INTO `data_rows` VALUES (94,13,'meta_description','text_area','Meta description',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',7);
INSERT INTO `data_rows` VALUES (95,13,'meta_keywords','text_area','Meta keywords',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',8);
INSERT INTO `data_rows` VALUES (96,13,'meta_title','text','Meta title',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',6);
INSERT INTO `data_rows` VALUES (97,13,'ord','number','Order',1,1,1,1,1,0,'{\"default\":0,\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',5);
INSERT INTO `data_rows` VALUES (98,13,'title','text','Titre',1,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"validation\":{\"rule\":\"required\"}}',2);
INSERT INTO `data_rows` VALUES (99,13,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,10);
INSERT INTO `data_rows` VALUES (100,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,11);
INSERT INTO `data_rows` VALUES (101,13,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,12);
INSERT INTO `data_rows` VALUES (102,13,'image','image','Image principale',0,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',9);
INSERT INTO `data_rows` VALUES (152,18,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (153,18,'name','text','Libellé',1,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',2);
INSERT INTO `data_rows` VALUES (154,18,'created_at','timestamp','Date de création',0,0,0,0,0,0,NULL,13);
INSERT INTO `data_rows` VALUES (155,18,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,15);
INSERT INTO `data_rows` VALUES (156,18,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,14);
INSERT INTO `data_rows` VALUES (157,18,'description','rich_text_box','Description',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',6);
INSERT INTO `data_rows` VALUES (158,18,'fullname','text','Fullname',0,0,0,0,0,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',7);
INSERT INTO `data_rows` VALUES (160,18,'image_alt','text','Alt sur l\'image',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',12);
INSERT INTO `data_rows` VALUES (161,18,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',9);
INSERT INTO `data_rows` VALUES (162,18,'meta_keywords','text_area','Meta Keywords',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',10);
INSERT INTO `data_rows` VALUES (163,18,'meta_title','text','Meta Title',0,0,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',8);
INSERT INTO `data_rows` VALUES (164,18,'parent_id','select_dropdown','Categorie parente',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"default\":\"0\",\"options\":{\"0\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',3);
INSERT INTO `data_rows` VALUES (166,18,'slug','text','Slug',0,0,1,1,1,0,'{\"readonly\":true,\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"slugify\":{\"origin\":\"name\"}}',4);
INSERT INTO `data_rows` VALUES (169,19,'id','number','id',1,0,0,0,0,0,'',1);
INSERT INTO `data_rows` VALUES (170,19,'name','text','Name',1,1,1,1,1,1,'',2);
INSERT INTO `data_rows` VALUES (171,19,'slug','text','slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',3);
INSERT INTO `data_rows` VALUES (172,19,'view','code_editor','body',1,0,1,1,1,1,'',4);
INSERT INTO `data_rows` VALUES (173,19,'created_at','timestamp','created_at',1,1,1,0,0,0,'',5);
INSERT INTO `data_rows` VALUES (174,19,'updated_at','timestamp','updated_at',1,0,0,0,0,0,'',6);
INSERT INTO `data_rows` VALUES (175,18,'image','image','Image',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',11);
INSERT INTO `data_rows` VALUES (176,13,'slug','text','Slug',0,0,1,1,1,0,'{\"readonly\":true,\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"slugify\":{\"origin\":\"title\"}}',3);
INSERT INTO `data_rows` VALUES (177,7,'brand_id','select_dropdown','Marque',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"default\":\"\",\"options\":{\"\":\"Veuillez sélectionner\"},\"relationship\":{\"key\":\"id\",\"label\":\"title\"}}',7);
INSERT INTO `data_rows` VALUES (178,7,'category_id','select_dropdown','Categorie',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"default\":\"\",\"options\":{\"\":\"Veuillez sélectionner\"},\"relationship\":{\"key\":\"id\",\"label\":\"fullname\"}}',6);
INSERT INTO `data_rows` VALUES (179,7,'ecotaxe','text','Eco taxe',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',9);
INSERT INTO `data_rows` VALUES (180,7,'grip','text_area','Accroche',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',10);
INSERT INTO `data_rows` VALUES (181,7,'secondary_images','multiple_images','Images secondaires',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',19);
INSERT INTO `data_rows` VALUES (182,7,'image_alt','text','Alt sur l\'image',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',18);
INSERT INTO `data_rows` VALUES (183,7,'meta_description','text_area','Meta Description',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',21);
INSERT INTO `data_rows` VALUES (184,7,'meta_keywords','text_area','Meta Keywords',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',22);
INSERT INTO `data_rows` VALUES (185,7,'meta_title','text','Meta Title',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',20);
INSERT INTO `data_rows` VALUES (186,7,'more_1','text_area','Plus du produit 1',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',12);
INSERT INTO `data_rows` VALUES (187,7,'more_2','text_area','Plus du produit 2',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',13);
INSERT INTO `data_rows` VALUES (188,7,'more_3','text_area','Plus du produit 3',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',14);
INSERT INTO `data_rows` VALUES (189,7,'on_home','checkbox','Affichage sur la home',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"on\":\"Oui\",\"off\":\"Non\"}',15);
INSERT INTO `data_rows` VALUES (190,7,'price','text','Prix',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',8);
INSERT INTO `data_rows` VALUES (191,7,'reference','text','Référence',0,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',5);
INSERT INTO `data_rows` VALUES (192,7,'title','text','Titre',1,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',2);
INSERT INTO `data_rows` VALUES (193,7,'type','text','Type',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',4);
INSERT INTO `data_rows` VALUES (194,7,'univers','hidden','Univers',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"default\":\"Sanitaire\"}',24);
INSERT INTO `data_rows` VALUES (195,7,'visible','checkbox','Disponible sur le site',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"on\":\"Oui\",\"off\":\"Non\",\"checked\":\"true\"}',16);
INSERT INTO `data_rows` VALUES (196,20,'id','text','Id',1,0,0,0,0,0,'{}',1);
INSERT INTO `data_rows` VALUES (197,20,'title','text','Titre',1,1,1,1,1,0,'{}',2);
INSERT INTO `data_rows` VALUES (198,20,'slug','text','Slug',0,1,1,1,1,0,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}',3);
INSERT INTO `data_rows` VALUES (209,23,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (210,23,'title','text','Titre',1,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',2);
INSERT INTO `data_rows` VALUES (211,23,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,12);
INSERT INTO `data_rows` VALUES (212,23,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,13);
INSERT INTO `data_rows` VALUES (213,23,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,14);
INSERT INTO `data_rows` VALUES (214,24,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (216,24,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,6);
INSERT INTO `data_rows` VALUES (217,24,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7);
INSERT INTO `data_rows` VALUES (218,24,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,8);
INSERT INTO `data_rows` VALUES (224,26,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (225,26,'title','hidden','Title',0,0,0,0,0,0,NULL,11);
INSERT INTO `data_rows` VALUES (226,26,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,14);
INSERT INTO `data_rows` VALUES (227,26,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,15);
INSERT INTO `data_rows` VALUES (228,26,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,16);
INSERT INTO `data_rows` VALUES (229,27,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (231,27,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,3);
INSERT INTO `data_rows` VALUES (232,27,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4);
INSERT INTO `data_rows` VALUES (233,27,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,5);
INSERT INTO `data_rows` VALUES (234,26,'class_menu','hidden','Class Menu',0,0,0,0,0,0,NULL,13);
INSERT INTO `data_rows` VALUES (235,26,'keywords','hidden','Keywords',0,0,0,0,0,0,NULL,12);
INSERT INTO `data_rows` VALUES (236,26,'name','text','Nom',1,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',2);
INSERT INTO `data_rows` VALUES (237,26,'parent_solution_id','select_dropdown','Solution parente',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"default\":\"0\",\"options\":{\"0\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',4);
INSERT INTO `data_rows` VALUES (238,26,'solution_order','number','Order',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"default\":0}',8);
INSERT INTO `data_rows` VALUES (239,26,'trend_edito','rich_text_box','Éditeur de tendance',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',10);
INSERT INTO `data_rows` VALUES (240,26,'visible_menu','checkbox','Visible Menu',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"on\":\"Oui\",\"off\":\"Non\"}',7);
INSERT INTO `data_rows` VALUES (241,26,'slug','text','Slug',0,1,1,1,1,0,'{\"readonly\":true,\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"},\"slugify\":{\"origin\":\"name\"}}',3);
INSERT INTO `data_rows` VALUES (242,20,'created_at','timestamp','Created At',0,1,0,0,0,0,NULL,19);
INSERT INTO `data_rows` VALUES (243,20,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,20);
INSERT INTO `data_rows` VALUES (244,20,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,21);
INSERT INTO `data_rows` VALUES (245,20,'description','rich_text_box','Description',0,0,1,1,1,0,'{}',7);
INSERT INTO `data_rows` VALUES (248,20,'meta_description','text_area','Meta description',0,0,1,1,1,0,'{}',15);
INSERT INTO `data_rows` VALUES (249,20,'meta_keywords','text_area','Meta Keywords',0,0,1,1,1,0,'{}',16);
INSERT INTO `data_rows` VALUES (250,20,'meta_title','text','Meta title',0,0,1,1,1,0,'{}',14);
INSERT INTO `data_rows` VALUES (254,20,'status','select_dropdown','Publication',0,0,1,1,1,0,'{}',18);
INSERT INTO `data_rows` VALUES (260,23,'btn_link','text','Lien sur le bouton',1,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',7);
INSERT INTO `data_rows` VALUES (261,23,'btn_name','text','Nom du bouton',1,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',6);
INSERT INTO `data_rows` VALUES (262,23,'image','multiple_images','Image principale',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',4);
INSERT INTO `data_rows` VALUES (263,23,'image_alt','text','Alt sur l\'image du slide',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',5);
INSERT INTO `data_rows` VALUES (264,23,'order','number','Ordre',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',11);
INSERT INTO `data_rows` VALUES (265,23,'sub_title','text','Sous-titre',1,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',3);
INSERT INTO `data_rows` VALUES (266,23,'title_image_min','text','Titre de la vignette',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',8);
INSERT INTO `data_rows` VALUES (267,23,'thumbnail','multiple_images','Vignette',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',9);
INSERT INTO `data_rows` VALUES (268,23,'inactive_thumbnail','multiple_images','Vignette inactive',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',10);
INSERT INTO `data_rows` VALUES (277,29,'id','hidden','Id',1,0,0,1,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (278,29,'name','text','Nom',1,1,1,1,1,0,NULL,2);
INSERT INTO `data_rows` VALUES (279,29,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,36);
INSERT INTO `data_rows` VALUES (280,29,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,37);
INSERT INTO `data_rows` VALUES (281,29,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,38);
INSERT INTO `data_rows` VALUES (282,29,'gps','coordinates','Coordonnées GPS',0,0,1,1,1,0,NULL,21);
INSERT INTO `data_rows` VALUES (283,29,'address','text','Adresse',0,0,1,1,1,0,NULL,4);
INSERT INTO `data_rows` VALUES (284,29,'address_2','text','Complément',0,0,1,1,1,0,NULL,5);
INSERT INTO `data_rows` VALUES (285,29,'adherent_id','hidden','Adherent Id',0,0,0,0,0,0,NULL,39);
INSERT INTO `data_rows` VALUES (286,29,'alt_list_link','text','Texte lien alternatif',0,0,1,1,1,0,NULL,35);
INSERT INTO `data_rows` VALUES (287,29,'alt_url','text','URL alternative',0,0,1,1,1,0,NULL,34);
INSERT INTO `data_rows` VALUES (288,29,'city','text','Ville',1,1,1,1,1,0,NULL,7);
INSERT INTO `data_rows` VALUES (289,29,'contact','hidden','Contact',0,0,0,0,0,0,NULL,40);
INSERT INTO `data_rows` VALUES (290,29,'description','rich_text_box','Descriptif',0,0,1,1,1,0,NULL,11);
INSERT INTO `data_rows` VALUES (291,29,'email','text','Email',0,0,1,1,1,0,NULL,16);
INSERT INTO `data_rows` VALUES (292,29,'email_copy','text','Emails copies',0,0,1,1,1,0,NULL,17);
INSERT INTO `data_rows` VALUES (293,29,'fax','text','Fax',0,0,1,1,1,0,NULL,15);
INSERT INTO `data_rows` VALUES (294,29,'gift_coupon_prefix','hidden','Gift Coupon Prefix',0,0,0,0,0,0,NULL,41);
INSERT INTO `data_rows` VALUES (295,29,'grip','text_area','Accroche',0,0,1,1,1,0,NULL,10);
INSERT INTO `data_rows` VALUES (296,29,'hourly','rich_text_box','Horaires',0,0,1,1,1,0,NULL,13);
INSERT INTO `data_rows` VALUES (297,29,'is_expo','hidden','Is Expo',0,0,0,0,0,0,NULL,42);
INSERT INTO `data_rows` VALUES (298,29,'manager','hidden','Manager',0,0,0,0,0,0,NULL,43);
INSERT INTO `data_rows` VALUES (299,29,'meta_description','text_area','Meta description',0,0,1,1,1,0,NULL,32);
INSERT INTO `data_rows` VALUES (300,29,'meta_keywords','text_area','Meta keywords',0,0,1,1,1,0,NULL,33);
INSERT INTO `data_rows` VALUES (301,29,'meta_title','text','Meta title',0,0,1,1,1,0,NULL,31);
INSERT INTO `data_rows` VALUES (302,29,'news_show','radio_btn','Masquer l\'info',0,0,1,1,1,0,'{\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',26);
INSERT INTO `data_rows` VALUES (303,29,'news_title','text','Info',0,0,1,1,1,0,NULL,24);
INSERT INTO `data_rows` VALUES (305,29,'quote_author','text','Auteur',0,0,1,1,1,0,NULL,28);
INSERT INTO `data_rows` VALUES (306,29,'quote_author_function','text','Fonction de l\'auteur',0,0,1,1,1,0,NULL,29);
INSERT INTO `data_rows` VALUES (307,29,'quote_text','rich_text_box','Citation',0,0,1,1,1,1,NULL,27);
INSERT INTO `data_rows` VALUES (308,29,'services','rich_text_box','Nos services',0,0,1,1,1,0,NULL,12);
INSERT INTO `data_rows` VALUES (309,29,'show_gift_coupon_form','radio_btn','Afficher le bouton bon cadeau',0,0,1,1,1,0,'{\"default\":0,\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',22);
INSERT INTO `data_rows` VALUES (310,29,'solutions','hidden','Solutions',0,0,0,0,0,0,NULL,44);
INSERT INTO `data_rows` VALUES (312,29,'web','text','Site internet',0,0,1,1,1,0,NULL,18);
INSERT INTO `data_rows` VALUES (313,29,'zip','text','Code postal',0,0,1,1,1,0,NULL,6);
INSERT INTO `data_rows` VALUES (315,29,'phone','text','Téléphone',0,0,1,1,1,0,NULL,14);
INSERT INTO `data_rows` VALUES (316,29,'logo','multiple_images','Logo',0,0,1,1,1,0,NULL,19);
INSERT INTO `data_rows` VALUES (317,29,'wide','multiple_images','Wide',0,0,1,1,1,0,NULL,20);
INSERT INTO `data_rows` VALUES (318,29,'news_image','multiple_images','Visuel',0,0,1,1,1,0,NULL,25);
INSERT INTO `data_rows` VALUES (319,29,'quote_author_image','multiple_images','Image',0,0,1,1,1,0,NULL,30);
INSERT INTO `data_rows` VALUES (321,29,'store_belongstomany_brand_relationship','relationship','Marques',0,0,1,1,1,0,'{\"model\":\"App\\\\Models\\\\Brand\",\"table\":\"brands\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"store_brands\",\"pivot\":\"1\"}',23);
INSERT INTO `data_rows` VALUES (323,29,'state','select_dropdown','Département',0,0,1,1,1,0,'{\"relationship\":{\"key\":\"zip\",\"label\":\"name\"}}',9);
INSERT INTO `data_rows` VALUES (324,7,'year_of_manufacture','text','Année lancement',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',23);
INSERT INTO `data_rows` VALUES (325,24,'name','text','Nom',0,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',2);
INSERT INTO `data_rows` VALUES (326,24,'code','text_area','Code de cette bannière',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',3);
INSERT INTO `data_rows` VALUES (327,24,'visible','checkbox','Visible',0,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',5);
INSERT INTO `data_rows` VALUES (328,24,'format','select_dropdown','Format',0,1,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"default\":\"0\",\"options\":{\"0\":\"160x600\",\"1\":\"300x250\",\"2\":\"468x60\",\"3\":\"728x90\"}}',4);
INSERT INTO `data_rows` VALUES (329,27,'store_id','select_dropdown','Nom du magasin',0,1,1,1,1,0,'{\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2);
INSERT INTO `data_rows` VALUES (330,26,'images','multiple_images','Images',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"},\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"}]}',5);
INSERT INTO `data_rows` VALUES (332,2,'template','text','Modèle',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',10);
INSERT INTO `data_rows` VALUES (333,29,'slug','text','Slug',0,0,1,1,1,0,'{\"readonly\":true,\"slugify\":{\"origin\":\"name\"}}',3);
INSERT INTO `data_rows` VALUES (335,30,'id','text','Id',1,0,0,0,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (336,30,'title','text','Title',0,1,1,1,1,0,NULL,2);
INSERT INTO `data_rows` VALUES (337,30,'images','image','Main Image',0,1,1,1,1,0,NULL,3);
INSERT INTO `data_rows` VALUES (338,30,'order','number','Order',0,1,1,1,1,0,'{\"default\":0}',4);
INSERT INTO `data_rows` VALUES (339,30,'created_at','timestamp','Created At',0,1,0,0,0,0,NULL,5);
INSERT INTO `data_rows` VALUES (340,30,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,6);
INSERT INTO `data_rows` VALUES (341,30,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,7);
INSERT INTO `data_rows` VALUES (342,30,'store_id','hidden','Store Id',1,0,0,1,1,0,NULL,8);
INSERT INTO `data_rows` VALUES (343,18,'grip','text_area','Accroche',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',5);
INSERT INTO `data_rows` VALUES (344,31,'id','hidden','Id',1,0,0,1,0,0,NULL,1);
INSERT INTO `data_rows` VALUES (345,31,'name','text','Nom',1,1,1,1,1,0,NULL,2);
INSERT INTO `data_rows` VALUES (346,31,'created_at','timestamp','Date de création',0,1,0,0,0,0,NULL,36);
INSERT INTO `data_rows` VALUES (347,31,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,37);
INSERT INTO `data_rows` VALUES (348,31,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,NULL,38);
INSERT INTO `data_rows` VALUES (349,31,'gps','coordinates','Coordonnées GPS',0,0,1,1,1,0,NULL,21);
INSERT INTO `data_rows` VALUES (350,31,'address','text','Adresse',0,0,1,1,1,0,NULL,4);
INSERT INTO `data_rows` VALUES (351,31,'address_2','text','Complément',0,0,1,1,1,0,NULL,5);
INSERT INTO `data_rows` VALUES (352,31,'adherent_id','hidden','Adherent Id',0,0,0,0,0,0,NULL,39);
INSERT INTO `data_rows` VALUES (353,31,'alt_list_link','text','Texte lien alternatif',0,0,1,1,1,0,NULL,35);
INSERT INTO `data_rows` VALUES (354,31,'alt_url','text','URL alternative',0,0,1,1,1,0,NULL,34);
INSERT INTO `data_rows` VALUES (355,31,'city','text','Ville',0,1,1,1,1,0,NULL,7);
INSERT INTO `data_rows` VALUES (356,31,'contact','hidden','Contact',0,0,0,0,0,0,NULL,40);
INSERT INTO `data_rows` VALUES (357,31,'description','rich_text_box','Descriptif',0,0,1,1,1,0,NULL,11);
INSERT INTO `data_rows` VALUES (358,31,'email','text','Email',0,0,1,1,1,0,NULL,16);
INSERT INTO `data_rows` VALUES (359,31,'email_copy','text','Emails copies',0,0,1,1,1,0,NULL,17);
INSERT INTO `data_rows` VALUES (360,31,'fax','text','Fax',0,0,1,1,1,0,NULL,15);
INSERT INTO `data_rows` VALUES (361,31,'gift_coupon_prefix','hidden','Gift Coupon Prefix',0,0,0,0,0,0,NULL,41);
INSERT INTO `data_rows` VALUES (362,31,'grip','text_area','Accroche',0,0,1,1,1,0,NULL,10);
INSERT INTO `data_rows` VALUES (363,31,'hourly','rich_text_box','Horaires',0,0,1,1,1,0,NULL,13);
INSERT INTO `data_rows` VALUES (364,31,'is_expo','hidden','Is Expo',0,0,0,0,0,0,NULL,42);
INSERT INTO `data_rows` VALUES (365,31,'manager','hidden','Manager',0,0,0,0,0,0,NULL,43);
INSERT INTO `data_rows` VALUES (366,31,'meta_description','text_area','Meta description',0,0,1,1,1,0,NULL,32);
INSERT INTO `data_rows` VALUES (367,31,'meta_keywords','text_area','Meta keywords',0,0,1,1,1,0,NULL,33);
INSERT INTO `data_rows` VALUES (368,31,'meta_title','text','Meta title',0,0,1,1,1,0,NULL,31);
INSERT INTO `data_rows` VALUES (369,31,'news_show','radio_btn','Masquer l\'info',0,0,1,1,1,0,'{\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',26);
INSERT INTO `data_rows` VALUES (370,31,'news_title','text','Info',0,0,1,1,1,0,NULL,24);
INSERT INTO `data_rows` VALUES (371,31,'quote_author','text','Auteur',0,0,1,1,1,0,NULL,28);
INSERT INTO `data_rows` VALUES (372,31,'quote_author_function','text','Fonction de l\'auteur',0,0,1,1,1,0,NULL,29);
INSERT INTO `data_rows` VALUES (373,31,'quote_text','rich_text_box','Citation',0,0,1,1,1,1,NULL,27);
INSERT INTO `data_rows` VALUES (374,31,'services','rich_text_box','Nos services',0,0,1,1,1,0,NULL,12);
INSERT INTO `data_rows` VALUES (375,31,'show_gift_coupon_form','radio_btn','Afficher le bouton bon cadeau',0,0,1,1,1,0,'{\"default\":0,\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',22);
INSERT INTO `data_rows` VALUES (376,31,'solutions','hidden','Solutions',0,0,0,0,0,0,NULL,44);
INSERT INTO `data_rows` VALUES (377,31,'web','text','Site internet',0,0,1,1,1,0,NULL,18);
INSERT INTO `data_rows` VALUES (378,31,'zip','text','Code postal',0,0,1,1,1,0,NULL,6);
INSERT INTO `data_rows` VALUES (379,31,'phone','text','Téléphone',0,0,1,1,1,0,NULL,14);
INSERT INTO `data_rows` VALUES (380,31,'logo','multiple_images','Logo',0,0,1,1,1,0,NULL,19);
INSERT INTO `data_rows` VALUES (381,31,'wide','multiple_images','Wide',0,0,1,1,1,0,NULL,20);
INSERT INTO `data_rows` VALUES (382,31,'news_image','multiple_images','Visuel',0,0,1,1,1,0,NULL,25);
INSERT INTO `data_rows` VALUES (383,31,'quote_author_image','multiple_images','Image',0,0,1,1,1,0,NULL,30);
INSERT INTO `data_rows` VALUES (384,31,'store_belongstomany_brand_relationship','relationship','Marques',0,0,1,1,1,0,'{\"model\":\"App\\\\Models\\\\Brand\",\"table\":\"brands\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"installer_brands\",\"pivot\":\"1\"}',23);
INSERT INTO `data_rows` VALUES (385,31,'state','select_dropdown','Département',0,0,1,1,1,0,'{\"relationship\":{\"key\":\"zip\",\"label\":\"name\"}}',9);
INSERT INTO `data_rows` VALUES (386,31,'slug','text','Slug',0,0,1,1,1,0,'{\"readonly\":true,\"slugify\":{\"origin\":\"name\"}}',3);
INSERT INTO `data_rows` VALUES (387,20,'start_date','date','Start Date',0,1,1,1,1,0,NULL,12);
INSERT INTO `data_rows` VALUES (388,20,'end_date','date','End Date',0,1,1,1,1,0,NULL,13);
INSERT INTO `data_rows` VALUES (389,20,'title_1','text','Title 1',0,0,1,1,1,1,NULL,14);
INSERT INTO `data_rows` VALUES (390,20,'description_1','text_area','Description 1',0,0,1,1,1,0,NULL,15);
INSERT INTO `data_rows` VALUES (391,20,'image_1','image','Image 1',0,0,1,1,1,0,NULL,16);
INSERT INTO `data_rows` VALUES (392,20,'title_2','text','Title 2',0,0,1,1,1,0,NULL,17);
INSERT INTO `data_rows` VALUES (393,20,'description_2','text_area','Description 2',0,0,1,1,1,0,NULL,18);
INSERT INTO `data_rows` VALUES (394,20,'image_2','image','Image 2',0,0,1,1,1,0,NULL,19);
INSERT INTO `data_rows` VALUES (395,20,'title_3','text','Title 3',0,0,1,1,1,0,NULL,20);
INSERT INTO `data_rows` VALUES (396,20,'description_3','text_area','Description 3',0,0,1,1,1,0,NULL,21);
INSERT INTO `data_rows` VALUES (397,20,'image_3','image','Image 3',0,0,1,1,1,0,NULL,22);
INSERT INTO `data_rows` VALUES (398,20,'title_4','text','Title 4',0,0,1,1,1,0,NULL,23);
INSERT INTO `data_rows` VALUES (399,20,'description_4','text_area','Description 4',0,0,1,1,1,0,NULL,24);
INSERT INTO `data_rows` VALUES (400,20,'image_4','image','Image 4',0,0,1,1,1,0,NULL,25);
INSERT INTO `data_rows` VALUES (401,20,'title_5','text','Title 5',0,0,1,1,1,0,NULL,26);
INSERT INTO `data_rows` VALUES (402,20,'description_5','text_area','Description 5',0,0,1,1,1,0,NULL,27);
INSERT INTO `data_rows` VALUES (403,20,'image_5','image','Image 5',0,0,1,1,1,0,NULL,28);
INSERT INTO `data_rows` VALUES (404,20,'title_6','text','Title 6',0,0,1,1,1,0,NULL,29);
INSERT INTO `data_rows` VALUES (405,20,'description_6','text_area','Description 6',0,0,1,1,1,0,NULL,30);
INSERT INTO `data_rows` VALUES (406,20,'image_6','image','Image 6',0,0,1,1,1,0,NULL,31);
INSERT INTO `data_rows` VALUES (407,20,'color_1','color','Color 1',0,0,1,1,1,0,NULL,32);
INSERT INTO `data_rows` VALUES (408,20,'color_2','color','Color 2',0,0,1,1,1,0,NULL,33);
INSERT INTO `data_rows` VALUES (409,20,'color_3','color','Color 3',0,0,1,1,1,0,NULL,34);
INSERT INTO `data_rows` VALUES (410,20,'color_4','color','Color 4',0,0,1,1,1,0,NULL,35);
INSERT INTO `data_rows` VALUES (411,20,'color_5','color','Color 5',0,0,1,1,1,0,NULL,36);
INSERT INTO `data_rows` VALUES (412,20,'color_6','color','Color 6',0,0,1,1,1,0,NULL,37);
INSERT INTO `data_rows` VALUES (413,20,'image','image','Image',0,0,1,1,1,0,NULL,38);
INSERT INTO `data_rows` VALUES (414,26,'cover_image','image','Image de couverture',0,0,1,1,1,0,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"rg\"}}',6);
INSERT INTO `data_rows` VALUES (415,26,'summary','text_area','Résumé',0,1,1,1,1,1,'{\"template\":{\"slug\":\"columns-8-4\",\"stack\":\"lf\"}}',9);
INSERT INTO `data_rows` VALUES (416,20,'title_7','text','Title 7',0,0,1,1,1,0,NULL,39);
INSERT INTO `data_rows` VALUES (417,20,'description_7','text_area','Description 7',0,0,1,1,1,0,NULL,40);
INSERT INTO `data_rows` VALUES (418,20,'image_7','image','Image 7',0,0,1,1,1,0,NULL,41);
INSERT INTO `data_rows` VALUES (419,20,'color_enable','checkbox','Activer la couleur',0,0,1,1,1,0,NULL,42);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy',NULL,NULL,1,0,'2018-02-23 00:19:44','2018-03-23 03:09:24');
INSERT INTO `data_types` VALUES (2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,NULL,NULL,1,0,'2018-02-23 00:19:44','2018-03-02 04:05:29');
INSERT INTO `data_types` VALUES (3,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45');
INSERT INTO `data_types` VALUES (4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45');
INSERT INTO `data_types` VALUES (5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45');
INSERT INTO `data_types` VALUES (6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'2018-02-23 00:19:45','2018-02-23 00:19:45');
INSERT INTO `data_types` VALUES (7,'products','products','Produit','Produits','icon fas fa-cube','App\\Models\\Product',NULL,'Back\\ProductsController',NULL,1,1,'2018-02-23 00:22:59','2018-03-10 00:54:13');
INSERT INTO `data_types` VALUES (13,'brands','brands','Marque','Marques','icon fas fa-industry','App\\Models\\Brand',NULL,'Back\\BrandsController',NULL,1,1,'2018-02-25 20:38:03','2018-03-10 02:42:21');
INSERT INTO `data_types` VALUES (18,'product_categories','product-categories','Catégorie de produit','Catégories de produits','voyager-categories','App\\Models\\ProductCategory',NULL,'Back\\ProductCategoriesController',NULL,1,1,'2018-02-26 00:57:57','2018-03-27 00:48:22');
INSERT INTO `data_types` VALUES (19,'bread_templates','templates','Template','Templates','voyager-news','Launcher\\BreadTemplates\\Models\\Template',NULL,'','',1,0,'2018-02-26 06:24:53','2018-02-26 06:24:53');
INSERT INTO `data_types` VALUES (20,'trends','trends','Tendance','Tendances','icon fas fa-chart-line','App\\Models\\Trend',NULL,'Back\\TrendsControler',NULL,1,1,'2018-02-26 21:10:06','2018-03-17 00:09:15');
INSERT INTO `data_types` VALUES (23,'slide_shows','slide-shows','Slide','Slides','icon far fa-images','App\\Models\\SlideShow',NULL,'Back\\SlideShowController',NULL,1,0,'2018-02-26 21:32:02','2018-03-23 03:06:16');
INSERT INTO `data_types` VALUES (24,'banners','banners','Bannière','Bannières','icon far fa-image','App\\Models\\Banner',NULL,'Back\\BannersController',NULL,1,1,'2018-02-26 21:36:30','2018-03-30 00:14:36');
INSERT INTO `data_types` VALUES (26,'solutions','solutions','Solution','Solutions','icon far fa-file-alt','App\\Models\\Solution',NULL,'Back\\SolutionsController',NULL,1,1,'2018-02-26 21:56:43','2018-03-30 00:03:48');
INSERT INTO `data_types` VALUES (27,'vouchers','vouchers','Bon','Bons','icon fas fa-ticket-alt','App\\Models\\Voucher',NULL,'Back\\VouchersController',NULL,1,0,'2018-02-26 21:58:36','2018-03-10 03:23:23');
INSERT INTO `data_types` VALUES (29,'stores','stores','Magasin','Magasins','icon fa fa-building','App\\Models\\Store',NULL,'Back\\StoresController',NULL,1,1,'2018-02-28 00:47:27','2018-03-10 02:25:31');
INSERT INTO `data_types` VALUES (30,'store_photos','store-photos','Store Photo','Store Photos','icon far fa-images','App\\Models\\StorePhoto',NULL,'Back\\StorePhotosController',NULL,1,1,'2018-03-07 21:25:16','2018-03-08 06:38:18');
INSERT INTO `data_types` VALUES (31,'installers','installers','Installer','Installers','fas fa-wrench','App\\Models\\Installer',NULL,'Back\\InstallersController',NULL,1,1,'2018-03-23 07:41:02','2018-03-23 20:23:59');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-30 16:23:50
