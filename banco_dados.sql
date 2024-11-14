-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2024 às 00:30
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
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Endereço` varchar(255) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nome`, `Endereço`, `Telefone`, `CPF`, `Sexo`) VALUES
(1, 'João Silva', 'Rua Exemplo, 123', '1234-5678', '123.456.789-00', 'M'),
(2, 'Ana Oliveira', 'Avenida Central, 456', '2345-6789', '987.654.321-99', 'F'),
(3, 'Carlos Santos', 'Rua das Flores, 789', '3456-7890', '456.789.123-11', 'M'),
(4, 'Luciana Costa', 'Praça do Sol, 101', '4567-8901', '321.654.987-22', 'F');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoquistas`
--

CREATE TABLE `estoquistas` (
  `id_estoquista` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoquistas`
--

INSERT INTO `estoquistas` (`id_estoquista`, `nome`, `email`, `senha`, `idade`, `genero`, `cpf`) VALUES
(1, 'Maria Souza', 'maria.souza@email.com', 'senha123', 28, 'F', '987.654.321-00'),
(2, 'Carlos Pereira', 'carlos.pereira@email.com', '123senha!', 35, 'M', '456.789.123-45'),
(3, 'Juliana Lima', 'juliana.lima@email.com', 'juliana@2024', 24, 'F', '789.456.123-66'),
(4, 'Ricardo Rocha', 'ricardo.rocha@email.com', 'ricardo@987', 30, 'M', '321.654.987-77'),
(5, 'Maria Souza', 'maria.souza@email.com', 'senha123', 28, 'F', '987.654.321-00'),
(6, 'Carlos Pereira', 'carlos.pereira@email.com', '123senha!', 35, 'M', '456.789.123-45'),
(7, 'Juliana Lima', 'juliana.lima@email.com', 'juliana@2024', 24, 'F', '789.456.123-66'),
(8, 'Ricardo Rocha', 'ricardo.rocha@email.com', 'ricardo@987', 30, 'M', '321.654.987-77');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_estoquista` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `local_entrega` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `id_estoquista`, `id_produto`, `data_pedido`, `local_entrega`, `total`) VALUES
(1, 1, 2, 3, '2024-11-13', 'Rua Exemplo, 123', 1500.00),
(2, 2, 3, 1, '2024-11-14', 'Avenida Central, 456', 3200.00),
(3, 3, 4, 2, '2024-11-15', 'Rua das Flores, 789', 1300.00),
(4, 4, 1, 4, '2024-11-16', 'Praça do Sol, 101', 900.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `marca`, `preco`, `descricao`, `quantidade`) VALUES
(1, 'Notebook Dell', 'Dell', 2500.00, 'Notebook com 16GB de RAM e 512GB SSD', 50),
(2, 'Smartphone Samsung', 'Samsung', 1200.00, 'Smartphone Galaxy S21', 100),
(3, 'Monitor LG', 'LG', 850.00, 'Monitor 24\" Full HD, 75Hz', 75),
(4, 'Mouse Logitech', 'Logitech', 150.00, 'Mouse sem fio, ergonômico', 200),
(5, 'Teclado Razer', 'Razer', 450.00, 'Teclado mecânico com retroiluminação RGB', 120);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `estoquistas`
--
ALTER TABLE `estoquistas`
  ADD PRIMARY KEY (`id_estoquista`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_estoquista` (`id_estoquista`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `estoquistas`
--
ALTER TABLE `estoquistas`
  MODIFY `id_estoquista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_estoquista`) REFERENCES `estoquistas` (`id_estoquista`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
