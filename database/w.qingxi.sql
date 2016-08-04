-- MySQL dump 10.13  Distrib 5.5.24, for Win64 (x86)
--
-- Host: localhost    Database: w_qingxi
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `admin_category`
--

DROP TABLE IF EXISTS `admin_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_category`
--

LOCK TABLES `admin_category` WRITE;
/*!40000 ALTER TABLE `admin_category` DISABLE KEYS */;
INSERT INTO `admin_category` VALUES (1,'后台用户',2),(2,'周边其他',3),(3,'系统设置',5),(4,'咨询速递',1),(5,'相关报告',4);
/*!40000 ALTER TABLE `admin_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_item`
--

DROP TABLE IF EXISTS `admin_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_category_id` int(11) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `module` varchar(500) DEFAULT NULL,
  `is_enabled` tinyint(1) DEFAULT '1',
  `position` int(11) DEFAULT NULL,
  `is_show_message` tinyint(4) DEFAULT NULL,
  `get_message_action` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_category_id` (`admin_category_id`),
  CONSTRAINT `admin_item_fk` FOREIGN KEY (`admin_category_id`) REFERENCES `admin_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_item`
--

LOCK TABLES `admin_item` WRITE;
/*!40000 ALTER TABLE `admin_item` DISABLE KEYS */;
INSERT INTO `admin_item` VALUES (3,2,'幻灯片','/admin.php/slideshow_item','g_25','slideshow_item',1,NULL,NULL,NULL),(4,3,'系统设置','/admin.php/setting_general','g_29','setting_general',1,NULL,NULL,NULL),(19,1,'后台用户组','/admin.php/admin_user_group','g_13','admin_user_group',1,NULL,NULL,NULL),(20,1,'后台用户','/admin.php/admin_user','g_01','admin_user',1,NULL,NULL,NULL),(22,4,'规则制度','/admin.php/regulation','g_11','regulation',1,NULL,NULL,NULL),(23,4,'信息中心','/admin.php/information','g_11','information',1,NULL,NULL,NULL),(32,3,'黑名单','/admin.php/blacklist','g_0','blacklist',1,NULL,NULL,NULL),(33,5,'后台登录报告','/admin.php/report_admin_user_login','g_19','report_admin_user_login',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_item_admin_user_group_access`
--

DROP TABLE IF EXISTS `admin_item_admin_user_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_item_admin_user_group_access` (
  `admin_item_id` int(11) NOT NULL,
  `admin_user_group_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_item_id`,`admin_user_group_id`),
  KEY `admin_item_id` (`admin_item_id`),
  KEY `admin_user_group_id` (`admin_user_group_id`),
  CONSTRAINT `admin_item_admin_user_group_access_edit_fk1` FOREIGN KEY (`admin_user_group_id`) REFERENCES `admin_user_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_item_admin_user_group_fk` FOREIGN KEY (`admin_item_id`) REFERENCES `admin_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_item_admin_user_group_access`
--

LOCK TABLES `admin_item_admin_user_group_access` WRITE;
/*!40000 ALTER TABLE `admin_item_admin_user_group_access` DISABLE KEYS */;
INSERT INTO `admin_item_admin_user_group_access` VALUES (3,3,1429854697),(23,3,1429854697);
/*!40000 ALTER TABLE `admin_item_admin_user_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_group_id` int(11) DEFAULT NULL COMMENT '用户组',
  `username` varchar(255) NOT NULL COMMENT '用户名/员工编号',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `email` varchar(255) DEFAULT NULL,
  `phone_mobile` varchar(255) DEFAULT NULL COMMENT '手机',
  `nickname` varchar(255) DEFAULT NULL COMMENT '和user.nickname一起非空unqiue,代码层验证,期友圈发帖需要',
  `is_enabled` tinyint(4) DEFAULT '1' COMMENT '1=启用，null=禁用',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `admin_user_group_id` (`admin_user_group_id`),
  CONSTRAINT `admin_user_fk_1` FOREIGN KEY (`admin_user_group_id`) REFERENCES `admin_user_group` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,1,'admin','5f4dcc3b5aa765d61d8327deb882cf99','超级管理员','admin@info.com',NULL,NULL,1,NULL,NULL),(3,3,'test','5f4dcc3b5aa765d61d8327deb882cf99','test123','test@info.com',NULL,NULL,1,1428395584,1428395584);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user_group`
--

DROP TABLE IF EXISTS `admin_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_super_admin` tinyint(4) DEFAULT NULL COMMENT '1=true,null=false',
  `is_fixed` tinyint(4) DEFAULT NULL COMMENT '1=true,null=false',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user_group`
--

LOCK TABLES `admin_user_group` WRITE;
/*!40000 ALTER TABLE `admin_user_group` DISABLE KEYS */;
INSERT INTO `admin_user_group` VALUES (1,'超级管理员',1,1,1428393015,1428394931),(3,'默认用户组',NULL,NULL,1428395541,1428395541);
/*!40000 ALTER TABLE `admin_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app`
--

DROP TABLE IF EXISTS `app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sf_app` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app`
--

LOCK TABLES `app` WRITE;
/*!40000 ALTER TABLE `app` DISABLE KEYS */;
INSERT INTO `app` VALUES (1,'backend','Admin'),(2,'frontend','Frontend'),(3,'user','User');
/*!40000 ALTER TABLE `app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blacklist`
--

DROP TABLE IF EXISTS `blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blacklist`
--

LOCK TABLES `blacklist` WRITE;
/*!40000 ALTER TABLE `blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `box_type`
--

DROP TABLE IF EXISTS `box_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `box_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `box_type`
--

LOCK TABLES `box_type` WRITE;
/*!40000 ALTER TABLE `box_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `box_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogue` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(4) DEFAULT NULL COMMENT '1 frontend message, 2 backend admin',
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `source_lang` varchar(100) NOT NULL DEFAULT '',
  `target_lang` varchar(100) NOT NULL DEFAULT '',
  `date_created` int(11) NOT NULL DEFAULT '0',
  `date_modified` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogue`
--

LOCK TABLES `catalogue` WRITE;
/*!40000 ALTER TABLE `catalogue` DISABLE KEYS */;
INSERT INTO `catalogue` VALUES (1,1,'messages.en','English - 前台','zh-cn','en',0,0,''),(2,NULL,'messages','简体中文 - 前台','zh-cn','zh-cn',0,0,''),(3,1,'messages.zh-cn','简体中文 - 前台','en','zh-cn',0,0,''),(5,2,'sf_admin.zh-cn','简体中文 - 后台','en','zh-cn',0,0,''),(6,2,'sf_admin.en','English - 后台','zh-cn','en',0,0,''),(7,NULL,'sf_admin','简体中文 - 后台','zh-cn','zh-cn',0,0,'');
/*!40000 ALTER TABLE `catalogue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'db_version','0'),(2,'release_db_version',NULL);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_box`
--

DROP TABLE IF EXISTS `image_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `image_src` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `box_type_id` (`box_type_id`),
  CONSTRAINT `image_box_fk1` FOREIGN KEY (`box_type_id`) REFERENCES `box_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_box`
--

LOCK TABLES `image_box` WRITE;
/*!40000 ALTER TABLE `image_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_category_id` int(11) DEFAULT NULL COMMENT '信息类别',
  `created_by_admin_user_id` int(11) DEFAULT NULL COMMENT '后台创建用户',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `release_date` date DEFAULT NULL COMMENT '发布时间',
  `image` varchar(255) DEFAULT NULL,
  `summary` text COMMENT '摘要',
  `body` text,
  `is_enable` int(11) DEFAULT '1' COMMENT '1="可见" null="隐藏"',
  `position` int(11) DEFAULT NULL COMMENT '权重排序',
  `page_view` int(11) DEFAULT NULL,
  `seo_keywords` text,
  `seo_description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_admin_user_id` (`created_by_admin_user_id`),
  KEY `information_category_id` (`information_category_id`),
  CONSTRAINT `information_fk1` FOREIGN KEY (`information_category_id`) REFERENCES `information_category` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `information_fk` FOREIGN KEY (`created_by_admin_user_id`) REFERENCES `admin_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information`
--

LOCK TABLES `information` WRITE;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
/*!40000 ALTER TABLE `information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `information_category`
--

DROP TABLE IF EXISTS `information_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `information_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information_category`
--

LOCK TABLES `information_category` WRITE;
/*!40000 ALTER TABLE `information_category` DISABLE KEYS */;
INSERT INTO `information_category` VALUES (1,'青西大宗公告'),(2,'青西大宗动态'),(3,'会员动态'),(4,'行业动态');
/*!40000 ALTER TABLE `information_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_event_id` int(11) DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL COMMENT '来源app',
  `description` varchar(500) DEFAULT NULL,
  `parameters` mediumtext COMMENT '参数 json格式 部分特殊log_event需要',
  `ip` varchar(255) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `created_by_admin_user_id` int(11) DEFAULT NULL COMMENT '创建者后台用户',
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_event_id` (`log_event_id`),
  KEY `admin_user_id` (`created_by_admin_user_id`),
  KEY `app_id` (`app_id`),
  CONSTRAINT `log_fk` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `log_fk7` FOREIGN KEY (`log_event_id`) REFERENCES `log_event` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `log_fk8` FOREIGN KEY (`created_by_admin_user_id`) REFERENCES `admin_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428394553),(2,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428395127),(3,1,1,'登录成功, 登录名/员工编号 [test], 姓名 [test]','','127.0.0.1',3,3,1428395595),(4,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428396782),(5,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428455745),(6,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428463303),(7,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428463308),(8,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428463310),(9,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428463312),(10,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428463335),(11,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428463340),(12,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428464236),(13,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428470793),(14,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428480004),(15,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428484868),(16,2,1,'后台用户登录失败，登录名：','','127.0.0.1',NULL,NULL,1428484870),(17,2,1,'后台用户登录失败，登录名：','','127.0.0.1',NULL,NULL,1428484871),(18,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428484883),(19,2,1,'后台用户登录失败，登录名：admin','','127.0.0.1',NULL,NULL,1428484893),(20,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428484907),(21,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428485054),(22,2,1,'后台用户登录失败，登录名：','','127.0.0.1',NULL,NULL,1428485096),(23,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428485100),(24,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428541997),(25,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428543826),(26,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428544062),(27,1,1,'登录成功, 登录名/员工编号 [test], 姓名 [test]','','127.0.0.1',3,3,1428544178),(28,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428545967),(29,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428546750),(30,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428549847),(31,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428560820),(32,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428630890),(33,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428631730),(34,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428657949),(35,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428886200),(36,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428898644),(37,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428911684),(38,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428975122),(39,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428975324),(40,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',2,1,1428992371),(41,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429002404),(42,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429006117),(43,1,1,'登录成功, 登录名/员工编号 [test], 姓名 [test]','','127.0.0.1',3,3,1429006662),(44,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429060988),(45,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.90.2',1,1,1429068969),(46,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.7',1,1,1429092424),(47,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.7',1,1,1429151263),(48,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429169335),(49,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429169714),(50,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429169784),(51,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429233980),(52,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429250656),(53,1,1,'登录成功, 登录名/员工编号 [test], 姓名 [test123]','','127.0.0.1',3,3,1429259593),(54,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429492535),(55,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429496935),(56,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429510981),(57,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429514333),(58,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429580361),(59,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429582531),(60,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429591675),(61,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429612684),(62,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429665134),(63,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429753116),(64,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.40',1,1,1429771722),(65,1,1,'登录成功, 登录名/员工编号 [test], 姓名 [test123]','','127.0.0.1',3,3,1429854719),(66,2,1,'后台用户登录失败，登录名：admin','','192.168.20.40',NULL,NULL,1429869672),(67,2,1,'后台用户登录失败，登录名：admin','','192.168.20.40',NULL,NULL,1429869674),(68,2,1,'后台用户登录失败，登录名：admin','','192.168.20.40',NULL,NULL,1429869676),(69,1,1,'登录成功, 登录名/员工编号 [test], 姓名 [test123]','','127.0.0.1',3,3,1429875266),(70,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.40',1,1,1429934165),(71,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429936838),(72,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429943920),(73,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1429945923),(74,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430024156),(75,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430097860),(76,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.40',1,1,1430099311),(77,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.40',1,1,1430121813),(78,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430185405),(79,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430201921),(80,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','192.168.20.40',1,1,1430201983),(81,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430270989),(82,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430736595),(83,3,1,'注销成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430798043),(84,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1430798050),(85,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1470104550),(86,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1470187806),(87,1,1,'登录成功, 登录名/员工编号 [admin], 姓名 [超级管理员]','','127.0.0.1',1,1,1470278232);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_event`
--

DROP TABLE IF EXISTS `log_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(500) DEFAULT NULL COMMENT 'update,delete,etc...',
  `display_action` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_event`
--

LOCK TABLES `log_event` WRITE;
/*!40000 ALTER TABLE `log_event` DISABLE KEYS */;
INSERT INTO `log_event` VALUES (1,'login success','登录成功'),(2,'login failed','登陆失败'),(3,'logout success','注销成功');
/*!40000 ALTER TABLE `log_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_message`
--

DROP TABLE IF EXISTS `mail_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longblob NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_message`
--

LOCK TABLES `mail_message` WRITE;
/*!40000 ALTER TABLE `mail_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_short` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'北京市','京','北京'),(2,'天津市','津','天津'),(3,'上海市','沪','上海'),(4,'重庆市','渝','重庆'),(5,'河北省','冀','石家庄'),(6,'山西省','晋','太原'),(7,'台湾省','台','台北'),(8,'辽宁省','辽','沈阳'),(9,'吉林省','吉','长春'),(10,'黑龙江省','黑','哈尔滨'),(11,'江苏省','苏','南京'),(12,'浙江省','浙','杭州'),(13,'安徽省','皖','合肥'),(14,'福建省','闽','福州'),(15,'江西省','赣','南昌'),(16,'山东省','鲁','济南'),(17,'河南省','豫','郑州'),(18,'湖北省','鄂','武汉'),(19,'湖南省','湘','长沙'),(20,'广东省','粤','广州'),(21,'甘肃省','甘','兰州'),(22,'四川省','川','城都'),(23,'贵州省','黔','贵阳'),(24,'海南省','琼','海口'),(25,'云南省','滇','昆明'),(26,'青海省','青','西宁'),(27,'陕西省','陕','西安'),(28,'广西壮族自治区','桂','南宁'),(29,'西藏自治区','藏','拉萨'),(30,'宁夏回族自治区','宁','银川'),(31,'新疆维吾尔自治区','新','乌鲁木齐'),(32,'内蒙古自治区','蒙','呼和浩特'),(33,'澳门特别行政区','澳','澳门'),(34,'香港特别行政区','港','香港'),(35,'上海',NULL,NULL),(36,'广西省',NULL,NULL),(37,'深圳市',NULL,NULL),(38,'吉林',NULL,NULL);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regulation`
--

DROP TABLE IF EXISTS `regulation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regulation_category_id` int(11) DEFAULT NULL COMMENT '规则制度类别',
  `created_by_admin_user_id` int(11) DEFAULT NULL COMMENT '后台创建用户',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `release_date` date DEFAULT NULL COMMENT '发布时间',
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `summary` text COMMENT '摘要',
  `body` text COMMENT '规则正文',
  `is_enable` int(11) DEFAULT '1' COMMENT '1="开启" null="禁用"',
  `position` int(11) DEFAULT NULL COMMENT '排序权重',
  `page_view` int(11) DEFAULT '0',
  `seo_keywords` text,
  `seo_description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_admin_user_id` (`created_by_admin_user_id`),
  KEY `regulation_category_id` (`regulation_category_id`),
  CONSTRAINT `regulation_fk` FOREIGN KEY (`created_by_admin_user_id`) REFERENCES `admin_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `regulation_fk1` FOREIGN KEY (`regulation_category_id`) REFERENCES `regulation_category` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regulation`
--

LOCK TABLES `regulation` WRITE;
/*!40000 ALTER TABLE `regulation` DISABLE KEYS */;
INSERT INTO `regulation` VALUES (1,1,1,'sadfa','2016-08-03',NULL,'sadfasdf','sadfsf',1,1,0,NULL,NULL,1470208962,1470208962),(2,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-04',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<div class=\"content\">\r\n	<div>\r\n		<div>\r\n			<p>\r\n				按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。\r\n			</p>\r\n			<p>\r\n				汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，\r\n“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。\r\n			</p>\r\n			<p>\r\n				中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。\r\n			</p>\r\n			<p>\r\n				值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。\r\n			</p>\r\n			<p>\r\n				近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积\r\n极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。\r\n			</p>\r\n			<p>\r\n				九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，\r\n赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发\r\n展。\r\n			</p>\r\n			<p>\r\n				与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的\r\n品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参\r\n发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。\r\n			</p>\r\n			<p>\r\n				有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农\r\n业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基\r\n础。\r\n			</p>\r\n		</div>\r\n	</div>\r\n</div>',1,2,7,NULL,NULL,1470278339,1470290755),(3,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-03',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,3,0,NULL,NULL,1470278499,1470278499),(4,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-02',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,4,0,NULL,NULL,1470278524,1470278524),(5,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-03',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,5,0,NULL,NULL,1470278549,1470278549),(6,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-04',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,6,0,NULL,NULL,1470278611,1470278611),(7,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-04',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,7,0,NULL,NULL,1470278632,1470278632),(8,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-04',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,8,0,NULL,NULL,1470278662,1470278662),(9,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-10',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,9,1,NULL,NULL,1470278792,1470291194),(10,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-03',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,10,0,NULL,NULL,1470278818,1470278818),(11,1,1,'国内猪肉价格与牛羊肉持平 国际多数大宗农产品价格下跌','2016-08-04',NULL,'按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。','<br />\r\n<br />\r\n按照惯例，2016年中央一号文件将于近日出炉。结合去年12月25日闭幕的中央农村工作会议关于“发展新理念加快农业现代化”的讨论，可以预计农业现代化仍将是2016年一号文件首要主题。<br />\r\n<br />\r\n汇总近期的经济政策信息来看，农业现代化将是未来一段时间农业政策的主要着力点；而随着国家及有关部门出台促进“互联网+”发展的政策措施进一步落地，“互联网+农业”思路下的农业电子商务、农业互联网金融等有望成为农业发展的新契机，互联网、农业、金融三者跨界融合发展的潜力将逐步释放。<br />\r\n<br />\r\n中国商业联合会副秘书长邓立也表示，产业跨界融合发展已成为新潮流。从农产品流通领域看，一方面产、供、销协同发展、纵向一体化趋势进一步加强，另一方面，“互联网+农业+金融”跨界融合发展、横向一体化也将逐步深入。<br />\r\n<br />\r\n值得一提的是，“互联网+农业+金融” 的横向一体化变革已经在产量低、价值高、投资空间大的野山参、茶叶等农产品领域轰轰烈烈的展开，为农业现代化探索出一条可供借鉴的路子。<br />\r\n<br />\r\n近日，九州商品挂牌发售“同参堂”野山参成为该模式成功落地的范例。自2016年1月20日正式启动野山参申购开始，此次发售吸引了众多投资者和消费者积极参与，市场反响热烈，充分证明了市场对野山参挂牌发售模式的高度认可与欢迎，也证明九州商品以金融创新，切实服务实体经济的战略规划正加快推进。<br />\r\n<br />\r\n九州产金挂牌发售模式，以互联网技术为依托，将金融要素引入农业发展的轨道中，实现了资源的最优化配置。该模式缩短了商品流通环节，加速了企业资金回笼，赋予了商品消费与投资双重属性，是对“产业金融化”的有力探索。聚焦野山参挂牌发售领域，将有利于激发野山参市场需求，推动野山参产业的转型升级和蓬勃发展。<br />\r\n<br />\r\n与其他同类平台不同，九州产金从野山参发售伊始，就确定走“高端”路线。平台上交易的野山参由百年老字号参企“同参堂”直接供货，从根本上保证了野山参的品质和价值。另外，此次发售的是存量稀少的二等二级野山参佳品，而不是市场上常见的三等及以下野山参，无论养生还是收藏、投资价值都更大。而且这些野山参发售价仅为199元/g，比同类产品的实体渠道零售价格及其他交易平台发行价格都要低，大大提升了增值空间。<br />\r\n<br />\r\n有分析认为，在政策红利下，未来十年是中国农业产业发展的“黄金期”。九州商品顺时应势，用互联网思维改造传统流通产业，通过先行先试，抢占“互联网+农业”发展的新蓝海，确保其在农业产业化发展的爆发式增长前，占据有利时机。而其在野山参挂牌发售方面的成功实践，为后期产业拓展方面的发力，奠定了坚实基础。<br />\r\n<br />',1,11,1,NULL,NULL,1470279043,1470291211);
/*!40000 ALTER TABLE `regulation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regulation_category`
--

DROP TABLE IF EXISTS `regulation_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regulation_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regulation_category`
--

LOCK TABLES `regulation_category` WRITE;
/*!40000 ALTER TABLE `regulation_category` DISABLE KEYS */;
INSERT INTO `regulation_category` VALUES (1,'挂牌流程'),(2,'申购流程'),(3,'交收流程'),(4,'托管流程'),(5,'补充细则');
/*!40000 ALTER TABLE `regulation_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` varchar(255) NOT NULL,
  `data` text,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES ('5krql1kkdisag657or2pb7mo26','clean_flag|s:12:\"beA6JouUzG7P\";symfony/user/sfUser/lastRequest|i:1470299969;symfony/user/sfUser/authenticated|b:1;symfony/user/sfUser/credentials|a:1:{i:0;s:5:\"admin\";}symfony/user/sfUser/attributes|a:3:{s:12:\"admin_module\";a:2:{s:15:\"regulation.sort\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"desc\";}s:16:\"information.sort\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"desc\";}}s:25:\"symfony/user/sfUser/flash\";a:0:{}s:32:\"symfony/user/sfUser/flash/remove\";a:0:{}}symfony/user/sfUser/culture|s:5:\"zh-cn\";valid_admin_user|i:1;',1470299970),('fl8dupj86n4juchur7hcprand2','clean_flag|s:12:\"beA6JouUzG7P\";symfony/user/sfUser/lastRequest|i:1470303237;symfony/user/sfUser/authenticated|b:0;symfony/user/sfUser/credentials|a:0:{}symfony/user/sfUser/attributes|a:3:{s:12:\"admin_module\";a:2:{s:15:\"regulation.sort\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"desc\";}s:16:\"information.sort\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"desc\";}}s:25:\"symfony/user/sfUser/flash\";a:0:{}s:32:\"symfony/user/sfUser/flash/remove\";a:0:{}}symfony/user/sfUser/culture|s:5:\"zh-cn\";valid_admin_user|i:1;',1470303237),('l3os97j11root5aiae4pfh5jo4','clean_flag|s:12:\"beA6JouUzG7P\";symfony/user/sfUser/lastRequest|i:1470291356;symfony/user/sfUser/authenticated|b:0;symfony/user/sfUser/credentials|a:0:{}symfony/user/sfUser/attributes|a:3:{s:12:\"admin_module\";a:1:{s:15:\"regulation.sort\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"desc\";}}s:25:\"symfony/user/sfUser/flash\";a:0:{}s:32:\"symfony/user/sfUser/flash/remove\";a:0:{}}symfony/user/sfUser/culture|s:5:\"zh-cn\";valid_admin_user|i:1;',1470291357);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting_general`
--

DROP TABLE IF EXISTS `setting_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_email_smtp_host` varchar(255) DEFAULT NULL,
  `system_email_smtp_port` int(11) DEFAULT NULL,
  `system_email_smtp_use_ssl` tinyint(4) DEFAULT NULL,
  `system_email_smtp_username` varchar(255) DEFAULT NULL,
  `system_email_smtp_password` varchar(255) DEFAULT NULL,
  `system_email_from_accout` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_meta_keywords` varchar(500) DEFAULT NULL,
  `seo_meta_description` varchar(500) DEFAULT NULL,
  `statistical_code` text COMMENT '站点统计代码使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting_general`
--

LOCK TABLES `setting_general` WRITE;
/*!40000 ALTER TABLE `setting_general` DISABLE KEYS */;
INSERT INTO `setting_general` VALUES (1,'',NULL,NULL,'admin','password','',NULL,'','','<script>\r\nvar _hmt = _hmt || [];\r\n(function() {\r\n  var hm = document.createElement(\"script\");\r\n  hm.src = \"//hm.baidu.com/hm.js?e97fa0d2571ddea0d3e4e27be4c0500d\";\r\n  var s = document.getElementsByTagName(\"script\")[0]; \r\n  s.parentNode.insertBefore(hm, s);\r\n})();\r\n</script>\r\n');
/*!40000 ALTER TABLE `setting_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshow`
--

DROP TABLE IF EXISTS `slideshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshow`
--

LOCK TABLES `slideshow` WRITE;
/*!40000 ALTER TABLE `slideshow` DISABLE KEYS */;
INSERT INTO `slideshow` VALUES (1,'首页幻灯',1920,410);
/*!40000 ALTER TABLE `slideshow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshow_item`
--

DROP TABLE IF EXISTS `slideshow_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slideshow_id` int(11) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `image_token` varchar(255) DEFAULT NULL,
  `description` text,
  `position` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slideshow_id` (`slideshow_id`),
  CONSTRAINT `slideshow_item_fk` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshow` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshow_item`
--

LOCK TABLES `slideshow_item` WRITE;
/*!40000 ALTER TABLE `slideshow_item` DISABLE KEYS */;
INSERT INTO `slideshow_item` VALUES (6,1,'主题','/other/live','','b7538d2abe77e67975710d6869cb8fd5.jpg',NULL,9,1429518877,1429698406),(7,1,'专家团队','/about/experts','','d8bccbfb69bca045793319a48b6d8c6b.jpg',NULL,8,1429518904,1430027614),(8,1,'非农策略','/special/strategy','','e222a49cd805d7aa7821f63389751cb4.jpg',NULL,7,1429518954,1430027632),(9,1,'石油','','','fcdf6cdf6a09fc1647346182ea85026d.jpg',NULL,6,1429518970,1429519006);
/*!40000 ALTER TABLE `slideshow_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_box`
--

DROP TABLE IF EXISTS `text_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `text_box_type_id` (`box_type_id`),
  CONSTRAINT `text_box_fk` FOREIGN KEY (`box_type_id`) REFERENCES `box_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_box`
--

LOCK TABLES `text_box` WRITE;
/*!40000 ALTER TABLE `text_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `text_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trans_unit`
--

DROP TABLE IF EXISTS `trans_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trans_unit` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL DEFAULT '1',
  `id` varchar(255) NOT NULL DEFAULT '',
  `source` text NOT NULL,
  `target` text NOT NULL,
  `comments` text,
  `date_added` int(11) NOT NULL DEFAULT '0',
  `date_modified` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) DEFAULT '',
  `translated` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`msg_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trans_unit`
--

LOCK TABLES `trans_unit` WRITE;
/*!40000 ALTER TABLE `trans_unit` DISABLE KEYS */;
INSERT INTO `trans_unit` VALUES (3,5,'3','Edit','编辑','',0,0,'',1),(4,5,'','Delete','删除','',0,0,'',1),(5,5,'','New','新建','',0,0,'',1),(7,5,'','Save','保存','',0,0,'',1),(8,5,'','Reset','重置','',0,0,'',1),(9,5,'','Filter','过滤','',0,0,'',1),(10,5,'','Actions','操作','',0,0,'',1),(11,5,'','Save and add','保存并继续添加','',0,0,'',1),(12,5,'','Choose an action','选择一个操作','',0,0,'',1),(13,5,'','go','确定','',0,0,'',1),(15,5,'','result','结果','',0,0,'',1),(16,5,'','No result','没有结果','',0,0,'',1),(17,5,'','page','页数','',0,0,'',1),(20,5,'','Title','标题','',0,0,'',1),(21,5,'','Body','内容','',0,0,'',1),(56,5,'','The item was created successfully.','内容创建成功。','',0,0,'',1),(57,5,'','The item was updated successfully.','内容已更新。','',0,0,'',1),(58,5,'','The item was deleted successfully.','内容已删除。','',0,0,'',1),(59,5,'','The item was created successfully. You can add another one below.','内容已创建，将继续创建新内容。','',0,0,'',1),(60,5,'','The item was updated successfully. You can add another one below.','内容已更新，将继续创建新内容。','',0,0,'',1),(61,5,'','You must at least select one item.','至少要选择一项。','',0,0,'',1),(62,5,'','You must select an action to execute on the selected items.','请选取一个针对该条目的操作。','',0,0,'',1),(63,5,'','A problem occurs when deleting the selected items as some items do not exist anymore.','不能删除不存在的条目。','',0,0,'',1),(64,5,'','The selected items have been deleted successfully.','选定的条目\"删除\"批处理成功。','',0,0,'',1),(65,5,'','A problem occurs when deleting the selected items.','在“删除”批处理过程中发生错误。','',0,0,'',1),(66,5,'','(page %%page%%/%%nb_pages%%)','(页码 %%page%%/%%nb_pages%%)','',0,0,'',1),(67,5,'','[0] no result|[1] 1 result|(1,+Inf] %1% results','[0] 没有结果|[1] 1 个结果|(1,+Inf] %1% 个结果','',0,0,'',1),(68,5,'','File is too large','文件太大','',0,0,'',1),(69,5,'','Server error. Upload directory isn\'t writable.','服务器错误，上传目录不可写。','',0,0,'',1),(70,5,'','No files were uploaded.','没有文件被上传。','',0,0,'',1),(71,5,'','File is empty','文件是空的。','',0,0,'',1),(72,5,'','Disallowed file type.','无效的文件类型。','',0,0,'',1),(73,5,'','Could not save uploaded file.The upload was cancelled, or server error encountered','不能保存上传的文件。上传被取消,或服务器遇到错误','',0,0,'',1),(74,5,'','remove the current file','移除当前文件','',0,0,'',1),(75,5,'','Position was update successfully.','位置更新成功。','',0,0,'',1),(77,5,'','Back to list','返回列表','',0,0,'',1),(78,5,'','The item has not been saved due to some errors.','有错误，内容保存失败。',' ',0,0,'',1),(79,5,'','Are you sure?','确认删除？',' ',0,0,'',1);
/*!40000 ALTER TABLE `trans_unit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-04 17:41:18
