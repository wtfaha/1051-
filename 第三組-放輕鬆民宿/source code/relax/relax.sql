-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-01-02 09:37:52
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `relax`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `customerID` int(10) NOT NULL,
  `customerName` varchar(10) NOT NULL,
  `cellphone` varchar(15) NOT NULL,
  `accountNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `customercomment`
--

CREATE TABLE `customercomment` (
  `customerName` varchar(30) NOT NULL,
  `score` int(3) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `commentTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `login`
--

INSERT INTO `login` (`username`, `password`, `status`) VALUES
('relax', 'relax', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `roomorder`
--

CREATE TABLE `roomorder` (
  `orderID` int(10) NOT NULL,
  `bigAmount` int(2) NOT NULL,
  `smallAmount` int(2) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `customerID` int(10) NOT NULL,
  `customerNumber` int(2) NOT NULL,
  `payDeposit` varchar(5) NOT NULL,
  `payBalance` varchar(5) NOT NULL,
  `totalPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- 資料表索引 `customercomment`
--
ALTER TABLE `customercomment`
  ADD PRIMARY KEY (`customerName`,`commentTime`);

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `roomorder`
--
ALTER TABLE `roomorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `roomorder`
--
ALTER TABLE `roomorder`
  ADD CONSTRAINT `roomorder_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
