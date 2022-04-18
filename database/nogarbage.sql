-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2021 às 15:45
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nogarbage`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `url` varchar(750) NOT NULL,
  `img_location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carousel`
--

INSERT INTO `carousel` (`id`, `description`, `url`, `img_location`) VALUES
(1, 'Faculdade Fatec Indaiatuba', 'http://www.fatecid.com.br/site/', '../../images/carousel/propaganda_fatec.jpg'),
(6, 'Lima Restaurante', 'http://limarestaurante.com.br/', '../../images/carousel/lima_restaurante.jpg'),
(7, 'Burger King', 'https://burgerking.com.br/', '../../images/carousel/burger_king.jpg'),
(8, 'Vizzent Cal?ados', 'https://www.vizzent.com.br/', '../../images/carousel/vizzent_calcados.jpg'),
(9, 'Banco Pan', 'https://www.bancopan.com.br/', '../../images/carousel/banco_pan.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(250) NOT NULL,
  `nome_fantasia` varchar(250) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `inscricao_estadual` int(14) DEFAULT NULL,
  `uniao_federal` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `rua` varchar(500) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `responsavel` varchar(250) DEFAULT NULL,
  `img_location` varchar(250) NOT NULL,
  `cupom` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `razao_social`, `nome_fantasia`, `cnpj`, `inscricao_estadual`, `uniao_federal`, `cidade`, `rua`, `bairro`, `numero`, `complemento`, `cep`, `email`, `telefone`, `responsavel`, `img_location`, `cupom`) VALUES
(1, 'Sumerbol Supermercados Ltda', 'Sumerbol', '45802428000196', 2147483647, 'SP', 'Indaiatuba', 'Avenida Presidente Kennedy', 'Cidade Nova', 895, '', '13334170', '', '1938857800', '', '../../images/points/45802428000196.png', 'NOGARBAGE5SUMERBOL'),
(2, 'Paguemenos Comércio de Produtos Alimentícios Ltda', 'Paguemenos', '60494416001298', 0, 'SP', 'Indaiatuba', 'Rua Três Marias', 'Cidade Nova II', 736, '', '13334381', 'claudia.ferreira@supermercadospaguemenos.com.br', '1934668100', 'Cláudia Ferreira', '../../images/points/60494416001298.jpg', 'NOGARBAGE10PAGUEMENOS'),
(3, 'Tenda Atacado SA', 'Tenda Atacado', '01157555002824', 0, 'SP', 'Indaiatuba', 'Alameda Filtros Mann', 'Jardim Tropical', 670, 'SUC A01', '13344580', 'marta.ferreira@tendaatacado.com.br', '1124892922', 'Marta Ferreira', '../../images/points/01157555002824.png', 'NOGARBAGE7TENDA'),
(4, 'Davita Supermecados', 'Davita', '11087399000106', 0, 'SP', 'Monte Mor', 'Francisco Glicério', 'Centro', 250, '', '13193560', '', '1938791408', '', '../../images/points/11087399000106.png', 'NOGARBAGE2DAVITA');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
