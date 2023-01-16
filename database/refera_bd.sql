-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 16-Jan-2023 às 04:00
-- Versão do servidor: 5.7.34
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `refera_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorys`
--

INSERT INTO `categorys` (`id`, `category`, `updated_at`, `created_at`) VALUES
(1, 'Hidráulica', '2023-01-16 03:53:57', '2023-01-16 03:53:57'),
(2, 'Infitração', '2023-01-16 03:54:22', '2023-01-16 03:54:22'),
(3, 'Eletrica', '2023-01-16 03:54:34', '2023-01-16 03:54:34'),
(4, 'Retirada de Mobilia', '2023-01-16 03:54:51', '2023-01-16 03:54:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `agency` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `category`, `contact_phone`, `contact_name`, `company`, `deadline`, `description`, `agency`, `updated_at`, `created_at`) VALUES
(1, 1, '(11)99999-9999', 'Alcides', 'Reparos S.A', '2021-11-10', 'descricção', 'Imobiliaria Sampa', '2023-01-16 03:56:26', '2023-01-16 03:56:26'),
(2, 2, '(48)99999-9999', 'Moacir', 'Concertos Ltda', '2021-11-14', 'jerer', 'Imobiliaria Floripa', '2023-01-16 03:57:53', '2023-01-16 03:57:53'),
(3, 3, '(48)99999-9999', 'Erclides', 'Concertos Ltda', '2021-11-15', 'djkda', 'Imobiliaria Floripa', '2023-01-16 03:58:44', '2023-01-16 03:58:44'),
(4, 4, '(11)99999-9999', 'Adarci', 'Reparos S.A', '2021-11-15', 'jfda', 'Imobiliaria Sampa', '2023-01-16 03:59:42', '2023-01-16 03:59:42');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_category` (`category`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_category` FOREIGN KEY (`category`) REFERENCES `categorys` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
