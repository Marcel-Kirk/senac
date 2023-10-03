-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2023 às 08:49
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_cpf` (`cpf`),
  KEY `fk_endereco` (`endereco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `endereco_id`) VALUES
(3, 'sdfsdfs', '44444', 6),
(4, 'Novo Cliente', '0876667689', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(100) NOT NULL,
  `numero` int NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `logradouro`, `numero`, `cep`, `cidade`) VALUES
(6, 'fsdfsdf', 2222, '33333', 'sfsfs'),
(7, 'Rua aaaa aa aa aaa', 123, '8888811', 'Criciúma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

DROP TABLE IF EXISTS `funcoes`;
CREATE TABLE IF NOT EXISTS `funcoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `funcoes`
--

INSERT INTO `funcoes` (`id`, `nome`) VALUES
(2, 'administrador'),
(1, 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

DROP TABLE IF EXISTS `itens_venda`;
CREATE TABLE IF NOT EXISTS `itens_venda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `venda_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `quantidade` int NOT NULL,
  `valor_item` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venda` (`venda_id`),
  KEY `fk_produto` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id`, `venda_id`, `produto_id`, `quantidade`, `valor_item`) VALUES
(1, 1, 4, 12, '999.00'),
(2, 1, 3, 5, '3.99'),
(3, 2, 4, 33, '999.00'),
(4, 3, 5, 4, '7.77'),
(5, 4, 3, 3, '3.99'),
(6, 4, 4, 4, '999.00'),
(7, 4, 5, 7, '7.77');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tipoproduto_id` int NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`tipoproduto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `tipoproduto_id`, `descricao`) VALUES
(3, 'Pão33', '3.99', 7, 'Pão Doce 3333'),
(4, 'produto2', '999.00', 2, 'Alguma coisa'),
(5, 'Produto 3', '7.77', 1, 'sdsadas'),
(6, 'fsdfsdfs', '324423.00', 2, 'dsfsdfsdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_produto`
--

DROP TABLE IF EXISTS `tipos_produto`;
CREATE TABLE IF NOT EXISTS `tipos_produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tipos_produto`
--

INSERT INTO `tipos_produto` (`id`, `nome`, `created_at`) VALUES
(1, 'Padaria', '2023-05-16 12:15:07'),
(2, 'Bebidas', '2023-05-16 12:15:16'),
(7, 'Frios', '2023-06-06 14:37:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `funcao_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_usuario` (`login`),
  KEY `fk_funcao` (`funcao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `funcao_id`) VALUES
(1, 'Marcel', 'marcel', 'e8d95a51f3af4a3b134bf6bb680a213a', 2),
(4, 'Usuario 222', 'teste', 'e8d95a51f3af4a3b134bf6bb680a213a', 1),
(12, 'sdsad', 'asd', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `observacao` text,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_id` int NOT NULL,
  `usuario_id` int UNSIGNED NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `fk_cliente` (`cliente_id`),
  KEY `fk_usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `observacao`, `datahora`, `cliente_id`, `usuario_id`, `valor`, `status`) VALUES
(1, 'ooo ooo oo o oo oo oooo', '2023-08-29 12:37:34', 3, 1, '12007.95', 'C'),
(2, 'csdfds', '2023-08-29 12:46:59', 3, 1, '32967.00', 'A'),
(3, 'dfds fsd fsd', '2023-08-29 12:47:09', 3, 1, '31.08', 'A'),
(4, 'fdg dfgdf gdfgd f gd', '2023-08-29 12:47:27', 3, 1, '4062.36', 'A');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_endereco` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_venda` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk` FOREIGN KEY (`tipoproduto_id`) REFERENCES `tipos_produto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_funcao` FOREIGN KEY (`funcao_id`) REFERENCES `funcoes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
