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
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
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
  `observacoes` text,
  `avatar` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `bolsa` (`bolsa`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (1,'2018-1','Alan Nunes da Silva','132.123.124-8','651.897.403-66','2000-04-29','solteiro','masculino','','Ensino Superior','','27259-290','Rua Vinte e Sete',28,'','Volta Redonda','Jardim Vila Rica - Tiradentes','alann.625@gmail.com','','(24) 998844351','Bradesco','','','',0,0,'','1522602945.jpg',1),(2,'2018-2','Steven Paul Jobs','123.321.123-3','123.321.123-12','1955-02-24','solteiro','masculino','','Ensino Superior','','','Street 17',17,'','San Francisco','Palo Alto','stevejobs@apple.com','','(24) 998844351','','','','',0,0,'','1522612719.jpg',0),(3,'2018-3','William Henry Gates III','321.123.321-3','321.123.321-32','1955-10-28','casado','masculino','','Ensino Superior','','','Street 17',17,'','Lake Washington in Medina, Washington','Medina','billgates@microsoft.com','','(24) 998844351','','','','',0,0,'','1522613743.jpg',1),(9,'2018-9','Yeah Thats Me','77.777.777-7','777.777.777-77','2000-04-29','casado','masculino','','Ensino Superior','Internet','27259-290','Rua Vinte e Sete',77,'','Volta Redonda','Jardim Vila Rica - Tiradentes','thatsmes@me.com.br','','(24) 999999999','Banco do Brasil','7777777','777777777','77777777',0,0,'','1523309805.jpg',1),(10,'2018-10','Teste Som 777','77.777.777-7','777.777.777-77','2000-04-29','solteiro','masculino','Estagiário de TI','Ensino Superior','Amigos','27259-290','Rua Vinte e Sete',28,'','Volta Redonda','Jardim Vila Rica - Tiradentes','alannunes@ugb.edu.br','','(24) 998844351','Santander','','','',0,0,'','1523451520.jpg',1),(12,'2018-12','Alan Nunes da Silva','','777.777.777-77','1997-12-12','solteiro','masculino','','Ensino Superior','Outros','27259-290','Rua Vinte e Sete',77,'','Volta Redonda','Jardim Vila Rica - Tiradentes','hk@hk.com','','(24) 998844351','','','','',0,0,'','1523309805.jpg',1),(22,'2018-22','Gustavo','77.777.777-7','777.777.777-77','2000-01-01','solteiro','masculino','','','','27259-290','Rua Vinte e Sete',28,'','Volta Redonda','Jardim Vila Rica - Tiradentes','gustavo@gustavo.com','2433333333','(24) 998844351','','','','',0,0,'','1525396693.png',1);
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-26 15:21:51
