-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30/04/2018 às 02:15
-- Versão do servidor: 10.1.32-MariaDB
-- Versão do PHP: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u501599648_rv`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
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
  `minimoAlunos` int(11) NOT NULL,
  `duracaoAula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `situacao`, `professor`, `estagio`, `curso`, `horario`, `maximoDeAlunos`, `sala`, `duracaoDaAula`, `dataInicio`, `dataTermino`, `ultimaPalavra`, `ultimaLicao`, `ultimoSitato`, `minimoAlunos`, `duracaoAula`) VALUES
(4, 'teste', 2, '', 'Iniciante', 'That\'s the way', 'Seg-Ter-Qua-Qui-Sex(18:00/18:50)', 0, 'United States', 0, '2018-04-29', '2019-04-29', '', 0, 0, 10, 50);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
