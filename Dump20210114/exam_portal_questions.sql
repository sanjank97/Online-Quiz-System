-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: exam_portal
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` varchar(1000) DEFAULT NULL,
  `opa` varchar(500) DEFAULT NULL,
  `opb` varchar(500) DEFAULT NULL,
  `opc` varchar(500) DEFAULT NULL,
  `opd` varchar(500) DEFAULT NULL,
  `opcorrect` varchar(255) DEFAULT NULL,
  `sub_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'PHP stands ?','HyperText Preprocessor','Hyper Text Markup Language','Markup Language','None Of these','a','1'),(2,'What is JavaScript ?','Mathematics','Physics','Scripting Language','None Of These','c','2'),(4,'Which of the following is correct about PHP?','PHP can access cookies variables and set cookies.','Using PHP, you can restrict users to access some pages of your website','It can encrypt data.','All of the above.','d','1'),(5,'Which of the following is correct about variable naming rules?',' Variable names must begin with a letter or underscore character.','A variable name can consist of numbers, letters, underscores',' you cannot use characters like + , - , % , ( , ) . & , etc in a variable name.','All of the above.','d','1'),(6,'Which of the following magic constant of PHP returns current line number of the file?','_LINE_','_FILE_',' _FUNCTION_','_CLASS_','a','1'),(7,'- Which of the following operator is used to concatenate two strings?','.','+','append','None Of These','a','1'),(8,'Which of the following is correct about features of JavaScript?','JavaScript is is complementary to and integrated with HTML.',' JavaScript is open and cross-platform.','Both of the above.','All of the above','c','2'),(9,' Which of the following is the correct syntax to print a page using JavaScript?','window.print();',' browser.print();','navigator.print();','document.print();','a','2'),(14,'What is the HTML tag under which one can write the JavaScript code?','<javascript>',' <scripted>','<script>','<js>','c','2'),(16,' Choose the correct JavaScript syntax to change the content of the following HTML code.<p id=\"geek\">GeeksforGeeks</p> ',' document.getElement(â€œgeekâ€).innerHTML=â€I am a Geekâ€;',' document.getElementById(â€œgeekâ€).innerHTML=â€I am a Geekâ€;','document.getId(â€œgeekâ€)=â€I am a Geekâ€;','document.getElementById(â€œgeekâ€).innerHTML=I am a Geek;','b','2'),(17,' Who is known as the father of PHP?','Rasmus Lerdorf','Willam Makepiece','Drek Kolkevi','List Barely','a','1');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-14 18:04:55
