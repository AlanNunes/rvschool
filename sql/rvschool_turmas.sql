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
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  `professor` int(11) DEFAULT NULL,
  `estagio` varchar(45) NOT NULL,
  `curso` int(11) NOT NULL,
  `horario` varchar(45) NOT NULL,
  `maximoDeAlunos` int(11) DEFAULT NULL,
  `sala` varchar(45) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `ultimaPalavra` varchar(45) DEFAULT NULL,
  `ultimaLicao` int(11) DEFAULT NULL,
  `ultimoDitado` int(11) DEFAULT NULL,
  `minimoAlunos` int(11) NOT NULL,
  `duracaoAula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`),
  KEY `professor` (`professor`),
  KEY `curso` (`curso`),
  CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`professor`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (2,'Alan',2,10,'4',1,'Seg-Ter-Qua-Qui-Sex(18:00/18:50)',NULL,'United States','2018-05-01','2019-05-01',NULL,NULL,NULL,10,50),(3,'Eunice',0,21,'5',4,'Seg-Ter-Qua-Qui-Sex(18:00/18:50)',NULL,'United States','2018-05-01','2019-05-01',NULL,NULL,NULL,10,50),(4,'Pretinha',1,20,'2',1,'Seg-Ter-Qua-Qui-Sex(15:00/15:50)',NULL,'United States','2018-05-01','2020-02-01',NULL,NULL,NULL,10,50);
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-04  2:21:49
