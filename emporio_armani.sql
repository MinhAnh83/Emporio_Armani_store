-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2022 at 10:58 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emporio_armani`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageshare` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `summary`, `keyword`, `description`, `alias`, `imageshare`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sweatshirt', 1, '', '', '', '', '', '', 1, '2022-08-03 23:48:34', '2022-08-13 05:21:33'),
(2, 'Jacket', 1, '', '', '', '', '', '', 1, '2022-08-03 23:51:30', '2022-08-13 05:21:50'),
(3, 'Jumpsuit', 1, '', '', '', '', '', '', 1, '2022-08-03 23:51:30', '2022-08-03 23:58:37'),
(4, 'Trousers', 1, '', '', '', '', '', '', 1, '2022-08-03 23:52:13', '2022-08-13 05:21:48'),
(5, 'Dress', 1, '', '', '', '', '', '', 1, '2022-08-03 23:52:13', '2022-08-03 23:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Lê Hồng Nhật Huy', '22 Rừng Sác Huyện Cần Giờ, Thành Phố Hồ Chí Minh, Việt Nam.', 'huybs@gmail.com', '0123456789', '123', 0),
(274, 'British College BTEC FPT', '205 Nguyễn Xí, Quận Bình Thạnh, Hồ Chí Minh', 'admin@gmail.com', '0353 852 138', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` bigint(20) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `customer_id`, `total_amount`) VALUES
(92, '2022-08-13 00:06:51', 1, '170'),
(91, '2022-08-12 22:46:33', 1, '450'),
(90, '2022-08-12 19:33:52', 1, '170'),
(93, '2022-08-13 04:39:20', 274, '3310');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã sản phẩm',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ảnh đại diện sản phẩm',
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Danh sách ảnh sản phẩm',
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Đoạn ngắn mô tả sản phẩm',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'từ khoá sản phẩm để SEO',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Từ khoá rút gọn SEO',
  `imageshare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `qty`, `image`, `images`, `summary`, `content`, `category_id`, `supplier_id`, `keyword`, `description`, `alias`, `imageshare`, `status`, `created_at`, `updated_at`) VALUES
(1, '6K2MTR2M15Z10117', 'Pure cashmere jumper with raglan sleeves', '490', 100, 'uploads/products/file_1659986055.jpg', '', '', 'Made from luxurious, cosy, pure plain-knit cashmere, this minimalist jumper features raglan sleeves, creating a comfortable, snug fit. A wide, rounded collar and ribbed trim complete the style.', 1, 1, 'Pure cashmere jumper', 'Made from luxurious, cosy, pure plain-knit cashmere, this minimalist jumper features raglan sleeves, creating a comfortable, snug fit. A wide, rounded collar and ribbed trim complete the style.', 'pure-cashmere-jumper-with-raglan-sleeves_cod25185454456148315', '', 1, '2022-08-03 20:39:15', '2022-08-12 21:58:52'),
(2, '6L2M7D2J49Z10602', 'Organic cotton sweatshirt with embroidered via Borgonuovo logo', '170', 85, 'uploads/products/product2.jpg', '', 'Women’s crew-neck sweatshirt in pure organic cotton embellished with tone-on-tone logo embroidered in glossy thread. The item is produced using methods and materials that have a low impact on the environment: in line with the brand’s desire for an increasingly sustainable approach.', 'The address of the creative office in the historical via Borgonuovo 11 premises in Milan becomes the decorative symbol of many of the collection’s pieces. Women’s crew-neck sweatshirt in pure organic cotton embellished with tone-on-tone logo embroidered in glossy thread. The item is produced using methods and materials that have a low impact on the environment: in line with the brand’s desire for an increasingly sustainable approach. Comes with an exclusive Armani Sustainability Project tag.', 1, 1, '', 'Women’s crew-neck sweatshirt in pure organic cotton embellished with tone-on-tone logo embroidered in glossy thread. The item is produced using methods and materials that have a low impact on the environment: in line with the brand’s desire for an increasingly sustainable approach.', 'organic-cotton-sweatshirt-with-embroidered-via-borgonuovo-logo_cod1647597276390255', '', 0, '2022-08-03 20:44:21', '2022-08-13 05:33:39'),
(3, 'H3NG2VC98081636', 'Single-breasted jacket in geometric jacquard viscose crêpe', '490', 45, 'uploads/products/product3.jpg', '', '', 'Pieces designed to create versatile looks to be worn from morning time to evening cocktails, always featuring the evergreen Armani allure. An eclectic spirit that is never over the top, but skilfully crafted with fabrics and colours, like this texture distinguished by an exclusive, matching-tone geometric motif jacquard. Women’s single-breasted jacket with lapels, centre vent and satin lining. Matching satin-covered buttons.', 2, 1, '', 'Pieces designed to create versatile looks to be worn from morning time to evening cocktails, always featuring the evergreen Armani allure. An eclectic spirit that is never over the top, but skilfully crafted with fabrics and colours, like this texture distinguished by an exclusive, matching-tone geometric motif jacquard. Women’s single-breasted jacket with lapels, centre vent and satin lining. Matching satin-covered buttons.', 'single-breasted-jacket-in-geometric-jacquard-viscose-crepe_cod1647597276642584', '', 1, '2022-08-03 20:47:18', '2022-08-09 03:03:07'),
(4, 'H3NP11C21091619', 'Trousers with darts and a belt in a melange flannel', '450', 35, 'uploads/products/product4.jpg', '', '', 'Items from the Icon project represent Emporio Armani’s essence. This classic, evergreen capsule collection provides a modern interpretation of the brand’s DNA by updating the iconic shapes and volumes of its past. Cashmere wool flannel trousers with belt with matching buckle at the waist. The darts create a series of natural pleats that add volume to the top part of the item. Side pockets.\nProduct Code: H3NP11C21091619', 4, 1, '', '', 'trousers-with-darts-and-a-belt-in-a-melange-flannel_cod1647597276656015', '', 1, '2022-08-03 20:48:48', '2022-08-09 02:56:49'),
(5, 'H3NA2BC99001602', 'Fluid technical drill dress with fold', '350', 32, 'uploads/products/product5.jpg', '', '', 'Pieces designed to create versatile looks to be worn from morning time to evening cocktails, always featuring the evergreen Armani allure. This dress can be worn day and night thanks to the flowing, comfortable fit combined with its modern texture. The back fold emphasises the understated movement of the piece. Comes with a belt that accentuates the waist.\r\nProduct Code: H3NA2BC99001602', 5, 1, '', '', 'fluid-technical-drill-dress-with-fold_cod1647597276636535', '', 1, '2022-08-03 20:50:17', '2022-08-12 21:59:21'),
(12, '6LAN01AM20Z1PZA9', 'Long, ribbed virgin-wool dress', '2795', 16, 'uploads/products/file_1659991025.jpg', '', '', 'Made from flowing virgin wool, this long skirt features two-toned ribbing, evoking the collection’s theme of contrasting colours. Two front slits provide added movement, while a wide, slightly stretch waistband allows it to also be worn as a strapless dress, making it perfect on a variety of occasions.\r\n\r\nProduct Code: 6LAN01AM20Z1PZA9', 5, 2, '', '', '', '', 2, '2022-08-09 03:37:05', '2022-08-13 04:30:28'),
(13, '8N1CD41NB1Z1F601', 'Micro-patterned cotton shirt', '245', 10, 'uploads/products/file_1660342950.jpg', '', '', '<div>This selection of versatile, must-have staples for the male wardrobe is an ongoing collection, defined by clean lines that can be worn in any season. The must-have piece in the wardrobe: striped pure cotton shirt, with a classic collar, back yoke and rounded cuffs. Stripes enhance this item’s classic look.</div><div>Product Code:&nbsp;8N1CD41NB1Z1F601</div>', 1, 1, '', '', '', '', 2, '2022-08-13 05:22:30', '2022-08-13 05:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageshare` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `image`, `summary`, `phone`, `address`, `email`, `tax`, `fax`, `keyword`, `description`, `alias`, `imageshare`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Emporio Armani', '', '', '052032020', '', '', '', '', '', '', '', '', 1, '2022-08-03 16:38:45', '2022-08-03 16:38:45'),
(2, 'Giorgio Armani', 'dd', 'dd', '0202', 'dd', 'dd', 'dd', 'dddđ', 'd', 'd', 'd', 'd', 1, '2022-08-08 20:34:19', '2022-08-08 20:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `gender`, `email`, `phone`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', 'Châu Tinh Trì', 1, 'chautinhtri1993@gmail.com', '+862126682412', 'uploads/chautinhtri.jpg', 1, '2022-08-01 09:26:52', '2022-08-13 05:57:23'),
(2, 'manager1', '123', 'Thành Long', 1, 'jackieschan1984@gmail.com', '+862193286473', 'uploads/thanhlong.jpg', 2, '2022-08-01 09:32:10', '2022-08-13 05:42:57'),
(3, 'manager2', '123', 'Lưu Diệc Phi', 0, 'luudiecphi94@gmail.com', '+862743597028', 'uploads/file_1659469801.jpg', 1, '2022-08-01 16:48:52', '2022-08-03 02:50:01'),
(18, 'manager3', '123', 'Lý Tiểu Long', 1, 'brucelee045123@gmail.com', '+869378679983', 'uploads/file_1659985684.jpg', 1, '2022-08-03 01:19:55', '2022-08-13 02:10:58'),
(19, 'manager4', '123', 'Trương mẫn', 0, 'truongman1992@gmail.com', '+860202155544', 'uploads/file_1659992829.jpg', 0, '2022-08-09 04:07:09', '2022-08-13 01:40:20'),
(20, 'Yangmin', '123', 'Yang', 1, 'yang@gmail.com', '012345678910', '', 0, '2022-08-13 05:16:17', '2022-08-13 05:32:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
