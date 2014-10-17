-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `manaweb`
--
CREATE DATABASE `manaweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `manaweb`;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`Id`, `txtTitu`, `txtDest`, `txtImag`) VALUES
(1, 'Titulo1', 'Destino1', 'Imagem1'),
(2, 'Titulo1', 'Destino1', 'Imagem1'),
(3, '\\\\\\"Titulo\\\\\\"', 'Destino1', 'Imagem1');

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('465f5317c43e71f6b94a7750c4e5a8b5', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.76 Safari/537.36', 1389980052, '');

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`Id`, `txtDest`, `txtImag`, `txtText`, `IdTipoProjeto`) VALUES
(1, 'testando', 'site1.png', 'asdasdasdasd', 1),
(2, 'http://google.com', 'site1.png', 'as\\dasdasdasd', 1),
(3, 'http://google.com', 'site1.png', 'as\\dasdasdasd', 1);

--
-- Extraindo dados da tabela `tecnologia`
--

INSERT INTO `tecnologia` (`Id`, `txtImag`, `txtText`, `txtDest`) VALUES
(1, 'teste', 'teste1', 'teste2');

--
-- Extraindo dados da tabela `tipoprojeto`
--

INSERT INTO `tipoprojeto` (`Id`, `txtNome`) VALUES
(1, 'Site'),
(2, 'Ecommerce');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
