-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 05:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangnhap`
--

CREATE TABLE `dangnhap` (
  `id` int(11) NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dangnhap`
--

INSERT INTO `dangnhap` (`id`, `account`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `diemthi`
--

CREATE TABLE `diemthi` (
  `diemthiID` int(11) NOT NULL,
  `sinhvienID` int(11) NOT NULL,
  `ltud` float NOT NULL,
  `ltvm` float NOT NULL,
  `htvt` int(11) NOT NULL,
  `htcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diemthi`
--

INSERT INTO `diemthi` (`diemthiID`, `sinhvienID`, `ltud`, `ltvm`, `htvt`, `htcm`) VALUES
(1, 6, 8, 8.5, 8, 8),
(2, 2, 10, 9, 8, 5),
(3, 12, 8, 7, 8, 7),
(4, 11, 9, 8, 8, 8),
(5, 13, 8, 8, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `idGiangvien` int(11) NOT NULL,
  `masoGV` text NOT NULL,
  `hoten` text NOT NULL,
  `trinhdo` text NOT NULL,
  `chuyenmon` text NOT NULL,
  `email` text NOT NULL,
  `sdt` text NOT NULL,
  `link_avt_GV` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`idGiangvien`, `masoGV`, `hoten`, `trinhdo`, `chuyenmon`, `email`, `sdt`, `link_avt_GV`) VALUES
(1, 'GV001', 'Somebody to love', 'Th.s', 'Lập trinh', 'phamhuy@gmail.com', '12345678', 'thayhuy.jpg'),
(2, 'GV002', 'Lê Thị Hường', 'Thạc sỹ ', 'Mạng máy tính ', 'lecuc@gmail.com', '0658585858', 'cocuc.jpg'),
(3, 'GV003', 'Nguyễn Thu Hạnh', 'unknown ', 'Chủ nhiệm', 'thuthuy@mail.vn', '025454987', 'cothuy.jpg'),
(4, 'GV004', 'Nguyễn Biêu Gate', 'Dr. ', 'Computer Science ', 'billgate@dollar.com', '03548787878', 'billgates.jpg'),
(5, 'GV005', 'Đào Ngọc Pháp', 'Tiến sỹ ', 'Gender Education', 'ema@hou.edu.vn', '0145745869', 'emma.jpg'),
(6, 'GV006', 'Nguyễn Văn Thuật', 'Dr. ', 'Ngôn ngữ', 'harry@potter.com', '0909900009', 'harry.jpg'),
(7, 'GV007', 'Vũ Song Đao', 'Thạc sỹ ', 'Life & Love', 'email@email.com', '09595959', ''),
(9, 'GV008', 'Nguyễn Văn Triết', 'Dr.', 'Mac - Lenin', 'kudo@gmail.com', '254875557', 'kudo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `lopID` int(11) NOT NULL,
  `tenlop` text NOT NULL,
  `chunhiem` text NOT NULL,
  `phonghoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`lopID`, `tenlop`, `chunhiem`, `phonghoc`) VALUES
(9, 'K17-A', 'Phạm Thị Lê Huyền', 'P.101'),
(10, 'K19-A', 'Nguyễn Thu Thủy ', 'P.203'),
(11, 'K20-A', 'Nguyễn Thu Thủy', 'P.103'),
(12, 'K16-A', 'Phạm Thị Lê Huyền', 'P.301');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `sinhvienID` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `lopID` int(11) NOT NULL,
  `name` text NOT NULL,
  `birthday` date NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `address` text NOT NULL,
  `avt` text NOT NULL,
  `so_truong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sinhvienID`, `MaSV`, `lopID`, `name`, `birthday`, `phonenumber`, `address`, `avt`, `so_truong`) VALUES
(2, 5, 10, 'Trịnh Thu Thảo', '1998-10-30', 168656788, 'Thanh Hóa', '', 'football'),
(6, 1, 10, 'Nguyễn Anh Huy', '1998-09-19', 1684659555, 'Đà Nẵng', '', 'cry cry'),
(11, 0, 10, 'Đào Ngọc Ngà', '2000-05-12', 95858798, 'Thanh Hóa', '', 'nice nice'),
(12, 0, 10, 'Nguyễn Chí Phèo', '1998-10-30', 38469555, 'Làng Vũ Đại', '', 'drink drink'),
(13, 0, 11, 'Nguyễn Lương Thiện', '1998-09-27', 3922300, 'Nam Định', '', 'smile smile'),
(14, 0, 8, 'Nguyễn Sơn Tường ', '2000-10-20', 35484785, 'Thanh Hóa', '', 'paint paint');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diemthi`
--
ALTER TABLE `diemthi`
  ADD PRIMARY KEY (`diemthiID`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`idGiangvien`),
  ADD KEY `idGiangvien` (`idGiangvien`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`lopID`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`sinhvienID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
