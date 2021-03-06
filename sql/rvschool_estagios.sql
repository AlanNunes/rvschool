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
-- Table structure for table `estagios`
--

DROP TABLE IF EXISTS `estagios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estagios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `curso` int(11) NOT NULL,
  `IdLivro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`),
  KEY `IdLivro_idx` (`IdLivro`),
  CONSTRAINT `IdLivro` FOREIGN KEY (`IdLivro`) REFERENCES `livros` (`IdLivro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `estagios_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estagios`
--

LOCK TABLES `estagios` WRITE;
/*!40000 ALTER TABLE `estagios` DISABLE KEYS */;
INSERT INTO `estagios` VALUES (2,'Estágio 1',1,1),(3,'Estágio 2',1,2),(4,'Estágio 3',1,3),(5,'Estágio 4',1,4),(6,'Estágio 5',1,5),(7,'Estágio 6',1,6),(8,'Estágio 7',1,7),(9,'Estágio 8',1,8),(10,'Estágio 9',1,9),(11,'Estágio 10',1,10),(12,'Estágio 11',1,11),(13,'Estágio 12',1,12);
/*!40000 ALTER TABLE `estagios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-18  0:28:17
