-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Jun-2018 às 07:27
-- Versão do servidor: 5.5.58-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `satisfacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisa`
--

CREATE TABLE IF NOT EXISTS `pesquisa` (
`satisfacao_id` int(11) NOT NULL,
  `satisfacao_chamado` varchar(30) NOT NULL,
  `satisfacao_nota` varchar(15) NOT NULL,
  `satisfacao_data` datetime NOT NULL,
  `satisfacao_descricao` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesquisa`
--
ALTER TABLE `pesquisa`
 ADD PRIMARY KEY (`satisfacao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesquisa`
--
ALTER TABLE `pesquisa`
MODIFY `satisfacao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
