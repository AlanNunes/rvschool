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
  `dataVencimento` datetime NOT NULL,
  `categoria` int(11) NOT NULL,
  `desconto` float NOT NULL DEFAULT '0',
  `bolsa` int(11) NOT NULL,
  `forma_de_cobranca` int(11) NOT NULL,
  `situacao_parcela` int(11) NOT NULL,
  `observacoes` text,
  `conta_bancaria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `_idx` (`categoria`),
  KEY `forma_de_cobranca_idx` (`forma_de_cobranca`),
  KEY `conta_bancaria_idx` (`conta_bancaria`),
  KEY `situacao_parcela_idx` (`situacao_parcela`),
  CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `parcelas_categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `conta_bancaria` FOREIGN KEY (`conta_bancaria`) REFERENCES `contas_bancarias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `forma_de_cobranca` FOREIGN KEY (`forma_de_cobranca`) REFERENCES `formas_de_cobrancas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `situacao_parcela` FOREIGN KEY (`situacao_parcela`) REFERENCES `situacoes_de_parcelas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelas`
--

LOCK TABLES `parcelas` WRITE;
/*!40000 ALTER TABLE `parcelas` DISABLE KEYS */;
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

-- Dump completed on 2018-05-30  3:03:08