-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 May 2018, 01:50:58
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ctis256`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `cusid` int(11) NOT NULL,
  `cususername` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `password` char(80) COLLATE utf8_turkish_ci NOT NULL,
  `cusname` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `cussurname` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `cargo_address` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`cusid`, `cususername`, `password`, `cusname`, `cussurname`, `email`, `cargo_address`) VALUES
(2, 'aaa', '111', 'bbb', 'ccc', 'ddd', 'eee'),
(4, 'asdsa', '123', 'vre', 'bver', 'breb', 'brebre'),
(5, 'hrthrt', 'aaa', 'ff', 'fg', 'gregre', 'gre'),
(28, '1a1a1', 'aaaa', 'vgrebre', 'gregre', 'fff', 'btrbrt'),
(29, 'root', 'gggg', 'grtesgre', 'hrehres', 'ffff', 'hrt6hrthrt'),
(30, 'aaa', '111', 'grtg', 'hreshse', 'hrehrehre', 'hrehreher'),
(31, 'admin', 'admin', 'admin', 'admin', 'admin@ctis.com', 'admins cargo'),
(32, 'testuser', 'test', 'a1a1a1', 's2s2s2s2', 'd3d3d3d3', 'f4f4f4f4f4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(15) NOT NULL,
  `amount` int(10) NOT NULL,
  `orderdate` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `proid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `imagepath` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `category` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `brand` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `price` int(10) NOT NULL,
  `properties` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `comments` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rating` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `imagepath`, `category`, `brand`, `title`, `price`, `properties`, `comments`, `rating`) VALUES
(500, 'd756dhL', 'handwrap', 'twins', 'Good quality handwra', 20, '2.5 meter', 'Authentic Muay Thai protection gear from Thailand', 6),
(501, '14af533d', 'Gloves', 'Everlast', 'UFC Fighting Gloves ', 210, NULL, 'at Hampden-Sydney College in Virginia', 7),
(502, '14d65fv3d', 'Gloves', 'Everlast', 'Training gloves 100%', 360, 'Mauris ', 'perdiet lorem. Vestibulum lacus elit, congue eget ', 4),
(503, '319GbqtDpHL', 'Heavybag', 'TKO', 'Designed for champio', 1300, NULL, ' semper nisi mi, eu tincidunt lectus finibus eu. S', 6),
(504, 'd8f76uoyfy', 'Shorts', 'Dragon', 'You want the best kick? Heres the deal!', 60, NULL, NULL, 8),
(505, 'windg87jh', 'Shorts', 'Windy', 'Golden kickboxing shorts. Hurry Up!', 80, NULL, ' semper nisi mi, eu tincidunt lectus finibus eu. S', 5),
(506, NULL, 'greg', 'gergre', 'gre', 0, 'gre', 'gre', 0),
(507, NULL, 'gloves', 'everlast', 'test', 100, 'frewfrew', 'rgfegreg', 5),
(508, NULL, 'aaaaaa', 'bbbbbb', 'ccccccc', 111111, '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `promotedproducts`
--

CREATE TABLE `promotedproducts` (
  `product_id` int(20) NOT NULL,
  `imagepath` varchar(50) COLLATE utf8_turkish_ci DEFAULT 'bilkent',
  `category` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `brand` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `promotedproducts`
--

INSERT INTO `promotedproducts` (`product_id`, `imagepath`, `category`, `brand`, `title`, `price`) VALUES
(848, 'adidashelmet', 'Helmet', 'Adidas', 'Protects from head damages. Good quality', 190),
(849, 'optimumwhey', 'Nutrition', 'Optimum', 'Whey Protein 100%', 230),
(850, '86796572', 'Gloves', 'Dragon', 'Professional leather gloves for kickboxing', 345),
(851, 'speedbagc43', 'Bags', 'Excalibur', 'Speedbag for boxers', 2100),
(889, 'muhammedalishirt', 'Shirts', 'Lescon', 'Muhammed Ali Boxing Shirt', 50),
(890, 'legprotector', 'Leg Protector', 'TKX', 'Kickboxing and Muay Thai Leg Protection Good Quali', 290),
(891, 'teethprotector', 'Teeth Protector', 'Dragon', 'Only 27 left!!! Buy one and protect your teeth', 20),
(892, 'punchbob', 'Bags', 'Everlast', 'Punching Bob for simulating real fight!', 399),
(893, 'damagepillow', 'Leg Protector', 'Excalibur', 'Traing your legs with this pillow!', 75),
(894, 'legrocket', 'Racket', 'Avessa', 'Best product for highkicks!', 40),
(895, 'pullupbar', 'Bar', 'Sportive', 'Strengthen your back with pullups!', 80),
(896, 'ufcgloves', 'Gloves', 'Dragon', 'Preparing for UFC? Get one of these!', 179),
(903, 'bilkent', 'gfeawf', 'feawf', 'gfewa', 211);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `unq` (`order_id`),
  ADD KEY `promotedid_forkey` (`proid`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `promotedproducts`
--
ALTER TABLE `promotedproducts`
  ADD PRIMARY KEY (`product_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `cusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- Tablo için AUTO_INCREMENT değeri `promotedproducts`
--
ALTER TABLE `promotedproducts`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=904;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `proid_forkey` FOREIGN KEY (`proid`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `promotedid_forkey` FOREIGN KEY (`proid`) REFERENCES `promotedproducts` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
