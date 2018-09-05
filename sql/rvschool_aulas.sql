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
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aulas` (
  `IdAula` int(11) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Numero` int(11) NOT NULL,
  `Pagina` int(11) DEFAULT NULL,
  `Conteudo` varchar(100) DEFAULT NULL,
  `Dictation` int(11) DEFAULT NULL,
  `Reading` int(11) DEFAULT NULL,
  `IdProgramacaoEstagio` int(11) NOT NULL,
  `Professor` int(11) DEFAULT NULL,
  `IdTurma` int(11) NOT NULL,
  PRIMARY KEY (`IdAula`),
  KEY `IdProgramacaoEstagio_idx` (`IdProgramacaoEstagio`),
  KEY `Pagina_idx` (`Pagina`),
  KEY `IdProfessor_idx` (`Professor`),
  KEY `IdTurma_idx` (`IdTurma`),
  CONSTRAINT `IdProfessor` FOREIGN KEY (`Professor`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `IdProgramacaoEstagio` FOREIGN KEY (`IdProgramacaoEstagio`) REFERENCES `programacao_estagios` (`IdProgramacao_Estagio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `IdTurma` FOREIGN KEY (`IdTurma`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Pagina` FOREIGN KEY (`Pagina`) REFERENCES `paginas` (`IdPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'2018-09-03',1,NULL,NULL,NULL,12,1,NULL,2),(2,'2018-09-04',2,NULL,NULL,NULL,NULL,2,NULL,2),(3,'2018-09-05',3,NULL,NULL,NULL,NULL,3,NULL,2),(4,'2018-09-06',4,NULL,NULL,NULL,NULL,4,NULL,2),(5,'2018-09-07',5,NULL,NULL,NULL,NULL,5,NULL,2),(6,'2018-09-10',6,NULL,NULL,NULL,NULL,6,NULL,2),(7,'2018-09-11',7,NULL,NULL,NULL,NULL,7,NULL,2),(8,'2018-09-12',8,NULL,NULL,NULL,NULL,8,NULL,2),(9,'2018-09-13',9,NULL,NULL,NULL,NULL,9,NULL,2),(10,'2018-09-14',10,NULL,NULL,NULL,NULL,10,NULL,2),(11,'2018-09-17',11,NULL,NULL,NULL,NULL,11,NULL,2),(12,'2018-09-18',12,NULL,NULL,NULL,NULL,12,NULL,2),(13,'2018-09-19',13,NULL,NULL,NULL,NULL,13,NULL,2),(14,'2018-09-20',14,NULL,NULL,NULL,NULL,14,NULL,2),(15,'2018-09-21',15,NULL,NULL,NULL,NULL,15,NULL,2),(16,'2018-09-24',16,NULL,NULL,NULL,NULL,16,NULL,2),(17,'2018-09-25',17,NULL,NULL,NULL,NULL,17,NULL,2),(18,'2018-09-26',18,NULL,NULL,NULL,NULL,18,NULL,2),(19,'2018-09-27',1,NULL,NULL,NULL,NULL,19,NULL,2),(20,'2018-09-28',2,NULL,NULL,NULL,NULL,20,NULL,2),(21,'2018-10-01',3,NULL,NULL,NULL,NULL,21,NULL,2),(22,'2018-10-02',4,NULL,NULL,NULL,NULL,22,NULL,2),(23,'2018-10-03',5,NULL,NULL,NULL,NULL,23,NULL,2),(24,'2018-10-04',6,NULL,NULL,NULL,NULL,24,NULL,2),(25,'2018-10-05',7,NULL,NULL,NULL,NULL,25,NULL,2),(26,'2018-10-08',8,NULL,NULL,NULL,NULL,26,NULL,2),(27,'2018-10-09',9,NULL,NULL,NULL,NULL,27,NULL,2),(28,'2018-10-10',10,NULL,NULL,NULL,NULL,28,NULL,2),(29,'2018-10-11',11,NULL,NULL,NULL,NULL,29,NULL,2),(30,'2018-10-12',12,NULL,NULL,NULL,NULL,30,NULL,2),(31,'2018-10-15',13,NULL,NULL,NULL,NULL,31,NULL,2),(32,'2018-10-16',14,NULL,NULL,NULL,NULL,32,NULL,2),(33,'2018-10-17',15,NULL,NULL,NULL,NULL,33,NULL,2),(34,'2018-10-18',16,NULL,NULL,NULL,NULL,34,NULL,2),(35,'2018-10-19',17,NULL,NULL,NULL,NULL,35,NULL,2),(36,'2018-10-22',18,NULL,NULL,NULL,NULL,36,NULL,2),(37,'2018-10-23',19,NULL,NULL,NULL,NULL,37,NULL,2),(38,'2018-10-24',20,NULL,NULL,NULL,NULL,38,NULL,2),(39,'2018-10-25',21,NULL,NULL,NULL,NULL,39,NULL,2),(40,'2018-10-26',22,NULL,NULL,NULL,NULL,40,NULL,2),(41,'2018-10-29',23,NULL,NULL,NULL,NULL,41,NULL,2),(42,'2018-10-30',24,NULL,NULL,NULL,NULL,42,NULL,2),(43,'2018-10-31',25,NULL,NULL,NULL,NULL,43,NULL,2);
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-04 22:22:54
