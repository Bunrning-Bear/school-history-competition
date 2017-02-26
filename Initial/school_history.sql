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
set character set utf8;
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
INSERT INTO `xs_questions` VALUES 
(1,'A','东南大学在明清时曾是什么机构的原址？','理藩院','枢密院','内阁','国子监',1),
(2,'B','东南大学从创办至今总共更换了几次学校名称？','8','9','10','11',1),
(3,'A','三江师范的创始人是谁？','张之洞','张百熙','李鸿章','梁启超',1),
(4,'D','三江师范时期哪一个省的学生是不能入学的？','江苏','江西','安徽','浙江',1),
(5,'D','三江师范时期的速成科学制是几年？','1','2','3','4',1),
(6,'C','东南大学始创于哪一年？','1901','1902','1903','1904',1),
(7,'C','三江、两江师范的教员主要来自中国和哪一国？','英国','美国','日本','法国',1),
(8,'A','两江优级师范学堂曾于哪年停办过？','1911','1912','1912','1914',1),
(9,'B','东南大学的梅庵是为纪念哪位人物而兴建的？','张之洞','李瑞清','蔡元培','周馥',1),
(10,'B','学校更名为南京高等师范学校是在哪一年？','1902 ','1915','1925','1988',1),
(11,'A','三江师范时期的速成科学制是1年',NULL,NULL,NULL,NULL,0),
(12,'B','高等师范学校继三所师范学校成为我国成立的最早的第四所国立高等师范学校，其中不是这三所学校之一的是武昌高师。',NULL,NULL,NULL,NULL,0),
(13,'B','1918年教育部任命郭秉文为我校校长.',NULL,NULL,NULL,NULL,0),
(14,'B','我校《东南大学报( 自然科学版 )》获得中国百种杰出学术期刊。',NULL,NULL,NULL,NULL,0),
(15,'A','南京高等师范学校的办学方针是崇尚共 和，融合中西。',NULL,NULL,NULL,NULL,0),
(16,'A','在20年代的东南大学的办学指导思想上学生自治不是郭秉文校长主张的',NULL,NULL,NULL,NULL,0),
(17,'B','梅庵因纪念李瑞清而得名',NULL,NULL,NULL,NULL,0),
(18,'A','东大的发展过程中出现过易长风潮，使得东大由盛而衰。此次风潮发生在20年代中期。',NULL,NULL,NULL,NULL,0),
(19,'B','1927年7月大学院决定将包括东大在内的一共7所高校共同组建成为国立第四中山大学。',NULL,NULL,NULL,NULL,0),
(20,'A','中央大学内迁重庆后，1938年10月王若飞曾到校演讲抗战形势，是当时引起轰动的大事。',NULL,NULL,NULL,NULL,0),
(21,'B','下面哪一项不是南京高等师范学院的校风？','诚朴','善问','勤奋','求实',1),
(22,'C','五四运动后南京高等师范学院受到深刻影响，下面哪一项不是师生共同要求的办学理念？','实行民主治校','推行民主管理','严谨治学','提倡科学',1),
(23,'C','被誉为“南雍祭酒，纯粹君子”的哪位校长？','江谦','李瑞清','郭秉文','刘伯明',1),
(24,'D','在南京高等师范学院管理上和民主生活上一个进步中没有的一项是？','推行民主体制','实行教师议政','提倡生活简朴','学生“自动自治”',1),
(25,'D','南京高等师范学院对领导体制作了较大改革，实行校长领导下的“三会制”，下面哪一项不属于“三会”其中之一？','学生会','评议会','教授会','行政委员会',1),
(26,'C','哪一年由中国留美学生组织的“科学社”自美迁回中国并设在南京高等师范学院校园内？','1901','1902','1903','1904',1),
(27,'C','三江、两江师范的教员主要来自中国和哪一国？','英国','美国','日本','法国',1),
(28,'A','两江优级师范学堂曾于哪年停办过？','1916 ','1917 ','1912','1914',1),
(29,'B','下面哪一项不是南京高等师范学院办学者的宗旨（南京高等师范学院教育的特色）？','倡导学生的爱国精神，为国家培养科学人才','调和文理，沟通中西，积极引进国外的先进科学技术','用科学的精神办教育，用科学的方法育才','用科学的精神办教育，用科学的方法育才',1),
(30,'B','江谦任校长倡导的校风是什么？','简朴，勤奋  ','诚实，朴茂 ','诚朴，勤奋，求实','严谨治学，止于至善',1),
(31,'A','2001年2月12日，教育部和南京市人民政府在南京签署协议，决定共同重点建设东南大学。',NULL,NULL,NULL,NULL,0),
(32,'B','高等师范学校继三所师范学校成为我国成立的最早的第四所国立高等师范学校，其中不是这三所学校之一的是武昌高师。',NULL,NULL,NULL,NULL,0),
(33,'B',' 自1956年始，南工有三个专业开始招收研究生，工业热能学、农业机械、粮食储藏及加工工艺。 ',NULL,NULL,NULL,NULL,0),
(34,'B','.1995年10月我校顺利通过了国家教委和江苏省人民政府共同组织的“211工程”部门预审',NULL,NULL,NULL,NULL,0),
(35,'A','我校在80年代理科方面增设了软件工程专业。 ',NULL,NULL,NULL,NULL,0),
(36,'A','1987年，我校和南京医学院签订了两校教学科研合作协议',NULL,NULL,NULL,NULL,0),
(37,'B','1990年9月28日，东南大学的文学院和吴健雄学院正式成立。',NULL,NULL,NULL,NULL,0),
(38,'A','反专政不是我校于1956年一月到四月开展的三反运动。(',NULL,NULL,NULL,NULL,0),
(39,'B','南京高等师范学院不是东南大学曾经的校名。',NULL,NULL,NULL,NULL,0),
(40,'A','“止于至善”( 出于《中庸》 )的校训是由郭秉文校长首先提出的。',NULL,NULL,NULL,NULL,0)
;
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
  `time` float(19) NOT NULL DEFAULT '-1',
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
INSERT INTO `xs_user` VALUES 
('71114223','213141330',1,-1,'9_4_2_12_19_14_18_17_16_20_13_11_15_','BDBBBBABAABAA',-1),
('71114224','213141331',2,-1,'9_4_2_12_19_14_18_17_16_20_13_11_15_','BDBBBBABAABAA',-1);
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
