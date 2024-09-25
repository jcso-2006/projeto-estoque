-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25/09/2024 às 12:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydatabase`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `telefone`) VALUES
(1, 'lima', 'aa@aa', '11965434910'),
(2, 'jesus', 'bb@bb.com', '1111111111'),
(3, 'marks', 'pinto@piru.aaaaa', '6666666666'),
(4, 'tomas turbando', 'jacinto@pinto.com.br', '15468498151'),
(5, 'jacinto pinto', 'entrando@rego.com\r\n', '6969696969');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoquista`
--

CREATE TABLE `estoquista` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoquista`
--

INSERT INTO `estoquista` (`id`, `firstname`, `email`, `pass`, `gender`, `created_at`, `reset_token`, `reset_token_expiration`) VALUES
(1, 'claudio', 'claudinReiDelas20@vinte.com', '69001', 'male', '2024-09-18 15:45:24', NULL, NULL),
(2, 'judete', 'capodeFuscaROSA@gmaiil.com', 'xerecuda', 'female', '2024-09-18 15:45:24', NULL, NULL),
(3, 'roberto', 'robertoXCarlos@essecarasouEu.com', 'soueuessecara', 'male', '2024-09-18 15:50:10', NULL, NULL),
(4, 'enzinMinecrafrt', 'xrepescropionjabcgocu+fodaquemeliodas@narutoabcdefghijklmnopqrstuvwxyz.com', 'gocusolanaruto', 'female', '2024-09-18 15:50:10', NULL, NULL),
(5, 'pedroPascuao', 'cadeiravoadorapirigosadoDATENA@pabloMarcal', '1234', 'other', '2024-09-18 15:51:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itempedido`
--

CREATE TABLE `itempedido` (
  `id_item` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_pedido` date DEFAULT curdate(),
  `total_pedido` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `preco`, `estoque`) VALUES
(1, 'cadeira DATENA\r\n', 'cadeira COM PERNAS DE FERRO COM 2 METROS DE ALTURA PESANDO 15 TONELADAS, ACENTO ESTUFADO A COURO COM 40 CM DE DEEAMETRO\n', 800.00, 800),
(2, 'Boné Marcel\r\n', 'boné de aba reta com marcel estampado na capa, com sorriso colgate total 12', 2.00, 1),
(3, 'auauauauauasu', 'daidsaudaidj', 900.00, 10000),
(4, 'celular do Walce\r\n', 'Celular indestrutivo, PRETO na verdade [azul escuro], talvez verde, ou vermelho, depende, sou daltonico, com TDAH, não sei escutar cor\nPena\nSe fudeo\nAgora vai ser caixa Surpresa, compre e talvez venha um sapato, sem cadarço, ou um pacote de bala, vazio, pq eu comi👍', 2000.00, 5),
(5, 'implante CApilar', 'perfeito para pessoas com calvice do tipo abcdefghijklmnopqrstuvwxyz ou 1234567489 10\r\ncabelos castanhos e sedosos retirados de um calvo da malazia e do cu do cavalo que retiramos do  meio de um lago no meio do deserto do saara, dentro da casa branca na china\r\no cavalo preto, mas p branco era ', 200000.00, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `estoquista`
--
ALTER TABLE `estoquista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `itempedido`
--
ALTER TABLE `itempedido`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `estoquista`
--
ALTER TABLE `estoquista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itempedido`
--
ALTER TABLE `itempedido`
  ADD CONSTRAINT `itempedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `itempedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
