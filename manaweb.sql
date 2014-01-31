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

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtTitu` varchar(100) NOT NULL,
  `txtDest` varchar(255) DEFAULT NULL,
  `txtImag` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `painelmenu`
--

CREATE TABLE IF NOT EXISTS `painelmenu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtNome` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `painelpermissoes`
--

CREATE TABLE IF NOT EXISTS `painelpermissoes` (
  `IdPainelMenu` int(11) NOT NULL,
  `IdPainelUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdPainelMenu`,`IdPainelUsuario`),
  KEY `fk_PainelMenu_has_PainelUsuario_PainelUsuario1_idx` (`IdPainelUsuario`),
  KEY `fk_PainelMenu_has_PainelUsuario_PainelMenu1_idx` (`IdPainelMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `painelsubmenu`
--

CREATE TABLE IF NOT EXISTS `painelsubmenu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtNome` varchar(45) NOT NULL,
  `txtDest` varchar(45) NOT NULL,
  `IdPainelMenu` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_PainelSubmenu_PainelMenu1_idx` (`IdPainelMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `painelusuario`
--

CREATE TABLE IF NOT EXISTS `painelusuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtNome` varchar(100) NOT NULL,
  `txtLogin` varchar(45) NOT NULL,
  `txtSenha` varchar(32) NOT NULL,
  `txtEmail` varchar(100) DEFAULT NULL,
  `txtStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtDest` varchar(255) NOT NULL,
  `txtImag` varchar(100) NOT NULL,
  `txtText` mediumtext NOT NULL,
  `IdTipoProjeto` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Projeto_TipoProjeto_idx` (`IdTipoProjeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnologia`
--

CREATE TABLE IF NOT EXISTS `tecnologia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtImag` varchar(100) NOT NULL,
  `txtText` varchar(2000) NOT NULL,
  `txtDest` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoprojeto`
--

CREATE TABLE IF NOT EXISTS `tipoprojeto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `txtNome` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `painelpermissoes`
--
ALTER TABLE `painelpermissoes`
  ADD CONSTRAINT `fk_PainelMenu_has_PainelUsuario_PainelMenu1` FOREIGN KEY (`IdPainelMenu`) REFERENCES `painelmenu` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PainelMenu_has_PainelUsuario_PainelUsuario1` FOREIGN KEY (`IdPainelUsuario`) REFERENCES `painelusuario` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `painelsubmenu`
--
ALTER TABLE `painelsubmenu`
  ADD CONSTRAINT `fk_PainelSubmenu_PainelMenu1` FOREIGN KEY (`IdPainelMenu`) REFERENCES `painelmenu` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_Projeto_TipoProjeto` FOREIGN KEY (`IdTipoProjeto`) REFERENCES `tipoprojeto` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
