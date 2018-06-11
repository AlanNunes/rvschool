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
-- Table structure for table `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `dataVencimento` date NOT NULL,
  `categoria` int(11) NOT NULL,
  `desconto` float DEFAULT NULL,
  `bolsa` int(11) DEFAULT NULL,
  `situacao_parcela` varchar(45) NOT NULL,
  `observacoes` text,
  `numero` int(3) NOT NULL,
  `aluno` int(11) NOT NULL,
  `valor_recebido` float DEFAULT NULL,
  `troco` float DEFAULT NULL,
  `momento_pagamento` int(4) DEFAULT NULL,
  `operadora_de_cartao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_idx` (`categoria`),
  KEY `situacao_parcela_idx` (`situacao_parcela`),
  KEY `aluno_idx` (`aluno`),
  KEY `bandeira_idx` (`operadora_de_cartao`),
  CONSTRAINT `aluno` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bandeira` FOREIGN KEY (`operadora_de_cartao`) REFERENCES `operadoras_de_cartao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `parcelas_categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `situacao_parcela` FOREIGN KEY (`situacao_parcela`) REFERENCES `situacoes_de_parcelas` (`nome`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelas`
--

LOCK TABLES `parcelas` WRITE;
/*!40000 ALTER TABLE `parcelas` DISABLE KEYS */;
INSERT INTO `parcelas` VALUES (1,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,1,1,NULL,NULL,1528697173,NULL),(2,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,2,1,NULL,NULL,NULL,NULL),(3,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,3,1,NULL,NULL,NULL,NULL),(4,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,4,1,NULL,NULL,NULL,NULL),(5,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,5,1,NULL,NULL,NULL,NULL),(6,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,6,1,NULL,NULL,NULL,NULL),(7,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,7,1,NULL,NULL,NULL,NULL),(8,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,8,1,NULL,NULL,NULL,NULL),(9,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,9,1,NULL,NULL,NULL,NULL),(10,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,10,1,NULL,NULL,NULL,NULL),(11,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,11,1,NULL,NULL,NULL,NULL),(12,147.79,'2018-06-10',3,18.98,35,'Pendente',NULL,12,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `parcelas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-11  3:31:51
