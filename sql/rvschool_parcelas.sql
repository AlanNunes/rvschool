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
  `operadora_de_cartao` int(11) DEFAULT NULL,
  `data_recebimento` date DEFAULT NULL,
  `desconto_momento_recebimento` double DEFAULT '0',
  `forma_de_cobranca` int(11) DEFAULT NULL,
  `complemento` varchar(55) DEFAULT NULL,
  `documento` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_idx` (`categoria`),
  KEY `situacao_parcela_idx` (`situacao_parcela`),
  KEY `aluno_idx` (`aluno`),
  KEY `bandeira_idx` (`operadora_de_cartao`),
  KEY `forma_de_cobranca_idx` (`forma_de_cobranca`),
  CONSTRAINT `aluno` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bandeira` FOREIGN KEY (`operadora_de_cartao`) REFERENCES `operadoras_de_cartao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `parcelas_categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `forma_de_cobranca` FOREIGN KEY (`forma_de_cobranca`) REFERENCES `formas_de_cobrancas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `situacao_parcela` FOREIGN KEY (`situacao_parcela`) REFERENCES `situacoes_de_parcelas` (`nome`) ON DELETE NO ACTION ON UPDATE CASCADE
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

-- Dump completed on 2018-10-18  0:28:16
