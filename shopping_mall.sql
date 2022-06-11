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
  `Goods_Name` text NOT NULL,
  `Goods_Price` bigint(20) NOT NULL,
  `Goods_Num` int(11) NOT NULL,
  `Goods_URL` text NOT NULL,
  `Goods_Statement` longtext NOT NULL,
  `Goods_Classify` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `chatbot_hints`
--
INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`, `Goods_Statement`, `Goods_Classify`) VALUES
(1, 'ASUS 華碩 Dual GeForce RTX 3060 V2 OC 12GB GDDR6 顯示卡', 13990, 
    5, 'https://cs-d.ecimg.tw/items/DRAD1NA900CANHO/000001_1654588212.jpg', 
    '◆ 搭載強大軸向式雙風扇，2-slot 設計達到廣泛的裝機相容性。
    ◆ NVIDIA Ampere 串流多處理器：全新的 Ampere 串流多處理器是世界上最快、最高效的 顯示卡架構，可提升2倍FP32輸送量，帶來優異效能。
    ◆ 第二代 RT 核心：體驗比第一代 RT 核心兩倍的輸送量，再加上支援RT和著色計算，可將光線追蹤提升到全新水平。
    ◆ 第三代 Tensor 核心：結構性稀疏和先進人工智慧演算法（例如DLSS）使輸送量提升到2倍。該核心極大提升遊戲效能和全新的 AI 人工智慧功能。
    ◆ 超頻版: Boost clock 1867 MHz (超頻模式)/ 1837 MHz (遊戲模式)
    ◆ 軸向式風扇具備較小的風扇輪轂以使用更長的葉片，阻隔環則可提高向下風壓。
    ◆ 2-slot 設計賦予小型機殼，強大的相容性與優越的散熱表現。
    ◆ 0dB 技術讓您在相對安靜的環境下享受遊戲。
    ◆ 不鏽鋼 I/O 擋板更堅固耐用、抗腐蝕
    ◆ 保固：原廠三年保固
    延長 登錄四年保固到府收送', 'GPU'),
(2, 'PNY GeForce RTX 3080 LHR 10G XLR8 顯示卡', 23999,
    5, 'https://cs-d.ecimg.tw/items/DRADJ4A900F17LO/000001_1654483524.jpg',
    '◆ 顯示晶片 ：NVIDIA GeForce RTX 3080
    ◆ 記憶體 ：10GB GDDR6X
    ◆ CUDA數 ：8704
    ◆ 記憶體時脈：1440MHz
    ◆ 記憶體介面：320-bit
    ◆ 輸出端子 ：3x DP / 1x HDMI
    ◆ 體積(長x寬x高)：317 x 115.1 x 59.9 mm', 'GPU'),
(3, '微星 GeForce RTX 3080 SUPRIM X 10G LHR 顯示卡', 27900, 
    5, 'https://cs-c.ecimg.tw/items/DRAD1RA900F46LG/000001_1654853790.jpg', 
    '◆ 顯示晶片 ：NVIDIA® GeForce® RTX 3080
    ◆ 記憶體 ：10GB GDDR6X
    ◆ Cores ：8704 Units
    ◆ 記憶體介面：320-bit
    ◆ 輸出端子 ：3x DP / HDMI
    ◆ 電源連結器：8-pin x3
    ◆ 體積(長x寬x高)：336 x 140 x 61mm
    ◆ 保固：原廠3年保，註冊後可延長至5年', 'GPU'),
(4, 'ASUS 華碩 TUF Gaming GeForce RTX 3060 V2 OC 12G 顯示卡', 15090,
    5, 'https://cs-e.ecimg.tw/items/DRAD1NA900CANHC/000001_1653876714.jpg',
    '◆ ASUS TUF Gaming GeForce RTX™ 3060 V2 OC 超頻版 12GB GDDR6 強化設計並具備頂尖的散熱效能。
    ◆ NVIDIA Ampere 串流多處理器：全新的 Ampere 串流多處理器是世界上最快、最高效的 顯示卡架構，可提升2倍FP32輸送量，帶來優異效能。
    ◆ 第二代 RT 核心：體驗比第一代 RT 核心兩倍的輸送量，再加上支援RT和著色計算，可將光線追蹤提升到全新水平。
    ◆ 第三代 Tensor 核心：結構性稀疏和先進人工智慧演算法（例如DLSS）使輸送量提升到2倍。該核心極大提升遊戲效能和全新的 AI 人工智慧功能。
    ◆ OC 超頻版: Boost clock 1882 MHz (超頻模式)/ 1852 MHz (遊戲模式)
    ◆ 軸向式風扇已進行調整，反向旋轉的中央風扇，可增加風壓快速散熱。
    ◆ 雙滾珠軸承設計 風扇使用壽命為傳統油封軸承的兩倍。
    ◆ 全鋁製護蓋與金屬強化背板 更加耐用。
    ◆ GPU Tweak II提供簡單易用的效能調校、散熱控制及系統監控功能。
    ◆ 保固：原廠三年保固', 'GPU'),
(5, 'PNY GeForce RTX 3070 8G (LHR) 顯示卡', 17999, 
    5, 'https://cs-c.ecimg.tw/items/DRADJ41900EX2TU/000001_1653012777.jpg',
    '◆ 顯示晶片 ：NVIDIA GeForce RTX 3070
    ◆ 記憶體 ：8GB GDDR6
    ◆ CUDA數 ：5888
    ◆ 記憶體時脈：1500MHz
    ◆ 記憶體介面：256-bit
    ◆ 輸出端子 ：3x DP / 1x HDMI
    ◆ 體積(長x寬x高)：265 x 140', 'GPU'),
(6, '技嘉 AORUS GeForce RTX™ 3060 Ti ELITE 8G (rev. 2.0) 顯示卡', 20490,
    5, 'https://cs-d.ecimg.tw/items/DRAD1KA900BM2ZQ/000001_1653530763.jpg',
    '◆ 顯示晶片 ：GeForce RTX™ 3060 TI
    ◆ 記憶體 ：GDDR6 8GB
    ◆ CUDA數 ：4864
    ◆ 記憶體介面：256-bit
    ◆ 電源接口：8 pin*1 + 6 pin*1
    ◆ 輸出端子 ：DisplayPort 1.4a *2 HDMI 2.1*2
    ◆顯卡長度：L=296 W=117 H=56 mm', 'GPU'),
(7, '微星 GeForce RTX 3070 Ti SUPRIM X 8G 顯示卡', 27000,
    5, 'https://cs-e.ecimg.tw/items/DRADIVA900BIIBV/000001_1650512421.jpg',
    '◆ 記憶體 ：8GB GDDR6X
    ◆ Cores ：6144 Units
    ◆ 記憶體介面：256-bit
    ◆ 輸出端子 ：3x DP / HDMI
    ◆ 電源連結器：8-pin x2
    ◆ 體積(長x寬x高)：335 x 140 x 61mm', 'GPU'),
(8, '微星 GeForce RTX 3050 VENTUS 2X 8G OC 顯示卡', 10000,
    5, 'https://cs-d.ecimg.tw/items/DRAD1RA900DXALA/000001_1643181957.jpg', 
    '◆ 記憶體 ：8GB GDDR6
    ◆ Cores ：2560 Units
    ◆ 記憶體介面：128-bit
    ◆ 輸出端子 ：3x DP / HDMI
    ◆ 電源連結器：8-pin x1
    ◆ 體積(長x寬x高)：235 x 124 x 42 mm', 'GPU'),
(9, '華碩 TUF-RTX3080TI-O12G-GAMING 顯示卡', 31090,
    5, 'https://cs-d.ecimg.tw/items/DRAD1NA900BN11Q/000001_1628749627.jpg', 
    '◆ 顯示晶片 ：NVIDIA® GeForce RTX™ 3080 Ti
    ◆ 記憶體 ：12GB GDDR6X
    ◆ 核心時脈 ：OC mode : 1785 MHz (Boost Clock) Gaming mode : 1755 MHz (Boost Clock)
    ◆ 記憶體介面 : 384 bit
    ◆ 電源接口：2 x 8 pin
    ◆ 輸出端子 ：有 x 2 (原生 HDMI2.1) 有 x 3 (原生 DisplatPort 1.4a) 支援HDCP : 有 (2.3)
    ◆ 顯卡長度：299.9 x 126.9 x 51.7 mm 11.81 x 5 x 2.04 inch
    ◆ 保固：原廠三年保固', 'GPU');


INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`, `Goods_Statement`, `Goods_Classify`) VALUES
(10, 'SAMSUNG Galaxy S8 S8+ S9 S9+ AKG原廠 雙耳立體聲耳機', 580,
  5, 'https://cs-c.ecimg.tw/items/DYAQ1PA90095DYW/000001_1529648209.jpg',
  '▪AKG SAMSUNG原廠耳機 專屬於你的悅耳音效
  ▪採用雙耳立體聲耳機 適用安卓 3.5mm 接頭規格
  ▪採用符合人體工學的設計及人體工學耳廓矽膠耳塞
  ▪奈米編織線防纏繞設計 防拉防纏繞給您完美體驗
  ▪仿造劇院建築聲學設計 航太級超薄振膜原音重現', 'earphone'),
(11, '鐵三角 ATH-L5000 動圈型耳罩式耳機(限量版)', 122500,
  5, 'https://cs-f.ecimg.tw/items/DMAF4BA900AYANV/000001_1603852947.jpg',
  '型式:密閉式動圓型
  驅動單元:φ58mm 、DLC 擬鑽破鐵覆層振膜 頻率響應 5 ～ 50,000Hz
  輸出成度:100dB/ mW
  阻抗:48。
  輸入端子:A2DC 端子插座
  附屬品:3.0m Y 型導線 （ A2DC to XLRM-4pi 『1) 3.0m Y 型導線 （ A2 DC to Q)6.3mm TRS﹜ 硬殼攜存盒', 'earphone'),
(12, '森海塞爾 SENNHEISER HD 820 頭戴耳罩式耳機', 73900,
  5, 'https://cs-d.ecimg.tw/items/QBAB3SA900ARR74/000001_1600170230.jpg',
  '玻璃背蓋封閉設計
  大尺寸環形振膜
  輕量化鋁合金音圈
  更優異的低頻量感
  內附兩種耳機線材
  愛爾蘭製，公司貨兩年保固', 'earphone'),
(13, 'MDR-Z1R 旗艦級立體聲可拆卸耳機 Signature 系列', 55900,
  5, 'https://cs-d.ecimg.tw/items/QABB0HA9007LT8S/000001_1565686192.jpg',
  '·70 mm HD 驅動單體給您純粹音效
  ·人體工學羊皮耳墊
  ·包覆式設計結構
  ·鈦與皮革材質頭帶
  ·最佳化舒適度適合長時間配戴
  ·4.4Φ 均衡連接線，鍍銀無氧銅', 'earphone');
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
