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
INSERT INTO `admin` VALUES (6,'admin','e10adc3949ba59abbe56e057f20f883e',1),(8,'root','e10adc3949ba59abbe56e057f20f883e',0),(9,'admin1','e10adc3949ba59abbe56e057f20f883e',0),(10,'new','e10adc3949ba59abbe56e057f20f883e',0);
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'浆果类',12),(2,'浆果类',11),(3,'柑橘类',11),(4,'柑橘类',12),(5,'核果类',11),(6,'核果类',12),(7,'仁果类',11),(8,'仁果类',12),(13,'瓜类',11),(10,'瓜类',12),(11,'其他',12),(12,'其他',11),(14,'已付款',0),(15,'热带水果',11),(16,'地中海水果',11);
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (6,5,1524152971,'546比特',16),(7,2,1524152971,'45v浮点数浮点数',18),(8,4,1524153134,'出差带着公司两万的戴尔太重了，所以一定要买苏菲，显示屏效果好，后背有点热，轻小，文字工作，一般工作沟通，资料整理，内存一般办公够用，软件装的多的建议256无后顾之忧，可是我没钱，买笔还要钱！办公室台式机256固态c盘剩余70g，不过东西是随便放的。扩展64g为了稳定，装qq等其它程序吧。另外人脸解锁非常快，接下来手机拍了几张图供大家欣赏！',20),(9,3,1524153134,'额挖去',19),(10,6,1525789223,'很好吃，质量比想象中的要好',19),(11,9,1527273898,'一共9个，只有一个软了其它都好，软的吃了很甜，非转基因吃得放心。',36),(12,9,1527273954,'一共9个，只有一个软了其它都好，软的吃了很甜，非转基因吃得放心。',36),(13,9,1527274196,'很好吃，会再次回购的',32),(14,9,1527274622,'质量非常好，与卖家描述的完全一致，到货速度非常快，商品完好无损，派件员态度很好非常满意 卖家的服务太棒了，考虑非常周到，完全超出期望值',36),(15,9,1527274622,'到手全是是水，包装暴力的一塌糊涂，卖家还说这正常，我也是无语了，味道有些奇怪，吃不惯',31),(16,9,1527274622,'吃了一年了没有以前的好，给装了几个坏的，气氛尴尬！',33),(17,10,1527275029,'很好吃，不过价格有点贵了',28),(18,10,1527275029,'不怎么样，贵就算了，还这么难吃',25),(19,10,1527275029,'都不新鲜了，不会回购了',31),(20,9,1527315866,'版仅用于',33),(21,9,1527315866,'该用户户未做评价',32),(22,9,1527318481,'好吃',33),(23,9,1527318481,'该用户户未做评价',37),(24,9,1527418382,'和想象中的一样好，还会再回购的',31),(25,9,1527418382,'不是很新鲜了',20),(26,9,1527418382,'该用户户未做评价',36);
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indent`
--

LOCK TABLES `indent` WRITE;
/*!40000 ALTER TABLE `indent` DISABLE KEYS */;
INSERT INTO `indent` VALUES (3,'7888788',3,232323,1,2,12,34,18),(4,'7888788',3,232323,1,2,7,45,20),(5,'15272521792135439399',9,1527252179,10,4,2,234,33),(6,'15272521792135439399',9,1527252179,10,4,2,32423,32),(7,'15272550531866863225',9,1527255053,7,8,1,21,36),(8,'15272550531866863225',9,1527255053,7,8,3,432,31),(9,'15272550531866863225',9,1527255053,7,8,3,234,33),(10,'15272575491818431763',9,1527257549,10,4,1,32423,32),(11,'15272749621285592830',10,1527274962,10,9,1,324,28),(12,'15272749621285592830',10,1527274962,10,9,1,56,25),(13,'15272749621285592830',10,1527274962,10,9,1,432,31),(14,'15272986461443423801',9,1527298646,9,4,2,432,31),(15,'15272986461443423801',9,1527298646,9,4,2,21,30),(16,'1527315805518909876',15,1527315805,8,10,1,432,31),(17,'15273184361412683882',9,1527318436,10,4,2,234,33),(18,'15273184361412683882',9,1527318436,10,4,1,12,37),(19,'1527418313427819069',9,1527418313,10,8,1,432,31),(20,'1527418313427819069',9,1527418313,10,8,2,45,20),(21,'1527418313427819069',9,1527418313,10,8,1,21,36);
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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (21,'红樱桃','1524371937440015237.jpg',12,12,2,0,'很哈'),(17,'猕猴桃','1524227250517065090.jpg',34,21312,12,1,''),(16,'甜橙','15242272271917762327.jpg',23,212214,4,1,''),(27,'sdaf','15243946271828170389.jpg',0,24,8,1,''),(19,'蓝莓','15242273061796126119.jpg',56,345,2,1,''),(20,'草莓','1524227326152546773.jpg',45,211,1,1,''),(22,'柑橘','1524376055856701118.jpg',56,56,4,1,''),(23,'海南青苹果','1524376109615193084.jpg',345,35,6,1,''),(24,'毛桃','15243761361537579822.jpg',45,45,5,1,''),(25,'牛油果','1524376156595313781.jpg',56,44,5,1,''),(26,'杨梅','15243762022088568884.jpg',34,34,2,1,''),(28,'柑橘','15243964391374242515.jpg',324,212,3,1,''),(29,'ewq','15243955771454339569.jpg',3441,34,3,1,''),(30,'321','1524395825598090058.jpg',21,19,3,1,''),(31,'34','15243958511696888871.jpg',432,333,3,1,''),(32,'3232','15243962541351265167.jpg',32423,31,3,1,''),(33,'324','15243962672116740392.jpg',234,427,3,1,''),(34,'dasf','1524397244689861260.jpg',0,0,3,1,''),(35,'432','1524397308316260876.jpg',324,435,3,0,''),(36,'毛桃','15244006001217889772.jpg',21,10,8,1,'来自保加利亚的高级毛桃'),(37,'苹果','15273160271897545664.jpg',12,33,1,1,''),(38,'甜橙','15274185901120509519.jpg',122,100,3,1,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'未接单'),(2,'已发货'),(4,'配送中'),(5,'已发货'),(6,'退货中'),(7,'已付款'),(8,'未发货'),(9,'已完成'),(10,'已评价');
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `touch`
--

LOCK TABLES `touch` WRITE;
/*!40000 ALTER TABLE `touch` DISABLE KEYS */;
INSERT INTO `touch` VALUES (1,'李航','杭州下沙','2321312','12321@163.com',4),(2,'王菲','北京','2321312','213123@123.com',3),(3,'KIKI','上海浦东','23124124','1231231@qq.com',2),(4,'李航','杭州江干区','1222222','',9),(9,'李涵','北京市朝阳区','21321321412','213213213@163.com',10),(8,'王宇','浙江省杭州市江干区浙江传媒学院生活区','17826837202','',9),(10,'李涵','杭州','13322344','',15);
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
  `img` varchar(100) NOT NULL DEFAULT '0b46f21fbe096b639324bc7506338744ebf8acd2.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'user1','202cb962ac59075b964b07152d234b70','0b46f21fbe096b639324bc7506338744ebf8acd2.jpg'),(3,'user2','202cb962ac59075b964b07152d234b70','0b46f21fbe096b639324bc7506338744ebf8acd2.jpg'),(4,'user4','202cb962ac59075b964b07152d234b70','15242272271917762327.jpg'),(5,'root','123456','15242272271917762327.jpg'),(6,'xvnb','2574c16fa2397eb23bdb85f15f924403','20151126112617vUaQf.jpeg'),(7,'twer','34123','15242272271917762327.jpg'),(8,'trwwyrty','e10adc3949ba59abbe56e057f20f883e','15242272271917762327.jpg'),(9,'928296545@qq.com','e10adc3949ba59abbe56e057f20f883e','0b46f21fbe096b639324bc7506338744ebf8acd2.jpg'),(10,'213213@7374.com','e10adc3949ba59abbe56e057f20f883e','tu20400_19.jpg'),(13,'34@22.com','202cb962ac59075b964b07152d234b70','15242272271917762327.jpg'),(14,'33@11.com','202cb962ac59075b964b07152d234b70','15242272271917762327.jpg'),(15,'17826837202@163.com','e10adc3949ba59abbe56e057f20f883e','0b46f21fbe096b639324bc7506338744ebf8acd2.jpg');
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

-- Dump completed on 2018-05-27 19:11:17
