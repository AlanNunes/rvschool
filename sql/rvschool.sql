-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Set-2018 às 01:58
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `situacao`, `professor`, `estagio`, `curso`, `horario`, `maximoDeAlunos`, `sala`, `dataInicio`, `dataTermino`, `ultimaPalavra`, `ultimaLicao`, `ultimoDitado`, `minimoAlunos`, `duracaoAula`) VALUES
(2, 'London', 2, 58, '2', 1, 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', NULL, 'England', '2018-10-01', '2019-10-01', NULL, NULL, NULL, 10, 50);

--
-- Constraints for dumped tables
--

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
