-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2022 às 15:47
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Estrutura da tabela `log`

-- CREATE TABLE `log` (
--   `idLog` int(11) NOT NULL,
--   `descricaoLog` varchar(255) NOT NULL,
--   `dataLog` date NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Estrutura da tabela `usuario`

CREATE TABLE `usuario`(
  `idUser` int auto_increment NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `crm` varchar(255) NOT NULL,
  `gameScore` INT NOT NULL,
  `gameTheme` varchar(1) NOT NULL,
  `userGameTime` varchar(255) NOT NULL,
  `userEndTime` varchar(255) NOT NULL,
  `dataLog` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabela `usuario`
--

-- 
-- AUTO_INCREMENT de tabela `usuario`
--
-- ALTER TABLE `acertosUsuario`
--   MODIFY `idUsuario` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;