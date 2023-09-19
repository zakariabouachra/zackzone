-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 avr. 2023 à 21:38
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_cm2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(10, 'ZAKARIA', 'zikotato03@gmail.com', '123', '', '514 435 6000', 'Maroc', 'owner', ' test');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(16, 'Men', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old\r\n\r\n'),
(17, 'Women', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old\r\n\r\n'),
(18, 'Kids', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old\r\n\r\n'),
(19, 'Others', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`) VALUES
(18, 'ZAKARIA BOUACHRA', 'test@gmail.com', '$2y$10$jVkhQYTvgaTu9iNqjMkE2uoK/DAXNi4SygUYmlfdVH0ncMnLbv9i6', 'Maroc', 'CASABLANCA', '0700722470', 'res benber d bd standhal casablanca  imm d val fleuri casablanca');

-- --------------------------------------------------------

--
-- Structure de la table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(34, 681720816, '21', 1, 'en cours'),
(35, 326980333, '21', 1, 'en cours'),
(36, 1956624106, '21', 1, 'en cours'),
(37, 1540691562, '21', 10, 'en cours'),
(38, 1130875821, '22', 10, 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_quantity`, `product_price`, `product_desc`, `product_keywords`) VALUES
(21, 19, 17, '2023-04-17 18:12:34', 'Relaxed Short full Sleeve T-Shirt', 'clothes-1.jpg', 'clothes-1.jpg', 'clothes-1.jpg', 90, 45, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '65'),
(22, 19, 17, '2023-04-17 18:13:45', 'Girls pnk Embro design Top', 'clothes-2.jpg', 'clothes-2.jpg', 'clothes-2.jpg', 90, 61, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '79'),
(23, 19, 17, '2023-04-16 09:50:30', 'Black Floral Wrap Midi Skirt', 'clothes-3.jpg', 'clothes-3.jpg', 'clothes-3.jpg', 100, 45, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '76'),
(24, 19, 17, '2023-04-16 09:50:45', 'Pure Garment Dyed Cotton Shirt', '2.jpg', '2.jpg', '2.jpg', 100, 68, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '90'),
(25, 19, 16, '2023-04-16 09:49:06', 'Mens Winter Leathers Jackets', 'jacket-2.jpg', 'jacket-2.jpg', 'jacket-2.jpg', 500, 52, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '98'),
(26, 20, 16, '2023-04-16 09:51:17', 'Mens Winter Leathers Jackets', 'jacket-1.jpg', 'jacket-1.jpg', 'jacket-1.jpg', 100, 32, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '50'),
(27, 20, 16, '2023-04-16 09:52:08', 'Better Basics French Terry Sweatshorts', 'jacket-3.jpg', 'jacket-3.jpg', 'jacket-3.jpg', 100, 50, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '68'),
(28, 0, 16, '2023-04-16 09:54:18', 'Mens Winter Leathers', 'jacket-4.jpg', 'jacket-4.jpg', 'jacket-4.jpg', 100, 46, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '80'),
(29, 22, 16, '2023-04-16 09:54:18', 'Running & Trekking Shoes - White', 'sports-1.jpg', 'sports-1.jpg', 'sports-1.jpg', 150, 49, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '55'),
(30, 24, 16, '2023-04-16 09:54:18', 'Trekking & Running Shoes - black', 'sports-2.jpg', 'sports-2.jpg', 'sports-2.jpg', 100, 102, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '200'),
(31, 24, 17, '2023-04-16 11:04:08', 'Sports Claw Womens Shoes', '1.jpg', '1.jpg', '1.jpg', 500, 63, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '74'),
(37, 24, 17, '2023-04-16 09:54:18', 'Womens Party Wear Shoes', 'party-wear-1.jpg', 'party-wear-1.jpg', 'party-wear-1.jpg', 150, 320, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '500'),
(38, 24, 16, '2023-04-16 09:54:18', 'Air Trekking Shoes - white', 'sports-6.jpg', 'sports-6.jpg', 'sports-6.jpg', 600, 52, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '69'),
(39, 24, 16, '2023-04-16 09:54:18', 'Boot With Suede Detail', 'shoe-3.jpg', 'shoe-3.jpg', 'shoe-3.jpg', 20, 80, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '90'),
(40, 24, 16, '2023-04-16 09:54:18', 'Mens Leather Formal Wear shoes', 'shoe-1.jpg', 'shoe-1.jpg', 'shoe-1.jpg', 50, 78, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '56'),
(42, 24, 16, '2023-04-16 09:54:18', 'Casual Mens Brown shoes', 'shoe-2.jpg', 'shoe-2.jpg', 'shoe-2.jpg', 90, 55, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '50'),
(43, 25, 19, '2023-04-16 09:54:18', 'Pocket Watch Leather Pouch', 'watch-1.jpg', 'watch-1.jpg', 'watch-1.jpg', 340, 34, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '50'),
(44, 25, 19, '2023-04-16 09:54:18', 'ROSE GOLD DIAMONDS EARRING', 'jewellery-1.jpg', 'jewellery-1.jpg', 'jewellery-1.jpg', 15, 1500, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '2000'),
(45, 25, 19, '2023-04-16 09:54:18', 'Titan 100 Ml Womens Perfume', 'perfume.jpg', 'perfume.jpg', 'perfume.jpg', 400, 10, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '42'),
(46, 25, 19, '2023-04-16 09:54:18', 'Mens Leather Reversible Belt', 'belt.jpg', 'belt.jpg', 'belt.jpg', 20, 10, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '24'),
(47, 25, 19, '2023-04-16 09:54:18', 'platinum Zircon Classic Ring', 'jewellery-2.jpg', 'jewellery-2.jpg', 'jewellery-2.jpg', 320, 62, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '65'),
(48, 25, 19, '2023-04-16 09:54:18', 'Smart watche Vital Plus', 'watch-2.jpg', 'watch-2.jpg', 'watch-2.jpg', 50, 56, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '78'),
(49, 25, 19, '2023-04-16 09:54:18', 'SHAMPOO, CONDITIONER & FACEWASH PACKS', 'shampoo.jpg', 'shampoo.jpg', 'shampoo.jpg', 99, 150, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '200'),
(50, 25, 19, '2023-04-16 09:54:18', 'Rose Gold Peacock Earrings', 'jewellery-3.jpg', 'jewellery-3.jpg', 'jewellery-3.jpg', 1, 20, 'Ce vêtement est conçu pour offrir un style moderne et confortable. Fabriqué à partir de matériaux de qualité, il est à la fois doux et durable. Il présente une coupe ajustée qui met en valeur la silhouette tout en offrant une grande liberté de mouvement. Avec sa finition soignée, il est idéal pour toutes les occasions, que ce soit pour une journée décontractée ou pour une soirée habillée. Les détails de conception tels que les coutures, les fermetures éclair et les boutons sont minutieusement sélectionnés pour garantir une finition impeccable. En somme, ce vêtement est une pièce intemporelle qui peut être portée encore et encore tout en conservant son apparence et sa qualité.', '30'),
(51, 19, 18, '2023-04-16 10:49:37', 'New T-Shirt', 'T-shirt1.jpg', 'T-shirt1.jpg', 'T-shirt1.jpg', 15, 250, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla</p>', '450'),
(52, 19, 18, '2023-04-16 10:51:07', 'U.S. Polo Assn. Blue Polos shirt', 'U-S--Polo-Assn--Blue-Polos-0266-586842-1-pdp_slider_l.jpg', 'U-S--Polo-Assn--Blue-Polos-0268-586842-2-pdp_slider_l.jpg', 'U-S--Polo-Assn--Blue-Polos-0271-586842-3-pdp_slider_l.jpg', 8, 60, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', '200'),
(53, 19, 18, '2023-04-16 10:51:07', 'BENETTON White Polo Shirt', 'United-Colors-of-Benetton-White-Polo-Shirt-0608-0914361-1-pdp_slider_l.jpg', 'United-Colors-of-Benetton-White-Polo-Shirt-0608-0914361-2-pdp_slider_l.jpg', 'United-Colors-of-Benetton-White-Polo-Shirt-0609-0914361-3-pdp_slider_l.jpg', 20, 98, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla</p>', '150');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(19, 'DRESS & FROCK', 'Clothes\r\n'),
(20, 'WINTER WEAR', 'Footwear\r\n'),
(21, 'GLASSES & LENS', 'Jewelry\r\n'),
(22, 'SHORTS & JEANS', 'Parfume\r\n'),
(24, 'JACKET', 'Glasses\r\n'),
(25, 'WATCH', 'Bags\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(19, 'Womens latest fashion sale', 'banner-1.jpg'),
(20, 'Modern sunglasses', 'banner-2.jpg'),
(22, 'New fashion summer sale', 'banner-3.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index pour la table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
