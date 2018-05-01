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
  `contratante` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `aluno` (`aluno`),
  KEY `situacao` (`situacao`),
  KEY `tipo` (`tipo`),
  KEY `atendente1` (`atendente1`),
  KEY `atendente2` (`atendente2`),
  KEY `atendente3` (`atendente3`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`situacao`) REFERENCES `situacoes_de_contratos` (`id`),
  CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tipos_de_contratos` (`id`),
  CONSTRAINT `contratos_ibfk_4` FOREIGN KEY (`atendente1`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `contratos_ibfk_5` FOREIGN KEY (`atendente2`) REFERENCES `funcionarios` (`id`),
  CONSTRAINT `contratos_ibfk_6` FOREIGN KEY (`atendente3`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
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

-- Dump completed on 2018-05-01 15:19:56
