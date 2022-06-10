-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-10 16:11:39
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shopping_mall`
--

-- --------------------------------------------------------

--
-- 資料表結構 `buyer_record`
--

CREATE TABLE `buyer_record` (
  `Buyer_ID` varchar(20) NOT NULL,
  `Buyer_Name` varchar(20) NOT NULL,
  `Buyer_Phone` varchar(10) NOT NULL,
  `Buyer_Address` varchar(50) NOT NULL,
  `Buy_Day` datetime NOT NULL,
  `Cus_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `chatbot_hints`
--

CREATE TABLE `chatbot_hints` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `chatbot_hints`
--

INSERT INTO `chatbot_hints` (`id`, `question`, `reply`) VALUES
(1, 'HI||Hello||Hola', 'Hello, how are you.'),
(2, 'How are you', 'Good to see you again!'),
(3, 'what is your name||whats your name', 'My name is Vishal Bot'),
(4, 'what should I call you', 'You can call me Vishal Bot'),
(5, 'Where are your from', 'I m from India'),
(6, 'Bye||See you later||Have a Good Day', 'Sad to see you are going. Have a nice day'),
(9, '中文', '英文'),
(13, '棒', '你好棒棒'),
(14, '喔', '好喔'),
(15, '購物車', '車車車車車');

-- --------------------------------------------------------

--
-- 資料表結構 `cus_shopping_cart`
--

CREATE TABLE `cus_shopping_cart` (
  `Goods_ID` varchar(20) NOT NULL,
  `Goods_Name` varchar(20) NOT NULL,
  `Goods_Price` bigint(20) NOT NULL,
  `Goods_Num` int(11) NOT NULL,
  `Goods_URL` text NOT NULL,
  `Buyer_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `Goods_ID` varchar(20) NOT NULL,
  `Goods_Name` varchar(20) NOT NULL,
  `Goods_Price` bigint(20) NOT NULL,
  `Goods_Num` int(11) NOT NULL,
  `Goods_URL` text NOT NULL,
  `Goods_specification` longtext NOT NULL,
  `Goods_Statement` longtext NOT NULL,
  `Goods_Classify` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `login_customer`
--

CREATE TABLE `login_customer` (
  `Cus_ID` varchar(20) NOT NULL,
  `Cus_Account` varchar(20) NOT NULL,
  `Cus_Password` varchar(20) NOT NULL,
  `Cus_Email` varchar(50) NOT NULL,
  `Cus_Money` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `login_manager`
--

CREATE TABLE `login_manager` (
  `Manager_ID` varchar(20) NOT NULL,
  `Manager_Account` varchar(20) NOT NULL,
  `Manager_Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `added_on` datetime NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `buyer_record`
--
ALTER TABLE `buyer_record`
  ADD PRIMARY KEY (`Buyer_ID`),
  ADD KEY `Cus_ID` (`Cus_ID`);

--
-- 資料表索引 `cus_shopping_cart`
--
ALTER TABLE `cus_shopping_cart`
  ADD PRIMARY KEY (`Goods_ID`),
  ADD KEY `Buyer_ID` (`Buyer_ID`);

--
-- 資料表索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`Goods_ID`);

--
-- 資料表索引 `login_customer`
--
ALTER TABLE `login_customer`
  ADD PRIMARY KEY (`Cus_ID`);

--
-- 資料表索引 `login_manager`
--
ALTER TABLE `login_manager`
  ADD PRIMARY KEY (`Manager_ID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `buyer_record`
--
ALTER TABLE `buyer_record`
  ADD CONSTRAINT `buyer_record_ibfk_1` FOREIGN KEY (`Cus_ID`) REFERENCES `login_customer` (`Cus_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `cus_shopping_cart`
--
ALTER TABLE `cus_shopping_cart`
  ADD CONSTRAINT `cus_shopping_cart_ibfk_1` FOREIGN KEY (`Buyer_ID`) REFERENCES `buyer_record` (`Buyer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
