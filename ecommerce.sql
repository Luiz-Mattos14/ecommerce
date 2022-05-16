-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Maio-2022 às 22:10
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_assessments` datetime NOT NULL,
  `punctuation` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `assessments`
--

INSERT INTO `assessments` (`id`, `id_product`, `id_user`, `date_assessments`, `punctuation`, `comment`) VALUES
(1, 1, 1, '2022-04-22 15:59:41', 5, 'Produto com qualidade 100%\r\n\r\nÓtima compra'),
(2, 2, 1, '2022-04-22 15:59:41', 5, 'Produto com qualidade 100%\r\n\r\nÓtima compra'),
(3, 3, 1, '2022-04-22 15:59:41', 5, 'Produto com qualidade 100%\r\n\r\nÓtima compra'),
(4, 3, 1, '2022-04-25 03:20:18', 5, 'Produto top!!'),
(5, 4, 1, '2022-04-25 03:20:18', 4, 'Produto top!!'),
(6, 5, 1, '2022-04-25 03:20:18', 4, 'Ótima compra!'),
(7, 6, 1, '2022-04-25 03:20:18', 3, 'Ótima compra!'),
(8, 7, 1, '2022-04-25 03:20:18', 3, 'Ótima compra!'),
(9, 8, 1, '2022-04-25 03:20:18', 5, 'Produto chegou em perfeito estado.'),
(10, 9, 1, '2022-04-25 03:20:18', 0, 'Produto chegou em perfeito estado.'),
(11, 10, 1, '2022-04-25 03:20:18', 5, 'Produto chegou em perfeito estado.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `brands`
--

INSERT INTO `brands` (`id_brand`, `brand_name`) VALUES
(1, 'Funko Pop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id_category`, `subcategory`, `category_name`) VALUES
(1, 0, 'Funko'),
(2, 0, 'Games'),
(3, 0, 'Quadrinhos'),
(4, 0, 'Colecionáveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coupons`
--

CREATE TABLE `coupons` (
  `id_coupon` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL,
  `coupon_type` int(11) NOT NULL,
  `coupon_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

CREATE TABLE `options` (
  `id_option` int(11) NOT NULL,
  `option_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `options`
--

INSERT INTO `options` (`id_option`, `option_name`) VALUES
(1, 'Boneco de Vinyl'),
(2, 'Consoles'),
(3, 'Quadrinhos (HQs)'),
(4, 'Canecas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `options_product`
--

CREATE TABLE `options_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `p_values` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `amount_paid` float NOT NULL,
  `transaction_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `price_from` float NOT NULL,
  `product_review` float NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `promotion` tinyint(4) NOT NULL,
  `best_sellers` tinyint(4) NOT NULL,
  `new_product` tinyint(4) NOT NULL,
  `options` varchar(200) NOT NULL,
  `weight` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `length` float NOT NULL,
  `diameter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `id_brand`, `product_name`, `product_description`, `stock`, `price`, `price_from`, `product_review`, `featured`, `promotion`, `best_sellers`, `new_product`, `options`, `weight`, `width`, `height`, `length`, `diameter`) VALUES
(1, 1, 1, 'Funko Pop - Harry Potter', 'FUNKO POP HARRY POTTER', 1, 100, 80, 5, 1, 1, 1, 0, '1', 0, 0, 0, 0, 0),
(2, 1, 1, 'Funko Pop - Newt Scamander', 'Funko Pop - Newt Scamander', 0, 100, 80, 4, 1, 1, 0, 1, '1', 0, 0, 0, 0, 0),
(3, 1, 1, 'Funko Pop - Gandalf', 'Funko Pop - Gandalf', 0, 100, 80, 3, 1, 1, 1, 0, '1', 0, 0, 0, 0, 0),
(4, 1, 0, 'Funko Pop - Legolas', 'Funko Pop - Legolas', 0, 100, 80, 2, 1, 0, 0, 1, '1', 0, 0, 0, 0, 0),
(5, 1, 0, 'Funko Pop - Obi Wan', 'Funko Pop - Obi Wan', 0, 100, 80, 1, 1, 0, 1, 0, '1', 0, 0, 0, 0, 0),
(6, 1, 0, 'Funko Pop - Chewbacca', 'Funko Pop - Chewbacca', 0, 100, 80, 5, 1, 0, 0, 1, '1', 0, 0, 0, 0, 0),
(7, 1, 0, 'Funko Pop - Jiraya', 'Funko Pop - Jiraya', 0, 100, 80, 4, 1, 0, 1, 0, '1', 0, 0, 0, 0, 0),
(8, 1, 0, 'Funko Pop - Naruto', 'Funko Pop - Naruto', 0, 100, 80, 3, 1, 0, 0, 1, '1', 0, 0, 0, 0, 0),
(9, 2, 0, 'Console - PS4 Slim', 'Console - PS4 Slim', 0, 2000, 0, 5, 1, 1, 1, 1, '2', 0, 0, 0, 0, 0),
(10, 2, 0, 'Console - Xbox Series S', 'Console - Xbox One S', 0, 2000, 0, 4, 1, 0, 1, 1, '2', 0, 0, 0, 0, 0),
(11, 2, 0, 'Console - Xbox Series X', 'Console - Xbox One X', 0, 2000, 0, 5, 1, 1, 0, 1, '2', 0, 0, 0, 0, 0),
(12, 2, 0, 'Console - Nintendo Switch', 'Console - Nintendo Switch', 0, 2000, 0, 5, 1, 0, 0, 1, '2', 0, 0, 0, 0, 0),
(13, 3, 0, 'HQ - Piada Mortal', 'HQ - Piada Mortal', 0, 35, 49, 5, 1, 1, 0, 1, '3', 0, 0, 0, 0, 0),
(14, 3, 0, 'HQ - Marvel', 'HQ - Marvel', 0, 35, 49, 2, 1, 0, 0, 1, '3', 0, 0, 0, 0, 0),
(15, 3, 0, 'HQ - Pantera Negra', 'HQ - Pantera Negra', 0, 35, 49, 1, 1, 1, 0, 1, '3', 0, 0, 0, 0, 0),
(16, 4, 0, 'Caneca - Shield', 'Caneca - Shield', 0, 10, 15, 1, 1, 0, 1, 1, '4', 0, 0, 0, 0, 0),
(17, 4, 0, 'Caneca - Loki', 'Caneca - Loki', 0, 10, 15, 2, 1, 1, 0, 1, '4', 0, 0, 0, 0, 0),
(18, 4, 0, 'Caneca - Star Wars', 'Caneca - Star Wars', 0, 10, 15, 3, 1, 0, 1, 1, '4', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `url`) VALUES
(1, 1, 'funko-1.jpg'),
(2, 2, 'funko-2.jpg'),
(3, 3, 'funko-3.jpg'),
(4, 4, 'funko-4.jpg'),
(5, 5, 'funko-5.jpg'),
(6, 6, 'funko-6.jpg'),
(7, 7, 'funko-7.jpg'),
(8, 8, 'funko-8.png'),
(9, 9, 'console-1.png'),
(10, 10, 'console-2.jpg'),
(11, 11, 'console-3.jpg'),
(12, 12, 'console-4.png'),
(13, 13, 'hq-1.jpg'),
(14, 14, 'hq-2.png'),
(15, 15, 'hq-3.jpg'),
(16, 16, 'col-1.jpg'),
(17, 17, 'col-2.jpg'),
(18, 18, 'col-3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coupon` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `shopping_products`
--

CREATE TABLE `shopping_products` (
  `id_shopping_products` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `the_amount` int(11) NOT NULL,
  `price_product` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `token` varchar(32) NOT NULL,
  `id_permissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `user_name`, `admin`, `token`, `id_permissions`) VALUES
(1, 'luiz@email.com.br', '123', 'Luiz Mattos', 1, '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Índices para tabela `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Índices para tabela `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id_option`);

--
-- Índices para tabela `options_product`
--
ALTER TABLE `options_product`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices para tabela `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Índices para tabela `shopping_products`
--
ALTER TABLE `shopping_products`
  ADD PRIMARY KEY (`id_shopping_products`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id_coupon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `options`
--
ALTER TABLE `options`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `options_product`
--
ALTER TABLE `options_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `shopping_products`
--
ALTER TABLE `shopping_products`
  MODIFY `id_shopping_products` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
