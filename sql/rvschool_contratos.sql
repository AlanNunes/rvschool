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
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) CHARACTER SET utf8 NOT NULL,
  `aluno` int(11) NOT NULL,
  `situacao` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `contratoTurmas` tinyint(1) NOT NULL,
  `contratoAulasLivres` tinyint(1) NOT NULL,
  `atendente1` int(11) DEFAULT NULL,
  `atendente2` int(11) DEFAULT NULL,
  `atendente3` int(11) DEFAULT NULL,
  `dataContrato` date NOT NULL,
  `contratante` int(11) DEFAULT '0',
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `aluno` (`aluno`),
  KEY `situacao` (`situacao`),
  KEY `tipo` (`tipo`),
  KEY `atendente1` (`atendente1`),
  KEY `atendente2` (`atendente2`),
  KEY `atendente3` (`atendente3`),
  KEY `matricula` (`matricula`),
  KEY `contratante` (`contratante`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`situacao`) REFERENCES `situacoes_de_contratos` (`id`),
  CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tipos_de_contratos` (`id`),
  CONSTRAINT `contratos_ibfk_4` FOREIGN KEY (`atendente1`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `contratos_ibfk_5` FOREIGN KEY (`atendente2`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `contratos_ibfk_6` FOREIGN KEY (`atendente3`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `contratos_ibfk_7` FOREIGN KEY (`matricula`) REFERENCES `matriculas` (`id`),
  CONSTRAINT `contratos_ibfk_8` FOREIGN KEY (`contratante`) REFERENCES `responsaveis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (1,'2018-1',22,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,1),(2,'2018-2',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,2),(3,'2018-3',1,1,1,'2018-05-13','2019-05-13',1,0,10,NULL,NULL,'2018-05-13',NULL,3),(4,'2018-4',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,4),(5,'2018-5',22,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,5),(6,'2018-6',2,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,6),(7,'2018-7',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,7),(8,'2018-8',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,8),(9,'2018-9',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,9),(10,'2018-10',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,10),(11,'2018-11',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,11),(12,'2018-12',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,12),(13,'2018-13',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,13),(14,'2018-14',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,14),(15,'2018-15',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,15),(16,'2018-16',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,16),(17,'2018-17',2,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,17),(18,'2018-18',2,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,18),(19,'2018-19',2,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,19),(20,'2018-20',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,20),(21,'2018-21',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,21),(22,'2018-22',2,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,22),(23,'2018-23',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,23),(24,'2018-24',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,24),(25,'2018-25',3,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,25),(26,'2018-26',3,1,1,'2018-05-13','2019-05-13',1,0,1,10,NULL,'2018-05-13',NULL,26),(27,'2018-27',1,1,1,'2018-05-13','2019-05-13',1,0,NULL,NULL,NULL,'2018-05-13',NULL,27),(28,'2018-28',1,1,1,'2018-05-13','2019-05-13',0,1,NULL,NULL,NULL,'2018-05-13',NULL,28),(29,'2018-29',12,1,1,'2018-05-16','2019-05-16',1,0,NULL,NULL,NULL,'2018-05-16',NULL,29),(30,'2018-30',1,1,1,'2018-05-16','2019-05-16',1,0,NULL,NULL,NULL,'2018-05-16',NULL,30),(31,'2018-31',12,1,1,'2018-05-16','2019-05-16',1,0,NULL,NULL,NULL,'2018-05-16',NULL,31),(32,'2018-32',1,1,1,'2018-05-17','2019-05-17',1,0,NULL,NULL,NULL,'2018-05-17',NULL,32),(33,'2018-33',3,1,1,'2018-05-17','2019-05-17',1,0,NULL,NULL,NULL,'2018-05-18',NULL,33),(34,'2018-34',2,1,1,'2018-05-17','2019-05-17',0,1,NULL,NULL,NULL,'2018-05-18',NULL,34),(35,'2018-35',9,1,1,'2018-05-25','2019-05-25',1,0,21,NULL,NULL,'2018-05-26',NULL,35),(38,'2018-38',12,1,2,'2018-05-30','2019-05-30',1,0,NULL,NULL,NULL,'2018-05-30',NULL,38);
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-07  0:35:56
