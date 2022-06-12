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
  `Goods_Specs` longtext NOT NULL,
  `Goods_Statement` longtext NOT NULL,
  `Goods_Classify` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `goods`
--
INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`,`Goods_Specs`, `Goods_Statement`, `Goods_Classify`) VALUES
(1, 'ASUS 華碩 Dual GeForce RTX 3060 V2 OC 12GB GDDR6 顯示卡', 13990, 
    5, 'https://cs-d.ecimg.tw/items/DRAD1NA900CANHO/000001_1654588212.jpg',
    '繪圖核心:NVIDIA® GeForce RTX™ 3060
		匯流排規格:PCI Express 4.0
		OpenGL:OpenGL®4.6
		記憶體形式:12GB GDDR6
		GPU 時脈:OC Mode - 1867 MHz (Boost Clock),Gaming Mode - 1837 MHz (Boost Clock)
		CUDA 核心數:3584
		Memory Speed:15 Gbps
		Memory Interface:192-bit
		解析度:Digital Max Resolution 7680 x 4320
		介面:有 x 1 (原生 HDMI2.1), 有 x 3 (原生 DisplayPort 1.4a), 支援HDCP : 有 (2.3)
		最多可支援顯示器數量:4
		NVlink/ Crossfire Support:無
		配件:1 x Speedsetup manual, 1 x Collection card
		軟體:ASUS GPU Tweak II & GeForce Game Ready Driver & Studio Driver: please download all software from the support site.
		產品尺寸:7.87 " x 4.84 " x 1.496 " Inch, 20 x 12.3 x3.8 Centimeter
		Recommended PSU:650W
		電源連接器:1 x 8-pin
		Slot:2.0 插槽
		AURA SYNC:RGB', 
    '搭載強大軸向式雙風扇，2-slot 設計達到廣泛的裝機相容性。
    NVIDIA Ampere 串流多處理器：全新的 Ampere 串流多處理器是世界上最快、最高效的 顯示卡架構，可提升2倍FP32輸送量，帶來優異效能。
    第二代 RT 核心：體驗比第一代 RT 核心兩倍的輸送量，再加上支援RT和著色計算，可將光線追蹤提升到全新水平。
    第三代 Tensor 核心：結構性稀疏和先進人工智慧演算法（例如DLSS）使輸送量提升到2倍。該核心極大提升遊戲效能和全新的 AI 人工智慧功能。
    超頻版: Boost clock 1867 MHz (超頻模式)/ 1837 MHz (遊戲模式)
    軸向式風扇具備較小的風扇輪轂以使用更長的葉片，阻隔環則可提高向下風壓。
    2-slot 設計賦予小型機殼，強大的相容性與優越的散熱表現。
    0dB 技術讓您在相對安靜的環境下享受遊戲。
    不鏽鋼 I/O 擋板更堅固耐用、抗腐蝕
    保固：原廠三年保固
    延長 登錄四年保固到府收送', 'GPU'),
(2, 'PNY GeForce RTX 3080 LHR 10G XLR8 顯示卡', 23999,
    5, 'https://cs-d.ecimg.tw/items/DRADJ4A900F17LO/000001_1654483524.jpg',
    '顯示卡尺寸:317 x 115.1 x 59.9 mm; 3槽
		包裝尺寸:380 x 190 x 90 mm
		NVIDIA® CUDA 核心:8704
		基礎時脈:1440 MHz
		加速時脈:1710MHz
		記憶體速度 (Gbps):19 Gbps
		記憶體大小:10GB GDDR6X
		記憶體介面頻寬:320-bit
		記憶體介面頻寬(GB/sec):760
		顯示卡功率 (W):320W
		NVLink:不支援
		標準顯示器接頭:3x DisplayPort 1.4, HDMI 2.1
		支援多螢幕:4
		最高數位解析度:7680 x 4320 @60Hz (Digital)
		電源連接器:2組 8-Pin
		匯流排規格:PCI-Express 4.0 ×16',
    '這款系統採用強化的 RT 核心和 Tensor 核心、全新串流多處理器，以及超高速 G6X 記憶體，打造驚人的遊戲體驗', 'GPU'),
(3, '微星 GeForce RTX 3080 SUPRIM X 10G LHR 顯示卡', 27900, 
    5, 'https://cs-c.ecimg.tw/items/DRAD1RA900F46LG/000001_1654853790.jpg',
    '繪圖引擎:NVIDIA® GeForce RTX™ 3080
		科技介面:PCI Express® Gen 4
		CORES:8704 Units
		MEMORY:10GB GDDR6X
		動態 / 核心時脈(MHZ):Extreme Performance: 1920 MHz (Dragon Center), Boost: 1905 MHz (GAMING & SILENT Mode)
		記憶體時脈:19 Gbps
		記憶體介面:320-bit
		OUTPUT:DisplayPort x 3 (v1.4a), HDMI x 1 (Supports 4K@120Hz as specified in HDMI 2.1)
		HDCP 支援: 有
		功耗(W):370W
		供電接口:8-pin x 3
		建議電源供應(W):850W
		顯示卡尺寸(MM):336 x 140 x 61 mm
		重量 (顯示卡 / 包裝盒):1882g / 3178g
		DIRECTX 支援版本:12 API
		OPENGL 支援版本:4.6
		最大螢幕輸出數量:4
		DIGITAL MAXIMUM RESOLUTION:7680 x 4320', 
    '在追求卓越 (SUperior)的遊戲體驗同時，我們歷經數載深刻 (PRofound) 的旅程，企及了無數個被認為不可能的(Impossible)目的地。於深化性能設計的多年努力後，MSI倍感榮幸地將集大成之作賦予新生。SUPRIM系列顯示卡，肯定是顯示卡的一個大躍進','GPU'),
(4, 'ASUS 華碩 TUF Gaming GeForce RTX 3060 V2 OC 12G 顯示卡', 15090,
    5, 'https://cs-e.ecimg.tw/items/DRAD1NA900CANHC/000001_1653876714.jpg',
    '匯流排規格:PCI Express 4.0
    OpenGL:OpenGL®4.6
    記憶體形式:12GB GDDR6
    GPU 時脈:OC Mode - 1882 MHz (Boost Clock), Gaming Mode - 1852 MHz (Boost Clock)
    CUDA 核心數:3584
    Memory Speed:15 Gbps
    Memory Interface:192-bit
    解析度:Digital Max Resolution 7680 x 4320
    介面:有 x 2 (原生 HDMI2.1), 有 x 3 (原生 DisplayPort 1.4a)
    支援HDCP : 有 (2.3)
    最多可支援顯示器數量:4
    NVlink/ Crossfire Support:無
    配件:1 x TUF certificate of Reliability, 1 x Collection card, 1x Speedsetup Manual
    軟體:ASUS GPU Tweak II & GeForce Game Ready Driver & Studio Driver: please download all software from the support site.
    產品尺寸:11.81 " x 5.63 " x 2.13 " Inch, 30.1 x 14.3 x 5.4 Centimeter
    Recommended PSU:650W
    電源連接器:1 x 8-pin
    Slot:2.7 插槽
    AURA SYNC:ARGB',
    'ASUS TUF Gaming GeForce RTX™ 3060 V2 OC 超頻版 12GB GDDR6 強化設計並具備頂尖的散熱效能。
    NVIDIA Ampere 串流多處理器：全新的 Ampere 串流多處理器是世界上最快、最高效的 顯示卡架構，可提升2倍FP32輸送量，帶來優異效能。
    第二代 RT 核心：體驗比第一代 RT 核心兩倍的輸送量，再加上支援RT和著色計算，可將光線追蹤提升到全新水平。
    第三代 Tensor 核心：結構性稀疏和先進人工智慧演算法（例如DLSS）使輸送量提升到2倍。該核心極大提升遊戲效能和全新的 AI 人工智慧功能。
    OC 超頻版: Boost clock 1882 MHz (超頻模式)/ 1852 MHz (遊戲模式)
    軸向式風扇已進行調整，反向旋轉的中央風扇，可增加風壓快速散熱。
    雙滾珠軸承設計 風扇使用壽命為傳統油封軸承的兩倍。
    全鋁製護蓋與金屬強化背板 更加耐用。
    GPU Tweak II提供簡單易用的效能調校、散熱控制及系統監控功能。', 'GPU'),
(5, 'PNY GeForce RTX 3070 8G (LHR) 顯示卡', 17999, 
    5, 'https://cs-c.ecimg.tw/items/DRADJ41900EX2TU/000001_1653012777.jpg',
    '顯示卡尺寸:265 x 140 mm; 3槽
    包裝尺寸:380 x 190 x 90 mm
    NVIDIA® CUDA 核心:5888
    基礎時脈:1500MHz
    加速時脈:1725MHz
    記憶體速度 (Gbps):14 Gbps
    記憶體大小:8GB GDDR6
    記憶體介面頻寬:256-bit
    記憶體介面頻寬(GB/sec):448
    顯示卡功率 (W):220 W
    NVLink:不支援
    標準顯示器接頭:3x DisplayPort 1.4, HDMI 2.1
    支援多螢幕:4
    最高數位解析度:7680 x 4320 @60Hz (Digital)
    電源連接器:1組 12-Pin
    匯流排規格:PCI-Express 4.0 ×16',
    'GeForce RTX™ 3070 採用 NVIDIA 第 2 代 RTX 架構 Ampere。透過增強的光線追蹤核心和 Tensor 核心、全新串流多處理器以及高速 G6 記憶體，讓你在戰況最激烈的遊戲中也能勇往直前。', 'GPU'),
(6, '技嘉 AORUS GeForce RTX™ 3060 Ti ELITE 8G (rev. 2.0) 顯示卡', 20490,
    5, 'https://cs-d.ecimg.tw/items/DRAD1KA900BM2ZQ/000001_1653530763.jpg',
    '核心時脈:1785 MHz (Reference Card: 1665 MHz)
    CUDA® Cores:4864
    記憶體時脈:14000 MHz
    記憶體規格:8 GBGDDR6
    記憶體介面:256 bit
    Memory Bandwidth (GB/sec):4‎48 GB/s
    匯流排:PCI-E 4.0 x 16
    最大數位解析度:7680x4320
    多螢幕支援:4
    尺寸:L=296 W=117 H=56 mm
    PCB 規格:ATX
    DirectX 支援:12 Ultimate
    OpenGL 支援:4.6
    建議電源供應:650W
    供電接口:8 pin*1 + 6 pin*1
    輸出:DisplayPort 1.4a *2, HDMI 2.1*2
    SLI 顯示卡串聯:N/A
    配件:1. Quick Guide, 2. 4-year warranty, 3. Metal sticker',
    '全新安培架構SM
    第二代RT 核心
    第三代TENSOR 核心
    採用 GeForce RTX™ 3060 Ti 繪圖晶片
    內建 8GB GDDR6 256位元記憶體
    風之力三風扇搭配獨特刀鋒扇葉正逆轉功能
    RGB Fusion 2.0
    金屬背板造型設計
    LHR (Lite Hash Rate) 版本', 'GPU'),
(7, '微星 GeForce RTX 3070 Ti SUPRIM X 8G 顯示卡', 27000,
    5, 'https://cs-e.ecimg.tw/items/DRADIVA900BIIBV/000001_1650512421.jpg',
    '科技介面:PCI Express® Gen 4
    CORES:6144 Units
    MEMORY:8GB GDDR6X
    動態 / 核心時脈(MHZ):EXTREME Mode: 1875 MHz (MSI Center), GAMING Mode & SILENT Mode: 1860 MHz
    記憶體時脈:19 Gbps
    記憶體介面:256-bit
    OUTPUT:DisplayPort x 3 (v1.4a), HDMI x 1 (Supports 4K@120Hz as specified in HDMI 2.1)
    HDCP 支援:有
    功耗(W):310W
    供電接口:8-pin x 2
    建議電源供應(W):850W
    顯示卡尺寸(MM):335 x 140 x 61 mm
    重量 (顯示卡 / 包裝盒):1768 g/3059 g
    DIRECTX 支援版本:12 API
    OPENGL 支援版本:4.6
    最大螢幕輸出數量:4
    DIGITAL MAXIMUM RESOLUTION:7680 x 4320',
    '在追求卓越 (SUperior)的遊戲體驗同時，我們歷經數載深刻 (PRofound) 的旅程，企及了無數個被認為不可能的(Impossible)目的地。於深化性能設計的多年努力後，MSI倍感榮幸地將集大成之作賦予新生。SUPRIM系列顯示卡，肯定是顯示卡的一個大躍進','GPU'),
(8, '微星 GeForce RTX 3050 VENTUS 2X 8G OC 顯示卡', 10000,
    5, 'https://cs-d.ecimg.tw/items/DRAD1RA900DXALA/000001_1643181957.jpg', 
    '記憶體 ：8GB GDDR6
    Cores ：2560 Units
    記憶體介面：128-bit
    輸出端子 ：3x DP / HDMI
    電源連結器：8-pin x1
    體積(長x寬x高)：235 x 124 x 42 mm',
    '最受入門玩家喜愛的 VENTUS系列，專注於性能表現的設計，不論是工作還是娛樂，具備完成各項需求的本質。堅實的工業設計，採用功能強大的雙風扇配置，極簡外觀設計，適用於各款主機組合搭配。', 'GPU'),
(9, '華碩 TUF-RTX3080TI-O12G-GAMING 顯示卡', 31090,
    5, 'https://cs-d.ecimg.tw/items/DRAD1NA900BN11Q/000001_1628749627.jpg', 
    '顯示晶片 ：NVIDIA® GeForce RTX™ 3080 Ti
    記憶體 ：12GB GDDR6X
    核心時脈 ：OC mode : 1785 MHz (Boost Clock) Gaming mode : 1755 MHz (Boost Clock)
    記憶體介面 : 384 bit
    電源接口：2 x 8 pin
    輸出端子 ：有 x 2 (原生 HDMI2.1) 有 x 3 (原生 DisplatPort 1.4a) 支援HDCP : 有 (2.3)
    顯卡長度：299.9 x 126.9 x 51.7 mm 11.81 x 5 x 2.04 inch',
    'NVIDIA Ampere 串流多處理器：全新的 Ampere 串流多處理器是世界上最快、最高效的 顯示卡架構，可提升2倍FP32輸送量，帶來優異效能。
    第二代 RT 核心：體驗比第一代 RT 核心兩倍的輸送量，再加上支援RT和著色計算，可將光線追蹤提升到全新水平。
    第三代 Tensor 核心：結構性稀疏和先進人工智慧演算法（例如DLSS）使輸送量提升到2倍。現在，該核心可支援高達8K的更新率，極大提升遊戲效能和全新的人工智慧功能。
    OC 超頻版: Boost clock 1785 MHz (超頻模式)/ 1755 MHz (電競模式)
    軸向式風扇已進行全新調整，配備反向旋轉的中央風扇以減少亂流。
    雙滾珠軸承風扇的使用壽命可達油封軸承設計的兩倍。
    軍規等級電容器及其他 TUF 組件強化耐用性與效能。
    GPU Tweak II 提供簡單易用的效能調校、散熱控制及系統監控功能。', 'GPU');


INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`,`Goods_Specs`, `Goods_Statement`, `Goods_Classify`) VALUES
(10, 'SAMSUNG Galaxy S8 S8+ S9 S9+ AKG原廠 雙耳立體聲耳機', 580,
  5, 'https://cs-c.ecimg.tw/items/DYAQ1PA90095DYW/000001_1529648209.jpg',
  '適用接頭規格：3.5mm接頭
  配戴方式：雙耳立體聲耳機
  連線模式：有線3.5mm耳機連接器
  重量：約12g (不含包裝盒)
  材質：奈米編織線、塑膠、金屬、矽膠
  適用型號：Galaxy S8 / Galaxy S8+ / Galaxy S9 / Galaxy S9+及其他Android系列手機
  原廠編號：EO-IG955 AKG
  尺寸：約120cm
  顏色：黑色
  頻率響應(Hz)：20~20kHz
  靈敏度/感度(dB)：92dB
  阻抗：32歐姆
  產地: Vietnam/中國
  包裝內容物：AKG SAMSUNGM原廠耳機+耳機塞(大*1小*1中*1在耳機上)',
  'AKG SAMSUNG原廠耳機 專屬於你的悅耳音效
  採用雙耳立體聲耳機 適用安卓 3.5mm 接頭規格
  採用符合人體工學的設計及人體工學耳廓矽膠耳塞
  奈米編織線防纏繞設計 防拉防纏繞給您完美體驗
  仿造劇院建築聲學設計 航太級超薄振膜原音重現', 'earphone'),
(11, '鐵三角 ATH-L5000 動圈型耳罩式耳機(限量版)', 122500,
  5, 'https://cs-f.ecimg.tw/items/DMAF4BA900AYANV/000001_1603852947.jpg',
  '型式:密閉式動圓型
  驅動單元:φ58mm 、DLC 擬鑽破鐵覆層振膜 頻率響應 5 ～ 50,000Hz
  輸出成度:100dB/ mW
  阻抗:48。
  輸入端子:A2DC 端子插座
  附屬品:3.0m Y 型導線 （A2DC to XLRM-4pi) 3.0m Y 型導線 （A2 DC to Q)6.3mm TRS﹜ 硬殼攜存盒',
  '機實質外側的保護皮革， 探問 CONNOLLY公司的高級皮萃 ，於英國手工縫裂。 由於是真皮，同樣也保留其自然還氣之特性。', 'earphone'),
(12, '森海塞爾 SENNHEISER HD 820 頭戴耳罩式耳機', 73900,
  5, 'https://cs-d.ecimg.tw/items/QBAB3SA900ARR74/000001_1600170230.jpg',
  '顏色：黑
  單體形式 ：動圈
  阻抗：300 Ω
  頻率響應 ：6- 48,000 Hz
  靈敏度：103dB
  配戴方式：全罩式
  發聲結構：封閉式
  連接端子：6.3mm直式端子、4.4mm平衡端子
  線材長度：3m
  重量：360 g(不含線材)',
  '玻璃背蓋封閉設計
  大尺寸環形振膜
  輕量化鋁合金音圈
  更優異的低頻量感
  內附兩種耳機線材
  愛爾蘭製，公司貨兩年保固', 'earphone'),
(13, 'id221 MOTO A1 PLUS 機車安全帽專用 藍牙耳機 一體式麥克風喇叭', 1280,
  5, 'https://cs-e.ecimg.tw/items/DYAQF4A900EQPAB/000001_1648019470.jpg',
  '藍牙版本：V5.0
  藍牙協議：HFP/HS、A2DP、AVRCP
  電池類型：鋰電池
  待機時間：約兩個星期
  操作時間：約12小時',
  '1. 支持兩台MOTO A1 PLUS對講，也可以支援其它品牌
  2. 可同時連接兩台藍牙設備
  3. 電池高續航力
  4. 可接聽網路通話及行動電話', 'earphone'),
(14,'Kaibo Buds 骨傳導真無線藍牙耳機', 2990,
  5, 'https://cs-f.ecimg.tw/items/DYAQFAA900BN0Y6/000001_1649211537.jpg',
  '藍牙版本：5.0 雙聲道立體聲
  防水係數：IP55
  響應頻率：20Hz-20KHz
  電池容量：耳機70mAH / 充電盒500AH
  充電時間：耳機約60分鐘 / 充電盒約90分鐘
  使用時間：音樂播放4小時 / 通話3.5小時
  待機時間：5天
  盒裝尺寸：10 x 4.1 x 15.5 cm
  耳機重量：17g / 充電盒48g
  藍牙協議：HFP1.7，HSP1.2，A2DP1.3，AVRCP1.6，SPP1.2、PBAP1.0
  NCC 認證：CCAH21LP0900T2',
  '榮獲2021年iF產品設計大獎
  黑科技骨傳導耳機聆聽模式
  零耳壓聆聽，讓你聽力無負擔', 'earphone'),
(15,'Turtle Beach Stealth 700 Gen 2無線耳罩電競耳機 PS ＆ PC版本', 4590,
  5, 'https://cs-d.ecimg.tw/items/DCAYTRA900B4AZU/000001_1651543678.jpg',
  '頻率響應：20 Hz - 22 kHz
  驅動單元：50mm 釹磁鐵驅動單元
  連線方式：USB無線連線
  電池容量：1000mAh
  耳機續航：20小時
  充電接口：Type-C充電
  適用平台：Nintendo Switch™、PS4 Pro、PS4、PS5、行動裝置、PC與Mac',
  '無線暢玩｜透過USB無線發射器，實現無線遊玩的便利性
  聽音辨位｜獨家Superhuman Hearing®超能聽音辨位專利技術，體現所有音效細節
  頂級單體｜採用高穿透指向性50mm釹磁鐵驅動單體，不只呈現遊戲音效，也能用於音樂體驗
  智慧耳麥｜智慧型收折靜音麥克風能在收折時完全靜音收納至耳機中
  緩壓設計｜ProSpecs™ 眼鏡緩壓系統，於接觸位置利用柔軟海綿，友好眼鏡玩家
  舒適耳罩｜舒適D型耳墊設計，適合長時間配戴玩家使用
  收音監控｜可透過耳麥聽見自己的聲音並調整音量，隨時注意自身音量
  廣泛相容｜專為PS4、PS5設計，也可適用於SWITCH、手機、PC等裝置
  電池續航｜每次充電後就能獲得長達20hr的續航時間，有效應付整天的遊戲需求', 'earphone'),
(16, 'EPOS ｜ SENNHEISER GSP 670無線電競耳罩耳機', 6490,
  5, 'https://cs-f.ecimg.tw/items/DCAYX7A900BJ0ZD/000001_1652063002.jpg',
  '耳罩結構：全尺寸耳罩
  單體形式：動圈 封閉式
  無線傳輸：2.4G、藍牙
  線材長度：1.5m USB
  輸入端子：Micro USB
  支援平臺：PC, Mac OSX, PS4, Mobile/tablet
  頻率響應：10-23kHz
  聲壓級：112dB
  頻率響應：10-7300Hz
  拾音模式：雙向ECM
  靈敏度：-47 dBV/Pa',
  '-透過藍牙連接手機等設備
  -智慧電源管理可自動開啟和關閉耳機
  -對通話和遊戲各自獨立音量控制
  -EPOS專屬音效控制軟體
  -先進的降噪麥克風可實現水晶般清晰的通話
  -靈活的麥克風臂，具有 "快速靜音 "功能
  -20小時通話時間
  -與PS4、平板電腦、手機、電腦/軟電話相容', 'earphone');

INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`,`Goods_Specs`, `Goods_Statement`, `Goods_Classify`) VALUES
(17, 'iRocks K75M 黑色上蓋單色背光機械式鍵盤-茶軸', 2890,
  5, 'https://cs-c.ecimg.tw/items/DCAHGYA900AMB3U/000001_1632369638.jpg',
  '產品型號: IRK75 M
  介面 : USB
  按鍵數: 104 鍵
  開關形式: Cherry機械開關
  按鍵行程: 4.0mm
  全區防鬼鍵設計 (NKRO)
  多媒體鍵: 14 鍵
  背光特效鍵: 8 鍵
  電壓/電流: DC 5V / 250 mA Max.
  產品重量: 約870公克
  USB 線長 : 約180 公分',
  '採用Cherry機械軸體
   易於清理的懸浮式結構
   強固的鋁合金面板與可調整腳架
   按鍵背光，多種特效及自訂模式
   側邊流光燈條，支援獨立動態燈效
   內建快捷鍵，輕鬆存取多媒體、郵件、全鍵鎖鍵及電腦螢幕快速鎖功能鍵等功能
   內建記憶體支援5組按鍵字串巨集，快速輸入更便利', 'keyboard'),
(18, 'Corsair K70 MK.2 SE RGB 機械式電競鍵盤-銀軸', 4390,
  5, 'https://cs-f.ecimg.tw/items/DCAH67A90098VYI/000001_1640830198.jpg',
  '軸體品牌：	Cherry MX RGB
  軸：銀軸
  按壓手感：線性
  按壓聲音：安靜
  鍵帽材質：PBT
  鍵帽印字：二色成型
  鍵盤語系：英文
  輸出鍵數：Full Key (NKRO), 100% anti-ghosting
  背光：RGB
  回報率：1000Hz
  多媒體支援：專用按鈕（停止，上一個，播放/暫停，下一個）
  內建記憶體：8MB
  連接介面：USB
  重量：1250 g
  尺寸(長 x 寬 x 高)：437.9 x 165.9 x 38.9 mm (L x W x H)
  支援系統：帶USB2.0接口的PC Windows 10，Windows 8，Windows 7',
  'Cherry MX銀軸，1.2mm高速觸發
  高級質感的銀白配色
  採用PBT雙色注塑成型鍵帽-白色
  令人驚嘆不已的RBG燈效
  銀色陽極髮絲紋面板
  兼容iCUE
  8MB內存
  可拆卸式的柔軟手扶墊','keyboard'),
(19, '華碩 ASUS ROG Strix Scope RX 光學機械電競鍵盤-紅軸', 3190,
  5, 'https://cs-d.ecimg.tw/items/DCAHH2A900AXTIV/000001_1603261711.jpg',
  '連接:USB 2.0
  大小 (全/TKL):100%
  照明:Per-Key RGB LEDs
  AURA同步:Yes
  防鬼影:100% Anti-Ghosting
  巨集鍵:All Keys Programmable On-the-Fly Recording Support
  USB報告率(USB Report rate):1000 Hz
  作業系統:Windows® 10, Windows® 11
  軟體:Armoury Crate
  尺寸:440x137x39 mm
  重量:1.07kg
  色彩:黑色',
  'ROG RX 光學機械軸：1ms 瞬時回饋與 1 億次鍵擊壽命，讓你享受穩定不晃動的鍵擊體驗 深入了解 ROG RX 鍵盤軸體
  光耀戰場：具備中央 LED 提供環繞式燈效的獨立按鍵、背光 ROG logo 以及可客製的燈光效果
  持久耐用：採用鋁合金上蓋並具備 IP56 防水防塵功能，提供超長使用壽命
  USB 2.0 連接埠：具備完整功能的連接埠，可為裝置充電或讀取外接儲存裝置
  為 FPS 而生：加寬 2 倍的 Ctrl 鍵，執行「蹲伏」或其他指令精準不誤觸
  隱形鍵：按下即可隱藏所有視窗並切換靜音，立即確保隱私
  Quick-toggle 快捷鍵：快速切換功能鍵與媒體鍵
  巨集、管理與內建記憶體：可將指令序列快速對應至選定按鍵，透過強化的 Armoury Crate 軟體調整設定，以及利用內建記憶體儲存設定檔','keyboard'),
(20, 'irocks K71R RGB背光 無線機械式鍵盤-Gateron紅軸', 2890,
  5, 'https://cs-c.ecimg.tw/items/DCAHP8A900BK3XD/000001_1626082250.jpg',
    '產品型號: IRK71R
    介面: 有線&無線雙模
    有線: USB
    無線: 2.4GHz
    背光: RGB背光
    無線省電模式: 4種模式
    按鍵數: 107 鍵
    智慧型按壓滾輪: 1組
    開關形式: 機械開關
    按鍵行程: 4.0±0.5mm
    全區防鬼鍵設計 (NKRO)
    多媒體鍵: 15 鍵
    背光特效鍵: 8 鍵
    有線工作電壓/電流: DC5V / 500 mA
    無線充電電壓/電流: DC5V / 0.5 ~ 1A
    充電接口: USB- C
    無線續航時間參考值:
    背光關閉約 180 小時
    RGB跑馬背光( 按鍵背光開啟/環狀背光開啟/正常亮度 ) 約 27 小時
    RGB跑馬背光( 按鍵背光開啟/環狀背光關閉/正常亮度 ) 約 40小時
    可充式鋰電池容量: 3750 mAh
    產品重量: 約 1.3 公斤
    USB 線長 : 約180 公分
    產品尺寸: 444 (L) X 155(W) X 42 (H) mm',
    '機械鍵軸提供極速反應與按鍵回饋感
    高效能無線2.4GHz 及USB有線雙介面
    USB-C鍵線分離與可調整腳架
    PBT二色成形鍵帽，乾爽止滑
    可切換模式與自定功能的智慧滾輪
    環狀燈帶與多彩RGB背光，支援動態特效與自訂背光功能
    內建快捷鍵，包括多媒體功能、郵件、全鍵鎖定及電腦鎖定
    可搭配軟體輕鬆設定巨集及背光顏色及特效','keyboard'),
(21, 'Ducky One 2 薔薇機械鍵盤-2021新春限定版-中文(茶軸/青軸/紅軸)', 2590,
  5, 'https://cs-f.ecimg.tw/items/DCAHK3A900B4PS2/000001_1612151922.jpg',
    '型號：DKON1808
    結構：機械式結構
    觸發開關：Cherry MX機械軸
    燈光：非背光
    連接介面：USB Type-C
    輸出鍵數：USB N-Key Rollover
    特殊功能：Ducky Marco V2.0、Ducky Mouse function
    鍵帽材質：PBT
    印字技術：二色成形
    鍵盤尺寸：440 x 135 x 40 mm
    重量：1100g
    產地：台灣',
    '德國Cherry MX機械軸
    PBT二色成形不破孔鍵帽
    多段式腳架設計
    獨立指示燈設計
    雙層電路板用料
    提供100%尺寸','keyboard'),
(22,'Corsair K70 MK.2 RGB 機械式電競鍵盤-紅軸/中文', 2990,
  5, 'https://cs-d.ecimg.tw/items/DCAH67A90098YW9/000001_1619521949.jpg',
  '鍵盤結構:機械式
  適用作業系統:Windows
  連接介面:USB
  材質:金屬
  獨立數字鍵:無
  語言介面:中文注音
  型號:K70MK2(TW)RGB
  線長(cm):NA
  顏色:黑色系
  尺寸(mm):465 x 171 x 36mm
  重量(g):1250
  產地:中國',
  'Cherry MX紅軸
  陽極氧化髮絲鋁合金面板
  令人驚嘆不已的RBG燈效
  兼容iCUE
  8MB內存
  可拆卸式的柔軟手扶墊','keyboard');

INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`,`Goods_Specs`, `Goods_Statement`, `Goods_Classify`) VALUES
(23, 'Razer DeathAdder V2 Pro Genshin Impact Edition 無線電競滑鼠 [原神聯名款]', 4199,
  5, 'https://cs-f.ecimg.tw/items/DCBF01A900C47VQ/000001_1640147074.jpg',
    '實感 20,000 DPI Focus+ 光學感測器，解析精準度高達 99.6%
    每秒最多 650 英吋 (IPS) / 50 G 加速度
    進階自訂抬升 / 放下距離
    Razer™ 光學滑鼠按鍵軸可承受 7,000 萬次按鍵敲擊
    雙模無線 - HyperSpeed (2.4Ghz) 與 BLE（低功率藍牙）
    7+1 顆可獨立編程按鍵
    100% PTFE 鼠腳（厚度 0.8 公釐）
    符合人體工學右手抓握設計與紋理防滑側握。
    電競級觸覺回饋滾輪
    即時靈敏度調整（預設分段：400/800/1600/3200/6400）
    進階內建記憶體（4+1 組設定檔）
    支援 Razer Synapse 3
    Razer Chroma™ RGB 加持，具備 1,680 萬種可自訂色彩選項
    裝置間燈光效果色彩同步
    1.8 公尺 / 6 英呎 Speedflex 纜線，可用於充電和有線連接
    與 Razer 滑鼠充電座相容
    電池續航力：使用 HyperSpeed Wireless 模式時約為 70 個小時，使用 BLE（低功率藍牙）模式時約為 120 個小時（在不使用燈光效果的情況下所測量，電池續航力因使用設定而有所差異）
    約略尺寸：127.0 公釐 （長）x 61.7 公釐 （握把寬）x 42.7 公釐 （高）
    約略重量：88 公克（不含傳輸器）
    相容 Xbox One 的基本輸入功能',
    'Razer™ HyperSpeed Wireless 技術，連線速度超越有線滑鼠
     Razer™ Focus+ 20K DPI 光學感測器，提供不同凡響的準確度
     第 2 代 Razer™ 光學滑鼠按鍵軸，提供光速般的觸發速度
     長達 120 小時的電池續航力，具備 3 種連線模式
     進階內建記憶體，可儲存最多 5 組設定檔', 'mouse'),
(24, '羅技 G603 無線電競遊戲滑鼠', 1791,
  5, 'https://cs-f.ecimg.tw/items/DCAN8MA9008EMIQ/000001_1646113293.jpg',
  '高：124 公釐
  寬：68 公釐
  深：43 公釐
  重量：88.9 公克 (僅滑鼠)
  追蹤性
  Sensor: HERO™
  Resolution: 200 – 12,000 DPI
  Zero smoothing/acceleration/filtering
  Max. acceleration: > 40 G4Tested on Logitech G240 gaming mouse pad
  Max. speed: > 400 IPS5
  靈敏度
  USB data format: 16 bits/axis
  LIGHTSPEED Wireless report rate in HI mode: 1000 Hz
  Wireless report rate in LO mode: 125 Hz
  Bluetooth® report rate: 88-133 Hz
  Microprocessor: 32-bit ARM
  耐用性
  PTFE Feet: 250-km range6Tested on Logitech G240 gaming mouse pad
  電池壽命7電池壽命視使用者、電池放電特性及運算條件而異
  HI mode (performance): 500 hours (non-stop gaming)
  LO mode (endurance): 18 months (standard usage)
  藍牙：
  藍牙裝置
  Windows 8 或更新版本
  macOS 10.12 或更新版本
  Chrome OS
  Android 5.0 或更新版本',
  '六個可自訂按鍵
  內建記憶體
  針對舒適性的人體工學設計
  可選擇裝配一顆或兩顆3號AA電池，自定重量平衡
  無線 / 藍牙 雙重連線技術', 'mouse'),
(25, 'Razer Atheris 刺鱗樹蝰 無線/藍牙雙模滑鼠', 699,
  5, 'https://cs-d.ecimg.tw/items/DCBF01A900BSFI6/000001_1654143791.jpg',
  '型號：	RZ01-02170100-R3A1
  連接介面：雙頻 2.4 GHz 與藍牙 (BLE) 連線功能
  顏色：黑
  尺寸(長 x 寬 x 高)：99.7 x 62.8 x 34.1 mm(L,W,H)
  DPI：7,200 DPI
  最大加速度(G) ：220 IPS / 30 G
  回報率：1,000 Hz
  可編程按鍵：5 個可獨立編程的 Hyperesponse 按鍵
  工作時間：電池續航力：連續遊戲時間約 350 小時
  (電池使用壽命因個人使用設定而有所差異)
  電池：使用兩顆AA電池
  軟體：Razer Synapse 3',
  '雙頻 2.4 GHz 與藍牙 (BLE) 連線功能
  電池續航力：連續遊戲時間約 350 小時
  實感 7,200 DPI 光學感測器
  最高 220 IPS / 30 G','mouse'),
(26, 'Razer Basilisk X Hyperspeed 巴塞利斯蛇 X 速度版 無線滑鼠', 990,
  5, 'https://cs-d.ecimg.tw/items/DCBF01A900C8QXS/000001_1654496934.jpg',
  'Razer Hyperspeed無線技術
  5G 高階光學感測器
  超長電池續航力
  機械式滑鼠按鍵軸
  6顆可編程按鍵',
  '感測器:Razer 5G 高階光學感測器，具實感 16,000 DPI
  每秒最多 450 英吋 (IPS) / 40 G 加速度
  即時靈敏度調整（預設分段：800/1800/3200/7200/16000）
  連線方式:
  雙模無線連線方式（2.4GHz 和 BLE）
  HyperSpeed Wireless 技術（使用 2.4GHz 傳輸器）
  電池續航力
  使用隨附的 AA（3 號）電池時 最長 285 個小時 (2.4GHz) / 最長 450 個小時(BLE)。
  按鍵:6 顆可獨立編程按鍵
  按鍵軸:Razer™ 機械式滑鼠按鍵軸可承受 5,000 萬次按鍵敲擊
  滾輪:電競級觸覺回饋滾輪
  尺寸和重量:130 公釐 / 5.11 英吋（長）x 60 公釐 / 2.36 英吋（握把寬）x 42 公釐 / 1.65 英吋（高, 約略重量：83 公克 / 2.9 盎司（不含電池）
  相容性:支援 Razer Synapse 3','mouse'),
(27, '小米無線滑鼠 Lite', 399,
  5, 'https://cs-f.ecimg.tw/items/DCANNTA900ENYK1/000001_1646723634.jpg',
  '商品型號｜XMWXSB01YM
  商品材質｜PC ABS 金屬
  商品重量｜60g
  額定輸入｜1.5V
  分辨率｜1000 DPI
  電池類型｜4號電池
  連接方式｜2.4GHz
  支援系統｜Windows 10
  商品規格｜11.3ｘ6ｘ3.6 cm',
  '輕盈便攜體積，外出隨身帶上
  圓潤舒適握感，自然貼合曲線
  擺脫線材纏繞，無線更加自由','mouse'),
(28, 'Razer DeathAdder Essential 蝰蛇標準版 電競滑鼠', 688,
  5, 'https://cs-f.ecimg.tw/items/DCBF00A900C8QXZ/000001_1641288146.jpg',
  '滑鼠解析度(最高):6000~6999dpi
  滑鼠解析度(最低):100~499dpi
  傳輸模式:光學
  連接介面:USB
  適用作業系統:Windows, MAC
  材質:塑膠
  滑鼠按鍵數:5個
  型號:RZ01-03850100-R3M1
  線長(cm):1.8 公尺
  顏色:黑色系
  滾輪:有滾輪
  尺寸(mm):127mm(長) x 73mm(寬) x 43mm(高)
  重量(g):約96g
  產地:中國',
  '簡約且經典的人體工學設計
  5顆Hyperesponse按建
  6400 DPI 光學感測器','mouse');

INSERT INTO `goods` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`,`Goods_Specs`, `Goods_Statement`, `Goods_Classify`) VALUES
(29, '【ROG Strix SCAR 15】 G533ZM-0022S12900H 電競筆電', 55990,
  5, 'https://cs-d.ecimg.tw/items/DHAS4KA900DV9GZ/000001_1647223646.jpg',
    '處理器：Intel® Core™ i9-12900H Processor 2.5 GHz
    記憶體：8GB DDR5-4800 SO-DIMM *2
    硬碟：1TB M.2 NVMe™ PCIe® 4.0 SSD
    獨立顯卡：NVIDIA® GeForce RTX™ 3060 Laptop GPU 6GB GDDR6
    螢幕：15.6-inch//FHD (1920 x 1080) 16:9//300Hz 3ms//IPS-level//300Nits//100% SRGB//anti-glare display
    無線網路：Wi-Fi 6E(802.11ax)+Bluetooth 5.2 (Dual band) 2*2
    光碟機：無
    介面：Thunderbolt™ 4 support DisplayPort™
    重量：2.3 Kg
    作業系統：Windows 11 Home
    保固:2年全球保固 + 首年免預付完美保固',
    '全新升級300Hz 3ms 薄邊框設計
    超爽視覺享受 RTX 3060 獨顯6G效能
    超屌效能 搭載全新 12th Gen Intel® Core™ i9-12900H 處理器
    單鍵 RGB 鍵盤 與D件RGB lightbar 液態金屬散熱
    全新Arc Flow Fans風扇 支援PD3.0充電技術
    自訂個性化裝甲銘牌', 'laptop'),
(30, '【ASUS TUF Gaming】ASUS FA507RE-0031B6800H 御鐵灰', 35900,
  5, 'https://cs-f.ecimg.tw/items/DHAS4JA900EW29L/000001_1650625086.jpg',
    '全新顯卡視覺享受 RTX3050 Ti獨顯4G效能
    超屌效能 AMD Ryzen 7-6800H 處理器
    超狂容量 512GB M.2 NVMe™ PCIe® 3.0 SSD
    15.6吋FHD 薄邊寬 144Hz
    30分鐘充電50%快充技術
    支援2個M.2 Pcie SSD 擴充Slot
    支援雙螢幕輸出
    單區RGB多彩鍵盤/防塵散熱通道
    薄邊框/MIL-STD-810H通過軍規測試',
    '處理器：AMD Ryzen™ 7 6800H Processor (20MB cache, up to 4.7 GHz)
    記憶體：8GB*2 DDR5 4800
    硬碟：512GB M.2 NVMe™ PCIe® 3.0 SSD
    獨立顯卡：NVIDIA® GeForce RTX™ 3050 Ti GDDR6 4GB(具備MUX獨顯直連)
    螢幕：15.6’(薄邊框)/FHD (1920 x 1080) 16:9/144Hz
    無線網路：Wi-Fi 6(802.11ax)+Bluetooth 5.2 (Dual band) 2*2(*BT version may change with OS upgrades.)
    光碟機： 無
    介面：HDMI 2.0b、Type-C USB 3.2
    電池：90WHrs, 4S1P, 4-cell Li-ion
    重量：2.2 KG
    厚度：2.24 ~ 2.49 cm
    作業系統：Windows 11 (64bit)','laptop'),
(31, 'ASUS TUF Gaming】ASUS FX506HM-0072B11400H 戰魂黑', 33000,
  5, 'https://cs-d.ecimg.tw/items/DHAS1UA900EUD1O/000001_1649669852.jpg',
  '處理器：Intel® Core™ i5-11400H Processor 2.7 GHz (12M Cache, up to 4.5 GHz, 6 Cores)
  記憶體：8GB DDR4-3200 SO-DIMM
  硬碟：512GB M.2 NVMe™ PCIe® 3.0 SSD
  獨立顯卡：NVIDIA® GeForce RTX™ 3060 6G獨顯
  螢幕：15.6" FHD IPS 1920x1080 144Hz 薄邊框螢幕
  無線網路："Wi-Fi 6(802.11ax)+Bluetooth 5.2 (Dual band) 2*2"
  光碟機： 無
  介面：HDMI、Thunderbolt™ 4
  電池：90WHrs, 4S1P, 4-cell Li-ion
  重量：2.3 KG
  厚度：2.28~2.45cm
  作業系統：Windows 11 (64bit)',
  '全新顯卡視覺享受 RTX 3060獨顯6G效能
  超屌效能 搭載2021新世代 Intel® Core™ i5-11400H Processor 2.7 GHz 處理器
  超狂容量 512GB M.2 NVMe™ PCIe® 3.0 SSD
  全新升級 薄邊框螢幕 144Hz
  15吋FHD IPS 大屏佔比
  單區RGB多彩鍵盤/防塵散熱通道
  薄邊框/通過軍規測試', 'laptop'),
(32, 'ASUS VivoBook 15X X1503ZA-0111B12500H 午夜藍', 28900,
  5, 'https://cs-d.ecimg.tw/items/DHAFOFA900EYM4J/000001_1652923616.jpg',
  'LCD尺寸：15.6吋FHD(1920 x 1080)OLED 16:9 aspect ratio 600nits
  處理器：Intel® Core™ i5-12500H Processor 2.5 GHz
  記憶體：8GB DDR4 on board (1 slot可擴充)
  顯卡：Intel Iris Xᵉ Graphics
  硬碟：512GB M.2 NVMe™ PCIe® 3.0 SSD
  網路：Wi-Fi 6(802.11ax)+Bluetooth 5.0 (Dual band) 2*2
  重量：1.7KG
  I/O 插槽：1x USB 2.0 Type-A、1x USB 3.2 Gen 1 Type-C、2x USB 3.2 Gen 1 Type-A、1x HDMI 1.4、1x 3.5mm Combo Audio Jack、1x DC-in
  作業系統： 64 Bits Windows 11',
  '最新高效能12代i5處理器
  OLED螢幕減少多達70%的有害藍光
  90W adaptor更快充電與更好的效能
  ASUS抗菌處理技術99%抑菌效果', 'laptop'),
(33, 'ROG Strix G15 G513RC-0042F6800H 潮魂黑 15.6吋電競筆電', 36900,
  5, 'https://cs-c.ecimg.tw/items/DHAS4MA900E4H9I/000001_1648115534.jpg',
  '螢幕：15.6’(薄邊框)/FHD 1920x1080 16:9/144Hz/IPS-level /Anti glare /Adaptive-Sync / Dolby Vision
  處理器：AMD Ryzen™ 7 6800H Processor
  記憶體：8GB DDR5 4800
  硬碟：512GB M.2 NVMe™ PCIe® 4.0 SSD
  獨立顯卡：NVIDIA® GeForce RTX™ 3050 GDDR6 4GB
  無線網路：Wi-Fi 6(802.11ax)+Bluetooth 5.2 (Dual band) 2*2
  光碟機： 無
  介面：HDMI、USB 3.2 Gen 2 Type-C support DisplayPort™
  重量：2.10 Kg
  厚度：2.06 ~ 2.59 cm
  作業系統：Windows 11 Home',
  '全新升級 144Hz 薄邊框設計
  超爽視覺享受 RTX 3050 獨顯4G效能
  超屌效能 搭載全新 AMD R7-6800H 處理器
  PCIe® 4.0 / 高速 WI-FI 6
  0分貝風散寂靜模式 / D件 RGB 燈效','laptop'),
(34, 'MSI 微星 Vector GP76 12UGS-458TW 電競筆電', 69800,
  5, 'https://cs-f.ecimg.tw/items/DHAK5TA900EU3Y3/000001_1649231681.jpg',
  '處理器：Intel® Core™ i7-12700H
  記憶體：16GB(8G*2) DDR4-3200
  顯示晶片規格：NVIDIA GeForce RTX 3070 Ti 筆記型電腦GPU 8GB GDDR6
  固態硬碟：1TB NVMe PCIe M.2 SSD
  硬碟：無
  光碟機：無,請另購外接式光碟機
  作業系統：Windows 11
  解析度:FHD
  尺寸:17.3"
  電池供應 : 65 Battery (Whr)
  變壓器 : 280W adapte',
  '搭載最新第12代 Intel® Core™ i7 處理器
  搭載最新NVIDIA GeForce RTX 3070Ti 8GB GDDR6筆記型電腦GPU
  17.3吋Full HD (1920x1080), 360Hz更新率, IPS等級電競面板
  全新Cooler Boost 5全新酷涼散熱系統， 搭配2個風扇與6個散熱導管
  SteelSeries單鍵RGB全彩背光鍵盤
  MSI Center軟體，提供獨家電競模式，全新智慧自動和環境靜音智慧模式，提供最佳使用者體驗
  MSI App Player 軟體，用電競筆電暢玩手遊
  最新Wi-Fi 6E極速無線網路體驗
  支援播放高解析音樂
  Windows 11 Home', 'laptop'),
(35, 'AKG K701 頂級 專業級 開放式監聽耳罩耳機', 7200,
  5, 'https://img.ruten.com.tw/s2/e/51/50/22140467554640_336.jpg',
  '動態開放式\r\n
  最大輸入: 200mW \r\n
  輸入阻抗: 62 ohms\r\n
  靈敏度: 105 dB/V\r\n
  頻率響應: 10 – 39.8KHz\r\n
  重量: 235 g (不2含電纜)\r\n 
  接頭: 6.3 mm 立體聲接頭',
  'AKG K701 開放式耳機延續了以往的古典風格，單元採用白色的鋼琴烤漆搭配白色的鋼絲網罩，亮麗的光澤突顯出K701優雅的氣質，鋼絲網罩和銀色鑲邊的融合，精緻時尚又大氣。\r\n
  AKG，音訊領域最知名的品牌之一，全球四大耳機生產商之一，AKG這三個字母就是專業精神與聲音品質的代表。AKG依靠話筒、耳機和通訊設備生存，良好的銷售業績向世人證明了這一決策的正確性。\r\n
  AKG在專業音訊領域最有名望的產品是專業耳機和話筒。50多年中，AKG設計生產了用途各異的專業耳機達100多種型號，有通訊麥克風、專業監聽耳機、電視用耳機、單聲道耳機、四聲道耳機、紅外無線耳機、影院環繞聲耳機等類型。\r\n
  醒目外觀設計 深紅色的真皮頭帶，與純白色的機身搭配，完美的結合。\r\n 出色的聲音層次表現 在性能方面，獨特的雙振膜設計也是K701的一個亮點，使其在瞬態響應上的失真降至極低，同時能夠在低音和高音這兩個相對較為極端的頻段上有更加寬廣的表現，10Hz-39.8kHz的頻響範圍、93dB的靈敏度，從參數來說，表現還是比較出色的。 音質方面，K701聲音延伸緩慢、自然，聲音的層次感清晰，對于交響音樂等宏大音樂場面的表現較為到位，極具立體感的聲音表現如同置身華美的音樂大廳。'
  , 'earphone');

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
