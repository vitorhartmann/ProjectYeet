-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2018 às 19:46
-- Versão do servidor: 5.7.11-log
-- Versão do PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `yeet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nome_categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Não Especificado'),
(2, 'Perecíveis'),
(3, 'Não Perecíveis'),
(4, 'Funcionamento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(10) UNSIGNED NOT NULL,
  `nome_pagamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `nome_pagamento`) VALUES
(1, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `saldo_produto` int(11) NOT NULL,
  `codbarras_produto` bigint(14) UNSIGNED ZEROFILL NOT NULL,
  `valor_produto` decimal(5,2) UNSIGNED NOT NULL,
  `subcategoria_id_subcategoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `saldo_produto`, `codbarras_produto`, `valor_produto`, `subcategoria_id_subcategoria`) VALUES
(1, 'Leite Tirol Integral 1L', 0, 07896256600223, '0.00', 4),
(2, 'Teste', 0, 00000000000001, '0.00', 3),
(3, 'Teste2', 0, 00000000000002, '2.11', 3),
(4, 'Teste3', 0, 00000000000003, '5.29', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(10) UNSIGNED NOT NULL,
  `nome_subcategoria` varchar(45) NOT NULL,
  `categoria_id_categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id_subcategoria`, `nome_subcategoria`, `categoria_id_categoria`) VALUES
(3, 'Não Especificado', 1),
(4, 'Leite', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(10) UNSIGNED NOT NULL,
  `data_venda` datetime NOT NULL,
  `pagamento_id_pagamento` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `data_venda`, `pagamento_id_pagamento`) VALUES
(23, '2018-11-20 04:28:07', 1),
(24, '2018-11-20 04:28:40', 1),
(25, '2018-11-20 04:30:09', 1),
(26, '2018-11-20 04:31:09', 1),
(27, '2018-11-20 04:34:07', 1),
(28, '2018-11-20 04:34:18', 1),
(29, '2018-11-20 04:40:21', 1),
(30, '2018-11-20 04:40:34', 1),
(31, '2018-11-20 04:40:41', 1),
(32, '2018-11-20 04:40:52', 1),
(33, '2018-11-20 04:40:56', 1),
(34, '2018-11-20 04:44:12', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_has_produto`
--

CREATE TABLE `venda_has_produto` (
  `venda_id_venda` int(10) UNSIGNED NOT NULL,
  `produto_id_produto` int(10) UNSIGNED NOT NULL,
  `quantidade_produto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `venda_has_produto`
--

INSERT INTO `venda_has_produto` (`venda_id_venda`, `produto_id_produto`, `quantidade_produto`) VALUES
(27, 2, 3),
(28, 2, 3),
(28, 3, 4),
(29, 2, 3),
(30, 2, 3),
(31, 2, 3),
(32, 2, 3),
(33, 2, 3),
(34, 2, 3),
(34, 3, 4);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_produto_subcategoria1_idx` (`subcategoria_id_subcategoria`);

--
-- Índices de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`),
  ADD KEY `fk_subcategoria_categoria1_idx` (`categoria_id_categoria`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_venda_pagamento1_idx` (`pagamento_id_pagamento`);

--
-- Índices de tabela `venda_has_produto`
--
ALTER TABLE `venda_has_produto`
  ADD PRIMARY KEY (`venda_id_venda`,`produto_id_produto`),
  ADD KEY `fk_venda_has_produto_produto1_idx` (`produto_id_produto`),
  ADD KEY `fk_venda_has_produto_venda1_idx` (`venda_id_venda`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id_subcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_subcategoria1` FOREIGN KEY (`subcategoria_id_subcategoria`) REFERENCES `subcategoria` (`id_subcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_subcategoria_categoria1` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_pagamento1` FOREIGN KEY (`pagamento_id_pagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `venda_has_produto`
--
ALTER TABLE `venda_has_produto`
  ADD CONSTRAINT `fk_venda_has_produto_produto1` FOREIGN KEY (`produto_id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venda_has_produto_venda1` FOREIGN KEY (`venda_id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
