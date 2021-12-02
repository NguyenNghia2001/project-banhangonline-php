-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2021 at 07:32 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan_banhang_MVC`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Nguyễn Nghĩa', 'nguyenvannghia230801@gmail.com', 'nghiaadmin', '333e6ae68dc877dc47772f7b8bb7bd7e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Dell'),
(3, 'Apple'),
(6, 'Xiaomi Redmi'),
(7, 'Vsmart Live'),
(9, 'Heiwi'),
(10, 'SamSung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(88, 27, '3372b8d670af916fd472311376d9c6d0', 'Máy Tính', '40000000', 5, '3369a602db.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(8, 'LapTop'),
(9, 'Desktop'),
(10, 'Mobile Phones'),
(11, 'Accessories'),
(12, 'Software'),
(13, 'Footwear'),
(14, 'Clothing'),
(15, 'Jewellery'),
(16, 'Home Decor &amp; Kitchen'),
(17, 'Sports &amp; Fetness'),
(18, 'Beauty and Healthcare'),
(21, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(2, 'Nguyễn Nghĩa', '225/12 Nguyễn ĐÌnh Chiểu Quận 3 TPHCM', 'TP.HCM', 'na', '16000', '0869375106', 'nguyenvannghia230801@gmail.com', '9e87373408a6cd425ae9b19bf870d893'),
(3, 'Nguyễn Thành Long', 'Long Thành - Yên Thành - Nghệ An ', 'Hà Nội', 'hn', '280000', '0684953833', 'longdaica@gmail.com', '0f5264038205edfb1ac05fbb0e8c5e94'),
(4, 'Nhật Long', '225/12 Nguyễn ĐÌnh Chiểu Quận 3 TPHCM', 'Hà Nội', 'hcm', '16000', '0869375106', 'nguyennhat@gmail.com', '333e6ae68dc877dc47772f7b8bb7bd7e'),
(5, 'Nguyễn Thành Nam', 'Long Thành - Yên Thành - Nghệ An ', 'TP.HCM', 'dn', '180000', '0824728332', 'longheo@gmail.com', '333e6ae68dc877dc47772f7b8bb7bd7e'),
(6, 'Bá Nam', 'Long Thành - Yên Thành - Nghệ An ', 'Nghệ An', 'hn', '16000', '0824728332', 'namga@gmail.com', '333e6ae68dc877dc47772f7b8bb7bd7e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_Id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(35, 26, 'Tủ Lạnh', 2, 1, '125000000', '543c7eda47.jpg', 1, '2021-04-20 13:46:12'),
(54, 26, 'Tủ Lạnh', 2, 1, '25000000', '543c7eda47.jpg', 2, '2021-04-21 15:21:15'),
(55, 27, 'Máy Tính', 2, 1, '40000000', '3369a602db.jpg', 2, '2021-04-21 15:22:52'),
(56, 26, 'Tủ Lạnh', 2, 3, '75000000', '543c7eda47.jpg', 0, '2021-04-29 14:16:33'),
(57, 24, 'Bàn Ủi Tiện Lợi', 2, 1, '2000000', '66c3ca3af6.png', 2, '2021-04-29 14:16:33'),
(58, 23, 'Iphone 12 pro max', 2, 4, '92000000', '7670f9a3de.png', 2, '2021-05-18 00:48:34'),
(59, 23, 'Iphone 12 pro max', 3, 3, '69000000', '7670f9a3de.png', 0, '2021-10-06 12:54:43'),
(60, 26, 'Tủ Lạnh', 3, 3, '75000000', '543c7eda47.jpg', 0, '2021-10-06 12:54:43'),
(61, 27, 'Máy Tính', 3, 1, '40000000', '3369a602db.jpg', 0, '2021-10-06 12:59:22'),
(62, 26, 'Tủ Lạnh', 3, 2, '50000000', '543c7eda47.jpg', 0, '2021-10-06 12:59:22'),
(63, 26, 'Tủ Lạnh', 3, 1, '25000000', '543c7eda47.jpg', 0, '2021-10-06 13:08:28'),
(64, 25, 'Máy Lạnh Samsung', 3, 1, '23000000', 'ac5d1a6508.jpg', 0, '2021-10-06 13:15:25'),
(65, 27, 'Máy Tính', 2, 1, '40000000', '3369a602db.jpg', 0, '2021-10-06 13:34:44'),
(66, 27, 'Máy Tính', 2, 3, '120000000', '3369a602db.jpg', 0, '2021-10-06 13:40:28'),
(67, 27, 'Máy Tính', 4, 2, '80000000', '3369a602db.jpg', 0, '2021-10-09 01:26:25'),
(68, 23, 'Iphone 12 pro max', 4, 4, '92000000', '7670f9a3de.png', 0, '2021-10-09 01:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(23, 'Iphone 12 pro max', 10, 3, '<p><strong>Điện thoại th&ocirc;ng minh</strong><span>&nbsp;hay&nbsp;</span><strong>smartphone</strong><span>&nbsp;l&agrave; kh&aacute;i niệm để chỉ c&aacute;c loại thiết bị di động kết hợp&nbsp;</span><a title=\"Điện thoại di động\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_di_%C4%91%E1%BB%99ng\">điện thoại di động</a><span>&nbsp;c&aacute;c chức năng&nbsp;</span><a title=\"Điện to&aacute;n di động\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_to%C3%A1n_di_%C4%91%E1%BB%99ng\">điện to&aacute;n di động</a><span>&nbsp;v&agrave;o một thiết bị. Ch&uacute;ng được ph&acirc;n biệt với&nbsp;</span><a title=\"Điện thoại phổ th&ocirc;ng\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_ph%E1%BB%95_th%C3%B4ng\">điện thoại phổ th&ocirc;ng</a><span>&nbsp;bởi khả năng phần cứng mạnh hơn v&agrave;&nbsp;</span><a title=\"Hệ điều h&agrave;nh di động\" href=\"https://vi.wikipedia.org/wiki/H%E1%BB%87_%C4%91i%E1%BB%81u_h%C3%A0nh_di_%C4%91%E1%BB%99ng\">hệ điều h&agrave;nh di động</a><span>&nbsp;mở rộng, tạo điều kiện cho phần mềm rộng hơn, internet (bao gồm duyệt web qua&nbsp;</span><a title=\"Băng th&ocirc;ng rộng\" href=\"https://vi.wikipedia.org/wiki/B%C4%83ng_th%C3%B4ng_r%E1%BB%99ng\">băng th&ocirc;ng rộng di động</a><span>) v&agrave; chức năng đa phương tiện (bao gồm &acirc;m nhạc, video, m&aacute;y ảnh v&agrave; chơi game), c&ugrave;ng với c&aacute;c chức năng ch&iacute;nh của điện thoại như cuộc gọi thoại v&agrave; nhắn tin văn bản.</span><sup id=\"cite_ref-phonescoop-smartphone_1-0\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_th%C3%B4ng_minh#cite_note-phonescoop-smartphone-1\">[1]</a></sup><sup id=\"cite_ref-phonescoop-featurephone_2-0\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_th%C3%B4ng_minh#cite_note-phonescoop-featurephone-2\">[2]</a></sup><sup id=\"cite_ref-3\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_th%C3%B4ng_minh#cite_note-3\">[3]</a></sup><span>&nbsp;Điện thoại th&ocirc;ng minh thường chứa một số chip&nbsp;</span><a title=\"Vi mạch\" href=\"https://vi.wikipedia.org/wiki/Vi_m%E1%BA%A1ch\">IC</a><span>&nbsp;</span><a title=\"MOSFET\" href=\"https://vi.wikipedia.org/wiki/MOSFET\">kim loại-oxit-b&aacute;n dẫn</a><span>&nbsp;(MOS), bao gồm c&aacute;c cảm biến kh&aacute;c nhau c&oacute; thể được tận dụng bởi phần mềm của ch&uacute;ng (chẳng hạn như từ kế, cảm biến tiệm cận, phong vũ biểu, con quay hồi chuyển hoặc gia tốc kế) v&agrave; hỗ trợ giao thức&nbsp;</span><a class=\"new\" title=\"Truyền th&ocirc;ng kh&ocirc;ng d&acirc;y (trang chưa được viết)\" href=\"https://vi.wikipedia.org/w/index.php?title=Truy%E1%BB%81n_th%C3%B4ng_kh%C3%B4ng_d%C3%A2y&amp;action=edit&amp;redlink=1\">truyền th&ocirc;ng kh&ocirc;ng d&acirc;y</a><span>&nbsp;(chẳng hạn như&nbsp;</span><a title=\"Bluetooth\" href=\"https://vi.wikipedia.org/wiki/Bluetooth\">Bluetooth</a><span>,&nbsp;</span><a title=\"Wi-Fi\" href=\"https://vi.wikipedia.org/wiki/Wi-Fi\">Wi-Fi</a><span>&nbsp;hoặc&nbsp;</span><a title=\"GNSS\" href=\"https://vi.wikipedia.org/wiki/GNSS\">định vị vệ tinh</a><span>).</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '23000000', '7670f9a3de.png'),
(24, 'Bàn Ủi Tiện Lợi', 15, 7, '<p><span>B&agrave;n để ủi quần &aacute;o (cầu l&agrave;), một vật dụng hữu &iacute;ch gi&uacute;p b&agrave; nội trợ l&agrave;m phẳng l&igrave; quần &aacute;o một c&aacute;ch nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng. Sử dụng b&agrave;n để ủi trong khi l&agrave; quần &aacute;o c&ograve;n hạn chế t&igrave;nh trạng ch&aacute;y nổ khi b&agrave;n l&agrave; tiếp x&uacute;c với quần &aacute;o. Vậy l&agrave;m thế n&agrave;o để mua được một chiếc cầu l&agrave; chất lượng? V&agrave; mua ở đ&acirc;u? B&agrave;i viết dưới đ&acirc;y sẽ trả lời bạn nh&eacute;!</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '2000000', '66c3ca3af6.png'),
(25, 'Máy Lạnh Samsung', 17, 6, '<p><span>D&ugrave;ng&nbsp;</span><strong>điều h&ograve;a kh&ocirc;ng kh&iacute;</strong><span>&nbsp;rất c&oacute; lợi cho sức khỏe của con người, nếu nhiệt độ qu&aacute; cao, cơ thể sẽ bị mệt mỏi, hay nếu nhiệt độ qu&aacute; thấp sẽ khiến cho cơ thể r&eacute;t buốt, kh&oacute; khăn trong hoạt động. Vậy n&ecirc;n m&aacute;y lạnh sẽ gi&uacute;p cho kh&ocirc;ng kh&iacute; được điều h&ograve;a về nhiệt độ trung b&igrave;nh, trong l&agrave;nh hơn, gi&uacute;p ch&uacute;ng ta dễ d&agrave;ng hoạt động hơn, nhất l&agrave; với gia đ&igrave;nh c&oacute; người gi&agrave; v&agrave; trẻ nhỏ</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '23000000', 'ac5d1a6508.jpg'),
(26, 'Tủ Lạnh', 16, 10, '<p>Th&ocirc;ng thường,<a href=\"https://dienmaycholon.vn/tu-lanh/\" target=\"_blank\">&nbsp;tủ lạnh</a>&nbsp;thường được trang bị 1 d&agrave;n lạnh ph&iacute;a sau ngăn đ&ocirc;ng, sau đ&oacute; quạt gi&oacute; sẽ thổi kh&iacute; lạnh từ ngăn đ&ocirc;ng xuống ngăn m&aacute;t, việc n&agrave;y sẽ dẫn đến t&igrave;nh trạng m&ugrave;i vị của c&aacute;c loại thực phẩm thường bị lẫn v&agrave;o nhau.</p>\r\n<p>Tủ lạnh Samsung 2 d&agrave;n lạnh sẽ được trang bị 2 d&agrave;n lạnh ri&ecirc;ng biệt cho ngăn đ&ocirc;ng v&agrave; ngăn m&aacute;t mang đến 2 luồng kh&iacute; lạnh độc lập, gi&uacute;p thực phẩm giữ nguy&ecirc;n được hương vị vốn c&oacute;. Đồng thời, việc trang bị 2 d&agrave;n lạnh độc lập sẽ gi&uacute;p tủ lạnh tăng khả năng l&agrave;m lạnh nhanh ch&oacute;ng, kh&iacute; lạnh trong tủ được lan tỏa đồng đều khắp c&aacute;c ng&oacute;c ng&aacute;ch b&ecirc;n trong tủ, nhiệt độ trong mỗi ngăn lu&ocirc;n được ổn định, n&acirc;ng cao hiệu quả tối ưu trong việc bảo quản thực phẩm.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '25000000', '543c7eda47.jpg'),
(27, 'Máy Tính', 10, 1, '<p><strong>M&aacute;y t&iacute;nh</strong>&nbsp;hay&nbsp;<strong>m&aacute;y điện to&aacute;n</strong>&nbsp;l&agrave; một&nbsp;<a title=\"M&aacute;y m&oacute;c\" href=\"https://vi.wikipedia.org/wiki/M%C3%A1y_m%C3%B3c\">m&aacute;y</a>&nbsp;c&oacute; thể được hướng dẫn để thực hiện&nbsp;<a title=\"D&atilde;y (to&aacute;n học)\" href=\"https://vi.wikipedia.org/wiki/D%C3%A3y_(to%C3%A1n_h%E1%BB%8Dc)\">c&aacute;c chuỗi</a>&nbsp;c&aacute;c&nbsp;<a title=\"Số học\" href=\"https://vi.wikipedia.org/wiki/S%E1%BB%91_h%E1%BB%8Dc\">ph&eacute;p to&aacute;n số học</a>&nbsp;hoặc&nbsp;<a title=\"Đại số Boole\" href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%A1i_s%E1%BB%91_Boole\">logic một</a>&nbsp;c&aacute;ch tự động th&ocirc;ng qua&nbsp;<a title=\"Lập tr&igrave;nh m&aacute;y t&iacute;nh\" href=\"https://vi.wikipedia.org/wiki/L%E1%BA%ADp_tr%C3%ACnh_m%C3%A1y_t%C3%ADnh\">lập tr&igrave;nh m&aacute;y t&iacute;nh</a>&nbsp;. M&aacute;y t&iacute;nh hiện đại c&oacute; khả năng tu&acirc;n theo c&aacute;c tập hợp lệnh tổng qu&aacute;t, được gọi l&agrave;&nbsp;<em><a title=\"Chương tr&igrave;nh m&aacute;y t&iacute;nh\" href=\"https://vi.wikipedia.org/wiki/Ch%C6%B0%C6%A1ng_tr%C3%ACnh_m%C3%A1y_t%C3%ADnh\">chương tr&igrave;nh</a>&nbsp;.</em>&nbsp;C&aacute;c chương tr&igrave;nh n&agrave;y cho ph&eacute;p m&aacute;y t&iacute;nh thực hiện một loạt c&aacute;c t&aacute;c vụ. Một m&aacute;y t&iacute;nh \"ho&agrave;n chỉnh\" bao gồm&nbsp;<a title=\"Phần cứng\" href=\"https://vi.wikipedia.org/wiki/Ph%E1%BA%A7n_c%E1%BB%A9ng\">phần cứng</a>,&nbsp;<a title=\"Hệ điều h&agrave;nh\" href=\"https://vi.wikipedia.org/wiki/H%E1%BB%87_%C4%91i%E1%BB%81u_h%C3%A0nh\">hệ điều h&agrave;nh</a>&nbsp;(&nbsp;<a title=\"Phần mềm\" href=\"https://vi.wikipedia.org/wiki/Ph%E1%BA%A7n_m%E1%BB%81m\">phần mềm</a>&nbsp;ch&iacute;nh) v&agrave;&nbsp;<a title=\"Thiết bị ngoại vi\" href=\"https://vi.wikipedia.org/wiki/Thi%E1%BA%BFt_b%E1%BB%8B_ngo%E1%BA%A1i_vi\">thiết bị ngoại vi</a>&nbsp;cần thiết v&agrave; sử dụng cho hoạt động \"ho&agrave;n chỉnh\" c&oacute; thể được gọi l&agrave;&nbsp;<strong>hệ thống m&aacute;y t&iacute;nh</strong>&nbsp;. Thuật ngữ n&agrave;y cũng c&oacute; thể được sử dụng cho một nh&oacute;m m&aacute;y t&iacute;nh được kết nối v&agrave; hoạt động c&ugrave;ng nhau, cụ thể l&agrave; một&nbsp;<a title=\"Mạng m&aacute;y t&iacute;nh\" href=\"https://vi.wikipedia.org/wiki/M%E1%BA%A1ng_m%C3%A1y_t%C3%ADnh\">mạng</a>&nbsp;<a title=\"Điện to&aacute;n cụm\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_to%C3%A1n_c%E1%BB%A5m\">m&aacute;y t&iacute;nh</a>&nbsp;hoặc&nbsp;<a title=\"Điện to&aacute;n cụm\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_to%C3%A1n_c%E1%BB%A5m\">cụm m&aacute;y t&iacute;nh</a>&nbsp;.</p>\r\n<p>M&aacute;y t&iacute;nh được sử dụng l&agrave;m&nbsp;<a title=\"Hệ thống điều khiển\" href=\"https://vi.wikipedia.org/wiki/H%E1%BB%87_th%E1%BB%91ng_%C4%91i%E1%BB%81u_khi%E1%BB%83n\">hệ thống điều khiển</a>&nbsp;cho nhiều loại&nbsp;<a title=\"Điện tử ti&ecirc;u d&ugrave;ng\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_t%E1%BB%AD_ti%C3%AAu_d%C3%B9ng\">thiết bị</a>&nbsp;<a title=\"Programmable logic controller\" href=\"https://vi.wikipedia.org/wiki/Programmable_logic_controller\">c&ocirc;ng nghiệp</a>&nbsp;v&agrave; d&acirc;n&nbsp;<a title=\"Điện tử ti&ecirc;u d&ugrave;ng\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_t%E1%BB%AD_ti%C3%AAu_d%C3%B9ng\">dụng</a>&nbsp;. Điều n&agrave;y bao gồm c&aacute;c thiết bị c&oacute; mục đ&iacute;ch đặc biệt đơn giản như&nbsp;<a title=\"L&ograve; vi ba\" href=\"https://vi.wikipedia.org/wiki/L%C3%B2_vi_ba\">l&ograve; vi s&oacute;ng</a>&nbsp;v&agrave;&nbsp;<a title=\"Điều khiển từ xa\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%81u_khi%E1%BB%83n_t%E1%BB%AB_xa\">điều khiển từ xa</a>, c&aacute;c thiết bị nh&agrave; m&aacute;y như&nbsp;<a title=\"Robot c&ocirc;ng nghiệp\" href=\"https://vi.wikipedia.org/wiki/Robot_c%C3%B4ng_nghi%E1%BB%87p\">r&ocirc; bốt c&ocirc;ng nghiệp</a>&nbsp;v&agrave;&nbsp;<a title=\"CAD (tin học)\" href=\"https://vi.wikipedia.org/wiki/CAD_(tin_h%E1%BB%8Dc)\">thiết kế c&oacute; sự hỗ trợ của m&aacute;y t&iacute;nh</a>&nbsp;v&agrave; cả c&aacute;c thiết bị đa năng như&nbsp;<a title=\"M&aacute;y t&iacute;nh c&aacute; nh&acirc;n\" href=\"https://vi.wikipedia.org/wiki/M%C3%A1y_t%C3%ADnh_c%C3%A1_nh%C3%A2n\">m&aacute;y t&iacute;nh c&aacute; nh&acirc;n</a>&nbsp;v&agrave;&nbsp;<a title=\"Thiết bị di động\" href=\"https://vi.wikipedia.org/wiki/Thi%E1%BA%BFt_b%E1%BB%8B_di_%C4%91%E1%BB%99ng\">thiết bị di động</a>&nbsp;như&nbsp;<a title=\"Điện thoại th&ocirc;ng minh\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_th%C3%B4ng_minh\">điện thoại th&ocirc;ng minh</a>&nbsp;.&nbsp;<a title=\"Internet\" href=\"https://vi.wikipedia.org/wiki/Internet\">Internet</a>&nbsp;được chạy tr&ecirc;n c&aacute;c m&aacute;y t&iacute;nh v&agrave; n&oacute; kết nối h&agrave;ng trăm triệu m&aacute;y t&iacute;nh kh&aacute;c v&agrave; người d&ugrave;ng của ch&uacute;ng</p>\r\n<p>M&aacute;y t&iacute;nh ban đầu chỉ được coi l&agrave; thiết bị t&iacute;nh to&aacute;n. Từ thời cổ đại, c&aacute;c thiết bị thủ c&ocirc;ng đơn giản như&nbsp;<a title=\"B&agrave;n t&iacute;nh\" href=\"https://vi.wikipedia.org/wiki/B%C3%A0n_t%C3%ADnh\">b&agrave;n t&iacute;nh</a>&nbsp;đ&atilde; hỗ trợ con người thực hiện c&aacute;c ph&eacute;p t&iacute;nh. Đầu&nbsp;<a title=\"C&aacute;ch mạng c&ocirc;ng nghiệp\" href=\"https://vi.wikipedia.org/wiki/C%C3%A1ch_m%E1%BA%A1ng_c%C3%B4ng_nghi%E1%BB%87p\">C&aacute;ch mạng C&ocirc;ng nghiệp</a>, một số thiết bị cơ kh&iacute; đ&atilde; được chế tạo để tự động h&oacute;a c&aacute;c c&ocirc;ng việc k&eacute;o d&agrave;i tẻ nhạt, chẳng hạn như hướng dẫn c&aacute;c mẫu cho&nbsp;<a title=\"Khung cửi\" href=\"https://vi.wikipedia.org/wiki/Khung_c%E1%BB%ADi\">khung dệt</a>&nbsp;. C&aacute;c&nbsp;<a title=\"M&aacute;y m&oacute;c\" href=\"https://vi.wikipedia.org/wiki/M%C3%A1y_m%C3%B3c\">m&aacute;y</a>&nbsp;điện phức tạp hơn đ&atilde; thực hiện c&aacute;c ph&eacute;p t&iacute;nh&nbsp;<a title=\"Điện tử tương tự\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_t%E1%BB%AD_t%C6%B0%C6%A1ng_t%E1%BB%B1\">tương tự</a>&nbsp;chuy&ecirc;n biệt v&agrave;o đầu thế kỷ 20. C&aacute;c m&aacute;y t&iacute;nh to&aacute;n điện tử&nbsp;<a title=\"Kỹ thuật số\" href=\"https://vi.wikipedia.org/wiki/K%E1%BB%B9_thu%E1%BA%ADt_s%E1%BB%91\">kỹ thuật số</a>&nbsp;đầu ti&ecirc;n được ph&aacute;t triển trong&nbsp;<a title=\"Chiến tranh thế giới thứ hai\" href=\"https://vi.wikipedia.org/wiki/Chi%E1%BA%BFn_tranh_th%E1%BA%BF_gi%E1%BB%9Bi_th%E1%BB%A9_hai\">Thế chiến II</a>&nbsp;. C&aacute;c&nbsp;<a title=\"Transistor\" href=\"https://vi.wikipedia.org/wiki/Transistor\">b&oacute;ng</a>&nbsp;<a title=\"Chất b&aacute;n dẫn\" href=\"https://vi.wikipedia.org/wiki/Ch%E1%BA%A5t_b%C3%A1n_d%E1%BA%ABn\">b&aacute;n dẫn</a>&nbsp;đầu ti&ecirc;n v&agrave;o cuối những năm 1940 được tiếp nối bằng c&ocirc;ng nghệ chip&nbsp;<a title=\"MOSFET\" href=\"https://vi.wikipedia.org/wiki/MOSFET\">MOSFET</a>&nbsp;(b&oacute;ng b&aacute;n dẫn MOS) dựa tr&ecirc;n&nbsp;<a title=\"Silic\" href=\"https://vi.wikipedia.org/wiki/Silic\">silicon</a>&nbsp;v&agrave;&nbsp;<a title=\"Vi mạch\" href=\"https://vi.wikipedia.org/wiki/Vi_m%E1%BA%A1ch\">mạch t&iacute;ch hợp nguy&ecirc;n khối</a>&nbsp;(IC) v&agrave;o cuối những năm 1950, dẫn đến&nbsp;<a class=\"mw-redirect\" title=\"Lịch sử m&aacute;y t&iacute;nh c&aacute; nh&acirc;n\" href=\"https://vi.wikipedia.org/wiki/L%E1%BB%8Bch_s%E1%BB%AD_m%C3%A1y_t%C3%ADnh_c%C3%A1_nh%C3%A2n\">cuộc c&aacute;ch mạng</a>&nbsp;<a title=\"Vi xử l&yacute;\" href=\"https://vi.wikipedia.org/wiki/Vi_x%E1%BB%AD_l%C3%BD\">vi xử l&yacute;</a>&nbsp;v&agrave;&nbsp;<a class=\"mw-redirect\" title=\"Lịch sử m&aacute;y t&iacute;nh c&aacute; nh&acirc;n\" href=\"https://vi.wikipedia.org/wiki/L%E1%BB%8Bch_s%E1%BB%AD_m%C3%A1y_t%C3%ADnh_c%C3%A1_nh%C3%A2n\">vi m&aacute;y t&iacute;nh</a>&nbsp;v&agrave;o những năm 1970. Tốc độ, sức mạnh v&agrave; t&iacute;nh linh hoạt của m&aacute;y t&iacute;nh đ&atilde; tăng l&ecirc;n đ&aacute;ng kể kể từ đ&oacute;, với&nbsp;<a class=\"new\" title=\"Đếm b&oacute;ng b&aacute;n dẫn (trang chưa được viết)\" href=\"https://vi.wikipedia.org/w/index.php?title=%C4%90%E1%BA%BFm_b%C3%B3ng_b%C3%A1n_d%E1%BA%ABn&amp;action=edit&amp;redlink=1\">số lượng b&oacute;ng b&aacute;n dẫn</a>&nbsp;tăng với tốc độ nhanh ch&oacute;ng (theo dự đo&aacute;n&nbsp;<a title=\"Định luật Moore\" href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BB%8Bnh_lu%E1%BA%ADt_Moore\">của định luật Moore</a>&nbsp;), dẫn đến&nbsp;<a title=\"C&aacute;ch mạng c&ocirc;ng nghiệp lần thứ ba\" href=\"https://vi.wikipedia.org/wiki/C%C3%A1ch_m%E1%BA%A1ng_c%C3%B4ng_nghi%E1%BB%87p_l%E1%BA%A7n_th%E1%BB%A9_ba\">cuộc C&aacute;ch mạng Kỹ thuật số</a>&nbsp;trong khoảng cuối thế kỷ 20 đến đầu thế kỷ 21.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '40000000', '3369a602db.jpg'),
(28, 'Máy Xay Sinh Tố', 18, 9, '<p><span>Chọn&nbsp;</span><a href=\"https://dienmaycholon.vn/may-xay-sinh-to\">mua m&aacute;y xay sinh tố</a><span>&nbsp;như thế n&agrave;o? M&aacute;y xay sinh tố h&atilde;ng n&agrave;o tốt nhất hiện nay giữa c&aacute;c nh&atilde;n hiệu như: Philips, Midea, Kitchenlux, Commet, Aqua... Được rất nhiều kh&aacute;ch h&agrave;ng quan t&acirc;m tr&ecirc;n diễn đ&agrave;n&nbsp;</span><a href=\"https://dienmaycholon.vn/\">Điện m&aacute;y Chợ Lớn</a><span>&nbsp;cũng như c&aacute;c diễn đ&agrave;n lớn kh&aacute;c. V&igrave; vậy b&agrave;i viết n&agrave;y ch&uacute;ng t&ocirc;i chia sẻ gi&uacute;p gi&uacute;p c&aacute;c bạn giải quyết được những băn khoăn lo lắng, qua đ&oacute; chọn được cho m&igrave;nh chiếc m&aacute;y xay sinh tố tốt nhất. H&atilde;y c&ugrave;ng tham khảo nh&eacute;</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '2000000', '6c501491c5.png'),
(29, 'Quạt ', 17, 10, '<p>Quạt l&agrave; thiết bị d&ugrave;ng để cung cấp gi&oacute; l&agrave;m m&aacute;t cho con người, vật nu&ocirc;i, m&aacute;y m&oacute;c. C&oacute; 2 loại quạt phổ biến hiện nay tr&ecirc;n thị trường đ&oacute; l&agrave; quạt thổi gi&oacute; v&agrave; quạt h&uacute;t gi&oacute;.</p>\r\n<p>Ng&agrave;y xa xưa &ocirc;ng b&agrave; ta đ&atilde; biết d&ugrave;ng c&aacute;c vật dụng như l&aacute; cau hoặc c&agrave;nh c&acirc;y để l&agrave;m m&aacute;t cho cơ thể, gi&uacute;p đuổi c&ocirc;n tr&ugrave;ng như muỗi, kiến. Vậy l&agrave; quạt ra đời từ đ&oacute;.</p>\r\n<p>Ng&agrave;y nay với sự ph&aacute;t triển của khoa học c&ocirc;ng nghệ. Ch&uacute;ng ta đ&atilde; được sở hữu những chiếc quạt điện với rất nhiều chủng loại như quạt treo, quạt đứng.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '3000000', '56058b4a2d.jpg'),
(30, 'Máy Ảnh', 16, 3, '<p><strong>M&aacute;y ảnh</strong><span>&nbsp;hay&nbsp;</span><strong>m&aacute;y chụp h&igrave;nh</strong><span>&nbsp;l&agrave; một dụng cụ d&ugrave;ng để thu ảnh th&agrave;nh một&nbsp;</span><a class=\"mw-redirect\" title=\"Ảnh\" href=\"https://vi.wikipedia.org/wiki/%E1%BA%A2nh\">ảnh</a><span>&nbsp;tĩnh hay th&agrave;nh một loạt c&aacute;c ảnh chuyển động (gọi l&agrave;&nbsp;</span><a class=\"mw-disambig\" title=\"Phim (định hướng)\" href=\"https://vi.wikipedia.org/wiki/Phim_(%C4%91%E1%BB%8Bnh_h%C6%B0%E1%BB%9Bng)\">phim</a><span>&nbsp;hay&nbsp;</span><a title=\"Video\" href=\"https://vi.wikipedia.org/wiki/Video\">video</a><span>). T&ecirc;n camera c&oacute; gốc từ tiếng&nbsp;</span><a class=\"mw-redirect\" title=\"Latinh\" href=\"https://vi.wikipedia.org/wiki/Latinh\">La tinh</a><span>&nbsp;</span><em>camera obscura</em><span>&nbsp;nghĩa l&agrave; \"ph&ograve;ng tối\", từ l&yacute; do&nbsp;</span><em>m&aacute;y ảnh</em><span>&nbsp;đầu ti&ecirc;n l&agrave; một c&aacute;i ph&ograve;ng tối với v&agrave;i người l&agrave;m việc trong đ&oacute;. Chức năng của m&aacute;y ảnh giống với mắt người. M&aacute;y ảnh c&oacute; thể l&agrave;m việc ở phổ&nbsp;</span><a class=\"mw-redirect\" title=\"&Aacute;nh s&aacute;ng thấy được\" href=\"https://vi.wikipedia.org/wiki/%C3%81nh_s%C3%A1ng_th%E1%BA%A5y_%C4%91%C6%B0%E1%BB%A3c\">&aacute;nh s&aacute;ng nh&igrave;n thấy</a><span>&nbsp;hoặc ở c&aacute;c v&ugrave;ng kh&aacute;c trong phổ&nbsp;</span><a title=\"Bức xạ điện từ\" href=\"https://vi.wikipedia.org/wiki/B%E1%BB%A9c_x%E1%BA%A1_%C4%91i%E1%BB%87n_t%E1%BB%AB\">bức xạ điện từ</a><span>.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '2000000', 'e84a84b211.jpg'),
(32, 'Iphone 6s', 21, 3, '<p><span>iPhone 6s được n&acirc;ng cấp độ ph&acirc;n giải camera sau l&ecirc;n 12 MP (thay v&igrave; 8 MP như tr&ecirc;n iPhone 6) camera c&oacute; tốc độ lấy n&eacute;t v&agrave; chụp nhanh, thao t&aacute;c chạm để chụp nhẹ nh&agrave;ng. Chất lượng ảnh trong c&aacute;c điều kiện chụp kh&aacute;c nhau tốt.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '12000000', 'd135a40cb3.jpeg'),
(33, 'Iphone6', 21, 3, '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '3000000', 'bb0ea0625d.jpeg'),
(35, 'Iphone. 6 ', 21, 3, '<p><strong>iPhone 6S</strong>&nbsp;v&agrave;&nbsp;<strong>iPhone 6S Plus</strong>(hay c&ograve;n c&oacute; c&aacute;ch viết kh&aacute;c l&agrave;&nbsp;<strong>iPhone 6s</strong>&nbsp;v&agrave;&nbsp;<strong>iPhone 6s Plus</strong>) l&agrave; những chiếc&nbsp;<a class=\"mw-redirect\" title=\"Smartphone\" href=\"https://vi.wikipedia.org/wiki/Smartphone\">smartphone</a>&nbsp;được thiết kế bởi&nbsp;<a title=\"Apple Inc.\" href=\"https://vi.wikipedia.org/wiki/Apple_Inc.\">Apple Inc.</a>. iPhone 6S v&agrave; iPhone 6S Plus l&agrave; hai điện thoại&nbsp;<a title=\"IPhone\" href=\"https://vi.wikipedia.org/wiki/IPhone\">iPhone</a>&nbsp;được giới thiệu v&agrave;o 9 th&aacute;ng 9 năm 2015, tại&nbsp;<a class=\"new\" title=\"Bill Graham Civic Auditorium (trang chưa được viết)\" href=\"https://vi.wikipedia.org/w/index.php?title=Bill_Graham_Civic_Auditorium&amp;action=edit&amp;redlink=1\">Bill Graham Civic Auditorium</a>&nbsp;ở&nbsp;<a title=\"San Francisco\" href=\"https://vi.wikipedia.org/wiki/San_Francisco\">San Francisco</a>&nbsp;bởi Gi&aacute;m đốc điều h&agrave;nh&nbsp;<a title=\"Tim Cook\" href=\"https://vi.wikipedia.org/wiki/Tim_Cook\">Tim Cook</a>. Chiếc iPhone 6S v&agrave; iPhone 6S Plus l&agrave; những sản phẩm kế tiếp của&nbsp;<a title=\"IPhone 6\" href=\"https://vi.wikipedia.org/wiki/IPhone_6\">iPhone 6</a>&nbsp;v&agrave; iPhone 6 Plus, được ra mắt v&agrave;o 2014.<sup id=\"cite_ref-cnet-apple-unveils-ip6s-ip6splus_16-0\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_6S#cite_note-cnet-apple-unveils-ip6s-ip6splus-16\">[16]</a></sup></p>\r\n<p>Hai chiếc iPhone 6S v&agrave; iPhone 6S Plus kh&ocirc;ng thay đổi g&igrave; nhiều về thiết kế so với người tiền nhiệm. Tuy nhi&ecirc;n, n&oacute; được trang bị nhiều t&iacute;nh năng mới bao gồm c&ocirc;ng nghệ cảm ứng lực 3D Touch mới, camera trước v&agrave; sau đều được n&acirc;ng cấp, bộ vi xử l&yacute; nhanh hơn; bộ vỏ mới được sử dụng vật liệu nh&ocirc;m Series 7000, m&aacute;y sẽ nhẹ v&agrave; chịu lực uốn cong tốt hơn;<sup id=\"cite_ref-wired-cantseechange_17-0\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_6S#cite_note-wired-cantseechange-17\">[17]</a></sup>&nbsp;cảm biến v&acirc;n tay Touch ID thế hệ thứ hai; kết nối&nbsp;<a class=\"mw-redirect\" title=\"LTE\" href=\"https://vi.wikipedia.org/wiki/LTE\">LTE</a>&nbsp;v&agrave;&nbsp;<a title=\"Wi-Fi\" href=\"https://vi.wikipedia.org/wiki/Wi-Fi\">Wi-Fi</a>&nbsp;ti&ecirc;n tiến hơn v&agrave; c&ograve;n c&oacute; th&ecirc;m m&agrave;u V&agrave;ng Hồng b&ecirc;n cạnh c&aacute;c m&agrave;u X&aacute;m, Bạc v&agrave;ng xuất hiện tr&ecirc;n c&aacute;c thế hệ trước. C&aacute;c thiết bị đều đ&atilde; được c&agrave;i đặt sẵn hệ điều h&agrave;nh&nbsp;<a title=\"IOS 9\" href=\"https://vi.wikipedia.org/wiki/IOS_9\">iOS 9</a>.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '23000000', '5cd62a4df5.jpeg'),
(36, 'Iphone 7 ', 16, 9, '<p><span>Về thiết kế, vẫn l&agrave; nh&ocirc;m nguy&ecirc;n khối liền lạc nhưng iPhone 7 Plus đ&atilde; c&oacute; những n&eacute;t thay đổi tinh tế khi đưa hai dải ăng-ten l&ecirc;n s&aacute;t hai cạnh tr&ecirc;n dưới, đồng thời bỏ đi jack cắm tai nghe 3.5 mm. Điểm nhấn ấn tượng nhất về ngoại h&igrave;nh của iPhone 7 Plus l&agrave; việc Apple bỏ đi m&agrave;u x&aacute;m kh&ocirc;ng gian từng rất được ưa chuộng tr&ecirc;n c&aacute;c model cũ để bổ sung th&ecirc;m t&ugrave;y chọn m&agrave;u đen mờ (m&agrave;u đen b&oacute;ng Jet Black chỉ c&oacute; tr&ecirc;n iPhone 7 Plus bản 128/256 GB).</span></p>\r\n<p><span>iPhone 7 Plus cũng c&oacute; m&agrave;n h&igrave;nh rộng 5.5 inch độ ph&acirc;n giải 1080&times;1920 pixels tương tự iPhone 6s Plus, như vậy về k&iacute;ch thước tổng thể ch&uacute;ng ta kh&ocirc;ng c&oacute; g&igrave; thay đổi. Tuy nhi&ecirc;n, tấm nền m&agrave;n h&igrave;nh mới đ&atilde; được bổ sung th&ecirc;m 25% độ s&aacute;ng, đạt mức cao nhất 625 nits c&ugrave;ng khả năng t&aacute;i tạo m&agrave;u sắc, gam m&agrave;u rộng hơn v&agrave; hỗ trợ 3D Touch.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '3000000', 'e5959adbc3.jpeg'),
(37, 'Iphone 7 pro', 21, 7, '<p>Với chiếc điện thoại thế hệ mới,&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/dau-la-diem-khac-biet-giua-iphone-7-plus-voi-6-plus-va-6s-plus-45328\" rel=\"noopener\" target=\"_blank\">Apple đ&atilde; &ldquo;xo&aacute; sổ&rdquo; ho&agrave;n to&agrave;n n&uacute;t bấm vật l&yacute; tr&ecirc;n m&agrave;n h&igrave;nh iPhone</a>. Giờ đ&acirc;y n&uacute;t Home ở vị tr&iacute; cũ đ&atilde; trở th&agrave;nh cảm ứng, khi bạn nhấn xuống n&oacute; vẫn cảm nhận được lực nhấn v&agrave; sẽ rung nhẹ để bạn biết rằng bạn đ&atilde; tương t&aacute;c. Apple đ&atilde; sử dụng Taptic Engine tr&ecirc;n Force Touch của Macbook cho chiếc iPhone mới n&agrave;y. Mặc d&ugrave; vậy ph&iacute;m Home vẫn c&oacute; cảm biến v&acirc;n tay Touch ID v&agrave; t&iacute;ch hợp nhiều t&iacute;nh năng bảo mật.</p>\r\n<h3><strong>Camera chất lượng đột ph&aacute; như m&aacute;y ảnh chuy&ecirc;n nghiệp</strong></h3>\r\n<p>iPhone 7 Plus đi k&egrave;m với một camera k&eacute;p độ ph&acirc;n giải đồng thời 12 MP, trong số đ&oacute; c&oacute; một ống k&iacute;nh g&oacute;c rộng khẩu độ l&ecirc;n đến f/1.8 v&agrave; một ống k&iacute;nh zoom (tele) l&ecirc;n đến 10x, c&ugrave;ng t&iacute;nh năng ổn định h&igrave;nh ảnh quang học tự động.&nbsp;N&oacute; cũng bao gồm một đ&egrave;n flash 2 t&ocirc;ng m&agrave;u v&agrave; đ&egrave;n flash quad-LED.&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/so-sanh-kha-nang-quay-video-4k-cua-iphone-7-plus-va-google-pixel-xl-44886\" rel=\"noopener\" target=\"_blank\">Camera iPhone 7 Plus hỗ trợ quay film 4K</a>&nbsp;60fps, chụp x&oacute;a ph&ocirc;ng, chụp trước lấy n&eacute;t sau như một m&aacute;y ảnh chuy&ecirc;n nghiệp. Camera trước độ ph&acirc;n giải 7 MP, chụp selfie tốt hơn v&agrave; tự động chống rung. B&ecirc;n cạnh đ&oacute;, iOS 10 cũng cho ph&eacute;p người d&ugrave;ng iPhone 7 Plus chỉnh sửa, chọn lựa ảnh từ Live Photos, lưu ảnh ở định dạng RAW.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '3000000', '5ae6590fb2.jpeg'),
(38, 'Iphone 7 plus', 21, 3, '<p>Với chiếc điện thoại thế hệ mới,&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/dau-la-diem-khac-biet-giua-iphone-7-plus-voi-6-plus-va-6s-plus-45328\" rel=\"noopener\" target=\"_blank\">Apple đ&atilde; &ldquo;xo&aacute; sổ&rdquo; ho&agrave;n to&agrave;n n&uacute;t bấm vật l&yacute; tr&ecirc;n m&agrave;n h&igrave;nh iPhone</a>. Giờ đ&acirc;y n&uacute;t Home ở vị tr&iacute; cũ đ&atilde; trở th&agrave;nh cảm ứng, khi bạn nhấn xuống n&oacute; vẫn cảm nhận được lực nhấn v&agrave; sẽ rung nhẹ để bạn biết rằng bạn đ&atilde; tương t&aacute;c. Apple đ&atilde; sử dụng Taptic Engine tr&ecirc;n Force Touch của Macbook cho chiếc iPhone mới n&agrave;y. Mặc d&ugrave; vậy ph&iacute;m Home vẫn c&oacute; cảm biến v&acirc;n tay Touch ID v&agrave; t&iacute;ch hợp nhiều t&iacute;nh năng bảo mật.</p>\r\n<h3><strong>Camera chất lượng đột ph&aacute; như m&aacute;y ảnh chuy&ecirc;n nghiệp</strong></h3>\r\n<p>iPhone 7 Plus đi k&egrave;m với một camera k&eacute;p độ ph&acirc;n giải đồng thời 12 MP, trong số đ&oacute; c&oacute; một ống k&iacute;nh g&oacute;c rộng khẩu độ l&ecirc;n đến f/1.8 v&agrave; một ống k&iacute;nh zoom (tele) l&ecirc;n đến 10x, c&ugrave;ng t&iacute;nh năng ổn định h&igrave;nh ảnh quang học tự động.&nbsp;N&oacute; cũng bao gồm một đ&egrave;n flash 2 t&ocirc;ng m&agrave;u v&agrave; đ&egrave;n flash quad-LED.&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/so-sanh-kha-nang-quay-video-4k-cua-iphone-7-plus-va-google-pixel-xl-44886\" rel=\"noopener\" target=\"_blank\">Camera iPhone 7 Plus hỗ trợ quay film 4K</a>&nbsp;60fps, chụp x&oacute;a ph&ocirc;ng, chụp trước lấy n&eacute;t sau như một m&aacute;y ảnh chuy&ecirc;n nghiệp. Camera trước độ ph&acirc;n giải 7 MP, chụp selfie tốt hơn v&agrave; tự động chống rung. B&ecirc;n cạnh đ&oacute;, iOS 10 cũng cho ph&eacute;p người d&ugrave;ng iPhone 7 Plus chỉnh sửa, chọn lựa ảnh từ Live Photos, lưu ảnh ở định dạng RAW.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '23000000', 'b22223af70.jpeg'),
(39, 'Iphone 7 ', 8, 1, '<p>Sau khi chỉ c&oacute; sự n&acirc;ng cấp nhỏ tr&ecirc;n bộ đ&ocirc;i iPhone 6S/6S Plus năm ngo&aacute;i, Apple đ&atilde; tr&igrave;nh l&agrave;ng phi&ecirc;n bản iPhone 7 ho&agrave;n to&agrave;n mới với nhiều sự cải tiến hơn.</p>\r\n<p>Về thiết kế tổng thể, iPhone 7/7 Plus vẫn giữ phong c&aacute;ch thiết kế với c&aacute;c cạnh bo tr&ograve;n v&agrave; c&aacute;c g&oacute;c tr&ograve;n như phi&ecirc;n bản iPhone ra mắt v&agrave;o năm ngo&aacute;i, tuy nhi&ecirc;n điểm kh&aacute;c biệt dễ nhận ra đ&oacute; l&agrave; dải ăng-ten ở mặt sau của m&aacute;y đ&atilde; được loại bỏ bằng c&aacute;ch đưa l&ecirc;n ở cạnh tr&ecirc;n v&agrave; dưới của sản phẩm.</p>\r\n<p>Giống với phi&ecirc;n bản m&agrave;u v&agrave;ng hồng lần đầu xuất hiện tr&ecirc;n iPhone 6S/6S Plus, bộ đ&ocirc;i iPhone 7 cũng được xuất hiện với m&agrave;u mới c&oacute; t&ecirc;n gọi &ldquo;Jet Black&rdquo; (đen hạt huyền), với một m&agrave;u đen tuyền, thay v&igrave; đen x&aacute;m như c&aacute;c phi&ecirc;n bản trước đ&acirc;y. B&ecirc;n cạnh đ&oacute;, bộ đ&ocirc;i iPhone mới cũng sở hữu c&aacute;c m&agrave;u sắc quen thuộc như đen th&ocirc;ng thường, v&agrave;ng, bạc v&agrave; v&agrave;ng hồng.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '3000000', 'e9ae824a73.jpg'),
(40, 'Iphone 8plus', 14, 7, '<p>Apple cũng đ&atilde; thiết kế lại n&uacute;t Home, được xem l&agrave; biểu tượng của d&ograve;ng iPhone, gi&uacute;p cảm nhận được lực nhấn n&uacute;t của người d&ugrave;ng, tương tự như c&ocirc;ng nghệ Force Touch tr&ecirc;n b&agrave;n cảm ứng trackpad m&aacute;y t&iacute;nh x&aacute;ch tay MacBook được ra mắt gần đ&acirc;y của Apple, cho ph&eacute;p đưa ra c&aacute;c phản hồi kh&aacute;c nhau t&ugrave;y thuộc v&agrave;o mức độ nhấn n&uacute;t Home của người d&ugrave;ng.</p>\r\n<p>Điểm n&acirc;ng cấp ấn tượng đầu ti&ecirc;n tr&ecirc;n bộ đ&ocirc;i iPhone 7 mới đ&oacute; l&agrave; hệ thống camera. Trong khi phi&ecirc;n bản iPhone 7 th&ocirc;ng thường sở hữu camera đơn th&igrave; iPhone 7 Plus sở hữu hệ thống camera k&eacute;p. C&ocirc;ng nghệ ổn định h&igrave;nh ảnh quang học đ&atilde; được mang l&ecirc;n cả phi&ecirc;n bản iPhone 7 th&ocirc;ng thường (trước đ&acirc;y iPhone 6 v&agrave; 6S kh&ocirc;ng được trang bị c&ocirc;ng nghệ n&agrave;y).</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '23000000', '649d007db0.jpeg'),
(41, 'Iphone 8s', 21, 6, '<p><strong>iPhone 8</strong>&nbsp;v&agrave;&nbsp;<strong>iPhone 8 Plus</strong>&nbsp;l&agrave; bộ đ&ocirc;i điện thoại th&ocirc;ng minh do&nbsp;<a title=\"Apple Inc.\" href=\"https://vi.wikipedia.org/wiki/Apple_Inc.\">Apple Inc.</a>&nbsp;thiết kế, ph&aacute;t triển v&agrave; kinh doanh tr&ecirc;n thị trường. N&oacute; được c&ocirc;ng bố bởi CEO&nbsp;<a title=\"Tim Cook\" href=\"https://vi.wikipedia.org/wiki/Tim_Cook\">Tim Cook</a>&nbsp;v&agrave;o ng&agrave;y 12 th&aacute;ng 9 năm 2017 c&ugrave;ng với chiếc&nbsp;<a title=\"IPhone X\" href=\"https://vi.wikipedia.org/wiki/IPhone_X\">iPhone X</a>. Mẫu m&aacute;y n&agrave;y l&agrave; sản phẩm kế nhiệm cho bộ đ&ocirc;i&nbsp;<a title=\"IPhone 7\" href=\"https://vi.wikipedia.org/wiki/IPhone_7\">iPhone 7</a>&nbsp;v&agrave;&nbsp;<a title=\"IPhone 7\" href=\"https://vi.wikipedia.org/wiki/IPhone_7\">iPhone 7 Plus</a>. Sản phẩm ch&iacute;nh thức được ph&aacute;t h&agrave;nh tr&ecirc;n to&agrave;n thế giới v&agrave;o ng&agrave;y 22 th&aacute;ng 9 năm 2017.<sup id=\"cite_ref-6\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_8#cite_note-6\">[6]</a></sup></p>\r\n<p>iPhone 8 v&agrave; iPhone 8 Plus l&agrave; bộ đ&ocirc;i điện thoại b&aacute;n chạy nhất thế giới năm 2017 v&agrave; từ đ&oacute; đến nay, sản phẩm lu&ocirc;n nằm trong danh s&aacute;ch những điện thoại th&ocirc;ng minh b&aacute;n chạy nhất thế giớ</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '40000000', 'e16b9ad007.jpeg'),
(42, 'Iphone 8plus', 21, 3, '<ul>\r\n<li>M&aacute;y c&oacute;&nbsp;<a title=\"M&agrave;n h&igrave;nh Retina\" href=\"https://vi.wikipedia.org/wiki/M%C3%A0n_h%C3%ACnh_Retina\">m&agrave;n h&igrave;nh Retina</a>&nbsp;HD, với tấm nền LCD cảm ứng chạm đa điểm, c&ocirc;ng nghệ IPS v&agrave; 3D Touch.</li>\r\n<li>K&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 4,7 inch, độ ph&acirc;n giải 1334&times;750 pixel, với&nbsp;<a title=\"Mật độ điểm ảnh\" href=\"https://vi.wikipedia.org/wiki/M%E1%BA%ADt_%C4%91%E1%BB%99_%C4%91i%E1%BB%83m_%E1%BA%A3nh\">mật độ điểm ảnh</a>&nbsp;326 ppi.</li>\r\n<li>Độ tương phản của m&aacute;y l&agrave; 1400:1, l&agrave; m&agrave;n h&igrave;nh True Tone, c&oacute; dải m&agrave;u rộng P3</li>\r\n<li>Hệ thống miền pixel k&eacute;p cho g&oacute;c nh&igrave;n rộng v&agrave; độ s&aacute;ng tối đa l&ecirc;n tới 625&nbsp;cd/m<sup>2</sup>.</li>\r\n<li>M&agrave;n h&igrave;nh c&oacute; lớp phủ&nbsp;<em>eleophobic</em>&nbsp;c&oacute; nhiệm vụ chống b&aacute;m v&acirc;n tay.</li>\r\n<li>\r\n<ul>\r\n<li>M&aacute;y c&oacute; m&agrave;n h&igrave;nh Retina HD, với tấm nền LCD cảm ứng chạm đa điểm, c&ocirc;ng nghệ IPS v&agrave; 3D Touch.</li>\r\n<li>K&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 5,5 inch, độ ph&acirc;n giải 1920&times;1080 pixel, với mật độ điểm ảnh 401 ppi.</li>\r\n<li>Độ tương phản của m&aacute;y l&agrave; 1300:1, l&agrave; m&agrave;n h&igrave;nh True Tone, c&oacute; dải m&agrave;u rộng P3</li>\r\n<li>Hệ thống miền pixel k&eacute;p cho g&oacute;c nh&igrave;n rộng v&agrave; độ s&aacute;ng tối đa l&ecirc;n tới 625&nbsp;cd/m<sup>2</sup>.</li>\r\n<li>M&agrave;n h&igrave;nh c&oacute; lớp phủ&nbsp;<em>eleophobic</em>&nbsp;c&oacute; nhiệm vụ chống b&aacute;m v&acirc;n tay</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '40000000', 'e863aaad34.jpeg'),
(43, 'Iphone 9s', 21, 3, '<p><span>Thiết bị sử dụng con chip&nbsp;</span><a title=\"Apple A11\" href=\"https://vi.wikipedia.org/wiki/Apple_A11\">Apple A11 Bionic</a><span>. H&atilde;ng th&ocirc;ng b&aacute;o rằng khi sử dụng 4 l&otilde;i hiệu suất trong tất cả c&aacute;c CPU sẽ cho ra kết quả nhanh hơn 70% v&agrave; khi sử dụng 2 l&otilde;i CPU, kết quả cho ra nhanh hơn 25% khi so s&aacute;nh với&nbsp;</span><a title=\"Apple A10\" href=\"https://vi.wikipedia.org/wiki/Apple_A10\">A10 Fusion</a><span>. GPU ba l&otilde;i do Apple thiết kế cũng nhanh hơn tới 30% so với A10 Fusion. A11 Bionic sẽ mang lại trải nghiệm&nbsp;</span><a title=\"Thực tế ảo\" href=\"https://vi.wikipedia.org/wiki/Th%E1%BB%B1c_t%E1%BA%BF_%E1%BA%A3o\">thực tế ảo</a><span>&nbsp;tăng cường tốt hơn trong c&aacute;c tr&ograve; chơi v&agrave; ứng dụng.</span><sup id=\"cite_ref-12\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_8#cite_note-12\">[12]</a></sup></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '40000000', '57e17cedb7.png'),
(44, 'Iphone 9plus', 12, 7, '<p>Phi&ecirc;n bản iPhone đầu ti&ecirc;n ra mắt ng&agrave;y 09 th&aacute;ng 01 năm 2007 v&agrave; l&ecirc;n kệ b&aacute;n v&agrave;o ng&agrave;y 29 th&aacute;ng 6 năm 2007&nbsp;<sup id=\"cite_ref-15\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone#cite_note-15\">[15]</a></sup>. B&ecirc;n cạnh t&iacute;nh năng của một m&aacute;y điện thoại th&ocirc;ng thường (hoạt động tr&ecirc;n bốn băng tần&nbsp;<a title=\"Hệ thống th&ocirc;ng tin di động to&agrave;n cầu\" href=\"https://vi.wikipedia.org/wiki/H%E1%BB%87_th%E1%BB%91ng_th%C3%B4ng_tin_di_%C4%91%E1%BB%99ng_to%C3%A0n_c%E1%BA%A7u\">GSM</a>&nbsp;v&agrave;&nbsp;<a title=\"EDGE\" href=\"https://vi.wikipedia.org/wiki/EDGE\">EDGE</a>), iPhone c&ograve;n được trang bị&nbsp;<a title=\"M&agrave;n h&igrave;nh cảm ứng\" href=\"https://vi.wikipedia.org/wiki/M%C3%A0n_h%C3%ACnh_c%E1%BA%A3m_%E1%BB%A9ng\">m&agrave;n h&igrave;nh cảm ứng</a>, camera, khả năng chơi nhạc v&agrave; chiếu phim (tương tự&nbsp;<a title=\"IPod\" href=\"https://vi.wikipedia.org/wiki/IPod\">iPod</a>), tr&igrave;nh duyệt&nbsp;<a title=\"World Wide Web\" href=\"https://vi.wikipedia.org/wiki/World_Wide_Web\">web</a>,... Phi&ecirc;n bản thứ hai l&agrave;&nbsp;<a title=\"IPhone 3G\" href=\"https://vi.wikipedia.org/wiki/IPhone_3G\">iPhone 3G</a>&nbsp;ra mắt th&aacute;ng 7 năm 2008, được trang bị th&ecirc;m&nbsp;<a class=\"mw-redirect\" title=\"Hệ thống định vị to&agrave;n cầu\" href=\"https://vi.wikipedia.org/wiki/H%E1%BB%87_th%E1%BB%91ng_%C4%91%E1%BB%8Bnh_v%E1%BB%8B_to%C3%A0n_c%E1%BA%A7u\">hệ thống định vị to&agrave;n cầu</a>&nbsp;(GPS), mạng 3G tốc độ cao (<a class=\"mw-redirect\" title=\"HSDPA\" href=\"https://vi.wikipedia.org/wiki/HSDPA\">HSDPA</a>).</p>\r\n<p>iPhone 3GS, phi&ecirc;n bản thứ ba, được c&ocirc;ng bố v&agrave;o ng&agrave;y 8 th&aacute;ng 6 năm 2009. Ng&agrave;y 19 th&aacute;ng 6, phi&ecirc;n bản mới n&agrave;y đ&atilde; được ph&acirc;n phối tại&nbsp;<a title=\"Hoa Kỳ\" href=\"https://vi.wikipedia.org/wiki/Hoa_K%E1%BB%B3\">Mỹ</a>,&nbsp;<a title=\"Việt Nam\" href=\"https://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam\">Việt Nam</a>,&nbsp;<a title=\"Canada\" href=\"https://vi.wikipedia.org/wiki/Canada\">Canada</a>&nbsp;v&agrave; một số nước&nbsp;<a title=\"Ch&acirc;u &Acirc;u\" href=\"https://vi.wikipedia.org/wiki/Ch%C3%A2u_%C3%82u\">ch&acirc;u &Acirc;u</a>; ng&agrave;y 26 th&aacute;ng 6 c&oacute; mặt tại&nbsp;<a title=\"&Uacute;c\" href=\"https://vi.wikipedia.org/wiki/%C3%9Ac\">&Uacute;c</a>; sau đ&oacute;, phi&ecirc;n bản&nbsp;<a title=\"Thế giới\" href=\"https://vi.wikipedia.org/wiki/Th%E1%BA%BF_gi%E1%BB%9Bi\">quốc tế</a>&nbsp;của iPhone 3GS cũng được ph&aacute;t h&agrave;nh v&agrave;o th&aacute;ng 7 v&agrave; th&aacute;ng 8 năm 2009. Thay đổi đ&aacute;ng kể nhất l&agrave; trong phi&ecirc;n bản điện thoại mới n&agrave;y l&agrave; Apple đ&atilde; n&acirc;ng cao hiệu năng của m&aacute;y (S trong 3GS l&agrave; Speed - Tốc độ). iPhone 3GS được trang bị&nbsp;<a title=\"Vi xử l&yacute;\" href=\"https://vi.wikipedia.org/wiki/Vi_x%E1%BB%AD_l%C3%BD\">bộ vi xử l&yacute;</a>&nbsp;tốc độ 600&nbsp;MHz (gấp gần 1,5 lần so với iPhone 3G),&nbsp;<a class=\"mw-redirect\" title=\"Bộ nhớ\" href=\"https://vi.wikipedia.org/wiki/B%E1%BB%99_nh%E1%BB%9B\">bộ nhớ</a>&nbsp;trong l&ecirc;n đến 32 GB,&nbsp;<a title=\"M&aacute;y ảnh số\" href=\"https://vi.wikipedia.org/wiki/M%C3%A1y_%E1%BA%A3nh_s%E1%BB%91\">camera</a>&nbsp;3.15 MP, t&iacute;ch hợp&nbsp;<a title=\"La b&agrave;n\" href=\"https://vi.wikipedia.org/wiki/La_b%C3%A0n\">la b&agrave;n</a>&nbsp;số v&agrave; h&agrave;ng loạt t&iacute;nh năng đ&aacute;ng gi&aacute; được n&acirc;ng cấp kh&aacute;c như tốc độ&nbsp;<a title=\"Wi-Fi\" href=\"https://vi.wikipedia.org/wiki/Wi-Fi\">Wi-Fi</a>, thời lượng pin, v.v...</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '40000000', '7d301ee5a7.jpeg'),
(45, 'Iphone XS', 21, 7, '<p><span>Về m&agrave;u sắc của thế hệ iPhone mới 2018 th&igrave; đối với&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/iphone-xs\">iPhone XS</a>&nbsp;sẽ c&oacute; 3 m&agrave;u đ&oacute; l&agrave;m bạc, x&aacute;m v&agrave; v&agrave;ng với k&iacute;ch thước vẫn được giữ nguy&ecirc;n như iPhone X v&agrave; m&agrave;n h&igrave;nh OLED sẽ l&agrave; 5.8 inch. Độ ph&acirc;n giải của n&oacute; đạt 2.436 x 1.125 với mật độ điểm ảnh 458 ppi.</span></p>\r\n<p><span>C&ograve;n t&igrave;m hiểu về&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/iphone-xs\">iPhone XS</a>&nbsp;Max, m&aacute;y sẽ c&oacute; k&iacute;ch thước m&agrave;n h&igrave;nh lớn l&ecirc;n đến 6.5 inch v&agrave; mật độ điểm ảnh 459 ppi, m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải 2.688 x 1.242.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '23000000', 'a839f225db.jpeg'),
(46, 'Iphone XS MAX', 16, 7, '<p><span>Theo th&ocirc;ng số&nbsp;<a title=\"iPhone XS\" href=\"https://iservice.vn/blogs/kinh-nghiem-mua-iphone/su-khac-nhau-giua-iphone-xs-iphone-xs-max-va-iphone-xr\"><span>iPhone XS</span></a>&nbsp;v&agrave; iPhone XS Max th&igrave; cả hai đều hỗ trợ chuẩn HDR 10 v&agrave; Dolby Vision. Ngo&agrave;i ra th&igrave; tần số được tăng l&ecirc;n 120 Hz tương tự như d&ograve;ng iPad Pro. Nếu x&eacute;t về mặt &acirc;m thanh th&igrave; iPhone XS sẽ c&oacute; &acirc;m thanh hai k&ecirc;nh rộng lớn tạo sự ấn tượng v&ocirc; c&ugrave;ng.</span></p>\r\n<p><span>Sức mạnh của c&aacute;c d&ograve;ng&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/iphone-xs\">iPhone XS</a>&nbsp;n&agrave;y cũng v&ocirc; c&ugrave;ng mạnh mẽ v&igrave; đ&atilde; được n&acirc;ng cấp về phần cứng. Theo đ&oacute; sản phẩm sở hữu vi xử l&yacute; Apple A12 Bionic v&agrave; đ&acirc;y ch&iacute;nh l&agrave; vi xử l&yacute; đầu ti&ecirc;n đ&atilde; được sản xuất tr&ecirc;n tiến tr&igrave;nh 7 nm. V&igrave; lẽ đ&oacute; mang lại rất nhiều những lợi &iacute;ch cũng như hiệu năng độc đ&aacute;o đảm bảo mang đến khả năng tiết kiệm pin hiệu quả.</span></p>\r\n<p><span>Gia đ&igrave;nh nh&agrave; T&aacute;o cũng đ&atilde; chia sẻ rằng A12 Bionic sẽ bao gồm CPU 6 nh&acirc;n v&agrave; GPU 4 nh&acirc;n v&agrave; chip xử l&yacute; l&agrave; AI Neural Engine 8 nh&acirc;n. B&ecirc;n cạnh đ&oacute; con chip cao cấp n&agrave;y cũng c&ograve;n t&iacute;ch hợp nhiều t&iacute;nh năng th&ocirc;ng minh gi&uacute;p xử l&yacute; h&igrave;nh ảnh, video v&agrave;&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/am-thanh\">&acirc;m thanh</a>&nbsp;thật dễ d&agrave;ng.</span></p>\r\n<p><span>N&oacute;i về hiệu năng v&agrave; ưu điểm của A12 Bionic th&igrave; n&oacute; mang đến hiệu năng CPU nhanh hơn đến 15% nhưng vẫn đảm bảo tiết kiệm 40% điện năng so với d&ograve;ng A11 Bionic. Ngo&agrave;i ra th&igrave; GPU tr&ecirc;n d&ograve;ng A12 cũng nhanh hơn đến 50%. N&oacute;i về chip Neural Engine th&igrave; n&oacute; c&oacute; thể đảm bảo xử l&yacute; đến 5 ngh&igrave;n tỷ lệnh cho mỗi gi&acirc;y. Đồng thời việc trang bị chip A12 Bionic c&ograve;n gi&uacute;p cho&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/iphone-x\">iPhone x</a>ử l&yacute; với bộ nhớ l&ecirc;n đến 512 GB.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '50000000', '4eea153ff8.jpeg'),
(47, 'Iphone XS PRO', 11, 7, '<p><span>Chiếc&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/iphone-xs\">iPhone XS</a>&nbsp;vẫn ho&agrave;n to&agrave;n được sử dụng camera k&eacute;p tương tự như l&agrave; chiếc iPhone X v&agrave; flash TrueTone đ&atilde; được n&acirc;ng cấp để đảm bảo c&acirc;n bằng &aacute;nh s&aacute;ng tốt hơn. Ngo&agrave;i ra n&oacute; cũng giảm thiểu được hiện tượng nh&aacute;y khi chụp dưới đ&egrave;n huỳnh quang. Ngo&agrave;i ra th&igrave; cảm biến tr&ecirc;n camera đ&atilde; được n&acirc;ng cấp l&ecirc;n r&otilde; rệt.</span></p>\r\n<p><span>N&oacute;i về t&iacute;nh năng chụp ảnh của mẫu&nbsp;<a class=\"mil\" href=\"https://iservice.vn/collections/iphone-xs\">iPhone XS</a>&nbsp;bạn cũng sẽ h&agrave;i l&ograve;ng v&ocirc; c&ugrave;ng bởi n&oacute; c&oacute; những cải tiến x&oacute;a ph&ocirc;ng c&ugrave;ng khả năng bắt chuyển động hữu hiệu. Chiếc iPhone XS n&agrave;y gi&uacute;p bạn ho&agrave;n to&agrave;n điều chỉnh được độ x&oacute;a ph&ocirc;ng sau khi chụp.</span></p>\r\n<p><span>Về camera trước của sản phẩm đ&atilde; được n&acirc;ng cấp nhẹ v&agrave; độ ph&acirc;n giải đạt 7 MP, cảm biến nhanh v&agrave; khẩu độ ống kinh cũng lớn hơn f/2.2. Nếu bạn th&iacute;ch quay phim cũng h&agrave;i l&ograve;ng v&ocirc; c&ugrave;ng bởi sự cải tiến nhờ sức mạnh A12 Bionic. Ch&iacute;nh v&igrave; lẽ đ&oacute; d&ograve;ng m&aacute;y n&agrave;y mang lại tốc độ bắt n&eacute;t cũng như đo s&aacute;ng nhanh, c&acirc;n bằng độ s&aacute;ng tốt.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '3000000', '27b3799ab2.jpeg'),
(48, 'Iphone 11', 21, 3, '<p><strong>iPhone 11</strong><span>&nbsp;l&agrave; chiếc điện thoại thuộc d&ograve;ng&nbsp;</span><a title=\"IPhone\" href=\"https://vi.wikipedia.org/wiki/IPhone\">iPhone</a><span>&nbsp;được ra mắt v&agrave;o ng&agrave;y&nbsp;</span><a title=\"10 th&aacute;ng 9\" href=\"https://vi.wikipedia.org/wiki/10_th%C3%A1ng_9\">10 th&aacute;ng 9</a><span>&nbsp;năm&nbsp;</span><a title=\"2019\" href=\"https://vi.wikipedia.org/wiki/2019\">2019</a><span>&nbsp;c&ugrave;ng với&nbsp;</span><a title=\"IPhone 11 Pro\" href=\"https://vi.wikipedia.org/wiki/IPhone_11_Pro\">iPhone 11 Pro</a><span>&nbsp;v&agrave;&nbsp;</span><a title=\"IPhone 11 Pro\" href=\"https://vi.wikipedia.org/wiki/IPhone_11_Pro\">iPhone 11 Pro Max</a><span>&nbsp;bởi CEO&nbsp;</span><a title=\"Tim Cook\" href=\"https://vi.wikipedia.org/wiki/Tim_Cook\">Tim Cook</a><span>. Đ&acirc;y l&agrave; phi&ecirc;n bản kế nhiệm của&nbsp;</span><a title=\"IPhone XR\" href=\"https://vi.wikipedia.org/wiki/IPhone_XR\">iPhone XR</a><span>, với gi&aacute; b&aacute;n khởi điểm l&agrave; 699&nbsp;</span><a class=\"mw-redirect\" title=\"USD\" href=\"https://vi.wikipedia.org/wiki/USD\">USD</a><span>, rẻ hơn 50 USD so với iPhone XR. iPhone 11 được trang bị&nbsp;</span><a title=\"Vi xử l&yacute;\" href=\"https://vi.wikipedia.org/wiki/Vi_x%E1%BB%AD_l%C3%BD\">vi xử l&yacute;</a><span>&nbsp;</span><a title=\"Apple A13\" href=\"https://vi.wikipedia.org/wiki/Apple_A13\">Apple A13 Bionic</a><span>&nbsp;c&ugrave;ng với&nbsp;</span><a title=\"M&aacute;y ảnh\" href=\"https://vi.wikipedia.org/wiki/M%C3%A1y_%E1%BA%A3nh\">m&aacute;y ảnh</a><span>&nbsp;k&eacute;p với t&iacute;nh năng chụp g&oacute;c si&ecirc;u rộng.</span><sup id=\"cite_ref-4\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-4\">[4]</a></sup><span>&nbsp;Tuy nhi&ecirc;n iPhone 11 chỉ được trang bị sẵn sạc phổ th&ocirc;ng 5W trong hộp giống với c&aacute;c thế hệ iPhone tiền nhiệm. Trong khi iPhone 11 Pro v&agrave; 11 Pro Max được trang bị sạc nhanh 18W, mặc d&ugrave; 3 phi&ecirc;n bản n&agrave;y đều sỡ hữu c&ocirc;ng nghệ sạc nhanh.</span><sup id=\"cite_ref-5\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-5\">[5]</a></sup><span>.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '23000000', '7059473a53.jpeg'),
(49, 'Iphone 11 pro', 10, 3, '<p>Trước khi ph&aacute;t h&agrave;nh ch&iacute;nh thức v&agrave;i tuần, th&ocirc;ng tin chi tiết li&ecirc;n quan đến điện thoại th&ocirc;ng minh đ&atilde; bị r&ograve; rỉ rộng r&atilde;i bao gồm th&ocirc;ng số kỹ thuật v&agrave; h&igrave;nh ảnh ho&agrave;n chỉnh của điện thoại. Nhiều trong số đ&oacute; dự đo&aacute;n ch&iacute;nh x&aacute;c, chẳng hạn như những cải tiến về camera v&agrave; việc giữ lại thiết kế \'notch\' xung quanh camera trước đ&atilde; c&oacute; kể từ&nbsp;<a title=\"IPhone X\" href=\"https://vi.wikipedia.org/wiki/IPhone_X\">iPhone X</a>. Lời mời tham gia sự kiện ch&iacute;nh thức của Apple được gửi tới c&aacute;c nh&agrave; ph&aacute;t triển trước một tuần diễn ra. H&igrave;nh ảnh biểu tượng l&agrave; logo Apple l&agrave;m bằng k&iacute;nh m&agrave;u xếp lớp, gợi &yacute; rằng sẽ c&oacute; m&agrave;u sắc mới cho điện thoại. Một bằng s&aacute;ng chế do Apple nộp v&agrave;o đầu năm, cũng tiết lộ d&ograve;ng iPhone 11 sẽ c&oacute; bố cục m&aacute;y ảnh mới.</p>\r\n<p>iPhone 11 được đặt trước từ ng&agrave;y&nbsp;<a title=\"13 th&aacute;ng 9\" href=\"https://vi.wikipedia.org/wiki/13_th%C3%A1ng_9\">13 th&aacute;ng 9</a>&nbsp;năm 2019 v&agrave; ch&iacute;nh thức mở b&aacute;n tại&nbsp;<a title=\"Apple Store\" href=\"https://vi.wikipedia.org/wiki/Apple_Store\">Apple Store</a>&nbsp;từ ng&agrave;y 20 th&aacute;ng 9 năm 2019. iPhone 11 được đ&aacute;nh gi&aacute; cao với sức mua lớn đến từ thị trường, đặc biệt l&agrave; thị trường&nbsp;<a title=\"Trung Quốc\" href=\"https://vi.wikipedia.org/wiki/Trung_Qu%E1%BB%91c\">Trung Quốc</a>. Kết th&uacute;c năm 2019, iPhone 11 trở th&agrave;nh&nbsp;<a title=\"Điện thoại th&ocirc;ng minh\" href=\"https://vi.wikipedia.org/wiki/%C4%90i%E1%BB%87n_tho%E1%BA%A1i_th%C3%B4ng_minh\">điện thoại th&ocirc;ng minh</a>&nbsp;b&aacute;n chạy thứ hai thế giới (với 37,3 triệu m&aacute;y), sau&nbsp;<a title=\"IPhone XR\" href=\"https://vi.wikipedia.org/wiki/IPhone_XR\">iPhone XR</a>&nbsp;(với 46,3 triệu m&aacute;y).</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '50000000', 'ecb4fbcb3b.jpeg');
INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(50, 'iphone 11 pro max', 21, 3, '<h3><span id=\"Phần_cứng\" class=\"mw-headline\">Phần cứng</span><span class=\"mw-editsection\"><span class=\"mw-editsection-bracket\">[</span><a class=\"mw-editsection-visualeditor\" title=\"Sửa đổi phần &ldquo;Phần cứng&rdquo;\" href=\"https://vi.wikipedia.org/w/index.php?title=IPhone_11&amp;veaction=edit&amp;section=4\">sửa</a><span class=\"mw-editsection-divider\">&nbsp;|&nbsp;</span><a title=\"Sửa đổi phần &ldquo;Phần cứng&rdquo;\" href=\"https://vi.wikipedia.org/w/index.php?title=IPhone_11&amp;action=edit&amp;section=4\">sửa m&atilde; nguồn</a><span class=\"mw-editsection-bracket\">]</span></span></h3>\r\n<p>iPhone 11, c&ugrave;ng với iPhone 11 Pro v&agrave; 11 Pro Max, được trang bị bộ xử l&yacute; mới&nbsp;<a title=\"Apple A13\" href=\"https://vi.wikipedia.org/wiki/Apple_A13\">A13 Bionic</a>&nbsp;(tiến tr&igrave;nh 7&nbsp;nm) với Neural Engine thế hệ thứ 3 t&acirc;n tiến nhất của Apple. iPhone 11 c&oacute; 3 t&ugrave;y chọn dung lượng lưu trữ: 64, 128 v&agrave; 256 GB c&ugrave;ng với 4 GB RAM.<sup id=\"cite_ref-6\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-6\">[6]</a></sup>&nbsp;N&oacute; c&ograve;n được trang bị ti&ecirc;u chuẩn chống nước, chống bụi IP68 (chịu được tối đa 2 m&eacute;t trong v&ograve;ng 30 ph&uacute;t). Ngo&agrave;i ra, giống c&aacute;c đời iPhone gần đ&acirc;y, cả hai mẫu đều kh&ocirc;ng c&oacute; giắc cắm tai nghe v&agrave; đi k&egrave;m với EarPods với đầu nối Lightning.</p>\r\n<h4><span id=\"M&agrave;n_h&igrave;nh\" class=\"mw-headline\">M&agrave;n h&igrave;nh</span><span class=\"mw-editsection\"><span class=\"mw-editsection-bracket\">[</span><a class=\"mw-editsection-visualeditor\" title=\"Sửa đổi phần &ldquo;M&agrave;n h&igrave;nh&rdquo;\" href=\"https://vi.wikipedia.org/w/index.php?title=IPhone_11&amp;veaction=edit&amp;section=5\">sửa</a><span class=\"mw-editsection-divider\">&nbsp;|&nbsp;</span><a title=\"Sửa đổi phần &ldquo;M&agrave;n h&igrave;nh&rdquo;\" href=\"https://vi.wikipedia.org/w/index.php?title=IPhone_11&amp;action=edit&amp;section=5\">sửa m&atilde; nguồn</a><span class=\"mw-editsection-bracket\">]</span></span></h4>\r\n<p>iPhone 11 c&oacute; m&agrave;n h&igrave;nh IPS LCD 6.1 inch Liquid Retina với viền d&agrave;y, trong khi 11 Pro v&agrave; 11 Pro Max sở hữu m&agrave;n h&igrave;nh&nbsp;<a class=\"mw-redirect\" title=\"OLED\" href=\"https://vi.wikipedia.org/wiki/OLED\">OLED</a>&nbsp;với viền m&agrave;n h&igrave;nh cực mỏng.</p>\r\n<p>Độ ph&acirc;n giải m&agrave;n h&igrave;nh n&agrave;y l&agrave; 1792&times;828 pixels (326 ppi), độ tương phản 1400:1 v&agrave; độ s&aacute;ng tối đa 625 nits, hỗ trợ Dolby Vision, HDR10, True-Tone c&ugrave;ng dải m&agrave;u rộng cho m&agrave;u sắc trung thực. Cũng như thế hệ iPhone X, m&agrave;n h&igrave;nh iPhone 11 c&oacute; kho&eacute;t \"tai thỏ\" ở ph&iacute;a tr&ecirc;n cho hệ thống camera TrueDepth v&agrave; loa thoại. Apple đ&atilde; c&ocirc;ng bố v&agrave;o th&aacute;ng 9 năm 2019 rằng cả iPhone 11 v&agrave; iPhone 11 Pro sẽ hiển thị th&ocirc;ng b&aacute;o cảnh b&aacute;o nếu m&agrave;n h&igrave;nh được thay thế tr&aacute;i ph&eacute;p bởi b&ecirc;n thứ 3. Apple cảnh b&aacute;o rằng c&aacute;c vấn đề với điện thoại c&oacute; thể ph&aacute;t sinh nếu c&oacute; c&aacute;c th&agrave;nh phần hoặc quy tr&igrave;nh sai trong qu&aacute; tr&igrave;nh sửa chữa.<sup id=\"cite_ref-7\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-7\">[7]</a></sup></p>\r\n<h4><span id=\"Camera\" class=\"mw-headline\">Camera</span><span class=\"mw-editsection\"><span class=\"mw-editsection-bracket\">[</span><a class=\"mw-editsection-visualeditor\" title=\"Sửa đổi phần &ldquo;Camera&rdquo;\" href=\"https://vi.wikipedia.org/w/index.php?title=IPhone_11&amp;veaction=edit&amp;section=6\">sửa</a><span class=\"mw-editsection-divider\">&nbsp;|&nbsp;</span><a title=\"Sửa đổi phần &ldquo;Camera&rdquo;\" href=\"https://vi.wikipedia.org/w/index.php?title=IPhone_11&amp;action=edit&amp;section=6\">sửa m&atilde; nguồn</a><span class=\"mw-editsection-bracket\">]</span></span></h4>\r\n<p>iPhone 11 c&oacute; camera k&eacute;p 12MP gồm 1 camera g&oacute;c si&ecirc;u rộng 120 độ khẩu độ &fnof;/2.4 cho khả năng zoom out 2&times; v&agrave; một camera g&oacute;c rộng khẩu độ &fnof;/1.8. C&oacute; thể quay phim 4K l&ecirc;n tới 60 fps v&agrave; quay slow-motion 1080p 240fps. Ngo&agrave;i ra n&oacute; c&ograve;n c&oacute; t&iacute;nh năng zoom audio giống như 11 Pro. IPhone 11 cũng sở hữu chế độ chụp ch&acirc;n dung x&oacute;a ph&ocirc;ng v&agrave; chế độ chụp đ&ecirc;m để cho ra những bức ảnh s&aacute;ng hơn, nhiều chi tiết hơn v&agrave; &iacute;t nhiễu hơn trong điều kiện thiếu s&aacute;ng. Apple c&ograve;n giới thiệu t&iacute;nh năng Deep Fusion mới ứng dụng sức mạnh của m&aacute;y học AI v&agrave; machine learning để xử l&yacute; h&igrave;nh ảnh.<sup id=\"cite_ref-:0_8-0\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-:0-8\">[8]</a></sup><sup id=\"cite_ref-GSM_9-0\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-GSM-9\">[9]</a></sup><sup id=\"cite_ref-10\" class=\"reference\"><a href=\"https://vi.wikipedia.org/wiki/IPhone_11#cite_note-10\">[10]</a></sup>&nbsp;Camera trước TrueDepth được n&acirc;ng l&ecirc;n 12MP khẩu độ &fnof;/2.2 hỗ trợ Face ID (cảm biển gương mặt 3D) với nhiều cải tiến về tốc độ.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 0, '50000000', '8ef451d7f8.jpeg'),
(51, 'Iphone 12', 21, 6, '<p>B&ecirc;n cạnh đ&oacute;, Apple đang t&igrave;m c&aacute;ch mở rộng ng&ocirc;n ngữ thiết kế iPad Pro tr&ecirc;n nhiều d&ograve;ng sản phẩm của m&igrave;nh.&nbsp;Theo những h&igrave;nh ảnh được trang&nbsp;PhoneArena&nbsp;tiết lộ, iPhone 12 Pro Max vẫn giữ nguy&ecirc;n thiết kế kh&aacute; giống iPhone 11 Pro Max.</p>\r\n<p>Tuy nhi&ecirc;n,<strong>&nbsp;khung m&aacute;y được thiết kế v&aacute;t phẳng</strong>&nbsp;tương tự như iPhone 4 chứ kh&ocirc;ng c&ograve;n bo cong về 2 cạnh như c&aacute;c iPhone tiền nhiệm. Đồng thời c&aacute;c cảm&nbsp;biến ở mặt trước như Face ID, camera trước... sẽ được sắp xếp lại gọn g&agrave;ng hơn nhờ đ&oacute; iPhone 12 sẽ c&oacute; phần tai thỏ được thiết kế nhỏ hơn.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '60000000', '47b91101de.jpeg'),
(52, 'iphone 12 XS MAX PRO', 21, 3, '<p>Đối với d&ograve;ng iPhone 12, c&ocirc;ng ty dự kiến sẽ trang bị&nbsp;<strong>RAM 6 GB</strong>&nbsp;tr&ecirc;n bản Pro. Điều n&agrave;y sẽ gi&uacute;p cải thiện đa nhiệm v&agrave; ph&ugrave; hợp với c&aacute;c t&iacute;nh năng đa nhiệm mới m&agrave; iOS 14 dự kiến ​​sẽ giới thiệu.</p>\r\n<p>Hiệu suất AI v&agrave; ISP cũng sẽ c&oacute; được sự tăng cường đ&aacute;ng ch&uacute; &yacute; với chip A14, điều rất cần thiết v&igrave; ng&agrave;y c&agrave;ng c&oacute; nhiều t&iacute;nh năng phụ thuộc v&agrave;o bộ xử l&yacute; AI. Tin đồn cũng chỉ ra rằng Apple sẽ<strong>&nbsp;tăng &iacute;t nhất 10% pin,&nbsp;</strong>gi&uacute;p b&ugrave; lại mức ti&ecirc;u hao năng lượng do m&agrave;n h&igrave;nh tốc độ l&agrave;m mới cao v&agrave; c&ocirc;ng nghệ 5G.</p>\r\n<p>Apple cho biết A14 Bionic c&oacute; 11.8 tỷ b&oacute;ng b&aacute;n dẫn v&agrave; n&oacute; dựa tr&ecirc;n tiến tr&igrave;nh 5nm. CPU 6 l&otilde;i của con chip n&agrave;y mang lại&nbsp;<strong>hiệu suất tăng 40%</strong>&nbsp;trong khi GPU 4 l&otilde;i mang lại&nbsp;<strong>hiệu suất tăng 30%</strong>.&nbsp;</p>\r\n<p>T&oacute;m lại, A14 Bionic tiếp tục l&agrave; một con &ldquo;qu&aacute;i vật&rdquo; về hiệu năng v&agrave; d&ograve;ng iPhone 12 sắp tới hứa hẹn sẽ thiết lập những kỷ lục mới về hiệu suất.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '50000000', 'e37853e312.jpeg'),
(53, 'Iphone XS MAX', 16, 1, '<p>Một trong những n&acirc;ng cấp lớn tr&ecirc;n d&ograve;ng iPhone 12 năm nay l&agrave; sự bổ sung của 5G, t&iacute;nh năng hứa hẹn gi&uacute;p thay đổi cuộc chơi v&agrave; sẽ thu h&uacute;t nhiều người mua iPhone hiện tại. Trang bị 5G cũng l&agrave; l&yacute; do khiến Apple thực hiện một số thay đổi lớn với iPhone 12 v&igrave; n&oacute; cần kh&ocirc;ng gian để chứa modem 5G v&agrave; ăng-ten.</p>\r\n<p>Apple c&oacute; thể ra mắt hai biến thể kh&aacute;c nhau của iPhone 12,&nbsp;<strong>một biến thể hỗ trợ</strong>&nbsp;<strong>mmWave v&agrave; Sub-6GHz</strong>&nbsp;v&agrave;&nbsp;<strong>một biến thể chỉ hỗ trợ Sub-6GHz</strong>. Biến thể cũ được tung ra tại c&aacute;c thị trường như Mỹ, nơi c&aacute;c nh&agrave; mạng đang triển khai 5G tr&ecirc;n tần số mmWave. Ở c&aacute;c thị trường kh&aacute;c như Việt Nam, Apple c&oacute; thể ra mắt những mẫu chỉ hỗ trợ Sub-6GHz v&igrave; những hạn chế nhất định.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '2000000', 'baf6f124b4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_silder`
--

CREATE TABLE `tbl_silder` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `slidertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_silder`
--

INSERT INTO `tbl_silder` (`sliderId`, `sliderName`, `sliderImage`, `slidertype`) VALUES
(1, 'Slider 01', 'd6150fd6bb.jpg', 1),
(2, 'Slider 02', '5990d6041f.jpg', 1),
(3, 'Slider 03', 'a1943c375b.jpg', 0),
(4, 'Slider 04', '59e7a186e9.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_silder`
--
ALTER TABLE `tbl_silder`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_silder`
--
ALTER TABLE `tbl_silder`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
