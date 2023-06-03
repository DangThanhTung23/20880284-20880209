-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2023 at 06:24 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlykhachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

DROP TABLE IF EXISTS `datphong`;
CREATE TABLE IF NOT EXISTS `datphong` (
  `ID` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `tenkhachhang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ngaydatphong` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `diachikhachhang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phongID` int NOT NULL,
  `thanhtoan` decimal(10,0) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `CMND` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `sdt` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `soluongnguoi` int NOT NULL,
  `loaikhachID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `datphong`
--

INSERT INTO `datphong` (`ID`, `tenkhachhang`, `ngaydatphong`, `ngayketthuc`, `diachikhachhang`, `phongID`, `thanhtoan`, `isActive`, `CMND`, `sdt`, `soluongnguoi`, `loaikhachID`) VALUES
('230602-234509', 'A', '2023-05-11', '2023-05-13', '', 0, '1700000', 1, '0000000001', '0909000001', 0, 1),
('230602-233404', 'F', '2023-05-01', '2023-05-05', '', 0, '900000', 1, '0000000006', '0909000006', 0, 2),
('230602-234201', 'E', '2023-05-06', '2023-05-08', '', 0, '900000', 1, '0000000005', '0909000005', 0, 1),
('230602-233709', 'G', '2023-05-06', '2023-05-08', '', 0, '1000000', 1, '0000000007', '0909000007', 0, 2),
('230602-233835', 'H', '2023-05-06', '2023-05-08', '', 0, '700000', 1, '0000000008', '0909000008', 0, 2),
('230602-233941', 'A', '2023-05-06', '2023-05-08', '', 0, '1800000', 1, '0000000001', '0909000001', 0, 1),
('230602-234026', 'B', '2023-05-07', '2023-05-10', '', 0, '600000', 1, '0000000002', '0909000002', 0, 2),
('230602-234115', 'D', '2023-05-06', '2023-05-09', '', 0, '700000', 1, '0000000004', '0909000004', 0, 1),
('230602-232736', 'A', '2023-05-01', '2023-05-04', '', 0, '1000000', 1, '0000000001', '0909000001', 0, 1),
('230602-232827', 'B', '2023-05-01', '2023-05-02', '', 0, '700000', 1, '0000000002', '0909000002', 0, 2),
('230602-232941', 'C', '2023-05-02', '2023-05-04', '', 0, '1800000', 1, '0000000003', '0909000003', 0, 1),
('230602-233103', 'D', '2023-05-03', '2023-05-05', '', 0, '1300000', 1, '0000000004', '0909000004', 0, 1),
('230602-233311', 'E', '2023-05-02', '2023-05-05', '', 0, '1000000', 1, '0000000005', '0909000005', 0, 1),
('230602-234604', 'B', '2023-05-12', '2023-05-15', '', 0, '1000000', 1, '0000000002', '0909000002', 0, 2),
('230602-234648', 'C', '2023-05-11', '2023-05-14', '', 0, '800000', 1, '0000000003', '0909000003', 0, 1),
('230602-234746', 'D', '2023-05-13', '2023-05-15', '', 0, '1300000', 1, '0000000004', '0909000004', 0, 1),
('230602-234839', 'E', '2023-05-12', '2023-05-15', '', 0, '1900000', 1, '0000000005', '0909000005', 0, 1),
('230602-235124', 'A', '2023-05-16', '2023-05-20', '', 0, '500000', 1, '0000000001', '0909000001', 0, 2),
('230602-235220', 'B', '2023-05-17', '2023-05-20', '', 0, '1200000', 1, '0000000002', '0909000002', 0, 1),
('230602-235255', 'C', '2023-05-16', '2023-05-19', '', 0, '1000000', 1, '0000000003', '0909000003', 0, 1),
('230602-235355', 'D', '2023-05-17', '2023-05-19', '11 vũng tàu', 0, '800000', 1, '0000000004', '0909000004', 0, 2),
('230602-235448', 'E', '2023-05-18', '2023-05-20', '', 0, '1600000', 1, '0000000005', '0909000005', 0, 2),
('230602-235552', 'F', '2023-05-16', '2023-05-20', '', 0, '1600000', 1, '0000000006', '0909000006', 0, 1),
('230602-235846', 'A', '2023-05-21', '2023-05-24', '', 0, '500000', 1, '0000000001', '0909000001', 0, 2),
('230602-235928', 'B', '2023-05-21', '2023-05-23', '', 0, '1200000', 1, '0000000002', '0909000002', 0, 1),
('230603-000011', 'C', '2023-05-22', '2023-05-24', '', 0, '1000000', 1, '0000000003', '0909000003', 0, 2),
('230603-000056', 'D', '2023-05-21', '2023-05-23', '', 0, '800000', 1, '0000000004', '0909000004', 0, 2),
('230603-000200', 'E', '2023-05-23', '2023-05-25', '', 0, '1500000', 1, '0000000005', '0909000005', 0, 1),
('230603-000253', 'F', '2023-05-22', '2023-05-25', '', 0, '1700000', 1, '0000000006', '0909000006', 0, 2),
('230603-000523', 'A', '2023-05-26', '2023-05-29', '', 0, '1000000', 1, '0000000001', '0909000001', 0, 1),
('230603-000631', 'B', '2023-05-27', '2023-05-29', '', 0, '1300000', 1, '0000000002', '0909000002', 0, 1),
('230603-000716', 'C', '2023-05-26', '2023-05-28', '', 0, '1800000', 1, '0000000003', '0909000003', 0, 2),
('230603-000821', 'D', '2023-05-27', '2023-05-29', '', 0, '1600000', 1, '0000000004', '0909000004', 0, 2),
('230603-000911', 'F', '2023-05-26', '2023-05-27', '', 0, '1000000', 1, '0000000006', '0909000006', 0, 2),
('230603-001131', 'A', '2023-05-30', '2023-06-02', '', 0, '1000000', 1, '0000000001', '0909000001', 0, 1),
('230603-001300', 'B', '2023-05-30', '2023-05-31', '', 0, '1500000', 1, '0000000002', '0909000002', 0, 1),
('230603-001348', 'C', '2023-05-30', '2023-06-03', '', 0, '700000', 1, '0000000002', '0909000002', 0, 2),
('230603-001501', 'E', '2023-05-30', '2023-06-03', '', 0, '1000000', 1, '0000000005', '0909000005', 0, 2),
('230603-004210', 'G', '2023-05-31', '2023-06-02', '', 0, '1600000', 1, '0000000009', '0909000009', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `ID` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `datphongID` int NOT NULL,
  `loaithanhtoan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tongtienthanhtoan` decimal(10,0) NOT NULL,
  `tenkhachhang` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `tennguoithanhtoan` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `ngaydatphong` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `diachinguoithanhtoan` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `MST` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `stk` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `tongtiensauthue` decimal(10,0) NOT NULL,
  `VAT` double(10,2) NOT NULL,
  `VATthanhtoan` decimal(10,0) NOT NULL,
  `songaythue` int NOT NULL,
  `phuthuloaikhach` double(10,2) NOT NULL,
  `CMND` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`ID`, `datphongID`, `loaithanhtoan`, `tongtienthanhtoan`, `tenkhachhang`, `tennguoithanhtoan`, `ngaydatphong`, `ngayketthuc`, `diachinguoithanhtoan`, `MST`, `stk`, `tongtiensauthue`, `VAT`, `VATthanhtoan`, `songaythue`, `phuthuloaikhach`, `CMND`) VALUES
('hd-230602-234904', 230602, 'Tiền mặt', '4500000', 'B', '', '2023-05-12', '2023-05-15', '', '', '', '4950000', 0.10, '450000', 3, 1.50, '0000000002'),
('hd-230602-234911', 230602, 'Tiền mặt', '2600000', 'D', '', '2023-05-13', '2023-05-15', '', '', '', '2860000', 0.10, '260000', 2, 1.00, '0000000004'),
('hd-230602-234325', 230602, 'Tiền mặt', '4000000', 'A', '', '2023-05-06', '2023-05-08', '', '', '', '4400000', 0.10, '400000', 2, 1.00, '0000000001'),
('hd-230602-234304', 230602, 'Tiền mặt', '3000000', 'G', '', '2023-05-06', '2023-05-08', '', '', '', '3300000', 0.10, '300000', 2, 1.50, '0000000007'),
('hd-230602-234316', 230602, 'Tiền mặt', '2100000', 'H', '', '2023-05-06', '2023-05-08', '', '', '', '2310000', 0.10, '210000', 2, 1.50, '0000000008'),
('hd-230602-233148', 230602, 'Tiền mặt', '2900000', 'D', '', '2023-05-03', '2023-05-05', '', '', '', '3190000', 0.10, '290000', 2, 1.00, '0000000004'),
('hd-230602-233156', 230602, 'Tiền mặt', '3000000', 'A', '', '2023-05-01', '2023-05-04', '', '', '', '3300000', 0.10, '300000', 3, 1.00, '0000000001'),
('hd-230602-233421', 230602, 'Tiền mặt', '5400000', 'F', '', '2023-05-01', '2023-05-05', '', '', '', '5940000', 0.10, '540000', 4, 1.50, '0000000006'),
('hd-230602-233437', 230602, 'Tiền mặt', '3000000', 'E', '', '2023-05-02', '2023-05-05', '', '', '', '3300000', 0.10, '300000', 3, 1.00, '0000000005'),
('hd-230602-233522', 230602, 'Tiền mặt', '3600000', 'C', '', '2023-05-02', '2023-05-04', '', '', '', '3960000', 0.10, '360000', 2, 1.00, '0000000003'),
('hd-230602-233532', 230602, 'Tiền mặt', '1312500', 'B', '', '2023-05-01', '2023-05-02', '', '', '', '1443750', 0.10, '131250', 1, 1.50, '0000000002'),
('hd-230602-234217', 230602, 'Tiền mặt', '2700000', 'B', '', '2023-05-07', '2023-05-10', '', '', '', '2970000', 0.10, '270000', 3, 1.50, '0000000002'),
('hd-230602-234229', 230602, 'Tiền mặt', '2625000', 'D', '', '2023-05-06', '2023-05-09', '', '', '', '2887500', 0.10, '262500', 3, 1.00, '0000000004'),
('hd-230602-234237', 230602, 'Tiền mặt', '2250000', 'E', '', '2023-05-06', '2023-05-08', '', '', '', '2475000', 0.10, '225000', 2, 1.00, '0000000005'),
('hd-230602-234922', 230602, 'Tiền mặt', '5700000', 'E', '', '2023-05-12', '2023-05-15', '', '', '', '6270000', 0.10, '570000', 3, 1.00, '0000000005'),
('hd-230602-234935', 230602, 'Tiền mặt', '3000000', 'C', '', '2023-05-11', '2023-05-14', '', '', '', '3300000', 0.10, '300000', 3, 1.00, '0000000003'),
('hd-230602-235036', 230602, 'Tiền mặt', '3400000', 'A', '', '2023-05-11', '2023-05-13', '', '', '', '3740000', 0.10, '340000', 2, 1.00, '0000000001'),
('hd-230602-235612', 230602, 'Tiền mặt', '3000000', 'A', '', '2023-05-16', '2023-05-20', '', '', '', '3300000', 0.10, '300000', 4, 1.50, '0000000001'),
('hd-230602-235623', 230602, 'Tiền mặt', '4125000', 'B', '', '2023-05-17', '2023-05-20', '', '', '', '4537500', 0.10, '412500', 3, 1.00, '0000000002'),
('hd-230603-002524', 230602, 'Tiền mặt', '4800000', 'E', '', '2023-05-18', '2023-05-20', '', '', '', '5280000', 0.10, '480000', 2, 1.50, '0000000005'),
('hd-230602-235640', 230602, 'Tiền mặt', '7300000', 'F', '', '2023-05-16', '2023-05-20', '', '', '', '8030000', 0.10, '730000', 4, 1.00, '0000000006'),
('hd-230602-235648', 230602, 'Tiền mặt', '3000000', 'C', '', '2023-05-16', '2023-05-19', '', '', '', '3300000', 0.10, '300000', 3, 1.00, '0000000003'),
('hd-230602-235656', 230602, 'Tiền mặt', '3000000', 'D', '', '2023-05-17', '2023-05-19', '', '', '', '3300000', 0.10, '300000', 2, 1.50, '0000000004'),
('hd-230603-000305', 230603, 'Tiền mặt', '3000000', 'E', '', '2023-05-23', '2023-05-25', '', '', '', '3300000', 0.10, '300000', 2, 1.00, '0000000005'),
('hd-230603-000315', 230603, 'Tiền mặt', '7650000', 'F', '', '2023-05-22', '2023-05-25', '', '', '', '8415000', 0.10, '765000', 3, 1.50, '0000000006'),
('hd-230603-000325', 230602, 'Tiền mặt', '2250000', 'A', '', '2023-05-21', '2023-05-24', '', '', '', '2475000', 0.10, '225000', 3, 1.50, '0000000001'),
('hd-230603-000334', 230603, 'Tiền mặt', '3000000', 'C', '', '2023-05-22', '2023-05-24', '', '', '', '3300000', 0.10, '300000', 2, 1.50, '0000000003'),
('hd-230603-000354', 230602, 'Tiền mặt', '2750000', 'B', '', '2023-05-21', '2023-05-23', '', '', '', '3025000', 0.10, '275000', 2, 1.00, '0000000002'),
('hd-230603-000401', 230603, 'Tiền mặt', '3000000', 'D', '', '2023-05-21', '2023-05-23', '', '', '', '3300000', 0.10, '300000', 2, 1.50, '0000000004'),
('hd-230603-000925', 230603, 'Tiền mặt', '4800000', 'D', '', '2023-05-27', '2023-05-29', '', '', '', '5280000', 0.10, '480000', 2, 1.50, '0000000004'),
('hd-230603-000932', 230603, 'Tiền mặt', '2600000', 'B', '', '2023-05-27', '2023-05-29', '', '', '', '2860000', 0.10, '260000', 2, 1.00, '0000000002'),
('hd-230603-000939', 230603, 'Tiền mặt', '3000000', 'A', '', '2023-05-26', '2023-05-29', '', '', '', '3300000', 0.10, '300000', 3, 1.00, '0000000001'),
('hd-230603-000946', 230603, 'Tiền mặt', '6000000', 'C', '', '2023-05-26', '2023-05-28', '', '', '', '6600000', 0.10, '600000', 2, 1.50, '0000000003'),
('hd-230603-000954', 230603, 'Tiền mặt', '1500000', 'F', '', '2023-05-26', '2023-05-27', '', '', '', '1650000', 0.10, '150000', 1, 1.50, '0000000006'),
('hd-230603-001511', 230603, 'Tiền mặt', '6000000', 'E', '', '2023-05-30', '2023-06-03', '', '', '', '6600000', 0.10, '600000', 4, 1.50, '0000000005'),
('hd-230603-001557', 230603, 'Tiền mặt', '4200000', 'C', '', '2023-05-30', '2023-06-03', '', '', '', '4620000', 0.10, '420000', 4, 1.50, '0000000002'),
('hd-230603-001612', 230603, 'Tiền mặt', '3000000', 'A', '', '2023-05-30', '2023-06-02', '', '', '', '3300000', 0.10, '300000', 3, 1.00, '0000000001'),
('hd-230603-001622', 230603, 'Tiền mặt', '1875000', 'B', '', '2023-05-30', '2023-05-31', '', '', '', '2062500', 0.10, '187500', 1, 1.00, '0000000002'),
('hd-230603-004222', 230603, 'Tiền mặt', '6000000', 'G', '', '2023-05-31', '2023-06-02', '', '', '', '6600000', 0.10, '600000', 2, 1.50, '0000000009');

-- --------------------------------------------------------

--
-- Table structure for table `loaikhachhang`
--

DROP TABLE IF EXISTS `loaikhachhang`;
CREATE TABLE IF NOT EXISTS `loaikhachhang` (
  `loaikhachID` int NOT NULL AUTO_INCREMENT,
  `loaikhach` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`loaikhachID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `loaikhachhang`
--

INSERT INTO `loaikhachhang` (`loaikhachID`, `loaikhach`) VALUES
(1, 'khách nội địa'),
(2, 'khách nước ngoài');

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

DROP TABLE IF EXISTS `loaiphong`;
CREATE TABLE IF NOT EXISTS `loaiphong` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `loaiphong` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`ID`, `loaiphong`) VALUES
(1, 'loại A'),
(2, 'loại B'),
(3, 'loại C'),
(5, 'loại D');

-- --------------------------------------------------------

--
-- Table structure for table `loaithanhtoan`
--

DROP TABLE IF EXISTS `loaithanhtoan`;
CREATE TABLE IF NOT EXISTS `loaithanhtoan` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `loaithanhtoan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `loaithanhtoan`
--

INSERT INTO `loaithanhtoan` (`ID`, `loaithanhtoan`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

DROP TABLE IF EXISTS `phong`;
CREATE TABLE IF NOT EXISTS `phong` (
  `phongID` int NOT NULL AUTO_INCREMENT,
  `tenphong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `giaphong` decimal(10,0) NOT NULL,
  `trangthaiID` int NOT NULL,
  `loaiphongID` int NOT NULL,
  `soluongtoida` int NOT NULL,
  `mota` varchar(550) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`phongID`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`phongID`, `tenphong`, `img`, `giaphong`, `trangthaiID`, `loaiphongID`, `soluongtoida`, `mota`) VALUES
(7, 'room 7', 'images/230602-122929pic_8.jpg', '700000', 1, 2, 4, ''),
(6, 'room 6', 'images/230512-112645hotel-demo.jpg', '600000', 1, 5, 4, ''),
(5, 'room 5', 'images/230512-112625Demo-Hotel_In-a-light-wave_Fragment-Hospitality_Progetto_02.jpg', '800000', 1, 5, 4, ''),
(4, 'room 4', 'images/230602-123219pic_4.jpg', '1000000', 1, 5, 5, ''),
(3, 'room 3', 'images/230602-123121pic_7.jpg', '700000', 1, 1, 4, ''),
(1, 'room 1', 'images/230521-161851Demo-Hotel_In-a-light-wave_Fragment-Hospitality_Progetto_02.jpg', '500000', 1, 2, 5, ''),
(8, 'room 8', 'images/230602-123510pic_7.jpg', '1000000', 1, 2, 4, ''),
(9, 'room 9', 'images/230602-123543pic_2.jpg', '900000', 1, 3, 4, ''),
(2, 'room 2', 'images/230602-123148pic_3.jpg', '500000', 1, 2, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `p_dp`
--

DROP TABLE IF EXISTS `p_dp`;
CREATE TABLE IF NOT EXISTS `p_dp` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `phongID` int NOT NULL,
  `datphongID` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `giaphong` decimal(10,0) NOT NULL,
  `soluong` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=231 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `p_dp`
--

INSERT INTO `p_dp` (`ID`, `phongID`, `datphongID`, `giaphong`, `soluong`) VALUES
(183, 5, '230602-233941', '800000', 5),
(174, 5, '230602-232941', '800000', 3),
(175, 6, '230602-233103', '600000', 5),
(176, 7, '230602-233103', '700000', 2),
(177, 8, '230602-233311', '1000000', 2),
(178, 9, '230602-233404', '900000', 1),
(179, 1, '230602-233709', '500000', 2),
(180, 2, '230602-233709', '500000', 3),
(181, 3, '230602-233835', '700000', 2),
(182, 4, '230602-233941', '1000000', 4),
(173, 4, '230602-232941', '1000000', 2),
(170, 1, '230602-232736', '500000', 2),
(171, 2, '230602-232736', '500000', 3),
(172, 3, '230602-232827', '700000', 5),
(187, 1, '230602-234509', '500000', 3),
(184, 6, '230602-234026', '600000', 1),
(185, 7, '230602-234115', '700000', 5),
(186, 9, '230602-234201', '900000', 5),
(188, 2, '230602-234509', '500000', 3),
(189, 3, '230602-234509', '700000', 3),
(190, 4, '230602-234604', '1000000', 2),
(191, 5, '230602-234648', '800000', 5),
(192, 6, '230602-234746', '600000', 2),
(193, 7, '230602-234746', '700000', 2),
(194, 8, '230602-234839', '1000000', 2),
(195, 9, '230602-234839', '900000', 2),
(196, 1, '230602-235124', '500000', 2),
(197, 2, '230602-235220', '500000', 4),
(198, 3, '230602-235220', '700000', 5),
(199, 4, '230602-235255', '1000000', 2),
(200, 5, '230602-235355', '800000', 5),
(201, 6, '230602-235448', '600000', 2),
(202, 8, '230602-235448', '1000000', 3),
(203, 7, '230602-235552', '700000', 2),
(204, 9, '230602-235552', '900000', 9),
(205, 1, '230602-235846', '500000', 2),
(206, 2, '230602-235928', '500000', 4),
(207, 3, '230602-235928', '700000', 5),
(208, 4, '230603-000011', '1000000', 2),
(209, 5, '230603-000056', '800000', 5),
(210, 6, '230603-000200', '600000', 2),
(211, 9, '230603-000200', '900000', 2),
(212, 7, '230603-000253', '700000', 2),
(213, 8, '230603-000253', '1000000', 1),
(214, 1, '230603-000523', '500000', 3),
(215, 2, '230603-000523', '500000', 2),
(216, 3, '230603-000631', '700000', 2),
(217, 6, '230603-000631', '600000', 2),
(218, 4, '230603-000716', '1000000', 3),
(219, 5, '230603-000716', '800000', 5),
(220, 7, '230603-000821', '700000', 2),
(221, 9, '230603-000821', '900000', 2),
(222, 8, '230603-000911', '1000000', 1),
(223, 1, '230603-001131', '500000', 3),
(224, 2, '230603-001131', '500000', 3),
(225, 3, '230603-001300', '700000', 5),
(226, 5, '230603-001300', '800000', 5),
(227, 7, '230603-001348', '700000', 2),
(228, 8, '230603-001501', '1000000', 2),
(229, 4, '230603-004210', '1000000', 6),
(230, 6, '230603-004210', '600000', 6);

-- --------------------------------------------------------

--
-- Table structure for table `p_hd`
--

DROP TABLE IF EXISTS `p_hd`;
CREATE TABLE IF NOT EXISTS `p_hd` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `hoadonID` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `tenphong` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `loaiphong` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `giaphong` decimal(10,0) NOT NULL,
  `soluongkhach` int NOT NULL,
  `phuthusoluong` double(10,2) NOT NULL,
  `thanhtien` int NOT NULL,
  `songaythue` int NOT NULL,
  `phongID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `p_hd`
--

INSERT INTO `p_hd` (`ID`, `hoadonID`, `tenphong`, `loaiphong`, `giaphong`, `soluongkhach`, `phuthusoluong`, `thanhtien`, `songaythue`, `phongID`) VALUES
(107, 'hd-230602-234911', 'room 7', 'loại B', '700000', 2, 1.00, 1400000, 2, 7),
(106, 'hd-230602-234911', 'room 6', 'loại D', '600000', 2, 1.00, 1200000, 2, 6),
(105, 'hd-230602-234904', 'room 4', 'loại D', '1000000', 2, 1.00, 3000000, 3, 4),
(104, 'hd-230602-234325', 'room 4', 'loại D', '1000000', 4, 1.00, 2000000, 2, 4),
(103, 'hd-230602-234325', 'room 5', 'loại D', '800000', 5, 1.25, 2000000, 2, 5),
(87, 'hd-230602-233148', 'room 6', 'loại D', '600000', 5, 1.25, 1500000, 2, 6),
(88, 'hd-230602-233148', 'room 7', 'loại B', '700000', 2, 1.00, 1400000, 2, 7),
(89, 'hd-230602-233156', 'room 1', 'loại B', '500000', 2, 1.00, 1500000, 3, 1),
(90, 'hd-230602-233156', 'room 2', 'loại B', '500000', 3, 1.00, 1500000, 3, 2),
(91, 'hd-230602-233421', 'room 9', 'loại C', '900000', 1, 1.00, 3600000, 4, 9),
(92, 'hd-230602-233437', 'room 8', 'loại B', '1000000', 2, 1.00, 3000000, 3, 8),
(94, 'hd-230602-233522', 'room 5', 'loại D', '800000', 3, 1.00, 1600000, 2, 5),
(95, 'hd-230602-233522', 'room 4', 'loại D', '1000000', 2, 1.00, 2000000, 2, 4),
(96, 'hd-230602-233532', 'room 3', 'loại A', '700000', 5, 1.25, 875000, 1, 3),
(97, 'hd-230602-234217', 'room 6', 'loại D', '600000', 1, 1.00, 1800000, 3, 6),
(98, 'hd-230602-234229', 'room 7', 'loại B', '700000', 5, 1.25, 2625000, 3, 7),
(99, 'hd-230602-234237', 'room 9', 'loại C', '900000', 5, 1.25, 2250000, 2, 9),
(100, 'hd-230602-234304', 'room 1', 'loại B', '500000', 2, 1.00, 1000000, 2, 1),
(101, 'hd-230602-234304', 'room 2', 'loại B', '500000', 3, 1.00, 1000000, 2, 2),
(102, 'hd-230602-234316', 'room 3', 'loại A', '700000', 2, 1.00, 1400000, 2, 3),
(108, 'hd-230602-234922', 'room 8', 'loại B', '1000000', 2, 1.00, 3000000, 3, 8),
(109, 'hd-230602-234922', 'room 9', 'loại C', '900000', 2, 1.00, 2700000, 3, 9),
(110, 'hd-230602-234935', 'room 5', 'loại D', '800000', 5, 1.25, 3000000, 3, 5),
(111, 'hd-230602-235036', 'room 1', 'loại B', '500000', 3, 1.00, 1000000, 2, 1),
(112, 'hd-230602-235036', 'room 2', 'loại B', '500000', 3, 1.00, 1000000, 2, 2),
(113, 'hd-230602-235036', 'room 3', 'loại A', '700000', 3, 1.00, 1400000, 2, 3),
(114, 'hd-230602-235612', 'room 1', 'loại B', '500000', 2, 1.00, 2000000, 4, 1),
(115, 'hd-230602-235623', 'room 2', 'loại B', '500000', 4, 1.00, 1500000, 3, 2),
(116, 'hd-230602-235623', 'room 3', 'loại A', '700000', 5, 1.25, 2625000, 3, 3),
(148, 'hd-230603-002524', 'room 8', 'loại B', '1000000', 3, 1.00, 2000000, 2, 8),
(147, 'hd-230603-002524', 'room 6', 'loại D', '600000', 2, 1.00, 1200000, 2, 6),
(119, 'hd-230602-235640', 'room 7', 'loại B', '700000', 2, 1.00, 2800000, 4, 7),
(120, 'hd-230602-235640', 'room 9', 'loại C', '900000', 9, 1.25, 4500000, 4, 9),
(121, 'hd-230602-235648', 'room 4', 'loại D', '1000000', 2, 1.00, 3000000, 3, 4),
(122, 'hd-230602-235656', 'room 5', 'loại D', '800000', 5, 1.25, 2000000, 2, 5),
(123, 'hd-230603-000305', 'room 6', 'loại D', '600000', 2, 1.00, 1200000, 2, 6),
(124, 'hd-230603-000305', 'room 9', 'loại C', '900000', 2, 1.00, 1800000, 2, 9),
(125, 'hd-230603-000315', 'room 7', 'loại B', '700000', 2, 1.00, 2100000, 3, 7),
(126, 'hd-230603-000315', 'room 8', 'loại B', '1000000', 1, 1.00, 3000000, 3, 8),
(127, 'hd-230603-000325', 'room 1', 'loại B', '500000', 2, 1.00, 1500000, 3, 1),
(128, 'hd-230603-000334', 'room 4', 'loại D', '1000000', 2, 1.00, 2000000, 2, 4),
(129, 'hd-230603-000354', 'room 2', 'loại B', '500000', 4, 1.00, 1000000, 2, 2),
(130, 'hd-230603-000354', 'room 3', 'loại A', '700000', 5, 1.25, 1750000, 2, 3),
(131, 'hd-230603-000401', 'room 5', 'loại D', '800000', 5, 1.25, 2000000, 2, 5),
(132, 'hd-230603-000925', 'room 7', 'loại B', '700000', 2, 1.00, 1400000, 2, 7),
(133, 'hd-230603-000925', 'room 9', 'loại C', '900000', 2, 1.00, 1800000, 2, 9),
(134, 'hd-230603-000932', 'room 3', 'loại A', '700000', 2, 1.00, 1400000, 2, 3),
(135, 'hd-230603-000932', 'room 6', 'loại D', '600000', 2, 1.00, 1200000, 2, 6),
(136, 'hd-230603-000939', 'room 1', 'loại B', '500000', 3, 1.00, 1500000, 3, 1),
(137, 'hd-230603-000939', 'room 2', 'loại B', '500000', 2, 1.00, 1500000, 3, 2),
(138, 'hd-230603-000946', 'room 4', 'loại D', '1000000', 3, 1.00, 2000000, 2, 4),
(139, 'hd-230603-000946', 'room 5', 'loại D', '800000', 5, 1.25, 2000000, 2, 5),
(140, 'hd-230603-000954', 'room 8', 'loại B', '1000000', 1, 1.00, 1000000, 1, 8),
(141, 'hd-230603-001511', 'room 8', 'loại B', '1000000', 2, 1.00, 4000000, 4, 8),
(142, 'hd-230603-001557', 'room 7', 'loại B', '700000', 2, 1.00, 2800000, 4, 7),
(143, 'hd-230603-001612', 'room 1', 'loại B', '500000', 3, 1.00, 1500000, 3, 1),
(144, 'hd-230603-001612', 'room 2', 'loại B', '500000', 3, 1.00, 1500000, 3, 2),
(145, 'hd-230603-001622', 'room 3', 'loại A', '700000', 5, 1.25, 875000, 1, 3),
(146, 'hd-230603-001622', 'room 5', 'loại D', '800000', 5, 1.25, 1000000, 1, 5),
(149, 'hd-230603-004222', 'room 4', 'loại D', '1000000', 6, 1.25, 2500000, 2, 4),
(150, 'hd-230603-004222', 'room 6', 'loại D', '600000', 6, 1.25, 1500000, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `thamso`
--

DROP TABLE IF EXISTS `thamso`;
CREATE TABLE IF NOT EXISTS `thamso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `thamso` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `giatri` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `thamso`
--

INSERT INTO `thamso` (`id`, `thamso`, `giatri`) VALUES
(1, 'Phụ thu số lượng', 1.25),
(2, 'Phụ thu khách nươc ngoài', 1.50),
(3, 'VAT', 0.10);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

DROP TABLE IF EXISTS `trangthai`;
CREATE TABLE IF NOT EXISTS `trangthai` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `trangthai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`ID`, `trangthai`) VALUES
(1, 'trống'),
(2, 'đang cho thuê'),
(3, 'đang sửa chữa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `sdt` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `ten`, `diachi`, `email`, `user`, `pass`, `role`, `sdt`) VALUES
(1, 'dangtung', '', 'dangthanhtung2306@gmail.com', 'admin', 'admin', 1, '0357175627'),
(3, 'chí công', '', 'Ngchicongvt@gmail.com', 'user1', '1234', 2, '0909777777'),
(12, 'Minh Quang', '', 'user2$gmail.com', 'user2', '123', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
