-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Abr-2018 às 18:31
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
CREATE DATABASE IF NOT EXISTS `rvschool` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rvschool`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `cpf` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `estadoCivil` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `escola` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `escolaridade` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `serie` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `matricula`, `nome`, `rg`, `cpf`, `dataNasc`, `estadoCivil`, `sexo`, `escola`, `escolaridade`, `serie`, `cep`, `logradouro`, `numeroCasa`, `complemento`, `cidade`, `bairro`, `email`, `telefone`, `celular`, `banco`, `agencia`, `conta`, `codigoClienteBanco`, `bolsa`, `inadimplencia`, `nomeResponsavelUm`, `telefoneResponsavelUm`, `celularResponsavelUm`, `nomeResponsavelDois`, `telefoneResponsavelDois`, `celularResponsavelDois`, `observacoes`, `avatar`, `ativo`) VALUES
(1, '2018-1', 'Alan Nunes da Silva', '132.123.124-8', '651.897.403-66', '2000-04-29', 'solteiro', 'masculino', '', 'Ensino Superior', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '', '(24) 998844351', 'Bradesco', '', '', '', 32, 0, 'Eunice Maria Ferreira Nunes', '', '', 'Anderson Mariano da Cruz Silva', '', '', 'Aluno disse já ter estudado inglês em casa como autodidata e está muito feliz por ter ganhado a bolsa de desconto.', '1522602945.jpg', 1),
(2, '2018-2', 'Steven Paul Jobs', '123.321.123-3', '123.321.123-12', '1955-02-24', 'solteiro', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'San Francisco', 'Palo Alto', 'stevejobs@apple.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1522612719.jpg', 0),
(3, '2018-3', 'William Henry Gates III', '321.123.321-3', '321.123.321-32', '1955-10-28', 'casado', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'Lake Washington in Medina, Washington', 'Medina', 'billgates@microsoft.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1522613743.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsas`
--

CREATE TABLE IF NOT EXISTS `bolsas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `desconto` int(11) NOT NULL,
  `fixa` tinyint(4) NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataTermino` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bolsas`
--

INSERT INTO `bolsas` (`id`, `nome`, `descricao`, `desconto`, `fixa`, `dataInicio`, `dataTermino`) VALUES
(31, 'Bolsa Inglês Gold Temporária', 'Bolsa temporária de 75% de desconto no curso de Inglês.', 75, 0, '2018-03-28', '2018-03-31'),
(32, 'Bolsa Inglês Gold', 'Bolsa de 75% de desconto no curso de inglês.', 75, 1, NULL, NULL),
(33, 'Bolsa Silver Gold Temporária', 'Bolsa temporária de 50% de desconto no curso de inglês.', 50, 0, '2018-03-29', '2018-03-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `cargoId` int(11) NOT NULL AUTO_INCREMENT,
  `cargoNome` varchar(100) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`cargoId`),
  KEY `roleId` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `estadoCivil` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `cidadeNatal` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `tipoDePagamento` varchar(45) NOT NULL,
  `carteiraProfissional` varchar(45) NOT NULL,
  `inss` varchar(45) NOT NULL,
  `percentualInss` int(11) NOT NULL,
  `dataDeAdmissao` date NOT NULL,
  `cmm` varchar(45) NOT NULL,
  `percentualIss` int(11) NOT NULL,
  `dataDeDemissao` date DEFAULT NULL,
  `pagamentoAulaInterna` int(11) DEFAULT NULL,
  `pagamentoAulaExterna` int(11) DEFAULT NULL,
  `pagamentoMensal` int(11) DEFAULT NULL,
  `banco` int(11) NOT NULL,
  `agencia` varchar(45) NOT NULL,
  `conta` varchar(45) NOT NULL,
  `codigoBanco` varchar(45) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `anexo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleNome` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estrutura da tabela `turmas`
--

CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  `professor` varchar(45) DEFAULT NULL,
  `estagio` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `horario` varchar(45) NOT NULL,
  `maximoDeAlunos` int(11) NOT NULL,
  `sala` varchar(45) NOT NULL,
  `duracaoDaAula` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `ultimaPalavra` varchar(45) NOT NULL,
  `ultimaLicao` int(11) NOT NULL,
  `ultimoSitato` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `situacao`, `professor`, `estagio`, `curso`, `horario`, `maximoDeAlunos`, `sala`, `duracaoDaAula`, `dataInicio`, `dataTermino`, `ultimaPalavra`, `ultimaLicao`, `ultimoSitato`) VALUES
(1, 'Turma 1', 1, 'Marcos Junior', 'fluente', 'That&#39;s the way', 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', 50, 'United States', 50, '2018-04-25', '2020-04-28', 'Truth', 150, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
