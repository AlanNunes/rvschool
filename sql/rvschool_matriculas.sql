-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: rvschool
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `dataMatricula` date NOT NULL,
  `dataInicioAtividades` date NOT NULL,
  `numero` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  UNIQUE KEY `numero_2` (`numero`),
  UNIQUE KEY `numero_3` (`numero`),
  UNIQUE KEY `numero_4` (`numero`),
  UNIQUE KEY `numero_5` (`numero`),
  KEY `aluno` (`aluno`),
  KEY `turma` (`turma`),
  CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (1,22,3,'2018-05-13','2018-05-01','2018-1'),(2,1,3,'2018-05-13','2018-05-01','2018-2'),(3,1,4,'2018-05-13','2018-05-01','2018-3'),(4,1,2,'2018-05-13','2018-05-01','2018-4'),(5,22,4,'2018-05-13','2018-05-01','2018-5'),(6,2,4,'2018-05-13','2018-05-01','2018-6'),(7,1,3,'2018-05-13','2018-05-01','2018-7'),(8,3,3,'2018-05-13','2018-05-01','2018-8'),(9,3,2,'2018-05-13','2018-05-01','2018-9'),(10,3,2,'2018-05-13','2018-05-01','2018-10'),(11,1,4,'2018-05-13','2018-05-01','2018-11'),(12,1,2,'2018-05-13','2018-05-01','2018-12'),(13,3,3,'2018-05-13','2018-05-01','2018-13'),(14,3,2,'2018-05-13','2018-05-01','2018-14'),(15,1,3,'2018-05-13','2018-05-01','2018-15'),(16,1,2,'2018-05-13','2018-05-01','2018-16'),(17,2,2,'2018-05-13','2018-05-01','2018-17'),(18,2,3,'2018-05-13','2018-05-01','2018-18'),(19,2,3,'2018-05-13','2018-05-01','2018-19'),(20,3,4,'2018-05-13','2018-05-01','2018-20'),(21,1,4,'2018-05-13','2018-05-01','2018-21'),(22,2,3,'2018-05-13','2018-05-01','2018-22'),(23,3,2,'2018-05-13','2018-05-01','2018-23'),(24,3,4,'2018-05-13','2018-05-01','2018-24'),(25,3,4,'2018-05-13','2018-05-01','2018-25'),(26,3,4,'2018-05-13','2018-05-01','2018-26'),(27,1,3,'2018-05-13','2018-05-01','2018-27'),(28,1,3,'2018-05-13','2018-05-01','2018-28'),(29,12,4,'2018-05-16','2018-05-01','2018-29'),(30,1,3,'2018-05-16','2018-05-01','2018-30'),(31,12,2,'2018-05-16','2018-05-01','2018-31'),(32,1,3,'2018-05-17','2018-05-01','2018-32'),(33,3,4,'2018-05-17','2018-05-01','2018-33'),(34,2,2,'2018-05-17','2018-05-01','2018-34'),(35,9,3,'2018-05-25','2018-05-01','2018-35'),(36,12,2,'2018-05-30','2018-05-01','2018-36'),(37,12,2,'2018-05-30','2018-05-01','2018-37'),(38,12,2,'2018-05-30','2018-05-01','2018-38'),(39,1,4,'2018-06-08','2018-05-01','2018-39');
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-11  0:22:53
