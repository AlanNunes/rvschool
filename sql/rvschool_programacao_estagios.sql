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
-- Table structure for table `programacao_estagios`
--

DROP TABLE IF EXISTS `programacao_estagios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programacao_estagios` (
  `IdProgramacao_Estagio` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `PaginaInicial` int(11) NOT NULL,
  `PaginaFinal` int(11) NOT NULL,
  `IdEstagio` int(11) NOT NULL,
  PRIMARY KEY (`IdProgramacao_Estagio`),
  KEY `IdEstagio_Programacao_Estagios_idx` (`IdEstagio`),
  CONSTRAINT `IdEstagio_Programacao_Estagios` FOREIGN KEY (`IdEstagio`) REFERENCES `estagios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programacao_estagios`
--

LOCK TABLES `programacao_estagios` WRITE;
/*!40000 ALTER TABLE `programacao_estagios` DISABLE KEYS */;
INSERT INTO `programacao_estagios` VALUES (1,1,1,3,2),(2,2,4,6,2),(3,3,7,9,2),(4,4,10,12,2),(5,5,13,15,2),(6,6,16,18,2),(7,7,19,21,2),(8,8,22,24,2),(9,9,25,27,2),(10,10,28,30,2),(11,11,31,33,2),(12,12,34,36,2),(13,13,37,39,2),(14,14,40,42,2),(15,15,43,45,2),(16,16,46,48,2),(17,17,49,50,2),(18,18,51,52,2),(19,1,53,55,3),(20,2,56,58,3),(21,3,59,61,3),(22,4,62,64,3),(23,5,65,67,3),(24,6,68,70,3),(25,7,71,73,3),(26,8,74,76,3),(27,9,77,79,3),(28,10,80,82,3),(29,11,83,85,3),(30,12,86,88,3),(31,13,89,91,3),(32,14,92,94,3),(33,15,95,97,3),(34,16,98,101,3),(35,17,102,104,3),(36,18,105,107,3),(37,19,108,110,3),(38,20,111,113,3),(39,21,114,116,3),(40,22,117,119,3),(41,23,120,123,3),(42,24,124,126,3),(43,25,127,128,3);
/*!40000 ALTER TABLE `programacao_estagios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-04 22:22:56
