-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: myshop
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `issuperadmin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (6,'admin','e10adc3949ba59abbe56e057f20f883e',1),(8,'root','e10adc3949ba59abbe56e057f20f883e',0),(9,'admin1','94e8038859a5c012ffeb49e91fd73d08',0),(10,'new','e10adc3949ba59abbe56e057f20f883e',0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advert`
--

DROP TABLE IF EXISTS `advert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `pos` tinyint(4) NOT NULL,
  `class_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advert`
--

LOCK TABLES `advert` WRITE;
/*!40000 ALTER TABLE `advert` DISABLE KEYS */;
INSERT INTO `advert` VALUES (1,'1524381334325241057.jpg','cfgs',0,12,7,'头部'),(2,'15243813411096730417.jpg','trysd',1,11,2,'底部'),(3,'15243855852046395405.jpg','3232',2,11,7,'头部'),(4,'15243855971251357777.jpg','234',3,11,7,'头部');
/*!40000 ALTER TABLE `advert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'浆果类',12),(2,'浆果类',11),(3,'柑橘类',11),(4,'柑橘类',12),(5,'核果类',11),(6,'核果类',12),(7,'仁果类',11),(8,'仁果类',12),(13,'瓜类',11),(10,'瓜类',12),(11,'其他',12),(12,'其他',11),(14,'已付款',0),(15,'热带水果',11);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (12,'国产水果'),(11,'进口水果');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text,
  `shop_id` int(11) NOT NULL,
  `nowtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (6,5,1524152971,'546比特',16,'2018-04-19 15:49:31'),(7,2,1524152971,'45v浮点数浮点数',18,'2018-04-19 15:49:31'),(8,4,1524153134,'出差带着公司两万的戴尔太重了，所以一定要买苏菲，显示屏效果好，后背有点热，轻小，文字工作，一般工作沟通，资料整理，内存一般办公够用，软件装的多的建议256无后顾之忧，可是我没钱，买笔还要钱！办公室台式机256固态c盘剩余70g，不过东西是随便放的。扩展64g为了稳定，装qq等其它程序吧。另外人脸解锁非常快，接下来手机拍了几张图供大家欣赏！',20,'2018-04-19 15:52:14'),(9,3,1524153134,'额挖去',19,'2018-04-19 15:52:14');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homeabroad`
--

DROP TABLE IF EXISTS `homeabroad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homeabroad` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homeabroad`
--

LOCK TABLES `homeabroad` WRITE;
/*!40000 ALTER TABLE `homeabroad` DISABLE KEYS */;
INSERT INTO `homeabroad` VALUES (0,'进口水果');
/*!40000 ALTER TABLE `homeabroad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indent`
--

DROP TABLE IF EXISTS `indent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '8',
  `touch_id` int(11) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indent`
--

LOCK TABLES `indent` WRITE;
/*!40000 ALTER TABLE `indent` DISABLE KEYS */;
INSERT INTO `indent` VALUES (3,'7888788',3,232323,2,2,12,34,18),(4,'7888788',3,232323,2,2,7,45,20);
/*!40000 ALTER TABLE `indent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `littleadvert`
--

DROP TABLE IF EXISTS `littleadvert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `littleadvert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `option` int(10) NOT NULL,
  `content` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `littleadvert`
--

LOCK TABLES `littleadvert` WRITE;
/*!40000 ALTER TABLE `littleadvert` DISABLE KEYS */;
INSERT INTO `littleadvert` VALUES (15,'4352',0,'fdsd','15243871311404202615.jpg'),(16,'3435',1,'twttr','15243713722072134379.jpg'),(17,'4325345435',2,'最新鲜不过','1524387687539917490.jpg');
/*!40000 ALTER TABLE `littleadvert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `shelf` tinyint(4) NOT NULL DEFAULT '1',
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (21,'红樱桃','1524371937440015237.jpg',12,12,2,1,''),(17,'猕猴桃','1524227250517065090.jpg',34,21312,12,1,''),(16,'甜橙','15242272271917762327.jpg',23,212214,4,1,''),(27,'sdaf','15243946271828170389.jpg',0,24,8,1,''),(19,'蓝莓','15242273061796126119.jpg',56,345,2,1,''),(20,'草莓','1524227326152546773.jpg',45,213,1,1,''),(22,'柑橘','1524376055856701118.jpg',56,56,4,1,''),(23,'海南青苹果','1524376109615193084.jpg',345,35,6,1,''),(24,'毛桃','15243761361537579822.jpg',45,45,5,1,''),(25,'牛油果','1524376156595313781.jpg',56,45,5,1,''),(26,'杨梅','15243762022088568884.jpg',34,34,2,1,''),(28,'柑橘','15243964391374242515.jpg',324,213,3,1,''),(29,'ewq','15243955771454339569.jpg',3441,34,3,1,''),(30,'321','1524395825598090058.jpg',21,21,3,1,''),(31,'34','15243958511696888871.jpg',432,341,3,1,''),(32,'3232','15243962541351265167.jpg',32423,32,3,1,''),(33,'324','15243962672116740392.jpg',234,432,3,1,''),(34,'dasf','1524397244689861260.jpg',0,0,3,1,''),(35,'432','1524397308316260876.jpg',324,435,3,0,''),(36,'毛桃','15244006001217889772.jpg',21,12,8,1,'来自保加利亚的高级毛桃');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'未接单'),(2,'已发货'),(4,'配送中'),(5,'已发货'),(6,'退货中'),(7,'已付款'),(8,'未发货');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `touch`
--

DROP TABLE IF EXISTS `touch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `touch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `touch`
--

LOCK TABLES `touch` WRITE;
/*!40000 ALTER TABLE `touch` DISABLE KEYS */;
INSERT INTO `touch` VALUES (1,'李航','杭州下沙','2321312','12321@163.com',4),(2,'王菲','北京','2321312','213123@123.com',3),(3,'KIKI','上海浦东','23124124','1231231@qq.com',2);
/*!40000 ALTER TABLE `touch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'user1','202cb962ac59075b964b07152d234b70','15242272271917762327.jpg'),(3,'user2','202cb962ac59075b964b07152d234b70','15242272271917762327.jpg'),(4,'user4','202cb962ac59075b964b07152d234b70','15242272271917762327.jpg'),(5,'root','123456','15242272271917762327.jpg'),(6,'xvnb','2574c16fa2397eb23bdb85f15f924403','15242272271917762327.jpg'),(7,'twer','34123','15242272271917762327.jpg'),(8,'trwwyrty','e10adc3949ba59abbe56e057f20f883e','15242272271917762327.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wenzi`
--

DROP TABLE IF EXISTS `wenzi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wenzi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `option` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wenzi`
--

LOCK TABLES `wenzi` WRITE;
/*!40000 ALTER TABLE `wenzi` DISABLE KEYS */;
INSERT INTO `wenzi` VALUES (3,'fd',1),(4,'大发啊',2),(5,'任务分担',3);
/*!40000 ALTER TABLE `wenzi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-26 17:40:51
