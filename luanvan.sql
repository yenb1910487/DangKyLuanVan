-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2022 lúc 02:58 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luanvan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `id` int(10) NOT NULL,
  `mabomon` varchar(10) NOT NULL,
  `tenbomon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`id`, `mabomon`, `tenbomon`) VALUES
(1, 'KHMT', 'Khoa học máy tính'),
(2, 'CNTT', 'Công nghệ thông tin'),
(3, 'HTTT', 'Hệ thống thông tin'),
(4, 'THUD', 'Tin học ứng dụng'),
(5, 'ATTT', 'An toàn thông tin'),
(6, 'MMT', 'Mạng máy tính và truyền thông'),
(7, 'CNPM', 'Công nghệ phần mềm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkydetai`
--

CREATE TABLE `dangkydetai` (
  `id` int(10) NOT NULL,
  `idsv` int(10) NOT NULL,
  `iddetai` int(10) NOT NULL,
  `trangthai` int(2) NOT NULL,
  `phanhoi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangkydetai`
--

INSERT INTO `dangkydetai` (`id`, `idsv`, `iddetai`, `trangthai`, `phanhoi`) VALUES
(50, 11, 10, 0, ''),
(51, 12, 10, 0, ''),
(52, 13, 10, 1, ''),
(53, 14, 10, 1, ''),
(54, 15, 10, 1, ''),
(55, 16, 11, 1, ''),
(56, 17, 12, 1, ''),
(57, 18, 11, 1, ''),
(58, 19, 12, 1, ''),
(59, 20, 13, 1, ''),
(60, 21, 14, 1, ''),
(61, 22, 15, 1, ''),
(62, 27, 11, 2, 'Đổi chủ đề khác đi'),
(63, 28, 12, 0, ''),
(64, 29, 13, 0, ''),
(65, 30, 14, 0, ''),
(66, 31, 15, 1, ''),
(67, 32, 11, 1, ''),
(68, 33, 10, 1, ''),
(69, 34, 11, 1, ''),
(70, 35, 12, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detai`
--

CREATE TABLE `detai` (
  `id` int(10) NOT NULL,
  `madetai` varchar(50) NOT NULL,
  `tendetai` varchar(50) NOT NULL,
  `noidung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detai`
--

INSERT INTO `detai` (`id`, `madetai`, `tendetai`, `noidung`) VALUES
(10, '104', 'Web quản lý khách sạn', 'Dùng công nghệ PHP'),
(11, '105', 'Web quản lý nhà ga', 'Sử dụng ASP.NET để hoàn thành'),
(12, '106', 'Web quản lý chuyến bay', 'Tạo ra nhiều tính năng để quản lý'),
(13, '107', 'Web quản lý bệnh viện', 'Đầy đủ chức năng thêm sửa xóa'),
(14, '108', 'Web bán rau củ', 'Web bán rau tạo ra uy tín chất lượng'),
(15, '108', 'Web bán điện thoại', 'Mẫu mã đẹp'),
(16, '108', 'Web bán laptop', 'Chức năng tốt'),
(17, '108', 'Web bán trà sữa', 'Thu hút khách hàng khi đăng nhập'),
(18, '108', 'Web bán áo', 'Tạo ra đầy đủ tính năng'),
(19, '108', 'Web bán nón bảo hiểm', 'Không quá cầu kỳ'),
(20, '109', 'Trí tuệ nhân tạo', 'Trí tuệ nhân tạo thông minh'),
(21, '110', 'Mạng máy tính', 'Mạng máy tính nối kết thế giới'),
(22, '111', 'Máy học', 'Máy học giúp con người nhận diện'),
(23, '112', 'Python', 'Tìm hiểu về ngôn ngữ và cách sử dụng nó'),
(24, '113', 'Java', 'Tìm hiểu về ngôn ngữ và cách sử dụng nó'),
(25, '114', 'C++', 'Tìm hiểu về ngôn ngữ và cách sử dụng nó'),
(26, '115', 'C#', 'Tìm hiểu về ngôn ngữ và cách sử dụng nó'),
(28, '117', 'Pascal', 'Tìm hiểu về ngôn ngữ và cách sử dụng nó'),
(29, '118', 'PHP', 'Tìm hiểu về ngôn ngữ và cách sử dụng nó'),
(33, '125', 'Web blog', 'Dùng PHP\n             ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(10) NOT NULL,
  `msgv` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `tengv` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` varchar(50) NOT NULL,
  `gioitinh` varchar(7) NOT NULL,
  `sodienthoai` varchar(13) NOT NULL,
  `id_bomon` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id`, `msgv`, `matkhau`, `tengv`, `ngaysinh`, `quequan`, `gioitinh`, `sodienthoai`, `id_bomon`) VALUES
(1, '101', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyễn Văn A', '2001-10-01', 'Long Xuyên', 'Nam', '01242882856', 1),
(2, '102', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn B', '2001-10-02', 'Long An', 'Nam', '01242882857', 1),
(3, '103', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn C', '2001-10-03', 'An Giang', 'Nam', '01242882858', 1),
(4, '104', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn D', '2001-10-04', 'Kiên Giang', 'Nam', '01242882859', 1),
(5, '105', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn E', '2001-10-05', 'Tiền Giang', 'Nam', '01242882860', 1),
(6, '106', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn F', '2001-10-06', 'TP.HCM', 'Nam', '01242882861', 1),
(7, '107', '202cb962ac59075b964b07152d234b70', 'Đinh Văn A', '2001-11-01', 'Long Xuyên', 'Nam', '0127882856', 2),
(8, '108', '202cb962ac59075b964b07152d234b70', 'Đinh Văn B', '2001-05-02', 'Long An', 'Nam', '01272882857', 2),
(9, '109', '202cb962ac59075b964b07152d234b70', 'Đinh Văn C', '2001-06-03', 'An Giang', 'Nam', '01272882858', 2),
(10, '110', '202cb962ac59075b964b07152d234b70', 'Đinh Văn D', '2001-07-04', 'Kiên Giang', 'Nam', '01272882859', 2),
(11, '111', '202cb962ac59075b964b07152d234b70', 'Đinh Văn E', '2001-08-05', 'Tiền Giang', 'Nam', '01272882860', 2),
(12, '112', '202cb962ac59075b964b07152d234b70', 'Đinh Văn F', '2001-09-06', 'TP.HCM', 'Nam', '01272882861', 2),
(13, '113', '202cb962ac59075b964b07152d234b70', 'Phan Văn A', '2001-11-01', 'Long Xuyên', 'Nữ', '0127982856', 2),
(14, '114', '202cb962ac59075b964b07152d234b70', 'Phan Văn B', '2001-05-02', 'Long An', 'Nữ', '01279882857', 2),
(15, '115', '202cb962ac59075b964b07152d234b70', 'Phan Văn C', '2001-06-03', 'An Giang', 'Nữ', '01279882858', 2),
(16, '116', '202cb962ac59075b964b07152d234b70', 'Phan Văn D', '2001-07-04', 'Kiên Giang', 'Nữ', '01279882859', 2),
(17, '117', '202cb962ac59075b964b07152d234b70', 'Phan Văn E', '2001-08-05', 'Tiền Giang', 'Nữ', '01279882860', 2),
(18, '118', '202cb962ac59075b964b07152d234b70', 'Phan Văn F', '2001-09-06', 'TP.HCM', 'Nữ', '01279882861', 2),
(19, '119', '202cb962ac59075b964b07152d234b70', 'Trần Thị Kim Yến', '2001-11-01', 'Long Xuyên', 'Nam', '0127882856', 3),
(20, '120', '202cb962ac59075b964b07152d234b70', 'Trần Thị B', '2001-05-02', 'Long An', 'Nam', '01272882857', 3),
(21, '121', '202cb962ac59075b964b07152d234b70', 'Trần Thị C', '2001-06-03', 'An Giang', 'Nam', '01272882858', 3),
(22, '122', '202cb962ac59075b964b07152d234b70', 'Trần Thị D', '2001-07-04', 'Kiên Giang', 'Nam', '01272882859', 3),
(23, '123', '202cb962ac59075b964b07152d234b70', 'Trần Thị E', '2001-08-05', 'Tiền Giang', 'Nam', '01272882860', 3),
(24, '124', '202cb962ac59075b964b07152d234b70', 'Trần Thị F', '2001-09-06', 'TP.HCM', 'Nam', '01272882861', 3),
(25, '125', '202cb962ac59075b964b07152d234b70', 'Mai Văn A', '2001-11-01', 'Long Xuyên', 'Nữ', '0127982856', 3),
(26, '126', '202cb962ac59075b964b07152d234b70', 'Mai Văn B', '2001-05-02', 'Long An', 'Nữ', '01279882857', 3),
(27, '127', '202cb962ac59075b964b07152d234b70', 'Mai Văn C', '2001-06-03', 'An Giang', 'Nữ', '01279882858', 3),
(28, '128', '202cb962ac59075b964b07152d234b70', 'Mai Văn D', '2001-07-04', 'Kiên Giang', 'Nữ', '01279882859', 3),
(29, '129', '202cb962ac59075b964b07152d234b70', 'Mai Văn E', '2001-08-05', 'Tiền Giang', 'Nữ', '01279882860', 3),
(30, '130', '202cb962ac59075b964b07152d234b70', 'Mai Văn F', '2001-09-06', 'TP.HCM', 'Nữ', '01279882861', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(10) NOT NULL,
  `idsv` int(10) NOT NULL,
  `idgv` int(10) NOT NULL,
  `diemso` varchar(5) NOT NULL,
  `diemchu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`id`, `idsv`, `idgv`, `diemso`, `diemchu`) VALUES
(17, 31, 1, '10', 'A'),
(18, 32, 1, '2', 'F'),
(19, 14, 1, '5', 'D+'),
(20, 15, 1, '6.5', 'C+'),
(21, 16, 1, '1.2', 'F'),
(22, 17, 1, '4.8', 'D'),
(23, 34, 1, '5.6', 'D+'),
(24, 35, 1, '7.8', 'B'),
(25, 18, 1, '5.2', 'D+'),
(26, 19, 1, '5.9', 'D+'),
(27, 20, 1, '5.8', 'D+'),
(28, 21, 1, '5.1', 'D+'),
(30, 13, 1, '2.7', 'F'),
(32, 22, 1, '2', 'F');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(10) NOT NULL,
  `tenlop` varchar(10) NOT NULL,
  `idgv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `tenlop`, `idgv`) VALUES
(27, 'DI22V7A4', 1),
(28, 'DI22V7A5', 1),
(29, 'DI22V7A6', 2),
(30, 'DI22V7A7', 2),
(31, 'DI22V7A8', 2),
(32, 'DI21V7A3', 3),
(33, 'DI21V7A4', 3),
(34, 'DI21V7A5', 3),
(35, 'DI21V7A6', 4),
(36, 'DI21V7A7', 4),
(37, 'DI21V7A8', 4),
(38, 'DI20V7A3', 3),
(39, 'DI20V7A4', 3),
(40, 'DI20V7A5', 3),
(41, 'DI20V7A6', 4),
(42, 'DI20V7A7', 4),
(43, 'DI20V7A8', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(10) NOT NULL,
  `mssv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nganh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kiemtra` int(2) NOT NULL,
  `id_lop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `mssv`, `matkhau`, `hoten`, `ngaysinh`, `quequan`, `gioitinh`, `sodienthoai`, `email`, `nganh`, `kiemtra`, `id_lop`) VALUES
(11, 'B2010240', '202cb962ac59075b964b07152d234b70', 'Trần Thị Kim Yến', '2000-08-01', 'Long Xuyên', 'Nam', '0917349907', 'yen@gmail.com', 'CNTT', 0, 27),
(12, 'B2010241', '202cb962ac59075b964b07152d234b70', 'Trần Thị Kim A', '2000-04-01', 'Long An', 'Nam', '0913349707', 'yen@gmail.com', 'CNTT', 0, 27),
(13, 'B2010242', '202cb962ac59075b964b07152d234b70', 'Trần Thị Kim B', '2000-04-01', 'TP.HCM', 'Nữ', '0913349908', 'yen@gmail.com', 'CNTT', 1, 27),
(14, 'B2010243', '202cb962ac59075b964b07152d234b70', 'Trần Thị Kim C', '2000-04-01', 'Cần Thơ', 'Nữ', '0913349987', 'yen@gmail.com', 'CNTT', 1, 27),
(15, 'B2010244', '202cb962ac59075b964b07152d234b70', 'Nguyễn A', '2000-03-01', 'Long An', 'Nam', '0913359707', 'yen@gmail.com', 'CNTT', 1, 27),
(16, 'B2010245', '202cb962ac59075b964b07152d234b70', 'Nguyễn B', '2000-02-01', 'TP.HCM', 'Nam', '0913279908', 'yen@gmail.com', 'CNTT', 1, 27),
(17, 'B2010246', '202cb962ac59075b964b07152d234b70', 'Nguyễn C', '2000-01-11', 'Cần Thơ', 'Nam', '0914549987', 'yen@gmail.com', 'CNTT', 1, 27),
(18, 'B2010247', '202cb962ac59075b964b07152d234b70', 'Đinh Kim A', '2003-04-01', 'Long An', 'Nam', '0913349707', 'yen@gmail.com', 'CNTT', 1, 28),
(19, 'B2010248', '202cb962ac59075b964b07152d234b70', 'Đinh Kim B', '2003-04-01', 'TP.HCM', 'Nữ', '0913349908', 'yen@gmail.com', 'CNTT', 1, 28),
(20, 'B2010249', '202cb962ac59075b964b07152d234b70', 'Đinh Kim C', '2003-04-01', 'Cần Thơ', 'Nữ', '0913349987', 'yen@gmail.com', 'CNTT', 1, 28),
(21, 'B2010250', '202cb962ac59075b964b07152d234b70', 'Kim A', '2003-11-01', 'Hà Giang', 'Nữ', '0913349707', 'yen@gmail.com', 'CNTT', 1, 28),
(22, 'B2010251', '202cb962ac59075b964b07152d234b70', 'Kim B', '2003-12-01', 'Tây Ninh', 'Nữ', '0913349908', 'yen@gmail.com', 'CNTT', 1, 28),
(23, 'B2010252', '202cb962ac59075b964b07152d234b70', 'Kim C', '2003-10-01', 'Cần Thơ', 'Nữ', '0913349987', 'yen@gmail.com', 'CNTT', 0, 28),
(24, 'B2010210', '202cb962ac59075b964b07152d234b70', 'Đinh Nguyễn A', '2002-03-01', 'Long An', 'Nữ', '0913359707', 'yen@gmail.com', 'CNTT', 0, 29),
(25, 'B2010211', '202cb962ac59075b964b07152d234b70', 'Đinh Nguyễn B', '2002-02-01', 'TP.HCM', 'Nam', '0913279908', 'yen@gmail.com', 'CNTT', 0, 29),
(26, 'B2010212', '202cb962ac59075b964b07152d234b70', 'Đinh Nguyễn C', '2002-01-11', 'Cần Thơ', 'Nam', '0914549987', 'yen@gmail.com', 'CNTT', 0, 29),
(27, 'B1920240', '202cb962ac59075b964b07152d234b70', 'Mai An Tiêm', '2000-08-01', 'Long Xuyên', 'Nam', '0917349907', 'yen@gmail.com', 'CNTT', 0, 27),
(28, 'B1920241', '202cb962ac59075b964b07152d234b70', 'Thái Quach Châu', '2000-04-01', 'Long An', 'Nam', '0913349707', 'yen@gmail.com', 'CNTT', 0, 27),
(29, 'B1920242', '202cb962ac59075b964b07152d234b70', 'John Huy Tran', '2000-04-01', 'TP.HCM', 'Nữ', '0913349908', 'yen@gmail.com', 'CNTT', 0, 27),
(30, 'B1920243', '202cb962ac59075b964b07152d234b70', 'Kieu Cong Tien', '2000-04-01', 'Cần Thơ', 'Nữ', '0913349987', 'yen@gmail.com', 'CNTT', 0, 27),
(31, 'B1820244', '202cb962ac59075b964b07152d234b70', 'Titi', '2000-03-01', 'Long An', 'Nam', '0913359707', 'yen@gmail.com', 'CNTT', 1, 27),
(32, 'B1820245', '202cb962ac59075b964b07152d234b70', 'Nguyễn B', '2000-02-01', 'TP.HCM', 'Nam', '0913279908', 'yen@gmail.com', 'CNTT', 1, 27),
(33, 'B1820246', '202cb962ac59075b964b07152d234b70', 'Nguyễn C', '2000-01-11', 'Cần Thơ', 'Nam', '0914549987', 'yen@gmail.com', 'CNTT', 1, 27),
(34, 'B1820247', '202cb962ac59075b964b07152d234b70', 'Đinh Kim A', '2003-04-01', 'Long An', 'Nam', '0913349707', 'yen@gmail.com', 'CNTT', 1, 28),
(35, 'B1820248', '202cb962ac59075b964b07152d234b70', 'Đinh Kim B', '2003-04-01', 'TP.HCM', 'Nữ', '0913349908', 'yen@gmail.com', 'CNTT', 1, 28),
(36, 'B1820249', '202cb962ac59075b964b07152d234b70', 'Đinh Kim C', '2003-04-01', 'Cần Thơ', 'Nữ', '0913349987', 'yen@gmail.com', 'CNTT', 0, 28),
(37, 'B1820250', '202cb962ac59075b964b07152d234b70', 'Kim A', '2003-11-01', 'Hà Giang', 'Nữ', '0913349707', 'yen@gmail.com', 'CNTT', 0, 28),
(38, 'B1820251', '202cb962ac59075b964b07152d234b70', 'Kim B', '2003-12-01', 'Tây Ninh', 'Nữ', '0913349908', 'yen@gmail.com', 'CNTT', 0, 28),
(39, 'B1820252', '202cb962ac59075b964b07152d234b70', 'Kim C', '2003-10-01', 'Cần Thơ', 'Nữ', '0913349987', 'yen@gmail.com', 'CNTT', 0, 28),
(40, 'B1820210', '202cb962ac59075b964b07152d234b70', 'Đinh Nguyễn A', '2002-03-01', 'Long An', 'Nữ', '0913359707', 'yen@gmail.com', 'CNTT', 0, 28),
(41, 'B1820211', '202cb962ac59075b964b07152d234b70', 'Đinh Nguyễn B', '2002-02-01', 'TP.HCM', 'Nam', '0913279908', 'yen@gmail.com', 'CNTT', 0, 28),
(42, 'B1820212', '202cb962ac59075b964b07152d234b70', 'Đinh Nguyễn C', '2002-01-11', 'Cần Thơ', 'Nam', '0914549987', 'yen@gmail.com', 'CNTT', 0, 28);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dangkydetai`
--
ALTER TABLE `dangkydetai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsv` (`idsv`),
  ADD KEY `iddetai` (`iddetai`);

--
-- Chỉ mục cho bảng `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bomon` (`id_bomon`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsv` (`idsv`),
  ADD KEY `idgv` (`idgv`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgv` (`idgv`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lop` (`id_lop`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dangkydetai`
--
ALTER TABLE `dangkydetai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `detai`
--
ALTER TABLE `detai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dangkydetai`
--
ALTER TABLE `dangkydetai`
  ADD CONSTRAINT `dangkydetai_ibfk_1` FOREIGN KEY (`idsv`) REFERENCES `sinhvien` (`id`),
  ADD CONSTRAINT `dangkydetai_ibfk_2` FOREIGN KEY (`iddetai`) REFERENCES `detai` (`id`);

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `giaovien_ibfk_1` FOREIGN KEY (`id_bomon`) REFERENCES `bomon` (`id`);

--
-- Các ràng buộc cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`idsv`) REFERENCES `sinhvien` (`id`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
