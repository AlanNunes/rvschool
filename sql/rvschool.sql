-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Maio-2018 às 03:35
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

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `matricula`, `nome`, `rg`, `cpf`, `dataNasc`, `estadoCivil`, `sexo`, `profissao`, `escolaridade`, `midia`, `cep`, `logradouro`, `numeroCasa`, `complemento`, `cidade`, `bairro`, `email`, `telefone`, `celular`, `banco`, `agencia`, `conta`, `codigoClienteBanco`, `bolsa`, `inadimplencia`, `nomeResponsavelUm`, `telefoneResponsavelUm`, `celularResponsavelUm`, `nomeResponsavelDois`, `telefoneResponsavelDois`, `celularResponsavelDois`, `observacoes`, `avatar`, `ativo`) VALUES
(1, '2018-1', 'Alan Nunes da Silva', '132.123.124-8', '651.897.403-66', '2000-04-29', 'solteiro', 'masculino', '', 'Ensino Superior', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '', '(24) 998844351', 'Bradesco', '', '', '', 0, 0, 'Eunice Maria Ferreira Nunes', '', '', 'Anderson Mariano da Cruz Silva', '', '', '', '1522602945.jpg', 1),
(2, '2018-2', 'Steven Paul Jobs', '123.321.123-3', '123.321.123-12', '1955-02-24', 'solteiro', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'San Francisco', 'Palo Alto', 'stevejobs@apple.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1522612719.jpg', 0),
(3, '2018-3', 'William Henry Gates III', '321.123.321-3', '321.123.321-32', '1955-10-28', 'casado', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'Lake Washington in Medina, Washington', 'Medina', 'billgates@microsoft.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1522613743.jpg', 1),
(9, '2018-9', 'Yeah Thats Me', '77.777.777-7', '777.777.777-77', '2000-04-29', 'casado', 'masculino', '', 'Ensino Superior', 'Internet', '27259-290', 'Rua Vinte e Sete', 77, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'thatsmes@me.com.br', '', '(24) 999999999', 'Banco do Brasil', '7777777', '777777777', '77777777', 0, 0, '', '', '', '', '', '', '', '1523309805.jpg', 1),
(10, '2018-10', 'Teste Som 777', '77.777.777-7', '777.777.777-77', '2000-04-29', 'solteiro', 'masculino', 'Estagiário de TI', 'Ensino Superior', 'Amigos', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alannunes@ugb.edu.br', '', '(24) 998844351', 'Santander', '', '', '', 0, 0, '', '', '', '', '', '', '', '1523451520.jpg', 1),
(12, '2018-12', 'hlhlhlkh', '', '777.777.777-77', '1997-12-12', 'solteiro', 'masculino', '', 'Ensino Superior', 'Outros', '27259-290', 'Rua Vinte e Sete', 77, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', '', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1523309805.jpg', 1),
(13, '2018-13', 'Alan Nunes da Silva', '132.123.124-8', '651.897.403-66', '2000-04-29', 'solteiro', 'masculino', '', 'Ensino Superior', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '', '(24) 998844351', 'Bradesco', '', '', '', 0, 0, 'Eunice Maria Ferreira Nunes', '', '', 'Anderson Mariano da Cruz Silva', '', '', '', '1522602945.jpg', 1),
(14, '2018-14', 'Alan Nunes da Silva', '132.123.124-8', '651.897.403-66', '2000-04-29', 'solteiro', 'masculino', '', 'Ensino Superior', '', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '', '(24) 998844351', 'Bradesco', '', '', '', 0, 0, 'Eunice Maria Ferreira Nunes', '', '', 'Anderson Mariano da Cruz Silva', '', '', '', '1522602945.jpg', 1),
(15, '2018-15', 'William Henry Gates III', '321.123.321-3', '321.123.321-32', '1955-10-28', 'casado', 'masculino', '', 'Ensino Superior', '', '', 'Street 17', 17, '', 'Lake Washington in Medina, Washington', 'Medina', 'billgates@microsoft.com', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1522613743.jpg', 1),
(16, '2018-16', 'hlhlhlkh', '', '777.777.777-77', '1997-12-12', 'solteiro', 'masculino', '', 'Ensino Superior', 'Outros', '27259-290', 'Rua Vinte e Sete', 77, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', '', '', '(24) 998844351', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '1523309805.jpg', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bolsas`
--

INSERT INTO `bolsas` (`id`, `nome`, `descricao`, `desconto`, `fixa`, `dataInicio`, `dataTermino`) VALUES
(31, 'Bolsa Inglês Gold Temporária', 'Bolsa temporária de 75% de desconto no curso de Inglês.', 75, 0, '2018-03-28', '2018-03-31'),
(32, 'Bolsa Inglês Gold', 'Bolsa de 75% de desconto no curso de inglês.', 75, 1, NULL, NULL),
(33, 'Bolsa Silver Gold Temporária', 'Bolsa temporária de 50% de desconto no curso de inglês.', 50, 0, '2018-03-29', '2018-03-30'),
(35, 'Páscoa', 'Bolsa de páscoa.', 50, 0, '2018-03-30', '2018-04-01'),
(36, 'Bolsa de Inverno', 'Bolsa destinada a alunos que sentem muito frio.', 35, 0, '2018-06-01', '2018-07-01');

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
  `contratante` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `aluno` (`aluno`),
  KEY `situacao` (`situacao`),
  KEY `tipo` (`tipo`),
  KEY `atendente1` (`atendente1`),
  KEY `atendente2` (`atendente2`),
  KEY `atendente3` (`atendente3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estagios`
--

INSERT INTO `estagios` (`id`, `nome`, `curso`) VALUES
(2, 'Estágio 1', 1),
(3, 'Estágio 2', 1),
(4, 'Estágio 3', 1),
(5, 'Estágio 4', 1),
(6, 'Estágio 5', 1),
(7, 'Estágio 6', 1);

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
(20, 'Dienidude Flausino', '11.111.111-1', '111.111.111-11', '1990-08-18', 'solteiro', 'feminino', '3', 'Volta Redonda - RJ', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'dieni@rvschool.com', '(24) 3333-3333', '(24) 99999-9999', 'mensalista', '111111', '111', 5, '2018-04-03', '111', 3, NULL, NULL, NULL, 10, '3', '111111-1', '1111111-1', '77777777-7', '', ''),
(21, 'Alan Nunes da Silva', '77.777.777-7', '777.777.777-77', '2000-04-29', 'solteiro', 'masculino', '3', 'Volta Redonda', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '(24) 9988-4435', '', 'horista', '777', '777', 7, '2018-04-29', '777', 7, NULL, 200, 200, NULL, 'Banco do Brasil', '7777777', '7777777', '7777777777', '', ''),
(22, 'Teste', '77.777.777-7', '777.777.777-77', '2000-04-29', 'solteiro', 'masculino', '3', 'Volta Redonda', '27259-290', 'Rua Vinte e Sete', 28, '', 'Volta Redonda', 'Jardim Vila Rica - Tiradentes', 'alann.625@gmail.com', '(24) 9988-4435', '', 'horista', '777', '777', 7, '2018-04-29', '777', 7, NULL, 200, 200, NULL, 'Banco do Brasil', '7777777', '7777777', '7777777777', '', '');

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
  PRIMARY KEY (`id`),
  KEY `aluno` (`aluno`),
  KEY `turma` (`turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parcerias`
--

INSERT INTO `parcerias` (`id`, `nome`, `descricao`, `descontoMensalidade`, `descontoMatricula`) VALUES
(5, 'Loja Qualquer', '', 0, 0),
(6, 'Loja Zezinho', 'parceria com a Loja Zezinho.', 45, 35);

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
(2, 'Alan', 2, 10, '4', 1, 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', NULL, 'United States', '2018-05-01', '2019-05-01', NULL, NULL, NULL, 10, 50),
(3, 'Eunice', 0, 21, '5', 4, 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', NULL, 'United States', '2018-05-01', '2019-05-01', NULL, NULL, NULL, 10, 50),
(4, 'Pretinha', 1, 20, '2', 1, 'Seg-Ter-Qua-Qui-Sex(15:00/15:50)', NULL, 'United States', '2018-05-01', '2020-02-01', NULL, NULL, NULL, 10, 50);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`situacao`) REFERENCES `situacoes_de_contratos` (`id`),
  ADD CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tipos_de_contratos` (`id`),
  ADD CONSTRAINT `contratos_ibfk_4` FOREIGN KEY (`atendente1`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `contratos_ibfk_5` FOREIGN KEY (`atendente2`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `contratos_ibfk_6` FOREIGN KEY (`atendente3`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `estagios`
--
ALTER TABLE `estagios`
  ADD CONSTRAINT `estagios_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turmas` (`id`);

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
