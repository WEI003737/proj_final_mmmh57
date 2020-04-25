-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `proj_final`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `sid` int(11) NOT NULL,
  `parent_sid` int(11) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `en_parent` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `size_chart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`sid`, `parent_sid`, `parent`, `en_parent`, `name`, `en_name`, `size_chart`) VALUES
(1, 1, '運動內衣', 'sports bras', '襯墊式', 'padded bra', ''),
(2, 1, '', 'sports bras', '無襯墊式', 'soft cup bra', ''),
(3, 2, '上衣', 'tops', '短袖上衣', 'tees', ''),
(4, 2, '', 'tops', '無袖背心', 'tanks', ''),
(5, 2, '', 'tops', '長袖上衣', 'longsleeves', ''),
(6, 2, '', 'tops', '運動棉衫', 'sweatshirts', ''),
(7, 2, '', 'tops', '外套罩衫', 'outerwear', ''),
(8, 3, '下身', 'bottoms', '緊身褲', 'leggings', ''),
(9, 3, '', 'bottoms', '運動褲', 'sweatpants', ''),
(10, 3, '', 'bottoms', '短褲', 'shorts', ''),
(11, 3, '', 'bottoms', '五分褲', 'biker shorts', ''),
(12, 3, '', 'bottoms', '七八分褲', 'capris', ''),
(13, 3, '', 'bottoms', '長褲', 'pants', ''),
(17, 4, '運動配件', 'accessories', '瑜珈', 'yoga', '');

-- --------------------------------------------------------

--
-- 資料表結構 `color`
--

CREATE TABLE `color` (
  `sid` int(11) NOT NULL,
  `pro_sid` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `pro_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `color`
--

INSERT INTO `color` (`sid`, `pro_sid`, `color`, `pro_pic`) VALUES
(1, 1, 'black', '[\"paddedbra_000_bk_1\",\"paddedbra_000_bk_2\", \"paddedbra_000_bk_3\", \"paddedbra_000_bk_4\", \"paddedbra_000_bk_5\"]'),
(2, 1, 'pink', '[\"paddedbra_000_pk_1\",\"paddedbra_000_pk_2\", \"paddedbra_000_pk_3\",\"paddedbra_000_pk_4\", \"paddedbra_000_pk_5\"]'),
(3, 2, 'gray', '[\"paddedbra_001_gr_1\",\"paddedbra_001_gr_2\", \"paddedbra_001_gr_3\",\"paddedbra_001_gr_4\", \"paddedbra_001_gr_5\"]'),
(4, 2, 'pink', '[\"paddedbra_001_pk_1\", \"paddedbra_001_pk_2\", \"paddedbra_001_pk_3\", \"paddedbra_001_pk_4\", \"paddedbra_001_pk_5\"]'),
(5, 3, 'black', '[\"paddedbra_002_bk_1\",\"paddedbra_002_bk_2\", \"paddedbra_002_bk_3\", \"paddedbra_002_bk_4\", \"paddedbra_002_bk_5\"]'),
(6, 3, 'white', '[\"paddedbra_002_w_1\",\"paddedbra_002_w_2\", \"paddedbra_002_w_3\", \"paddedbra_002_w_4\", \"paddedbra_002_w_5\"]'),
(7, 3, 'brown', '[\"paddedbra_002_br_1\",\"paddedbra_002_br_2\", \"paddedbra_002_br_3\",\"paddedbra_002_br_4\", \"paddedbra_002_br_5\"]'),
(8, 4, 'black', '[\"paddedbra_003_bk_1\", \"paddedbra_003_bk_2\", \"paddedbra_003_bk_3\",\"paddedbra_003_bk_4\", \"paddedbra_003_bk_5\"]'),
(9, 5, 'pink', '[\"paddedbra_004_pk_1\",\"paddedbra_004_pk_2\", \"paddedbra_004_pk_3\",\"paddedbra_004_pk_4\", \"paddedbra_004_pk_5\"]'),
(10, 5, 'yellow', '[\"paddedbra_004_y_1\",\"paddedbra_004_y_2\", \"paddedbra_004_y_3\",\"paddedbra_004_y_4\", \"paddedbra_004_y_5\"]'),
(11, 6, 'white', '[\"paddedbra_005_w_1\",\"paddedbra_005_w_2\",\"paddedbra_005_w_3\", \"paddedbra_005_w_4\", \"paddedbra_005_w_5\"]'),
(12, 7, 'blue', '[\"paddedbra_006_bl_1\",\"paddedbra_006_bl_2\", \"paddedbra_006_bl_3\",\"paddedbra_006_bl_4\", \"paddedbra_006_bl_5\"]'),
(13, 8, 'white', '[\"paddedbra_007_w_1\",\"paddedbra_007_w_2\", \"paddedbra_007_w_3\",\"paddedbra_007_w_4\", \"paddedbra_007_w_5\"]'),
(14, 9, 'black', '[\"paddedbra_008_bk_1\",\"paddedbra_008_bk_2\", \"paddedbra_008_bk_3\",\"paddedbra_008_bk_4\", \"paddedbra_008_bk_5\"]'),
(15, 10, 'black', '[\"paddedbra_009_bk_1\",\"paddedbra_009_bk_2\", \"paddedbra_009_bk_3\",\"paddedbra_009_bk_4\", \"paddedbra_009_bk_5\"]'),
(16, 11, 'black', '[\"softcupbra_000_bk_1\",\"softcupbra_000_bk_2\", \"softcupbra_000_bk_3\", \"softcupbra_000_bk_4\", \"softcupbra_000_bk_5\"]'),
(17, 12, 'black', '[\"softcupbra_001_bk_1\",\"softcupbra_001_bk_2\", \"softcupbra_001_bk_3\",\"softcupbra_001_bk_4\", \"softcupbra_001_bk_5\"]'),
(18, 12, 'white', '[\"softcupbra_001_w_1\",\"softcupbra_001_w_2\", \"softcupbra_001_w_3\",\"softcupbra_001_w_4\", \"softcupbra_001_w_5\"]'),
(19, 13, 'red', '[\"softcupbra_002_r_1\",\"softcupbra_002_r_2\", \"softcupbra_002_r_3\",\"softcupbra_002_r_4\", \"softcupbra_002_r_5\"]'),
(20, 14, 'black', '[\"softcupbra_003_bk_1\",\"softcupbra_003_bk_2\", \"softcupbra_003_bk_3\",\"softcupbra_003_bk_4\", \"softcupbra_003_bk_5\"]'),
(21, 14, 'blue', '[\"softcupbra_003_bl_1\",\"softcupbra_003_bl_2\", \"softcupbra_003_bl_3\",\"softcupbra_003_bl_4\", \"softcupbra_003_bl_5\"]'),
(22, 14, 'red', '[\"softcupbra_003_r_1\",\"softcupbra_003_r_2\", \"softcupbra_003_r_3\",\"softcupbra_003_r_4\", \"softcupbra_003_r_5\"]'),
(23, 15, 'black', '[\"softcupbra_004_bk_1\",\"softcupbra_004_bk_2\", \"softcupbra_004_bk_3\",\"softcupbra_004_bk_4\", \"softcupbra_004_bk_5\"]');

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `sid` int(11) NOT NULL,
  `mem_sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `is_use` tinyint(1) NOT NULL,
  `expire_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`sid`, `mem_sid`, `name`, `description`, `discount`, `is_use`, `expire_date`) VALUES
(1, 0, '會員註冊禮卷', '購物即可折抵100元', '100', 0, '0000-00-00 00:00:00'),
(2, 0, '珍愛母親節禮卷', '滿1000 可折抵100元', '100', 0, '0000-00-00 00:00:00'),
(3, 0, '首次消費滿500元禮金', '滿1000 可折抵100元', '100', 0, '0000-00-00 00:00:00'),
(4, 0, '首次消費滿1500元禮金', '滿1000 可折抵100元', '100', 0, '0000-00-00 00:00:00'),
(5, 0, '消費滿2000元禮金', '滿1500 可折抵150元', '150', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `customize`
--

CREATE TABLE `customize` (
  `sid` int(11) NOT NULL,
  `cate_sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `take_care` varchar(255) NOT NULL,
  `can_cus_color` varchar(255) NOT NULL,
  `pro_pic` varchar(255) NOT NULL,
  `cus_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `like_box`
--

CREATE TABLE `like_box` (
  `sid` int(11) NOT NULL,
  `mem_sid` int(11) NOT NULL,
  `pro_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `sid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `receiver_mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `sid` int(11) NOT NULL,
  `mem_sid` int(11) NOT NULL,
  `order_num` varchar(255) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `receiver_mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `order_details`
--

CREATE TABLE `order_details` (
  `sid` int(11) NOT NULL,
  `order_sid` int(11) NOT NULL,
  `pro_sid` int(11) NOT NULL,
  `color_sid` int(11) NOT NULL,
  `size_sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `gty` varchar(255) NOT NULL,
  `is_cus` tinyint(1) NOT NULL,
  `cus_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `sid` int(11) NOT NULL,
  `cate_sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `take_care` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`sid`, `cate_sid`, `name`, `price`, `intro`, `material`, `take_care`, `created_date`) VALUES
(1, 1, 'TRACKIE 運動內衣', '790', '美背交叉設計凸顯妳的優雅氣息，搭配腰間的撞色邊條設計，簡約中不失設計感，適合氣質又充滿女人味的妳！', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(2, 1, 'Alosoft 運動內衣', '790', '女人味十足的細肩帶設計搭配側邊綁帶及一字美背設計，簡約具有造型感，讓妳不論是去運動還是外出活動，舉手投足都充滿時尚魅力！', '尼龍79%、彈性纖維21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(3, 1, 'Inistinct 馬甲式運動內衣', '770', '精緻的細肩帶搭配V領領圍，有效修飾臉型。簡單卻又不失優雅氣質，不論搭配任何下身都時尚亮眼！', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(4, 1, 'Breathe 撞色運動內衣', '990', '精緻的細肩帶搭配V領領圍，有效修飾臉型。簡單卻又不失優雅氣質，不論搭配任何下身都時尚亮眼！', '尼龍79%、彈性纖維21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(5, 1, 'Erin 細肩帶運動內衣', '540', '美背交叉設計凸顯妳的優雅氣息，搭配腰間的撞色邊條設計，簡約中不失設計感，適合氣質又充滿女人味的妳！', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(6, 1, 'Marne 馬甲式運動內衣', '790', '精緻的細肩帶搭配V領領圍，有效修飾臉型。簡單卻又不失優雅氣質，不論搭配任何下身都時尚亮眼！', '尼龍79%、彈性纖維21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(7, 1, 'Pring 細肩帶運動內衣', '690', '女人味十足的細肩帶設計搭配側邊綁帶及一字美背設計，簡約具有造型感，讓妳不論是去運動還是外出活動，舉手投足都充滿時尚魅力！', '尼龍79%、彈性纖維21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(8, 1, 'Sunrise 運動內衣', '680', '美背交叉設計凸顯妳的優雅氣息，搭配腰間的撞色邊條設計，簡約中不失設計感，適合氣質又充滿女人味的妳！', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(9, 1, 'Asymmetrical 造型運動內衣', '840', '女人味十足的細肩帶設計搭配側邊綁帶及一字美背設計，簡約具有造型感，讓妳不論是去運動還是外出活動，舉手投足都充滿時尚魅力！', '尼龍79%、彈性纖維21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(10, 1, 'Surplice 運動內衣', '680', '美背交叉設計凸顯妳的優雅氣息，搭配腰間的撞色邊條設計，簡約中不失設計感，適合氣質又充滿女人味的妳！', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(11, 2, 'NADI 運動內衣', '680', '採用機能性面料，搭配雙色撞色設計提升整體活潑感。不論運動單穿或結合日常穿搭都合適，讓你從健身房到街頭都是全場焦點！', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(12, 2, 'Disco 運動內衣', '780', '胸前獨特的雙層剪裁，搭配透氣度絕佳的透膚網紗，魅力又有型！寬版下圍更提升支撐力，最適合熱愛運動又時尚的妳！ ', '聚醯胺纖維 74%、彈性纖維 26% ', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(13, 2, 'Cait 漸層運動內衣', '730', '完美展現時尚與機能的運動內衣，採用高彈性性布料，舒適透氣。提高穩定度的同時展現時尚魅力，讓你動靜皆宜，展現迷人風采。 ', '聚酯纖維 50%、尼龍 29%、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(14, 2, 'Veronica V領美背運動內衣', '880', '背部內裡以彈性網紗布作為內襯，提升整體支撐力。採用啞光高彈性的機能布料，搭配美背鏤空設計，打造出低調奢華運動時尚風。', '聚醯胺纖維 74%、彈性纖維 26% 、彈性纖維 21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11'),
(15, 2, 'Love 運動內衣', '620', '採用機能性面料，搭配雙色撞色設計提升整體活潑感。不論運動單穿或結合日常穿搭都合適，讓你從健身房到街頭都是全場焦點！', '尼龍79%、彈性纖維21%', '使用中性洗滌劑，勿使用柔軟精', '2020-04-23 13:33:11');

-- --------------------------------------------------------

--
-- 資料表結構 `products_intro`
--

CREATE TABLE `products_intro` (
  `sid` int(11) NOT NULL,
  `cate_sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `en_material` varchar(255) NOT NULL,
  `hash_tag` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pro_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `size`
--

CREATE TABLE `size` (
  `sid` int(11) NOT NULL,
  `pro_sid` int(11) NOT NULL,
  `color_sid` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `in_stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `size`
--

INSERT INTO `size` (`sid`, `pro_sid`, `color_sid`, `size`, `in_stock`) VALUES
(1, 1, 1, 'XS', '10'),
(2, 1, 1, 'S', '8'),
(3, 1, 1, 'M', '4'),
(4, 1, 1, 'L', '6'),
(5, 1, 2, 'XS', '4'),
(6, 1, 2, 'S', '8'),
(7, 1, 2, 'M', '4'),
(8, 1, 2, 'L', '6'),
(9, 2, 3, 'XS', '1'),
(10, 2, 3, 'S', '8'),
(11, 2, 3, 'M', '4'),
(12, 2, 3, 'L', '6'),
(13, 2, 4, 'XS', '10'),
(14, 2, 4, 'S', '8'),
(15, 2, 4, 'M', '4'),
(16, 2, 4, 'L', '6'),
(17, 3, 5, 'XS', '9'),
(18, 3, 5, 'S', '8'),
(19, 3, 5, 'M', '4'),
(20, 3, 5, 'L', '6'),
(21, 3, 6, 'XS', '4'),
(22, 3, 6, 'S', '8'),
(23, 3, 6, 'M', '4'),
(24, 3, 6, 'L', '6'),
(25, 3, 7, 'XS', '7'),
(26, 3, 7, 'S', '8'),
(27, 3, 7, 'M', '4'),
(28, 3, 7, 'L', '6'),
(29, 4, 8, 'XS', '10'),
(30, 4, 8, 'S', '8'),
(31, 4, 8, 'M', '4'),
(32, 4, 8, 'L', '6'),
(33, 5, 9, 'XS', '10'),
(34, 5, 9, 'S', '8'),
(35, 5, 9, 'M', '4'),
(36, 5, 9, 'L', '1'),
(37, 5, 10, 'XS', '7'),
(38, 5, 10, 'S', '8'),
(39, 5, 10, 'M', '1'),
(40, 5, 10, 'L', '5'),
(41, 6, 11, 'XS', '9'),
(42, 6, 11, 'S', '8'),
(43, 6, 11, 'M', '4'),
(44, 6, 11, 'L', '3'),
(45, 7, 12, 'XS', '3'),
(46, 7, 12, 'S', '8'),
(47, 7, 12, 'M', '4'),
(48, 7, 12, 'L', '6'),
(49, 8, 13, 'XS', '4'),
(50, 8, 13, 'S', '2'),
(51, 8, 13, 'M', '4'),
(52, 8, 13, 'L', '6'),
(53, 9, 14, 'XS', '10'),
(54, 9, 14, 'S', '4'),
(55, 9, 14, 'M', '4'),
(56, 9, 14, 'L', '0'),
(57, 10, 15, 'XS', '1'),
(58, 10, 15, 'S', '2'),
(59, 10, 15, 'M', '4'),
(60, 10, 15, 'L', '6'),
(61, 11, 16, 'XS', '4'),
(62, 11, 16, 'S', '8'),
(63, 11, 16, 'M', '4'),
(64, 11, 16, 'L', '6'),
(65, 12, 17, 'XS', '4'),
(66, 12, 17, 'S', '8'),
(67, 12, 17, 'M', '0'),
(68, 12, 17, 'L', '6'),
(69, 12, 18, 'XS', '0'),
(70, 12, 18, 'S', '8'),
(71, 12, 18, 'M', '3'),
(72, 12, 18, 'L', '6'),
(73, 13, 19, 'XS', '3'),
(74, 13, 19, 'S', '8'),
(75, 13, 19, 'M', '4'),
(76, 13, 19, 'L', '9'),
(77, 14, 20, 'XS', '10'),
(78, 14, 20, 'S', '3'),
(79, 14, 20, 'M', '4'),
(80, 14, 20, 'L', '6'),
(81, 14, 21, 'XS', '10'),
(82, 14, 21, 'S', '8'),
(83, 14, 21, 'M', '9'),
(84, 14, 21, 'L', '6'),
(85, 14, 22, 'XS', '10'),
(86, 14, 22, 'S', '0'),
(87, 14, 22, 'M', '4'),
(88, 14, 22, 'L', '6'),
(89, 15, 22, 'XS', '9'),
(90, 15, 23, 'S', '8'),
(91, 15, 23, 'M', '4'),
(92, 15, 23, 'L', '8');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `customize`
--
ALTER TABLE `customize`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `like_box`
--
ALTER TABLE `like_box`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `products_intro`
--
ALTER TABLE `products_intro`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories`
--
ALTER TABLE `categories`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `color`
--
ALTER TABLE `color`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customize`
--
ALTER TABLE `customize`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `like_box`
--
ALTER TABLE `like_box`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_details`
--
ALTER TABLE `order_details`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products_intro`
--
ALTER TABLE `products_intro`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `size`
--
ALTER TABLE `size`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
