-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 08:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `benhlydikem`
--

CREATE TABLE `benhlydikem` (
  `MaBN` int(6) NOT NULL,
  `benhlydikem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benhlydikem`
--

INSERT INTO `benhlydikem` (`MaBN`, `benhlydikem`) VALUES
(1, 'Tiểu đường'),
(2, 'tiểu đường'),
(3, 'huyết áp cao'),
(4, 'không có'),
(5, 'không có'),
(6, 'tiểu đường'),
(7, 'huyết áp'),
(8, 'không có'),
(9, 'tiểu đường'),
(10, 'tiểu đường');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `MaBN` int(6) NOT NULL,
  `HoTen` varchar(50) DEFAULT NULL,
  `SoCMND` char(12) NOT NULL,
  `SDT` char(10) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Gioitinh` char(1) DEFAULT NULL,
  `chuyendentu` varchar(255) DEFAULT NULL,
  `thongtinxnbandau` varchar(255) DEFAULT NULL,
  `Ma_Staff` int(6) DEFAULT NULL,
  `Ngay_nhap_vien` datetime DEFAULT NULL,
  `Ngay_xuat_vien` datetime DEFAULT NULL,
  `Ma_Nurse` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`MaBN`, `HoTen`, `SoCMND`, `SDT`, `DiaChi`, `Gioitinh`, `chuyendentu`, `thongtinxnbandau`, `Ma_Staff`, `Ngay_nhap_vien`, `Ngay_xuat_vien`, `Ma_Nurse`) VALUES
(1, 'Cao Bá Quát', '080203000476', '0908183771', 'Nhà Bè', '1', 'Sân bay Tân Sơn Nhất', 'dương tính', 1, '2023-12-06 13:56:00', '0000-00-00 00:00:00', 6),
(2, 'Trần Quốc Toản', '080203000111', '0124578963', 'Trái Cam', '1', 'Khu cách ly a', 'duong tinh', 1, '2023-12-14 14:00:00', '0000-00-00 00:00:00', 6),
(3, 'Trần Hưng Đạo', '080203000222', '0325698741', 'Long An', '1', 'Khu cách ly B', 'duong tinh', 4, '2023-12-14 14:02:00', '0000-00-00 00:00:00', 9),
(4, 'Thánh Gióng', '080203000333', '0547812369', 'Trái dừa', '1', 'khu cách ly a', 'duong tinh', 3, '2023-12-04 14:03:00', '0000-00-00 00:00:00', 8),
(5, 'Dora Doraemon', '080203000444', '0658932147', 'Nhật Bổn', '1', 'khu cách ly b', 'duong tinh', 2, '2023-12-03 14:04:00', '0000-00-00 00:00:00', 10),
(6, 'Sizuka', '080203000555', '0457896321', 'Nhật Bổn', '2', 'Khu cách ly b', 'duong tinh', 1, '2023-12-03 14:05:00', '0000-00-00 00:00:00', 6),
(7, 'Chaien', '080203000666', '0214569873', 'Nhật Bổn', '1', 'khu cách ly a', 'duong tinh', 5, '2023-12-01 14:07:00', '0000-00-00 00:00:00', 6),
(8, 'Nobi Nobita', '080203000777', '0852369147', 'Thời kì đồ đá', '1', 'khu cách ly b', 'duong tinh', 4, '2023-12-02 14:08:00', '0000-00-00 00:00:00', 8),
(9, 'ChaiKo', '080203000999', '0879456321', 'Vĩnh Long', '1', 'khu cách ly b', 'duong tinh', 1, '2023-12-02 14:09:00', '0000-00-00 00:00:00', 6),
(10, 'ChaiKo', '080203000898', '0879456321', 'Vĩnh Long', '1', 'khu cách ly b', 'duong tinh', 1, '2023-12-03 14:10:00', '0000-00-00 00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `dieutri`
--

CREATE TABLE `dieutri` (
  `Ma_DT` int(6) NOT NULL,
  `MaBN` int(6) NOT NULL,
  `Ma_Doctors` int(6) NOT NULL,
  `MaThuoc` int(6) NOT NULL,
  `ketqua` varchar(50) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Ma_Doctors` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Ma_Doctors`) VALUES
(16),
(17),
(18),
(19),
(20),
(27);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Ma_Manager` int(6) NOT NULL,
  `Ma_Doctors` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Ma_Manager`, `Ma_Doctors`) VALUES
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(6) NOT NULL,
  `Ngaybatdaulamviec` datetime DEFAULT NULL,
  `HoTen` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Gioitinh` char(1) DEFAULT NULL,
  `SDT` char(10) DEFAULT NULL,
  `ChucVu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Ngaybatdaulamviec`, `HoTen`, `DiaChi`, `Gioitinh`, `SDT`, `ChucVu`) VALUES
(1, '2023-12-11 10:00:00', 'Nguyễn Văn Kiên', '123 Nguyễn Văn Linh, Ho Chi Minh City', 'M', '0987654321', 'Staff'),
(2, '2023-12-12 12:00:00', 'Trần Thị Linh', '456 Lê Văn Luong, Ho Chi Minh City', 'F', '0123456789', 'Staff'),
(3, '2023-12-13 14:00:00', 'Lê Văn Minh', '789 Nguyễn Dinh Chieu, Ho Chi Minh City', 'M', '0901234567', 'Staff'),
(4, '2023-12-14 16:00:00', 'Phạm Thị Như', '1011 Nguyễn Hue, Ho Chi Minh City', 'F', '0876543210', 'Staff'),
(5, '2023-12-15 18:00:00', 'Huỳnh Văn Tuấn', '1213 Nguyễn Thong, Ho Chi Minh City', 'M', '0789012345', 'Staff'),
(6, '2023-12-06 10:00:00', 'Nguyễn Thị Phước', '123 Nguyễn Văn Linh, Ho Chi Minh City', 'M', '0987654321', 'Nurse'),
(7, '2023-12-07 12:00:00', 'Trần Văn Hải', '456 Lê Văn Luong, Ho Chi Minh City', 'F', '0123456789', 'Nurse'),
(8, '2023-12-08 14:00:00', 'Lê Thị Hòa', '789 Nguyễn Dinh Chieu, Ho Chi Minh City', 'M', '0901234567', 'Nurse'),
(9, '2023-12-09 16:00:00', 'Phạm Văn Yên', '1011 Nguyễn Hue, Ho Chi Minh City', 'F', '0876543210', 'Nurse'),
(10, '2023-12-10 18:00:00', 'Huỳnh Thị Linh', '1213 Nguyễn Thong, Ho Chi Minh City', 'M', '0789012345', 'Nurse'),
(11, '2023-12-01 10:00:00', 'Nguyễn Văn Anh', '123 Nguyễn Văn Linh, Ho Chi Minh City', 'M', '0987654321', 'Manager'),
(12, '2023-12-02 12:00:00', 'Trần Thị Bình', '456 Lê Văn Luong, Ho Chi Minh City', 'F', '0123456789', 'Manager'),
(13, '2023-12-03 14:00:00', 'Lê Văn Chương', '789 Nguyễn Dinh Chieu, Ho Chi Minh City', 'M', '0901234567', 'Manager'),
(14, '2023-12-04 16:00:00', 'Phạm Thị Diện', '1011 Nguyễn Hue, Ho Chi Minh City', 'F', '0876543210', 'Manager'),
(15, '2023-12-01 21:27:40', 'Do Phuc Thuan', 'Viet Nam', 'M', '0918839272', 'Manager'),
(16, '2023-12-10 18:00:00', 'Phạm Đình Thịnh', '123 Nguyễn Văn Linh, Ho Chi Minh City', 'M', '0987654321', 'Doctor'),
(17, '2023-12-06 18:00:00', 'Ngô Diệc Phàm', '456 Lê Văn Luong, Ho Chi Minh City', 'F', '0123456789', 'Doctor'),
(18, '2023-12-07 18:00:00', 'Hoàng Văn Ơn', '789 Nguyễn Dinh Chieu, Ho Chi Minh City', 'M', '0901234567', 'Doctor'),
(19, '2023-12-08 18:00:00', 'Nguyễn Tiến Đạt', '1011 Nguyễn Hue, Ho Chi Minh City', 'F', '0876543210', 'Doctor'),
(20, '2023-12-09 18:00:00', 'Trần Thị Yến Lê', '1213 Nguyễn Thong, Ho Chi Minh City', 'M', '0789012345', 'Doctor'),
(21, '2023-01-27 18:00:00', 'Lương Bằng', '123 Nguyễn Văn Linh, Ho Chi Minh City', 'M', '0987654321', 'Volunteer'),
(22, '2023-12-11 18:00:00', 'Trần Hoàng Thanh Yến', '456 Lê Văn Luong, Ho Chi Minh City', 'F', '0123456789', 'Volunteer'),
(23, '2023-12-12 18:00:00', 'Võ Khắc Toản', '789 Nguyễn Dinh Chieu, Ho Chi Minh City', 'M', '0901234567', 'Volunteer'),
(24, '2023-12-13 18:00:00', 'Nguyền Trần Hoàng Xuân', '1011 Nguyễn Hue, Ho Chi Minh City', 'F', '0876543210', 'Volunteer'),
(25, '2023-12-14 18:00:00', 'Hồ Văn Cường', '1213 Nguyễn Thong, Ho Chi Minh City', 'M', '0789012345', 'Volunteer'),
(26, '2023-12-15 18:00:00', 'Lê Trung Minh', '1213 Nguyễn Thong, Ho Chi Minh City', 'M', '0789012345', 'Volunteer'),
(27, '2023-12-06 13:59:00', 'Trần Quốc Toản', 'Trái Cam', '1', '0123456789', 'Bác Sĩ');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `Ma_Nurse` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`Ma_Nurse`) VALUES
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` int(6) NOT NULL,
  `tang` int(2) DEFAULT NULL,
  `loaiphong` varchar(10) DEFAULT NULL,
  `toanha` varchar(3) DEFAULT NULL,
  `succhua` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `tang`, `loaiphong`, `toanha`, `succhua`) VALUES
(1, 1, 'PT', 'A', 6),
(2, 1, 'PT', 'A', 11),
(3, 1, 'CC', 'A', 7),
(4, 1, 'CC', 'A', 7),
(5, 2, 'PT', 'A', 12),
(6, 2, 'HS', 'A', 5),
(7, 2, 'HS', 'A', 5),
(8, 3, 'CC', 'A', 7),
(9, 3, 'PT', 'A', 12),
(10, 3, 'PT', 'B', 12),
(11, 1, 'CC', 'B', 7),
(12, 1, 'CC', 'B', 7),
(13, 1, 'CC', 'B', 7),
(14, 1, 'HS', 'B', 5),
(15, 1, 'HS', 'B', 5),
(16, 2, 'PT', 'B', 10),
(17, 2, 'PT', 'B', 12),
(18, 3, 'PT', 'B', 11),
(19, 3, 'PT', 'B', 12),
(20, 3, 'PT', 'B', 12);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Ma_Staff` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Ma_Staff`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `staff_phanvao_phong`
--

CREATE TABLE `staff_phanvao_phong` (
  `MaPhong` int(6) NOT NULL,
  `Ma_Staff` int(6) NOT NULL,
  `MaBN` int(6) NOT NULL,
  `Tinh_trang_hien_tai` varchar(50) DEFAULT NULL,
  `vitri_BN` varchar(50) DEFAULT NULL,
  `dateChange` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_phanvao_phong`
--

INSERT INTO `staff_phanvao_phong` (`MaPhong`, `Ma_Staff`, `MaBN`, `Tinh_trang_hien_tai`, `vitri_BN`, `dateChange`) VALUES
(1, 1, 1, 'Đang theo dõi', '1', '2023-12-06 13:56:47'),
(1, 1, 2, 'Đang theo dõi', '1', '2023-12-06 14:01:14'),
(1, 1, 6, 'Đang theo dõi', '1', '2023-12-06 14:05:57'),
(1, 1, 9, 'Đang theo dõi', '1', '2023-12-06 14:09:47'),
(1, 1, 10, 'Đang theo dõi', '1', '2023-12-06 14:10:20'),
(1, 3, 4, 'Đang theo dõi', '1', '2023-12-06 14:03:43'),
(1, 5, 7, 'Đang theo dõi', '1', '2023-12-06 14:07:39'),
(2, 1, 1, '', '2', '2023-12-06 13:57:43'),
(16, 2, 5, 'Đang theo dõi', '16', '2023-12-06 14:05:06'),
(16, 4, 3, 'Đang theo dõi', '16', '2023-12-06 14:02:41'),
(18, 4, 8, 'Đang theo dõi', '18', '2023-12-06 14:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `MaThuoc` int(6) NOT NULL,
  `TenThuoc` varchar(100) DEFAULT NULL,
  `TacDung` varchar(100) DEFAULT NULL,
  `Gia` int(6) DEFAULT NULL,
  `HSD` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`MaThuoc`, `TenThuoc`, `TacDung`, `Gia`, `HSD`) VALUES
(1, 'Molnupiravir', 'Ức chế quá trình sao chép của virus SARS-CoV-2', 1500, '2024-12-31 00:00:00'),
(2, 'Paxlovid', 'Ức chế quá trình sao chép của virus SARS-CoV-2', 2000, '2025-01-01 00:00:00'),
(3, 'Ritonavir', 'Ức chế enzyme protease của virus SARS-CoV-2', 500, '2025-02-01 00:00:00'),
(4, 'Verocell', 'Ức chế SARS-CoV-2', 100, '2024-02-01 00:00:00'),
(5, 'Baricitinib', 'Ức chế enzyme JAK1 và JAK2, giúp giảm viêm', 1000, '2025-03-01 00:00:00'),
(6, 'Tocilizumab', 'Ức chế enzyme IL-6, giúp giảm viêm', 2000, '2025-04-01 00:00:00'),
(7, 'Dexamethason', 'Thuốc chống viêm corticosteroid', 500, '2025-05-01 00:00:00'),
(8, 'Methylprednisolon', 'Thuốc chống viêm corticosteroid', 1000, '2025-06-01 00:00:00'),
(9, 'Prednisolon', 'Thuốc chống viêm corticosteroid', 1500, '2025-07-01 00:00:00'),
(10, 'Oxygen', 'Giúp cung cấp oxy cho cơ thể', 100, '2025-08-01 00:00:00'),
(11, 'Paracetamol', 'Hạ sốt, giảm đau', 12, '2024-12-31 00:00:00'),
(12, 'Bamlanivimab/etesevimab', 'Trung hòa virus SARS-CoV-2', 1000, '2032-12-31 00:00:00'),
(13, 'Ibuprofen', 'Giảm đau, hạ sốt, chống viêm', 20, '2025-12-31 00:00:00'),
(14, 'Aspirin', 'Giảm đau, hạ sốt, chống viêm, chống đông máu', 30, '2026-12-31 00:00:00'),
(15, 'Dexamethason', 'Chống viêm, chống dị ứng', 50, '2027-12-31 00:00:00'),
(16, 'Molnupiravir', 'Ngăn chặn sự nhân lên của virus SARS-CoV-2', 100, '2028-12-31 00:00:00'),
(17, 'Nirmatrelvir/ritonavir', 'Ngăn chặn sự nhân lên của virus SARS-CoV-2', 200, '2029-12-31 00:00:00'),
(18, 'Molnupiravir/ritonavir', 'Ngăn chặn sự nhân lên của virus SARS-CoV-2', 300, '2030-12-31 00:00:00'),
(19, 'Sotrovimab', 'Trung hòa virus SARS-CoV-2', 500, '2031-12-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trieuchungnghiemtrong`
--

CREATE TABLE `trieuchungnghiemtrong` (
  `MaBN` int(6) NOT NULL,
  `ten_trieu_chung_nghiem_trong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trieuchungnghiemtrong`
--

INSERT INTO `trieuchungnghiemtrong` (`MaBN`, `ten_trieu_chung_nghiem_trong`) VALUES
(1, 'Sốt'),
(2, 'Sốt'),
(3, 'Khó thở'),
(4, 'khó thở'),
(5, 'khó thở'),
(6, 'khó thở'),
(7, 'khó thở'),
(8, 'ho'),
(9, 'sốt'),
(10, 'sốt');

-- --------------------------------------------------------

--
-- Table structure for table `trieuchungthuong`
--

CREATE TABLE `trieuchungthuong` (
  `MaBN` int(6) NOT NULL,
  `ten_trieu_chung_thuong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trieuchungthuong`
--

INSERT INTO `trieuchungthuong` (`MaBN`, `ten_trieu_chung_thuong`) VALUES
(1, 'Ho'),
(2, 'Ho'),
(3, 'sốt'),
(4, 'sốt'),
(5, 'ho'),
(6, 'ho'),
(7, 'ho '),
(8, 'sốt'),
(9, 'ho'),
(10, 'ho');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `Ma_Volunteers` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`Ma_Volunteers`) VALUES
(21),
(22),
(23),
(24),
(25),
(26);

-- --------------------------------------------------------

--
-- Table structure for table `xetnghiem`
--

CREATE TABLE `xetnghiem` (
  `MaXN` int(3) NOT NULL,
  `MaBN` int(6) NOT NULL,
  `ThoigianXN` datetime DEFAULT NULL,
  `PCR_result` char(1) DEFAULT NULL,
  `SPO2` decimal(3,2) DEFAULT NULL,
  `Respiratiory_Rate` int(3) DEFAULT NULL,
  `QT_result` char(1) DEFAULT NULL,
  `ct` int(3) DEFAULT NULL,
  `Warning` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benhlydikem`
--
ALTER TABLE `benhlydikem`
  ADD PRIMARY KEY (`MaBN`,`benhlydikem`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`MaBN`,`SoCMND`),
  ADD KEY `Ma_Staff` (`Ma_Staff`),
  ADD KEY `Ma_Nurse` (`Ma_Nurse`);

--
-- Indexes for table `dieutri`
--
ALTER TABLE `dieutri`
  ADD PRIMARY KEY (`Ma_DT`,`MaBN`,`Ma_Doctors`,`MaThuoc`),
  ADD KEY `MaBN` (`MaBN`),
  ADD KEY `Ma_Doctors` (`Ma_Doctors`),
  ADD KEY `MaThuoc` (`MaThuoc`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Ma_Doctors`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Ma_Manager`),
  ADD KEY `Ma_Doctors` (`Ma_Doctors`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`Ma_Nurse`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Ma_Staff`);

--
-- Indexes for table `staff_phanvao_phong`
--
ALTER TABLE `staff_phanvao_phong`
  ADD PRIMARY KEY (`MaPhong`,`Ma_Staff`,`MaBN`),
  ADD KEY `Ma_Staff` (`Ma_Staff`),
  ADD KEY `MaBN` (`MaBN`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`MaThuoc`);

--
-- Indexes for table `trieuchungnghiemtrong`
--
ALTER TABLE `trieuchungnghiemtrong`
  ADD PRIMARY KEY (`MaBN`,`ten_trieu_chung_nghiem_trong`);

--
-- Indexes for table `trieuchungthuong`
--
ALTER TABLE `trieuchungthuong`
  ADD PRIMARY KEY (`MaBN`,`ten_trieu_chung_thuong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`Ma_Volunteers`);

--
-- Indexes for table `xetnghiem`
--
ALTER TABLE `xetnghiem`
  ADD PRIMARY KEY (`MaXN`,`MaBN`),
  ADD KEY `MaBN` (`MaBN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benhlydikem`
--
ALTER TABLE `benhlydikem`
  ADD CONSTRAINT `benhlydikem_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`);

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_ibfk_1` FOREIGN KEY (`Ma_Staff`) REFERENCES `staff` (`Ma_Staff`),
  ADD CONSTRAINT `benhnhan_ibfk_2` FOREIGN KEY (`Ma_Nurse`) REFERENCES `nurse` (`Ma_Nurse`);

--
-- Constraints for table `dieutri`
--
ALTER TABLE `dieutri`
  ADD CONSTRAINT `dieutri_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`),
  ADD CONSTRAINT `dieutri_ibfk_2` FOREIGN KEY (`Ma_Doctors`) REFERENCES `doctors` (`Ma_Doctors`),
  ADD CONSTRAINT `dieutri_ibfk_3` FOREIGN KEY (`MaThuoc`) REFERENCES `thuoc` (`MaThuoc`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`Ma_Doctors`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Ma_Manager`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`Ma_Doctors`) REFERENCES `doctors` (`Ma_Doctors`);

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`Ma_Nurse`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Ma_Staff`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `staff_phanvao_phong`
--
ALTER TABLE `staff_phanvao_phong`
  ADD CONSTRAINT `staff_phanvao_phong_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `staff_phanvao_phong_ibfk_2` FOREIGN KEY (`Ma_Staff`) REFERENCES `staff` (`Ma_Staff`),
  ADD CONSTRAINT `staff_phanvao_phong_ibfk_3` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`);

--
-- Constraints for table `trieuchungnghiemtrong`
--
ALTER TABLE `trieuchungnghiemtrong`
  ADD CONSTRAINT `trieuchungnghiemtrong_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`);

--
-- Constraints for table `trieuchungthuong`
--
ALTER TABLE `trieuchungthuong`
  ADD CONSTRAINT `trieuchungthuong_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`);

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `volunteers_ibfk_1` FOREIGN KEY (`Ma_Volunteers`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `xetnghiem`
--
ALTER TABLE `xetnghiem`
  ADD CONSTRAINT `xetnghiem_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
