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
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL,
  `estadoCivil` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `cidadeNatal` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `tipoPagamento` varchar(45) NOT NULL,
  `carteiraProfissional` varchar(45) NOT NULL,
  `inss` varchar(45) NOT NULL,
  `percentualInss` int(11) NOT NULL,
  `dataAdmissao` date NOT NULL,
  `ccm` varchar(45) NOT NULL,
  `percentualIss` int(11) NOT NULL,
  `dataDemissao` date DEFAULT NULL,
  `aulaInterna` int(11) DEFAULT NULL,
  `aulaExterna` int(11) DEFAULT NULL,
  `salarioMensal` int(11) DEFAULT NULL,
  `banco` varchar(45) NOT NULL,
  `agencia` varchar(45) NOT NULL,
  `conta` varchar(45) NOT NULL,
  `codigoBanco` varchar(45) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `anexo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'Luan Nunes','236.234.32-57','161.438.287-50','1993-07-10','solteiro','masculino','professor','Volta Redonda','27259-290','Bairro Jardim Vila Rica Tiradentes',28,'null','Volta Redonda','Vila Rica - Tiradentes','alann.625@gmail.com','','(24) 998844351','horista','12412341212','123',23,'2018-04-03','3442',23,NULL,233,344,NULL,'Banco do Brasil','12312-3','1231231-4','12312312312','null','null'),(2,'Barbara Evangelista','11.234.343-2','161.438.287-50','1994-01-31','casado','feminino','secretária','Barra Mansa','23897-402','Vila Santa Cecilia',39,'','Resende','Algum Bairro ai','barbararesende@gmail.com','(24) 9988-4435','','horista','12412312312','234',14,'2018-04-01','234',32,'2018-04-18',100,150,NULL,'Banco do Brasil','23345-5','23423432-3','242342342334','Observação.',''),(8,'Jorge Vieira','12.312.312-3','131.231.231-23','2018-04-19','solteiro','masculino','professor','1231312321','12312-312','123123123',12,'12312312','123123','12312312','123123@gmail.com','(12) 3123-1231','(12) 99231-2312','horista','123123123','12312',23,'2018-04-02','123123',43,NULL,123,123,NULL,'Banco do Brasil','12312312','112312312','12312312312','12312312312',''),(10,'Igor Silva','12.312.312-3','131.231.231-23','2018-04-19','solteiro','masculino','professor','1231312321','12312-312','123123123',12,'12312312','123123','12312312','123123@gmail.com','(12) 3123-1231','(12) 99231-2312','horista','123123123','12312',23,'2018-04-02','123123',43,NULL,123,123,NULL,'Banco do Brasil','12312312','112312312','12312312312','12312312312','');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-05 12:41:13
