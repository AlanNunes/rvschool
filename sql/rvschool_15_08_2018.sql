-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 16-Ago-2018 às 02:06
-- Versão do servidor: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rvschool`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `doWhile`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `doWhile` ()  BEGIN
DECLARE i INT DEFAULT 1; 
WHILE (i <= 26) DO
    INSERT INTO `paginas` (Numero, IdLivro) values (i, 1);
    SET i = i+1;
END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `matricula`, `nome`, `rg`, `cpf`, `dataNasc`, `estadoCivil`, `sexo`, `profissao`, `escolaridade`, `midia`, `cep`, `logradouro`, `numeroCasa`, `complemento`, `cidade`, `bairro`, `email`, `telefone`, `celular`, `banco`, `agencia`, `conta`, `codigoClienteBanco`, `bolsa`, `inadimplencia`, `observacoes`, `avatar`, `ativo`) VALUES
(1, '2018-1', 'Alan Nunes da Silva', '132.123.124-8', '651.897.403-66', '2000-04-29', 'solteiro', 'masculino', '', 'Ensino Superior', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '', '(24) 998844351', 'Bradesco', '', '', '', 0, 0, '', '1522602945.jpg', 1),
(2, '2018-2', 'Steven Paul Jobs', '123.321.123-3', '123.321.123-12', '1955-02-24', 'solteiro', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'San Francisco', 'Palo Alto', 'stevejobs@apple.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '1522612719.jpg', 0),
(3, '2018-3', 'William Henry Gates III', '321.123.321-3', '321.123.321-32', '1955-10-28', 'casado', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'Lake Washington in Medina, Washington', 'Medina', 'billgates@microsoft.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '1522613743.jpg', 1),
(9, '2018-9', 'Yeah Thats Me', '77.777.777-7', '777.777.777-77', '2000-04-29', 'casado', 'masculino', '', 'Ensino Superior', 'Internet', '27259-290', 'Rua Vinte e Sete', 77, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'thatsmes@me.com.br', '', '(24) 999999999', 'Banco do Brasil', '7777777', '777777777', '77777777', 0, 0, '', '1523309805.jpg', 1),
(10, '2018-10', 'Teste Som 777', '77.777.777-7', '777.777.777-77', '2000-04-29', 'solteiro', 'masculino', 'Estagiário de TI', 'Ensino Superior', 'Amigos', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alannunes@ugb.edu.br', '', '(24) 998844351', 'Santander', '', '', '', 0, 0, '', '1523451520.jpg', 1),
(12, '2018-12', 'Wendell Souza Costa', '', '777.777.777-77', '1997-12-12', 'solteiro', 'masculino', '', 'Ensino Superior', 'Outros', '27259-290', 'Rua Vinte e Sete', 77, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'hk@hk.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '1527361227.jpg', 1),
(22, '2018-22', 'Gustavo', '77.777.777-7', '777.777.777-77', '2000-01-01', 'solteiro', 'masculino', '', '', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'gustavo@gustavo.com', '2433333333', '(24) 998844351', '', '', '', '', 0, 0, '', '1525396693.png', 1),
(23, '2018-23', 'Zé Maria', '11.111.111-1', '111.111.111-11', '2000-04-29', 'solteiro', 'feminino', '', '', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', '', '', '(24) 99884-4351', 'Itaú', '', '', '', 35, 0, '', '1530401029.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
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
  KEY `IdTurma_idx` (`IdTurma`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`IdAula`, `Data`, `Numero`, `Pagina`, `Conteudo`, `Dictation`, `Reading`, `IdProgramacaoEstagio`, `Professor`, `IdTurma`) VALUES
(1, '2018-08-15', 1, NULL, NULL, NULL, NULL, 1, NULL, 2),
(2, '2018-08-16', 2, NULL, NULL, NULL, NULL, 2, NULL, 2),
(3, '2018-08-17', 3, NULL, NULL, NULL, NULL, 3, NULL, 2),
(4, '2018-08-20', 4, NULL, NULL, NULL, NULL, 4, NULL, 2),
(5, '2018-08-21', 5, NULL, NULL, NULL, NULL, 5, NULL, 2),
(6, '2018-08-22', 6, NULL, NULL, NULL, NULL, 6, NULL, 2),
(7, '2018-08-23', 7, NULL, NULL, NULL, NULL, 7, NULL, 2),
(8, '2018-08-24', 8, NULL, NULL, NULL, NULL, 8, NULL, 2),
(9, '2018-08-27', 9, NULL, NULL, NULL, NULL, 9, NULL, 2),
(10, '2018-08-28', 10, NULL, NULL, NULL, NULL, 10, NULL, 2),
(11, '2018-08-29', 11, NULL, NULL, NULL, NULL, 11, NULL, 2),
(12, '2018-08-30', 12, NULL, NULL, NULL, NULL, 12, NULL, 2),
(13, '2018-08-31', 13, NULL, NULL, NULL, NULL, 13, NULL, 2),
(14, '2018-09-03', 14, NULL, NULL, NULL, NULL, 14, NULL, 2),
(15, '2018-09-04', 15, NULL, NULL, NULL, NULL, 15, NULL, 2),
(16, '2018-09-05', 16, NULL, NULL, NULL, NULL, 16, NULL, 2),
(17, '2018-09-06', 17, NULL, NULL, NULL, NULL, 17, NULL, 2),
(18, '2018-09-07', 18, NULL, NULL, NULL, NULL, 18, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsas`
--

DROP TABLE IF EXISTS `bolsas`;
CREATE TABLE IF NOT EXISTS `bolsas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `desconto` int(11) NOT NULL,
  `fixa` tinyint(4) NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataTermino` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bolsas`
--

INSERT INTO `bolsas` (`id`, `nome`, `descricao`, `desconto`, `fixa`, `dataInicio`, `dataTermino`) VALUES
(31, 'Bolsa Inglês Gold Temporária', 'Bolsa temporária de 75% de desconto no curso de Inglês.', 75, 0, '2018-03-28', '2018-03-31'),
(32, 'Bolsa Inglês Gold', 'Bolsa de 75% de desconto no curso de inglês.', 75, 1, NULL, NULL),
(33, 'Bolsa Silver Gold Temporária', 'Bolsa temporária de 50% de desconto no curso de inglês.', 50, 0, '2018-03-29', '2018-03-30'),
(35, 'Páscoa', 'Bolsa de páscoa.', 50, 0, '2018-03-30', '2018-04-01'),
(36, 'Bolsa de Inverno', 'Bolsa destinada a alunos que sentem muito frio.', 35, 0, '2018-06-01', '2018-07-01'),
(37, 'Bolsa da Lílian', 'Bolsa temporário. lçfkdslçgd', 75, 0, '2018-06-08', '2018-06-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `cargoId` int(11) NOT NULL AUTO_INCREMENT,
  `cargoNome` varchar(100) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`cargoId`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`cargoId`, `cargoNome`, `roleId`) VALUES
(1, 'Administrador', 1),
(2, 'Funcionário', 2),
(3, 'Professor', 3),
(4, 'Aluno', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_bancarias`
--

DROP TABLE IF EXISTS `contas_bancarias`;
CREATE TABLE IF NOT EXISTS `contas_bancarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_bancarias`
--

INSERT INTO `contas_bancarias` (`id`, `nome`) VALUES
(3, 'CAIXA'),
(2, 'SANTANDER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE IF NOT EXISTS `contratos` (
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
  KEY `contratante` (`contratante`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`id`, `numero`, `aluno`, `situacao`, `tipo`, `dataInicio`, `dataTermino`, `contratoTurmas`, `contratoAulasLivres`, `atendente1`, `atendente2`, `atendente3`, `dataContrato`, `contratante`, `matricula`) VALUES
(1, '2018-1', 22, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 1),
(2, '2018-2', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 2),
(3, '2018-3', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, 10, NULL, NULL, '2018-05-13', NULL, 3),
(4, '2018-4', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 4),
(5, '2018-5', 22, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 5),
(6, '2018-6', 2, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 6),
(7, '2018-7', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 7),
(8, '2018-8', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 8),
(9, '2018-9', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 9),
(10, '2018-10', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 10),
(11, '2018-11', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 11),
(12, '2018-12', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 12),
(13, '2018-13', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 13),
(14, '2018-14', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 14),
(15, '2018-15', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 15),
(16, '2018-16', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 16),
(17, '2018-17', 2, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 17),
(18, '2018-18', 2, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 18),
(19, '2018-19', 2, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 19),
(20, '2018-20', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 20),
(21, '2018-21', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 21),
(22, '2018-22', 2, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 22),
(23, '2018-23', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 23),
(24, '2018-24', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 24),
(25, '2018-25', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 25),
(26, '2018-26', 3, 1, 1, '2018-05-13', '2019-05-13', 1, 0, 1, 10, NULL, '2018-05-13', NULL, 26),
(27, '2018-27', 1, 1, 1, '2018-05-13', '2019-05-13', 1, 0, NULL, NULL, NULL, '2018-05-13', NULL, 27),
(28, '2018-28', 1, 1, 1, '2018-05-13', '2019-05-13', 0, 1, NULL, NULL, NULL, '2018-05-13', NULL, 28),
(29, '2018-29', 12, 1, 1, '2018-05-16', '2019-05-16', 1, 0, NULL, NULL, NULL, '2018-05-16', NULL, 29),
(30, '2018-30', 1, 1, 1, '2018-05-16', '2019-05-16', 1, 0, NULL, NULL, NULL, '2018-05-16', NULL, 30),
(31, '2018-31', 12, 1, 1, '2018-05-16', '2019-05-16', 1, 0, NULL, NULL, NULL, '2018-05-16', NULL, 31),
(32, '2018-32', 1, 1, 1, '2018-05-17', '2019-05-17', 1, 0, NULL, NULL, NULL, '2018-05-17', NULL, 32),
(33, '2018-33', 3, 1, 1, '2018-05-17', '2019-05-17', 1, 0, NULL, NULL, NULL, '2018-05-18', NULL, 33),
(34, '2018-34', 2, 1, 1, '2018-05-17', '2019-05-17', 0, 1, NULL, NULL, NULL, '2018-05-18', NULL, 34),
(35, '2018-35', 9, 1, 1, '2018-05-25', '2019-05-25', 1, 0, 21, NULL, NULL, '2018-05-26', NULL, 35),
(38, '2018-38', 12, 1, 2, '2018-05-30', '2019-05-30', 1, 0, NULL, NULL, NULL, '2018-05-30', NULL, 38),
(39, '2018-39', 1, 1, 1, '2018-06-08', '2019-06-08', 1, 0, 20, NULL, NULL, '2018-06-08', NULL, 39),
(40, '2018-40', 23, 1, 1, '2018-07-06', '2019-07-06', 1, 0, 20, NULL, NULL, '2018-07-06', NULL, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`) VALUES
(1, 'That\'s the way'),
(2, 'Revolution Kids'),
(3, 'Revolution VIP'),
(4, 'Advanced Journey');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagios`
--

DROP TABLE IF EXISTS `estagios`;
CREATE TABLE IF NOT EXISTS `estagios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `curso` int(11) NOT NULL,
  `IdLivro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`),
  KEY `IdLivro_idx` (`IdLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estagios`
--

INSERT INTO `estagios` (`id`, `nome`, `curso`, `IdLivro`) VALUES
(2, 'Estágio 1', 1, 1),
(3, 'Estágio 2', 1, 2),
(4, 'Estágio 3', 1, 3),
(5, 'Estágio 4', 1, 4),
(6, 'Estágio 5', 1, 5),
(7, 'Estágio 6', 1, 6),
(8, 'Estágio 7', 1, 7),
(9, 'Estágio 8', 1, 8),
(10, 'Estágio 9', 1, 9),
(11, 'Estágio 10', 1, 10),
(12, 'Estágio 11', 1, 11),
(13, 'Estágio 12', 1, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_de_cobrancas`
--

DROP TABLE IF EXISTS `formas_de_cobrancas`;
CREATE TABLE IF NOT EXISTS `formas_de_cobrancas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `contabancaria` tinyint(4) NOT NULL,
  `operadoracartao` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formas_de_cobrancas`
--

INSERT INTO `formas_de_cobrancas` (`id`, `nome`, `contabancaria`, `operadoracartao`) VALUES
(1, 'Dinheiro', 1, 0),
(2, 'Depósito Bancário', 1, 0),
(3, 'Cartão de Crédito', 0, 1),
(4, 'Cartão de Débito', 0, 1),
(5, 'Cobrança Bancária', 1, 0),
(6, 'Débito Automático', 1, 0),
(7, 'Permuta', 1, 0),
(8, 'Transferência Bancária', 1, 0),
(9, 'Cheque', 1, 0),
(10, 'Cheque Pré-Datado', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `rg`, `cpf`, `dataNascimento`, `estadoCivil`, `sexo`, `cargo`, `cidadeNatal`, `cep`, `logradouro`, `numero`, `complemento`, `cidade`, `bairro`, `email`, `telefone`, `celular`, `tipoPagamento`, `carteiraProfissional`, `inss`, `percentualInss`, `dataAdmissao`, `ccm`, `percentualIss`, `dataDemissao`, `aulaInterna`, `aulaExterna`, `salarioMensal`, `banco`, `agencia`, `conta`, `codigoBanco`, `observacoes`, `anexo`) VALUES
(1, 'Luan Nunes', '236.234.32-57', '161.438.287-50', '1993-07-10', 'solteiro', 'masculino', '1', 'Volta Redonda', '27259-290', 'Bairro Jardim Vila Rica Tiradentes', 28, 'null', 'Volta Redonda', 'Vila Rica - Tiradentes', 'alann.625@gmail.com', '', '(24) 998844351', 'horista', '12412341212', '123', 23, '2018-04-03', '3442', 23, NULL, 233, 344, NULL, 'Banco do Brasil', '12312-3', '1231231-4', '12312312312', '', ''),
(10, 'Igor Silva', '12.312.312-3', '131.231.231-23', '2018-04-19', 'solteiro', 'masculino', '3', '1231312321', '12312-312', '123123123', 12, '12312312', '123123', '12312312', '123123@gmail.com', '(12) 3123-1231', '(12) 99231-2312', 'horista', '123123123', '12312', 23, '2018-04-02', '123123', 43, NULL, 123, 123, NULL, 'Banco do Brasil', '12312312', '112312312', '12312312312', '', ''),
(20, 'Dieni Flausino', '11.111.111-1', '111.111.111-11', '1990-08-18', 'solteiro', 'feminino', '3', 'Volta Redonda - RJ', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'dieni@rvschool.com', '(24) 3333-3333', '(24) 99999-9999', 'mensalista', '111111', '111', 5, '2018-04-03', '111', 3, NULL, NULL, NULL, 10, '3', '111111-1', '1111111-1', '77777777-7', '', ''),
(21, 'Alan Nunes da Silva', '77.777.777-7', '777.777.777-77', '2000-04-29', 'solteiro', 'masculino', '3', 'Volta Redonda', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '(24) 9988-4435', '', 'horista', '777', '777', 7, '2018-04-29', '777', 7, NULL, 200, 200, NULL, 'Banco do Brasil', '7777777', '7777777', '7777777777', '', ''),
(22, 'Teste', '77.777.777-7', '777.777.777-77', '2000-04-29', 'solteiro', 'masculino', '3', 'Volta Redonda', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '(24) 9988-4435', '', 'horista', '777', '777', 7, '2018-04-29', '777', 7, NULL, 200, 200, NULL, 'Banco do Brasil', '7777777', '7777777', '7777777777', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessados`
--

DROP TABLE IF EXISTS `interessados`;
CREATE TABLE IF NOT EXISTS `interessados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
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
  `observacoes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `juros_de_operadores_de_cartao`
--

DROP TABLE IF EXISTS `juros_de_operadores_de_cartao`;
CREATE TABLE IF NOT EXISTS `juros_de_operadores_de_cartao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `parcelas` int(2) NOT NULL,
  `juros` float NOT NULL,
  `debito` tinyint(4) NOT NULL,
  `operadora_de_cartao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `operadora_de_cartao_idx` (`operadora_de_cartao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `IdLivro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  PRIMARY KEY (`IdLivro`),
  UNIQUE KEY `Nome_UNIQUE` (`Nome`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`IdLivro`, `Nome`) VALUES
(1, 'Book 1'),
(10, 'Book 10'),
(11, 'Book 11'),
(12, 'Book 12'),
(2, 'Book 2'),
(3, 'Book 3'),
(4, 'Book 4'),
(5, 'Book 5'),
(6, 'Book 6'),
(7, 'Book 7'),
(8, 'Book 8'),
(9, 'Book 9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `dataMatricula` date NOT NULL,
  `dataInicioAtividades` date NOT NULL,
  `numero` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  UNIQUE KEY `numero_2` (`numero`),
  UNIQUE KEY `numero_3` (`numero`),
  UNIQUE KEY `numero_4` (`numero`),
  UNIQUE KEY `numero_5` (`numero`),
  KEY `aluno` (`aluno`),
  KEY `turma` (`turma`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `aluno`, `turma`, `dataMatricula`, `dataInicioAtividades`, `numero`) VALUES
(1, 22, 3, '2018-05-13', '2018-05-01', '2018-1'),
(2, 1, 3, '2018-05-13', '2018-05-01', '2018-2'),
(3, 1, 4, '2018-05-13', '2018-05-01', '2018-3'),
(4, 1, 2, '2018-05-13', '2018-05-01', '2018-4'),
(5, 22, 4, '2018-05-13', '2018-05-01', '2018-5'),
(6, 2, 4, '2018-05-13', '2018-05-01', '2018-6'),
(7, 1, 3, '2018-05-13', '2018-05-01', '2018-7'),
(8, 3, 3, '2018-05-13', '2018-05-01', '2018-8'),
(9, 3, 2, '2018-05-13', '2018-05-01', '2018-9'),
(10, 3, 2, '2018-05-13', '2018-05-01', '2018-10'),
(11, 1, 4, '2018-05-13', '2018-05-01', '2018-11'),
(12, 1, 2, '2018-05-13', '2018-05-01', '2018-12'),
(13, 3, 3, '2018-05-13', '2018-05-01', '2018-13'),
(14, 3, 2, '2018-05-13', '2018-05-01', '2018-14'),
(15, 1, 3, '2018-05-13', '2018-05-01', '2018-15'),
(16, 1, 2, '2018-05-13', '2018-05-01', '2018-16'),
(17, 2, 2, '2018-05-13', '2018-05-01', '2018-17'),
(18, 2, 3, '2018-05-13', '2018-05-01', '2018-18'),
(19, 2, 3, '2018-05-13', '2018-05-01', '2018-19'),
(20, 3, 4, '2018-05-13', '2018-05-01', '2018-20'),
(21, 1, 4, '2018-05-13', '2018-05-01', '2018-21'),
(22, 2, 3, '2018-05-13', '2018-05-01', '2018-22'),
(23, 3, 2, '2018-05-13', '2018-05-01', '2018-23'),
(24, 3, 4, '2018-05-13', '2018-05-01', '2018-24'),
(25, 3, 4, '2018-05-13', '2018-05-01', '2018-25'),
(26, 3, 4, '2018-05-13', '2018-05-01', '2018-26'),
(27, 1, 3, '2018-05-13', '2018-05-01', '2018-27'),
(28, 1, 3, '2018-05-13', '2018-05-01', '2018-28'),
(29, 12, 4, '2018-05-16', '2018-05-01', '2018-29'),
(30, 1, 3, '2018-05-16', '2018-05-01', '2018-30'),
(31, 12, 2, '2018-05-16', '2018-05-01', '2018-31'),
(32, 1, 3, '2018-05-17', '2018-05-01', '2018-32'),
(33, 3, 4, '2018-05-17', '2018-05-01', '2018-33'),
(34, 2, 2, '2018-05-17', '2018-05-01', '2018-34'),
(35, 9, 3, '2018-05-25', '2018-05-01', '2018-35'),
(36, 12, 2, '2018-05-30', '2018-05-01', '2018-36'),
(37, 12, 2, '2018-05-30', '2018-05-01', '2018-37'),
(38, 12, 2, '2018-05-30', '2018-05-01', '2018-38'),
(39, 1, 4, '2018-06-08', '2018-05-01', '2018-39'),
(40, 23, 2, '2018-07-06', '2018-05-01', '2018-40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operadoras_de_cartao`
--

DROP TABLE IF EXISTS `operadoras_de_cartao`;
CREATE TABLE IF NOT EXISTS `operadoras_de_cartao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(145) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `operadoras_de_cartao`
--

INSERT INTO `operadoras_de_cartao` (`id`, `nome`) VALUES
(3, 'CARTÃO AMEX'),
(5, 'CARTÃO ELO'),
(2, 'CARTÃO HIPERCARD'),
(4, 'CARTÃO MASTERCARD'),
(1, 'VISA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

DROP TABLE IF EXISTS `paginas`;
CREATE TABLE IF NOT EXISTS `paginas` (
  `IdPagina` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `IdLivro` int(11) NOT NULL,
  PRIMARY KEY (`IdPagina`),
  KEY `IdLivro_idx` (`IdLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=1285 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`IdPagina`, `Numero`, `IdLivro`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(45, 45, 1),
(46, 46, 1),
(47, 47, 1),
(48, 48, 1),
(49, 49, 1),
(50, 50, 1),
(51, 51, 1),
(52, 52, 1),
(53, 53, 2),
(54, 54, 2),
(55, 55, 2),
(56, 56, 2),
(57, 57, 2),
(58, 58, 2),
(59, 59, 2),
(60, 60, 2),
(61, 61, 2),
(62, 62, 2),
(63, 63, 2),
(64, 64, 2),
(65, 65, 2),
(66, 66, 2),
(67, 67, 2),
(68, 68, 2),
(69, 69, 2),
(70, 70, 2),
(71, 71, 2),
(72, 72, 2),
(73, 73, 2),
(74, 74, 2),
(75, 75, 2),
(76, 76, 2),
(77, 77, 2),
(78, 78, 2),
(79, 79, 2),
(80, 80, 2),
(81, 81, 2),
(82, 82, 2),
(83, 83, 2),
(84, 84, 2),
(85, 85, 2),
(86, 86, 2),
(87, 87, 2),
(88, 88, 2),
(89, 89, 2),
(90, 90, 2),
(91, 91, 2),
(92, 92, 2),
(93, 93, 2),
(94, 94, 2),
(95, 95, 2),
(96, 96, 2),
(97, 97, 2),
(98, 98, 2),
(99, 99, 2),
(100, 100, 2),
(101, 101, 2),
(102, 102, 2),
(103, 103, 2),
(104, 104, 2),
(105, 105, 2),
(106, 106, 2),
(107, 107, 2),
(108, 108, 2),
(109, 109, 2),
(110, 110, 2),
(111, 111, 2),
(112, 112, 2),
(113, 113, 2),
(114, 114, 2),
(115, 115, 2),
(116, 116, 2),
(117, 117, 2),
(118, 118, 2),
(119, 119, 2),
(120, 120, 2),
(121, 121, 2),
(122, 122, 2),
(123, 123, 2),
(124, 124, 2),
(125, 125, 2),
(126, 126, 2),
(127, 127, 2),
(128, 128, 2),
(129, 129, 3),
(130, 130, 3),
(131, 131, 3),
(132, 132, 3),
(133, 133, 3),
(134, 134, 3),
(135, 135, 3),
(136, 136, 3),
(137, 137, 3),
(138, 138, 3),
(139, 139, 3),
(140, 140, 3),
(141, 141, 3),
(142, 142, 3),
(143, 143, 3),
(144, 144, 3),
(145, 145, 3),
(146, 146, 3),
(147, 147, 3),
(148, 148, 3),
(149, 149, 3),
(150, 150, 3),
(151, 151, 3),
(152, 152, 3),
(153, 153, 3),
(154, 154, 3),
(155, 155, 3),
(156, 156, 3),
(157, 157, 3),
(158, 158, 3),
(159, 159, 3),
(160, 160, 3),
(161, 161, 3),
(162, 162, 3),
(163, 163, 3),
(164, 164, 3),
(165, 165, 3),
(166, 166, 3),
(167, 167, 3),
(168, 168, 3),
(169, 169, 3),
(170, 170, 3),
(171, 171, 3),
(172, 172, 3),
(173, 173, 3),
(174, 174, 3),
(175, 175, 3),
(176, 176, 3),
(177, 177, 3),
(178, 178, 3),
(179, 179, 3),
(180, 180, 3),
(181, 181, 3),
(182, 182, 3),
(183, 183, 3),
(184, 184, 3),
(185, 185, 3),
(186, 186, 3),
(187, 187, 3),
(188, 188, 3),
(189, 189, 3),
(190, 190, 3),
(191, 191, 3),
(192, 192, 3),
(193, 193, 3),
(194, 194, 3),
(195, 195, 3),
(196, 196, 3),
(197, 197, 3),
(198, 198, 3),
(199, 199, 3),
(200, 200, 3),
(201, 201, 3),
(202, 202, 3),
(203, 203, 3),
(204, 204, 3),
(205, 205, 3),
(206, 206, 3),
(207, 207, 3),
(208, 208, 3),
(209, 209, 3),
(210, 210, 3),
(211, 211, 4),
(212, 212, 4),
(213, 213, 4),
(214, 214, 4),
(215, 215, 4),
(216, 216, 4),
(217, 217, 4),
(218, 218, 4),
(219, 219, 4),
(220, 220, 4),
(221, 221, 4),
(222, 222, 4),
(223, 223, 4),
(224, 224, 4),
(225, 225, 4),
(226, 226, 4),
(227, 227, 4),
(228, 228, 4),
(229, 229, 4),
(230, 230, 4),
(231, 231, 4),
(232, 232, 4),
(233, 233, 4),
(234, 234, 4),
(235, 235, 4),
(236, 236, 4),
(237, 237, 4),
(238, 238, 4),
(239, 239, 4),
(240, 240, 4),
(241, 241, 4),
(242, 242, 4),
(243, 243, 4),
(244, 244, 4),
(245, 245, 4),
(246, 246, 4),
(247, 247, 4),
(248, 248, 4),
(249, 249, 4),
(250, 250, 4),
(251, 251, 4),
(252, 252, 4),
(253, 253, 4),
(254, 254, 4),
(255, 255, 4),
(256, 256, 4),
(257, 257, 4),
(258, 258, 4),
(259, 259, 4),
(260, 260, 4),
(261, 261, 4),
(262, 262, 4),
(263, 263, 4),
(264, 264, 4),
(265, 265, 4),
(266, 266, 4),
(267, 267, 4),
(268, 268, 4),
(269, 269, 4),
(270, 270, 4),
(271, 271, 4),
(272, 272, 4),
(273, 273, 4),
(274, 274, 4),
(275, 275, 4),
(276, 276, 4),
(277, 277, 4),
(278, 278, 4),
(279, 279, 4),
(280, 280, 4),
(281, 281, 4),
(282, 282, 4),
(283, 283, 4),
(284, 284, 4),
(285, 285, 4),
(286, 286, 4),
(287, 287, 4),
(288, 288, 4),
(289, 289, 4),
(290, 290, 4),
(291, 291, 4),
(292, 292, 4),
(293, 293, 4),
(294, 294, 4),
(295, 295, 4),
(296, 296, 4),
(297, 297, 4),
(298, 298, 4),
(299, 299, 4),
(300, 300, 4),
(301, 301, 4),
(302, 302, 4),
(303, 303, 4),
(304, 304, 4),
(305, 305, 4),
(306, 306, 4),
(307, 307, 4),
(308, 308, 4),
(309, 309, 4),
(310, 310, 4),
(311, 311, 4),
(312, 312, 4),
(313, 313, 4),
(314, 315, 5),
(315, 316, 5),
(316, 317, 5),
(317, 318, 5),
(318, 319, 5),
(319, 320, 5),
(320, 321, 5),
(321, 322, 5),
(322, 323, 5),
(323, 324, 5),
(324, 325, 5),
(325, 326, 5),
(326, 327, 5),
(327, 328, 5),
(328, 329, 5),
(329, 330, 5),
(330, 331, 5),
(331, 332, 5),
(332, 333, 5),
(333, 334, 5),
(334, 335, 5),
(335, 336, 5),
(336, 337, 5),
(337, 338, 5),
(338, 339, 5),
(339, 340, 5),
(340, 341, 5),
(341, 342, 5),
(342, 343, 5),
(343, 344, 5),
(344, 345, 5),
(345, 346, 5),
(346, 347, 5),
(347, 348, 5),
(348, 349, 5),
(349, 350, 5),
(350, 351, 5),
(351, 352, 5),
(352, 353, 5),
(353, 354, 5),
(354, 355, 5),
(355, 356, 5),
(356, 357, 5),
(357, 358, 5),
(358, 359, 5),
(359, 360, 5),
(360, 361, 5),
(361, 362, 5),
(362, 363, 5),
(363, 364, 5),
(364, 365, 5),
(365, 366, 5),
(366, 367, 5),
(367, 368, 5),
(368, 369, 5),
(369, 370, 5),
(370, 371, 5),
(371, 372, 5),
(372, 373, 5),
(373, 374, 5),
(374, 375, 5),
(375, 376, 5),
(376, 377, 5),
(377, 378, 5),
(378, 379, 5),
(379, 380, 5),
(380, 381, 5),
(381, 382, 5),
(382, 383, 5),
(383, 384, 5),
(384, 385, 5),
(385, 386, 5),
(386, 387, 5),
(387, 388, 5),
(388, 389, 5),
(389, 390, 5),
(390, 391, 5),
(391, 392, 5),
(392, 393, 5),
(393, 394, 5),
(394, 395, 5),
(395, 396, 5),
(396, 397, 5),
(397, 398, 5),
(398, 399, 5),
(399, 400, 5),
(400, 401, 5),
(401, 402, 5),
(402, 403, 5),
(403, 404, 5),
(404, 405, 5),
(405, 406, 5),
(406, 407, 5),
(407, 408, 5),
(408, 409, 5),
(409, 410, 5),
(410, 411, 5),
(411, 412, 5),
(412, 413, 5),
(413, 415, 6),
(414, 416, 6),
(415, 417, 6),
(416, 418, 6),
(417, 419, 6),
(418, 420, 6),
(419, 421, 6),
(420, 422, 6),
(421, 423, 6),
(422, 424, 6),
(423, 425, 6),
(424, 426, 6),
(425, 427, 6),
(426, 428, 6),
(427, 429, 6),
(428, 430, 6),
(429, 431, 6),
(430, 432, 6),
(431, 433, 6),
(432, 434, 6),
(433, 435, 6),
(434, 436, 6),
(435, 437, 6),
(436, 438, 6),
(437, 439, 6),
(438, 440, 6),
(439, 441, 6),
(440, 442, 6),
(441, 443, 6),
(442, 444, 6),
(443, 445, 6),
(444, 446, 6),
(445, 447, 6),
(446, 448, 6),
(447, 449, 6),
(448, 450, 6),
(449, 451, 6),
(450, 452, 6),
(451, 453, 6),
(452, 454, 6),
(453, 455, 6),
(454, 456, 6),
(455, 457, 6),
(456, 458, 6),
(457, 459, 6),
(458, 460, 6),
(459, 461, 6),
(460, 462, 6),
(461, 463, 6),
(462, 464, 6),
(463, 465, 6),
(464, 466, 6),
(465, 467, 6),
(466, 468, 6),
(467, 469, 6),
(468, 470, 6),
(469, 471, 6),
(470, 472, 6),
(471, 473, 6),
(472, 474, 6),
(473, 475, 6),
(474, 476, 6),
(475, 477, 6),
(476, 478, 6),
(477, 479, 6),
(478, 480, 6),
(479, 481, 6),
(480, 482, 6),
(481, 483, 6),
(482, 484, 6),
(483, 485, 6),
(484, 486, 6),
(485, 487, 6),
(486, 488, 6),
(487, 489, 6),
(488, 490, 6),
(489, 491, 6),
(490, 492, 6),
(491, 493, 6),
(492, 494, 6),
(493, 495, 6),
(494, 496, 6),
(495, 497, 6),
(496, 498, 6),
(497, 499, 6),
(498, 500, 6),
(499, 501, 6),
(500, 502, 6),
(501, 503, 6),
(502, 505, 7),
(503, 506, 7),
(504, 507, 7),
(505, 508, 7),
(506, 509, 7),
(507, 510, 7),
(508, 511, 7),
(509, 512, 7),
(510, 513, 7),
(511, 514, 7),
(512, 515, 7),
(513, 516, 7),
(514, 517, 7),
(515, 518, 7),
(516, 519, 7),
(517, 520, 7),
(518, 521, 7),
(519, 522, 7),
(520, 523, 7),
(521, 524, 7),
(522, 525, 7),
(523, 526, 7),
(524, 527, 7),
(525, 528, 7),
(526, 529, 7),
(527, 530, 7),
(528, 531, 7),
(529, 532, 7),
(530, 533, 7),
(531, 534, 7),
(532, 535, 7),
(533, 536, 7),
(534, 537, 7),
(535, 538, 7),
(536, 539, 7),
(537, 540, 7),
(538, 541, 7),
(539, 542, 7),
(540, 543, 7),
(541, 544, 7),
(542, 545, 7),
(543, 546, 7),
(544, 547, 7),
(545, 548, 7),
(546, 549, 7),
(547, 550, 7),
(548, 551, 7),
(549, 552, 7),
(550, 553, 7),
(551, 554, 7),
(552, 555, 7),
(553, 556, 7),
(554, 557, 7),
(555, 558, 7),
(556, 559, 7),
(557, 560, 7),
(558, 561, 7),
(559, 562, 7),
(560, 563, 7),
(561, 564, 7),
(562, 565, 7),
(563, 566, 7),
(564, 567, 7),
(565, 568, 7),
(566, 569, 7),
(567, 570, 7),
(568, 571, 7),
(569, 572, 7),
(570, 573, 7),
(571, 574, 7),
(572, 575, 7),
(573, 576, 7),
(574, 577, 7),
(575, 578, 7),
(576, 579, 7),
(577, 580, 7),
(578, 581, 7),
(579, 582, 7),
(580, 583, 7),
(581, 584, 7),
(582, 585, 7),
(583, 586, 7),
(584, 587, 7),
(585, 588, 7),
(586, 589, 7),
(587, 590, 7),
(588, 591, 7),
(589, 592, 7),
(590, 593, 7),
(591, 594, 7),
(592, 595, 7),
(593, 596, 7),
(594, 597, 7),
(595, 598, 7),
(596, 599, 7),
(597, 600, 7),
(598, 601, 7),
(599, 602, 7),
(693, 603, 8),
(694, 604, 8),
(695, 605, 8),
(696, 606, 8),
(697, 607, 8),
(698, 608, 8),
(699, 609, 8),
(700, 610, 8),
(701, 611, 8),
(702, 612, 8),
(703, 613, 8),
(704, 614, 8),
(705, 615, 8),
(706, 616, 8),
(707, 617, 8),
(708, 618, 8),
(709, 619, 8),
(710, 620, 8),
(711, 621, 8),
(712, 622, 8),
(713, 623, 8),
(714, 624, 8),
(715, 625, 8),
(716, 626, 8),
(717, 627, 8),
(718, 628, 8),
(719, 629, 8),
(720, 630, 8),
(721, 631, 8),
(722, 632, 8),
(723, 633, 8),
(724, 634, 8),
(725, 635, 8),
(726, 636, 8),
(727, 637, 8),
(728, 638, 8),
(729, 639, 8),
(730, 640, 8),
(731, 641, 8),
(732, 642, 8),
(733, 643, 8),
(734, 644, 8),
(735, 645, 8),
(736, 646, 8),
(737, 647, 8),
(738, 648, 8),
(739, 649, 8),
(740, 650, 8),
(741, 651, 8),
(742, 652, 8),
(743, 653, 8),
(744, 654, 8),
(745, 655, 8),
(746, 656, 8),
(747, 657, 8),
(748, 658, 8),
(749, 659, 8),
(750, 660, 8),
(751, 661, 8),
(752, 662, 8),
(753, 663, 8),
(754, 664, 8),
(755, 665, 8),
(756, 666, 8),
(757, 667, 8),
(758, 668, 8),
(759, 669, 8),
(760, 670, 8),
(761, 671, 8),
(762, 672, 8),
(763, 673, 8),
(764, 674, 8),
(765, 675, 8),
(766, 676, 8),
(767, 677, 8),
(768, 678, 8),
(769, 679, 8),
(770, 680, 8),
(771, 681, 8),
(772, 682, 8),
(773, 683, 8),
(774, 684, 8),
(775, 685, 8),
(776, 686, 8),
(777, 687, 8),
(778, 688, 8),
(779, 689, 8),
(780, 690, 8),
(781, 691, 8),
(782, 692, 8),
(783, 693, 8),
(784, 694, 8),
(785, 695, 8),
(786, 697, 9),
(787, 698, 9),
(788, 699, 9),
(789, 700, 9),
(790, 701, 9),
(791, 702, 9),
(792, 703, 9),
(793, 704, 9),
(794, 705, 9),
(795, 706, 9),
(796, 707, 9),
(797, 708, 9),
(798, 709, 9),
(799, 710, 9),
(800, 711, 9),
(801, 712, 9),
(802, 713, 9),
(803, 714, 9),
(804, 715, 9),
(805, 716, 9),
(806, 717, 9),
(807, 718, 9),
(808, 719, 9),
(809, 720, 9),
(810, 721, 9),
(811, 722, 9),
(812, 723, 9),
(813, 724, 9),
(814, 725, 9),
(815, 726, 9),
(816, 727, 9),
(817, 728, 9),
(818, 729, 9),
(819, 730, 9),
(820, 731, 9),
(821, 732, 9),
(822, 733, 9),
(823, 734, 9),
(824, 735, 9),
(825, 736, 9),
(826, 737, 9),
(827, 738, 9),
(828, 739, 9),
(829, 740, 9),
(830, 741, 9),
(831, 742, 9),
(832, 743, 9),
(833, 744, 9),
(834, 745, 9),
(835, 746, 9),
(836, 747, 9),
(837, 748, 9),
(838, 749, 9),
(839, 750, 9),
(840, 751, 9),
(841, 752, 9),
(842, 753, 9),
(843, 754, 9),
(844, 755, 9),
(845, 756, 9),
(846, 757, 9),
(847, 758, 9),
(848, 759, 9),
(849, 760, 9),
(850, 761, 9),
(851, 762, 9),
(852, 763, 9),
(853, 764, 9),
(854, 765, 9),
(855, 766, 9),
(856, 767, 9),
(857, 768, 9),
(858, 769, 9),
(859, 770, 9),
(860, 771, 9),
(861, 772, 9),
(862, 773, 9),
(863, 774, 9),
(864, 775, 9),
(865, 776, 9),
(866, 777, 9),
(867, 778, 9),
(868, 779, 9),
(869, 780, 9),
(870, 781, 9),
(871, 782, 9),
(872, 783, 9),
(873, 784, 9),
(874, 785, 9),
(875, 786, 9),
(876, 787, 9),
(877, 788, 9),
(878, 789, 9),
(879, 790, 9),
(880, 791, 9),
(881, 792, 9),
(882, 793, 9),
(883, 794, 9),
(884, 795, 9),
(885, 796, 9),
(886, 797, 9),
(887, 798, 9),
(888, 799, 9),
(889, 800, 9),
(890, 801, 9),
(891, 802, 9),
(892, 803, 9),
(893, 804, 9),
(894, 805, 9),
(895, 806, 9),
(896, 807, 9),
(897, 808, 9),
(898, 809, 9),
(899, 810, 9),
(900, 811, 9),
(901, 812, 9),
(902, 813, 9),
(903, 814, 9),
(904, 815, 9),
(905, 816, 9),
(906, 817, 9),
(907, 818, 9),
(908, 819, 9),
(909, 820, 9),
(910, 821, 9),
(911, 822, 9),
(912, 823, 10),
(913, 824, 10),
(914, 825, 10),
(915, 826, 10),
(916, 827, 10),
(917, 828, 10),
(918, 829, 10),
(919, 830, 10),
(920, 831, 10),
(921, 832, 10),
(922, 833, 10),
(923, 834, 10),
(924, 835, 10),
(925, 836, 10),
(926, 837, 10),
(927, 838, 10),
(928, 839, 10),
(929, 840, 10),
(930, 841, 10),
(931, 842, 10),
(932, 843, 10),
(933, 844, 10),
(934, 845, 10),
(935, 846, 10),
(936, 847, 10),
(937, 848, 10),
(938, 849, 10),
(939, 850, 10),
(940, 851, 10),
(941, 852, 10),
(942, 853, 10),
(943, 854, 10),
(944, 855, 10),
(945, 856, 10),
(946, 857, 10),
(947, 858, 10),
(948, 859, 10),
(949, 860, 10),
(950, 861, 10),
(951, 862, 10),
(952, 863, 10),
(953, 864, 10),
(954, 865, 10),
(955, 866, 10),
(956, 867, 10),
(957, 868, 10),
(958, 869, 10),
(959, 870, 10),
(960, 871, 10),
(961, 872, 10),
(962, 873, 10),
(963, 874, 10),
(964, 875, 10),
(965, 876, 10),
(966, 877, 10),
(967, 878, 10),
(968, 879, 10),
(969, 880, 10),
(970, 881, 10),
(971, 882, 10),
(972, 883, 10),
(973, 884, 10),
(974, 885, 10),
(975, 886, 10),
(976, 887, 10),
(977, 888, 10),
(978, 889, 10),
(979, 890, 10),
(980, 891, 10),
(981, 892, 10),
(982, 893, 10),
(983, 894, 10),
(984, 895, 10),
(985, 896, 10),
(986, 897, 10),
(987, 898, 10),
(988, 899, 10),
(989, 900, 10),
(990, 901, 10),
(991, 902, 10),
(992, 903, 10),
(993, 904, 10),
(994, 905, 10),
(995, 906, 10),
(996, 907, 10),
(997, 908, 10),
(998, 909, 10),
(999, 910, 10),
(1000, 911, 10),
(1001, 912, 10),
(1002, 913, 10),
(1003, 914, 10),
(1004, 915, 10),
(1005, 916, 10),
(1006, 917, 10),
(1007, 918, 10),
(1008, 919, 10),
(1009, 920, 10),
(1010, 921, 10),
(1011, 922, 10),
(1012, 923, 10),
(1013, 924, 10),
(1014, 925, 10),
(1015, 926, 10),
(1016, 927, 10),
(1017, 928, 10),
(1018, 929, 10),
(1019, 930, 10),
(1020, 931, 10),
(1021, 932, 10),
(1022, 933, 10),
(1023, 934, 10),
(1024, 935, 10),
(1025, 936, 10),
(1026, 937, 10),
(1027, 938, 10),
(1028, 939, 10),
(1029, 940, 10),
(1030, 941, 11),
(1031, 942, 11),
(1032, 943, 11),
(1033, 944, 11),
(1034, 945, 11),
(1035, 946, 11),
(1036, 947, 11),
(1037, 948, 11),
(1038, 949, 11),
(1039, 950, 11),
(1040, 951, 11),
(1041, 952, 11),
(1042, 953, 11),
(1043, 954, 11),
(1044, 955, 11),
(1045, 956, 11),
(1046, 957, 11),
(1047, 958, 11),
(1048, 959, 11),
(1049, 960, 11),
(1050, 961, 11),
(1051, 962, 11),
(1052, 963, 11),
(1053, 964, 11),
(1054, 965, 11),
(1055, 966, 11),
(1056, 967, 11),
(1057, 968, 11),
(1058, 969, 11),
(1059, 970, 11),
(1060, 971, 11),
(1061, 972, 11),
(1062, 973, 11),
(1063, 974, 11),
(1064, 975, 11),
(1065, 976, 11),
(1066, 977, 11),
(1067, 978, 11),
(1068, 979, 11),
(1069, 980, 11),
(1070, 981, 11),
(1071, 982, 11),
(1072, 983, 11),
(1073, 984, 11),
(1074, 985, 11),
(1075, 986, 11),
(1076, 987, 11),
(1077, 988, 11),
(1078, 989, 11),
(1079, 990, 11),
(1080, 991, 11),
(1081, 992, 11),
(1082, 993, 11),
(1083, 994, 11),
(1084, 995, 11),
(1085, 996, 11),
(1086, 997, 11),
(1087, 998, 11),
(1088, 999, 11),
(1089, 1000, 11),
(1090, 1001, 11),
(1091, 1002, 11),
(1092, 1003, 11),
(1093, 1004, 11),
(1094, 1005, 11),
(1095, 1006, 11),
(1096, 1007, 11),
(1097, 1008, 11),
(1098, 1009, 11),
(1099, 1010, 11),
(1100, 1011, 11),
(1101, 1012, 11),
(1102, 1013, 11),
(1103, 1014, 11),
(1104, 1015, 11),
(1105, 1016, 11),
(1106, 1017, 11),
(1107, 1018, 11),
(1108, 1019, 11),
(1109, 1020, 11),
(1110, 1021, 11),
(1111, 1022, 11),
(1112, 1023, 11),
(1113, 1024, 11),
(1114, 1025, 11),
(1115, 1026, 11),
(1116, 1027, 11),
(1117, 1028, 11),
(1118, 1029, 11),
(1119, 1030, 11),
(1120, 1031, 11),
(1121, 1032, 11),
(1122, 1033, 11),
(1123, 1034, 11),
(1124, 1035, 11),
(1125, 1036, 11),
(1126, 1037, 11),
(1127, 1038, 11),
(1128, 1039, 11),
(1129, 1040, 11),
(1130, 1041, 11),
(1131, 1042, 11),
(1132, 1043, 11),
(1133, 1044, 11),
(1134, 1045, 11),
(1135, 1046, 11),
(1136, 1047, 11),
(1137, 1048, 11),
(1138, 1049, 11),
(1139, 1050, 11),
(1140, 1051, 11),
(1141, 1052, 11),
(1142, 1053, 11),
(1143, 1054, 11),
(1144, 1055, 11),
(1145, 1056, 11),
(1146, 1057, 11),
(1147, 1058, 11),
(1148, 1059, 11),
(1149, 1060, 11),
(1150, 1061, 11),
(1151, 1062, 11),
(1152, 1063, 11),
(1153, 1064, 11),
(1154, 1065, 11),
(1155, 1066, 11),
(1156, 1067, 11),
(1157, 1068, 11),
(1158, 1075, 12),
(1159, 1076, 12),
(1160, 1077, 12),
(1161, 1078, 12),
(1162, 1079, 12),
(1163, 1080, 12),
(1164, 1081, 12),
(1165, 1082, 12),
(1166, 1083, 12),
(1167, 1084, 12),
(1168, 1085, 12),
(1169, 1086, 12),
(1170, 1087, 12),
(1171, 1088, 12),
(1172, 1089, 12),
(1173, 1090, 12),
(1174, 1091, 12),
(1175, 1092, 12),
(1176, 1093, 12),
(1177, 1094, 12),
(1178, 1095, 12),
(1179, 1096, 12),
(1180, 1097, 12),
(1181, 1098, 12),
(1182, 1099, 12),
(1183, 1100, 12),
(1184, 1101, 12),
(1185, 1102, 12),
(1186, 1103, 12),
(1187, 1104, 12),
(1188, 1105, 12),
(1189, 1106, 12),
(1190, 1107, 12),
(1191, 1108, 12),
(1192, 1109, 12),
(1193, 1110, 12),
(1194, 1111, 12),
(1195, 1112, 12),
(1196, 1113, 12),
(1197, 1114, 12),
(1198, 1115, 12),
(1199, 1116, 12),
(1200, 1117, 12),
(1201, 1118, 12),
(1202, 1119, 12),
(1203, 1120, 12),
(1204, 1121, 12),
(1205, 1122, 12),
(1206, 1123, 12),
(1207, 1124, 12),
(1208, 1125, 12),
(1209, 1126, 12),
(1210, 1127, 12),
(1211, 1128, 12),
(1212, 1129, 12),
(1213, 1130, 12),
(1214, 1131, 12),
(1215, 1132, 12),
(1216, 1133, 12),
(1217, 1134, 12),
(1218, 1135, 12),
(1219, 1136, 12),
(1220, 1137, 12),
(1221, 1138, 12),
(1222, 1139, 12),
(1223, 1140, 12),
(1224, 1141, 12),
(1225, 1142, 12),
(1226, 1143, 12),
(1227, 1144, 12),
(1228, 1145, 12),
(1229, 1146, 12),
(1230, 1147, 12),
(1231, 1148, 12),
(1232, 1149, 12),
(1233, 1150, 12),
(1234, 1151, 12),
(1235, 1152, 12),
(1236, 1153, 12),
(1237, 1154, 12),
(1238, 1155, 12),
(1239, 1156, 12),
(1240, 1157, 12),
(1241, 1158, 12),
(1242, 1159, 12),
(1243, 1160, 12),
(1244, 1161, 12),
(1245, 1162, 12),
(1246, 1163, 12),
(1247, 1164, 12),
(1248, 1165, 12),
(1249, 1166, 12),
(1250, 1167, 12),
(1251, 1168, 12),
(1252, 1169, 12),
(1253, 1170, 12),
(1254, 1171, 12),
(1255, 1172, 12),
(1256, 1173, 12),
(1257, 1174, 12),
(1258, 1175, 12),
(1259, 1176, 12),
(1260, 1177, 12),
(1261, 1178, 12),
(1262, 1179, 12),
(1263, 1180, 12),
(1264, 1181, 12),
(1265, 1182, 12),
(1266, 1183, 12),
(1267, 1184, 12),
(1268, 1185, 12),
(1269, 1186, 12),
(1270, 1187, 12),
(1271, 1188, 12),
(1272, 1189, 12),
(1273, 1190, 12),
(1274, 1191, 12),
(1275, 1192, 12),
(1276, 1193, 12),
(1277, 1194, 12),
(1278, 1195, 12),
(1279, 1196, 12),
(1280, 1197, 12),
(1281, 1198, 12),
(1282, 1199, 12),
(1283, 1200, 12),
(1284, 1201, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
CREATE TABLE IF NOT EXISTS `parcelas` (
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
  KEY `forma_de_cobranca_idx` (`forma_de_cobranca`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parcelas`
--

INSERT INTO `parcelas` (`id`, `valor`, `dataVencimento`, `categoria`, `desconto`, `bolsa`, `situacao_parcela`, `observacoes`, `numero`, `aluno`, `valor_recebido`, `troco`, `operadora_de_cartao`, `data_recebimento`, `desconto_momento_recebimento`, `forma_de_cobranca`, `complemento`, `documento`) VALUES
(1, 246.5, '2018-07-10', 1, 10, 36, 'Quitada', NULL, 1, 1, 250, 13.5, 4, '2018-07-15', 0, 4, NULL, NULL),
(2, 246.5, '2018-07-10', 1, 10, 36, 'Quitada', NULL, 2, 1, 250, 13.5, NULL, '2018-07-18', 0, 1, NULL, NULL),
(3, 246.5, '2018-08-10', 1, 10, 36, 'Pendente', NULL, 3, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(4, 246.5, '2018-09-10', 1, 10, 36, 'Pendente', NULL, 4, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(5, 246.5, '2018-10-10', 1, 10, 36, 'Pendente', NULL, 5, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(6, 246.5, '2018-11-10', 1, 10, 36, 'Pendente', NULL, 6, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(7, 246.5, '2018-12-10', 1, 10, 36, 'Pendente', NULL, 7, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(8, 246.5, '2019-01-10', 1, 10, 36, 'Pendente', NULL, 8, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(9, 246.5, '2019-02-10', 1, 10, 36, 'Pendente', NULL, 9, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(10, 246.5, '2019-03-10', 1, 10, 36, 'Pendente', NULL, 10, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(11, 246.5, '2019-04-10', 1, 10, 36, 'Quitada', NULL, 11, 1, 250, 13.5, NULL, '2018-07-25', 0, 6, NULL, NULL),
(12, 246.5, '2019-05-10', 1, 10, 36, 'Pendente', NULL, 12, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(13, 246.5, '2018-07-20', 1, 0, 36, 'Quitada', NULL, 1, 12, 250, 3.5, NULL, '2018-07-18', 0, 6, NULL, NULL),
(14, 246.5, '2018-07-20', 1, 0, 36, 'Pendente', NULL, 2, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(15, 246.5, '2018-08-20', 1, 0, 36, 'Pendente', NULL, 3, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(16, 246.5, '2018-09-20', 1, 0, 36, 'Pendente', NULL, 4, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(17, 246.5, '2018-10-20', 1, 0, 36, 'Pendente', NULL, 5, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(18, 246.5, '2018-11-20', 1, 0, 36, 'Pendente', NULL, 6, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(19, 246.5, '2018-12-20', 1, 0, 36, 'Pendente', NULL, 7, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(20, 246.5, '2019-01-20', 1, 0, 36, 'Pendente', NULL, 8, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(21, 246.5, '2019-02-20', 1, 0, 36, 'Pendente', NULL, 9, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(22, 246.5, '2019-03-20', 1, 0, 36, 'Pendente', NULL, 10, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(23, 246.5, '2019-04-20', 1, 0, 36, 'Pendente', NULL, 11, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(24, 246.5, '2019-05-20', 1, 0, 36, 'Pendente', NULL, 12, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(25, 144.5, '2018-08-10', 1, 0, NULL, 'Quitada', NULL, 1, 1, 150, 5.5, NULL, '2018-07-25', 0, 1, 'Complemento...', 'Documento...'),
(26, 144.5, '2018-08-10', 1, 0, NULL, 'Pendente', NULL, 2, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(27, 144.5, '2018-09-10', 1, 0, NULL, 'Pendente', NULL, 3, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(28, 144.5, '2018-10-10', 1, 0, NULL, 'Pendente', NULL, 4, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(29, 144.5, '2018-11-10', 1, 0, NULL, 'Pendente', NULL, 5, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(30, 144.5, '2018-12-10', 1, 0, NULL, 'Pendente', NULL, 6, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(31, 144.5, '2019-01-10', 1, 0, NULL, 'Pendente', NULL, 7, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(32, 144.5, '2019-02-10', 1, 0, NULL, 'Pendente', NULL, 8, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(33, 144.5, '2019-03-10', 1, 0, NULL, 'Pendente', NULL, 9, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(34, 144.5, '2019-04-10', 1, 0, NULL, 'Pendente', NULL, 10, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(35, 144.5, '2019-05-10', 1, 0, NULL, 'Pendente', NULL, 11, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(36, 144.5, '2019-06-10', 1, 0, NULL, 'Pendente', NULL, 12, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(37, 144.5, '2018-08-10', 1, 0, NULL, 'Quitada', NULL, 1, 1, 145, 0.5, NULL, '2018-07-25', 0, 9, 'Complemento...', 'Documento...'),
(38, 144.5, '2018-08-10', 1, 0, NULL, 'Pendente', NULL, 2, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(39, 144.5, '2018-09-10', 1, 0, NULL, 'Pendente', NULL, 3, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(40, 144.5, '2018-10-10', 1, 0, NULL, 'Pendente', NULL, 4, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(41, 144.5, '2018-11-10', 1, 0, NULL, 'Pendente', NULL, 5, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(42, 144.5, '2018-12-10', 1, 0, NULL, 'Pendente', NULL, 6, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(43, 144.5, '2019-01-10', 1, 0, NULL, 'Pendente', NULL, 7, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(44, 144.5, '2019-02-10', 1, 0, NULL, 'Pendente', NULL, 8, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(45, 144.5, '2019-03-10', 1, 0, NULL, 'Pendente', NULL, 9, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(46, 144.5, '2019-04-10', 1, 0, NULL, 'Pendente', NULL, 10, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(47, 144.5, '2019-05-10', 1, 0, NULL, 'Pendente', NULL, 11, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...'),
(48, 144.5, '2019-06-10', 1, 0, NULL, 'Pendente', NULL, 12, 1, NULL, NULL, NULL, NULL, 0, NULL, 'Complemento...', 'Documento...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelas_categorias`
--

DROP TABLE IF EXISTS `parcelas_categorias`;
CREATE TABLE IF NOT EXISTS `parcelas_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parcelas_categorias`
--

INSERT INTO `parcelas_categorias` (`id`, `nome`) VALUES
(14, 'Acordo'),
(13, 'Aula VIP'),
(12, 'Book'),
(11, 'Devolução de Cheques'),
(10, 'Estorno de Parcelas'),
(9, 'Juros'),
(1, 'Mensalidade'),
(8, 'Mensalidade Retroativa'),
(7, 'Misto'),
(6, 'Recisão'),
(2, 'Taxa de Matrícula'),
(3, 'Tranca'),
(4, 'Transferência'),
(5, 'Troco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcerias`
--

DROP TABLE IF EXISTS `parcerias`;
CREATE TABLE IF NOT EXISTS `parcerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `descontoMensalidade` int(11) DEFAULT '0',
  `descontoMatricula` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parcerias`
--

INSERT INTO `parcerias` (`id`, `nome`, `descricao`, `descontoMensalidade`, `descontoMatricula`) VALUES
(5, 'Loja Qualquer', '', 0, 0),
(6, 'Loja Zezinho', 'parceria com a Loja Zezinho.', 45, 35),
(8, 'Loja da Lílian', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `programacao_estagios`
--

DROP TABLE IF EXISTS `programacao_estagios`;
CREATE TABLE IF NOT EXISTS `programacao_estagios` (
  `IdProgramacao_Estagio` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `PaginaInicial` int(11) NOT NULL,
  `PaginaFinal` int(11) NOT NULL,
  `IdEstagio` int(11) NOT NULL,
  PRIMARY KEY (`IdProgramacao_Estagio`),
  KEY `IdEstagio_Programacao_Estagios_idx` (`IdEstagio`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `programacao_estagios`
--

INSERT INTO `programacao_estagios` (`IdProgramacao_Estagio`, `Numero`, `PaginaInicial`, `PaginaFinal`, `IdEstagio`) VALUES
(1, 1, 1, 3, 2),
(2, 2, 4, 6, 2),
(3, 3, 7, 9, 2),
(4, 4, 10, 12, 2),
(5, 5, 13, 15, 2),
(6, 6, 16, 18, 2),
(7, 7, 19, 21, 2),
(8, 8, 22, 24, 2),
(9, 9, 25, 27, 2),
(10, 10, 28, 30, 2),
(11, 11, 31, 33, 2),
(12, 12, 34, 36, 2),
(13, 13, 37, 39, 2),
(14, 14, 40, 42, 2),
(15, 15, 43, 45, 2),
(16, 16, 46, 48, 2),
(17, 17, 49, 50, 2),
(18, 18, 51, 52, 2),
(19, 1, 53, 55, 3),
(20, 2, 56, 58, 3),
(21, 3, 59, 61, 3),
(22, 4, 62, 64, 3),
(23, 5, 65, 67, 3),
(24, 6, 68, 70, 3),
(25, 7, 71, 73, 3),
(26, 8, 74, 76, 3),
(27, 9, 77, 79, 3),
(28, 10, 80, 82, 3),
(29, 11, 83, 85, 3),
(30, 12, 86, 88, 3),
(31, 13, 89, 91, 3),
(32, 14, 92, 94, 3),
(33, 15, 95, 97, 3),
(34, 16, 98, 101, 3),
(35, 17, 102, 104, 3),
(36, 18, 105, 107, 3),
(37, 19, 108, 110, 3),
(38, 20, 111, 113, 3),
(39, 21, 114, 116, 3),
(40, 22, 117, 119, 3),
(41, 23, 120, 123, 3),
(42, 24, 124, 126, 3),
(43, 25, 127, 128, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

DROP TABLE IF EXISTS `responsaveis`;
CREATE TABLE IF NOT EXISTS `responsaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `aluno` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno` (`aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id`, `nome`, `telefone`, `celular`, `aluno`) VALUES
(1, 'Déa Mello', '', '', 22),
(2, 'Sérgio Brandão', '', '', 22),
(3, '', '', '', 23),
(4, '', '', '', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleNome` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`roleId`, `roleNome`) VALUES
(1, 'Administrador'),
(2, 'Funcionário'),
(3, 'Professor'),
(4, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_de_contratos`
--

DROP TABLE IF EXISTS `situacoes_de_contratos`;
CREATE TABLE IF NOT EXISTS `situacoes_de_contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacoes_de_contratos`
--

INSERT INTO `situacoes_de_contratos` (`id`, `nome`, `descricao`) VALUES
(1, 'Vigente', 'Contrato em andamento atualmente. Os alunos ativos devem ter pelo menos um contrato vigente. '),
(2, 'Encerrado', 'O contrato foi cumprido normalmente e chegou ao seu término. Após encerrado o contrato não é possível realizar movimentações adicionais. ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_de_parcelas`
--

DROP TABLE IF EXISTS `situacoes_de_parcelas`;
CREATE TABLE IF NOT EXISTS `situacoes_de_parcelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacoes_de_parcelas`
--

INSERT INTO `situacoes_de_parcelas` (`id`, `nome`) VALUES
(3, 'Cancelada'),
(1, 'Pendente'),
(2, 'Quitada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_de_contratos`
--

DROP TABLE IF EXISTS `tipos_de_contratos`;
CREATE TABLE IF NOT EXISTS `tipos_de_contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_de_contratos`
--

INSERT INTO `tipos_de_contratos` (`id`, `nome`) VALUES
(1, 'Matrícula'),
(2, 'Rematrícula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
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
  KEY `curso` (`curso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `situacao`, `professor`, `estagio`, `curso`, `horario`, `maximoDeAlunos`, `sala`, `dataInicio`, `dataTermino`, `ultimaPalavra`, `ultimaLicao`, `ultimoDitado`, `minimoAlunos`, `duracaoAula`) VALUES
(2, 'Alan', 2, 20, '2', 1, 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', NULL, 'Australia', '2018-05-01', '2019-05-01', NULL, NULL, NULL, 10, 50),
(3, 'Eunice', 0, 21, '5', 4, 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', NULL, 'United States', '2018-05-01', '2019-05-01', NULL, NULL, NULL, 10, 50),
(4, 'Pretinha', 1, 20, '2', 1, 'Seg-Ter-Qua-Qui-Sex(15:00/15:50)', NULL, 'United States', '2018-05-01', '2020-02-01', NULL, NULL, NULL, 10, 50);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `IdProfessor` FOREIGN KEY (`Professor`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdProgramacaoEstagio` FOREIGN KEY (`IdProgramacaoEstagio`) REFERENCES `programacao_estagios` (`IdProgramacao_Estagio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdTurma` FOREIGN KEY (`IdTurma`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Pagina` FOREIGN KEY (`Pagina`) REFERENCES `paginas` (`IdPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`situacao`) REFERENCES `situacoes_de_contratos` (`id`),
  ADD CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tipos_de_contratos` (`id`),
  ADD CONSTRAINT `contratos_ibfk_4` FOREIGN KEY (`atendente1`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `contratos_ibfk_5` FOREIGN KEY (`atendente2`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `contratos_ibfk_6` FOREIGN KEY (`atendente3`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `contratos_ibfk_7` FOREIGN KEY (`matricula`) REFERENCES `matriculas` (`id`),
  ADD CONSTRAINT `contratos_ibfk_8` FOREIGN KEY (`contratante`) REFERENCES `responsaveis` (`id`);

--
-- Limitadores para a tabela `estagios`
--
ALTER TABLE `estagios`
  ADD CONSTRAINT `IdLivro` FOREIGN KEY (`IdLivro`) REFERENCES `livros` (`IdLivro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `estagios_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `juros_de_operadores_de_cartao`
--
ALTER TABLE `juros_de_operadores_de_cartao`
  ADD CONSTRAINT `operadora_de_cartao` FOREIGN KEY (`operadora_de_cartao`) REFERENCES `operadoras_de_cartao` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `IdLivroPagina` FOREIGN KEY (`IdLivro`) REFERENCES `livros` (`IdLivro`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `parcelas`
--
ALTER TABLE `parcelas`
  ADD CONSTRAINT `aluno` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bandeira` FOREIGN KEY (`operadora_de_cartao`) REFERENCES `operadoras_de_cartao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `parcelas_categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `forma_de_cobranca` FOREIGN KEY (`forma_de_cobranca`) REFERENCES `formas_de_cobrancas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `situacao_parcela` FOREIGN KEY (`situacao_parcela`) REFERENCES `situacoes_de_parcelas` (`nome`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `programacao_estagios`
--
ALTER TABLE `programacao_estagios`
  ADD CONSTRAINT `IdEstagio_Programacao_Estagios` FOREIGN KEY (`IdEstagio`) REFERENCES `estagios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD CONSTRAINT `responsaveis_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`professor`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
