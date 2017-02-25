-- MySQL dump 10.13  Distrib 5.6.26, for Win64 (x86_64)
--
-- Host: localhost    Database: school_history
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `xs_questions`
--

DROP TABLE IF EXISTS `xs_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xs_questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(1) NOT NULL,
  `question` varchar(256) NOT NULL,
  `a` varchar(256) DEFAULT NULL,
  `b` varchar(256) DEFAULT NULL,
  `c` varchar(256) DEFAULT NULL,
  `d` varchar(256) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xs_questions`
--

LOCK TABLES `xs_questions` WRITE;
/*!40000 ALTER TABLE `xs_questions` DISABLE KEYS */;
INSERT INTO `xs_questions` VALUES (1,'A','东南大学在明清时曾是什么机构的原址？','理藩院','枢密院','内阁','国子监',1),(2,'B','东南大学从创办至今总共更换了几次学校名称？','8','9','10','11',1),(3,'A','三江师范的创始人是谁？','张之洞','张百熙','李鸿章','梁启超',1),(4,'D','三江师范时期哪一个省的学生是不能入学的？','江苏','江西','安徽','浙江',1),(5,'D','三江师范时期的速成科学制是几年？','1','2','3','4',1),(6,'C','东南大学始创于哪一年？','1901','1902','1903','1904',1),(7,'C','三江、两江师范的教员主要来自中国和哪一国？','英国','美国','日本','法国',1),(8,'A','两江优级师范学堂曾于哪年停办过？','1911','1912','1912','1914',1),(9,'B','东南大学的梅庵是为纪念哪位人物而兴建的？','张之洞','李瑞清','蔡元培','周馥',1),(10,'B','学校更名为南京高等师范学校是在哪一年？','1902 ','1915','1925','1988',1),(11,'A','三江师范时期的速成科学制是1年',NULL,NULL,NULL,NULL,0),(12,'B','高等师范学校继三所师范学校成为我国成立的最早的第四所国立高等师范学校，其中不是这三所学校之一的是武昌高师。',NULL,NULL,NULL,NULL,0),(13,'B','1918年教育部任命郭秉文为我校校长.',NULL,NULL,NULL,NULL,0),(14,'B','我校《东南大学报( 自然科学版 )》获得中国百种杰出学术期刊。',NULL,NULL,NULL,NULL,0),(15,'A','南京高等师范学校的办学方针是崇尚共 和，融合中西。',NULL,NULL,NULL,NULL,0),(16,'A','在20年代的东南大学的办学指导思想上学生自治不是郭秉文校长主张的',NULL,NULL,NULL,NULL,0),(17,'B','梅庵因纪念李瑞清而得名',NULL,NULL,NULL,NULL,0),(18,'A','东大的发展过程中出现过易长风潮，使得东大由盛而衰。此次风潮发生在20年代中期。',NULL,NULL,NULL,NULL,0),(19,'B','1927年7月大学院决定将包括东大在内的一共7所高校共同组建成为国立第四中山大学。',NULL,NULL,NULL,NULL,0),(20,'A','中央大学内迁重庆后，1938年10月王若飞曾到校演讲抗战形势，是当时引起轰动的大事。',NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `xs_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xs_user`
--

DROP TABLE IF EXISTS `xs_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xs_user` (
  `xuehao` char(8) NOT NULL,
  `yikatong` char(9) NOT NULL,
  `stuid` int(12) NOT NULL AUTO_INCREMENT,
  `time` date NOT NULL,
  `qqueue` varchar(90) NOT NULL,
  `aqueue` varchar(90) NOT NULL,
  `mark` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`stuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xs_user`
--

LOCK TABLES `xs_user` WRITE;
/*!40000 ALTER TABLE `xs_user` DISABLE KEYS */;
INSERT INTO `xs_user` VALUES ('71114223','213141330',1,'2017-02-01','9_4_2_12_19_14_18_17_16_20_13_11_15_','BDBBBBABAABAA',0);
/*!40000 ALTER TABLE `xs_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-25 13:48:55
