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
-- Table structure for table `interessados`
--

DROP TABLE IF EXISTS `interessados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interessados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `cpf` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `estadoCivil` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `profissao` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `escolaridade` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `midia` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cep` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `logradouro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `numeroCasa` int(5) NOT NULL,
  `complemento` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cidade` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `celular` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `banco` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `agencia` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `conta` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `codigoClienteBanco` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `bolsa` int(11) DEFAULT NULL,
  `inadimplencia` tinyint(1) DEFAULT NULL,
  `nomeResponsavelUm` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `telefoneResponsavelUm` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `celularResponsavelUm` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nomeResponsavelDois` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `telefoneResponsavelDois` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `celularResponsavelDois` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `observacoes` text,
  `avatar` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `bolsa` (`bolsa`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;



LOCK TABLES `alunos` WRITE;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-01 15:19:55
