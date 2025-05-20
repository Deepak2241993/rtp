-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 12:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u929332160_readytoprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_slug` varchar(255) NOT NULL,
  `cat_description` text DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL,
  `cat_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cat_orderby` int(11) NOT NULL DEFAULT 0,
  `is_selected` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_slug`, `cat_description`, `cat_image`, `cat_status`, `cat_orderby`, `is_selected`, `meta_title`, `meta_desc`, `meta_keyword`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 'Banners', 'banners', 'Banners', '4-1712218078.png', 'active', 1, 0, 'Banners', 'Banners', 'Banners', NULL, '2024-03-20 05:49:39', '2024-05-08 01:36:58'),
(5, 'Corflute Sign', 'corflute-sign', 'Corflute Sign', '5-1712218486.png', 'active', 1, 1, 'Corflute Sign', 'Corflute Sign', 'Corflute Sign', NULL, '2024-03-20 07:03:35', '2024-04-04 08:14:46'),
(6, 'Flag Printing', 'flag-printing', 'Flag Printing', '6-1712218466.png', 'active', 1, 1, 'Flag Printing', 'Flag Printing', 'Flag Printing', NULL, '2024-03-20 07:05:17', '2024-04-04 08:14:26'),
(7, 'Print', 'print', 'Print', '7-1712218438.png', 'active', 1, 1, 'Print', 'Print', 'Print', NULL, '2024-03-20 07:06:36', '2024-04-19 12:00:11'),
(8, 'Display', 'display', 'Display', '8-1712218418.png', 'active', 1, 1, 'Display', 'Display', 'Display', NULL, '2024-03-20 09:05:18', '2024-04-04 08:13:38'),
(9, 'Outdoor Signs', 'outdoor-signs', 'Outdoor Signs', '9-1712218049.png', 'active', 1, 1, 'Outdoor Signs', 'Outdoor Signs', 'Outdoor Signs', NULL, '2024-03-20 09:06:52', '2024-04-04 08:07:29'),
(11, 'Test category', 'test-category', 'test category', NULL, 'active', 1, 1, 'Test category', 'Test category', 'Test category', NULL, '2024-05-08 01:34:18', '2024-05-08 01:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `firstname`, `lastname`, `phone`, `email`, `address`, `note`, `created_at`, `updated_at`) VALUES
(2, 5, 'Sachin', 'Kumar', '9696969996', 'sachin@gmail.com', 'Test City', NULL, '2024-04-13 01:35:15', '2024-04-13 01:35:15'),
(3, 3, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', NULL, '2024-04-16 04:58:02', '2024-04-16 05:05:12'),
(4, 1, 'Admin', 'Kumar', '8077477522', 'admin@example.com', 'Add min', NULL, '2024-04-16 11:51:30', '2024-04-16 11:51:30'),
(5, 6, 'test', 'test666', '8888888888', 'test@gmail.com', 'test', NULL, '2024-04-18 06:26:09', '2024-04-18 06:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homesection`
--

CREATE TABLE `homesection` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homesection`
--

INSERT INTO `homesection` (`id`, `image`, `heading`, `sub_heading`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1.png', 'High-Quality, Ready-to-Print Solutions', 'Efficient Manufacturing, Nationwide Delivery: Your Partner for Top-Quality Printing Needs at Unbeatable Prices', '<ul class=\"clearfix\">\r\n                                    <li>Advanced manufacturing facility located in Sydney, equipped with cutting-edge\r\n                                        technology</li>\r\n                                    <li>Capable of producing high-quality signage for a wide range of industries and\r\n                                        applications</li>\r\n                                    <li>Ability to fulfill orders of any quantity, from single signs to large bulk orders.\r\n                                    </li>\r\n                                    <li>In-house manufacturing ensures strict quality control and the best value for money.\r\n                                    </li>\r\n                                    <li>Website features pricing calculators for accurate cost estimates tailored to\r\n                                        specific signage needs.</li>\r\n                                </ul>', 'active', '2024-04-10 11:42:54', '2024-04-10 11:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `homesliders`
--

CREATE TABLE `homesliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button1_text` varchar(255) DEFAULT NULL,
  `button1_url` varchar(255) DEFAULT NULL,
  `button2_text` varchar(255) DEFAULT NULL,
  `button2_url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homesliders`
--

INSERT INTO `homesliders` (`id`, `image`, `title`, `description`, `button1_text`, `button1_url`, `button2_text`, `button2_url`, `order`, `created_at`, `updated_at`) VALUES
(2, '2.png', 'Slider-1', '<h3 class=\"item-title animate-item\"> 2024 Branding Revolution: Get Ready to Elevate Your\r\n                                    Business with Our Printing Starter Pack!\r\n                                </h3>\r\n                                <p class=\"animate-item\">\r\n                                    USE CODE #2024PACK and get 10%OFF\r\n                                </p>\r\n                                <div class=\"btns-group ul-li animate-item clearfix\">\r\n                                    <ul class=\"clearfix\">\r\n                                        <li><a href=\"https://readytoprint.com.au/public/product-list/\" class=\"btn bg-light-green\">SHOP NOW</a></li>\r\n                                        <li><a href=\"#!\" class=\"btn bg-default-black\">Get A Quote</a></li>\r\n                                    </ul>\r\n                                </div>', NULL, NULL, NULL, NULL, 0, '2024-03-22 09:54:08', '2024-04-04 08:34:43'),
(3, '3.png', 'Slider-2', '<h3 class=\"item-title animate-item\">\r\n                                    Unlocking Excellence with Ready to Print\r\n                                </h3>\r\n                                <div class=\"animate-item\">\r\n                                    <ul class=\"bullet-points\">\r\n                                        <li>We are Affordable</li>\r\n                                        <li>Superior Quality Printing Solutions Tailored Just for You.</li>\r\n                                        <li>Order Now and Experience the Best Value in customised printing</li>\r\n                                    </ul>\r\n                                </div>\r\n                                <div class=\"btns-group ul-li animate-item clearfix\">\r\n                                    <ul class=\"clearfix\">\r\n                                        <li><a href=\"https://readytoprint.com.au/public/product-list/\" class=\"btn bg-light-green\">SHOP NOW</a></li>\r\n                                        <li><a href=\"#!\" class=\"btn bg-default-black\">LEARN MORE</a></li>\r\n                                    </ul>\r\n                                </div>', NULL, NULL, NULL, NULL, 0, '2024-03-22 09:54:58', '2024-04-04 08:34:02'),
(4, '4-1713510382.png', 'Slider-3', '<h3 class=\"item-title animate-item\">\r\n                                    Transform Your Vision into Reality with Our Premium Printing Solutions\r\n                                </h3>\r\n                                <p class=\"animate-item\">\r\n                                    Elevate Your Brand Today! Ready to Print- Click, Order and Collect!\r\n                                </p>\r\n                                <div class=\"btns-group ul-li animate-item clearfix\">\r\n                                    <ul class=\"clearfix\">\r\n                                        <li><a href=\"https://readytoprint.com.au/public/product-list/banner\" class=\"btn bg-light-green\">SHOP NOW</a></li>\r\n                                        <li><a href=\"#!\" class=\"btn bg-default-black\">LEARN MORE</a></li>\r\n                                    </ul>\r\n                                </div>', NULL, NULL, NULL, NULL, 0, '2024-03-22 09:55:38', '2024-04-19 07:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_13_074642_alter_users_table', 2),
(6, '2024_03_13_100209_create_categories_table', 3),
(7, '2024_02_25_200546_create_temp_images_table', 4),
(8, '2024_03_14_090822_create_sub_categories_table', 5),
(9, '2024_03_15_105358_create_product_table', 6),
(10, '2024_03_18_050648_add_column_to_table', 7),
(11, '2024_03_22_064151_create_home_sliders_table', 8),
(12, '2024_03_27_171506_alter_products_table', 9),
(13, '2024_03_30_195912_alter_users_table', 9),
(14, '2024_05_23_063550_create_price_ranges_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grand_total` double(10,2) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `notee` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupon_code`, `discount`, `grand_total`, `firstname`, `lastname`, `phone`, `email`, `address`, `notee`, `status`, `created_at`, `updated_at`) VALUES
(14, 5, 3.00, 0.00, NULL, NULL, 3.00, 'Sachin', 'Kumar', '9696969996', 'sachin@gmail.com', 'Test City', NULL, NULL, '2024-04-13 01:35:15', '2024-04-13 01:35:15'),
(15, 5, 1.00, 0.00, NULL, NULL, 1.00, 'Sachin', 'Kumar', '9696969996', 'sachin@gmail.com', 'Test City', NULL, NULL, '2024-04-13 01:44:41', '2024-04-13 01:44:41'),
(16, 5, 0.00, 0.00, NULL, NULL, 0.00, 'Sachin', 'Kumar', '9696969996', 'sachin@gmail.com', 'Test City', NULL, NULL, '2024-04-13 01:45:04', '2024-04-13 01:45:04'),
(17, 5, 3.00, 0.00, NULL, NULL, 3.00, 'Sachin', 'Kumar', '9696969996', 'sachin@gmail.com', 'Test City', NULL, NULL, '2024-04-13 02:18:59', '2024-04-13 02:18:59'),
(18, 3, 432.00, 0.00, NULL, NULL, 432.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', 'test,22222', NULL, '2024-04-16 04:58:02', '2024-04-16 04:58:02'),
(19, 3, 432.00, 0.00, NULL, NULL, 432.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', 'uy78y', NULL, '2024-04-16 04:58:26', '2024-04-16 04:58:26'),
(20, 3, 432.00, 0.00, NULL, NULL, 432.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', NULL, NULL, '2024-04-16 04:59:41', '2024-04-16 04:59:41'),
(21, 3, 30.00, 0.00, NULL, NULL, 30.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', NULL, NULL, '2024-04-16 05:01:19', '2024-04-16 05:01:19'),
(22, 3, 90.00, 0.00, NULL, NULL, 90.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', NULL, NULL, '2024-04-16 05:02:38', '2024-04-16 05:02:38'),
(23, 3, 78.00, 0.00, NULL, NULL, 78.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', 'fdxxgxgx', NULL, '2024-04-16 05:04:02', '2024-04-16 05:04:02'),
(24, 3, 366.00, 0.00, NULL, NULL, 366.00, 'Deepak', 'Kumar', '9874563210', 'test@gmail.com', 'test,22222', NULL, NULL, '2024-04-16 05:05:12', '2024-04-16 05:05:12'),
(25, 1, 576.00, 0.00, NULL, NULL, 576.00, 'Admin', 'Kumar', '8077477522', 'admin@example.com', 'Add min', NULL, 'processed', '2024-04-16 11:51:30', '2024-04-16 11:51:30'),
(26, 6, 144.00, 0.00, NULL, NULL, 144.00, 'test', 'test666', '8888888888', 'test@gmail.com', 'test', NULL, 'proccesed', '2024-04-18 06:26:09', '2024-04-18 06:26:09'),
(27, 6, 927.00, 0.00, NULL, NULL, 927.00, 'test', 'test666', '8888888888', 'test@gmail.com', 'test', NULL, 'proccesed', '2024-04-18 09:49:30', '2024-04-18 09:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `print_side` varchar(255) DEFAULT NULL,
  `pickup_option` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `product_id`, `name`, `qty`, `size`, `color`, `print_side`, `pickup_option`, `document`, `price`, `total`, `created_at`, `updated_at`) VALUES
(11, 14, 120, 'Stickers', 3, NULL, 'Blue', 'Side Left', NULL, NULL, 1.00, 3.00, '2024-04-13 01:35:15', '2024-04-13 01:35:15'),
(12, 15, 120, 'Stickers', 1, NULL, 'Blue', 'Side Right', NULL, NULL, 1.00, 1.00, '2024-04-13 01:44:41', '2024-04-13 01:44:41'),
(13, 17, 120, 'Stickers', 3, NULL, 'Blue', 'Side Right', NULL, NULL, 1.00, 3.00, '2024-04-13 02:18:59', '2024-04-13 02:18:59'),
(14, 20, 16, 'Luxury Pull Up Banner', 3, '850 mm W x 2000mm H', 'Black', 'Single Sided', NULL, NULL, 144.00, 432.00, '2024-04-16 04:59:41', '2024-04-16 04:59:41'),
(15, 22, 90, 'Bollard Signs', 3, '200x200', 'Blue', 'Single Sided', NULL, NULL, 30.00, 90.00, '2024-04-16 05:02:39', '2024-04-16 05:02:39'),
(16, 24, 93, 'Election Signs', 2, '200x200', 'Black', 'Double Sided', NULL, NULL, 39.00, 78.00, '2024-04-16 05:05:12', '2024-04-16 05:05:12'),
(17, 24, 16, 'Luxury Pull Up Banner', 2, '200x200', 'Black', 'Double Sided', NULL, NULL, 144.00, 288.00, '2024-04-16 05:05:12', '2024-04-16 05:05:12'),
(18, 25, 16, 'Luxury Pull Up Banner', 4, '850 mm W x 2000mm H', 'Black', 'Single Sided', 'Kings Park, NSW', NULL, 144.00, 576.00, '2024-04-16 11:51:30', '2024-04-16 11:51:30'),
(19, 26, 16, 'Luxury Pull Up Banner', 1, '850 mm W x 2000mm H', 'Black', 'Single Sided', 'Kings Park, NSW', NULL, 144.00, 144.00, '2024-04-18 06:26:09', '2024-04-18 06:26:09'),
(20, 27, 16, 'Luxury Pull Up Banner', 3, '850 mm W x 2000mm H', 'Black', 'Single Sided', 'Kings Park, NSW', NULL, 144.00, 432.00, '2024-04-18 09:49:30', '2024-04-18 09:49:30'),
(21, 27, 125, 'Base Test', 5, '850 mm W x 2000mm H', 'Black', 'Single Sided', 'Kings Park, NSW', NULL, 99.00, 495.00, '2024-04-18 09:49:30', '2024-04-18 09:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('8077vishal@gmail.com', 'xHybHZP4o2kksOFTFM5Rqo9P2UZQzRxfVyxBZC1JD1UMhG5sqn4BoQgrAy7G', '2024-05-08 06:56:05'),
('deepak@thetemz.com', 'DyBa9Bcz17Yp9NK8EErugP7GSZjjtMRG90U03KWwfJR8VhiSEMLmYxR3zQFx', '2024-04-15 08:52:49'),
('sachin@gmail.com', 'x1HhsCz3drew8e0p5U2u3VX34W1lKhBEUQGUSITAEZhqYcpxFYgMfJWxyCWQ', '2024-05-08 02:22:20'),
('vishal@thetemz.com', 'vPTErGkSltlWXFH11JptU0nz68cNuXthwVT1SY5moGv1hce54OqdDyHa4ArW', '2024-05-08 07:01:08'),
('vishaltemz@gmail.com', 'BlVw30S8qAcBy8pbS8HoD7d94wfmpKz4Md2hgPpH0NW4fD0EslB8VawW21nb', '2024-05-08 06:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_ranges`
--

CREATE TABLE `price_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_option` varchar(255) NOT NULL,
  `min_range` double(8,2) NOT NULL,
  `max_range` double(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_ranges`
--

INSERT INTO `price_ranges` (`id`, `product_id`, `price_option`, `min_range`, `max_range`, `price`, `created_at`, `updated_at`) VALUES
(1, 152, 'rollMedia', 1.00, 10.00, 25.00, '2024-05-23 02:00:29', '2024-05-23 02:00:29'),
(5, 153, 'rollMedia', 1.00, 10.00, 10.00, '2024-05-23 04:54:03', '2024-05-23 04:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_short_description` text DEFAULT NULL,
  `related_products` text DEFAULT NULL,
  `product_rating_review` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_discounted_price` decimal(8,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_meta_title` varchar(255) NOT NULL,
  `product_meta_keyword` varchar(255) NOT NULL,
  `product_meta_desp` varchar(255) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `product_tag` varchar(255) DEFAULT NULL,
  `product_feature` tinyint(1) NOT NULL DEFAULT 0,
  `product_is_selected` tinyint(1) NOT NULL DEFAULT 0,
  `product_date` date DEFAULT NULL,
  `product_comment` text DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 0,
  `product_key_feature` text DEFAULT NULL,
  `product_question` longtext DEFAULT NULL,
  `product_answer` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_sku`, `product_description`, `product_short_description`, `related_products`, `product_rating_review`, `product_image`, `product_price`, `product_discounted_price`, `category_id`, `subcategory_id`, `product_slug`, `product_meta_title`, `product_meta_keyword`, `product_meta_desp`, `product_status`, `product_tag`, `product_feature`, `product_is_selected`, `product_date`, `product_comment`, `product_color`, `product_quantity`, `product_key_feature`, `product_question`, `product_answer`, `created_at`, `updated_at`) VALUES
(16, 'Luxury Pull Up Banner', '2', '<p class=\"MsoNormal\"><font color=\"#000000\">Introducing our exquisite Luxury Retractable Banners—a fusion of durability, sophistication, and practicality. Crafted to command attention and leave a lasting impression, these banners are meticulously engineered to withstand the test of time, backed by an impressive three-year warranty for added peace of mind.</font></p><p class=\"MsoNormal\"><font color=\"#000000\">Designed for seamless functionality, our Luxury Retractable Banners effortlessly retract into sleek aluminum frames, facilitating hassle-free setup and effortless portability. For added convenience, each banner comes complete with a hand carry bag, ensuring ease of transportation wherever your event or promotion takes you.</font></p>', NULL, '18', NULL, NULL, '144.00', NULL, 4, 1, 'luxury-pull-up-banner', 'Luxury Pull Up Banner', 'Luxury Pull Up Banner', 'Luxury Pull Up Banner', 'active', 'Luxury Pull Up Banner', 1, 0, NULL, NULL, 'Black', 10, '<div><font color=\"#000000\"><b>1. Durable Frame: </b>Engineered to withstand repeated use and frequent interstate travel, our banners come equipped with a robust frame for long-lasting performance.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>2. Convenient Carry Bag: </b>Included for easy transport, our banners come with a convenient carry bag, ensuring hassle-free mobility wherever you go.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>3. Vibrant Full-Color Printing: </b>Utilizing environmentally friendly inks, our banners are digitally printed in vivid full color, guaranteeing eye-catching visuals that stand the test of time. These inks are UV resistant and odorless, ensuring longevity without compromising on environmental responsibility.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>4. Tear-Resistant PVC Material: </b>Crafted from tear-resistant PVC material, our banners are built to endure. With minimal curling, they maintain a sleek appearance even after extended use.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>5. Customizable Base Colors:</b> When ordering the 33\" wide option, you have the choice between a stylish silver or a bold black base color, allowing you to tailor your banner to suit your aesthetic preferences.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>6. Flexible Banner Widths:</b> Select from two banner widths—33\" or 47\"—to accommodate your specific display needs.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>7. Variety of Height Options</b>: Choose from two height options—79\" or 59\"—to achieve the perfect height for your display area.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>8. Three-Year Warranty: </b>Backed by a three-year warranty, our Luxury Retractable Banners provide added assurance of quality and durability, giving you peace of mind with your purchase.</font></div>', 'Q1. What is the estimated production time for my Luxury Retractable Banner order?~Q2. Could you explain the distinctions among Premium, Luxury, and Frameless Retractable Banners?~Q3. Is it possible to swap out the banner on my current Retractable Banner stand?~Q4. Is the Retractable Banner Stand suitable for outdoor use?~Q5. What is the quantity of poles included with my Retractable Banner?~Q6. What material is used for the printed banner?~Q7. Will there be additional setup fees for multiple designs?~Q9. Do you offer shipping as well?~Q9. I have more than one designs, will I be charged extra?', '<font color=\"#000000\">We\'re committed to delivering your order swiftly. Once artwork proof is approved, here\'s our production timeline: For orders fewer than 16 units: Your banners will be ready within 24 hours (1 working day) after artwork proof sign-off. For orders between 16 and 40 units: Expect your banners within 48 hours (2 working days) after artwork proof sign-off. If the order total exceeds $3300, we require receipt of deposit before production begins. For orders between 41 and 100 units: Allow 3 working days after artwork proof sign-off and receipt of deposit for production. For orders exceeding 100 units: Your banners will be ready in 4 working days after artwork proof sign-off and receipt of deposit.Rest assured, we\'re dedicated to ensuring your order is processed promptly and efficiently.</font>~<div><font color=\"#000000\">We understand that selecting the right Retractable Banner depends on your individual preferences. While all banners feature vibrant full-color graphics on smooth polypropylene material, the key difference lies in the bases.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">The Premium Retractable Banner boasts a durable base with a classic design, backed by a 12-month warranty. Offering excellent value, it\'s also convenient for transportation and assembly.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">For those seeking longevity and a premium touch, the Luxury Retractable Banners are ideal, supported by a 3-year warranty. With a sturdy frame and upscale feel, it\'s the epitome of quality.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">If you prefer a minimalist approach without visible frames, our Frameless Retractable Banners are the perfect choice. They seamlessly blend with your graphics, providing a clean and unobtrusive display.</font></div>~<p><font color=\"#000000\">We exclusively provide new complete units rather than replacing printed banners on existing Retractable Banner stands. This decision is based on several factors:</font></p><p><font color=\"#000000\">• The high labor cost associated with removing the old banner and installing a new one into the stand.</font></p><p><font color=\"#000000\">• The risk of damaging the banner stands during the banner changeover process.</font></p><p><font color=\"#000000\">• Many banner stands are in suboptimal condition and not suitable for reuse.</font></p><p><font color=\"#000000\">• Our competitive pricing for complete new units makes it a more economical choice compared to replacing banners on existing units.</font></p>~<font color=\"#000000\">Although the Retractable Banner Stand is predominantly designed for indoor applications, we strongly caution against deploying it outdoors due to inherent risks. When exposed to windy conditions, these stands may become unstable and prone to tipping over, which can result in damage or tearing of the banner. Despite these potential issues, we acknowledge that certain customers may opt to use them outdoors, albeit with an awareness of the associated risks and precautions.</font>~<font color=\"#000000\">When you order a Retractable Banner that is 33” wide, it will be accompanied by a single pole positioned at the back to provide support. In contrast, if you opt for a wider Pull Up Banner measuring 47” across, you will receive two poles for added stability and support, necessary to accommodate the increased width of the banner.</font>~<font color=\"#000000\">The printed banner featured in our Retractable Banners is crafted from a durable 13oz. polyester material, enhanced with a PVC coating to ensure vivid and striking prints. This material boasts a 250 x 250 denier blockout construction, providing excellent opacity and preventing light from passing through, resulting in crisp, high-quality graphics that truly stand out.</font>~<font color=\"#000000\">Certainly, our pricing already incorporates the setup cost for a single design. If you have multiple designs for the same size, you will still benefit from the discounted bulk price. However, please note that there is a nominal additional charge for each extra design to offset our supplementary setup expenses. To calculate the precise cost, simply input the total quantity of signs needed along with the total number of designs into the pricing calculator provided above. This will ensure an accurate price assessment tailored to your specific requirements.</font>~<font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font>~<font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br>', '2024-03-22 11:18:22', '2024-05-07 08:37:12'),
(18, 'Premium Pull Up Banners', '4', '<font color=\"#000000\">If you\'re seeking a top-tier advertising solution to effectively promote your service or business, look no further than our Premium Retractable Banners. These banners are designed to be exceptionally lightweight, retract effortlessly into the sleek aluminum frame, and can be set up within seconds, making them an ideal choice for on-the-go advertising. Complete with a convenient carry bag, they are easily transportable to any location. Printed on the same durable, high-quality PVC material as our Luxury Retractable Banners and Frameless Retractable Banners, they offer reliability and longevity in showcasing your message.</font>', NULL, '16', NULL, NULL, '180.90', NULL, 4, 1, 'premium-pull-up-banners', 'Premium Pull Up Banners', 'Premium Pull Up Banners', 'Premium Pull Up Banners', 'active', 'Premium Pull Up Banners', 1, 0, NULL, NULL, 'Black', 10, '<div><font color=\"#000000\">Our Premium Retractable Banners offer an array of features tailored to enhance your advertising experience:</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>Lightweight Design:</b> Designed to be effortlessly portable, our banners are lightweight, making them the perfect travel companion for your advertising needs.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>Convenient Carry Bag:</b> Each banner comes with a handy carry bag, ensuring hassle-free transportation to any destination.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>Vibrant Full-Color Printing:</b> Utilizing environmentally friendly inks, our banners are digitally printed in vibrant full color. These UV-resistant and odorless inks ensure long-lasting, eye-catching graphics.</font></div><div><font color=\"#000000\"><b><br></b></font></div><div><font color=\"#000000\"><b>Tear-Resistant PVC Material:</b> Crafted from tear-resistant PVC material, our banners are durable and resilient, with minimal curling even after repeated use.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>Customizable Base Colors:</b> Choose between a stylish silver or a bold black base color to match your branding and preferences.</font></div><div><font color=\"#000000\"><b><br></b></font></div><div><font color=\"#000000\"><b>Flexible Height Options:</b> Select from two height options—79\" or 59\"—to suit your display requirements.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>12-Month Warranty:</b> Backed by a 12-month warranty, our Premium Retractable Banners provide added assurance of quality and reliability.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\"><b>Compact Packing:</b> With a packed weight of 7lbs and packed size of 35.5 x 5 x 5 inches, our banners are compact and easy to store and transport.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Elevate your advertising efforts with our Premium Retractable Banners, offering convenience, durability, and vibrant graphics to help you stand out from the crowd.</font></div>', 'Q1. What is the production timeline for my Premium Retractable Banner order?~Q2. What is the difference between Premium, Luxury and Frameless Retractable Banners?~Q3. Is it suitable to utilize the Premium banner stand outdoors?~Q4. Is it possible to replace the banner on my current Retractable Banner stand?~Q5. How many support poles are included with my Premium Retractable Banner?~Q6. What material is utilized for the printed banner in our Retractable Banners?~Q7. Do you offer shipping as well?~Q8. I have more than one designs, will I be charged extra?', '<p><font color=\"#000000\">We can complete your order in as little as 24 hours after receiving approval of the artwork proof:</font></p><p><font color=\"#000000\">• For quantities fewer than 16 units, production will take 24 hours (1 working day) after the artwork proof sign-off.</font></p><p><font color=\"#000000\">• For quantities between 16 and 40 units, production will be completed within 48 hours (2 working days) after the artwork proof sign-off, along with receipt of deposit if the total exceeds $3300.</font></p><p><font color=\"#000000\">• For quantities between 41 and 100 units, expect production to be finished within 3 working days after the artwork proof sign-off and receipt of deposit.</font></p><p><font color=\"#000000\">• For quantities exceeding 100 units, production will be finalized within 4 working days after the artwork proof sign-off and receipt of deposit.</font></p>~<p><font color=\"#000000\">I know we have given you so many choices but deciding on which Retractable Banner is right for you comes down to your personal choice. The graphics are all printed in full color on the same smooth polypropylene material, but when it comes to the bases you will see a difference.</font></p><p><font color=\"#000000\">The Premium Retractable Banner is a high-quality base with a timeless design supplied with a 12-month warranty. This Retractable banner offers great value and is also easy to transport and assemble.</font></p><p><font color=\"#000000\">Luxury Retractable Banners look great and are designed to last with a 3-year warranty. If you are looking for a solid frame with that premium feel, then this is the one for you!</font></p><p><font color=\"#000000\">Our Frameless Retractable Banners are here for the frame haters. If you want a clean look that does not intrude on your graphics, then add a Frameless Retractable Banner to your cart now!</font></p>~<font color=\"#000000\">While the banner stands are not specifically designed for outdoor use, some customers do opt to use them in outdoor settings. However, we do not recommend this practice due to the risk of wind catching the large banner. Nonetheless, we acknowledge that some customers choose to use them outdoors with caution, particularly in calm weather conditions.</font>~<p><font color=\"#000000\">We do not offer replacement of printed banners on existing Retractable Banner stands; instead, we provide new complete units. There are several reasons for this decision:</font></p><p><font color=\"#000000\">1. The labor cost involved in removing the old banner and installing a new one into the stand is prohibitively expensive.</font></p><p><font color=\"#000000\">2. Attempting to change banners may result in the destruction of some banner stands.</font></p><p><font color=\"#000000\">3. Many banner stands are in poor condition and not suitable for reuse.</font></p><p><font color=\"#000000\">4. Our competitive pricing for complete new units makes it a more practical and cost-effective option compared to replacing banners on existing units.</font></p>~<font color=\"#000000\">Your Premium Retractable Banner will come with one support pole to provide reinforcement from behind.</font>~<font color=\"#000000\">The printed banner in our Retractable Banners is composed of a robust 13oz. polyester material, coated with PVC to ensure vibrant prints. Additionally, it features a 250 x 250 denier blockout construction for enhanced durability and opacity.</font>~<font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>', '2024-03-22 11:20:33', '2024-05-03 11:03:46'),
(90, 'Bollard Cover Signs', '34', '<p><font color=\"#000000\">Our Bollard Signs offer an economical solution for promoting your products while concealing unattractive bollards simultaneously. These signs are digitally printed in full color on all sides and are equipped with tabs cut into the corrugated plastic to secure the bollard sign together. We utilize premium Signflute™ Corrugated Plastic to ensure exceptional print quality, durability, and longevity of our Bollard Signs.</font><br></p>', NULL, '', NULL, NULL, '30.00', NULL, 5, NULL, 'bollard-cover-signs', 'Bollard Signs', 'Bollard Signs', 'Bollard Signs', 'active', 'Bollard Signs', 1, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">Our Bollard Signs feature vibrant full-color digital printing on all sides, directly applied to the durable Signflute™ Corrugated Plastic using state-of-the-art flatbed printers. This ensures weather resistance and top-notch quality, thanks to the 4mm thickness of the material.</font></p><p><font color=\"#000000\">With a built-in self-locking system, these signs can be effortlessly assembled in seconds by standing them up and inserting the tabs into the precut slots.&nbsp;</font></p><p><font color=\"#000000\">They are designed for various applications, with gas stations being a particularly common placement.</font></p><p><font color=\"#000000\">Additionally, substantial bulk discounts are available for large orders.</font></p><div><br></div>', 'Q1. What is the production time for my bollard signs?~Q2. What bollard diameters are compatible with the Bollard Signs?~Q3. What is the assembly method for the bollard signs?~Q4. What is the lifespan of the bollard signs?~Q5. Are additional setup fees applicable for multiple designs?~Q6. I have more than one designs, will I be charged extra?~Q7. Do you offer shipping as well?', '<p><font color=\"#000000\">We offer expedited production for your order, with turnaround times as quick as 24 hours after artwork proof approval:</font></p><p><font color=\"#000000\">• Orders totalling less than $1101 will be ready in 24 hours (1 working day) after artwork proof approval.</font></p><p><font color=\"#000000\">• For orders between $1101 and $3301, production will be completed within 48 hours (2 working days) after artwork proof approval.</font></p><p><font color=\"#000000\">• Orders ranging from $3301 to $5501 will be processed within 3 working days after artwork proof approval and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Similarly, for orders between $5501 and $11,001, production will take 4 working days after artwork proof approval and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders of $11,001 to $16,501 will be ready within 5 working days after artwork proof approval and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• For higher order values up to $38,501, the turnaround time extends to 9 working days after artwork proof approval and receipt of a 30% deposit.</font></p>~<p><font color=\"#000000\">Here are the specifications for our bollard signs based on their width and the corresponding diameter of the bollards they will fit:</font></p><p><font color=\"#000000\">• For 3-sided signs with a width of 11 inches, they will fit bollards with a diameter of 6 inches.</font></p><p><font color=\"#000000\">• 3-sided signs with a width of 12 inches are suitable for bollards with a diameter of 6.5 inches.</font></p><p><font color=\"#000000\">• 4-sided signs with a width of 5 inches will accommodate bollards with a diameter of 5 inches.</font></p><p><font color=\"#000000\">• Finally, 4-sided signs with a width of 7 inches are designed to fit bollards with a diameter of 7 inches.</font></p>~<p><font color=\"#000000\">Tabs and slots are incorporated into each side of our bollard signs, facilitating quick and effortless assembly by allowing you to join the sides together seamlessly in a matter of seconds.</font><br></p>~<p><font color=\"#000000\">The longevity of our bollard signs depends largely on UV exposure. If consistently placed outdoors under direct sunlight, you can anticipate a lifespan of approximately one year. However, if they are shielded from direct UV exposure, they have the potential to endure for several years.</font><br></p>~<p><font color=\"#000000\">Certainly! Our pricing already encompasses the setup cost for a single design. If you have multiple designs but require the same size for each, you\'ll still benefit from the discounted bulk price. However, a nominal fee is incurred for each additional design to accommodate the extra setup procedures. Just input the total number of signs needed along with the total number of designs into the pricing calculator provided, and it will generate an accurate price for your order.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>', '2024-03-22 11:33:53', '2024-04-19 11:52:11'),
(91, 'Corflute Signs', '74', '<p><font color=\"#000000\">Our Signflute™ Corrugated Plastic Signs stand out as one of the most sought-after forms of temporary signage available on the market.Frequently utilized for real estate signs, events, elections, building site signage, and beyond, our Signflute™ Signs are a cost-effective solution that swiftly communicates your message to clients and customers. Whether you require a small quantity or wish to place a bulk order, Signflute™ Signs offer affordability, with costs decreasing as the quantity increases.</font><br></p>', NULL, '', NULL, NULL, '39.00', NULL, 5, NULL, 'corflute-signs', 'Corflute Signs', 'Corflute Signs', 'Corflute Signs', 'active', 'Corflute Signs', 1, 0, NULL, NULL, 'Blue,Black', 10, '<p><font color=\"#000000\">• Take advantage of significant bulk discounts using our convenient instant online calculator.</font></p><p><font color=\"#000000\">• Printed on our premium Signflute™ Corrugated Plastic material, these signs boast UV and weather-resistant printing, ensuring durability and longevity in various conditions.</font></p><p><font color=\"#000000\">• Experience stunning full-color prints achieved through Latex Ink print technology, providing vivid and vibrant graphics.</font></p><p><font color=\"#000000\">• Choose any size from 6\" x 6\" up to 24\" x 36\", with larger sizes easily accommodated through multiple panels.</font></p><p><font color=\"#000000\">• Our signs can be customized to convex geometric shapes, including circles, triangles, and hexagons. Rounded corners are also available upon request, simply specify the desired radius.</font></p><p><font color=\"#000000\">• Featuring clear, rust-proof grommets that seamlessly blend into the sign\'s appearance, ensuring a professional look without distraction.</font></p><p><font color=\"#000000\">• Our largest sheet size is 24\" x 36\", but larger sizes can be created using multiple panels.</font></p><p><font color=\"#000000\">• Furthermore, our signs are completely recyclable even with grommets, reflecting our commitment to environmental sustainability.</font></p><p><font color=\"#000000\">• Design your sign online for free using our customizable templates.</font></p><p><font color=\"#000000\">• Please inform us if you require a specific flute direction; otherwise, the direction will be determined based on optimal yield.</font></p>', 'Q1. What is the production time for my Signflute™ signs order?~Q2. What geometric shapes are available for Signflute™ signs cutting?~Q3. What radius do you suggest for rounded corners on Signflute™ signs?~Q4. What is the variance for the cut size of your Signflute™ Signs?~Q5. What is the lifespan of Signflute™ corrugated plastic signs?~Q6. Is it necessary to specify the flute direction?~Q7. How are clear grommets superior to traditional metal grommets?~Q8. What sets Signflute™ apart from Coroplast®?~Q9. What is the maximum size my sign can be?~Q10. How can I request my signs to be cut into specific shapes?~Q11. Will there be additional setup fees for multiple designs?~Q12. I have more than one designs, will I be charged extra?~Q13. Do you offer shipping as well?', '<p><font color=\"#000000\">We offer expedited production for your order, with turnaround times based on the total order amount</font></p><p><font color=\"#000000\">• For orders up to $1500, production is completed within 24 hours (1 working day) after artwork proof approval.</font></p><p><font color=\"#000000\">• Orders between $1501 and $3300 require 48 hours (2 working days) for production after artwork proof approval, with a 30% deposit required.</font></p><p><font color=\"#000000\">• Orders between $3301 and $10,000 are produced within 3 working days after artwork proof approval, along with receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• For orders between $10,001 and $17,500, production takes 4 working days after artwork proof approval and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders ranging from $17,501 to $25,000 are completed within 5 working days after artwork proof approval and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• For orders between $25,001 and $32,500, production requires 6 working days after artwork proof approval and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders exceeding $32,501 are produced within 7 working days after artwork proof approval and receipt of a 30% deposit.</font></p>~<p><font color=\"#000000\">We offer the option to cut Signflute™ signs into various convex geometric shapes, including:</font></p><p><font color=\"#000000\">• Squares or rectangles</font></p><p><font color=\"#000000\">• Circles</font></p><p><font color=\"#000000\">• Triangles</font></p><p><font color=\"#000000\">• Hexagons</font></p><p><font color=\"#000000\">Additionally, all these shapes can feature curved corners. If you prefer rounded corners, please specify the desired radius for the corners during the ordering process.</font></p>~<p><font color=\"#000000\">Customers have the flexibility to specify the radius of the rounded corners according to their sign design preferences. While we generally recommend a radius of 1 inch as suitable for most designs, customers can select a radius that best suits their specific requirements.</font></p>~<p><font color=\"#000000\">Signflute™ Signs are commonly ordered in sizes such as 18 inches, 24 inches, or 36 inches. However, it\'s essential to be aware that there may be a slight margin of error in the sign\'s actual size, typically around 3/8 inch. Consequently, your 36-inch Signflute™ sign may be cut to a width of 35 5/8 inches. Nonetheless, this slight variation in size is generally imperceptible to viewers of the sign.</font><br></p>~<p><font color=\"#000000\">The longevity of Signflute™ corrugated plastic signs is influenced by UV exposure. However, our latest generation Signflute™ material, coupled with advanced printing technology, offers a longer lifespan compared to lower-grade corrugated plastic materials available on the market. When placed outdoors and consistently exposed to UV, these signs can now last over 15 months, a notable improvement from the typical 12-month lifespan. When used indoors, their durability extends to several years.</font></p>~<p><font color=\"#000000\">Please inform us if you require a specific flute direction for your corrugated plastic sign. This information is crucial depending on how you intend to use the sign. For instance, if you plan to use metal stakes, vertical flutes are necessary to allow the spikes to slide into the flutes. On the other hand, if you\'re attaching the sign to a single vertical post or telegraph pole, horizontal flutes provide added strength and prevent the sign from bending around the pole. If no flute direction is specified, we will default to the direction that optimizes material usage.</font></p>~<p><font color=\"#000000\">Clear grommets represent the cutting-edge in grommet technology. Unlike traditional metal grommets, which could obscure the graphic on your sign and stand out prominently, clear grommets are transparent. This transparency allows you to see more of your graphic on the sign, as the clear grommets are barely noticeable. Despite their see-through nature, clear grommets are equally durable as metal grommets but are resistant to rust. Overall, signs adorned with clear grommets boast a significantly enhanced aesthetic appeal.</font><br></p>~<p><font color=\"#000000\">Our Signflute™ Corrugated Plastic material is imported, while Coroplast® Signs are made from the authentic Coroplast® corrugated plastic product manufactured in North America. Both materials undergo printing on our HP R2000 Latex printers at our Pennsylvania manufacturing warehouse, utilizing the same inks and printing process.</font></p><p><font color=\"#000000\">Coroplast® material offers a 30% longer lifespan compared to the imported product. We anticipate Coroplast® Signs to endure for up to 2 years, whereas Signflute™ Corrugated Plastic Signs are expected to last between 12 to 15 months, contingent upon the extent of UV exposure they encounter.</font></p>~<p><font color=\"#000000\">The maximum sheet size available is 47.5” x 47.5”. Nevertheless, we have the capability to accommodate any sign size you need by utilizing multiple sheets.</font><br></p>~<p><font color=\"#000000\">To obtain a price for your signage to be cut to a specific shape, please input the maximum height and width dimensions into the instant pricing calculator provided above. Next, choose \"Custom Contour\" from the Cutting dropdown menu. When preparing the artwork, ensure that it is configured with a vectored cutline according to our artwork specifications.</font></p>~<p><font color=\"#000000\">Certainly! Our pricing includes the setup cost for one design only. If you have multiple designs for the same size, you\'ll still benefit from the lower bulk price. However, please note that there will be a small additional charge for each extra design to cover our setup costs. To calculate the accurate price for your order, simply input the total number of signs required along with the total number of designs into the pricing calculator provided above.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>', '2024-03-22 11:35:09', '2024-04-18 10:54:29'),
(93, 'Election Signs', '35', '<div><font color=\"#000000\">Looking to make a splash in the upcoming election? Look no further! For years, we\'ve been crafting and dispatching Plastic Election Signs to help candidates like you spread their message far and wide!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">We utilize fully recyclable Signflute™ corrugated plastic material, ensuring eco-friendly campaigning. Your graphics are printed in vibrant digital color at a remarkably high resolution, guaranteeing a sharp and eye-catching design.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">With our complimentary Online Design Tool, crafting compelling election signage has never been easier. Stand out from the crowd and garner those crucial votes with signage that leaves a lasting impression!</font></div>', NULL, '', NULL, NULL, '39.00', NULL, 5, NULL, 'election-signs', 'Election Signs', 'Election Signs', 'Election Signs', 'active', 'Election Signs', 1, 0, NULL, NULL, 'Black', 10, '<font color=\"#000000\">Take advantage of substantial bulk discounts on offer! Our Plastic Election Signs are crafted using top-tier Signflute™ material, ensuring durability and longevity. With UV and weather-resistant printing, your message remains vibrant even in harsh conditions. Our cutting-edge latex print technology delivers stunning full-color results. Choose from standard polling sizes for convenience. Equipped with clear, rust-proof grommets, your sign maintains its professional appearance. We ship nationwide for your convenience, with swift turnaround times. Plus, access our user-friendly Online Design Tool at no cost!</font>', 'Q1. What is the production time for Signflute™ signs?~Q2. What is the lifespan of Signflute™ corrugated plastic signs?~Q3. Is it necessary to specify flute direction?~Q4. Will there be additional setup fees for multiple designs?~Q5. I have more than one designs, will I be charged extra?~Q6. Do you offer shipping as well?', '<p><font color=\"#000000\">We offer swift production times for your order upon artwork proof approval:</font></p><p><font color=\"#000000\">• Orders under $1501: Completed within 24 hours (1 working day) after artwork proof sign-off.</font></p><p><font color=\"#000000\">• Orders between $1501 and $3301: Completed within 48 hours (2 working days) after artwork proof sign-off and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders between $10,001 and $17,501: Completed within 3 working days after artwork proof sign-off and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders between $17,501 and $25,001: Completed within 4 working days after artwork proof sign-off and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders between $25,001 and $32,501: Completed within 5 working days after artwork proof sign-off and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders between $32,501 and $40,001: Completed within 6 working days after artwork proof sign-off and receipt of a 30% deposit.</font></p><p><font color=\"#000000\">• Orders over $40,001: Completed within 7 working days after artwork proof sign-off and receipt of a 30% deposit.</font></p>~<p><font color=\"#000000\">The lifespan of our Signflute™ corrugated plastic signs largely hinges on UV exposure. With our advanced printing technology and high-quality Signflute™ material, these signs boast a longer life expectancy compared to lower-grade alternatives. When consistently exposed to UV outdoors, our signs can last over 15 months, surpassing the typical 12-month lifespan of other materials. For indoor use, their durability ensures they can endure for years.</font><br></p>~<p><font color=\"#000000\">Specifying the flute direction for your corrugated plastic signs is crucial for certain applications. For instance, if you plan to use metal stakes, vertical flutes are needed to allow the spikes to slide into them securely. Similarly, when attaching the sign to a single vertical post or telegraph pole, horizontal flutes provide extra strength and prevent bending. However, if you don\'t specify a flute direction, we\'ll choose the direction that ensures the best yield during production.</font><br></p>~<p><font color=\"#000000\">Certainly! Our pricing includes the setup cost for one design. If you have multiple designs for the same size, you\'ll still benefit from the bulk pricing. However, there\'s a slight additional charge for each extra design to cover the setup costs. To calculate the accurate price for your order, just enter the total number of signs required along with the total number of designs into the pricing calculator provided above.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>', '2024-03-22 11:36:21', '2024-04-18 11:18:28'),
(94, 'Selfie Frames', '26', '<font color=\"#000000\">Assemble your selfie crew and get ready to dazzle with our Selfie Frames! Whether you prefer to customize one of our editable templates using our Online Design Tool or unleash your creativity with our downloadable PDF artwork templates, the choice is yours!</font>', NULL, '', NULL, NULL, '30.00', NULL, 5, NULL, 'event-selfie-frames', 'Event Selfie Frames', 'Event Selfie Frames', 'Event Selfie Frames', 'active', 'Event Selfie Frames', 1, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• Experience lightning-fast printing within just 24 hours!</font></p><p><font color=\"#000000\">• Choose from small and large sizes to suit your needs.</font></p><p><font color=\"#000000\">• Our frames are printed on waterproof plastic, ensuring durability even if accidents happen.</font></p><p><font color=\"#000000\">• No need for scissors or knives - we\'ll cut the frame to perfection for immediate use!</font></p><p><font color=\"#000000\">• Our affordable price covers personalized details printed on our templates.</font></p><div><br></div>', 'Q1. What is the production time for my selfie frame?~Q2. What material are the Selfie Frames composed of?~Q3. Are the Selfie Frames provided as solid panels?~Q4. Is it possible to request custom sizes for Selfie Frames?~Q5. I have more than one designs, will I be charged extra?~Q6. Do you offer shipping as well?', '<p><font color=\"#000000\">• For orders fewer than 51 units, expect completion within 24 hours (1 working day) after online design approval and order submission.</font></p><p><font color=\"#000000\">• For orders ranging from 51 to 150 units, anticipate completion within 48 hours (2 working days) after online design approval and order submission. A deposit may be required for orders exceeding $3300, inclusive of GST.</font></p>~<p><font color=\"#000000\">The Selfie Frames are constructed from premium 5mm thick Signflute™, a waterproof corrugated plastic material known for its quality.</font><br></p>~<p><font color=\"#000000\">Certainly, both sizes are manufactured as single panels and are not folded for your convenience.</font><br></p>~<p><font color=\"#000000\">Regrettably, we only offer the sizes of Selfie Frames as displayed on our website. Nevertheless, we\'ve discovered that these dimensions are among the most sought-after in the market, ensuring our sizes meet your needs effectively.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>', '2024-03-22 11:37:01', '2024-04-19 11:52:44'),
(95, 'Life Size Cutouts', '28', '<p>Life-size cutouts are large, freestanding cardboard or foam board figures depicting a person or character. Often used for parties, events, or promotions, they provide interactive photo opportunities and serve as attention-grabbing decorations.<br></p>', NULL, NULL, NULL, '95-14-1711107463.png', '40.00', NULL, 5, NULL, 'life-size-cutouts', 'Life Size Cutouts', 'Life Size Cutouts', 'Life Size Cutouts', 'active', 'Life Size Cutouts', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:37:43', '2024-03-22 11:37:43'),
(96, 'Novelty Cheques', '38', '<div><font color=\"#000000\">Novelty Cheques offer a lightweight and weatherproof solution for showcasing significant donations and cash prizes in a visually striking manner. Made from durable coreflute material, these cheques come in various sizes and are effortlessly portable, making them ideal for events. Opting for lamination with a matte or gloss finish not only enhances the design\'s appeal but also prolongs its lifespan and safeguards the print. With their cost-effectiveness and substantial visual impact, novelty cheques rank among our top-selling products.</font></div><div><br></div>', NULL, '', NULL, NULL, '30.00', NULL, 5, NULL, 'novelty-cheques', 'Novelty Cheques', 'Novelty Cheques', 'Novelty Cheques', 'active', 'Novelty Cheques', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">48-HOUR TURNAROUND Your novelty cheques will be prepared for pickup or shipping within 48 hours upon receiving artwork approval for printing. Shipping durations may vary. For urgent \"Same Day\" or \"Next Day\" orders, please contact us to confirm availability; additional charges may apply.</font></p><p><font color=\"#000000\">$28 FLAT RATE SHIPPING ACROSS AUSTRALIA Enjoy a standard flat-rate shipping fee for all orders nationwide. For express same-day courier services, please request a quote. Shipping durations will vary depending on the destination.</font></p><p><font color=\"#000000\">SAME DAY RUSH PRINTING OPTION Require expedited service? We offer rush printing options for all our standard 48-hour turnaround products, subject to availability. Refer to the link below for full terms and conditions.</font></p>', 'Q1. What is the production time for my order?~Q2. Can you customize my signage shape?~Q3. Are there additional setup fees for multiple designs?~Q4. Do you provide rush services?~Q5. Do you offer design assistance?~Q6. Do you provide installation services?~Q7. Do you offer logo redraw services?~Q8. I have more than one designs, will I be charged extra?~Q9. Do you offer shipping as well?', '<p><font color=\"#000000\">After you\'ve made the payment, you\'ll receive artwork approval through our online system. Upon your approval, we\'ll proceed with production. Typically, most products have a standard turnaround time of 48 hours, unless otherwise specified. Keep in mind that shipping times may vary depending on the chosen shipping method.</font><br></p>~<p><font color=\"#000000\">Our advanced digital cutting tables enable us to cut signs and stickers into any desired shape, regardless of the material used.</font><br></p>~<p><font color=\"#000000\">There are no additional setup fees or charges for multiple designs.</font><br></p>~<p><font color=\"#000000\">Yes, we do offer Rush Services. Orders requiring completion earlier than our standard lead times will incur a +50% Surcharge on all products.</font><br></p>~<p><font color=\"#000000\">Yes, our team of designers and printers have extensive experience in creating and completing projects with quality, skill, and careful attention to detail. We offer a range of design packages, from basic artwork setup to custom design work, to meet your specific needs and preferences.</font><br></p>~<p><font color=\"#000000\">We provide installation services for a wide range of products. Feel free to reach out to us to discuss the details and schedule a free measure and quote.</font><br></p>~<p><font color=\"#000000\">We specialize in efficiently and affordably redrawing logos or artwork. Once your logo or artwork is redrawn into a vector format, you can utilize it for all future printing and branding needs.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>', '2024-03-22 11:38:34', '2024-04-18 11:24:56');
INSERT INTO `product` (`id`, `product_name`, `product_sku`, `product_description`, `product_short_description`, `related_products`, `product_rating_review`, `product_image`, `product_price`, `product_discounted_price`, `category_id`, `subcategory_id`, `product_slug`, `product_meta_title`, `product_meta_keyword`, `product_meta_desp`, `product_status`, `product_tag`, `product_feature`, `product_is_selected`, `product_date`, `product_comment`, `product_color`, `product_quantity`, `product_key_feature`, `product_question`, `product_answer`, `created_at`, `updated_at`) VALUES
(97, 'Posters', '48', '<p class=\"MsoNormal\"><font color=\"#000000\">Looking for a durable poster that can withstand tough conditions while still attracting attention? Look no further than our Yupo Synthetic Paper!</font></p><p class=\"MsoNormal\"><font color=\"#000000\">Crafted from a cutting-edge polypropylene material, Yupo Synthetic Paper offers exceptional durability. Waterproof and highly resistant to UV and tearing, our Yupo Posters are perfect for both indoor and outdoor applications.</font></p>', NULL, '', NULL, NULL, '35.00', NULL, 8, NULL, 'posters', 'Posters', 'Posters', 'Posters', 'active', 'Posters', 0, 0, NULL, NULL, 'Blue', 10, '<div><font color=\"#000000\">• Experience high-resolution, full-color digital prints that truly stand out with our Yupo Posters. Crafted from Yupo material, these posters offer exceptional durability, being waterproof and resistant to UV and tearing.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• With a super smooth and bright white surface boasting a satin finish, your graphics will pop with vibrancy and clarity. Printed on HP Latex printers, our posters require no lamination, ensuring a hassle-free process from start to finish.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Embrace versatility with a minimum size of 10 inches by 10 inches and a maximum size of 118 inches by 59 inches, catering to a wide range of display needs.</font></div><div><br></div>', 'Q1. What materials are used for printing the posters?~Q2. What does Yupo FPU material refer to?~Q3. Why are lamination not necessary for the posters?~Q4. Are Yupo posters suitable for scrolling applications?~Q5. How are the posters prepared for delivery?~Q6. What is the typical production time for poster orders?~Q7. Do additional setup fees apply for orders with multiple designs?~Q8. Do you offer shipping as well?~Q9. I have more than one designs, will I be charged extra?', '<font color=\"#000000\">The Yupo Posters feature an ultra-smooth, next-generation synthetic polypropylene material, renowned for its weather-resistant and tear-resistant properties. Similarly, the Paper Posters utilize an ultra-smooth paper material. Both materials boast a bright white color that enhances the printed graphics and exhibit a satin finish. Our posters are printed using cutting-edge HP Latex printers, ensuring exceptional print quality and vividness.</font>~<font color=\"#000000\">Yupo FPU is a 100% recyclable synthetic paper, innovatively extruded from polypropylene pellets. It represents a significant advancement over traditional paper due to its remarkable tear resistance, chemical resistance, and UV resistance. Notably, Yupo FPU boasts a super smooth texture and bright white color, enabling digitally printed colors to stand out vibrantly on posters.</font>~<font color=\"#000000\">The Paper material and Yupo FPU material share a weight of 5.9 oz. and exhibit outstanding stiffness and anti-curl properties. Additionally, both materials demonstrate high ink adhesion, ensuring exceptional scratch resistance when printed on our HP Latex printers. Consequently, there is no requirement for lamination of the posters.</font>~<font color=\"#000000\">Yupo posters are exclusively designed for static uses and are not recommended for scrolling applications.</font>~<font color=\"#000000\">The posters are carefully rolled and packaged within a robust cardboard tube to guarantee their safety during transportation.</font>~<p><font color=\"#000000\">We offer expedited production for your order, with turnaround times as follows:</font></p><p><font color=\"#000000\">• Orders under $1101: Completed within 24 hours (1 working day) after artwork proof sign off.</font></p><p><font color=\"#000000\">• Orders between $1101 and $2751: Completed within 48 hours (2 working days) after artwork proof sign off.</font></p><p><font color=\"#000000\">• Orders between $2751 and $8801: Completed within 3 working days after artwork proof sign off and receipt of a 30% deposit if the total exceeds $3300.</font></p><p><font color=\"#000000\">• Orders between $8801 and $16,501: Completed within 4 working days after artwork proof sign off and receipt of a 30% deposit.</font></p>~<font color=\"#000000\">Certainly! Our pricing already incorporates the setup cost for one design. In the event of multiple designs for the same size, you will still benefit from the discounted bulk price. However, there will be a small additional charge for each extra design to accommodate our supplementary setup costs. Simply input the total number of signs required and the total number of designs into the pricing calculator provided, and it will generate an accurate price for you.</font>~<font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>', '2024-03-22 11:39:14', '2024-04-19 11:57:26'),
(98, 'Backdrops', '56', '<p>Backdrops are large, often scenic or thematic backgrounds used in photography, theater, events, and film productions. They provide a visually appealing setting for subjects or performers, enhancing the atmosphere and creating immersive experiences.<br></p>', NULL, NULL, NULL, '98-17-1711107609.png', '39.00', NULL, 8, NULL, 'backdrops', 'Backdrops', 'Backdrops', 'Backdrops', 'active', 'Backdrops', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:40:09', '2024-03-22 11:40:09'),
(99, 'Floor Stickers', '37', '<p>Floor stickers are adhesive decals designed to be applied to various flooring surfaces. They are commonly used for wayfinding, advertising, or branding purposes in retail stores, exhibitions, events, and public spaces. Floor stickers are durable, easy to apply, and can feature vibrant graphics or messages to attract attention and guide foot traffic.<br></p>', NULL, NULL, NULL, '99-18-1711107649.png', '49.00', NULL, 8, NULL, 'floor-stickers', 'Floor Stickers', 'Floor Stickers', 'Floor Stickers', 'active', 'Floor Stickers', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:40:49', '2024-03-22 11:40:49'),
(101, 'Loose Table Throws', '76', '<p>Loose table throws are versatile fabric coverings used to drape over tables for decorative or branding purposes. They are often made from polyester or other durable materials and can be customized with logos, patterns, or colors to complement event themes or company branding.<br></p>', NULL, NULL, NULL, '101-19-1711107713.png', '29.00', NULL, 8, NULL, 'loose-table-throws', 'Loose Table Throws', 'Loose Table Throws', 'Loose Table Throws', 'active', 'Loose Table Throws', 0, 0, NULL, NULL, 'Blue', 11, NULL, NULL, NULL, '2024-03-22 11:41:53', '2024-03-22 11:41:53'),
(102, 'Media Wall', '29', '<p>A media wall is a large backdrop typically used in events, press conferences, or red carpet occasions. It\'s designed to serve as a prominent branding or promotional space, often featuring logos, sponsor messages, or graphics. Media walls provide a visually appealing background for photo opportunities and media coverage.<br></p>', NULL, NULL, NULL, '102-20-1711107760.png', '30.00', NULL, 8, NULL, 'media-wall', 'Media Wall', 'Media Wall', 'Media Wall', 'active', 'Media Wall', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:42:40', '2024-03-22 11:42:40'),
(103, 'Wallpapers', '33', '<p>Wallpapers are decorative coverings applied to interior walls to enhance the aesthetic appeal of a space. They come in a variety of materials, patterns, and textures, allowing for customization to suit different design preferences. Wallpapers can dramatically transform a room\'s ambiance and are popular for both residential and commercial settings.<br></p>', NULL, NULL, NULL, '103-21-1711107805.png', '49.00', NULL, 8, NULL, 'wallpapers', 'Wallpapers', 'Wallpapers', 'Wallpapers', 'active', 'Wallpapers', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:43:25', '2024-03-22 11:43:25'),
(104, 'Window Graphics', '45', '<p>Window graphics are adhesive decals or films applied to glass surfaces, commonly used for advertising, branding, or decorative purposes. They can feature logos, images, or text and are often used in retail stores, offices, vehicles, or public spaces to attract attention and convey messages to passersby. Window graphics offer a cost-effective way to utilize available space for promotional or informational purposes while allowing natural light to enter the space.<br></p>', NULL, '', NULL, NULL, '29.00', NULL, 8, NULL, 'window-graphics', 'Window Graphics', 'Window Graphics', 'Window Graphics', 'active', 'Window Graphics', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:44:10', '2024-04-09 04:55:29'),
(105, 'Feather Flags', '55', '<div><font color=\"#000000\">If you want to make a splash with your customers or leave a lasting impression at your next event, it\'s time to \"Go the Bow!\"</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Our Bow Banners are incredibly simple to assemble and ensure a flawless appearance every time, thanks to our easy tensioning system. Their portability means you can set up your Bow Banner anywhere you desire, supported by our wide range of bases designed for almost any location.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Simply select from our single-sided flag printed (with mirror reverse) or double-sided block out flag (featuring crisp graphics legible from both sides). Then, provide your artwork or design using our online design tool, and we\'ll swiftly produce and dispatch your Bow Banner within just 24 hours*.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">No print-ready artwork? No problem! You can easily create your own custom design using our online design tool.</font></div>', NULL, '', NULL, NULL, '30.00', NULL, 6, NULL, 'feather-flags', 'Feather Flags', 'Feather Flags', 'Feather Flags', 'active', 'Feather Flags', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">Here\'s why our Bow Banners stand out:</font></p><p><font color=\"#000000\">• Online design tool available for easy customization</font></p><p><font color=\"#000000\">• Crafted in Australia at our Sydney manufacturing facility</font></p><p><font color=\"#000000\">• Available in four sizes: Small, Medium, Large, and Jumbo</font></p><p><font color=\"#000000\">• Rapid 24-hour production turnaround</font></p><p><font color=\"#000000\">• Ideal for various events</font></p><p><font color=\"#000000\">• Printed on premium SignWeave™ fabric material</font></p><p><font color=\"#000000\">• Option for single (mirror reverse) or double-sided printing</font></p><p><font color=\"#000000\">• Full-color dye sublimation printing for vibrant visuals</font></p><p><font color=\"#000000\">• Robust CE Certified epoxy fiberglass poles with stainless steel sleeve reinforcement at the base</font></p><p><font color=\"#000000\">• Poles designed for Australian conditions and backed by a 2-year warranty</font></p><p><font color=\"#000000\">• Wide range of heavy-duty bases available to suit every application</font></p><p><font color=\"#000000\">• All bases include a heavy-duty fully enclosed ball bearing spindle, allowing flags to swivel with the wind</font></p><p><font color=\"#000000\">• Easy assembly and tensioning process</font></p><p><font color=\"#000000\">• Optional carry bag available for convenient transportation and storage</font></p><p><font color=\"#000000\">• Dimensions of carry bag: 1530 x 195 x 30 mm</font></p>', 'Q1. What is the production time for Bow Banners?~Q2. What is the thickness of polyester fabric used for Bow Banners?~Q3. How long will the print on the flags last?~Q4. What is the sleeve and which color should I select?~Q5. What does single-sided mirror reverse print mean?~Q6. How are double-sided flags printed?~Q7. How do I tension my Flag?~Q8. How can I remove creases from the polyester fabric?~Q9. Why are the Flag Pole Sets not smooth?~Q10. What is the difference between the Cross Base &amp; Water Bag and the Premium Cross Base?~Q11. How much do the flag bases weigh?~Q12. Which Heavy Duty Square Base should I choose for my flag?~Q13. Will your bases fit poles I already have?~Q14. Can I have objects and fences near my flag?~Q15. Does the pole set come with a carry bag?~Q16. Are there extra setup fees for multiple designs?~Q17. I have more than one designs, will I be charged extra?~Q18. Do you offer shipping as well?~Q19. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">For small and medium sizes:</font></p><p><font color=\"#000000\">• Less than 5 units: 24 hours (1 working day) after artwork proof sign-off</font></p><p><font color=\"#000000\">• Less than 41 units: 48 hours (2 working days) after artwork proof sign-off and receipt of deposit if order exceeds $3300 inc GST</font></p><p><font color=\"#000000\">• Less than 121 units: 3 working days after artwork proof sign-off and receipt of deposit</font></p><p><font color=\"#000000\">• Less than 201 units: 4 working days after artwork proof sign-off and receipt of deposit</font></p><p><font color=\"#000000\">• Less than 301 units: 5 working days after artwork proof sign-off and receipt of deposit</font></p><p><font color=\"#000000\">• For large and jumbo sizes:</font></p><p><font color=\"#000000\">• Less than 3 units: 24 hours (1 working day) after artwork proof sign-off</font></p><p><font color=\"#000000\">• Less than 31 units: 48 hours (2 working days) after artwork proof sign-off and receipt of deposit if order exceeds $3300 inc GST</font></p><p><font color=\"#000000\">• Less than 101 units: 3 working days after artwork proof sign-off and receipt of deposit</font></p><p><font color=\"#000000\">• Less than 151 units: 4 working days after artwork proof sign-off and receipt of deposit</font></p><p><font color=\"#000000\">• Less than 251 units: 5 working days after artwork proof sign-off and receipt of deposit</font></p>~<p><font color=\"#000000\">Single-sided Bow Banners use 120gsm SignWeave™ material, while double-sided Bow Banners are printed on special 145gsm Blockout SignWeave™ material, with two banners sewn back-to-back.</font><br></p>~<p><font color=\"#000000\">Flags are printed using the dye sublimation process, ensuring high-quality print and vibrant colors.</font></p><p><font color=\"#000000\">When used internally, flags last indefinitely; when used outdoors, fading may occur over time due to UV exposure, typically lasting 6 - 12 months.</font></p>~<p><font color=\"#000000\">The sleeve is the pocket where the pole slides in, made of strong fabric. Black or white material is available, often selected to match the artwork or based on personal preference.</font><br></p>~<p><font color=\"#000000\">The artwork is printed on one side of the flag, showing the correct image and color. The other side displays a mirrored image with slightly less vibrancy, as the printed image has bled through from the other side.</font><br></p>~<p><font color=\"#000000\">Double-sided flags are printed on SignWeave™ Block Out Polyester Material and sewn together (back-to-back) to achieve a high-quality satin finish legible from both sides.</font><br></p>~<p><font color=\"#000000\">Follow the Flag Tensioning Guide provided with your flag or available for download.</font><br></p>~<p><font color=\"#000000\">Use a steamer or a warm iron with an ironing cloth to remove any creases.</font><br></p>~<p><font color=\"#000000\">Pole Sets are made from strong fiberglass with a rough black finish, enhancing durability indoors and outdoors, backed by a 2-year warranty.</font><br></p>~<p><font color=\"#000000\">The Cross Base &amp; Water Bag features chrome plating and four foldable legs, providing good stability when used with a filled 10 kg Water Bag. The Premium Cross Base has two 50mm wide black powder-coated steel plates in an “X” shape, offering greater stability on hard surfaces and compatibility with tent pegs for non-solid surfaces.</font><br></p>~<p><font color=\"#000000\">Ground Spike: 1.07 kgs</font></p><p><font color=\"#000000\">Cross Base with water bag: 3.5 kgs</font></p><p><font color=\"#000000\">Premium Cross Base: 3.8 kgs</font></p><p><font color=\"#000000\">U-shaped Car tire base: 1.75 kgs</font></p><p><font color=\"#000000\">Wall brackets: 0.7 kgs</font></p><p><font color=\"#000000\">Heavy Duty Square Base: 5.0 kgs, 7.0 kgs, or 10.0 kgs depending on the option chosen.</font></p>~<p><font color=\"#000000\">Choose based on flag size and stability requirements, considering 5 kg, 7 kg, or 10 kg options.</font><br></p>~<p><font color=\"#000000\">While possible, only our bases are guaranteed to fit our poles.</font><br></p>~<p><font color=\"#000000\">Avoid placing flags near buildings, bushes, sharp-topped fences, and other objects to minimize wear and tear.</font><br></p>~<p><font color=\"#000000\">You can add an optional carry bag for convenient transportation and storage.</font><br></p>~<p><font color=\"#000000\">Yes, while bulk pricing applies, there\'s a small additional charge for multiple designs to cover setup costs. Enter the total number of signs and designs for accurate pricing.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font></p>~<font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font>', '2024-03-22 11:44:55', '2024-04-18 07:22:51'),
(106, 'Flag Poles & Accessories', '31', '<div><font color=\"#000000\">Have a stunning banner but noticing wear and tear on your pole or base? No need to fret - we\'ve got the solution for you!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Our top-notch Flag Pole Sets and Bases are specially crafted to complement Easy Signs Teardrop Banners, Bow Banners, and Rectangle Flags.</font></div>', NULL, '', NULL, NULL, '30.00', NULL, 6, NULL, 'flag-poles-accessories', 'Flag Poles & Accessories', 'Flag Poles & Accessories', 'Flag Poles & Accessories', 'active', 'Flag Poles & Accessories', 0, 0, NULL, NULL, 'Blue', 9, '<p><font color=\"#000000\">Here\'s what sets our accessories apart:</font></p><p><font color=\"#000000\">• Robust CE Certified epoxy fiberglass poles with double steel sleeve reinforcement at the base</font></p><p><font color=\"#000000\">• Poles tailored for Australian conditions and backed by a 2-year warranty</font></p><p><font color=\"#000000\">• Poles feature a 16mm internal diameter at the base</font></p><p><font color=\"#000000\">• Various heavy-duty bases available, including cross base with water bag, ground spike, U-shaped car tire base, and wall bracket</font></p><p><font color=\"#000000\">• Convenient Teardrop, Bow &amp; Rectangle pole carry bag for effortless transportation and storage</font></p><p><font color=\"#000000\">• All bases equipped with a heavy-duty fully enclosed ball bearing spindle, enabling flags to swivel with the wind</font></p><p><font color=\"#000000\">• Each base comes with a 1-year warranty for peace of mind</font></p><p><font color=\"#000000\">• Please note that our accessories are exclusively compatible with Easy Sign\'s Flag Range. If you need an additional base for your Easy Signs poles, these products are tailored just for you!</font></p>', 'Q1. When can you dispatch my order for flag pole sets &amp; bases?~Q2. Why are the Flag Pole Sets not smooth?~Q3. Will your bases fit a set of poles I already have?~Q4. What size flags will fit your Pole Sets?~Q5. Which Heavy Duty Square Base should I choose for my flag?~Q6. I have more than one designs, will I be charged extra?~Q7. Do you offer shipping as well?~Q8. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">These products are stocked, and orders placed and paid before 2pm AEST will be packed and dispatched the same day. Orders placed after 2pm AEST will be dispatched the next working day.</font><br></p>~<p><font color=\"#000000\">Our Pole Sets are crafted from sturdy fiberglass and finished in a rough black texture rather than a polished silver coating. This rugged finish enhances durability, ensuring longevity whether used indoors or outdoors. Our poles are tailored for Australian conditions and come with a 2-year warranty.</font><br></p>~<p><font color=\"#000000\">While it\'s possible, we can only guarantee that our bases will fit our own poles.</font><br></p>~<p><font color=\"#000000\">Our Pole Sets are designed to accommodate standard Easy Signs Teardrop Banners, Bow Banners, and Rectangle Flags. You can find the actual sizes of the flags on the product web pages, including images in the gallery and downloadable artwork templates sized precisely to the flags.</font><br></p>~<p><font color=\"#000000\">Depending on your flag\'s size, you\'ll have a choice of up to three Heavy Duty Square Bases - 5 kg, 7 kg, and 10 kg. Lighter bases are less stable but more cost-effective and easier to handle and ship. For Medium, Large, and Jumbo flags, not all options may be available as smaller bases on these flags increase the risk of tipping. You can find more information about choosing the right base for your flag on our website.</font></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:45:35', '2024-04-18 07:38:32'),
(107, 'Replacement Fabric Flags', '22', '<div><font color=\"#000000\">Guess what? You can still promote your business or product with a fresh new banner, without needing to invest in a complete pole set and base - simply swap out the flags!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Our cost-effective Replacement Flags enable you to showcase a new message using the poles and bases from your existing Easy Signs Teardrop Banners, Bow Banners, or Rectangle Flags!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Please note that our Replacement Flags DO NOT include any poles, bases, or carry bags.</font></div>', NULL, '', NULL, NULL, '50.00', NULL, 6, NULL, 'replacement-fabric-flags', 'Replacement Fabric Flags', 'Replacement Fabric Flags', 'Replacement Fabric Flags', 'active', 'Replacement Fabric Flags', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">Here\'s why our Replacement Flags stand out:</font></p><p><font color=\"#000000\">• Made in Australia at our Sydney manufacturing facility</font></p><p><font color=\"#000000\">• Rapid 24-hour production turnaround</font></p><p><font color=\"#000000\">• Printed on our premium SignWeave™ fabric material</font></p><p><font color=\"#000000\">• Full-color dye sublimation printing for vibrant visuals</font></p><p><font color=\"#000000\">• Available for both silver and black pole sets</font></p><p><font color=\"#000000\">• Option for single (mirror reverse) or double-sided printing</font></p><p><font color=\"#000000\">• Enjoy bulk discounts using our instant online calculator</font></p><p><font color=\"#000000\">• It\'s essential to choose the right template to ensure that your Replacement Flag fits your pole set accurately. If you\'re unsure about your pole set, please refer to the image gallery to distinguish between a silver and black pole set.</font></p>', 'Q1. What is the difference between a Replacement Flag for a Silver or Black Pole set?~Q2. What thickness polyester fabric do you supply for Replacement Flags?~Q3. Will Easy Signs flags fit other manufacturer’s poles?~Q4. I have multiple designs, are there extra setup fees?~Q5. I have more than one designs, will I be charged extra?~Q6. Do you offer shipping as well?~Q7. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">New black pole sets were introduced on May 6, 2019, for Bow Banners and Teardrop Banners, and on June 14, 2019, for Rectangle Flags. Prior to these dates, all flag poles were silver. Both the silver and black flag pole sets use slightly different templates. It\'s crucial to select the right template to ensure your Replacement Flag fits your pole set accurately. If unsure about your pole set, refer to the image gallery to distinguish between a silver and black pole set.</font><br></p>~<p><font color=\"#000000\">Our Replacement Flags are printed on our high-quality SignWeave™ polyester fabric. Single-sided Replacement Flags use a 120gsm SignWeave™ material, while double-sided Replacement Flags are printed on a special 145gsm Blockout SignWeave™ material and then sewn back to back.</font><br></p>~<p><font color=\"#000000\">Different manufacturers produce poles of varying sizes, so we cannot guarantee that our flags will fit other manufacturers\' poles.</font><br></p>~<p><font color=\"#000000\">Yes, our pricing includes the setup cost for one design only. If you have multiple designs for the same size, you will still benefit from the lower bulk price. However, there\'s a small additional charge for each additional design to cover our extra setup costs. Simply enter the total number of signs required along with the total number of designs into the pricing calculator for an accurate price.</font></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:46:15', '2024-04-18 07:33:21'),
(108, 'Teardrop Flags', '52', '<div><font color=\"#000000\">Introducing our captivating Teardrop Banners designed to captivate attention both indoors and outdoors!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Assembling them is a breeze, ensuring a flawless appearance every time, thanks to our user-friendly tensioning system. Their portability allows you to set up your Teardrop Banner anywhere you desire, with our extensive range of bases catering to nearly any location.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Simply choose between our single-sided flag printed (with mirrored reverse) or double-sided block out flag (offering legibility from both sides). Then, provide your artwork, and we\'ll have your Teardrop Banner ready for dispatch in just 24 hours*.</font></div>', NULL, '', NULL, NULL, '35.00', NULL, 6, NULL, 'teardrop-flags', 'Teardrop Flags', 'Teardrop Flags', 'Teardrop Flags', 'active', 'Teardrop Flags', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• Crafted in Australia at our Sydney manufacturing facility.</font></p><p><font color=\"#000000\">• Rapid 24-hour production turnaround</font></p><p><font color=\"#000000\">• Ideal for various events</font></p><p><font color=\"#000000\">• Printed on premium SignWeave™ fabric material.</font></p><p><font color=\"#000000\">• Available in four sizes: Small, Medium, Large, and Jumbo</font></p><p><font color=\"#000000\">• Option for single (mirror reverse) or double-sided printing</font></p><p><font color=\"#000000\">• Full-color dye sublimation printing for vibrant visuals</font></p><p><font color=\"#000000\">• Robust CE Certified epoxy fiberglass poles with stainless steel sleeve reinforcement at the base</font></p><p><font color=\"#000000\">• Poles designed for Australian conditions, backed by a 2-year warranty.</font></p><p><font color=\"#000000\">• Extensive range of heavy-duty bases to suit diverse applications.</font></p><p><font color=\"#000000\">• All bases feature a heavy-duty fully enclosed ball bearing spindle, allowing flags to swivel with the wind.</font></p><p><font color=\"#000000\">• Easy assembly and tensioning process</font></p><p><font color=\"#000000\">• Optional carry bag available for effortless transportation and storage</font></p><p><font color=\"#000000\">• Dimensions of carry bag: 1530 x 195 x 30 mm</font></p>', 'Q1. What is the production time for Teardrop Banners?~Q2. How long will the print on the flags last?~Q3. What does single-sided mirror reverse print mean?~Q4. How are double-sided flags printed?~Q5. How do I tension my Flag?~Q6. How can I remove creases from the polyester fabric?~Q7. What is the difference between the Cross Base &amp; Water Bag and the Premium Cross Base?~Q8. How much do the flag bases weigh?~Q9. Which Heavy Duty Square Base should I choose for my flag?~Q10. Why are the Flagpole Sets not smooth?~Q11. Can I have objects and fences near my flag?~Q12. Will your bases fit poles I already have?~Q13. Does the pole set come with a carry bag?~Q14. Are there extra setup fees for multiple designs?~Q15. I have more than one designs, will I be charged extra?~Q16. Do you offer shipping as well?~Q17. I have multiple designs, are there extra setup fees?', '<p>• For small and medium sizes:</p><p>• Less than 5 units: 24 hours (1 working day) after artwork proof sign-off</p><p>• Less than 41 units: 48 hours (2 working days) after artwork proof sign-off and receipt of deposit if order exceeds $3300 inc GST.</p><p>• Less than 121 units: 3 working days after artwork proof sign-off and receipt of deposit</p><p>• Less than 201 units: 4 working days after artwork proof sign-off and receipt of deposit</p><p>• Less than 301 units: 5 working days after artwork proof sign-off and receipt of deposit.</p><p>• For large and jumbo sizes:</p><p>• Less than 3 units: 24 hours (1 working day) after artwork proof sign-off</p><p>• Less than 31 units: 48 hours (2 working days) after artwork proof sign-off and receipt of deposit if order exceeds $3300 inc GST.</p><p>• Less than 101 units: 3 working days after artwork proof sign-off and receipt of deposit</p><p>• Less than 151 units: 4 working days after artwork proof sign-off and receipt of deposit</p><p>• Less than 251 units: 5 working days after artwork proof sign-off and receipt of deposit.</p><p>• What is the thickness of the polyester fabric used for Teardrop Banners?</p><p>• Our single-sided Teardrop Banners use 120gsm SignWeave™ material, while our double-sided Teardrop Banners are crafted from a special 145gsm Blockout SignWeave™ material, with two banners sewn back-to-back.</p>~Flags printed using the dye sublimation process will last indefinitely when used internally. When used outdoors, fading may occur over time due to exposure to UV, typically lasting 6-12 months.~<p>Single-sided mirror reverse printing displays the artwork correctly on one side of the flag, while the other side shows a mirrored image with slightly less vibrancy.</p>~<p>Double-sided flags are printed on SignWeave™ Block Out Polyester Material and sewn back-to-back to achieve a high-quality satin printed finish legible from both sides.</p>~<p>Refer to the Flag Tensioning Guide provided with your flag or available for download on our website.<br></p>~<p>We recommend using a steamer or a warm iron with an ironing cloth to remove creases.<br></p>~<p>The Cross Base &amp; Water Bag is chrome-plated with four foldable legs and provides stability when used with a filled 10 kg Water Bag. The Premium Cross Base features two 50mm wide black powder-coated steel plates in an \"X\" shape, offering stability on hard surfaces and allowing attachment of tent pegs for non-solid surfaces.<br></p>~<p>Ground Spike: 1.07 kgs</p><p>Cross Base with water bag: 3.5 kgs</p><p>Premium Cross Base: 3.8 kgs</p><p>U-shaped Car tyre base: 1.75 kgs</p><p>Wall brackets: 0.7 kgs</p><p>Heavy Duty Square Base: 5.0 kgs, 7.0 kgs, or 10.0 kgs depending on the option chosen.</p>~<p>Depending on the flag size, you can choose from 5 kg, 7 kg, or 10 kg Heavy Duty Square Bases. The selection depends on stability requirements and flag size limitations.<br></p>~<p>Our Pole Sets have a rough black finish for durability, ensuring longevity indoors and outdoors, backed by a 2-year warranty.<br></p>~<p>To minimize damage, ensure your flag is clear of surrounding objects, both stationary and during wind movement, such as buildings, bushes, and sharp-topped fences.</p>~<p>While possible, we can only guarantee our bases will fit our poles.<br></p>~<p>You can opt to include a carry bag for convenient transportation and storage.</p>~<p>Yes, while bulk pricing applies, there\'s a small additional charge for multiple designs to cover setup costs. Enter the total number of signs and designs for accurate pricing.<br></p>~<p>Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.<br></p>~<p>At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.<br></p>~<p>Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</p>', '2024-03-22 11:47:07', '2024-04-18 07:04:10'),
(109, 'Aluminium Composite Panel', '15', '<p>Aluminium Composite Panels (ACP) are versatile building materials consisting of two aluminum sheets bonded to a polyethylene core. They are lightweight, durable, and offer excellent rigidity and flatness. ACPs are commonly used for external cladding, signage, architectural features, and interior design applications due to their weather resistance, ease of fabrication, and aesthetic appeal.<br></p>', NULL, NULL, NULL, '109-27-1711108074.png', '59.00', NULL, 9, NULL, 'aluminium-composite-panel', 'Aluminium Composite Panel', 'Aluminium Composite Panel', 'Aluminium Composite Panel', 'active', 'Aluminium Composite Panel', 0, 0, NULL, NULL, 'Blue', 9, NULL, NULL, NULL, '2024-03-22 11:47:54', '2024-03-22 11:47:54'),
(110, 'Parking Signs', '17', '<p>Parking signs are regulatory or informational signs installed in parking lots or along roadsides to convey rules, restrictions, directions, or other important information related to parking. They help guide drivers and pedestrians, prevent confusion, ensure safety, and enforce parking regulations. These signs often feature standardized symbols, text, and colors to communicate effectively to motorists and pedestrians.<br></p>', NULL, '', NULL, NULL, '30.00', NULL, 4, NULL, 'parking-signs', 'Parking Signs', 'Parking Signs', 'Parking Signs', 'active', 'Parking Signs', 0, 0, NULL, NULL, 'Blue', 10, NULL, '', '', '2024-03-22 11:48:37', '2024-05-03 08:27:02'),
(111, 'Brochures/Menus', '18', '<p><font color=\"#000000\">Our Brochures serve as an effective marketing tool to convey information about your product, event, or organization professionally. Printed in ultra-high resolution, they ensure that your message is communicated clearly and attractively.</font><br></p>', NULL, '', NULL, NULL, '39.00', NULL, 7, NULL, 'brochuresmenus', 'Brochures', 'Brochures', 'Brochures', 'active', 'Brochures', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• Available Sizes: Choose from three standard finished sizes: A3 bi-folded in half to A4 size (4pp), A4 bi-folded in half to A5 size (4pp), or A4 tri-folded into DL size (6pp).</font></p><p><font color=\"#000000\">• Superfast Production: Benefit from our 24-hour production turnaround time, ensuring quick delivery of your brochures.</font></p><p><font color=\"#000000\">• Full-Color Printing: Enjoy full-color ultra-high resolution digital printing on both sides of the brochure, maximizing visual impact.</font></p><p><font color=\"#000000\">• Creased and Folded: Our brochures are supplied creased and folded, making them ready to use right out of the box, saving you time and effort.</font></p><p><font color=\"#000000\">• Paper Quality: Printed on bright white, coated paper with outstanding color reproduction, our brochures come in two paper thickness options: 150gsm or 250gsm.</font></p><p><font color=\"#000000\">• Finish Options: Choose between Gloss or Matte finishes to add a touch of sophistication and tailor the look of your brochures to your preference.</font></p><p><font color=\"#000000\">• FSC Certified: Our brochures are proudly FSC certified by Hankuk Paper, reflecting our commitment to sustainability and responsible sourcing.</font></p><p><font color=\"#000000\">• With our range of sizes, paper thicknesses, and finish options, you can create brochures that effectively communicate your message and leave a lasting impression on your audience.</font></p>', 'Q1. How long will my order for Brochures take to produce?~Q2. How are the brochures printed?~Q3. Do you offer brochures in custom sizes or other variations?~Q4. How are the brochures folded?~Q5. What paper are the brochures printed onto?~Q6. Does the Matte Paper have any sheen or is it completely flat matte?~Q7. Can I have my brochures laminated?~Q8. How are the brochures packed for delivery?~Q9. Why do you only offer coated brochures?~Q10. Do you offer offset or litho printing processes?~Q11. I have more than one designs, will I be charged extra?~Q12. Do you offer shipping as well?~Q13. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">Unfortunately, we\'re currently experiencing extended lead times due to mechanical issues. However, once resolved, production times will resume as follows:</font></p><p><font color=\"#000000\">• Orders under $1101 inc GST: 24 hours (1 working day) after artwork proof sign-off</font></p><p><font color=\"#000000\">• Orders under $2201 inc GST: 48 hours (2 working days) after artwork proof sign-off</font></p><p><font color=\"#000000\">• Orders under $5501 inc GST: 3 working days after artwork proof sign-off and receipt of deposit if over $3300 inc GST</font></p><p><font color=\"#000000\">• Orders under $11,001 inc GST: 4 working days after artwork proof sign-off and receipt of deposit</font></p>~<p><font color=\"#000000\">Our Brochures are printed on the HP Indigo 7800 Digital Press, ensuring high-quality prints with sophisticated color automation for accuracy and consistency.</font><br></p>~<p><font color=\"#000000\">At this stage, we only offer standard sizes and configurations. However, we plan to expand the range of brochures offered in the future.</font><br></p>~<p><font color=\"#000000\">Brochures are printed, creased, and folded, ready to use. A4 Brochures are an A3 sheet creased in the middle and folded in half, A5 Brochures are an A4 sheet creased in the middle and folded in half, and DL Tri-folded Brochures are an A4 sheet with 2 creases folded inwards into 3 DL pages.</font><br></p>~<p><font color=\"#000000\">We print brochures on bright white, A2 quality coated paper with outstanding color reproduction, proudly made and FSC certified by Hankuk Paper.</font></p>~<p><font color=\"#000000\">The Matte Paper has a small amount of sheen, resembling a silk finish.</font><br></p>~<p><font color=\"#000000\">We do not offer lamination for brochures. They are printed on high-quality stock with either a matte or gloss finish.</font><br></p>~<p><font color=\"#000000\">Brochures are carefully packed in heavy-duty boxes to ensure safe arrival.</font></p>~<p><font color=\"#000000\">Coated paper provides superior print quality to uncoated papers, ensuring sharp images and text.</font><br></p>~<p><font color=\"#000000\">We do not offer traditional lithographic offset printing. However, our HP Indigo 7800 Digital Press matches or exceeds offset quality, allowing prints to be used interchangeably.</font></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:49:17', '2024-04-19 12:01:18');
INSERT INTO `product` (`id`, `product_name`, `product_sku`, `product_description`, `product_short_description`, `related_products`, `product_rating_review`, `product_image`, `product_price`, `product_discounted_price`, `category_id`, `subcategory_id`, `product_slug`, `product_meta_title`, `product_meta_keyword`, `product_meta_desp`, `product_status`, `product_tag`, `product_feature`, `product_is_selected`, `product_date`, `product_comment`, `product_color`, `product_quantity`, `product_key_feature`, `product_question`, `product_answer`, `created_at`, `updated_at`) VALUES
(112, 'Business Cards', '20', '<div><font color=\"#000000\">Looking to make a lasting impression without saying a word? Explore our Premium Business Cards!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Crafted on 360gsm premium card stock, these cards boast a complimentary gloss or matte lamination, elevating your design for a refined and memorable introduction.</font></div>', NULL, '', NULL, NULL, '29.00', NULL, 7, NULL, 'business-cards', 'Business Cards', 'Business Cards', 'Business Cards', 'active', 'Business Cards', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• Lightning-fast 24-hour production*</font></p><p><font color=\"#000000\">• Full-color ultra-high resolution digital print on both sides</font></p><p><font color=\"#000000\">• Available in Modern (84x55mm) or Traditional (90x55mm) sizes</font></p><p><font color=\"#000000\">• Exceptional look and feel</font></p><p><font color=\"#000000\">• Customizable with matte or gloss lamination</font></p><p><font color=\"#000000\">• Durable and sophisticated</font></p>', 'Q1. How long does it take to produce my Business Cards order?~Q2. Can I write on my Premium Business Cards?~Q3. How are the business cards printed?~Q4. Can I get a custom size business card?~Q5. What is 360gsm artboard?~Q6. What lamination should I choose for my Premium Business Cards?~Q7. Can I get my Premium Business Cards without lamination?~Q8. How are the business cards packed for delivery?~Q9. Are Easy Signs Business Cards printed double-sided?~Q10. Can I get my business cards with print on one side only?~Q11. Can I get rounded corners on the business cards?~Q12. Can you crease and fold my business cards?~Q13. Why do you only offer coated business cards?~Q14. Do you offer any other printing embellishments?~Q15. I have more than one designs, will I be charged extra?~Q16. Do you offer shipping as well?~Q17. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">Due to temporary mechanical issues, our Business Cards currently have an extended lead time. Production times are expected to return to normal by April 15th, 2024. In the meantime, you can get an accurate estimate using the pricing calculator on our website.</font><br></p>~<p><font color=\"#000000\">The lamination on Premium Business Cards makes it challenging to write on them. For writable cards, we recommend our Essential Business Cards or Luxury Business Cards.</font><br></p>~<p><font color=\"#000000\">We utilize the HP Indigo 7800 Digital Press, renowned for its speed, quality, and versatility. This ensures exceptional accuracy and consistency across all prints.</font><br></p>~<p><font color=\"#000000\">We offer business cards exclusively in the sizes listed on our website and do not accommodate custom sizes.</font><br></p>~<p><font color=\"#000000\">Our Premium Business Cards are printed on thick 360gsm bright white ultra-smooth coated artboard, providing rigidity and a premium feel.</font><br></p>~<p><font color=\"#000000\">Choose Gloss Lamination for vibrant colors and deep blacks, or Matte Lamination for a subtle and sophisticated finish.</font><br></p>~<p><font color=\"#000000\">Premium Business Cards are available only with matte or gloss lamination. For unlaminated cards, refer to our Essential Business Cards page.</font><br></p>~<p><font color=\"#000000\">Cards are shrink-wrapped and packed securely in a cardboard box, then placed in a bubble-lined satchel for protection during transit. Different designs are packed separately.</font><br></p>~<p><font color=\"#000000\">Yes, all our business cards are printed in full color on both sides at no extra charge.</font><br></p>~<p><font color=\"#000000\">We offer single-sided printing at no extra cost, leaving the other side blank.</font><br></p>~<p><font color=\"#000000\">We only provide business cards with square-cut corners; rounded corners are not available.</font><br></p>~<p><font color=\"#000000\">Unfortunately, we do not offer creasing options for Business Cards at this time.</font><br></p>~<p><font color=\"#000000\">Coated papers offer sharper print quality and are more economical, providing the best value for your communication needs.</font><br></p>~<p><font color=\"#000000\">Aside from laminates, such as Spot UV coatings, foiling, or embossing, we do not offer additional embellishments.</font></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:50:00', '2024-04-18 07:51:30'),
(113, 'Envelopes', '21', '<div><font color=\"#000000\">Upgrade your document sending or marketing kit with our Custom Printed Flat Mailing Boxes!</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Say goodbye to ordinary postal envelopes and opt for a custom printed box that\'s bound to leave a lasting impression on your clients and colleagues. Choose from a White Clay Coated material for vibrant designs that pop, or go for a Kraft finish for a sleek, minimalist look that complements bold designs. Our Custom Printed Flat Mailing Boxes are printed on the Latex R2000 printer, ensuring full-color digital prints of outstanding quality.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Please note: We do not print using white ink. Therefore, when selecting the Kraft finish, white elements will remain blank, showcasing the natural Kraft material look.</font></div><div><br></div>', NULL, '', NULL, NULL, '29.00', NULL, 7, NULL, 'envelopes', 'Envelopes', 'Envelopes', 'Envelopes', 'active', 'Envelopes', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• Box sizes tailored to fit standard document sizes</font></p><p><font color=\"#000000\">• Choose between Kraft or White Clay Coated stock</font></p><p><font color=\"#000000\">• Options for single or double-sided printing</font></p><p><font color=\"#000000\">• Pre-creased and easy to assemble</font></p><p><font color=\"#000000\">• Both materials proudly FSC certified (Forestry Stewardship Council)</font></p><p><font color=\"#000000\">• Made from 100% recyclable material</font></p>', 'Q1. How long will it take to produce my Custom Printed Flat Mailing Boxes?~Q2. What’s the difference between Kraft and White Clay Coated stock?~Q3. What is the difference between our Custom Mailer Boxes and Flat Mailing Boxes?~Q4. How do you assemble the Custom Printed Flat Mailing Boxes?~Q5. Does the inside of the Mailer Box have a matte or gloss finish?~Q6. How accurate will the color be on the Kraft material?~Q7. Can I get white ink on my Kraft Boxes?~Q8. What is the tolerance for aligning the inside and outside prints?~Q9. Are the Custom Printed Mailer Boxes waterproof?~Q10. Do you charge extra for multiple designs?~Q11. I have more than one designs, will I be charged extra?~Q12. Do you offer shipping as well?~Q13. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">We offer production times based on the order value. Typically, orders can be produced within 24 to 6 working days after artwork proof sign off, depending on the order value.</font><br></p>~<p><font color=\"#000000\">Kraft stock is the classic brown cardboard, ideal for minimalist designs, while White Clay Coated stock offers vibrant colors with a semi-gloss finish outside and matte inside.</font><br></p>~<p><font color=\"#000000\">Both are available in Kraft and White Clay Coated stock. The main difference lies in the shape, with Flat Mailing Boxes suitable for smaller items and Custom Mailer Boxes used for various products, with options in E Flute and B Flute material.</font><br></p>~<p><font color=\"#000000\">These boxes come pre-creased for easy assembly. We provide an assembly guide for assistance.</font><br></p>~<p><font color=\"#000000\">The finish varies based on the material selected. Kraft boxes have a matte finish inside and outside, while White Clay Coat boxes have a semi-gloss finish outside and matte inside.</font><br></p>~<p><font color=\"#000000\">Printing directly onto brown cardboard alters colors. Lighter colors may appear almost transparent due to the natural color of the cardboard showing through.</font><br></p>~<p><font color=\"#000000\">We do not print white ink on Kraft boxes.</font><br></p>~<p><font color=\"#000000\">The tolerance for alignment is approximately 4mm.</font><br></p>~<p><font color=\"#000000\">No, these boxes are made from cardboard stock and are not waterproof.</font><br></p>~<p><font color=\"#000000\">Yes, there\'s a small multiple artwork charge for each additional design to cover setup costs. Simply input the total number of signs and designs into the pricing calculator for an accurate price.</font></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:50:32', '2024-04-18 08:37:44'),
(114, 'Flyers', '23', '<div><font color=\"#000000\">Create stunning marketing materials with our versatile range of flyers.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">We offer sizes ranging from A3, A4, A5, A6, DL, and even custom sizes to suit your needs. Choose from five paper weights, ranging from a lightweight 128gsm up to a sturdy 300gsm, and opt for single or double-sided printing. Finish off your flyers with either a gloss or matte paper finish, and if your flyers are 200gsm or heavier, choose from two lamination films to add that extra touch of quality.</font></div><div><br></div>', NULL, '', NULL, NULL, '39.00', NULL, 7, NULL, 'flyers', 'Flyers', 'Flyers', 'Flyers', 'active', 'Flyers', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• Superfast 24-hour production:* Get your flyers printed quickly to meet your deadlines.</font></p><p><font color=\"#000000\">• Full-color ultra-high-resolution digital print: Enjoy vibrant and crisp images and text.</font></p><p><font color=\"#000000\">• Bright white, coated paper: Ensures outstanding color reproduction.</font></p><p><font color=\"#000000\">• Available in various standard sizes: Including A3, A4, A5, A6, and DL, as well as custom sizes.</font></p><p><font color=\"#000000\">• Choice of paper weight: Select from 128gsm, 150gsm, 200gsm, 250gsm, or 300gsm coated paper.</font></p><p><font color=\"#000000\">• Choice of Gloss or Matte finish: Tailor the look and feel of your flyers to suit your brand.</font></p><p><font color=\"#000000\">• Gloss or Matte lamination available: For 200gsm or thicker stock, adding a premium feel.</font></p><p><font color=\"#000000\">• Single or double-sided printing: Choose the option that best suits your design needs.</font></p><p><font color=\"#000000\">• Maximum size: 297mm x 420mm (A3); Minimum size: 60mm x 60mm.</font></p><p><font color=\"#000000\">• FSC certified by Hankuk Paper: Proudly sourced from responsibly managed forests.</font></p><p><font color=\"#000000\">*Subject to production and order requirements.</font></p>', 'Q1. How long will my order for Flyers take to produce?~Q2. What paper are the flyers printed onto?~Q3. How are the flyers printed?~Q4. Can I have my flyers laminated?~Q5. What lamination should I choose for my Flyers?~Q6. How are the flyers packed for delivery?~Q7. Can you crease and fold my flyers?~Q8. Why do you only offer coated flyers?~Q9. Do you offer any other printing embellishments?~Q10. Do you offer offset or litho printing processes?~Q11. I have more than one designs, will I be charged extra?~Q12. Do you offer shipping as well?~Q13. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">Due to temporary mechanical issues, our lead times are extended. We expect to resume normal lead times on April 15th, 2024. In the meantime, production times vary based on order value and artwork proof sign-off.</font><br></p>~<p><font color=\"#000000\">Our flyers are printed on bright white, A2 quality coated paper with exceptional color reproduction. We offer a range of weights from 128gsm to 300gsm, sourced from Hankuk Paper, which is FSC certified and holds the ISO 14001 EMS accreditation.</font><br></p>~<p><font color=\"#000000\">We use the HP Indigo 7800 Digital Press, known for its speed, quality, and versatility. This press ensures accuracy, consistency, and high productivity, maintaining the quality of your flyers from job to job.</font><br></p>~<p><font color=\"#000000\">Yes, you can choose to add either Gloss or Matte lamination to your flyers. This option is available for flyers that are 200gsm or heavier. Lamination enhances durability and adds a unique finish to your flyers.</font></p>~<p><font color=\"#000000\">Gloss lamination enhances color depth and makes images pop, suitable for showcasing products or vibrant designs. Matte lamination offers a more subtle and sophisticated look, making your flyers easier to read in well-lit areas.</font></p>~<p><font color=\"#000000\">Our flyers are carefully packed in heavy-duty boxes to ensure they arrive safely, minimizing any risk of damage during transit.</font><br></p>~<p><font color=\"#000000\">We do not offer creased or folded flyers. However, this service is available on our Brochures page.</font></p>~<p><font color=\"#000000\">Coated paper provides superior print quality compared to uncoated paper, ensuring sharp and vibrant images and text.</font><br></p>~<p><font color=\"#000000\">No, besides our range of laminates, we do not offer additional embellishments such as Spot UV coatings, foiling, or embossing.</font><br></p>~<p><font color=\"#000000\">We do not offer traditional lithographic offset printing. However, our HP Indigo 7800 Digital Press can match or exceed offset quality, making your prints suitable for various applications.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:51:08', '2024-04-18 08:11:14'),
(115, 'Labels', '25', '<p><font color=\"#000000\">Looking to customize your labels for any occasion? Look no further! We offer label printing in various shapes and sizes, with the flexibility to cut them to your desired dimensions (up to 290mm x 200mm) and supply them kiss-cut on A3 (297mm x 420mm) sheets.</font><br></p>', NULL, '', NULL, NULL, '30.00', NULL, 7, NULL, 'labels', 'Labels', 'Labels', 'Labels', 'active', 'Labels', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• High-Quality Materials: Choose from Gloss Paper or Matte Synthetic stock for a special finish.</font></p><p><font color=\"#000000\">• Durability: Add gloss or matte lamination for extra durability.</font></p><p><font color=\"#000000\">• Superfast Production: Benefit from our 24-hour production turnaround time.</font></p><p><font color=\"#000000\">• Full-Color Printing: Utilizing our HP7800 Indigo Press, we offer full-color ultra-high-resolution digital printing.</font></p><p><font color=\"#000000\">• Permanent Adhesive: Ensures your labels stay in place.</font></p><p><font color=\"#000000\">• Barcode and QR Code Printing: Customize labels with barcodes and QR codes to suit your needs.</font></p><p><font color=\"#000000\">• Waterproof and Tear-Resistant: Our Matte Synthetic Labels offer enhanced durability against water and tears.</font></p><p><font color=\"#000000\">• Flexible Sizing: Minimum label size of 35mm x 35mm and maximum size of 290mm x 200mm.</font></p><p><font color=\"#000000\">• Convenient Packaging: Labels are supplied on A3 sheets, ready for easy peeling and sticking.</font></p><p><font color=\"#000000\">• Protection During Delivery: Packaged in sturdy cardboard boxes to ensure safe delivery.</font></p><p><font color=\"#000000\">• With our HP Indigo 7800 Digital Press, you can expect bold, colorful prints with sharp text and crisp images. Whether it\'s barcodes, QR codes, or fine text, our labels cater to a wide range of business needs, offering endless possibilities for customization.</font></p>', 'Q1. How long will it take to produce my Label order?~Q2. Can my labels be cut to a custom shape?~Q3. Is a quantity of 1 just 1 label only or 1 sheet of labels?~Q4. How will my labels be supplied?~Q5. Are the labels waterproof?~Q6. How large can my label be in one piece?~Q7. I have multiple designs, are there extra setup fees?~Q8. I have more than one designs, will I be charged extra?~Q9. Do you offer shipping as well?~Q10. I have multiple designs, are there extra setup fees?', '<p><font color=\"#000000\">Due to temporary mechanical issues, our lead times are extended. However, we expect to resume normal lead times by April 15, 2024. You can use the pricing calculator on our website for accurate production time estimates. Here\'s a breakdown of our usual production times:</font></p><p><font color=\"#000000\">• Less than $1101 inc GST: 24 hours after artwork proof sign off</font></p><p><font color=\"#000000\">• Less than $2201 inc GST: 48 hours after artwork proof sign off</font></p><p><font color=\"#000000\">• Less than $5501 inc GST: 3 working days after artwork proof sign off and receipt of deposit if over $3300 inc GST</font></p><p><font color=\"#000000\">• Less than $11,001 inc GST: 4 working days after artwork proof sign off and receipt of deposit</font></p>~<p><font color=\"#000000\">Absolutely! We can cut labels into any shape you desire, from circles to unicorns. These custom shapes will be supplied kiss-cut on a sheet. Simply enter the maximum width and height of your shape in the instant pricing calculator on our website and select \"Custom Contour\" in the Cutting dropdown.</font><br></p>~<p><font color=\"#000000\">A quantity of 1 refers to just 1 label and not an entire sheet. You need to enter the total quantity required, and we will supply them on sheets accordingly.</font></p>~<p><font color=\"#000000\">Your labels will be supplied on A3 (420mm x 297mm) sheets. The number of stickers on each sheet will depend on their size.</font><br></p>~<p><font color=\"#000000\">Our Matte Synthetic Labels are waterproof and tear-resistant, made from a strong synthetic paper extruded from polypropylene pellets. The Gloss Paper Labels, however, are water-resistant but not ideal for extended submersion in water.</font><br></p>~<p><font color=\"#000000\">We can print and cut labels up to a maximum size of 290mm x 200mm.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the setup cost for 1 design only. If you have multiple designs for the same size, you will still benefit from the bulk price, but there will be a small additional charge for each extra design to cover our setup costs. Simply enter the total number of labels required and then the total number of designs into the pricing calculator on our website for an accurate price.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p>At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.<br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:51:58', '2024-04-18 08:43:07'),
(116, 'Magazines', '27', '<p>Magazines are periodical publications containing articles, photographs, and advertisements on various topics such as news, entertainment, fashion, lifestyle, or hobbies. They are typically printed on glossy paper and bound together, offering readers a combination of informative and entertaining content. Magazines are distributed either through subscriptions, newsstands, or online platforms and cater to specific interests or demographics, providing readers with in-depth coverage and analysis on subjects of their interest.<br></p>', NULL, NULL, NULL, '116-34-1711108356.png', '40.00', NULL, 7, NULL, 'magazines', 'Magazines', 'Magazines', 'Magazines', 'active', 'Magazines', 0, 0, NULL, NULL, 'Blue', 10, NULL, NULL, NULL, '2024-03-22 11:52:36', '2024-03-22 11:52:36'),
(119, 'Posters-Printing', '77', '<div><font color=\"#000000\">Our posters are printed in high-resolution, full digital color and are available in either 200gsm Paper or 200gsm Yupo Synthetic Paper.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Looking for a sturdy poster that can withstand rough conditions and still attract attention? Then say \'yup\' to Yupo! Yupo Synthetic Paper is a Japanese-made, new-generation polypropylene material that is waterproof and offers excellent resistance to UV and tearing, making our Yupo Posters ideal for both indoor and outdoor use.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">If Yupo isn\'t your preference, our Paper Posters offer a great low-cost option for durable, high-quality posters designed for indoor use.</font></div>', NULL, '', NULL, NULL, '40.00', NULL, 7, NULL, 'posters-printing', 'Posters-Printing', 'Posters-Printing', 'Posters-Printing', 'active', 'Posters-Printing', 0, 0, NULL, NULL, 'Blue', 10, '<p><font color=\"#000000\">• High-resolution full-color digital print</font></p><p><font color=\"#000000\">• Choice of either 200gsm Paper material or 200gsm (250um) Yupo FPU material</font></p><p><font color=\"#000000\">• Yupo material is waterproof and UV and tear-resistant</font></p><p><font color=\"#000000\">• Super smooth and bright white with a satin finish, making your graphics pop!</font></p><p><font color=\"#000000\">• Printed on HP Latex printers, no lamination needed</font></p><p><font color=\"#000000\">• Minimum size: 250mm x 250mm</font></p><p><font color=\"#000000\">• Maximum size: 3000mm x 1550mm</font></p><p><font color=\"#000000\">• If you need a smaller Paper Poster than A3 sizing, visit our Flyer page and order a 200gsm Matte Paper poster instead, and enjoy the savings!</font></p>', 'Q1. What material are the posters printed on?~Q2. What is Yupo FPU material?~Q3. Are the Posters FSC Certified?~Q4. Why do the Posters not need to be laminated?~Q5. What if I need a smaller Paper Poster?~Q6. Can the Yupo posters be used in scrolling applications?~Q7. How are the Posters packed for delivery?~Q8. How long will my Poster order take to produce?~Q9. I have multiple designs, are there extra setup fees?~Q10. I have more than one designs, will I be charged extra?~Q11. Do you offer shipping as well?~Q12. I have multiple designs, are there extra setup fees?', '<p>The Yupo Posters are printed on an ultra-smooth 200gsm new generation synthetic polypropylene material, which is weather and tear-resistant. The Paper Posters are printed on an ultra-smooth 200gsm paper material. Both materials have a bright white color and a satin finish, highlighting the printed graphics. We print the posters on the latest technology HP Latex printers for excellent print quality.</p>~<p><font color=\"#000000\">Yupo FPU is a 100% recyclable new generation synthetic paper extruded from polypropylene pellets. It offers excellent tear resistance, chemical resistance, and UV resistance. Yupo FPU is super smooth with a bright white color, allowing digitally printed colors to stand out on the posters.</font></p>~<p><font color=\"#000000\">The 200gsm Poster Paper is FSC Certified. The Yupo Material, being synthetic, is not FSC Certified.</font></p>~<p><font color=\"#000000\">Both the Paper and Yupo FPU materials are 200gsm with excellent stiffness and anti-curl properties. They also have very high ink adhesion properties and exceptional scratch resistance when printed on our HP Latex printers, eliminating the need for lamination.</font><br></p>~<p><font color=\"#000000\">If you need a smaller Paper Poster than A3 sizing, visit our Flyer page and order a 200gsm Matte Paper poster instead. If you still desire a waterproof poster with a robust finish, the Yupo Posters are not available on the Flyer page.</font><br></p>~<p><font color=\"#000000\">No, the Yupo posters are only suitable for static uses and are not suitable for scrolling applications.</font><br></p>~<p><font color=\"#000000\">The Posters are rolled and packed in a strong cardboard tube to ensure safety during transit.</font><br></p>~<p><font color=\"#000000\">We can produce your order in as little as 24 hours after artwork proof sign-off. The production time varies based on the order value.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the setup cost for one design only. If you have multiple designs for the same size, there will be a small multiple artwork charge applied for each additional design to cover extra setup costs.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:54:30', '2024-04-18 08:03:02'),
(120, 'Stickers', '75', '<p><font color=\"#000000\">About Our Custom Stickers</font></p><p><font color=\"#000000\">Are you looking for stickers that reflect the professionalism of your organization? Our custom printed vinyl stickers are the perfect choice, offering versatility for a wide range of applications and available in any size or shape. Printed on the latest HP Latex printers in high resolution full color, they are provided either die-cut (individually cut) or kiss-cut on sheets. All our stickers are waterproof and suitable for both indoor and outdoor use.</font></p><p><font color=\"#000000\">If you need a square or rectangle sticker larger than 200mm x 200mm and want to save some money, check out our Large Format Stickers (SAV) web page.</font></p>', '<p><br></p>', '94', NULL, NULL, '1.00', NULL, 7, NULL, 'stickers', 'Stickers', 'Stickers', 'Stickers', 'active', 'Stickers', 0, 0, NULL, NULL, 'Blue', 10, '<div><font color=\"#000000\">• Material Options: Economy, Premium, Cast, Bubble Free, and High Tack stickers are available to suit almost any application.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• High-Resolution Printing: Utilizing the latest HP Latex printers, we ensure crisp, vibrant prints. Note: Black ink only is printed on Yellow Reflective materials.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Custom Shapes: Choose \"Custom Contour\" in the cutting dropdown for unique shapes.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Flexible Presentation: Stickers can be supplied die-cut (individually cut) or kiss-cut on sheets.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Size Range: Minimum size of 35mm x 35mm.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Weatherproof: Our stickers are waterproof and UV resistant, ensuring durability in various conditions.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Fast Production Times: Enjoy super-fast production times to meet your urgent needs.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">• Material Options: Our stickers are available in various materials, each with specific adhesive types and suggested applications. You can select appropriate lamination options using our pricing calculator. If ordering Reflective Stickers, ensure they meet any business and government regulations/restrictions before placing your order.</font></div>', 'Q1. How long will it take to produce my Custom Sticker order?~Q2. Can stickers be contour cut to shape?~Q3. How large can my sticker be in one piece?~Q4. Is a quantity of 1 just 1 sticker only or 1 sheet of stickers?~Q5. What material should I choose for my custom sticker?~Q6. What type of vinyl should I use for Bumper Stickers?~Q7. What does the lamination do?~Q8. What standards do our Reflective Sticker materials meet?~Q9. Do the Reflective Stickers have Tool Lines?~Q10. How accurate will the size of my sticker be?~Q11. I have multiple designs, are there extra setup fees?~Q12. I have more than one designs, will I be charged extra?~Q13. Do you offer shipping as well?~Q14. I have multiple designs, are there extra setup fees?', '<p class=\"MsoNormal\"><font color=\"#000000\">We aim to complete your order swiftly, with production times as follows:</font></p><p class=\"MsoNormal\"><font color=\"#000000\">• Orders under $1101 inc GST: 24 hours (1 working day) after artwork proof sign off</font></p><p class=\"MsoNormal\"><font color=\"#000000\">• Orders under $2751 inc GST: 48 hours (2 working days) after artwork proof sign off</font></p><p class=\"MsoNormal\"><font color=\"#000000\">• Orders under $4401 inc GST: 3 working days after artwork proof sign off and receipt of 30% deposit if over $3300 inc GST</font></p><p class=\"MsoNormal\"><font color=\"#000000\">• Orders under $8801 inc GST: 4 working days after artwork proof sign off and receipt of 30% deposit</font></p><p class=\"MsoNormal\"></p>~<font color=\"#000000\">Absolutely! We can cut stickers to custom shapes. Just specify the maximum height and width in the instant pricing calculator and select “Custom Contour” in the Cutting dropdown.</font>~<p><font color=\"#000000\">For most materials, stickers can be printed up to 1300mm x 3000mm long in one piece. Reflective Vinyls have a maximum size of 1190mm wide x 3000mm long.</font><br></p>~<p><font color=\"#000000\">A quantity of 1 is just 1 sticker only, not a sheet of stickers if ordered kiss cut.</font><br></p>~<p><font color=\"#000000\">Select the material based on your specific needs:</font></p><p><font color=\"#000000\">Economy: Short-term use on flat surfaces, ideal for budget-friendly options.</font></p><p><font color=\"#000000\">Premium: Medium-term applications on flat surfaces, available in various finishes.</font></p><p><font color=\"#000000\">High Tack: Hard-to-stick surfaces like caravans or garbage bins.</font></p><p><font color=\"#000000\">Bubble Free: Smooth application without bubbles.</font></p><p><font color=\"#000000\">Cast Vinyl: Long-term or curved surface applications.</font></p>~<p><font color=\"#000000\">For bumper stickers, we recommend using Gloss White premium (3 years) vinyl without lamination.</font><br></p>~<p><font color=\"#000000\">Lamination provides protection from abrasion, chemicals, and UV rays. It\'s recommended for stickers prone to mechanical damage or for vehicle signage.</font><br></p>~<p><font color=\"#000000\">Engineer Grade materials comply with ATSM D 4956 standards. Premium Prismatic materials meet AS/NZS 1960.1 standards when laminated with our Reflective laminate.</font></p>~<p><font color=\"#000000\">Engineer Grade materials have no tool lines. Premium Prismatic materials have small tool lines inherent to the material, usually no more than 1mm thick.</font><br></p>~<p><font color=\"#000000\">Due to the nature of vinyl material and printing process, the final sticker size can vary up to 1% larger from what is ordered.</font><br></p>~<p><font color=\"#000000\">Yes, there\'s a small multiple artwork charge for each additional design. Enter the total number of designs into the pricing calculator for an accurate price.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you.</font><br></p>~<p><font color=\"#000000\">Yes, our price includes the set up cost for 1 design only. If you have multiple designs for the same size you will still get the lower bulk price, however there is a small multiple artwork charge applied for each additional design to cover our extra set up costs. Simply enter the total number of signs required and then the total number of designs into the pricing calculator above - and it will work out an accurate price for you.</font><br></p>', '2024-03-22 11:55:16', '2024-04-18 08:52:57'),
(123, 'Everyday Pull Up Banner', '343', 'Everyday Pull Up Banner', NULL, '16,18', NULL, NULL, '35', NULL, 4, 1, 'everyday-pull-up-banner', 'Everyday Pull Up Banner', 'Everyday Pull Up Banner', 'Everyday Pull Up Banner', 'active', 'Everyday Pull Up Banner', 0, 0, NULL, NULL, 'Silver', 10, '<p>Everyday Pull Up Banner<br></p>', '<p>test</p>', '<p>test<br></p>', '2024-04-17 05:10:39', '2024-05-03 10:56:51'),
(127, 'A3 Pull Up Banner', '34324324324', '<p>A3 Pull Up Banner&nbsp;<br></p>', NULL, '', NULL, NULL, '99', NULL, 4, 2, 'a3-pull-up-banner', 'A3 Pull Up Banner', 'A3 Pull Up Banner', 'A3 Pull Up Banner', 'active', 'A3 Pull Up Banner', 0, 0, NULL, NULL, 'Blue', 10, '<p>A3 Pull Up Banner&nbsp;<br></p>', '<p>A3 Pull Up Banner&nbsp;<br></p>', '<p>A3 Pull Up Banner&nbsp;<br></p>', '2024-04-19 11:15:10', '2024-04-19 11:15:10'),
(132, 'A4 Pull Up Banner', '5213', '<p><span lang=\"EN-AU\" style=\"font-size:11.0pt;line-height:\r\n107%;font-family:&quot;Aptos&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:Aptos;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:Arial;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-AU;mso-fareast-language:EN-US;mso-bidi-language:AR-SA;\r\nmso-no-proof:yes\">A4 Pull Up Banner&nbsp;</span><br></p>', NULL, '', NULL, NULL, '99', NULL, 4, 2, 'a4-pull-up-banner', 'A4 Pull Up Banner', 'A4 Pull Up Banner', 'A4 Pull Up Banner', 'active', 'A4 Pull Up Banner', 0, 0, NULL, NULL, 'Blue', 10, '<p><span lang=\"EN-AU\" style=\"font-size:11.0pt;line-height:\r\n107%;font-family:&quot;Aptos&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:Aptos;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:Arial;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-AU;mso-fareast-language:EN-US;mso-bidi-language:AR-SA;\r\nmso-no-proof:yes\">A4 Pull Up Banner&nbsp;</span><br></p>', '<p><span lang=\"EN-AU\" style=\"font-size:11.0pt;line-height:\r\n107%;font-family:&quot;Aptos&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:Aptos;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:Arial;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-AU;mso-fareast-language:EN-US;mso-bidi-language:AR-SA;\r\nmso-no-proof:yes\">A4 Pull Up Banner&nbsp;</span><br></p>', '<p><span lang=\"EN-AU\" style=\"font-size:11.0pt;line-height:\r\n107%;font-family:&quot;Aptos&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:Aptos;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:Arial;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-AU;mso-fareast-language:EN-US;mso-bidi-language:AR-SA;\r\nmso-no-proof:yes\">A4 Pull Up Banner&nbsp;</span><br></p>', '2024-04-19 11:36:31', '2024-04-19 11:36:31'),
(133, 'Construction Signs', '2323', '<p>Construction Signs<br></p>', NULL, '', NULL, NULL, '40', NULL, 5, NULL, 'construction-signs', 'Construction Signs', 'Construction Signs', 'Construction Signs', 'active', 'Construction Signs', 0, 0, NULL, NULL, 'Not Available', 8, '<p>Construction Signs<br></p>', '<p>Construction Signs<br></p>', '<p>Construction Signs<br></p>', '2024-04-19 11:50:08', '2024-05-07 06:05:30'),
(137, 'Custom Size & Shape', '34233', '<p>Custom Size &amp; Shape<br></p>', NULL, '', NULL, NULL, '50', NULL, 5, NULL, 'custom-size-shape', 'Custom Size & Shape', 'Custom Size & Shape', 'Custom Size & Shape', 'active', 'Custom Size & Shape', 0, 0, NULL, NULL, 'Blue', 10, '<p>Custom Size &amp; Shape<br></p>', '<p>Custom Size &amp; Shape<br></p>', '<p>Custom Size &amp; Shape<br></p>', '2024-04-19 11:56:40', '2024-05-07 04:44:19'),
(140, 'Vinyl Banners', '5332', '<div><font color=\"#000000\">Our Vinyl Banners offer a hassle-free solution for promoting your events and sales. We provide both common and custom-sized single-sided vinyl banners, printed in vivid full color to capture attention effectively. You can choose from various finishing options such as grommets, ropes, or pole pockets for easy hanging.</font></div><div><font color=\"#000000\"><br></font></div><div><font color=\"#000000\">Banners can be used indoors and outdoors and are great weatherproof way to advertise your business in different sizes.</font></div>', NULL, '16,18,123,127,132', NULL, NULL, '35', NULL, 4, NULL, 'vinyl-banners', 'Vinyl Banners', 'Vinyl Banners', 'Vinyl Banners', 'active', 'Vinyl Banners', 0, 0, NULL, NULL, NULL, 0, '<p><font color=\"#000000\">• Our Vinyl Banners boast ultra high resolution , full-color digital latex printing, ensuring your designs pop with&nbsp; clarity. Crafted from durable 440 gsm vinyl banner material, these banners are built to withstand various environmental conditions while maintaining their visual appeal.</font></p><p><font color=\"#000000\">• Please note that our banners are designed for single-sided printing only, Maximum banner height: 2100mm (2050mm with rod pockets on top and bottom)</font></p><p><font color=\"#000000\">Maximum banner width: Unlimited but split into max 10,000mm widths</font></p><p><font color=\"#000000\">All other banner requirements are considered as custom order and will need to be communicated to us via request a quote or Contact us form.</font></p><p><font color=\"#000000\">• Choose from a variety of finishing methods, including ropes and grommets, hemmed edges and grommets, or rod pockets, to suit your hanging preferences.</font></p>', 'Q1. What material are outdoor vinyl banners printed on and are they durable?~Q2. How can I clean my vinyl Banner?~Q3. Can you do double side vinyl banners?~Q4. How should I store or transport my vinyl banners so that they last long ?~Q5. When can I get my banner ready?~Q6. I have more than one designs, will I be charged extra?~Q7. I have a special finishing request and size request for my banner , can you still make it ?~Q8. Do you offer shipping as well?', '<p><font color=\"#000000\">Printed on 440 gsm Vinyl , Our banners are quite thick yet flexible. When used indoors they are quite long lasting . The amount of UV exposure that vinyl receives outside will determine how quickly it deteriorates. Typically our vinyl banners have lasted atleast 12 months of outdoor use.</font><br></p>~<p><font color=\"#000000\">The Outdoor Vinyl Banners are simply cleaned by using water and a light detergent to remove dust and debris. The print may be harmed by strong cleansers and detergents. As a result, we advise against using them. Steer clear of harsh cleaning agents. Instead, wipe the banners clean with a gentle cloth to remove any dust or debris. Using a moist cloth, carefully wipe down the banners with water.</font><br></p>~<p><font color=\"#000000\">At the moment we only print single sided vinyl banners which leaves back side of vinyl banners blank.</font><br></p>~<p><font color=\"#000000\">Vinyl banners should not be folded, you should always roll them when you are looking to transport or store them, this will make sure they have less wrinkles. In case if they do get wrinkles, wrinkles usually go away by placing them in sunlight for some time.</font><br></p>~<p><font color=\"#000000\">Our production times are dependent on current run of jobs at our production unit and the quantities ordered. Once we receive the deposit in case your total order is more than $250 + Gst or full payment when your order is $250+Gst and below, our team will confirm the artwork for printing and receipt of order in upto 2 hours (when order is placed between 10am -5pm AEST) of receiving the deposit /payment into our bank account. We then advise you of by when we will have your order ready for pick up. If you would like us to make your order ready by a certain date please feel free to request that to us.</font><br></p>~<p><font color=\"#000000\">Yes, the setup fees for a single design are included in our pricing. There is a tiny multiple artwork charge charged for each additional design to cover our additional set up costs, but you will still receive the lower bulk price if you have numerous designs for the same size. We can let you know after you place your order if there are going to be any extra artwork set up fees.</font><br></p>~<p><font color=\"#000000\">Yes absolutely, we can print different sizes of vinyl banners with different finishes. We can do extra lamination on the banners if required or make banners with sailtreck.Please feel free to contact us via request a quote or contact us tab and one of our friendly staff can help you .</font><br></p>~<p><font color=\"#000000\">At the moment we only offer pickup from our warehouse in Kings Park , NSW. We cn however arrange shipping for you , if you contact our staff we can also discuss available shipping options for your order and pass on the shipping costs to you .</font><br></p>', '2024-05-07 10:03:44', '2024-05-07 19:37:05'),
(141, 'Mesh Banners', '47432', '<p>Mesh Banners<br></p>', NULL, '140,16,18,123', NULL, NULL, '130', NULL, 4, NULL, 'mesh-banners', 'Mesh Banners', 'Mesh Banners', 'Mesh Banners', 'active', 'Mesh Banners', 0, 0, NULL, NULL, NULL, 10, '<p>Mesh Banners<br></p>', '', '', '2024-05-07 10:21:39', '2024-05-07 10:21:39'),
(142, 'Test Product', '14785', '<p>Test Product</p>', NULL, '16', NULL, '142-65-1715081239.png', '70', 10.00, 4, NULL, 'test-product', 'Test Product', 'Test Product', 'Test Product', 'active', 'Test Product', 1, 0, NULL, NULL, NULL, 0, '<p>Test Product<br></p>', '<p>Test Product<br></p>~<p>Test Product<br></p>', '<p>Test Product<br></p>~<p>Test Product<br></p>', '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(143, 'Test Product 1', '12589', '<p>Test Product 1<br></p>', NULL, '142', NULL, '143-66-1715132833.png', '35', 1.00, 11, NULL, 'test-product-1', 'Test Product 1', 'Test Product 1', 'Test Product 1', 'active', 'Test Product 1', 1, 0, NULL, NULL, NULL, 10, '<p>Test Product 1<br></p>', 'test&nbsp;', '<p>test product</p>', '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(144, 'Test Product 2', '468468', '<p>Test Product 2<br></p>', '<p>test</p>', '', NULL, NULL, '35', NULL, 11, NULL, 'test-product-2', 'Test Product 2', 'Test Product 2', 'Test Product 2', 'active', 'Test Product 2', 1, 0, NULL, NULL, NULL, 100, '<p>Test Product 2<br></p>', '<p>tets</p>', '<p>test</p>', '2024-05-08 01:59:00', '2024-05-08 03:23:04'),
(145, 'Testtttttt', '6546584', '<p>test</p>', NULL, '', NULL, NULL, '45', 12.00, 4, 1, 'testtttttt', 'jkhv', 'hv', 'kj', 'active', 'kjhvb', 1, 0, NULL, NULL, NULL, 1, '<p>test</p>', '<p>test</p>', '<p>test</p>', '2024-05-23 01:48:45', '2024-05-23 01:48:45'),
(146, 'kubkjb kjb', '1864718641864718647', '<p>test</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'kubkjb-kjb', 'test', 'test', 'test', 'active', 'test', 1, 0, NULL, NULL, NULL, 1, '<p>testq</p>', '<p>ijhv</p>', '<p>kjhv</p>', '2024-05-23 01:50:01', '2024-05-23 01:50:01'),
(147, 'kubkjb kjbasfsaf', '1864718641864', '<p>test</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'kubkjb-kjbasfsaf', 'test', 'test', 'test', 'active', 'test', 1, 0, NULL, NULL, NULL, 1, '<p>testq</p>', '<p>ijhv</p>', '<p>kjhv</p>', '2024-05-23 01:51:52', '2024-05-23 01:51:52'),
(148, 'kubkjbas', '186471864186', '<p>test</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'kubkjbas', 'test', 'test', 'test', 'active', 'test', 1, 0, NULL, NULL, NULL, 1, '<p>testq</p>', '<p>ijhv</p>', '<p>kjhv</p>', '2024-05-23 01:53:40', '2024-05-23 01:53:40'),
(149, 'kubkjbasdfdsaf', '1861864186', '<p>test</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'kubkjbasdfdsaf', 'test', 'test', 'test', 'active', 'test', 1, 0, NULL, NULL, NULL, 1, '<p>testq</p>', '<p>ijhv</p>', '<p>kjhv</p>', '2024-05-23 01:55:48', '2024-05-23 01:55:48');
INSERT INTO `product` (`id`, `product_name`, `product_sku`, `product_description`, `product_short_description`, `related_products`, `product_rating_review`, `product_image`, `product_price`, `product_discounted_price`, `category_id`, `subcategory_id`, `product_slug`, `product_meta_title`, `product_meta_keyword`, `product_meta_desp`, `product_status`, `product_tag`, `product_feature`, `product_is_selected`, `product_date`, `product_comment`, `product_color`, `product_quantity`, `product_key_feature`, `product_question`, `product_answer`, `created_at`, `updated_at`) VALUES
(150, 'kubkjbasdfdsaffff', '18664186', '<p>test</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'kubkjbasdfdsaffff', 'test', 'test', 'test', 'active', 'test', 1, 0, NULL, NULL, NULL, 1, '<p>testq</p>', '<p>ijhv</p>', '<p>kjhv</p>', '2024-05-23 01:57:05', '2024-05-23 01:57:05'),
(152, 'kubkjbasdfdsaffdddd', '1866418668458', '<p>test</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'kubkjbasdfdsaffdddd', 'test', 'test', 'test', 'active', 'test', 1, 0, NULL, NULL, NULL, 1, '<p>testq</p>', '<p>ijhv</p>', '<p>kjhv</p>', '2024-05-23 02:00:29', '2024-05-23 02:00:29'),
(153, 'sadgdsafg', '7478855', '<p>asdg</p>', NULL, '', NULL, NULL, '7', 7.00, 4, 1, 'sadgdsafg', 'jhv', 'jhv', 'jhv', 'active', 'jhv', 0, 0, NULL, NULL, NULL, 7, '<p>sadfg</p>', '<p>test</p>', '<p>test</p>', '2024-05-23 04:12:16', '2024-05-23 04:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_type` varchar(255) NOT NULL,
  `attribute_value` varchar(255) DEFAULT NULL,
  `attribute_persqm` int(11) DEFAULT NULL,
  `attribute_price` decimal(10,2) DEFAULT NULL,
  `attribute_quantity` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_type`, `attribute_value`, `attribute_persqm`, `attribute_price`, `attribute_quantity`, `status`, `created_at`, `updated_at`) VALUES
(6, 138, 'color', 'black', NULL, 10.00, NULL, 1, '2024-05-02 07:35:54', '2024-05-02 07:35:54'),
(9, 16, 'color', 'balck', NULL, 5.00, NULL, 1, '2024-05-07 08:37:12', '2024-05-07 08:37:12'),
(10, 16, 'print_side', 'Single Side', NULL, 20.00, NULL, 1, '2024-05-07 08:37:12', '2024-05-07 08:37:12'),
(44, 141, 'print_side', 'Single Sided', NULL, 110.00, NULL, 1, '2024-05-07 10:21:39', '2024-05-07 10:21:39'),
(45, 141, 'finishing', 'Welded Edges and Eyelets', NULL, 130.00, NULL, 1, '2024-05-07 10:21:39', '2024-05-07 10:21:39'),
(46, 142, 'color', 'black', NULL, 5.00, NULL, 1, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(47, 142, 'print_side', 'ouikghkb', NULL, 5.00, NULL, 1, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(61, 140, 'print_side', 'Single Sided', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(62, 140, 'finishing', 'Hemmed Edges and Eyelets', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(63, 140, 'finishing', 'Hemmed Edges Ropes and Eyelets', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(64, 140, 'finishing', 'Pocket Rods only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(65, 140, 'finishing', 'Hemmed Edges only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(66, 140, 'finishing', 'Trimmed Only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(67, 140, 'finishing', 'Eyelets Only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(68, 140, 'installation', 'Hemmed Edges and Eyelets', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(69, 140, 'installation', 'Hemmed Edges Ropes and Eyelets', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(70, 140, 'installation', 'Pocket Rods only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(71, 140, 'installation', 'Hemmed Edges only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(72, 140, 'installation', 'Trimmed Only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(73, 140, 'installation', 'Eyelets Only', NULL, 0.00, NULL, 1, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(75, 144, 'print_side', 'Single Side', NULL, 50.00, NULL, 1, '2024-05-08 02:02:37', '2024-05-08 02:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_faqs`
--

CREATE TABLE `product_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 3, '3-1-1711056362.png', NULL, '2024-03-21 21:26:02', '2024-03-21 21:26:02'),
(2, 4, '4-2-1711087831.jpg', NULL, '2024-03-22 06:10:31', '2024-03-22 06:10:31'),
(3, 6, '6-3-1711101919.png', NULL, '2024-03-22 10:05:19', '2024-03-22 10:05:19'),
(9, 89, '89-9-1711107171.png', NULL, '2024-03-22 11:32:51', '2024-03-22 11:32:51'),
(10, 90, '90-10-1711107233.png', NULL, '2024-03-22 11:33:53', '2024-03-22 11:33:53'),
(11, 91, '91-11-1711107309.png', NULL, '2024-03-22 11:35:09', '2024-03-22 11:35:09'),
(12, 93, '93-12-1711107381.png', NULL, '2024-03-22 11:36:21', '2024-03-22 11:36:21'),
(13, 94, '94-13-1711107421.png', NULL, '2024-03-22 11:37:01', '2024-03-22 11:37:01'),
(14, 95, '95-14-1711107463.png', NULL, '2024-03-22 11:37:43', '2024-03-22 11:37:43'),
(15, 96, '96-15-1711107514.png', NULL, '2024-03-22 11:38:34', '2024-03-22 11:38:34'),
(16, 97, '97-16-1711107554.png', NULL, '2024-03-22 11:39:14', '2024-03-22 11:39:14'),
(17, 98, '98-17-1711107609.png', NULL, '2024-03-22 11:40:09', '2024-03-22 11:40:09'),
(18, 99, '99-18-1711107649.png', NULL, '2024-03-22 11:40:49', '2024-03-22 11:40:49'),
(19, 101, '101-19-1711107713.png', NULL, '2024-03-22 11:41:53', '2024-03-22 11:41:53'),
(20, 102, '102-20-1711107760.png', NULL, '2024-03-22 11:42:40', '2024-03-22 11:42:40'),
(21, 103, '103-21-1711107805.png', NULL, '2024-03-22 11:43:25', '2024-03-22 11:43:25'),
(22, 104, '104-22-1711107850.png', NULL, '2024-03-22 11:44:10', '2024-03-22 11:44:10'),
(27, 109, '109-27-1711108074.png', NULL, '2024-03-22 11:47:54', '2024-03-22 11:47:54'),
(28, 110, '110-28-1711108117.png', NULL, '2024-03-22 11:48:37', '2024-03-22 11:48:37'),
(29, 111, '111-29-1711108157.png', NULL, '2024-03-22 11:49:17', '2024-03-22 11:49:17'),
(30, 112, '112-30-1711108200.png', NULL, '2024-03-22 11:50:00', '2024-03-22 11:50:00'),
(31, 113, '113-31-1711108232.png', NULL, '2024-03-22 11:50:32', '2024-03-22 11:50:32'),
(32, 114, '114-32-1711108268.png', NULL, '2024-03-22 11:51:08', '2024-03-22 11:51:08'),
(33, 115, '115-33-1711108318.png', NULL, '2024-03-22 11:51:58', '2024-03-22 11:51:58'),
(34, 116, '116-34-1711108356.png', NULL, '2024-03-22 11:52:36', '2024-03-22 11:52:36'),
(35, 119, '119-35-1711108470.png', NULL, '2024-03-22 11:54:30', '2024-03-22 11:54:30'),
(36, 120, '120-36-1711108516.png', NULL, '2024-03-22 11:55:16', '2024-03-22 11:55:16'),
(44, 19, '19-44-1711971702.jpg', NULL, '2024-04-01 11:41:42', '2024-04-01 11:41:42'),
(49, 105, '105-49-1711973843.jpg', NULL, '2024-04-01 12:17:23', '2024-04-01 12:17:23'),
(50, 105, '105-50-1711973843.jpg', NULL, '2024-04-01 12:17:23', '2024-04-01 12:17:23'),
(51, 106, '106-51-1711973898.jpg', NULL, '2024-04-01 12:18:18', '2024-04-01 12:18:18'),
(52, 107, '107-52-1711973929.jpg', NULL, '2024-04-01 12:18:49', '2024-04-01 12:18:49'),
(53, 108, '108-53-1711973959.jpg', NULL, '2024-04-01 12:19:19', '2024-04-01 12:19:19'),
(59, 16, '16-59-1714635978.png', NULL, '2024-05-02 07:46:18', '2024-05-02 07:46:18'),
(62, 123, '123-62-1714733771.png', NULL, '2024-05-03 10:56:11', '2024-05-03 10:56:11'),
(63, 18, '18-63-1714734222.png', NULL, '2024-05-03 11:03:42', '2024-05-03 11:03:42'),
(64, 140, '140-64-1715076224.png', NULL, '2024-05-07 10:03:44', '2024-05-07 10:03:44'),
(65, 142, '142-65-1715081239.png', NULL, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(66, 143, '143-66-1715132833.png', NULL, '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(67, 144, '144-67-1715133540.png', NULL, '2024-05-08 01:59:00', '2024-05-08 01:59:00'),
(68, 153, '153-68-1716457336.png', NULL, '2024-05-23 04:12:16', '2024-05-23 04:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_width` varchar(255) NOT NULL,
  `product_height` varchar(255) NOT NULL,
  `product_persqm` decimal(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_persqm_qty` int(11) NOT NULL,
  `product_price_per_sq_meter_trim` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `product_id`, `product_width`, `product_height`, `product_persqm`, `product_quantity`, `product_persqm_qty`, `product_price_per_sq_meter_trim`, `created_at`, `updated_at`) VALUES
(11, 138, '2000', '1000', 2.00, 1, 2, 35.00, '2024-05-02 07:35:54', '2024-05-02 07:35:54'),
(12, 138, '2000', '1000', 2.00, 2, 4, 35.00, '2024-05-02 07:35:54', '2024-05-02 07:35:54'),
(13, 139, '1000', '2000', 2.00, 2, 4, 35.00, '2024-05-02 11:52:53', '2024-05-02 11:52:53'),
(14, 139, '2000', '3000', 6.00, 2, 12, -40.00, '2024-05-02 11:52:53', '2024-05-02 11:52:53'),
(16, 18, '2000', '3000', 6.00, 2, 12, -40.00, '2024-05-02 11:52:53', '2024-05-02 11:52:53'),
(18, 137, '2000', '3000', 6.00, 2, 12, 40.00, '2024-05-07 07:36:21', '2024-05-07 07:36:21'),
(27, 16, '2000', '3000', 6.00, 1, 6, 144.00, '2024-05-07 08:37:12', '2024-05-07 08:37:12'),
(28, 16, '2000', '3000', 6.00, 2, 12, 144.00, '2024-05-07 08:37:12', '2024-05-07 08:37:12'),
(29, 16, '2000', '3000', 6.00, 3, 18, 144.00, '2024-05-07 08:37:12', '2024-05-07 08:37:12'),
(30, 16, '1000', '2000', 2.00, 1, 2, 144.00, '2024-05-07 08:37:12', '2024-05-07 08:37:12'),
(40, 141, '2400', '1530', 3.67, 10, 37, 120.00, '2024-05-07 10:21:39', '2024-05-07 10:21:39'),
(41, 142, '2000', '1000', 2.00, 1, 2, 35.00, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(42, 142, '2000', '1000', 2.00, 2, 4, 35.00, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(43, 142, '2000', '1000', 2.00, 3, 6, 34.00, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(44, 142, '2000', '1000', 2.00, 4, 8, 35.00, '2024-05-07 11:27:19', '2024-05-07 11:27:19'),
(48, 140, '2000', '1000', 2.00, 1, 2, 35.00, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(49, 140, '2000', '1000', 2.00, 2, 4, 35.00, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(50, 140, '2000', '1000', 2.00, 3, 6, 35.00, '2024-05-07 19:37:05', '2024-05-07 19:37:05'),
(51, 143, '2000', '1000', 2.00, 1, 2, 35.00, '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(52, 143, '2000', '1000', 2.00, 2, 4, 35.00, '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(53, 143, '2000', '1000', 2.00, 3, 6, 35.00, '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(54, 143, '3000', '1000', 3.00, 1, 3, 32.00, '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(55, 143, '3000', '1000', 3.00, 2, 6, 32.00, '2024-05-08 01:47:13', '2024-05-08 01:47:13'),
(59, 144, '900', '1800', 1.62, 1, 2, 60.00, '2024-05-08 02:02:37', '2024-05-08 02:02:37'),
(61, 152, '900', '1800', 1.62, 1, 2, 10.00, '2024-05-23 02:27:51', '2024-05-23 02:27:51'),
(72, 153, '1000', '2000', 2.00, 1, 2, 30.00, '2024-05-23 04:54:03', '2024-05-23 04:54:03'),
(73, 153, '1000', '2000', 2.00, 2, 4, 28.00, '2024-05-23 04:54:03', '2024-05-23 04:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` double(3,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `product_id`, `username`, `email`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(2, 16, 'Vishal Kumar', '8077vishal@gmail.com', 'test', 5.00, 0, '2024-04-14 19:38:14', '2024-04-14 19:38:14'),
(3, 16, 'gdhjdgh', 'sushobhan@thetemz.com', 'chj', 5.00, 0, '2024-04-16 11:52:29', '2024-04-16 11:52:29'),
(4, 16, 'sdfghdfsg', 'admin@example.com', 'sdfghdfsgh', 1.00, 0, '2024-04-16 11:53:03', '2024-04-16 11:53:03'),
(5, 18, 'sdfghdsg', 'deepak@thetemz.com', 'sdfghdfsg', 1.00, 0, '2024-04-16 11:53:40', '2024-04-16 11:53:40'),
(6, 125, 'vishal', 'vishal@gmail.com', 'test', 4.00, 0, '2024-04-18 09:45:08', '2024-04-18 09:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_sub_name` varchar(255) NOT NULL,
  `cat_sub_slug` varchar(255) NOT NULL,
  `cat_sub_description` text DEFAULT NULL,
  `cat_sub_image` varchar(255) DEFAULT NULL,
  `cat_sub_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cat_sub_orderby` int(11) NOT NULL DEFAULT 0,
  `is_selected` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_sub_name`, `cat_sub_slug`, `cat_sub_description`, `cat_sub_image`, `cat_sub_status`, `cat_sub_orderby`, `is_selected`, `meta_title`, `meta_desc`, `meta_keyword`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Pull Up Banners', 'pull-up-banners', 'Pull Up Banners', '1.png', 'active', 1, 1, 'Pull Up Banners', 'Pull Up Banners', 'Pull Up Banners', 4, '2024-04-18 21:04:19', '2024-04-18 21:04:19'),
(2, 'Table Top  Banners', 'table-top-banners', 'Table Top  Banners', '2.png', 'active', 1, 1, 'Table Top  Banners', 'Table Top  Banners', 'Table Top  Banners', 4, '2024-04-18 21:05:03', '2024-04-18 21:05:03'),
(6, 'Test Sub Category', 'test-sub-category', 'Test Sub Category', '6.png', 'active', 1, 1, 'Test Sub Category', 'Test Sub Category', 'Test Sub Category', 11, '2024-05-08 01:40:34', '2024-05-08 01:40:34'),
(7, 'Sub Category 1', 'sub-category-1', 'Sub Category 1', '7.png', 'active', 1, 1, 'Sub Category 1', 'Sub Category 1', 'Sub Category 1', 11, '2024-05-08 01:41:39', '2024-05-08 01:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_images`
--

INSERT INTO `temp_images` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1710395460.jpg', '2024-03-14 00:21:00', '2024-03-14 00:21:00'),
(2, '1710398127.png', '2024-03-14 01:05:27', '2024-03-14 01:05:27'),
(3, '1710436228.png', '2024-03-14 17:10:28', '2024-03-14 17:10:28'),
(4, '1710436507.png', '2024-03-14 17:15:07', '2024-03-14 17:15:07'),
(5, '1710436658.png', '2024-03-14 17:17:38', '2024-03-14 17:17:38'),
(6, '1710586801.png', '2024-03-16 11:00:01', '2024-03-16 11:00:01'),
(7, '1710586851.png', '2024-03-16 11:00:51', '2024-03-16 11:00:51'),
(8, '1710590598.png', '2024-03-16 12:03:18', '2024-03-16 12:03:18'),
(9, '1710757980.jpg', '2024-03-18 10:33:00', '2024-03-18 10:33:00'),
(10, '1710758284.png', '2024-03-18 10:38:04', '2024-03-18 10:38:04'),
(11, '1710758390.png', '2024-03-18 10:39:50', '2024-03-18 10:39:50'),
(12, '1711056048.png', '2024-03-21 21:20:48', '2024-03-21 21:20:48'),
(13, '1711087701.jpg', '2024-03-22 06:08:21', '2024-03-22 06:08:21'),
(14, '1711098325.jpg', '2024-03-22 09:05:25', '2024-03-22 09:05:25'),
(15, '1711098713.jpg', '2024-03-22 09:11:53', '2024-03-22 09:11:53'),
(16, '1711098768.jpg', '2024-03-22 09:12:48', '2024-03-22 09:12:48'),
(17, '1711101237.png', '2024-03-22 09:53:57', '2024-03-22 09:53:57'),
(18, '1711101283.png', '2024-03-22 09:54:43', '2024-03-22 09:54:43'),
(19, '1711101325.png', '2024-03-22 09:55:25', '2024-03-22 09:55:25'),
(20, '1711101888.png', '2024-03-22 10:04:48', '2024-03-22 10:04:48'),
(21, '1711105978.png', '2024-03-22 11:12:58', '2024-03-22 11:12:58'),
(22, '1711106092.png', '2024-03-22 11:14:52', '2024-03-22 11:14:52'),
(23, '1711106284.png', '2024-03-22 11:18:04', '2024-03-22 11:18:04'),
(24, '1711106338.png', '2024-03-22 11:18:58', '2024-03-22 11:18:58'),
(25, '1711106401.png', '2024-03-22 11:20:01', '2024-03-22 11:20:01'),
(26, '1711106462.png', '2024-03-22 11:21:02', '2024-03-22 11:21:02'),
(27, '1711106477.png', '2024-03-22 11:21:17', '2024-03-22 11:21:17'),
(28, '1711106541.png', '2024-03-22 11:22:21', '2024-03-22 11:22:21'),
(29, '1711106669.png', '2024-03-22 11:24:29', '2024-03-22 11:24:29'),
(30, '1711106772.png', '2024-03-22 11:26:12', '2024-03-22 11:26:12'),
(31, '1711106865.png', '2024-03-22 11:27:45', '2024-03-22 11:27:45'),
(32, '1711106968.png', '2024-03-22 11:29:28', '2024-03-22 11:29:28'),
(33, '1711107142.png', '2024-03-22 11:32:22', '2024-03-22 11:32:22'),
(34, '1711107229.png', '2024-03-22 11:33:49', '2024-03-22 11:33:49'),
(35, '1711107275.png', '2024-03-22 11:34:35', '2024-03-22 11:34:35'),
(36, '1711107338.png', '2024-03-22 11:35:38', '2024-03-22 11:35:38'),
(37, '1711107410.png', '2024-03-22 11:36:50', '2024-03-22 11:36:50'),
(38, '1711107446.png', '2024-03-22 11:37:26', '2024-03-22 11:37:26'),
(39, '1711107489.png', '2024-03-22 11:38:09', '2024-03-22 11:38:09'),
(40, '1711107548.png', '2024-03-22 11:39:08', '2024-03-22 11:39:08'),
(41, '1711107590.png', '2024-03-22 11:39:50', '2024-03-22 11:39:50'),
(42, '1711107634.png', '2024-03-22 11:40:34', '2024-03-22 11:40:34'),
(43, '1711107674.png', '2024-03-22 11:41:14', '2024-03-22 11:41:14'),
(44, '1711107739.png', '2024-03-22 11:42:19', '2024-03-22 11:42:19'),
(45, '1711107797.png', '2024-03-22 11:43:17', '2024-03-22 11:43:17'),
(46, '1711107829.png', '2024-03-22 11:43:49', '2024-03-22 11:43:49'),
(47, '1711107879.png', '2024-03-22 11:44:39', '2024-03-22 11:44:39'),
(48, '1711107921.png', '2024-03-22 11:45:21', '2024-03-22 11:45:21'),
(49, '1711107968.png', '2024-03-22 11:46:08', '2024-03-22 11:46:08'),
(50, '1711108010.png', '2024-03-22 11:46:50', '2024-03-22 11:46:50'),
(51, '1711108060.png', '2024-03-22 11:47:40', '2024-03-22 11:47:40'),
(52, '1711108102.png', '2024-03-22 11:48:22', '2024-03-22 11:48:22'),
(53, '1711108134.png', '2024-03-22 11:48:54', '2024-03-22 11:48:54'),
(54, '1711108188.png', '2024-03-22 11:49:48', '2024-03-22 11:49:48'),
(55, '1711108223.png', '2024-03-22 11:50:23', '2024-03-22 11:50:23'),
(56, '1711108256.png', '2024-03-22 11:50:56', '2024-03-22 11:50:56'),
(57, '1711108295.png', '2024-03-22 11:51:35', '2024-03-22 11:51:35'),
(58, '1711108349.png', '2024-03-22 11:52:29', '2024-03-22 11:52:29'),
(59, '1711108380.png', '2024-03-22 11:53:00', '2024-03-22 11:53:00'),
(60, '1711108447.png', '2024-03-22 11:54:07', '2024-03-22 11:54:07'),
(61, '1711108499.png', '2024-03-22 11:54:59', '2024-03-22 11:54:59'),
(62, '1711789702.png', '2024-03-30 09:08:22', '2024-03-30 09:08:22'),
(63, '1712045297.jpg', '2024-04-02 08:08:17', '2024-04-02 08:08:17'),
(64, '1712218034.png', '2024-04-04 08:07:14', '2024-04-04 08:07:14'),
(65, '1712218048.png', '2024-04-04 08:07:28', '2024-04-04 08:07:28'),
(66, '1712218077.png', '2024-04-04 08:07:57', '2024-04-04 08:07:57'),
(67, '1712218413.png', '2024-04-04 08:13:33', '2024-04-04 08:13:33'),
(68, '1712218437.png', '2024-04-04 08:13:57', '2024-04-04 08:13:57'),
(69, '1712218465.png', '2024-04-04 08:14:25', '2024-04-04 08:14:25'),
(70, '1712218485.png', '2024-04-04 08:14:45', '2024-04-04 08:14:45'),
(71, '1712558588.jpg', '2024-04-08 06:43:08', '2024-04-08 06:43:08'),
(72, '1713330534.jpg', '2024-04-17 05:08:54', '2024-04-17 05:08:54'),
(73, '1713433045.jpg', '2024-04-18 09:37:25', '2024-04-18 09:37:25'),
(74, '1713433138.png', '2024-04-18 09:38:58', '2024-04-18 09:38:58'),
(75, '1713433146.png', '2024-04-18 09:39:06', '2024-04-18 09:39:06'),
(76, '1713474252.png', '2024-04-18 21:04:12', '2024-04-18 21:04:12'),
(77, '1713474290.png', '2024-04-18 21:04:50', '2024-04-18 21:04:50'),
(78, '1713474356.png', '2024-04-18 21:05:56', '2024-04-18 21:05:56'),
(79, '1713474389.png', '2024-04-18 21:06:29', '2024-04-18 21:06:29'),
(80, '1713510379.png', '2024-04-19 07:06:19', '2024-04-19 07:06:19'),
(81, '1714509724.png', '2024-04-30 20:42:04', '2024-04-30 20:42:04'),
(82, '1714649387.png', '2024-05-02 11:29:47', '2024-05-02 11:29:47'),
(83, '1715076219.png', '2024-05-07 10:03:39', '2024-05-07 10:03:39'),
(84, '1715081111.png', '2024-05-07 11:25:11', '2024-05-07 11:25:11'),
(85, '1715132045.png', '2024-05-08 01:34:05', '2024-05-08 01:34:05'),
(86, '1715132427.png', '2024-05-08 01:40:27', '2024-05-08 01:40:27'),
(87, '1715132493.png', '2024-05-08 01:41:33', '2024-05-08 01:41:33'),
(88, '1715132621.png', '2024-05-08 01:43:41', '2024-05-08 01:43:41'),
(89, '1715133113.png', '2024-05-08 01:51:53', '2024-05-08 01:51:53'),
(90, '1715135900.png', '2024-05-08 02:38:20', '2024-05-08 02:38:20'),
(91, '1716457240.png', '2024-05-23 04:10:40', '2024-05-23 04:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `user_id`, `filename`, `path`, `created_at`, `updated_at`) VALUES
(9, 5, '5_1715121019_certificate (2).pdf', '/uploads/files/5_1715121019_certificate (2).pdf', '2024-05-07 22:30:19', '2024-05-07 22:30:19'),
(10, 5, '5_1715121193_certificate (2).pdf', '/uploads/files/5_1715121193_certificate (2).pdf', '2024-05-07 22:33:13', '2024-05-07 22:33:13'),
(11, 5, '5_1715121204_certificate (2).pdf', '/uploads/files/5_1715121204_certificate (2).pdf', '2024-05-07 22:33:24', '2024-05-07 22:33:24'),
(12, 5, '5_1715134717_certificate (2).pdf', '/uploads/files/5_1715134717_certificate (2).pdf', '2024-05-08 02:18:37', '2024-05-08 02:18:37'),
(13, 1, '1_1715164339_98-985556_black-gradient-png-black-to-transparent-png.png', '/uploads/files/1_1715164339_98-985556_black-gradient-png-black-to-transparent-png.png', '2024-05-08 05:02:19', '2024-05-08 05:02:19'),
(14, 1, '1_1715164480_1.pdf', '/uploads/files/1_1715164480_1.pdf', '2024-05-08 05:04:40', '2024-05-08 05:04:40'),
(15, 1, '1_1715164621_Raizing LMS (3).pdf', '/uploads/files/1_1715164621_Raizing LMS (3).pdf', '2024-05-08 05:07:01', '2024-05-08 05:07:01'),
(16, 1, '1_1715164676_archived.php', '/uploads/files/1_1715164676_archived.php', '2024-05-08 05:07:56', '2024-05-08 05:07:56'),
(17, 1, '1_1715164769_2024_02_25_200546_create_temp_images_table.php', '/uploads/files/1_1715164769_2024_02_25_200546_create_temp_images_table.php', '2024-05-08 05:09:29', '2024-05-08 05:09:29'),
(18, 1, '1_1715164860_5_1715121193_certificate (2).pdf', '/uploads/files/1_1715164860_5_1715121193_certificate (2).pdf', '2024-05-08 05:11:00', '2024-05-08 05:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 2, NULL, '$2y$12$wqF8ey62kF.RUv3M1bf.o.RBqGh03RKd7T0l7ufJhIaPAK1/JW70K', NULL, '2024-03-13 02:26:34', '2024-03-13 02:26:34'),
(2, 'sushobhan', 'rockerzsushi@gmail.com', '08920005414', 1, NULL, '$2y$12$ZyNj4/ZhXMXPHGhqKZvsDe5UtZYtRHLNINBihhrQ3Eej8lS29wESa', NULL, '2024-04-01 11:41:51', '2024-04-01 11:41:51'),
(3, 'vishal kumar', 'vishal@gmail.com', '08077477633', 1, NULL, '$2y$12$UzPlao7.ZNTTl2zoIavsPewACdLTaAS5FaPfBoBtDcHhukTcTfVEG', NULL, '2024-04-01 11:46:50', '2024-04-01 11:46:50'),
(4, 'Deepak Prasad', 'deepak@thetemz.com', '1234567890', 1, NULL, '$2y$12$j0TR.h/S6X1PBfuSrEKri.jGjHPHvUW/TyRmSt1KYyYqvGyXnpw56', NULL, '2024-04-02 05:12:20', '2024-04-02 05:12:20'),
(5, 'sachin kumar', 'sachin@gmail.com', '7896547897', 1, NULL, '$2y$12$UWf8bs3.SVJ19UVwXb6KceHtuEnqQ0HZWfLx3yOwtSezcITBR4tDS', NULL, '2024-04-13 01:34:29', '2024-04-13 01:34:29'),
(6, 'Test', 'test@gmail.com', '8888888888', 1, NULL, '$2y$12$MowhUpBwo3QfRPuKLgvDDOVF18DSiLnhXU/41MlaPOd5zQa5jf/jS', NULL, '2024-04-18 06:25:06', '2024-04-18 06:25:06'),
(7, 'Asim', 'asim@thetemz.com', '8888888888', 1, NULL, '$2y$12$locPNNjsnmuGu.0j5CwHt.i0qPeGZatiXF4Z4Ek25SfzF85FXTFqW', NULL, '2024-05-06 06:06:27', '2024-05-06 06:06:58'),
(8, 'vishal', 'vishal@thetemz.com', '77777888884', 1, NULL, '$2y$12$2pWv2grJcP1oqWUnkU6zNOYXu4Fms84A7HUl9IQ2FBAvI24aNdCkq', NULL, '2024-05-08 02:17:14', '2024-05-08 02:17:14'),
(9, 'Vishal Kumar', '8077vishal@gmail.com', '08077477522', 1, NULL, '$2y$12$rUtKYMCzKvLGK3stSh.LxeXRpjyh5uFsLK4NqtSb3x74Ym.2VB2uG', NULL, '2024-05-08 02:23:02', '2024-05-08 02:23:02'),
(10, 'vishaltemz', 'vishaltemz@gmail.com', '08077477633', 1, NULL, '$2y$12$AuLdhDsMuEc/tgw2UpAE5ObyDihXxiiOlmyj5M6wtHSpgYMgEFvyS', NULL, '2024-05-08 06:57:03', '2024-05-08 06:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 18, '2024-04-16 21:22:35', '2024-04-16 21:22:35'),
(2, 3, 90, '2024-04-16 21:23:00', '2024-04-16 21:23:00'),
(3, 3, 19, '2024-04-16 21:29:26', '2024-04-16 21:29:26'),
(4, 3, 16, '2024-04-16 21:29:33', '2024-04-16 21:29:33'),
(5, 6, 16, '2024-04-18 06:28:11', '2024-04-18 06:28:11'),
(6, 6, 125, '2024-04-18 09:58:14', '2024-04-18 09:58:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homesection`
--
ALTER TABLE `homesection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homesliders`
--
ALTER TABLE `homesliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_product_sku_unique` (`product_sku`),
  ADD UNIQUE KEY `product_product_slug_unique` (`product_slug`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_faqs`
--
ALTER TABLE `product_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_cat_sub_slug_unique` (`cat_sub_slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploaded_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homesection`
--
ALTER TABLE `homesection`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homesliders`
--
ALTER TABLE `homesliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_ranges`
--
ALTER TABLE `price_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_faqs`
--
ALTER TABLE `product_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD CONSTRAINT `uploaded_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
