-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2023 lúc 03:12 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `href_param` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `href_param`) VALUES
(1, 'Laptop Dell', 'laptop-dell'),
(2, 'Laptop Apple', 'laptop-apple');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `subject_name` varchar(350) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `phone_number`, `subject_name`, `note`, `status`, `created_at`, `updated_at`) VALUES
(2, 'hà phú toàn', 'haphutoan@gmail.com', '0972838671', 'laptop', 'news', 1, '2023-06-14 07:04:59', '2023-06-07 00:08:26'),
(3, 'Hà Phú Toàn', 'haphutoan@gmail.com', '0972838671', 'Hi', 'Hi', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_02_013219_create_role_table', 1),
(6, '2023_06_02_013447_alter_user_table', 1),
(7, '2023_06_02_013544_create_category_table', 1),
(8, '2023_06_02_013604_create_product_table', 1),
(9, '2023_06_02_013639_create_gallery_table', 1),
(10, '2023_06_02_014143_create_feedback_table', 1),
(11, '2023_06_02_014216_create_orders_table', 1),
(12, '2023_06_02_014228_create_order_details_table', 1),
(13, '2023_06_02_014249_create_order_news_table', 1),
(14, '2023_06_07_060114_create_news_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `href_param` varchar(250) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `href_param`, `thumbnail`, `content`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(2, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<h2>Laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) sở hữu thi&ecirc;́t k&ecirc;́ gọn nhẹ, vẻ ngoài trang nhã, hi&ecirc;̣n đại cùng các tính năng mới được cải ti&ecirc;́n và n&acirc;ng c&acirc;́p vượt b&acirc;̣c. Đ&acirc;y là sản ph&acirc;̉m đáp ứng mọi nhu c&acirc;̀u sử dụng t&acirc;̀m th&acirc;́p đ&ecirc;́n cao, là sự lựa chọn hoàn hảo cho mọi đ&ocirc;́i tượng người dùng.</h2>\r\n\r\n<h3><strong>Thi&ecirc;́t k&ecirc;́ nhỏ gọn, màu sắc bắt mắt</strong></h3>\r\n\r\n<p>Laptop&nbsp;<a href=\"https://phongvu.vn/c/acer-nitro-5\">Acer Nitro 5</a>&nbsp;AN515-45-R9SC (NH.QBRSV.001) (Đen) có kh&ocirc;́i lượng 2.2kg, kích thước 36.34 x 25.5 x 2.39 cm h&ecirc;́t sức t&ocirc;́i giản, chỉ chi&ecirc;́m m&ocirc;̣t khoảng kh&ocirc;ng gian r&acirc;́t nhỏ trong phòng đ&ocirc;̀ng thời có th&ecirc;̉ d&ecirc;̃ dàng đem theo b&ecirc;n mình mọi lúc, mọi nơi.</p>\r\n\r\n<p><img alt=\"Laptop Acer Nitro 5 AN515-45-R9SC | Thiết kế nhỏ gọn \" src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2021/5/6/20210506_0360c577-ee58-4aa4-be6f-f3ee96947709.png\" /></p>\r\n\r\n<p>Đ&ecirc;́n từ thương hi&ecirc;̣u ACER n&ocirc;̉i ti&ecirc;́ng hàng đ&acirc;̀u trong lĩnh vực laptop, thi&ecirc;́t bị ngoại vi, đi&ecirc;̣n tử, chiếc&nbsp;<a href=\"https://phongvu.vn/c/acer-nitro\">Acer Nitro</a>&nbsp;n&agrave;y có vỏ làm từ ch&acirc;́t li&ecirc;̣u cao c&acirc;́p chắc chắn, vẻ ngoài màu đen đơn giản mà sang trọng, bắt mắt người nhìn.</p>\r\n\r\n<h3><strong>CPU Ryzen 7 5800H, chip đ&ocirc;̀ họa NVIDIA GeForce RTX 3070 8GB GDDR6</strong></h3>\r\n\r\n<p>Đặc bi&ecirc;̣t, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) được trang bị CPU Ryzen 7 5800 ti&ecirc;n ti&ecirc;́n với 8 nh&acirc;n, 16 lu&ocirc;̀ng đem đ&ecirc;́n t&ocirc;́c đ&ocirc;̣ l&ecirc;n đ&ecirc;́n 3.2GHz-4.4GHz, bùng n&ocirc;̉ hi&ecirc;̣u năng mạnh mẽ giúp bạn hoàn thành mọi c&ocirc;ng vi&ecirc;̣c xử lý t&acirc;̀m cao.</p>\r\n\r\n<p><img alt=\"Laptop Acer Nitro 5 AN515-45-R9SC | Card đồ họa hiện đại \" src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2021/5/6/20210506_0386c471-187b-4944-afc1-fda04768a044.png\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đó, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) sử dụng chip đ&ocirc;̀ họa NVIDIA GeForce RTX 3070 8GB GDDR6 là báu v&acirc;̣t của đ&ocirc;̀ họa chơi game, tăng t&ocirc;́c trí tu&ecirc;̣ nh&acirc;n tạo, b&ocirc;̣ đa xử lý mượt mà đem lại t&ocirc;́c đ&ocirc;̣ cực đỉnh.</p>\r\n\r\n<p>Với vi&ecirc;̣c trang bị các linh ki&ecirc;̣n cao c&acirc;́p, Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) sẽ là thi&ecirc;́t bị h&ocirc;̃ trợ t&ocirc;́i đa giúp bạn trở thành m&ocirc;̣t chi&ecirc;́n binh thực thụ, chi&ecirc;́n t&acirc;́t cả c&ocirc;ng vi&ecirc;̣c phức tạp hay các game nặng, cho bạn thỏa sức sáng tạo.</p>\r\n\r\n<blockquote>\r\n<p><em>Xem th&ecirc;m: Laptop&nbsp;</em><a href=\"https://phongvu.vn/acer-nitro-16-phoenix-an16-41-ryzen-5-rtx-4050--s230402670\"><em>Acer Nitro 16 Phonenix</em></a><em>&nbsp;n&acirc;ng cấp của đời Laptop Acer Nitro 5 mới năm 2023</em></p>\r\n</blockquote>\r\n\r\n<h3><strong>RAM 8GB DDR4 3200MHz, màn hình 15.6 inch full HD</strong></h3>\r\n\r\n<p>Hơn th&ecirc;́ nữa, ACER kh&ocirc;ng ng&acirc;̀n ngại mà sử dụng RAM 8GB DDR4 cho laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) n&acirc;ng t&acirc;̀m trải nghi&ecirc;̣m, đem lại t&ocirc;́c đ&ocirc;̣ xử lý nhanh chóng, giúp các ứng dụng chạy mượt mà, hạn ch&ecirc;́ t&ocirc;́i đa gián đoạn khi sử dụng.</p>\r\n\r\n<p>Cùng với đó,&nbsp;<a href=\"https://phongvu.vn/laptop-va-linh-kien-macbook-715.cat?pv_source=homepage&amp;pv_medium=de-megamenu-text&amp;sort=new&amp;order=DESC\"><strong>laptop&nbsp;</strong></a>Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) được trang bị màn hình 15.6 inch full HD kh&ocirc;ng cảm ứng, giảm thi&ecirc;̉u b&acirc;́t ti&ecirc;̣n khi dùng, đem lại ch&acirc;́t lượng hình ảnh bùng n&ocirc;̉, sắc nét, s&ocirc;́ng đ&ocirc;̣ng và nguy&ecirc;n bản nh&acirc;́t.</p>\r\n\r\n<p><img alt=\"Laptop Acer Nitro 5 AN515-45-R9SC | Màn hình 15,6 inch \" src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2021/5/6/20210506_a3304431-277c-4a16-bf59-6baf80b36aec.png\" /></p>\r\n\r\n<p>Ngoài ra, Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) có t&acirc;́m n&ecirc;̀n IPS 144Hz tăng đ&ocirc;̣ tương phản, khám phá khung hình đẹp và th&acirc;̣t đ&ecirc;́n từng chi ti&ecirc;́t. Hơn nữa, latop có webcam giúp vi&ecirc;̣c làm vi&ecirc;̣c, thảo lu&acirc;̣n trực tuy&ecirc;́n trở n&ecirc;n d&ecirc;̃ dàng hơn bao giờ h&ecirc;́t.</p>\r\n\r\n<h3><strong>&Ocirc;̉ cứng 512GB SSD, c&ocirc;̉ng lưu trữ ti&ecirc;̣n ích</strong></h3>\r\n\r\n<p>Đ&ecirc;́n từ thương hi&ecirc;̣u có ti&ecirc;́ng hàng đ&acirc;̀u, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) sử dụng &ocirc;̉ cứng 512GB SSD tạo kh&ocirc;ng gian lưu trữ thoải mái, thi&ecirc;́t bị chạy với t&ocirc;́c đ&ocirc;̣ xử lý nhanh chóng, mượt mà, kh&ocirc;ng đ&acirc;̀y hay đơ gi&acirc;̣t.</p>\r\n\r\n<p><img alt=\"Laptop Acer Nitro 5 AN515-45-R9SC | Ổ cứng 512 GB\" src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2021/5/6/20210506_666ca1fb-4a3a-4078-8d9f-35fc9c39bedf.png\" /></p>\r\n\r\n<p>Gi&ocirc;́ng như nhi&ecirc;̀u dòng máy cùng t&acirc;̀m ph&acirc;n khúc, Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) có c&ocirc;̉ng lưu trữ 2.5 inch SATA và M.2 NVMe ph&ocirc;̉ bi&ecirc;́n và ti&ecirc;̣n lợi, d&ecirc;̃ dàng lưu trữ hay k&ecirc;́t n&ocirc;́i, giúp c&ocirc;ng vi&ecirc;̣c di&ecirc;̃n ra nhanh và hi&ecirc;̣u quả nh&acirc;́t.</p>\r\n\r\n<h3><strong>K&ecirc;́t n&ocirc;́i kh&ocirc;ng d&acirc;y hi&ecirc;̣n đại, bàn phím thường có led</strong></h3>\r\n\r\n<p>Đặc bi&ecirc;̣t, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) k&ecirc;́t n&ocirc;́i kh&ocirc;ng d&acirc;y wifi 802.11ax và bluetooth 5.0 hi&ecirc;̣n đại, giúp k&ecirc;́t n&ocirc;́i si&ecirc;u nhanh, &ocirc;̉n định đường truy&ecirc;̀n internet giúp vi&ecirc;̣c chi&ecirc;́n game hay làm vi&ecirc;̣c đạt hi&ecirc;̣u su&acirc;́t t&ocirc;́i đa.</p>\r\n\r\n<p><img alt=\"Laptop Acer Nitro 5 AN515-45-R9SC | Bàn phím đầy đủ thông thường\" src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2021/5/6/20210506_c57275f9-b8cc-4d41-a7a4-6b87b3d68595.png\" /></p>\r\n\r\n<p>Hơn th&ecirc;́, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) sử dụng bàn phím thường có phím s&ocirc;́ giúp thao tác đ&acirc;̀y đủ, d&ecirc;̃ dàng mà kh&ocirc;ng c&acirc;̀n th&ocirc;ng qua t&ocirc;̉ hợp phím tắt. Sử dụng led giúp người dùng d&ecirc;̃ dàng th&ecirc;̉ hi&ecirc;̣n cá tính đ&ocirc;̣c đáo tr&ecirc;n chính thi&ecirc;́t bị của mình.</p>\r\n\r\n<h3><strong>H&ecirc;̣ đi&ecirc;̀u hành Windows 10 Home 64-bit, pin li&ecirc;̀n 4 cell 56Wh</strong></h3>\r\n\r\n<p>Cùng với n&acirc;ng c&acirc;́p tính năng, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) được cài đặt h&ecirc;̣ đi&ecirc;̀u hành windows 10 Home 64-bit mới với các chức năng cái ti&ecirc;́n, thực hi&ecirc;̣n đa tác vụ d&ecirc;̃ dàng và an toàn bảo m&acirc;̣t th&ocirc;ng tin cao.</p>\r\n\r\n<p>Laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) được trang bị pin li&ecirc;̀n 4 cell 56Wh với khả năng ti&ecirc;́t ki&ecirc;̣m pin, sử dụng thời gian dài mà kh&ocirc;ng c&acirc;̀n sạc li&ecirc;n tục, đem lại quá trình làm vi&ecirc;̣c dài l&acirc;u, hi&ecirc;̣u quả hơn.</p>\r\n\r\n<p><img alt=\"Laptop Acer Nitro 5 AN515-45-R9SC | Pin 4 cell 57Wh \" src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2021/5/6/20210506_96b9acdb-6fea-43ec-a0fd-1319d0ec84cd.png\" /></p>\r\n\r\n<p>Ngoài ra, Acer Nitro 5 AN515-45-R9SC sử dụng c&ocirc;̉ng xu&acirc;́t hình HDMI và c&ocirc;̉ng k&ecirc;́t n&ocirc;́i USB 3.2, USP Type C ph&ocirc;̉ bi&ecirc;́n giúp vi&ecirc;̣c truy&ecirc;̀n tải và xử lý dữ li&ecirc;̣u trở n&ecirc;n thu&acirc;̣n ti&ecirc;̣n, nhanh chóng, hạn ch&ecirc;́ t&ocirc;́i đa rủi ro v&ecirc;̀ th&ocirc;ng tin trong đường truy&ecirc;̀n.</p>\r\n\r\n<h3><strong>Mua laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) chính hãng | Nh&acirc;̣n các ưu đãi khủng tại Showroom Phong Vũ</strong></h3>\r\n\r\n<p>Với thi&ecirc;́t k&ecirc;́ đẹp mắt, cao c&acirc;́p cùng khả năng xử lý, làm vi&ecirc;̣c n&acirc;ng cao, hi&ecirc;̣u năng được cái ti&ecirc;́n hoàn thi&ecirc;̣n, laptop Acer Nitro 5 AN515-45-R9SC (NH.QBRSV.001) (Đen) lu&ocirc;n là sự lựa chọn hoàn hảo. Đ&ecirc;́n ngay&nbsp;<a href=\"https://phongvu.vn/\"><strong>Phong Vũ&nbsp;</strong></a>đ&ecirc;̉ được tư v&acirc;́n và trải nghi&ecirc;̣m mi&ecirc;̃n phí sản ph&acirc;̉m chính hãng, nh&acirc;̣n các ưu đãi giảm giá và bảo hành.</p>', '2023-06-06 23:40:25', '2023-06-08 19:53:27', 0),
(3, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(4, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(5, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(6, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(7, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(8, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(9, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(10, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(11, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(12, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(13, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(14, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(15, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(16, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(17, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(18, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(19, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(20, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(21, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(22, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(23, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(24, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(25, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(26, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(27, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1),
(28, 'Apple ra Macbook mới', 'sdfsdf', 'http://127.0.0.1:8000/uploads/z4411422757958_ae9d54f03a66f6d20c22466e01760cca.jpg', '<p>dfsdfsdf</p>', '2023-06-06 23:40:25', '2023-06-06 23:40:25', 0),
(29, 'Laptop mạnh nhất', '1', '1', '1212121', '2023-06-20 06:03:15', '2023-06-21 06:03:15', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 1, 'Hà Phú Toàn', 'haphutoan@gmail.com', '0972838671', 'Châu Thành Tiền Giang', 'Q9 HCM', '2023-06-07 14:11:35', 1, 720000),
(2, 1, 'Hà Phú Toàn', 'haphutoan@gmail.com', '0972838671', 'Châu Thành Tiền Giang', 'Q9 HCM', '2023-06-07 14:11:35', 1, 234000),
(3, NULL, 'Hà Phú Toàn', 'haphutoan@gmail.com', '0972838671', 'Trường mầm non Bé Yêu 2 , ấp Tân Phú 2 , xã Tân Lý Đông , Huyện Châu Thành , Tỉnh Tiền Giang', 'hi', '2023-06-10 03:24:23', -2, 940000),
(4, NULL, 'Hà Phú Toàn', 'haphutoan@gmail.com', '0972838671', 'Trường mầm non Bé Yêu 2 , ấp Tân Phú 2 , xã Tân Lý Đông , Huyện Châu Thành , Tỉnh Tiền Giang', '1', '2023-06-10 03:28:03', 0, 940000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 1, 1, 180000, 2, 360000),
(2, 1, 1, 180000, 2, 360000),
(3, 3, 1, 200000, 4, 800000),
(4, 3, 5, 20000, 3, 60000),
(5, 3, 7, 20000, 4, 80000),
(6, 4, 1, 200000, 4, 800000),
(7, 4, 5, 20000, 3, 60000),
(8, 4, 7, 20000, 4, 80000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_news`
--

CREATE TABLE `order_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `href_param` varchar(250) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `context` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `thumbnail` varchar(5000) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `slug` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`, `slug`) VALUES
(1, 2, 'Acer Nitro', 18000000, 200000, 'https://laptopdeal.vn/wp-content/uploads/2021/06/3-acer-nitro-5-an515-i510300h-8gb-256gb-15-6inch-laptopre-vn-1570749j1442.jpg.png', '<p>Thiết kế gaming bắt mắt, đ&egrave;n nền nhiều m&agrave;u sắc Hiệu năng mạnh mẽ, đ&aacute;p ứng mọi nhu cầu sử dụng - Ryzen 5 5600H RAM 8GB cho đa nhiệm mượt m&agrave;, xử l&iacute; hiệu quả c&ocirc;ng việc Đa dạng cổng kết nối - Type-C, USB 3.0, HDMI, 3.5 mm <strong>121213</strong></p>\r\n\r\n<p><s><strong>123123123123</strong></s></p>', '2023-06-21 08:24:17', '2023-06-06 22:51:10', 0, 'san-pham-1'),
(2, 1, 'Macbook Pro 2023 New 100%', 420000, 20000, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '2023-06-06 02:18:45', '2023-06-06 17:37:37', 0, 'macbook-pro-2023'),
(3, 1, '43', 213123, 123123, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '234234234', '2023-06-06 17:39:11', '2023-06-06 17:39:11', 1, '43'),
(4, 2, 'Acer Nitro', 18000000, 200000, 'https://laptopdeal.vn/wp-content/uploads/2021/06/3-acer-nitro-5-an515-i510300h-8gb-256gb-15-6inch-laptopre-vn-1570749j1442.jpg.png', '<p>Thiết kế gaming bắt mắt, đ&egrave;n nền nhiều m&agrave;u sắc Hiệu năng mạnh mẽ, đ&aacute;p ứng mọi nhu cầu sử dụng - Ryzen 5 5600H RAM 8GB cho đa nhiệm mượt m&agrave;, xử l&iacute; hiệu quả c&ocirc;ng việc Đa dạng cổng kết nối - Type-C, USB 3.0, HDMI, 3.5 mm <strong>121213</strong></p>\r\n\r\n<p><s><strong>123123123123</strong></s></p>', '2023-06-21 08:24:17', '2023-06-06 22:51:10', 0, 'san-pham-1'),
(5, 1, 'Macbook Pro 2023 New 100%', 420000, 20000, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '2023-06-06 02:18:45', '2023-06-06 17:37:37', 0, 'macbook-pro-2023'),
(6, 2, 'Acer Nitro', 18000000, 200000, 'https://laptopdeal.vn/wp-content/uploads/2021/06/3-acer-nitro-5-an515-i510300h-8gb-256gb-15-6inch-laptopre-vn-1570749j1442.jpg.png', '<p>Thiết kế gaming bắt mắt, đ&egrave;n nền nhiều m&agrave;u sắc Hiệu năng mạnh mẽ, đ&aacute;p ứng mọi nhu cầu sử dụng - Ryzen 5 5600H RAM 8GB cho đa nhiệm mượt m&agrave;, xử l&iacute; hiệu quả c&ocirc;ng việc Đa dạng cổng kết nối - Type-C, USB 3.0, HDMI, 3.5 mm <strong>121213</strong></p>\r\n\r\n<p><s><strong>123123123123</strong></s></p>', '2023-06-21 08:24:17', '2023-06-06 22:51:10', 0, 'san-pham-1'),
(7, 1, 'Macbook Pro 2023 New 100%', 420000, 20000, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '2023-06-06 02:18:45', '2023-06-06 17:37:37', 0, 'macbook-pro-2023'),
(8, 1, '43', 213123, 123123, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '234234234', '2023-06-06 17:39:11', '2023-06-06 17:39:11', 1, '43'),
(9, 2, 'Acer Nitro', 18000000, 200000, 'https://laptopdeal.vn/wp-content/uploads/2021/06/3-acer-nitro-5-an515-i510300h-8gb-256gb-15-6inch-laptopre-vn-1570749j1442.jpg.png', '<p>Thiết kế gaming bắt mắt, đ&egrave;n nền nhiều m&agrave;u sắc Hiệu năng mạnh mẽ, đ&aacute;p ứng mọi nhu cầu sử dụng - Ryzen 5 5600H RAM 8GB cho đa nhiệm mượt m&agrave;, xử l&iacute; hiệu quả c&ocirc;ng việc Đa dạng cổng kết nối - Type-C, USB 3.0, HDMI, 3.5 mm <strong>121213</strong></p>\r\n\r\n<p><s><strong>123123123123</strong></s></p>', '2023-06-21 08:24:17', '2023-06-06 22:51:10', 0, 'san-pham-1'),
(10, 1, 'Macbook Pro 2023 New 100%', 420000, 20000, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '2023-06-06 02:18:45', '2023-06-06 17:37:37', 0, 'macbook-pro-2023'),
(11, 1, '43', 213123, 123123, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '234234234', '2023-06-06 17:39:11', '2023-06-06 17:39:11', 1, '43'),
(12, 2, 'Acer Nitro', 18000000, 200000, 'https://laptopdeal.vn/wp-content/uploads/2021/06/3-acer-nitro-5-an515-i510300h-8gb-256gb-15-6inch-laptopre-vn-1570749j1442.jpg.png', '<p>Thiết kế gaming bắt mắt, đ&egrave;n nền nhiều m&agrave;u sắc Hiệu năng mạnh mẽ, đ&aacute;p ứng mọi nhu cầu sử dụng - Ryzen 5 5600H RAM 8GB cho đa nhiệm mượt m&agrave;, xử l&iacute; hiệu quả c&ocirc;ng việc Đa dạng cổng kết nối - Type-C, USB 3.0, HDMI, 3.5 mm <strong>121213</strong></p>\r\n\r\n<p><s><strong>123123123123</strong></s></p>', '2023-06-21 08:24:17', '2023-06-06 22:51:10', 0, 'san-pham-1'),
(13, 1, 'Macbook Pro 2023 New 100%', 420000, 20000, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '2023-06-06 02:18:45', '2023-06-06 17:37:37', 0, 'macbook-pro-2023'),
(14, 2, 'Acer Nitro', 18000000, 200000, 'https://laptopdeal.vn/wp-content/uploads/2021/06/3-acer-nitro-5-an515-i510300h-8gb-256gb-15-6inch-laptopre-vn-1570749j1442.jpg.png', '<p>Thiết kế gaming bắt mắt, đ&egrave;n nền nhiều m&agrave;u sắc Hiệu năng mạnh mẽ, đ&aacute;p ứng mọi nhu cầu sử dụng - Ryzen 5 5600H RAM 8GB cho đa nhiệm mượt m&agrave;, xử l&iacute; hiệu quả c&ocirc;ng việc Đa dạng cổng kết nối - Type-C, USB 3.0, HDMI, 3.5 mm <strong>121213</strong></p>\r\n\r\n<p><s><strong>123123123123</strong></s></p>', '2023-06-21 08:24:17', '2023-06-06 22:51:10', 0, 'san-pham-1'),
(15, 1, 'Macbook Pro 2023 New 100%', 420000, 20000, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '2023-06-06 02:18:45', '2023-06-06 17:37:37', 0, 'macbook-pro-2023'),
(16, 1, '43', 213123, 123123, 'https://no1computer.vn/images/products/2022/11/30/large/acer-nitro-5-rtx-3050-h1_1669799440.jpg', '234234234', '2023-06-06 17:39:11', '2023-06-06 17:39:11', 1, '43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `address`, `deleted`, `role_id`) VALUES
(1, 'Hà Phú Toàn', 'haphutoan@gmail.com', NULL, '$2y$10$YvJUrBYRxUUNJSuLM6H42uzzCqtkJ18vM9EKPeGyOD4rZboqZ5WUm', 'Hs5R2Kyr2gjTccdGArx1JTfhsh9CHHAMYWrSUwgVtXk7U7xwDFllXulNs4FS', '2023-06-01 21:15:44', '2023-06-05 23:57:23', '0972838671', 'Tiền Giang', 0, 1),
(2, 'Hà Phú Toàn', 'htt_9x@yahoo.com', NULL, '$2y$10$YVBLk.Lga601pGYuF9W5p.0OOJXp821nvjAX2JRX5Dbgab1P4Tz5K', NULL, '2023-06-05 23:12:00', '2023-06-05 23:12:00', '0972838671', 'Trường mầm non Bé Yêu 2 , ấp Tân Phú 2 , xã Tân Lý Đông , Huyện Châu Thành , Tỉnh Tiền Giang', 1, 2),
(3, 'Test', 'haphutoanit@gmail.com', NULL, '$2y$10$t0ZqN5KCgTDnbXczf5ab9uHSjUXe4B6RGSkqYhosRbjpI2PSZO.ZW', NULL, '2023-06-07 02:01:48', '2023-06-07 02:01:48', NULL, '0', 0, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `order_news`
--
ALTER TABLE `order_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_news`
--
ALTER TABLE `order_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
