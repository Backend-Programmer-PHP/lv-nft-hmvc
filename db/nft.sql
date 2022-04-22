-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2022 lúc 06:25 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nft`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_admins`
--

CREATE TABLE `la_admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci NOT NULL,
  `api_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 - nomal, 1 - dev',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `la_admins`
--

INSERT INTO `la_admins` (`id`, `email`, `fullname`, `photo`, `gender`, `phone`, `address`, `password`, `remember_token`, `api_token`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'api_admin@gmail.com', 'luan', NULL, 1, NULL, NULL, '$2y$10$V6c/Ay5.xgq1tjVpdRQlTuu9.3bDGrC6wGrFXzk5VhOOM3b7abVUG', 'MakhJZHHaAqIiePzaZ1Z9nmVejxTQKZtMwTtlO1OVISizqU6T3zB9KtVHM2Q', NULL, 1, 0, '2021-12-04 22:15:34', '2022-01-24 15:32:52'),
(2, 'ngodinhluan1@gmail.com', 'luan', NULL, 1, NULL, NULL, '$2y$10$Dh7IHNbqCdqfMwfC2fq3UOENQiVFUkaM3Ls/DnL9ZsfVEfPakBpXi', 'MakhJZHHaAqIiePzaZ1Z9nmVejxTQKZtMwTtlO1OVISizqU6T3zB9KtVHM2Q', NULL, 1, 0, '2021-12-04 22:15:34', '2021-12-04 22:15:34'),
(3, 'admin@gmail.com', 'admin', NULL, 1, NULL, NULL, '$2y$10$NjzHM6pOM5ZXhQR5fT2HWuVh6zoFuYkBwWpq7y4kK/IwIFsEdJPIC', 'MakhJZHHaAqIiePzaZ1Z9nmVejxTQKZtMwTtlO1OVISizqU6T3zB9KtVHM2Q', NULL, 1, 0, '2021-12-04 22:15:34', '2022-01-12 12:54:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_admins_role`
--

CREATE TABLE `la_admins_role` (
  `id` int(11) NOT NULL,
  `admins_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_admins_role`
--

INSERT INTO `la_admins_role` (`id`, `admins_id`, `role_id`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_blog`
--

CREATE TABLE `la_blog` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: disable, 1 active, 2 trash',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `la_blog`
--

INSERT INTO `la_blog` (`id`, `title`, `alias`, `blog_category_id`, `photo`, `excerpt`, `content`, `updated_at`, `created_at`, `status`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Khám phá nhà ở như resort đẹp ngỡ ngàng của giới nhà giàu', 'kham-pha-nha-o-nhu-resort-dep-ngo-ngang-cua-gioi-nha-giau', 0, 'photo-1-1577158333701305657236jpg-1577163331.jpg', 'Như một xu hướng tất yếu, tầng lớp thượng lưu của Việt Nam hiện nay đang hình thành gu sống trong những ngôi nhà như “resort tại gia”. Đặc quyền sống như thiên đường nghỉ dưỡng không chỉ thỏa mãn nhu cầu thường nhật mỗi ngày mà còn nâng cao vị thế của giới nhà giàu.', '<p><b>Giới nh&agrave; gi&agrave;u Việt v&agrave; nhu cầu sống xứng tầm đẳng cấp</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo Wealth-X &ndash; C&ocirc;ng ty nghi&ecirc;n cứu thị trường New World Wealth vừa c&ocirc;ng bố b&aacute;o c&aacute;o về người gi&agrave;u thế giới &ndash; High Net Worth Handbook 2019 (t&agrave;i sản từ 1 đến dưới 30 triệu USD): Theo đ&oacute;, Việt Nam nằm trong top 10 nền kinh tế sẽ c&oacute; tốc độ tăng trưởng người gi&agrave;u nhanh nhất thế giới giai đoạn 2018 &ndash; 2023, với 10,1% mỗi năm. C&ocirc;ng ty nghi&ecirc;n cứu thị trường Nielsen cũng cho biết, tầng lớp trung v&agrave; thượng lưu Việt Nam c&oacute; thể l&ecirc;n đến 44 triệu người v&agrave;o năm 2020 v&agrave; tiếp tục tăng l&ecirc;n 95 triệu người v&agrave;o năm 2030.</p>\r\n\r\n<p>Sự gia tăng nhanh ch&oacute;ng của tầng lớp người gi&agrave;u tại Việt Nam đ&atilde; mở ra bước ph&aacute;t triển mới cho ph&acirc;n kh&uacute;c BĐS cao cấp. Như một nhu cầu tất yếu, kh&ocirc;ng gian sống của giới nh&agrave; gi&agrave;u đ&ograve;i hỏi phải được n&acirc;ng tầm đẳng cấp. Với tầng lớp gi&agrave;u v&agrave; si&ecirc;u gi&agrave;u nhu cầu về kh&ocirc;ng gian sống kết hợp nh&agrave; ở với chốn nghỉ dưỡng xa hoa, gi&uacute;p chủ nh&acirc;n xoa dịu mọi căng thẳng, &aacute;p lực c&agrave;ng trở n&ecirc;n thiết yếu hơn.</p>\r\n\r\n<p>&Ocirc;ng Nguyễn Kh&aacute;nh Duy, Gi&aacute;m đốc bộ phận kinh doanh nh&agrave; ở của Savills cho biết sự gia tăng mức độ quan t&acirc;m cũng như số lượng người mua d&agrave;nh cho ph&acirc;n kh&uacute;c BĐS cao cấp với gi&aacute; b&aacute;n từ khoảng 5.000USD/m2 đến 10.000USD/m2 trong thời điểm từ đầu năm 2018 đến nay, cũng như trong thời gian tới l&agrave; rất đ&aacute;ng kể. Giới nh&agrave; gi&agrave;u khao kh&aacute;t sở hữu những căn hộ với tiện &iacute;ch nghỉ dưỡng năm sao theo đ&uacute;ng chuẩn &quot;resort tại gia&quot; kh&ocirc;ng chỉ thỏa m&atilde;n cuộc sống thường ng&agrave;y m&agrave; c&ograve;n t&ocirc;n vinh vị thế cho chủ nh&acirc;n ng&ocirc;i nh&agrave;.&nbsp;</p>\r\n\r\n<p><b>Sunshine Golden River: Trọn vẹn sống &quot;Chất&quot; cho người gi&agrave;u</b></p>\r\n\r\n<p>L&agrave; một trong những sản phẩm &quot;con cưng&quot; của Tập đo&agrave;n Sunshine &ndash; chủ đầu tư nổi danh với ph&acirc;n kh&uacute;c BĐS cao cấp, Sunshine Golden River hiện đang trở th&agrave;nh t&acirc;m điểm thu h&uacute;t của giới thượng lưu c&oacute; nhu cầu t&igrave;m nơi an cư. Đi t&igrave;m lời giải v&igrave; sao dự Sunshine Golden River h&uacute;t kh&aacute;ch si&ecirc;u gi&agrave;u đến như vậy, kh&aacute;m ph&aacute; hết những gi&aacute; trị m&agrave; dự &aacute;n n&agrave;y mang đến cho kh&aacute;ch h&agrave;ng mới thấy: Sunshine Golden River &quot;hot&quot; l&agrave; chuyện hiển nhi&ecirc;n!</p>\r\n\r\n<p>Dự &aacute;n g&acirc;y ấn tượng mạnh bởi lối thiết kế tối ưu h&oacute;a tầm nh&igrave;n. To&agrave;n bộ hơn 200 căn hộ cao cấp của dự &aacute;n đều c&oacute; view bao qu&aacute;t, đ&oacute;n nắng, đ&oacute;n gi&oacute; tự nhi&ecirc;n, c&acirc;n bằng giữa một kh&ocirc;ng gian sống hiện đại với yếu tố nghỉ dưỡng của mỗi gia chủ.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/public/userfiles/images/blog/photo-1-1577158333701305657236.jpg\" style=\"width: 1600px; height: 1131px;\" /></p>\r\n\r\n<p>Trong mỗi căn hộ rộng từ 125 &ndash; 213m2, chủ đầu tư d&agrave;nh diện t&iacute;ch lớn để l&agrave;m khoảng kh&ocirc;ng s&acirc;n vườn, nơi đặt những chậu c&acirc;y cảnh b&ecirc;n cạnh những bụi hoa nhỏ hay những thảm cỏ xanh thường thấy trong c&aacute;c s&acirc;n vườn biệt thự dưới mặt đất. Điểm nhấn &quot;vườn ngang trời&quot; l&agrave; nơi cả gia đ&igrave;nh qu&acirc;y quần b&ecirc;n nhau vui chơi, thưởng thức những bữa tiệc BBQ ấm c&uacute;ng sau một ng&agrave;y d&agrave;i mệt mỏi, hay thỏa m&atilde;n th&uacute; vui trồng c&acirc;y trồng hoa của người gi&agrave;, đồng thời l&agrave; kh&ocirc;ng gian vui chơi cho con trẻ.</p>\r\n\r\n<p>Tất cả c&aacute;c căn hộ đều được trang bị nội thất hạng sang đến từ c&aacute;c thương hiệu nổi tiếng như Kohler, Duravit, Hafele với những chi tiết d&aacute;t v&agrave;ng qu&yacute; ph&aacute;i khẳng định đẳng cấp thượng lưu của gia chủ. Chủ đầu tư ch&uacute; trọng sử dụng nội thất đắt gi&aacute;, thể hiện đ&uacute;ng tinh thần của một kh&ocirc;ng gian biệt thự truyền thống m&agrave; vẫn hội tụ đầy đủ t&iacute;nh thẩm mỹ tinh tế, sang trọng v&agrave; xa hoa.</p>\r\n\r\n<p><b>Hội tụ tinh hoa c&ocirc;ng nghệ 4.0</b></p>\r\n\r\n<p>Kh&ocirc;ng chỉ ấn tượng trong kiến tr&uacute;c &quot;vườn ngang trời&quot;, đẳng cấp trong b&agrave;i tr&iacute; nội thất, Sunshine Golden River ti&ecirc;n phong mang đến một cuộc sống dẫn đầu xu hướng của thời đại với căn hộ th&ocirc;ng minh, mang đậm dấu ấn 4.0.</p>\r\n\r\n<p><img alt=\"\" src=\"/public/userfiles/images/blog/photo-2-15771583337061095440270.jpg\" style=\"width: 1200px; height: 549px;\" /></p>\r\n\r\n<p>Rất nhiều ứng dụng c&ocirc;ng nghệ cao được &aacute;p dụng trong cuộc sống của những cư d&acirc;n Mặt Trời như: c&ocirc;ng nghệ nhận diện khu&ocirc;n mặt, nhận diện giọng n&oacute;i, ứng dụng tr&iacute; tuệ nh&acirc;n tạo, c&aacute;c cảm biến th&ocirc;ng minh v&agrave; c&aacute;c dịch vụ phần mềm. Chỉ bằng một chiếc smartphone hoặc th&ocirc;ng qua hiệu lệnh của th&acirc;n chủ, căn hộ th&ocirc;ng minh Sunshine Golden River c&oacute; thể tự động điều khiển c&aacute;c thiết bị trong nh&agrave; như điều h&ograve;a, b&igrave;nh n&oacute;ng lạnh, r&egrave;m cửa, tivi... Cư d&acirc;n cũng thoải m&aacute;i tận hưởng tiện &iacute;ch đặt h&agrave;ng từ xa th&ocirc;ng qua ứng dụng Sunshine Home với đầy đủ c&aacute;c t&iacute;nh năng như: gọi c&aacute;c dịch vụ sửa chữa kỹ thuật, sửa điện, truyền h&igrave;nh, gi&uacute;p việc, dọn vệ sinh, giặt l&agrave;, xem v&agrave; thanh to&aacute;n c&aacute;c ho&aacute; đơn dịch vụ h&agrave;ng th&aacute;ng, cập nhật c&aacute;c th&ocirc;ng b&aacute;o từ ban quản l&yacute;, mua sắm nhu yếu phẩm&hellip;&nbsp;</p>\r\n\r\n<p>Trao đổi với anh Phạm Huy, một doanh nh&acirc;n th&agrave;nh đạt tại H&agrave; Nội, anh chia sẻ về l&iacute; do lựa chọn Sunshine Golden River l&agrave; nơi an cư của m&igrave;nh: &quot;T&ocirc;i tin, với Sunshine Golden River, giờ đ&acirc;y, khi trở về nh&agrave;, ch&uacute;ng t&ocirc;i sẽ như được tận hưởng cuộc sống ở những resort nghỉ dưỡng để c&acirc;n bằng lại những &aacute;p lực sau mỗi ng&agrave;y d&agrave;i. Mọi thứ m&agrave; t&ocirc;i v&agrave; những người th&acirc;n của m&igrave;nh cần đều c&oacute; trong khu&ocirc;n vi&ecirc;n dự &aacute;n với chất lượng đỉnh cao nhất. N&oacute; thực sự l&agrave; một chốn đi về đ&uacute;ng như ước muốn của t&ocirc;i&quot;.&nbsp;</p>', '2019-12-24 11:55:32', '2019-12-24 11:55:32', 1, 'Khám phá nhà ở như resort đẹp ngỡ ngàng của giới nhà giàu', 'resort, bds, bất động sản, resort tại gia', 'Như một xu hướng tất yếu, tầng lớp thượng lưu của Việt Nam hiện nay đang hình thành gu sống trong những ngôi nhà như “resort tại gia”. Đặc quyền sống như thiên đường nghỉ dưỡng không chỉ thỏa mãn nhu cầu thường nhật mỗi ngày mà còn nâng cao vị thế của giới nhà giàu.'),
(2, 'Cạn nguồn hàng, nhiều môi giới bất động sản chuyển nghề đi livestream dạo', 'can-nguon-hang-nhieu-moi-gioi-bat-dong-san-chuyen-nghe-di-livestream-dao', 0, 'photo1575163056468-1575163056768-crop-157516309558796509548jpg-1577163512.jpg', 'Trong bối cảnh nguồn cung khan hiếm kỷ lục, hàng loạt môi giới phải chuyển nghề vì thất thu. Nhiều người chuyển qua làm nghề livestream bán quần áo, mỹ phẩm, đồng hồ…', '<p><b>M&ocirc;i giới từ b&aacute;n đất chuyển sang b&aacute;n quần &aacute;o, đồng hồ</b></p>\r\n\r\n<p>Theo c&aacute;c chuy&ecirc;n gia, năm 2019 l&agrave; một năm đầy kh&oacute; khăn với c&aacute;c doanh nghiệp bất động sản v&agrave; những c&ocirc;ng ty m&ocirc;i giới. Nguy&ecirc;n do l&agrave; bởi nguồn cung khan hiếm cục bộ ảnh hưởng từ việc ch&iacute;nh quyền thắt chặt việc cấp GPXD cho những dự &aacute;n mới.</p>\r\n\r\n<p>Theo thống k&ecirc; từ HoREA, cả năm 2019 chỉ c&oacute; duy nhất một dự &aacute;n được chấp thuận chủ trương đầu tư, giảm khoảng 83%. Thị trường kh&oacute; khăn dẫn đến việc chỉ c&oacute; 32 dự &aacute;n nh&agrave; ở h&igrave;nh th&agrave;nh trong tương lai đủ điều kiện huy động vốn với 19.662 căn nh&agrave;, giảm 58,44% về số lượng dự &aacute;n v&agrave; giảm 30,56% về số lượng căn nh&agrave; so với năm 2018.</p>\r\n\r\n<p>Do khan hiếm nguồn h&agrave;ng, nhiều doanh nghiệp bất động sản đ&atilde; phải cơ cấu lại nguồn nh&acirc;n lực, cắt giảm nh&acirc;n sự kinh doanh v&igrave; kh&ocirc;ng đủ chi ph&iacute; nu&ocirc;i qu&acirc;n. Chia sẻ tại sự kiện b&aacute;o c&aacute;o thị trường Qu&yacute; III mới đ&acirc;y, &ocirc;ng Phạm L&acirc;m - Gi&aacute;m đốc C&ocirc;ng ty DKRA Việt Nam cho biết chưa c&oacute; năm n&agrave;o thị trường bất động sản lại khan hiếm nguồn h&agrave;ng như năm nay. Thời gian qua, c&ocirc;ng ty &ocirc;ng L&acirc;m cũng gặp kh&oacute; khăn khi thiếu sản phẩm để b&aacute;n, trong khi đ&oacute; h&agrave;ng th&aacute;ng phải chi đến 6 tỷ cho hoạt động v&agrave; nu&ocirc;i qu&acirc;n.</p>\r\n\r\n<p>Trong bối cảnh nguồn cung khan hiếm, nhiều m&ocirc;i giới phải chuyển nghề trong năm 2019.<br />\r\nAnh Nguyễn Mạnh H, một m&ocirc;i giới l&agrave;m việc cho một s&agrave;n bất động sản tại TP.HCM cho biết bắt đầu từ th&aacute;ng 5/2019, to&agrave;n c&ocirc;ng ty rơi v&agrave;o cảnh hoang mang v&igrave; Gi&aacute;m đốc kh&ocirc;ng đủ tiền l&atilde;i để trả lương cho nh&acirc;n vi&ecirc;n. Biết r&otilde; thị trường đang kh&oacute; khăn n&ecirc;n hơn 100 nh&acirc;n vi&ecirc;n nơi c&ocirc;ng ty H. l&agrave;m việc vẫn cố gắng b&aacute;m trụ với hy vọng khi thị trường khai th&ocirc;ng th&igrave; mọi chuyện sẽ thuận lợi.Trong xu thế đ&oacute;, nhiều m&ocirc;i giới đ&atilde; phải chuyển nghề v&igrave; kh&ocirc;ng đủ nguồn thu đảm bảo cuộc sống. Ghi nhận trong những th&aacute;ng cuối năm 2019, phần lớn m&ocirc;i giới bất động sản đ&atilde; chuyển nghề qua kinh doanh mặt h&agrave;ng kh&aacute;c như b&aacute;n quần &aacute;o, mỹ phẩm, đồng hồ. Nhiều m&ocirc;i giới xin chuyển từ c&ocirc;ng ty bất động sản sang c&ocirc;ng ty du lịch, kinh doanh &ocirc; t&ocirc;, xe m&aacute;y&hellip;</p>\r\n\r\n<p>Tuy nhi&ecirc;n, đến th&aacute;ng 8/2019 nhận thấy t&igrave;nh h&igrave;nh kh&ocirc;ng &nbsp;khả&nbsp;quan, H. v&agrave; nhiều đồng nghiệp quyết định nghỉ việc để giảm tải &aacute;p lực cho sếp, đồng thời t&igrave;m nguồn thu nhập mới để lo cho gia đ&igrave;nh.</p>\r\n\r\n<p>Tương tự với H, Trần Văn B&igrave;nh, nh&acirc;n vi&ecirc;n l&agrave;m việc cho một c&ocirc;ng ty bất động sản c&oacute; tiếng tr&ecirc;n thị trường TP.HCM cũng chia sẻ rằng nhiều th&aacute;ng nay h&agrave;ng trăm nh&acirc;n vi&ecirc;n của c&ocirc;ng ty kh&ocirc;ng c&oacute; việc để l&agrave;m. V&igrave; kh&ocirc;ng c&oacute; dự &aacute;n mới ra h&agrave;ng n&ecirc;n bộ phận sales phải dồn v&agrave;o c&aacute;c dự &aacute;n cũ để b&aacute;n nhưng do nguồn h&agrave;ng hạn hẹp n&ecirc;n anh em phải chia nhau từng đồng lợi nhuận, trong khi mức lương cố định lại thấp n&ecirc;n kh&ocirc;ng đủ trang trải chi ph&iacute; để ổn định cuộc sống. H. cũng dự t&iacute;nh đến giữa năm 2020 nếu thị trường tiếp tục kh&oacute; khăn th&igrave; sẽ t&igrave;m việc mới để l&agrave;m.</p>\r\n\r\n<p>&ldquo;Chưa bao giờ t&ocirc;i thấy nghề l&agrave;m m&ocirc;i giới bất động sản lại kh&oacute; khăn đến cực độ như b&acirc;y giờ. Thị trường th&igrave; khan hiếm to&agrave;n bộ, anh em m&ocirc;i giới th&igrave; c&oacute; cả mấy ng&agrave;n người kh&ocirc;ng biết lấy g&igrave; để sống. Tết đến nơi rồi, mọi người trong c&ocirc;ng ty đều đang lo lắng l&agrave; năm nay tiền thưởng Tết sẽ bị cắt nhiều so với mọi năm&rdquo;, H. cho hay.</p>\r\n\r\n<p><b>Nghề m&ocirc;i giới c&oacute; thật sự dễ l&agrave;m gi&agrave;u?</b></p>\r\n\r\n<p>Trong v&agrave;i năm gần đ&acirc;y khi thi trường bất động sản n&oacute;ng l&ecirc;n, nghề m&ocirc;i giới trở n&ecirc;n thịnh h&agrave;nh v&agrave; được x&atilde; hội nh&igrave;n nhận để thay thế cho cụm từ &ldquo;C&ograve; đất&rdquo;. Với sức h&uacute;t đ&oacute;, thị trường đ&atilde; thu h&uacute;t một lực lượng lớn m&ocirc;i giới tham gia h&agrave;nh nghề.</p>\r\n\r\n<p>Theo thống k&ecirc; của Hiệp hội M&ocirc;i giới bất động sản Việt Nam, thị trường bất động sản Việt Nam hiện nay c&oacute; gần 300.000 người l&agrave;m nghề m&ocirc;i giới, chủ yếu tập trung ở hai thị trường l&agrave; H&agrave; Nội v&agrave; TP HCM (H&agrave; Nội c&oacute; gần 60.000 người, TP HCM gần 100.000 người). C&aacute;c m&ocirc;i giới hoạt động trong c&aacute;c c&ocirc;ng ty m&ocirc;i giới, s&agrave;n giao dịch hoặc tự hoạt động c&aacute; nh&acirc;n. Trong đ&oacute; số lượng m&ocirc;i giới được cấp chứng chỉ h&agrave;nh nghề khoảng chỉ khoảng 35.000 ( tương đương 12%).</p>\r\n\r\n<p>Anh Nguyễn Văn H&ugrave;ng, Trưởng văn ph&ograve;ng Hội m&ocirc;i giới Bất động sản Việt Nam - Khu vực miền Nam cho biết hiện nay nghề m&ocirc;i giới đang bị hiểu sai. Nhiều người nghĩ rằng l&agrave;m m&ocirc;i giới l&agrave; gi&agrave;u nhanh, 1 th&aacute;ng thu nhập v&agrave;i chục đến v&agrave;i trăm triệu. Những vọng tưởng về một nghề cho ph&uacute;c lợi cao, ăn ngon mặc đẹp khiến nhiều bạn trẻ lao v&agrave;o như &ldquo;thi&ecirc;u th&acirc;n&rdquo; m&agrave; kh&ocirc;ng hề lường trước rủi ro. Thậm ch&iacute; nhiều cử nh&acirc;n c&ograve;n bỏ nghề ch&iacute;nh với thu nhập th&aacute;ng tr&ecirc;n 10 triệu để đi l&agrave;m m&ocirc;i giới rồi sau v&agrave;i năm mới nhận ra m&igrave;nh kh&ocirc;ng ph&ugrave; hợp.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, nghề m&ocirc;i giới BĐS c&oacute; thực sự l&agrave; nghề &ldquo;h&aacute;i ra tiền&rdquo; hay kh&ocirc;ng th&igrave; chỉ c&oacute; người trong cuộc mới r&otilde;. B&ecirc;n cạnh những người gi&agrave;u l&ecirc;n nhờ nghề th&igrave; c&oacute; những c&acirc;u chuyện &quot;cười ra nước mắt&quot; m&agrave; chỉ c&oacute; d&acirc;n l&agrave;m nghề m&ocirc;i giới mới từng thấm th&iacute;a.</p>\r\n\r\n<p>Theo anh Nguyễn Mạnh H&ugrave;ng, trong 11 th&aacute;ng đầu năm 2019 số lượng m&ocirc;i giới đ&atilde; bắt đầu giảm s&uacute;t. Thậm ch&iacute;, c&oacute; những m&ocirc;i giới 4-5 th&aacute;ng liền kh&ocirc;ng hề c&oacute; một đồng thu nhập n&agrave;o do kh&ocirc;ng b&aacute;n được sản phẩm, hoặc kh&ocirc;ng c&oacute; h&agrave;ng để b&aacute;n. Khi m&agrave; thị trường đang kh&oacute; khăn, kh&ocirc;ng chỉ hiếm nguồn cung m&agrave; c&ograve;n phải cạnh tranh về đất sống, c&aacute;c m&ocirc;i giới sẽ phải suy nghĩ lại về bản chất thật sự của nghề.</p>\r\n\r\n<p>&ldquo;N&uacute;t thắt về ph&aacute;p l&yacute; đang khiến nguồn cung trở n&ecirc;n khan hiếm, nguồn cung khan hiếm tại Th&agrave;nh phố Hồ Ch&iacute; Minh &ndash; H&agrave; Nội l&agrave; &aacute;p lực rất lớn cho những c&ocirc;ng ty ph&acirc;n phối bất động sản v&agrave; những người h&agrave;nh nghề m&ocirc;i giới bất động sản.</p>', '2019-12-24 12:11:10', '2019-12-24 11:58:32', 1, 'Cạn nguồn hàng, nhiều môi giới bất động sản chuyển nghề đi livestream dạo', 'Môi giới, bất động sản', 'Trong bối cảnh nguồn cung khan hiếm kỷ lục, hàng loạt môi giới phải chuyển nghề vì thất thu. Nhiều người chuyển qua làm nghề livestream bán quần áo, mỹ phẩm, đồng hồ…'),
(3, 'Công nghệ sẽ làm thay đổi ngành môi giới bất động sản', 'cong-nghe-se-lam-thay-doi-nganh-moi-gioi-bat-dong-san', 0, '2019-image001-1571801104571311519186-0-34-449-753-crop-1571801110622-637074259910625000-15754179014121427207596-crop-1575417920195993647293jpg-1577163570.jpg', 'Hơn 80% giao dịch bất động sản trên thị trường được thực hiện thông qua các nhà môi giới là con số cho thấy đóng góp của đội ngũ này với thị trường bất động sản. Tuy nhiên, những mặt trái của nghề nghiệp này cũng cho thấy sự cấp bách phải chuẩn hóa hoạt động môi giới, thay đổi tư duy môi giới truyền thống.', '<p>Theo &ocirc;ng Nguyễn Văn Đ&iacute;nh, Ph&oacute; chủ tịch thường trực ki&ecirc;m Tổng thư k&yacute; Hội M&ocirc;i giới bất động sản Việt Nam (VARS), m&ocirc;i giới bất động sản ở Việt Nam ng&agrave;y c&agrave;ng khẳng định vai tr&ograve; quan trọng, đội ngũ n&agrave;y đ&atilde; l&agrave;m tốt nhiệm vụ kết nối cung - cầu, định hướng gi&uacute;p c&aacute;c nh&agrave; ph&aacute;t triển bất động sản tạo thị trường mới, sản phẩm mới ph&ugrave; hợp với xu thế thị trường v&agrave; nhu cầu của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Theo thống k&ecirc; của VARS, lực lượng m&ocirc;i giới bất động sản Việt Nam hiện đạt tới 200.000 người hoạt động trong c&aacute;c c&ocirc;ng ty m&ocirc;i giới, s&agrave;n giao dịch hoặc độc lập. H&agrave;ng năm, c&aacute;c m&ocirc;i giới kết nối th&agrave;nh c&ocirc;ng h&agrave;ng vạn sản phẩm từ c&aacute;c đơn vị ph&aacute;t triển dự &aacute;n đến người ti&ecirc;u d&ugrave;ng. Ri&ecirc;ng năm 2018, cả nước c&oacute; tr&ecirc;n 100.000 giao dịch th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<p>Mặc d&ugrave; m&ocirc;i giới đ&oacute;ng một vai tr&ograve; quan trọng tr&ecirc;n thị trường bất động sản tuy nhi&ecirc;n, kh&ocirc;ng phủ nhận rằng một số lượng rất lớn người h&agrave;nh nghề m&ocirc;i giới hiện nay chưa qua c&aacute;c kh&oacute;a đ&agrave;o tạo kiến thức h&agrave;nh nghề để trang bị nền tảng kiến thức căn bản phục vụ cho c&ocirc;ng việc; phần lớn trong số chưa c&oacute; chứng chỉ h&agrave;nh nghề.</p>\r\n\r\n<p>Trong số 200.000 m&ocirc;i giới hiện nay, c&oacute; 50% nh&agrave; m&ocirc;i giới chuy&ecirc;n nghiệp, hoạt động thường xuy&ecirc;n tại c&aacute;c s&agrave;n. Phần c&ograve;n lại đa số l&agrave; nghiệp dư, trong đ&oacute; c&oacute; những người &quot;tay ngang&quot; chuyển nghề khi thị trường bất động sản tăng n&oacute;ng, kh&ocirc;ng được đ&agrave;o tạo, kh&ocirc;ng được kiểm so&aacute;t v&agrave; tiềm ẩn nhiều rủi ro cho người mua v&agrave; b&aacute;n. Đ&acirc;y l&agrave; thực trạng đ&aacute;ng b&aacute;o động nhất hiện nay v&agrave; chắc chắn l&agrave; nguy&ecirc;n nh&acirc;n căn bản khiến cho thị trường bất động sản ph&aacute;t triển k&eacute;m bền vững do m&ocirc;i giới thiếu kiến thức v&agrave; k&eacute;m hiểu biết về ph&aacute;p luật.</p>\r\n\r\n<p>&quot;C&aacute;c nh&agrave; m&ocirc;i giới khi tham gia thị trường bất động sản cần c&oacute; chứng chỉ h&agrave;nh nghề, c&oacute; kiến thức chuy&ecirc;n m&ocirc;n v&agrave; c&aacute;c kỹ năng, ti&ecirc;u chuẩn nhất định. Đ&acirc;y cũng l&agrave; yếu tố tạo n&ecirc;n sự kh&aacute;c biệt giữa c&aacute;c nh&agrave; m&ocirc;i giới chuy&ecirc;n nghiệp v&agrave; nghiệp dư. Một m&ocirc;i giới đ&uacute;ng nghĩa cần c&oacute; đủ khả năng tư vấn to&agrave;n diện v&agrave; đ&aacute;ng tin cậy cho nhu cầu của từng kh&aacute;ch h&agrave;ng&quot;, &ocirc;ng Đ&iacute;nh khẳng định.</p>\r\n\r\n<p>Chủ tịch Hội m&ocirc;i giới Bất động sản Việt Nam cũng cho biết th&ecirc;m, c&aacute;c giao dịch bất động sản hiện nay kh&ocirc;ng bắt buộc phải th&ocirc;ng qua S&agrave;n giao dịch hoặc đơn vị trung gian c&oacute; chức năng kinh doanh dịch vụ m&ocirc;i giới bất động sản. Nh&agrave; m&ocirc;i giới &iacute;t khi xuất hiện tr&ecirc;n c&aacute;c văn bản, hồ sơ giao dịch bất động sản v&igrave; ph&aacute;p luật kh&ocirc;ng quy định bắt buộc. Thế n&ecirc;n, khi c&oacute; tranh chấp xảy ra họ c&oacute; thể &quot;cao chạy xa bay&quot; m&agrave; kh&ocirc;ng phải g&aacute;nh hậu quả ph&aacute;p l&yacute; g&igrave; khi tư vấn sai. Ch&iacute;nh v&igrave; thế, &ocirc;ng Đ&iacute;nh cho biết cần c&oacute; những giải ph&aacute;p để chuẩn chất lượng cho m&ocirc;i giới.</p>\r\n\r\n<p>C&ugrave;ng quan điểm với &ocirc;ng đ&iacute;nh, c&aacute;c chuy&ecirc;n gia cũng cho rằng sự ph&aacute;t triển nhanh của lĩnh vực m&ocirc;i giới bất động sản đặt ra những y&ecirc;u cầu cấp thiết trong việc chuẩn h&oacute;a v&agrave; n&acirc;ng cao t&iacute;nh chuy&ecirc;n nghiệp của hoạt động n&agrave;y, đặc biệt trong thời đại b&ugrave;ng nổ c&aacute;ch mạng c&ocirc;ng nghệ 4.0. Ng&agrave;y nay, kh&aacute;ch h&agrave;ng dễ d&agrave;ng tiếp cận th&ocirc;ng tin với dự &aacute;n hơn, dễ d&agrave;ng t&igrave;m đến c&aacute;c k&ecirc;nh b&aacute;n h&agrave;ng online hơn l&agrave; chỉ chờ đợi v&agrave;o sự tư vấn của m&ocirc;i giới truyền thống.</p>\r\n\r\n<p>&quot;Nhu cầu v&agrave; th&oacute;i quen ti&ecirc;u d&ugrave;ng của người mua bất động sản cũng đang thay đổi theo chiều hướng ng&agrave;y một khắt khe hơn. Trong bối cảnh n&agrave;y, kh&ocirc;ng chỉ s&agrave;n m&ocirc;i giới m&agrave; ngay cả doanh nghiệp bất động sản cũng phải kịp thời t&aacute;i cấu tr&uacute;c sản phẩm v&agrave; ứng dụng khoa học c&ocirc;ng nghệ nếu muốn dẫn dắt v&agrave; tham gia cuộc chơi l&acirc;u d&agrave;i&quot;, &ocirc;ng Nguyễn Văn Minh - Ph&oacute; chủ tịch Sunshine Tech nhận định.</p>\r\n\r\n<p>Được biết, tr&ecirc;n thị trường bất động sản hiện nay, nhiều s&agrave;n m&ocirc;i giới đang đẩy mạnh chất lượng tư vấn, chất lượng dịch vụ bằng c&aacute;c ứng dụng th&ocirc;ng minh như Cenhomes của Tập đo&agrave;n Cengroup, Housemap của DKRA Việt Nam....Đặc biệt, theo tiết lộ, trong th&aacute;ng 12 n&agrave;y một si&ecirc;u ứng dụng t&iacute;ch hợp của một &ocirc;ng lớn tr&ecirc;n thị trường BĐS sẽ tạo c&uacute; đột ph&aacute; tr&ecirc;n thị trường.</p>', '2019-12-24 11:59:30', '2019-12-24 11:59:30', 1, 'Công nghệ sẽ làm thay đổi ngành môi giới bất động sản', 'công nghệ', 'Hơn 80% giao dịch bất động sản trên thị trường được thực hiện thông qua các nhà môi giới là con số cho thấy đóng góp của đội ngũ này với thị trường bất động sản. Tuy nhiên, những mặt trái của nghề nghiệp này cũng cho thấy sự cấp bách phải chuẩn hóa hoạt động môi giới, thay đổi tư duy môi giới truyền thống.'),
(4, 'Bất động sản lo thiếu vốn', 'bat-dong-san-lo-thieu-von', 17, 'photo1572491885274-1572491885354-crop-15724919094301861355537jpg-1577163638.jpg', 'Trong quý 3 vừa qua, lượng giao dịch nhà ở tại Hà Nội xuống mức thấp nhất trong vòng 3 năm trở lại đây, và có dấu hiệu phát triển không ổn định; tại Tp.HCM, hầu như không có dự án nhà giá rẻ, nhà xã hội được tung ra thị trường, giá bán căn hộ cũng tăng nhanh; trên toàn quốc, phân khúc nghỉ dưỡng trầm lắng. ', '<h2 data-field=\"sapo\">Phần lớn c&aacute;c nh&agrave; đầu tư phụ thuộc d&ograve;ng vốn vay ng&acirc;n h&agrave;ng kh&ocirc;ng thể c&oacute; vốn để đầu tư...</h2>\r\n\r\n<p>Trong qu&yacute; 3 vừa qua, lượng giao dịch nh&agrave; ở tại H&agrave; Nội xuống mức thấp nhất trong v&ograve;ng 3 năm trở lại đ&acirc;y, v&agrave; c&oacute; dấu hiệu ph&aacute;t triển kh&ocirc;ng ổn định; tại Tp.HCM, hầu như kh&ocirc;ng c&oacute; dự &aacute;n nh&agrave; gi&aacute; rẻ, nh&agrave; x&atilde; hội được tung ra thị trường, gi&aacute; b&aacute;n căn hộ cũng tăng nhanh; tr&ecirc;n to&agrave;n quốc, ph&acirc;n kh&uacute;c nghỉ dưỡng trầm lắng.&nbsp;</p>\r\n\r\n<p>&quot;Một trong những nguy&ecirc;n nh&acirc;n chủ yếu dẫn đến thực trạng n&agrave;y l&agrave; do phần lớn c&aacute;c nh&agrave; đầu tư phụ thuộc d&ograve;ng vốn vay ng&acirc;n h&agrave;ng kh&ocirc;ng thể c&oacute; vốn để đầu tư&quot;, b&aacute;o c&aacute;o qu&yacute; của Hội M&ocirc;i giới Bất động sản Việt Nam nhận định.</p>\r\n\r\n<p>Diễn biến tr&ecirc;n thị trường bất động sản cho thấy, c&ugrave;ng với đẩy mạnh r&agrave; so&aacute;t dự &aacute;n, việc siết chặt t&iacute;n dụng d&agrave;nh cho bất động sản đ&atilde; khiến thị trường n&agrave;y giảm mạnh về nguồn cung sản phẩm nh&agrave; ở, đồng thời li&ecirc;n tiếp đối mặt với nhiều kh&oacute; khăn.</p>\r\n\r\n<p><b>Doanh nghiệp ng&agrave;y c&agrave;ng kh&oacute; tiếp cận nguồn vốn</b></p>\r\n\r\n<p>Từ đầu năm 2019, c&aacute;c ng&acirc;n h&agrave;ng đ&atilde; giảm tỷ lệ vốn ngắn hạn cho vay trung, d&agrave;i hạn từ 45% xuống 40%, tăng hệ số rủi ro với hoạt động cho vay kinh doanh bất động sản từ 150% l&ecirc;n 200%.</p>\r\n\r\n<p>Chủ trương của Ng&acirc;n h&agrave;ng Nh&agrave; nước sẽ tiếp tục siết chặt t&iacute;n dụng bất động sản khi đưa ra lộ tr&igrave;nh giảm tỷ lệ vốn ngắn hạn cho vay trung, d&agrave;i hạn xuống 35% v&agrave;o năm 2020 v&agrave; 30% trong giai đoạn sau đ&oacute;, đồng thời c&oacute; thể n&acirc;ng hệ số rủi ro với cho vay kinh doanh bất động sản l&ecirc;n 250 - 300%.</p>\r\n\r\n<p>&quot;Do c&aacute;c ng&acirc;n h&agrave;ng thương mại đang thực hiện lộ tr&igrave;nh hạn chế dần t&iacute;n dụng v&agrave;o thị trường bất động sản v&agrave; kiểm so&aacute;t chặt chẽ t&iacute;n dụng ti&ecirc;u d&ugrave;ng, c&aacute;c chủ đầu tư dự &aacute;n bất động sản v&agrave; nh&agrave; đầu tư thứ cấp&nbsp;ng&agrave;y c&agrave;ng kh&oacute; tiếp cận nguồn vốn t&iacute;n dụng ng&acirc;n h&agrave;ng.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;,&nbsp;từ đầu năm 2017 đến nay, Nh&agrave; nước chưa bố tr&iacute; được nguồn t&aacute;i cấp vốn ưu đ&atilde;i t&iacute;n dụng nh&agrave; ở x&atilde; hội cho 4 ng&acirc;n h&agrave;ng Vietcombank, Vietinbank, Agribank, BIDV v&agrave; do qu&aacute; thiếu dự &aacute;n nh&agrave; ở x&atilde; hội, n&ecirc;n phần lớn đối tượng thụ hưởng nh&agrave; ở x&atilde; hội kh&ocirc;ng c&oacute; cơ hội được thu&ecirc;, thu&ecirc; mua nh&agrave; ở x&atilde; hội.&nbsp;Nh&agrave; nước chỉ mới bố tr&iacute; được khoảng 1.262 tỷ đồng cho Ng&acirc;n h&agrave;ng Ch&iacute;nh s&aacute;ch x&atilde; hội để cho vay mua nh&agrave; ở x&atilde; hội, qu&aacute; &iacute;t n&ecirc;n kh&ocirc;ng đ&aacute;p ứng được nhu cầu của x&atilde; hội.</p>\r\n\r\n<p>T&igrave;nh trạng mất c&acirc;n bằng&nbsp;&quot;cung-cầu&quot;&nbsp;do nguồn cung qu&aacute; &iacute;t trong l&uacute;c nhu cầu qu&aacute; cao l&agrave;m cho gi&aacute; nh&agrave; dễ bị đẩy l&ecirc;n cao, dễ xuất hiện t&igrave;nh trạng đầu cơ, đầu tư lướt s&oacute;ng&quot;, &ocirc;ng L&ecirc; Ho&agrave;ng Ch&acirc;u, Chủ tịch Hiệp hội bất động sản Tp.HCM, nhận định.</p>\r\n\r\n<p>Hiệp hội bất động sản Tp.HCM cũng cho biết, tại Tp.HCM, trong 9 th&aacute;ng đầu năm 2019, tổng dư nợ t&iacute;n dụng tăng trưởng kh&aacute;, với 2,236 triệu tỷ đồng, tăng 10,2% so với cuối năm 2018, nhưng c&oacute; xu thế tăng chậm hơn so với c&ugrave;ng kỳ năm trước.</p>\r\n\r\n<p>Trong đ&oacute;, t&iacute;n dụng đổ v&agrave;o bất động sản c&oacute; xu thế giảm dần, chỉ c&oacute; 269.000 tỷ đồng, tăng 3,41% so với cuối năm 2018 (thấp hơn mức tăng tổng dư nợ t&iacute;n dụng), chiếm 12,3% tổng dư nợ t&iacute;n dụng, thể hiện tr&ecirc;n thực tế l&agrave; c&aacute;c doanh nghiệp bất động sản ng&agrave;y c&agrave;ng kh&oacute; tiếp cận nguồn vốn t&iacute;n dụng ng&acirc;n h&agrave;ng.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, tổng dư nợ cho vay ti&ecirc;u d&ugrave;ng để x&acirc;y nh&agrave;, sửa nh&agrave;, mua nh&agrave; khoảng 128.000 tỷ đồng, chiếm khoảng 40% tổng dư nợ cho vay ti&ecirc;u d&ugrave;ng. Trong đ&oacute;, c&oacute; thể c&oacute; một phần kh&ocirc;ng nhỏ chuyển sang đầu tư bất động sản, tiềm ẩn rủi ro về t&iacute;n dụng.</p>\r\n\r\n<p><b>Kiểm so&aacute;t chặt t&iacute;n dụng bất động sản</b></p>\r\n\r\n<p>Cũng đ&aacute;nh gi&aacute; bất động sản vẫn c&ograve;n l&agrave; lĩnh vực c&oacute; nhiều rủi ro, tại phi&ecirc;n họp tổ của Quốc hội diễn ra chiều 22/10, Ph&oacute; thủ tướng Vương Đ&igrave;nh Huệ cho biết, Ch&iacute;nh phủ kh&ocirc;ng chủ quan khi kiểm so&aacute;t t&iacute;n dụng v&agrave;o lĩnh vực n&agrave;y.</p>\r\n\r\n<p>Những năm trước, ta thống k&ecirc; ri&ecirc;ng t&iacute;n dụng cho doanh nghiệp bất động sản 1 mục v&agrave; 1 mục l&agrave; t&iacute;n dụng ti&ecirc;u d&ugrave;ng cho người mua nh&agrave;, sửa chữa nh&agrave; ở... Từ năm vừa rồi Ch&iacute;nh phủ y&ecirc;u cầu tổng hợp 2 chỉ số n&agrave;y v&agrave;o để kh&ocirc;ng chủ quan l&agrave; tỷ lệ t&iacute;n dụng bất động sản thấp.</p>\r\n\r\n<p>Theo số liệu từ Ng&acirc;n h&agrave;ng Nh&agrave; nước, t&iacute;n dụng bất động sản hiện chiếm 19,14% tổng dư nợ nền kinh tế, tăng 14,58%. Trong đ&oacute; t&iacute;n dụng kinh doanh bất động sản chiếm 32,7% dư nợ bất động sản, tăng 5,5%; t&iacute;n dụng cho mục đ&iacute;ch tự sử dụng chiếm 68,3% dư nợ bất động sản, tăng 19,6%.</p>\r\n\r\n<p>Ch&iacute;nh phủ đ&atilde; chỉ đạo kiểm so&aacute;t chặt chẽ t&iacute;n dụng bất động sản, c&aacute;c dự &aacute;n quy m&ocirc; lớn, chỉ xem x&eacute;t c&aacute;c dự &aacute;n vay vốn khả thi, thận trọng cho vay nh&agrave; đầu tư thứ cấp. Theo đ&oacute;, doanh nghiệp bất động sản c&oacute; số dư nợ t&iacute;n dụng từ 5.000 tỷ đồng trở l&ecirc;n th&igrave; Thống đốc Ng&acirc;n h&agrave;ng Nh&agrave; nước b&aacute;o c&aacute;o Ch&iacute;nh phủ, Thủ tướng Ch&iacute;nh phủ 3 th&aacute;ng/lần v&agrave; chịu tr&aacute;ch nhiệm về b&aacute;o c&aacute;o đ&oacute;.</p>\r\n\r\n<p>Ở cấp của Ng&acirc;n h&agrave;ng Nh&agrave; nước, Thống đốc Ng&acirc;n h&agrave;ng Nh&agrave; nước tiếp tục y&ecirc;u cầu doanh nghiệp bất động sản c&oacute; dư nợ từ tr&ecirc;n 1.500 tỷ đồng để Thống đốc kiểm so&aacute;t nhằm bảo đảm sự chặt chẽ.</p>\r\n\r\n<p>Trước bối cảnh n&agrave;y, &ocirc;ng Nguyễn Mạnh H&agrave;, Ph&oacute; chủ tịch Hiệp hội Bất động sản Việt Nam, nh&igrave;n nhận hoạt động kinh doanh bất động sản cần nguồn vốn trung hạn, d&agrave;i hạn. Ở c&aacute;c nước th&igrave; c&aacute;c quỹ đầu tư v&agrave; thị trường chứng kho&aacute;n l&agrave; nguồn cung cấp vốn chủ yếu cho thị trường bất động sản nhưng ở nước ta, trong khi chưa h&igrave;nh th&agrave;nh đầy đủ c&aacute;c định chế t&agrave;i ch&iacute;nh, thị trường bất động sản đang phụ thuộc chủ yếu v&agrave;o nguồn vốn t&iacute;n dụng từ ng&acirc;n h&agrave;ng v&agrave; vốn trực tiếp từ người d&acirc;n. Với việc hạn chế cho vay bất động sản th&igrave; việc tiếp cận cả 2 k&ecirc;nh huy động n&agrave;y đều rất kh&oacute;.</p>', '2020-01-07 02:02:24', '2019-12-24 12:00:38', 1, 'Phần lớn các nhà đầu tư phụ thuộc dòng vốn vay ngân hàng không thể có vốn để đầu tư...', 'Bất động sản,ngân hàng', 'Trong quý 3 vừa qua, lượng giao dịch nhà ở tại Hà Nội xuống mức thấp nhất trong vòng 3 năm trở lại đây, và có dấu hiệu phát triển không ổn định; tại Tp.HCM, hầu như không có dự án nhà giá rẻ, nhà xã hội được tung ra thị trường, giá bán căn hộ cũng tăng nhanh; trên toàn quốc, phân khúc nghỉ dưỡng trầm lắng. '),
(5, 'Bộ Xây dựng dự báo thị trường BĐS năm 2020: Hà Nội và TPHCM đồng loạt tăng giá, đất nền tỉnh lẻ sụt giảm mạnh', 'bo-xay-dung-du-bao-thi-truong-bds-nam-2020-ha-noi-va-tphcm-dong-loat-tang-gia-dat-nen-tinh-le-sut-giam-manh', 17, 'dji-0570-01-1505437283896-1515213620339-1574822781807922394433-crop-1574822791513437950724jpeg-1577163835.jpeg', 'Ông Hà Quang Hưng, Phó Cục trưởng, Cục Quản lý nhà và thị trường bất động sản – Bộ Xây dựng vừa đưa ra những dự báo về thị trường BĐS trong năm 2020 trong bài tham luận tại Diễn đàn BĐS Việt Nam thường niên lần thứ hai được tổ chức sáng 27/11 tại Hà Nội.', '<h2 data-field=\"sapo\">Nh&agrave; đầu tư v&agrave; người ti&ecirc;u d&ugrave;ng đều e ngại việc mua &ndash; b&aacute;n bất động sản đất nền, dự b&aacute;o nguồn cung v&agrave; lượng giao dịch đất nền c&oacute; thể sụt giảm mạnh.</h2>\r\n\r\n<p>&Ocirc;ng H&agrave; Quang Hưng, Ph&oacute; Cục trưởng, Cục Quản l&yacute; nh&agrave; v&agrave; thị trường bất động sản &ndash; Bộ X&acirc;y dựng vừa đưa ra những dự b&aacute;o về thị trường BĐS trong năm 2020 trong b&agrave;i tham luận tại Diễn đ&agrave;n BĐS Việt Nam thường ni&ecirc;n lần thứ hai được tổ chức s&aacute;ng 27/11 tại H&agrave; Nội.</p>\r\n\r\n<p>Theo đ&oacute;, &ocirc;ng Hưng cho biết dự b&aacute;o thị trường bất động sản năm 2020 sẽ kh&ocirc;ng c&oacute; nhiều biến động, nhu cầu về nh&agrave; ở tiếp tục gia tăng, đặc biệt đối với ph&acirc;n kh&uacute;c nh&agrave; ở x&atilde; hội, nh&agrave; ở thương mại gi&aacute; thấp. Thị trường bất động sản 2020 dự b&aacute;o tiếp tục ph&aacute;t triển ổn định, bền vững.&nbsp;</p>\r\n\r\n<p>Đối với thị trường bất động sản H&agrave; Nội, nguồn cung bất động sản nh&agrave; ở duy tr&igrave; ổn định, nguồn cung mới vẫn chủ yếu ở ph&acirc;n kh&uacute;c trung cấp, gi&aacute; bất động sản tăng 1-2%. Tại Tp. Hồ Ch&iacute; Minh, nguồn cung bất động sản nh&agrave; ở giảm do kh&ocirc;ng c&oacute; nhiều dự &aacute;n mới được ph&ecirc; duyệt triển khai, đặc biệt l&agrave; đối với ph&acirc;n kh&uacute;c nh&agrave; ở gi&aacute; thấp, gi&aacute; bất động sản tăng 4-5%.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/public/userfiles/images/blog/dji-0570-01-1505437283896-1515213620339-1574822781807922394433-crop-1574822791513437950724.jpeg\" style=\"width: 640px; height: 399px;\" /></p>\r\n\r\n<p>Đối với thị trường bất động sản đất nền khu vực c&aacute;c tỉnh miền Đ&ocirc;ng Nam bộ, sau diễn biến từ vụ việc của C&ocirc;ng ty Alibaba, c&ocirc;ng t&aacute;c quản l&yacute; của ch&iacute;nh quyền sẽ chặt chẽ hơn, kh&oacute; c&oacute; Dự &aacute;n mới ra h&agrave;ng. Nh&agrave; đầu tư v&agrave; người ti&ecirc;u d&ugrave;ng đều e ngại việc mua &ndash; b&aacute;n bất động sản đất nền, dự b&aacute;o nguồn cung v&agrave; lượng giao dịch đất nền c&oacute; thể sụt giảm mạnh.&nbsp;</p>\r\n\r\n<p>Với thị trường bất động sản du lịch tại một số địa phương như: Quảng Ninh, Đ&agrave; Nẵng, Nha Trang, Quảng Nam, Ki&ecirc;n Giang, ... dự b&aacute;o thị trường tiếp tục chững lại, trầm lắng hơn so với giai đoạn 2017-2018.</p>\r\n\r\n<p>C&ugrave;ng với việc dự b&aacute;o thị trường BĐS năm 2020, Ph&oacute; Cục trưởng, Cục Quản l&yacute; nh&agrave; v&agrave; thị trường bất động sản cũng đưa ra 6 tồn tại của thị trường bất động sản hiện nay.</p>\r\n\r\n<p>Thứ nhất, thị trường bất động sản ph&aacute;t triển chưa thật sự ổn định. Vẫn c&ograve;n kh&aacute; nhiều dự &aacute;n chậm ho&agrave;n th&agrave;nh hoặc kh&ocirc;ng đủ điều kiện hạ tầng để đưa v&agrave;o sử dụng, bị bỏ hoang, g&acirc;y l&atilde;ng ph&iacute; nguồn lực của x&atilde; hội. Cơ cấu h&agrave;ng h&oacute;a bất động sản, nhất l&agrave; nh&agrave; ở (tại c&aacute;c th&agrave;nh phố lớn như H&agrave; Nội v&agrave; Tp. Hồ Ch&iacute; Minh,...) c&ograve;n mất c&acirc;n đối, chưa ph&ugrave; hợp với nhu cầu của đa số người d&acirc;n. Gi&aacute; cả h&agrave;ng h&oacute;a bất động sản, nhất l&agrave; gi&aacute; nh&agrave; ở chưa ổn định, kh&aacute; cao so với thu nhập của người d&acirc;n.&nbsp;</p>\r\n\r\n<p>Thứ hai, thị trường bất động sản ph&aacute;t triển thiếu minh bạch, từ kh&acirc;u quy hoạch, lựa chọn nh&agrave; đầu tư, giao dự &aacute;n đến giao dịch bất động sản. Hệ thống th&ocirc;ng tin, dự b&aacute;o về t&igrave;nh h&igrave;nh thị trường bất động sản chưa đầy đủ, thiếu minh bạch. Chưa c&oacute; hệ thống quản l&yacute; v&agrave; thống k&ecirc; dữ liệu về sở hữu bất động sản, giao dịch bất động sản đồng bộ để đ&aacute;p ứng nhu cầu c&ocirc;ng t&aacute;c quản l&yacute; nh&agrave; nước từ Trung ương tới địa phương về lĩnh vực bất động sản.&nbsp;</p>\r\n\r\n<p>Thứ ba, việc tổ chức triển khai thực hiện ph&aacute;t triển nh&agrave; ở x&atilde; hội đang gặp vấn đề tồn tại lớn nhất l&agrave; ng&acirc;n s&aacute;ch nh&agrave; nước chưa bố tr&iacute; đủ nguồn vốn cho nh&agrave; ở x&atilde; hội, đặc biệt l&agrave; chưa bố tr&iacute; được nguồn vốn để cấp b&ugrave; l&atilde;i suất cho 4 ng&acirc;n h&agrave;ng thương mại cho vay nh&agrave; ở x&atilde; hội. Hiện nay v&agrave; trong thời gian tới nguồn cung về nh&agrave; ở x&atilde; hội c&ograve;n rất hạn chế, chưa thể đ&aacute;p ứng nhu cầu của người ngh&egrave;o, người thu nhập thấp, ch&iacute;nh v&igrave; vậy m&agrave; nhu cầu về nh&agrave; ở thương mại c&oacute; quy m&ocirc; vừa v&agrave; nhỏ, gi&aacute; thấp l&agrave; rất lớn, trong khi ph&aacute;p luật lại chưa c&oacute; cơ chế, ch&iacute;nh s&aacute;ch ưu đ&atilde;i để khuyến kh&iacute;ch c&aacute;c th&agrave;nh phần kinh tế tham gia đầu tư v&agrave;o ph&acirc;n kh&uacute;c n&agrave;y.</p>\r\n\r\n<p>Thứ tư, trong v&agrave;i năm trở lại đ&acirc;y, nhiều địa phương ven biển đ&atilde; cho ph&eacute;p doanh nghiệp đầu tư kinh doanh c&aacute;c dự &aacute;n du lịch nghỉ dưỡng c&oacute; loại h&igrave;nh c&ocirc;ng tr&igrave;nh (condotel). Tuy nhi&ecirc;n, việc đầu tư, x&acirc;y dựng, quản l&yacute; vận h&agrave;nh v&agrave; kinh doanh c&aacute;c Kỷ yếu diễn đ&agrave;n Bất động sản Việt Nam 69 loại h&igrave;nh bất động sản mới n&agrave;y vẫn c&ograve;n một số vướng mắc như: quy định ph&aacute;p luật chưa quy định r&otilde; về chế độ sử dụng đất, thời hạn sở hữu khi cấp giấy chứng nhận quyền sử dụng đất, quyền sở hữu t&agrave;i sản gắn liền với đất; c&ograve;n thiếu quy chuẩn, ti&ecirc;u chuẩn x&acirc;y dựng; quy chế quản l&yacute; vận h&agrave;nh, kinh doanh với c&aacute;c bất động sản mới (căn hộ du lịch, văn ph&ograve;ng kết hợp lưu tr&uacute;...).&nbsp;</p>\r\n\r\n<p>Thứ năm, nguồn lực t&agrave;i ch&iacute;nh cho đầu tư c&aacute;c dự &aacute;n bất động sản n&oacute;i chung c&ograve;n rất hạn chế, chưa đa dạng, chủ yếu dựa v&agrave;o nguồn vốn t&iacute;n dụng ng&acirc;n h&agrave;ng v&agrave; tiền ứng trước của kh&aacute;ch h&agrave;ng. Theo b&aacute;o c&aacute;o của Ng&acirc;n h&agrave;ng Nh&agrave; nước Việt Nam th&igrave; dư nợ t&iacute;n dụng đầu tư kinh doanh bất động sản li&ecirc;n tục tăng từ năm 2014 đến nay. Tuy nhi&ecirc;n, điều đ&aacute;ng ch&uacute; &yacute; l&agrave; dư nợ t&iacute;n dụng chủ yếu tập trung v&agrave;o một số nh&agrave; đầu tư lớn v&agrave; ph&acirc;n kh&uacute;c bất động sản cao cấp, tr&ecirc;n thị trường t&iacute;n dụng c&oacute; dấu hiệu một số hoạt động kh&ocirc;ng l&agrave;nh mạnh; b&ecirc;n cạnh đ&oacute; lại đang thiếu nguồn vốn t&iacute;n dụng v&agrave;o ph&acirc;n kh&uacute;c bất động sản nh&agrave; ở gi&aacute; thấp, nh&agrave; ở x&atilde; hội m&agrave; số đ&ocirc;ng người d&acirc;n đang cần.&nbsp;</p>\r\n\r\n<p>Thứ s&aacute;u, c&ocirc;ng t&aacute;c r&agrave; so&aacute;t, điều chỉnh, chuyển đổi cơ cấu c&aacute;c dự &aacute;n bất động sản cho ph&ugrave; hợp với nhu cầu của thị trường đ&atilde; được triển khai, nhưng nhiều địa phương c&ograve;n thiếu quyết liệt trong việc thu hồi dự &aacute;n theo quy định của ph&aacute;p luật về đất đai hoặc tạm dừng c&aacute;c dự &aacute;n kh&ocirc;ng ph&ugrave; hợp với quy hoạch, kế hoạch v&agrave; nhu cầu thực của thị trường</p>', '2020-01-07 02:02:17', '2019-12-24 12:03:55', 1, 'Bộ Xây dựng dự báo thị trường BĐS năm 2020: Hà Nội và TPHCM đồng loạt tăng giá, đất nền tỉnh lẻ sụt giảm mạnh', 'BĐS,Hà Nội', 'Ông Hà Quang Hưng, Phó Cục trưởng, Cục Quản lý nhà và thị trường bất động sản – Bộ Xây dựng vừa đưa ra những dự báo về thị trường BĐS trong năm 2020 trong bài tham luận tại Diễn đàn BĐS Việt Nam thường niên lần thứ hai được tổ chức sáng 27/11 tại Hà Nội.'),
(6, 'Vì sao kinh tế phát triển nhất khu vực mà doanh nghiệp bất động sản Việt vẫn kêu?', 'vi-sao-kinh-te-phat-trien-nhat-khu-vuc-ma-doanh-nghiep-bat-dong-san-viet-van-keu', 17, 'caooctranduyhung-1576749645600x400-15768060988502000259836-crop-15768061060841348958jpg-1577164049.jpg', 'Các chuyên gia cho rằng pháp lý là yếu tố gây khó cho thị trường địa ốc.Năm 2020, bất động sản được đánh giá là vẫn phát triển ổn định, một số phân khúc có thể là điểm sáng đầu tư.', '<h2 data-field=\"sapo\">C&aacute;c chuy&ecirc;n gia cho rằng ph&aacute;p l&yacute; l&agrave; yếu tố g&acirc;y kh&oacute; cho thị trường địa ốc.Năm 2020, bất động sản được đ&aacute;nh gi&aacute; l&agrave; vẫn ph&aacute;t triển ổn định, một số ph&acirc;n kh&uacute;c c&oacute; thể l&agrave; điểm s&aacute;ng đầu tư.</h2>\r\n\r\n<p>Tại Diễn đ&agrave;n bất động sản Việt Nam thường ni&ecirc;n với chủ đề&nbsp;<em>Xu thế d&ograve;ng tiền v&agrave;o bất động sản 2019</em>&nbsp;diễn ra ng&agrave;y 19/12, &ocirc;ng Cấn Văn Lực, chuy&ecirc;n gia kinh tế trưởng BIDV đặt vấn đề: Tại sao kinh tế Việt Nam tăng trưởng cao nhất khu vực nhưng doanh nghiệp bất động sản vẫn k&ecirc;u?</p>\r\n\r\n<p>Trả lời c&acirc;u hỏi của &ocirc;ng Cấn Văn Lực, GS Đặng H&ugrave;ng V&otilde;, Nguy&ecirc;n Thứ trưởng T&agrave;i nguy&ecirc;n &amp; M&ocirc;i trường cho rằng vướng mắc lớn nhất của thị trường bất động sản hiện nay l&agrave; yếu tố ph&aacute;p luật.</p>\r\n\r\n<p>&Ocirc;ng V&otilde; đ&aacute;nh gi&aacute; kinh tế Việt Nam n&oacute;i chung v&agrave; thị trường bất động sản n&oacute;i ri&ecirc;ng đều đang ph&aacute;t triển tốt, c&aacute;c dự &aacute;n c&oacute; t&iacute;nh thanh khoản cao, giao dịch th&agrave;nh c&ocirc;ng đến 90% tuy nhi&ecirc;n trong năm 2019, những vướng mắc về mặt ph&aacute;p luật đ&atilde; khiến nhiều dự &aacute;n kh&ocirc;ng được ph&ecirc; duyệt, g&acirc;y kh&oacute; cho doanh nghiệp.</p>\r\n\r\n<p>Loại h&igrave;nh condotel &quot;giữa đường đứt g&aacute;nh&quot; với khởi nguồn l&agrave; sự cố vỡ trận ở dự &aacute;n Cocobay Đ&agrave; Nẵng. &Ocirc;ng V&otilde; cũng cho rằng thị trường c&oacute; thể sẽ chứng kiến nhiều trường hợp condotel kh&aacute;c đổ vỡ. Nguy&ecirc;n nh&acirc;n, cũng bởi ph&aacute;p luật hiện h&agrave;nh chưa theo kịp sự ph&aacute;t triển của thị trường.</p>\r\n\r\n<p>Để thị trường ph&aacute;t triển, GS Đặng H&ugrave;ng V&otilde; cho rằng Nh&agrave; nước phải c&oacute; biện ph&aacute;p để kiểm so&aacute;t những điểm bất thường trong bất động sản; để nh&agrave; ở ph&aacute;t triển tốt với mức gi&aacute; c&oacute; thấp hơn nhằm tiếp cận tốt hơn với nhu cầu của người d&acirc;n; để mở đường cho condotel ph&aacute;t triển trở lại.</p>\r\n\r\n<p>Đồng quan điểm với GS Đặng H&ugrave;ng V&otilde;, &ocirc;ng Nguyễn Văn Đ&iacute;nh, Ph&oacute; Chủ tịch Hội M&ocirc;i giới bất động sản Việt Nam cũng cho rằng cản trở của thị trường hiện nay l&agrave; chủ trương ph&aacute;t triển thị trường của cơ quan quản l&yacute;. &Ocirc;ng Đ&iacute;nh lập luận thị trường bất động sản 2019 ghi nhận tỷ lệ hấp thụ rất cao, chẳng hạn c&aacute;c dự &aacute;n ở TP HCM ra h&agrave;ng đến đ&acirc;u b&aacute;n hết đến đ&oacute; tuy nhi&ecirc;n c&aacute;c dự &aacute;n mới lại bị siết. Sở dĩ thị trường vẫn c&ograve;n h&agrave;ng mới b&aacute;n ra do c&aacute;c dự &aacute;n được ph&ecirc; duyệt ở giai đoạn trước.</p>\r\n\r\n<p>&quot;Nguồn cầu mạnh m&agrave; nguồn cung kh&ocirc;ng theo kịp l&agrave; một sự cảnh b&aacute;o&quot;, &ocirc;ng Đ&iacute;nh n&oacute;i.&nbsp;&Ocirc;ng cũng nhận định nếu Ch&iacute;nh phủ kh&ocirc;ng c&oacute; chủ trương ph&aacute;t triển th&igrave; 2 năm nữa, thị trường sẽ c&oacute; vấn đề nghi&ecirc;m trọng.&nbsp;</p>\r\n\r\n<p>Luật sư Trương Thanh Đức, Chủ tịch Hội đồng th&agrave;nh vi&ecirc;n Basisco cho rằng c&oacute; 3 yếu tố ch&iacute;nh ảnh hưởng đến thị trường bất động sản l&agrave; kinh tế, ph&aacute;p l&yacute; v&agrave; ch&iacute;nh trị. Về kinh tế, luật sư Đức đ&aacute;nh gi&aacute; thuận lợi, c&oacute; chiều hướng đi l&ecirc;n. Song về ph&aacute;p l&yacute;, vị n&agrave;y n&oacute;i: &quot;Đến l&uacute;c tưởng như ph&aacute;p l&yacute; l&agrave; đ&atilde; ho&agrave;n thiện rồi th&igrave; mới giật m&igrave;nh thấy c&aacute;c luật chồng ch&eacute;o, lằng nhằng v&agrave; dự b&aacute;o sự chồng ch&eacute;o, lằng nhằng n&agrave;y c&ograve;n l&acirc;u mới gỡ được&quot;.</p>\r\n\r\n<p><img alt=\"\" src=\"/public/userfiles/images/blog/photo-1-1576806050309758439991.jpg\" style=\"width: 640px; height: 380px;\" /></p>\r\n\r\n<p><b>2020, thị trường bất động sản sẽ ph&aacute;t triển ổn định</b></p>\r\n\r\n<p>&Ocirc;ng Nguyễn Văn Đ&iacute;nh cho rằng năm 2020, thị trường bất động sản vẫn giữ nhịp thở như năm 2019, tuy nhi&ecirc;n sẽ c&oacute; những th&aacute;ch thức nằm ở ch&iacute;nh s&aacute;ch ph&aacute;t triển dự &aacute;n, thủ tục ph&aacute;p l&yacute; v&agrave; gi&aacute; đất ở c&aacute;c tỉnh bắt đầu tăng theo bảng gi&aacute; đất giai đoạn mới.</p>\r\n\r\n<p>&quot;Ch&iacute;nh s&aacute;ch l&agrave;m hạn chế nguồn cung v&agrave; l&agrave;m tăng gi&aacute; bất động sản, từ đ&oacute; khiến thị trường kh&ocirc;ng b&igrave;nh thường, hạn chế cơ hội của người thu nhập thấp tiếp cận nh&agrave; ở&quot;, &ocirc;ng Đ&iacute;nh dự b&aacute;o.</p>\r\n\r\n<p>Chuy&ecirc;n gia kinh tế L&ecirc; Xu&acirc;n Nghĩa nh&igrave;n nhận tốc độ tăng gi&aacute; của bất động sản ven đ&ocirc; sẽ nhanh hơn ở nội đ&ocirc;, n&ecirc;n đầu tư v&agrave;o khu vực ven đ&ocirc; c&oacute; thể sẽ c&oacute; triển vọng tăng gi&aacute; nhanh hơn. &Ocirc;ng cho rằng ở c&aacute;c đ&ocirc; thị lớn như TP HCM v&agrave; H&agrave; Nội, triển vọng để ph&aacute;t triển bất động sản ven đ&ocirc; c&ograve;n kh&aacute; mạnh v&igrave; c&oacute; d&ograve;ng di d&acirc;n từ c&aacute;c tỉnh về rất nhiều, nhu cầu nh&agrave; ở của người nhập cư cũng ở mức cao, song điều n&agrave;y c&oacute; thể kh&ocirc;ng đ&uacute;ng với c&aacute;c tỉnh lẻ.</p>\r\n\r\n<p><img alt=\"\" src=\"/public/userfiles/images/blog/photo-1-1576806053424808497844.jpg\" style=\"width: 640px; height: 377px;\" /></p>\r\n\r\n<p>Về triển vọng của từng loại h&igrave;nh, &ocirc;ng Nghĩa cho rằng về d&agrave;i hạn, condotel l&agrave; loại h&igrave;nh c&oacute; tiềm năng cuối c&ugrave;ng bất động sản Việt Nam d&ugrave; hiện tại, loại h&igrave;nh n&agrave;y c&ograve;n c&oacute; những trục trặc về cơ chế, ph&aacute;p l&yacute;.&nbsp;&quot;Tất nhi&ecirc;n theo t&ocirc;i, đầu tư v&agrave;o condotel chỉ tốt cho c&aacute;c nh&agrave; đầu tư lớn bởi chỉ c&aacute;c nh&agrave; đầu tư lớn mới thực hiện đồng thời được c&aacute;c yếu tố l&agrave; ph&aacute;t triển được dự &aacute;n, quản l&yacute; dự &aacute;n v&agrave; tổ chức được văn ho&aacute; cộng động, tổ chức lữ h&agrave;nh&quot;, vị chuy&ecirc;n gia n&agrave;y n&oacute;i.</p>\r\n\r\n<p>Chuy&ecirc;n gia kinh tế L&ecirc; Xu&acirc;n Nghĩa cũng ph&acirc;n t&iacute;ch ở Việt Nam, người c&oacute; tiền thường hướng đến mua nh&agrave; ở, t&igrave;m mọi c&aacute;ch c&oacute; được nh&agrave; ở để vừa đảm bảo tương lai cho con c&aacute;i, vừa l&agrave;m cho gia đ&igrave;nh trở n&ecirc;n ấm c&uacute;ng. Do đ&oacute; trong ngắn hạn, chung cư vẫn l&agrave; ph&acirc;n kh&uacute;c tốt, được nhiều người, đặc biệt l&agrave; người trẻ y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p>Ngo&agrave;i ra, &ocirc;ng Nghĩa cũng cho rằng đất nền cũng l&agrave; một phương &aacute;n d&agrave;nh cho giới đầu cơ, tuy nhi&ecirc;n đ&acirc;y kh&ocirc;ng phải l&agrave; phương &aacute;n đầu tư hiệu quả trong d&agrave;i hạn như condotel.</p>', '2020-01-07 02:02:02', '2019-12-24 12:07:29', 1, NULL, NULL, 'Các chuyên gia cho rằng pháp lý là yếu tố gây khó cho thị trường địa ốc.Năm 2020, bất động sản được đánh giá là vẫn phát triển ổn định, một số phân khúc có thể là điểm sáng đầu tư.'),
(9, 'aaaa', 'aaaa', 17, 'bannerpng-1577725268.png', NULL, '<p>ffff</p>', '2020-01-07 02:01:40', '2019-12-31 00:01:08', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_blog_category`
--

CREATE TABLE `la_blog_category` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0: disable, 1 active, 2 trash	',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `la_blog_category`
--

INSERT INTO `la_blog_category` (`id`, `title`, `alias`, `parent_id`, `photo`, `icon`, `content`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dịch vụ', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(2, 'Dịch vụ thiết kế website', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(3, 'Dịch vụ thiết kế logo', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(4, 'Tutorial', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(5, 'Design', '', 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(6, 'PSD', '', 5, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(7, 'HTML / CSS', '', 5, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(8, 'Javascript', '', 5, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(9, 'Lập trình', '', 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(10, 'Lập trình PHP', '', 9, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-12 00:00:00'),
(11, 'Layout', 'layout', 6, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-12 00:00:00', '2019-09-29 14:51:40'),
(12, 'test bài viếts', 'test-bai-viets', 4, '72477621-960676157644713-3915840886285533184-o-1575740034.jpg', 'v1-1-1575740079.jpg', 'adasdassccc', 'aabcd', 'vdd', 'c', 0, '2019-09-27 20:37:31', '2019-12-08 00:44:40'),
(13, 'abc', 'aaa', 0, NULL, NULL, 'dddd', 'a', 'b', 'c', 2, '2019-09-27 20:45:10', '2019-09-28 13:27:44'),
(14, 'abcd', 'abcd-bcde', 5, 'v1-1-1569661440.jpg', 'v1-4-1569661390.jpg', 'eds', NULL, NULL, NULL, 2, '2019-09-28 13:28:03', '2019-09-28 16:40:46'),
(15, 'xoa thu chuyen muc', '', 12, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-09-28 16:37:11', '2019-12-08 00:40:49'),
(16, 'cho test lại', 'cho-test-lai', 0, NULL, NULL, 'bài test', NULL, NULL, NULL, 2, '2019-09-28 16:53:01', '2019-09-28 16:53:56'),
(17, 'test mới', 'test-moi', 0, '5dcd11de380e3png-1577093356.png', NULL, 'aaa', NULL, NULL, NULL, 1, '2019-12-23 16:29:16', '2019-12-23 16:29:16'),
(18, 'test hình ảnh category', 'test-hinh-anh-category', 0, '5dcd26cf25921-1577093637.png', '5dcd12206ee56dasd-1577093637.png', 'aaa', NULL, NULL, NULL, 1, '2019-12-23 16:32:41', '2019-12-23 16:33:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_categories`
--

CREATE TABLE `la_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_category_faq`
--

CREATE TABLE `la_category_faq` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_category_faq`
--

INSERT INTO `la_category_faq` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General', 1, '2022-02-17 15:23:37', '2022-02-17 15:23:37'),
(2, 'Support\r\n', 1, '2022-02-17 15:26:38', '2022-02-17 15:26:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_city`
--

CREATE TABLE `la_city` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thành phố/quận/huyện' ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `la_city`
--

INSERT INTO `la_city` (`id`, `region_id`, `title`, `updated_at`, `created_at`) VALUES
(1, 1, 'Quận 1', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(2, 1, '\r\nQuận 2', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(3, 1, '\r\nQuận 3', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(4, 1, '\r\nQuận 4', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(5, 1, '\r\nQuận 5', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(6, 1, '\r\nQuận 6', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(7, 1, '\r\nQuận 7', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(8, 1, '\r\nQuận 8', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(9, 1, '\r\nQuận 9', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(10, 1, '\r\nQuận 10', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(11, 1, '\r\nQuận 11', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(12, 1, '\r\nQuận 12', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(13, 1, '\r\nQuận Bình Tân', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(14, 1, '\r\nQuận Bình Thạnh', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(15, 1, '\r\nQuận Gò Vấp', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(16, 1, '\r\nQuận Phú Nhuận', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(17, 1, '\r\nQuận Tân Bình', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(18, 1, '\r\nQuận Tân Phú', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(19, 1, '\r\nQuận Thủ Đức', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(20, 1, '\r\nHuyện Bình Chánh', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(21, 1, '\r\nHuyện Cần Giờ', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(22, 1, '\r\nHuyện Củ Chi', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(23, 1, '\r\nHuyện Hóc Môn', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(24, 1, '\r\nHuyện Nhà Bè', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(25, 2, 'Quận Ba Đình', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(26, 2, '\r\nQuận Hoàn Kiếm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(27, 2, '\r\nQuận Hai Bà Trưng', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(28, 2, '\r\nQuận Đống Đa', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(29, 2, '\r\nQuận Cầu Giấy', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(30, 2, '\r\nQuận Long Biên', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(31, 2, '\r\nQuận Hoàng Mai', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(32, 2, '\r\nHuyện Sóc Sơn', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(33, 2, '\r\nQuận Bắc Từ Liêm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(34, 2, '\r\nHuyện Thanh Trì', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(35, 2, '\r\nHuyện Gia Lâm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(36, 2, '\r\nHuyện Ba Vì', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(37, 2, '\r\nHuyện Chương Mỹ', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(38, 2, '\r\nHuyện Đan Phượng', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(39, 2, '\r\nHuyện Hoài Đức', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(40, 2, '\r\nHuyện Mỹ Đức', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(41, 2, '\r\nHuyện Phú Xuyên', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(42, 2, '\r\nHuyện Phúc Thọ', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(43, 2, '\r\nHuyện Quốc Oai', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(44, 2, '\r\nHuyện Thạch Thất', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(45, 2, '\r\nHuyện Thanh Oai', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(46, 2, '\r\nHuyện Thường Tín', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(47, 2, '\r\nHuyện Ứng Hòa', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(48, 2, '\r\nHuyện Mê Linh', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(49, 2, '\r\nQuận Hà Đông', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(50, 2, '\r\nThị xã Sơn Tây', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(51, 2, '\r\nHuyện Đông Anh', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(52, 2, '\r\nQuận Nam Từ Liêm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(53, 2, '\r\nQuận Thanh Xuân', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(54, 2, '\r\nQuận Tây Hồ', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(55, 3, 'Huyện Hoàng Sa', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(56, 3, '\r\nQuận Thanh Khê', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(57, 3, '\r\nHuyện Hòa Vang', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(58, 3, '\r\nQuận Sơn Trà', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(59, 3, '\r\nQuận Liên Chiểu', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(60, 3, '\r\nQuận Hải Châu', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(61, 3, '\r\nQuận Cẩm Lệ', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(62, 3, '\r\nQuận Ngũ Hành Sơn', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(63, 4, 'Huyện An Phú', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(64, 4, '\r\nHuyện Tịnh Biên', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(65, 4, '\r\nHuyện Châu Phú', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(66, 4, '\r\nHuyện Phú Tân', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(67, 4, '\r\nThành phố Châu Đốc', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(68, 4, '\r\nThành phố Long Xuyên', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(69, 4, '\r\nHuyện Chợ Mới', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(70, 4, '\r\nHuyện Châu Thành', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(71, 4, '\r\nHuyện Tri Tôn', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(72, 4, '\r\nThị xã Tân Châu', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(73, 4, '\r\nHuyện Thoại Sơn', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(74, 5, 'Huyện Xuyên Mộc', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(75, 5, '\r\nHuyện Côn Đảo', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(76, 5, '\r\nHuyện Long Điền', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(77, 5, '\r\nHuyện Châu Đức', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(78, 5, '\r\nThành phố Vũng Tàu', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(79, 5, '\r\nHuyện Tân Thành', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(80, 5, '\r\nThành phố Bà Rịa', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(81, 5, '\r\nHuyện Đất Đỏ', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(82, 6, 'Huyện Lục Ngạn', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(83, 6, '\r\nHuyện Sơn Động', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(84, 6, '\r\nHuyện Hiệp Hòa', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(85, 6, '\r\nThành phố Bắc Giang', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(86, 6, '\r\nHuyện Tân Yên', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(87, 6, '\r\nHuyện Việt Yên', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(88, 6, '\r\nHuyện Yên Dũng', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(89, 6, '\r\nHuyện Lạng Giang', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(90, 6, '\r\nHuyện Yên Thế', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(91, 6, '\r\nHuyện Lục Nam', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(92, 7, 'Huyện Ngân Sơn', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(93, 7, '\r\nHuyện Chợ Đồn', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(94, 7, '\r\nHuyện Ba Bể', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(95, 7, '\r\nHuyện Chợ Mới', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(96, 7, '\r\nHuyện Bạch Thông', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(97, 7, '\r\nThành Phố Bắc Kạn', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(98, 7, '\r\nHuyện Na Rì', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(99, 7, '\r\nHuyện Pác Nặm', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(100, 8, 'Thành phố Bạc Liêu', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(101, 8, '\r\nHuyện Vĩnh Lợi', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(102, 8, '\r\nThị xã Giá Rai', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(103, 8, '\r\nHuyện Hồng Dân', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(104, 8, '\r\nHuyện Phước Long', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(105, 8, '\r\nHuyện Đông Hải', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(106, 8, '\r\nHuyện Hoà Bình', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(107, 9, 'Huyện Gia Bình', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(108, 9, '\r\nHuyện Quế Võ', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(109, 9, '\r\nHuyện Tiên Du', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(110, 9, '\r\nThị xã Từ Sơn', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(111, 9, '\r\nHuyện Lương Tài', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(112, 9, '\r\nHuyện Yên Phong', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(113, 9, '\r\nHuyện Thuận Thành', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(114, 9, '\r\nThành phố Bắc Ninh', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(115, 10, 'Huyện Bình Đại', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(116, 10, '\r\nHuyện Châu Thành', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(117, 10, '\r\nHuyện Ba Tri', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(118, 10, '\r\nHuyện Thạnh Phú', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(119, 10, '\r\nHuyện Chợ Lách', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(120, 10, '\r\nHuyện Mỏ Cày Nam', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(121, 10, '\r\nHuyện Giồng Trôm', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(122, 10, '\r\nThành phố Bến Tre', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(123, 10, '\r\nHuyện Mỏ Cày Bắc', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(124, 11, 'Huyện Bắc Tân Uyên', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(125, 11, '\r\nThị xã Thuận An', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(126, 11, '\r\nThị xã Tân Uyên', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(127, 11, '\r\nThị xã Dĩ An', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(128, 11, '\r\nThị xã Bến Cát', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(129, 11, '\r\nHuyện Dầu Tiếng', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(130, 11, '\r\nHuyện Phú Giáo', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(131, 11, '\r\nThành phố Thủ Dầu Một', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(132, 11, '\r\nHuyện Bàu Bàng', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(133, 12, 'Huyện Phú Riềng', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(134, 12, '\r\nHuyện Bù Đăng', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(135, 12, '\r\nThị xã Đồng Xoài', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(136, 12, '\r\nHuyện Đồng Phú', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(137, 12, '\r\nThị xã Bình Long', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(138, 12, '\r\nHuyện Lộc Ninh', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(139, 12, '\r\nThị xã Phước Long', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(140, 12, '\r\nHuyện Chơn Thành', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(141, 12, '\r\nHuyện Bù Đốp', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(142, 12, '\r\nHuyện Bù Gia Mập', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(143, 12, '\r\nHuyện Hớn Quản', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(144, 13, 'Huyện Bắc Bình', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(145, 13, '\r\nThị xã La Gi', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(146, 13, '\r\nHuyện Hàm Thuận Nam', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(147, 13, '\r\nHuyện Hàm Tân', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(148, 13, '\r\nHuyện Phú Quí', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(149, 13, '\r\nHuyện Tuy Phong', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(150, 13, '\r\nHuyện Đức Linh', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(151, 13, '\r\nHuyện Tánh Linh', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(152, 13, '\r\nHuyện Hàm Thuận Bắc', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(153, 13, '\r\nThành phố Phan Thiết', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(154, 14, 'Huyện Tây Sơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(155, 14, '\r\nHuyện Hoài Ân', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(156, 14, '\r\nHuyện Vân Canh', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(157, 14, '\r\nHuyện Hoài Nhơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(158, 14, '\r\nHuyện Tuy Phước', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(159, 14, '\r\nThị xã An Nhơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(160, 14, '\r\nHuyện Phù Mỹ', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(161, 14, '\r\nThành phố Qui Nhơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(162, 14, '\r\nHuyện Phù Cát', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(163, 14, '\r\nHuyện An Lão', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(164, 14, '\r\nHuyện Vĩnh Thạnh', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(165, 15, 'Huyện Đầm Dơi', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(166, 15, '\r\nHuyện Cái Nước', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(167, 15, '\r\nHuyện U Minh', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(168, 15, '\r\nHuyện Thới Bình', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(169, 15, '\r\nHuyện Ngọc Hiển', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(170, 15, '\r\nThành phố Cà Mau', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(171, 15, '\r\nHuyện Trần Văn Thời', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(172, 15, '\r\nHuyện Năm Căn', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(173, 15, '\r\nHuyện Phú Tân', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(174, 16, 'Huyện Cờ Đỏ', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(175, 16, '\r\nHuyện Phong Điền', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(176, 16, '\r\nQuận Ô Môn', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(177, 16, '\r\nQuận Cái Răng', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(178, 16, '\r\nQuận Bình Thuỷ', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(179, 16, '\r\nQuận Ninh Kiều', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(180, 16, '\r\nQuận Thốt Nốt', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(181, 16, '\r\nHuyện Vĩnh Thạnh', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(182, 16, '\r\nHuyện Thới Lai', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(183, 17, 'Huyện Hạ Lang', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(184, 17, '\r\nHuyện Phục Hoà', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(185, 17, '\r\nHuyện Trùng Khánh', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(186, 17, '\r\nHuyện Trà Lĩnh', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(187, 17, '\r\nHuyện Bảo Lâm', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(188, 17, '\r\nHuyện Bảo Lạc', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(189, 17, '\r\nHuyện Hà Quảng', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(190, 17, '\r\nHuyện Quảng Uyên', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(191, 17, '\r\nHuyện Thông Nông', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(192, 17, '\r\nHuyện Thạch An', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(193, 17, '\r\nHuyện Nguyên Bình', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(194, 17, '\r\nHuyện Hoà An', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(195, 17, '\r\nThành phố Cao Bằng', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(196, 18, 'Thị xã Ayun Pa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(197, 18, '\r\nThị xã An Khê', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(198, 18, '\r\nHuyện Phú Thiện', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(199, 18, '\r\nHuyện Đăk Pơ', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(200, 18, '\r\nHuyện Ia Pa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(201, 18, '\r\nHuyện Mang Yang', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(202, 18, '\r\nHuyện Kông Chro', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(203, 18, '\r\nHuyện Krông Pa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(204, 18, '\r\nHuyện KBang', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(205, 18, '\r\nHuyện Chư Prông', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(206, 18, '\r\nHuyện Đức Cơ', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(207, 18, '\r\nHuyện Chư Sê', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(208, 18, '\r\nHuyện Đăk Đoa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(209, 18, '\r\nHuyện Ia Grai', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(210, 18, '\r\nHuyện Chư Păh', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(211, 18, '\r\nThành phố Pleiku', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(212, 18, '\r\nHuyện Chư Pưh', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(213, 19, 'Huyện Quang Bình', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(214, 19, '\r\nHuyện Vị Xuyên', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(215, 19, '\r\nHuyện Xín Mần', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(216, 19, '\r\nHuyện Yên Minh', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(217, 19, '\r\nHuyện Quản Bạ', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(218, 19, '\r\nHuyện Bắc Mê', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(219, 19, '\r\nHuyện Đồng Văn', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(220, 19, '\r\nHuyện Hoàng Su Phì', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(221, 19, '\r\nHuyện Bắc Quang', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(222, 19, '\r\nHuyện Mèo Vạc', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(223, 19, '\r\nThành phố Hà Giang', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(224, 20, 'Thành phố Phủ Lý', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(225, 20, '\r\nHuyện Bình Lục', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(226, 20, '\r\nHuyện Duy Tiên', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(227, 20, '\r\nHuyện Kim Bảng', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(228, 20, '\r\nHuyện Lý Nhân', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(229, 20, '\r\nHuyện Thanh Liêm', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(230, 21, 'Thị xã Kỳ Anh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(231, 21, '\r\nHuyện Cẩm Xuyên', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(232, 21, '\r\nHuyện Vũ Quang', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(233, 21, '\r\nThành phố Hà Tĩnh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(234, 21, '\r\nThị xã Hồng Lĩnh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(235, 21, '\r\nHuyện Kỳ Anh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(236, 21, '\r\nHuyện Can Lộc', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(237, 21, '\r\nHuyện Hương Sơn', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(238, 21, '\r\nHuyện Nghi Xuân', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(239, 21, '\r\nHuyện Hương Khê', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(240, 21, '\r\nHuyện Đức Thọ', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(241, 21, '\r\nHuyện Thạch Hà', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(242, 21, '\r\nHuyện Lộc Hà', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(243, 22, 'Huyện Nam Sách', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(244, 22, '\r\nThành phố Hải Dương', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(245, 22, '\r\nHuyện Ninh Giang', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(246, 22, '\r\nHuyện Bình Giang', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(247, 22, '\r\nHuyện Tứ Kỳ', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(248, 22, '\r\nHuyện Kim Thành', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(249, 22, '\r\nThị xã Chí Linh', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(250, 22, '\r\nHuyện Thanh Miện', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(251, 22, '\r\nHuyện Cẩm Giàng', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(252, 22, '\r\nHuyện Gia Lộc', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(253, 22, '\r\nHuyện Kinh Môn', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(254, 22, '\r\nHuyện Thanh Hà', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(255, 23, 'Quận Hồng Bàng', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(256, 23, '\r\nQuận Dương Kinh', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(257, 23, '\r\nQuận Đồ Sơn', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(258, 23, '\r\nHuyện Bạch Long Vĩ', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(259, 23, '\r\nHuyện Cát Hải', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(260, 23, '\r\nHuyện Vĩnh Bảo', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(261, 23, '\r\nHuyện Tiên Lãng', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(262, 23, '\r\nHuyện Kiến Thuỵ', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(263, 23, '\r\nHuyện An Lão', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(264, 23, '\r\nQuận Hải An', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(265, 23, '\r\nHuyện Thuỷ Nguyên', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(266, 23, '\r\nQuận Kiến An', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(267, 23, '\r\nQuận Lê Chân', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(268, 23, '\r\nQuận Ngô Quyền', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(269, 23, '\r\nHuyện An Dương', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(270, 24, 'Thị xã Long Mỹ', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(271, 24, '\r\nHuyện Châu Thành A', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(272, 24, '\r\nHuyện Phụng Hiệp', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(273, 24, '\r\nHuyện Vị Thuỷ', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(274, 24, '\r\nHuyện Châu Thành', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(275, 24, '\r\nHuyện Long Mỹ', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(276, 24, '\r\nThị xã Ngã Bảy', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(277, 24, '\r\nThành phố Vị Thanh', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(278, 25, 'Huyện Tân Lạc', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(279, 25, '\r\nHuyện Mai Châu', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(280, 25, '\r\nHuyện Kim Bôi', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(281, 25, '\r\nHuyện Lương Sơn', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(282, 25, '\r\nHuyện Đà Bắc', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(283, 25, '\r\nHuyện Lạc Sơn', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(284, 25, '\r\nHuyện Kỳ Sơn', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(285, 25, '\r\nHuyện Yên Thủy', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(286, 25, '\r\nHuyện Lạc Thủy', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(287, 25, '\r\nThành phố Hòa Bình', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(288, 25, '\r\nHuyện Cao Phong', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(289, 26, 'Huyện Khoái Châu', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(290, 26, '\r\nHuyện Văn Giang', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(291, 26, '\r\nHuyện Văn Lâm', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(292, 26, '\r\nHuyện Phù Cừ', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(293, 26, '\r\nHuyện Ân Thi', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(294, 26, '\r\nHuyện Mỹ Hào', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(295, 26, '\r\nHuyện Yên Mỹ', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(296, 26, '\r\nHuyện Tiên Lữ', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(297, 26, '\r\nHuyện Kim Động', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(298, 26, '\r\nThành phố Hưng Yên', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(299, 27, 'Thành phố Cam Ranh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(300, 27, '\r\nHuyện Trường Sa', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(301, 27, '\r\nThị xã Ninh Hòa', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(302, 27, '\r\nHuyện Khánh Sơn', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(303, 27, '\r\nHuyện Khánh Vĩnh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(304, 27, '\r\nHuyện Diên Khánh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(305, 27, '\r\nHuyện Vạn Ninh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(306, 27, '\r\nHuyện Cam Lâm', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(307, 27, '\r\nThành phố Nha Trang', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(308, 28, 'Huyện Vĩnh Thuận', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(309, 28, '\r\nHuyện Kiên Lương', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(310, 28, '\r\nThành phố Rạch Giá', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(311, 28, '\r\nHuyện Hòn Đất', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(312, 28, '\r\nHuyện Châu Thành', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(313, 28, '\r\nHuyện Gò Quao', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(314, 28, '\r\nThị xã Hà Tiên', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(315, 28, '\r\nHuyện Tân Hiệp', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(316, 28, '\r\nHuyện An Minh', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(317, 28, '\r\nHuyện Kiên Hải', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(318, 28, '\r\nHuyện Giồng Riềng', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(319, 28, '\r\nHuyện Phú Quốc', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(320, 28, '\r\nHuyện An Biên', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(321, 28, '\r\nHuyện U Minh Thượng', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(322, 28, '\r\nHuyện Giang Thành', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(323, 29, 'Huyện Ia H\' Drai', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(324, 29, '\r\nHuyện Đắk Glei', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(325, 29, '\r\nHuyện Ngọc Hồi', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(326, 29, '\r\nHuyện Đắk Tô', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(327, 29, '\r\nHuyện Kon Rẫy', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(328, 29, '\r\nHuyện Kon Plông', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(329, 29, '\r\nHuyện Đắk Hà', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(330, 29, '\r\nHuyện Tu Mơ Rông', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(331, 29, '\r\nHuyện Sa Thầy', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(332, 29, '\r\nThành phố Kon Tum', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(333, 30, 'Huyện Tân Uyên', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(334, 30, '\r\nHuyện Nậm Nhùn', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(335, 30, '\r\nHuyện Sìn Hồ', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(336, 30, '\r\nHuyện Mường Tè', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(337, 30, '\r\nHuyện Tam Đường', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(338, 30, '\r\nThành phố Lai Châu', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(339, 30, '\r\nHuyện Phong Thổ', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(340, 30, '\r\nHuyện Than Uyên', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(341, 31, 'Huyện Đức Trọng', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(342, 31, '\r\nHuyện Đơn Dương', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(343, 31, '\r\nThành phố Bảo Lộc', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(344, 31, '\r\nHuyện Đạ Tẻh', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(345, 31, '\r\nHuyện Bảo Lâm', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(346, 31, '\r\nHuyện Đạ Huoai', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(347, 31, '\r\nHuyện Lạc Dương', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(348, 31, '\r\nHuyện Cát Tiên', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(349, 31, '\r\nHuyện Lâm Hà', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(350, 31, '\r\nHuyện Di Linh', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(351, 31, '\r\nThành phố Đà Lạt', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(352, 31, '\r\nHuyện Đam Rông', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(353, 32, 'Huyện Bình Gia', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(354, 32, '\r\nThành phố Lạng Sơn', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(355, 32, '\r\nHuyện Văn Lãng', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(356, 32, '\r\nHuyện Văn Quan', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(357, 32, '\r\nHuyện Lộc Bình', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(358, 32, '\r\nHuyện Cao Lộc', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(359, 32, '\r\nHuyện Chi Lăng', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(360, 32, '\r\nHuyện Đình Lập', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(361, 32, '\r\nHuyện Bắc Sơn', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(362, 32, '\r\nHuyện Tràng Định', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(363, 32, '\r\nHuyện Hữu Lũng', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(364, 33, 'Thành phố Lào Cai', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(365, 33, '\r\nHuyện Bát Xát', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(366, 33, '\r\nHuyện Văn Bàn', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(367, 33, '\r\nHuyện Bảo Thắng', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(368, 33, '\r\nHuyện Si Ma Cai', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(369, 33, '\r\nHuyện Mường Khương', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(370, 33, '\r\nHuyện Sa Pa', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(371, 33, '\r\nHuyện Bảo Yên', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(372, 33, '\r\nHuyện Bắc Hà', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(373, 34, 'Huyện Tân Thạnh', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(374, 34, '\r\nHuyện Tân Trụ', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(375, 34, '\r\nHuyện Mộc Hóa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(376, 34, '\r\nHuyện Đức Hòa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(377, 34, '\r\nHuyện Vĩnh Hưng', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(378, 34, '\r\nHuyện Cần Đước', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(379, 34, '\r\nHuyện Đức Huệ', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(380, 34, '\r\nHuyện Bến Lức', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(381, 34, '\r\nHuyện Thạnh Hóa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(382, 34, '\r\nHuyện Cần Giuộc', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(383, 34, '\r\nHuyện Thủ Thừa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(384, 34, '\r\nHuyện Châu Thành', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(385, 34, '\r\nHuyện Tân Hưng', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(386, 34, '\r\nThành phố Tân An', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(387, 34, '\r\nThị xã Kiến Tường', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(388, 35, 'Thành phố Nam Định', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(389, 35, '\r\nHuyện Nghĩa Hưng', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(390, 35, '\r\nHuyện Trực Ninh', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(391, 35, '\r\nHuyện Ý Yên', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(392, 35, '\r\nHuyện Vụ Bản', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(393, 35, '\r\nHuyện Giao Thủy', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(394, 35, '\r\nHuyện Xuân Trường', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(395, 35, '\r\nHuyện Nam Trực', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(396, 35, '\r\nHuyện Mỹ Lộc', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(397, 35, '\r\nHuyện Hải Hậu', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(398, 36, 'Thị xã Hoàng Mai', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(399, 36, '\r\nHuyện Quỳ Châu', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(400, 36, '\r\nHuyện Diễn Châu', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(401, 36, '\r\nHuyện Anh Sơn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(402, 36, '\r\nHuyện Hưng Nguyên', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(403, 36, '\r\nHuyện Quế Phong', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(404, 36, '\r\nHuyện Tương Dương', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(405, 36, '\r\nHuyện Kỳ Sơn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(406, 36, '\r\nThị xã Cửa Lò', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(407, 36, '\r\nThị xã Thái Hoà', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(408, 36, '\r\nHuyện Nam Đàn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(409, 36, '\r\nHuyện Quỳnh Lưu', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(410, 36, '\r\nHuyện Quỳ Hợp', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(411, 36, '\r\nHuyện Yên Thành', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(412, 36, '\r\nHuyện Đô Lương', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(413, 36, '\r\nHuyện Nghĩa Đàn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(414, 36, '\r\nHuyện Con Cuông', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(415, 36, '\r\nHuyện Tân Kỳ', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(416, 36, '\r\nHuyện Nghi Lộc', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(417, 36, '\r\nHuyện Thanh Chương', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(418, 36, '\r\nThành phố Vinh', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(419, 37, 'Huyện Nho Quan', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(420, 37, '\r\nHuyện Hoa Lư', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(421, 37, '\r\nHuyện Gia Viễn', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(422, 37, '\r\nHuyện Kim Sơn', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(423, 37, '\r\nHuyện Yên Khánh', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(424, 37, '\r\nThành phố Tam Điệp', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(425, 37, '\r\nThành phố Ninh Bình', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(426, 37, '\r\nHuyện Yên Mô', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(427, 38, 'Huyện Bác Ái', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(428, 38, '\r\nHuyện Ninh Hải', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(429, 38, '\r\nHuyện Ninh Phước', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(430, 38, '\r\nHuyện Ninh Sơn', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(431, 38, '\r\nHuyện Thuận Bắc', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(432, 38, '\r\nHuyện Thuận Nam', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(433, 38, '\r\nThành phố Phan Rang-Tháp Chàm', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(434, 39, 'Huyện Lâm Thao', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(435, 39, '\r\nThị xã Phú Thọ', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(436, 39, '\r\nThành phố Việt Trì', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(437, 39, '\r\nHuyện Thanh Thuỷ', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(438, 39, '\r\nHuyện Đoan Hùng', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(439, 39, '\r\nHuyện Cẩm Khê', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(440, 39, '\r\nHuyện Phù Ninh', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(441, 39, '\r\nHuyện Tam Nông', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(442, 39, '\r\nHuyện Thanh Ba', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(443, 39, '\r\nHuyện Yên Lập', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(444, 39, '\r\nHuyện Thanh Sơn', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(445, 39, '\r\nHuyện Hạ Hoà', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(446, 39, '\r\nHuyện Tân Sơn', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(447, 40, 'Huyện Sông Hinh', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(448, 40, '\r\nHuyện Tây Hoà', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(449, 40, '\r\nHuyện Tuy An', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(450, 40, '\r\nThị xã Sông Cầu', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(451, 40, '\r\nHuyện Đồng Xuân', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(452, 40, '\r\nHuyện Sơn Hòa', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(453, 40, '\r\nThành phố Tuy Hoà', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(454, 40, '\r\nHuyện Phú Hoà', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(455, 40, '\r\nHuyện Đông Hòa', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(456, 41, 'Huyện Bố Trạch', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(457, 41, '\r\nHuyện Tuyên Hóa', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(458, 41, '\r\nHuyện Lệ Thủy', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(459, 41, '\r\nHuyện Quảng Ninh', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(460, 41, '\r\nHuyện Quảng Trạch', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(461, 41, '\r\nThành Phố Đồng Hới', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(462, 41, '\r\nHuyện Minh Hóa', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(463, 41, '\r\nThị xã Ba Đồn', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(464, 42, 'Huyện Hiệp Đức', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(465, 42, '\r\nHuyện Đông Giang', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(466, 42, '\r\nHuyện Tây Giang', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(467, 42, '\r\nHuyện Bắc Trà My', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(468, 42, '\r\nThành phố Hội An', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(469, 42, '\r\nThành phố Tam Kỳ', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(470, 42, '\r\nHuyện Đại Lộc', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(471, 42, '\r\nThị xã Điện Bàn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(472, 42, '\r\nHuyện Tiên Phước', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(473, 42, '\r\nHuyện Nam Trà My', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(474, 42, '\r\nHuyện Quế Sơn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(475, 42, '\r\nHuyện Núi Thành', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(476, 42, '\r\nHuyện Thăng Bình', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(477, 42, '\r\nHuyện Phước Sơn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(478, 42, '\r\nHuyện Duy Xuyên', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(479, 42, '\r\nHuyện Nam Giang', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(480, 42, '\r\nHuyện Phú Ninh', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(481, 42, '\r\nHuyện Nông Sơn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(482, 43, 'Huyện Minh Long', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(483, 43, '\r\nHuyện Tây Trà', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(484, 43, '\r\nHuyện Trà Bồng', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(485, 43, '\r\nHuyện Bình Sơn', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(486, 43, '\r\nHuyện Đức Phổ', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(487, 43, '\r\nHuyện Lý Sơn', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(488, 43, '\r\nHuyện Ba Tơ', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(489, 43, '\r\nHuyện Mộ Đức', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(490, 43, '\r\nHuyện Nghĩa Hành', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(491, 43, '\r\nHuyện Tư Nghĩa', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(492, 43, '\r\nHuyện Sơn Tịnh', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(493, 43, '\r\nHuyện Sơn Tây', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(494, 43, '\r\nThành phố Quảng Ngãi', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(495, 43, '\r\nHuyện Sơn Hà', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(496, 44, 'Thị xã Đông Triều', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(497, 44, '\r\nHuyện Hải Hà', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(498, 44, '\r\nThành phố Hạ Long', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(499, 44, '\r\nThành phố Cẩm Phả', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(500, 44, '\r\nThành phố Móng Cái', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(501, 44, '\r\nThành phố Uông Bí', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(502, 44, '\r\nHuyện Vân Đồn', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(503, 44, '\r\nHuyện Tiên Yên', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(504, 44, '\r\nHuyện Ba Chẽ', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(505, 44, '\r\nHuyện Hoành Bồ', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(506, 44, '\r\nHuyện Bình Liêu', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(507, 44, '\r\nHuyện Cô Tô', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(508, 44, '\r\nHuyện Đầm Hà', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(509, 44, '\r\nThị xã Quảng Yên', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(510, 45, 'Huyện Cồn Cỏ', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(511, 45, '\r\nThị xã Quảng Trị', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(512, 45, '\r\nHuyện Đa Krông', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(513, 45, '\r\nHuyện Vĩnh Linh', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(514, 45, '\r\nHuyện Triệu Phong', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(515, 45, '\r\nHuyện Gio Linh', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(516, 45, '\r\nHuyện Cam Lộ', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(517, 45, '\r\nHuyện Hải Lăng', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(518, 45, '\r\nHuyện Hướng Hóa', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(519, 45, '\r\nThành phố Đông Hà', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(520, 46, 'Huyện Thạnh Trị', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(521, 46, '\r\nHuyện Mỹ Xuyên', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(522, 46, '\r\nHuyện Long Phú', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(523, 46, '\r\nThị xã Vĩnh Châu', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(524, 46, '\r\nHuyện Mỹ Tú', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(525, 46, '\r\nHuyện Kế Sách', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(526, 46, '\r\nHuyện Cù Lao Dung', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(527, 46, '\r\nThị xã Ngã Năm', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(528, 46, '\r\nThành phố Sóc Trăng', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(529, 46, '\r\nHuyện Châu Thành', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(530, 46, '\r\nHuyện Trần Đề', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(531, 47, 'Huyện Sốp Cộp', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(532, 47, '\r\nHuyện Mai Sơn', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(533, 47, '\r\nHuyện Mường La', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(534, 47, '\r\nHuyện Sông Mã', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(535, 47, '\r\nHuyện Mộc Châu', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(536, 47, '\r\nHuyện Vân Hồ', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(537, 47, '\r\nHuyện Quỳnh Nhai', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(538, 47, '\r\nHuyện Phù Yên', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(539, 47, '\r\nHuyện Thuận Châu', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(540, 47, '\r\nHuyện Yên Châu', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(541, 47, '\r\nHuyện Bắc Yên', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(542, 47, '\r\nThành phố Sơn La', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(543, 48, 'Huyện Dương Minh Châu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(544, 48, '\r\nHuyện Bến Cầu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(545, 48, '\r\nHuyện Châu Thành', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(546, 48, '\r\nHuyện Gò Dầu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(547, 48, '\r\nHuyện Hòa Thành', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(548, 48, '\r\nHuyện Tân Châu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(549, 48, '\r\nHuyện Trảng Bàng', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(550, 48, '\r\nHuyện Tân Biên', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(551, 48, '\r\nThành phố Tây Ninh', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(552, 49, 'Huyện Quỳnh Phụ', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(553, 49, '\r\nHuyện Vũ Thư', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(554, 49, '\r\nHuyện Hưng Hà', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(555, 49, '\r\nHuyện Kiến Xương', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(556, 49, '\r\nHuyện Tiền Hải', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(557, 49, '\r\nHuyện Thái Thụy', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(558, 49, '\r\nHuyện Đông Hưng', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(559, 49, '\r\nThành phố Thái Bình', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(560, 50, 'Thành phố Sông Công', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(561, 50, '\r\nHuyện Phú Lương', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(562, 50, '\r\nHuyện Định Hóa', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(563, 50, '\r\nHuyện Phú Bình', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(564, 50, '\r\nHuyện Võ Nhai', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(565, 50, '\r\nThị xã Phổ Yên', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(566, 50, '\r\nHuyện Đồng Hỷ', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(567, 50, '\r\nHuyện Đại Từ', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(568, 50, '\r\nThành phố Thái Nguyên', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(569, 51, 'Huyện Đông Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(570, 51, '\r\nHuyện Thường Xuân', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(571, 51, '\r\nHuyện Nông Cống', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(572, 51, '\r\nHuyện Hà Trung', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(573, 51, '\r\nHuyện Bá Thước', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(574, 51, '\r\nHuyện Hoằng Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(575, 51, '\r\nHuyện Quảng Xương', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(576, 51, '\r\nHuyện Thiệu Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(577, 51, '\r\nHuyện Như Thanh', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(578, 51, '\r\nThành phố Thanh Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(579, 51, '\r\nThị xã Sầm Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(580, 51, '\r\nThị xã Bỉm Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(581, 51, '\r\nHuyện Nga Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(582, 51, '\r\nHuyện Mường Lát', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(583, 51, '\r\nHuyện Tĩnh Gia', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(584, 51, '\r\nHuyện Thạch Thành', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(585, 51, '\r\nHuyện Thọ Xuân', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(586, 51, '\r\nHuyện Hậu Lộc', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(587, 51, '\r\nHuyện Cẩm Thủy', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(588, 51, '\r\nHuyện Vĩnh Lộc', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(589, 51, '\r\nHuyện Quan Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(590, 51, '\r\nHuyện Triệu Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(591, 51, '\r\nHuyện Ngọc Lặc', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(592, 51, '\r\nHuyện Như Xuân', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(593, 51, '\r\nHuyện Quan Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(594, 51, '\r\nHuyện Yên Định', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(595, 51, '\r\nHuyện Lang Chánh', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(596, 52, 'Huyện Phú Vang', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(597, 52, '\r\nHuyện A Lưới', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(598, 52, '\r\nHuyện Nam Đông', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(599, 52, '\r\nThị xã Hương Trà', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(600, 52, '\r\nHuyện Phong Điền', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(601, 52, '\r\nThị xã Hương Thủy', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(602, 52, '\r\nHuyện Quảng Điền', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(603, 52, '\r\nHuyện Phú Lộc', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(604, 52, '\r\nThành phố Huế', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(605, 53, 'Thị xã Cai Lậy', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(606, 53, '\r\nHuyện Châu Thành', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(607, 53, '\r\nHuyện Tân Phú Đông', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(608, 53, '\r\nThị xã Gò Công', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(609, 53, '\r\nHuyện Tân Phước', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(610, 53, '\r\nHuyện Gò Công Tây', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(611, 53, '\r\nHuyện Cai Lậy', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(612, 53, '\r\nHuyện Gò Công Đông', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(613, 53, '\r\nHuyện Chợ Gạo', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(614, 53, '\r\nHuyện Cái Bè', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(615, 53, '\r\nThành phố Mỹ Tho', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(616, 54, 'Thị xã Duyên Hải', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(617, 54, '\r\nHuyện Châu Thành', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(618, 54, '\r\nHuyện Cầu Kè', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(619, 54, '\r\nHuyện Càng Long', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(620, 54, '\r\nHuyện Cầu Ngang', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(621, 54, '\r\nHuyện Duyên Hải', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(622, 54, '\r\nHuyện Tiểu Cần', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(623, 54, '\r\nHuyện Trà Cú', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(624, 54, '\r\nThành phố Trà Vinh', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(625, 55, 'Huyện Chiêm Hóa', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(626, 55, '\r\nHuyện Sơn Dương', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(627, 55, '\r\nHuyện Yên Sơn', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(628, 55, '\r\nHuyện Hàm Yên', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(629, 55, '\r\nHuyện Nà Hang', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(630, 55, '\r\nThành phố Tuyên Quang', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(631, 55, '\r\nHuyện Lâm Bình', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(632, 56, 'Huyện Mang Thít', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(633, 56, '\r\nHuyện Vũng Liêm', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(634, 56, '\r\nThị xã Bình Minh', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(635, 56, '\r\nHuyện Tam Bình', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(636, 56, '\r\nHuyện Long Hồ', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(637, 56, '\r\nThành phố Vĩnh Long', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(638, 56, '\r\nHuyện Bình Tân', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(639, 56, '\r\nHuyện Trà Ôn', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(640, 57, 'Huyện Bình Xuyên', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(641, 57, '\r\nHuyện Vĩnh Tường', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(642, 57, '\r\nHuyện Lập Thạch', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(643, 57, '\r\nHuyện Yên Lạc', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(644, 57, '\r\nThành phố Vĩnh Yên', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(645, 57, '\r\nHuyện Tam Đảo', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(646, 57, '\r\nHuyện Tam Dương', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(647, 57, '\r\nThị xã Phúc Yên', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(648, 57, '\r\nHuyện Sông Lô', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(649, 58, 'Huyện Trấn Yên', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(650, 58, '\r\nHuyện Văn Chấn', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(651, 58, '\r\nHuyện Lục Yên', '2019-12-20 12:33:36', '2019-12-20 12:33:36');
INSERT INTO `la_city` (`id`, `region_id`, `title`, `updated_at`, `created_at`) VALUES
(652, 58, '\r\nHuyện Văn Yên', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(653, 58, '\r\nHuyện Mù Căng Chải', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(654, 58, '\r\nHuyện Trạm Tấu', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(655, 58, '\r\nHuyện Yên Bình', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(656, 58, '\r\nThành phố Yên Bái', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(657, 58, '\r\nThị xã Nghĩa Lộ', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(658, 59, 'Huyện Krông A Na', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(659, 59, '\r\nThành phố Buôn Ma Thuột', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(660, 59, '\r\nHuyện Cư Kuin', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(661, 59, '\r\nHuyện Cư M\'gar', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(662, 59, '\r\nHuyện Ea Súp', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(663, 59, '\r\nHuyện Krông Năng', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(664, 59, '\r\nHuyện Ea H\'leo', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(665, 59, '\r\nHuyện Krông Búk', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(666, 59, '\r\nHuyện Buôn Đôn', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(667, 59, '\r\nHuyện Lắk', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(668, 59, '\r\nHuyện Krông Pắc', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(669, 59, '\r\nHuyện Krông Bông', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(670, 59, '\r\nHuyện Ea Kar', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(671, 59, '\r\nHuyện M\'Đrắk', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(672, 59, '\r\nThị Xã Buôn Hồ', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(673, 60, 'Huyện Đắk Mil', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(674, 60, '\r\nHuyện Cư Jút', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(675, 60, '\r\nHuyện Đăk Glong', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(676, 60, '\r\nHuyện Đắk R\'Lấp', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(677, 60, '\r\nHuyện Krông Nô', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(678, 60, '\r\nHuyện Đắk Song', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(679, 60, '\r\nHuyện Tuy Đức', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(680, 60, '\r\nThị xã Gia Nghĩa', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(681, 61, 'Huyện Nậm Pồ', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(682, 61, '\r\nThành phố Điện Biên Phủ', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(683, 61, '\r\nThị Xã Mường Lay', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(684, 61, '\r\nHuyện Tủa Chùa', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(685, 61, '\r\nHuyện Tuần Giáo', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(686, 61, '\r\nHuyện Điện Biên Đông', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(687, 61, '\r\nHuyện Mường Nhé', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(688, 61, '\r\nHuyện Điện Biên', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(689, 61, '\r\nHuyện Mường Ảng', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(690, 61, '\r\nHuyện Mường Chà', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(691, 62, 'Huyện Định Quán', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(692, 62, '\r\nHuyện Long Thành', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(693, 62, '\r\nHuyện Cẩm Mỹ', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(694, 62, '\r\nThành phố Biên Hòa', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(695, 62, '\r\nHuyện Thống Nhất', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(696, 62, '\r\nHuyện Nhơn Trạch', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(697, 62, '\r\nHuyện Vĩnh Cửu', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(698, 62, '\r\nHuyện Xuân Lộc', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(699, 62, '\r\nHuyện Trảng Bom', '2019-12-20 13:41:45', '2019-12-20 13:41:45'),
(700, 62, '\r\nHuyện Tân Phú', '2019-12-20 13:41:45', '2019-12-20 13:41:45'),
(701, 62, '\r\nThị xã Long Khánh', '2019-12-20 13:41:45', '2019-12-20 13:41:45'),
(702, 63, 'Huyện Tân Hồng', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(703, 63, '\r\nThành phố Sa Đéc', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(704, 63, '\r\nHuyện Lai Vung', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(705, 63, '\r\nHuyện Châu Thành', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(706, 63, '\r\nHuyện Lấp Vò', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(707, 63, '\r\nHuyện Cao Lãnh', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(708, 63, '\r\nHuyện Tháp Mười', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(709, 63, '\r\nHuyện Thanh Bình', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(710, 63, '\r\nHuyện Tam Nông', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(711, 63, '\r\nThị xã Hồng Ngự', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(712, 63, '\r\nThành phố Cao Lãnh', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(713, 63, '\r\nHuyện Hồng Ngự', '2019-12-20 13:42:43', '2019-12-20 13:42:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_config`
--

CREATE TABLE `la_config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `la_config`
--

INSERT INTO `la_config` (`id`, `name`, `value`, `updated_at`) VALUES
(2, 'EMAIL', NULL, '2022-01-22 14:25:04'),
(3, 'TITLE', 'Dịch vụ thiết kế website - ngoluan.com', '2019-12-07 22:33:20'),
(4, 'META_KEYWORD', 'dịch vụ,thiết kế website,thiết kế', '2019-12-07 22:33:20'),
(5, 'META_DESCRIPTION', 'Dịch vụ thiết kế website', '2019-12-07 22:33:20'),
(6, 'LINK_YOUTUBE', 'https://www.youtube.com', '2019-09-10 14:01:21'),
(7, 'LINK_FACEBOOK', 'https://www.facebook.com/profile.php?id=100015068807055', '2019-09-10 14:01:21'),
(8, 'LINK_INSTAGRAM', 'https://www.instagram.com', '2019-09-10 14:01:21'),
(9, 'LINK_LINKEDIN', 'https://www.linkedin.com', '2019-09-10 14:01:21'),
(10, 'LINK_TWITTER', 'https://twitter.com', '2019-09-10 14:01:21'),
(11, 'LINK_WEBSITE', 'http://ngoluan.com', '2019-12-07 22:33:20'),
(12, 'HEADER_TEXT', NULL, '2019-09-09 23:51:54'),
(13, 'FOOTER_TEXT', NULL, '2019-09-09 23:51:54'),
(14, 'PHONE', NULL, '2022-01-22 14:25:04'),
(15, 'PHOTO_SHARE', 'game-overpng-1568088577.png', '2019-09-10 11:09:38'),
(16, 'PHOTO_LOGO', 'logosvg-1642836291.svg', '2022-01-22 14:24:51'),
(17, 'PHOTO_FAVICON', 'logosvg-1642836304.svg', '2022-01-22 14:25:04'),
(18, 'PHOTO_LOGO_FOOTER', 'logosvg-1642836291.svg', '2022-01-22 14:24:51'),
(19, 'LINK_SKYPE', '@ngoluan123', '2019-09-10 14:01:21'),
(20, 'HEADER_CODE', NULL, '2019-09-09 23:51:54'),
(21, 'FOOTER_CODE', NULL, '2019-09-09 23:51:54'),
(22, 'THUMB_SIZE_PRODUCT', '{\"width\":200,\"height\":200}', '2020-01-04 17:09:22'),
(23, 'THUMB_SIZE_BLOG', '{\"width\":250,\"height\":200}', '2020-01-04 17:09:22'),
(26, 'THUMB_SIZE_PRODUCT_CATEGORY', '{\"width\":1366,\"height\":200}', '2020-01-04 17:09:22'),
(28, 'THUMB_SIZE_BLOG_CATEGORY', '{\"width\":1366,\"height\":200}', '2020-01-04 17:09:22'),
(30, 'THUMB_SIZE_SERVICE', '{\"width\":250,\"height\":250}', '2020-01-04 17:09:22'),
(31, 'THUMB_SIZE_PROJECT', '{\"width\":259,\"height\":277}', '2020-01-04 17:09:22'),
(32, 'THUMB_SIZE_POST', '{\"width\":400,\"height\":600}', '2020-01-04 17:09:22'),
(33, 'SMTP_HOST', 'smtp.yandex.com', '2020-01-04 17:09:22'),
(34, 'SMTP_PORT', '587', '2020-01-04 17:09:22'),
(35, 'SMTP_EMAIL', 'contact@ngoluan.com', '2020-01-04 17:09:22'),
(36, 'SMTP_PASSWORD', 'generaus', '2020-01-04 17:09:22'),
(37, 'ICO_NAME', 'Womentech Association', '2021-09-29 10:45:20'),
(38, 'ICO_SYMBOL', 'WTA', '2021-09-29 10:45:20'),
(39, 'ICO_DECIMALS', '18', '2021-09-29 10:45:20'),
(40, 'ICO_CONTRACT_ADDRESS', '0x3a56AdF7985CFf160b8CAD4851A0a157D2F91E4d', '2021-09-29 10:45:20'),
(41, 'MAINTAIN_MODE', '0', '2022-01-22 14:25:04'),
(42, 'BGPOINT_API_SECRET_KEY', 'c4ca4238a0b923820dcc509a6f75849b', '2021-12-14 00:58:08'),
(43, 'SHOW_LOGO', '0', '2021-12-14 00:58:08'),
(44, 'BANNER', 'banner-1639280352.png', '2021-12-14 00:58:08'),
(45, 'BANNER_TOP', 'banner-1639280352.png', '2021-12-14 00:58:08'),
(46, 'BANNER_BOTTOM', 'banner_bottom.png?v=1', '2021-12-14 00:58:08'),
(47, 'PRIVACY_CONTENT_EN', '<h1 style=\"text-align: center;\"><span style=\"font-size:20px;\">Terms, Conditions and Notes</span></h1>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Welcome to Ho Chi Minh City Tourism</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Users of this Application shall not incur any charges for the use of this Application under this Agreement. However, this Application contains links to third-party applications operated and owned by independent service providers or retailers. Such third parties may charge a fee to use some of the content or services offered on their application. You should therefore undertake any investigation that you feel is necessary or appropriate prior to entering into any transaction with any third party to determine whether a fee may be charged. or not. Where Ho Chi Minh City Tourism provides detailed information about fees on this Application, such information is provided for convenience and informational purposes only. Ho Chi Minh City Tourism in no way guarantees that this information is accurate nor is it responsible for the content or services provided on such third party applications.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">PROHIBITED ACTIVITIES</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">The Application Content, as well as the infrastructure used to provide such content and information, are proprietary to us. You agree not to modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell or resell any information, software, products or services obtained from or through this Website.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">In addition, you are not allowed to:</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(i) use this Application or its content for any commercial purpose;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(ii) access, monitor or copy any content or information of this Application using any robot, reducer, scanner or other automated means, or any other manual process for any purpose without our express written permission;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(iii) violate the restrictions in any robot exclusion headers on this Application, or bypass or circumvent other measures used to prevent or restrict access to this Application;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(iv) take any action that imposes, or may impose, in our discretion, an unreasonable or disproportionately large load on our infrastructure;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(v) deep link to any part of this Application for any purpose without our express written permission;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(vi) &ldquo;frame&rdquo;, &ldquo;mirror&rdquo; or incorporate any part of this Application into any other application without our prior written permission; or</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(vii) attempt to modify, translate, adapt, edit, decompile, disassemble or reverse engineer any software programs used by HoChiMinh City Tourism in connection with this Application or the services except where permitted under applicable law.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">PRIVACY POLICY</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">HoChiMinh City Tourism believes in protecting your privacy. Any personal information you post on this App will be used in accordance with our privacy policy.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">PLANS, COMMENTS, AND OTHER INTERACTIVE RESULTS</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">We appreciate hearing from you. Please note that by submitting content to this App by email, posts on this App or otherwise, including any questions, pictures or videos, comments, suggestions, ideas or the like contained in any submission (collectively, the &ldquo;Submission&rdquo;), you grant Ho Chi Minh City Tourism and its affiliates a non-exclusive, royalty-free, perpetual , is transferable, irrevocable and wholly sublicensable for (a) use, reproduction, modification, adaptation, translation, distribution, publication, creation of derivative works from and publicly display and perform such Submissions around the world in any media, now known or later invented; and (b) use the name you submit in connection with such Submission. You acknowledge that Ho Chi Minh City Tourism may choose to provide your comments or reviews at our sole discretion. You also grant Ho Chi Minh City Tourism the right to bring before law any person or entity that infringes Your or Ho Chi Minh City Travel&#39;s rights in Submissions as a result of a breach of this Agreement. You acknowledge and agree that Submissions are non-confidential and non-proprietary.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">This application may contain discussion forums, bulletin boards, commenting services or other forums in which you or third parties may post reviews of travel experiences or content, messages, documents or other items on this Application (&ldquo;Interactive Area&rdquo;). If HoChiMinh City Tourism provides such Interactive Areas, you are solely responsible for the use of such Interactive Areas and use at your own risk. By using any Interactive Areas, you expressly agree not to post, upload, transmit, distribute, store, create, or publish through this Application any of the following:</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Any message, data, information, text, music, sound, photos, graphics, code or any other material (&quot;Content&quot;) that is false, illegal, misleading, defamatory, libelous, defamatory, obscene, obscene, indecent, lewd, sexually suggestive, harassing, or advocating harassment, threat, invasion of privacy or right of publicity, abuse, incitement , deceptive or objectionable;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content that offends the online community on a regular basis, such as content that promotes racism, bigotry, hatred, or physical harm of any kind against any group or individual ;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content that constitutes, promotes, promotes or provides instructions to carry out an illegal activity, commits a criminal offence, leads to civil liability, violates the rights of any party in any country anywhere in the world or otherwise create liability or violate any local, state, national or international law, including but not limited to Securities and Exchange Commission regulations Singapore (SEC) or any rules of any stock exchange;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content that provides information about illegal activities such as making or buying illegal weapons, violating someone&#39;s privacy, or providing or creating computer viruses;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">The Content may infringe any patent, trademark, trade secret, copyright or other proprietary or intellectual rights of any party. Specifically, content that promotes illegal or unauthorized copies of someone else&#39;s copyrighted work, such as providing pirated computer programs or linking to them, provides information to circumvent break pre-installed copy protection devices or provide pirated music or links to pirated music files;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content that impersonates any person or entity or otherwise misrepresents your affiliation with an individual or entity, including Ho Chi Minh City Tourism;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Unsolicited promotions, mass mailing or &quot;spamming&quot;, transmission of &quot;spam&quot;, &quot;chain letters&quot;, political campaigns, advertising, contests, lotteries or instigation;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content containing commercial and/or sales activities without our prior written consent, such as contests, sweepstakes, barter, advertising and pyramid schemes tower;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Personal information of any third party, including but not limited to, last name (family name), phone number, email address, national identification number and credit card number.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Contains pages with restricted or password-only access, or hidden pages or images (those that are not linked to or from another accessible page);</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Viruses, corrupted data or other harmful, disruptive or destructive files;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content unrelated to the subject matter of the Interactive Area(s) in which such Content is posted; or</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Content or a link to content, in HoChiMinh City Tourism&#39;s sole discretion, (a) violates previous subsections of this document, (b) is objectionable, (c) restricts or prevents any any other person using or enjoying the Interactive Areas or this Application, or (d) may subject Ho Chi Minh City Tourism or its affiliates or its users to any loss or damage. harm or liability of any kind.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ho Chi Minh City Tourism is not responsible and has no liability for any Content posted, stored or uploaded by you or any third party, or for any loss or damage. or damages, Ho Chi Minh City Tourism is not responsible for any false, defamatory, slanderous, libelous, omission, falsehood, obscenity, pornographic or vulgar content you may encounter. As a provider of interactive services, Ho Chi Minh City Tourism is not responsible for any statements, representations or Content provided by its users on any public forum. plus, personal home page or any other Interactive Area. Although Ho Chi Minh City Tourism has no obligation to screen, edit, or monitor any Content posted to or distributed through any Interactive Area, Ho Chi Minh City Tourism may right, and in its sole and absolute discretion, to remove, screen or edit without notice any Content posted or hosted on this Application at any time and for any reason, and You are solely responsible for making backup copies and replacing any Content you post or store on this Application at your sole expense and expense.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">If it is determined that you hold moral rights (including attribution or integrity rights) in the Content or Submissions, you represent that (a) you have not requested the use of any personally identifiable information. any person in connection with the Content or Submissions, or any derivative works thereof, or enhancements or updates thereto; (b) you have no objection to the publication, use, modification, deletion and exploitation of the Content or Entries by HoChiMinh City Tourism or its licensees, successors and assigns; (c) you hereby waive and agree not to claim or assert any interest in any and all moral rights of the author in any Content or Submission; and (d) you permanently release HoChiMinh City Tourism, and its licensors, successors and assigns, from any claim you may assert against HoChiMinh City Tourism by any human rights. such a body.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Any use of the Interactive Areas or other parts of this Application in violation of the foregoing violates this Agreement and may result in your termination or suspension of your use of the Interactive Areas. and/or this Application. To cooperate with legitimate government requests, subpoenas or court orders, to protect Ho Chi Minh City Tourism systems and customers, or to ensure the integrity and operation system and business of Ho Chi Minh City Tourism, Ho Chi Minh City Tourism may access and disclose any information it deems necessary or appropriate, including but not limited to , user profile information (i.e. name, email address, etc.), IP address and traffic information, usage history and Posted Content. Ho Chi Minh City Tourism&#39;s right to disclose any such information shall take precedence over any provision of the Ho Chi Minh City Tourism Privacy Policy.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">TOURIST DESTINATION</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Although most travel, including travel to international destinations, is completed without incident, traveling to certain destinations may present greater risks than others. . HoChiMinh City Tourism urges passengers to investigate and review travel bans, warnings, notices and advice issued by the Government of the United Kingdom, the European Union (EU) and the governments of destination countries prior to booking travel to international destinations.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">BY INSTALLING INFORMATION RELATED TO GOING TO SPECIFIC INTERNATIONAL DESTINATIONS, WE DO NOT STAY OR WARRANT THAT GOING TO SUCH DESTINATIONS IS RISK AND NO RISK DAMAGE OR LOSS MAY AGAIN FROM ACCESS TO THESE DESTINATIONS.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">DISCLAIMER US DISCLAIMER</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">INFORMATION, SOFTWARE, PRODUCTS AND SERVICES PUBLISHED ON THIS APPLICATION MAY INCLUDE INCLUDES OR ERRORS. WE DO NOT GUARANTEE THE ACCURACY AND DISCLAIMER OF LEGAL LIABILITY FOR ANY OTHER ERROR OR INACCURACY RELATED TO THE INFORMATION AND DESCRIPTION OF HOTELS, AIRLINES, VEHICLES, VEHICLES AND PRODUCTS WHAT OTHER SHOULD BE DISPLAYED ON THIS APPLICATION (INCLUDING, NOT LIMITED, PHOTOGRAPHY, LIST OF HOTEL Utilities, GENERAL PRODUCT DESCRIPTION, ETC).</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">WE DO NOT DECLARATE ANYTHING OF ANY KIND OF THE APPLICATION OF THE CONTACT INFORMATION, SOFTWARE, PRODUCTS AND SERVICES ON THIS APP OR ANY PORTAL FOR ANY PURPOSE AND CONTACT US ANY PRODUCTS OR SERVICES ON THIS APPLICATION DO NOT HAVE ANY OR COMMENTS ABOUT OUR PRODUCTS OR SERVICES. ALL INFORMATION, SOFTWARE, PRODUCTS AND SERVICES ARE PROVIDED &ldquo;AS IS&rdquo; WITHOUT WARRANTY OF ANY KIND. WE DISCLAIMER ALL WARRANTIES AND CONDITIONS THAT THIS APP, IT&#39;S SERVERS OR ANY EMAIL SENDED FROM US IS FREE OF VIRUS OR OTHER HARMFUL COMPONENTS. FOR THE MAXIMUM EXTENSION PERMITTED BY APPLICABLE LAW HERE DISCLAIMER ALL WARRANTIES AND CONDITIONS RELATED TO THIS INFORMATION, SOFTWARE, PRODUCTS AND SERVICES, INCLUDING ALL IMPLICATIONS AND CONDITIONS OF WARRANTIES AND PURPOSE, FITNESS FOR PART.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">WE ALSO DISCLAIMER OF ANY WARRANTIES OR RESPONSIBILITIES AS TO THE ACCURACY OR OWNERSHIP OF THE APPLICATION CONTENTS.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nothing in THIS AGREEMENT WILL EXCEPT OR LIMIT OUR LEGAL LIABILITY FOR (I) DEATH OR PERSONAL DAMAGE BY NEGATIVE; (II) ORIGIN; OR (III) LEGAL LIABILITY OR ANY COMPLETE (IV) ANY OTHER LEGAL LIABILITY NOT EXCLUDED BY APPLICABLE LAW.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">FOLLOWING STARTING, YOU USE THIS APPLICATION AT YOUR OWN RISK AND NO EVENT CAUSES US (OFFICERS, DIRECTORS AND ITS RELATED) TO LEGAL LIABILITY FOR ANYTHING , ANY, SPECIAL, OR Consequential Loss of ANY INCOME, PROFITS, BILLS, DATA, CONTRACTS, USE OF MONEY OR LOST OR DAMAGES FOR ANYWHERE WITH THE BUSINESS RELATED TO ANY TYPE OF ANYTHING EXCEPT, OR ANYWAYS CONNECTED WITH YOUR ACCESSORY, DISPLAY, OR USE OF THIS APP, OR DELAY, NO DELAYS, OR USE THIS APPLICATION (INCLUDING, BUT NOT LIMITED TO, YOUR LINKED COMMENTS APPEARING ON THIS APP; ANY COMPUTER VIRUS, INFORMATION, SOFTWARE, PRODUCTS, APPLICATIONS; PRODUCTS AND SERVICES THROUGH THIS APP; OR OTHER AGAINST OTHER ACCESS, DISPLAY, OR USE OF THIS APP) THAT BASED ON THE NEGATIVE THEORY OF NEGATIVE CAUSE, THIS ISSUES, H SO LIKE THAT.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">THIS TERMS AND CONDITIONS AND STARTING DISCLAIMER OF RESPONSIBILITIES, DO NOT INCLUDE THE LEGAL RIGHTS OF DISCLAIMER THAT CANNOT BE EXCLUDED BY APPLICABLE LAW.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Limits of liability reflect the distribution of risks between the parties. The limitations specified in this section will survive and apply even if any of the limited remedies specified in these terms are found to have failed to achieve its essential purpose. The limitations of liability set forth in these terms are in favor of Ho Chi Minh City Tourism and its affiliates, successors and assigns.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">COMPENSATION</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">You agree to defend and indemnify HoChiMinh City Tourism and its affiliates and any of their officers, directors, employees and agents from and against any claim, cause of action, claim, recovery, loss, damage, fine, penalty or other costs or expenses of any kind or nature including but not limited to legal and accounting fees reasons, given by third parties due to:</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(i) your breach of this Agreement or the documents referred to herein;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(ii) you violate any law or the rights of a third party; or</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(iii) your use of this Application.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">LINK TO THIRD PARTY APPS</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">This application may contain hyperlinks to applications operated by parties other than Ho Chi Minh City Tourism. These links are provided for your reference only. We do not control those applications and are not responsible for their content or the privacy or other practices of such applications. Furthermore, you must take precautions to ensure that any links you choose or software you download (whether from this App or other apps) are free of items such as viruses. , worms, trojan horses, bugs and other items that can destroy Nature. Our inclusion of hyperlinks to such applications does not imply any endorsement of the material on such applications or any association with their operators. In some cases, you may be asked by a third-party application to link your profile on HoChiMinh City Tourism with a profile on another third-party application. Choosing to do so is entirely optional, and the decision to allow this information association may be disabled (with third-party applications) at any time.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">SOFTWARE AVAILABLE ON THIS APPLICATION</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Unless otherwise stated, the materials on this Application are presented only to provide relevant information and to promote the services, applications, partners and other products of Ho Chi Minh City Tourism. Minh in Vietnam, territories, properties and protectorates of Ho Chi Minh City. This application is controlled and operated by HoChiMinh City Tourism from its offices in Vietnam. Ho Chi Minh City Tourism makes no representation that the materials on this Application are appropriate or available for use outside of Vietnam. Those who choose to access this Application from outside Vietnam do so at their own initiative and are responsible for compliance with local laws, if and to the extent local laws are applicable. By using this Application, you represent and warrant that you are not located, under the control of or a citizen or resident of any such country or on any such listing.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">This software is a copyrighted work of Ho Chi Minh City Tourism, or its Ho Chi Minh City Tourism Affiliates, or other third parties as identified. Your use of such Software is governed by the terms of the end user license agreement, if any, accompanying or accompanying the Software (&quot;License Agreement&quot;). You may not install or use any Software accompanying or including the License Agreement unless you agree in advance to the terms of the License Agreement. For any Software made available for download on this Application without a License Agreement, we hereby grant you, the user, a limited, personal, non-transferable license to use the Software to view and use this Application subject to these terms and conditions and for no other purpose.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Please note that all Software, including but not limited to, all HTML, XML, Java code and Active X controls contained on this Application, is owned by HoChiMinh City Tourism, its affiliates and/or third parties and is protected by copyright law and international treaty terms. Any copying or redistribution of the Software is strictly prohibited and may result in severe civil and criminal penalties. Violators will be prosecuted to the fullest extent possible.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">NO LIMITATIONS TO CREATION, COPY OR RECOMMENDATION OF SOFTWARE TO ANY SERVER OR OTHER LOCATION FOR FURTHER REFERENCE OR DISTRIBUTION IS EXPRESSLY PROHIBITED. THE SOFTWARE IS WARRANTY, IF YES, ONLY UNDER THE TERMS OF THE LICENSE AGREEMENT.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">TERMS OF USE ON MOBILE DEVICES</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Portions of HoChiMinh City Tourism&#39;s mobile software may use copyrighted material, the use of which is acknowledged by HoChiMinh City Tourism. In addition, specific terms apply to the use of certain Ho Chi Minh City Tourism mobile applications.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">COPYRIGHT AND TRADEMARK NOTICE</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">All content of this App is: &copy; 2015 Ho Chi Minh City Tourism. Copyright Registered. Ho Chi Minh City Tourism is not responsible for the content on applications operated by parties other than Ho Chi Minh City Tourism. Ho Chi Minh City Tourism, the logo and all other product or service names or slogans displayed on this App are registered trademarks and/or common trademarks of Ho Chi Minh City Tourism Minh and/or its suppliers or licensors, and may not copy, imitate or use, in whole or in part, without the prior written permission of HoChiMinh City Tourism or the owner. current trademark ownership. In addition, the look and feel of this Application, including all page headers, custom graphics, button icons, and text, is a service mark, trademark and/or trade dress of City Tourism. Ho Chi Minh City and may not be copied, imitated or used, in whole or in part, without the prior written permission of HoChiMinh City Tourism. All other trademarks, registered trademarks, product names and company names or logos mentioned in this Application are the property of their respective owners. Reference to any product, service, process or other information, by trade name, trademark, manufacturer, supplier or otherwise does not constitute or imply endorsement, sponsorship or promotion. Recommended by HoChiMinh City Tourism.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Notice and Takedown Policy for Illegal Content.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">HoChiMinh City Tourism operates on a &ldquo;notice and remove&rdquo; basis. If you have any complaints or objections to material or content, or if you believe that material or content posted on this App infringes a copyright you hold, please contact us. me immediately by following our notice and takedown process. Once this process is followed, Ho Chi Minh City Tourism will use reasonable efforts to remove illegal content.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Modifications</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ho Chi Minh City Tourism may change, add or remove the terms and conditions of this Agreement or any part thereof at any time in its sole discretion as it deems necessary. and reasonable for legal, general and technical purposes, or due to changes in the services provided or the nature or layout of this Application. You then expressly agree to be bound by any such modified terms and conditions.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ho Chi Minh City Tourism may change, suspend or discontinue any aspect of the Ho Chi Minh City Travel service at any time, including the availability of any features, facilities or services. any data or content. Ho Chi Minh City Tourism may also impose limitations on certain features and services or restrict your access to all or parts of this Application or any City Travel application. Ho Chi Minh City without notice or liability for technical or security reasons, to prevent unauthorized access, loss, or destruction of data or in our sole discretion that you are in breach of any term of this Agreement or any law or regulation and where it decides to discontinue service.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">YOUR CONTINUED USE OF US NOW, OR AFTER POSTING ANY NOTICE OF ANY CHANGES WILL SIGN UP THAT YOU ACCEPT THE MODIFICATIONS OF IT.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">overview</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">This application is operated by a Singapore legal entity and this Agreement is governed by the laws of Singapore. You hereby agree to the sole jurisdiction and venue of the courts in Singapore and to the fairness and convenience of proceedings in such courts in respect of all disputes arising therefrom. from or in connection with the use of this Application. You agree that all claims you may have against Ho Chi Minh City Tourism arising out of or in connection with this Application must be heard and resolved in a court having jurisdiction over the subject matter. authorized in Singapore. Unauthorized use of this App in any jurisdiction has no effect on all provisions of these terms and conditions, including but not limited to this clause. The foregoing shall not apply to the extent that applicable law in your country of residence requires the application of other law and/or jurisdiction and this cannot be excluded by contract.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">You agree that no joint venture, agency, partnership or employment relationship exists between you and HoChiMinh City Tourism and/or its affiliates as a result of this Agreement or the use of this Application.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Our performance of this Agreement is subject to applicable law and legal process, and nothing in this Agreement limits our right to comply with law enforcement authorities or requests or governmental or other legal requirements relating to your use of this Application or information provided or collected by us for such use. To the extent permitted by applicable law, you agree that you will bring any claim or cause of action arising out of or in connection with your access to or use of this App within two ( 2) years from the date of arising or accumulating such claim or action or such claim or cause of action shall be irrevocably waived.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">If any part of this Agreement is determined to be invalid or unenforceable under applicable law including, but not limited to, the foregoing warranty disclaimers and limitations of liability. , then the invalid or unenforceable provision will be replaced by a valid, enforceable term that best matches the intent of the original provision, and the remaining provisions of this Agreement will continue. continue in force.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">This Agreement (and any other terms and conditions referred to herein) constitutes the entire agreement between you and Ho Chi Minh City Tourism with respect to this App and it supersedes all communications and prior or contemporaneous proposal, whether electronic, oral or written, between you and Ho Chi Minh City Tourism with respect to this Application. The printed version of this Agreement and of any notice given in electronic form shall be admissible in judicial or administrative proceedings based upon or relating to this Agreement to the same extent. and subject to the same conditions as other business documents and records originally created and maintained in the printed form.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">These Terms and Conditions are available in the language of this Application. The specific terms and conditions with which you enter into an agreement will not be stored separately by HoChiMinh City Tourism.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">This application may not always be periodically or regularly updated and is therefore not required to be registered as an editorial product under any relevant laws.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Fictional names of companies, products, people, characters and/or data mentioned on this App are not intended to represent any real person, company, product or event.</span></span></span></p>\r\n\r\n<p><span lang=\"EN-US\" style=\"font-size:13.0pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Any rights not recognized herein are reserved.</span></span></span></p>', '2022-01-22 14:25:04');
INSERT INTO `la_config` (`id`, `name`, `value`, `updated_at`) VALUES
(48, 'PRIVACY_CONTENT_VI', '<h1 style=\"text-align: center;\"><span style=\"font-size:20px;\">Điều khoản, Điều kiện v&agrave; Lưu &yacute;</span></h1>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ch&agrave;o mừng đến với Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Người sử dụng Ứng dụng n&agrave;y sẽ kh&ocirc;ng phải chịu bất kỳ khoản ph&iacute; n&agrave;o cho việc sử dụng Ứng dụng n&agrave;y theo Thỏa thuận n&agrave;y. Tuy nhi&ecirc;n, Ứng dụng n&agrave;y chứa c&aacute;c li&ecirc;n kết đến c&aacute;c ứng dụng của b&ecirc;n thứ ba được điều h&agrave;nh v&agrave; sở hữu bởi c&aacute;c nh&agrave; cung cấp dịch vụ hoặc nh&agrave; b&aacute;n lẻ độc lập. C&aacute;c b&ecirc;n thứ ba đ&oacute; c&oacute; thể t&iacute;nh ph&iacute; sử dụng một số nội dung hoặc dịch vụ được cung cấp tr&ecirc;n ứng dụng của họ. Do đ&oacute;, bạn n&ecirc;n thực hiện bất kỳ cuộc điều tra n&agrave;o m&agrave; bạn cảm thấy l&agrave; cần thiết hoặc ph&ugrave; hợp trước khi tiến h&agrave;nh bất kỳ giao dịch n&agrave;o với bất kỳ b&ecirc;n thứ ba n&agrave;o để x&aacute;c định xem liệu c&oacute; phải chịu một khoản ph&iacute; hay kh&ocirc;ng. Trường hợp Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh cung cấp th&ocirc;ng tin chi tiết về c&aacute;c khoản ph&iacute; tr&ecirc;n Ứng dụng n&agrave;y, th&ocirc;ng tin đ&oacute; chỉ được cung cấp nhằm mục đ&iacute;ch thuận tiện v&agrave; cung cấp th&ocirc;ng tin. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng c&oacute; c&aacute;ch n&agrave;o đảm bảo rằng th&ocirc;ng tin n&agrave;y l&agrave; ch&iacute;nh x&aacute;c cũng như kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung hoặc dịch vụ được cung cấp tr&ecirc;n c&aacute;c ứng dụng của b&ecirc;n thứ ba đ&oacute;.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C&Aacute;C HOẠT ĐỘNG CẤM</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung Ứng dụng, cũng như cơ sở hạ tầng được sử dụng để cung cấp nội dung v&agrave; th&ocirc;ng tin đ&oacute;, l&agrave; độc quyền của ch&uacute;ng t&ocirc;i. Bạn đồng &yacute; kh&ocirc;ng sửa đổi, sao ch&eacute;p, ph&acirc;n phối, truyền tải, hiển thị, biểu diễn, t&aacute;i sản xuất, xuất bản, cấp ph&eacute;p, tạo ra c&aacute;c t&aacute;c phẩm ph&aacute;i sinh từ, chuyển nhượng hoặc b&aacute;n hoặc b&aacute;n lại bất kỳ th&ocirc;ng tin, phần mềm, sản phẩm hoặc dịch vụ n&agrave;o c&oacute; được từ hoặc th&ocirc;ng qua việc n&agrave;y Trang mạng.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ngo&agrave;i ra, bạn kh&ocirc;ng được ph&eacute;p:</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(i) sử dụng Ứng dụng n&agrave;y hoặc nội dung của n&oacute; cho bất kỳ mục đ&iacute;ch thương mại n&agrave;o;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(ii) truy cập, theo d&otilde;i hoặc sao ch&eacute;p bất kỳ nội dung hoặc th&ocirc;ng tin n&agrave;o của Ứng dụng n&agrave;y bằng c&aacute;ch sử dụng bất kỳ r&ocirc;-bốt, tr&igrave;nh thu gọn n&agrave;o, m&aacute;y qu&eacute;t hoặc c&aacute;c phương tiện tự động kh&aacute;c hoặc bất kỳ quy tr&igrave;nh thủ c&ocirc;ng n&agrave;o cho bất kỳ mục đ&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p r&otilde; r&agrave;ng bằng văn bản của ch&uacute;ng t&ocirc;i;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(iii) vi phạm c&aacute;c hạn chế trong bất kỳ ti&ecirc;u đề loại trừ r&ocirc; bốt n&agrave;o tr&ecirc;n Ứng dụng n&agrave;y hoặc bỏ qua hoặc ph&aacute; vỡ c&aacute;c biện ph&aacute;p kh&aacute;c được sử dụng để ngăn chặn hoặc hạn chế quyền truy cập v&agrave;o Ứng dụng n&agrave;y;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(iv) thực hiện bất kỳ h&agrave;nh động n&agrave;o &aacute;p đặt, hoặc c&oacute; thể &aacute;p đặt, theo quyết định của ch&uacute;ng t&ocirc;i, một tải trọng lớn kh&ocirc;ng hợp l&yacute; hoặc kh&ocirc;ng tương xứng đối với cơ sở hạ tầng của ch&uacute;ng t&ocirc;i;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(v) li&ecirc;n kết s&acirc;u đến bất kỳ phần n&agrave;o của Ứng dụng n&agrave;y cho bất kỳ mục đ&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p r&otilde; r&agrave;ng bằng văn bản của ch&uacute;ng t&ocirc;i;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(vi) &ldquo;khung&rdquo;, &ldquo;nh&acirc;n bản&rdquo; hoặc kết hợp bất kỳ phần n&agrave;o của Ứng dụng n&agrave;y v&agrave;o bất kỳ ứng dụng n&agrave;o kh&aacute;c m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p trước bằng văn bản của ch&uacute;ng t&ocirc;i; hoặc l&agrave;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(vii) cố gắng sửa đổi, dịch, điều chỉnh, chỉnh sửa, dịch ngược, th&aacute;o rời hoặc thiết kế đối chiếu bất kỳ chương tr&igrave;nh phần mềm n&agrave;o được HoChiMinh City Tourism sử dụng li&ecirc;n quan đến Ứng dụng n&agrave;y hoặc c&aacute;c dịch vụ trừ khi được cho ph&eacute;p theo luật hiện h&agrave;nh.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CH&Iacute;NH S&Aacute;CH BẢO MẬT</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">HoChiMinh City Tourism tin tưởng v&agrave;o việc bảo vệ sự ri&ecirc;ng tư của bạn. Bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o bạn đăng tr&ecirc;n Ứng dụng n&agrave;y sẽ được sử dụng theo ch&iacute;nh s&aacute;ch bảo mật của ch&uacute;ng t&ocirc;i.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C&Aacute;C KẾ HOẠCH, NHẬN X&Eacute;T V&Agrave; SỬ DỤNG C&Aacute;C V&Ugrave;NG TƯƠNG T&Aacute;C KH&Aacute;C</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ch&uacute;ng t&ocirc;i tr&acirc;n trọng được nghe từ bạn. Xin lưu &yacute; rằng bằng c&aacute;ch gửi nội dung đến Ứng dụng n&agrave;y bằng thư điện tử, c&aacute;c b&agrave;i đăng tr&ecirc;n Ứng dụng n&agrave;y hoặc bằng c&aacute;ch kh&aacute;c, bao gồm bất kỳ c&acirc;u hỏi, h&igrave;nh ảnh hoặc video, nhận x&eacute;t, đề xuất, &yacute; tưởng hoặc những thứ tương tự c&oacute; trong bất kỳ b&agrave;i gửi n&agrave;o (gọi chung l&agrave; &ldquo;B&agrave;i nộp&rdquo;), bạn cấp cho Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; c&aacute;c chi nh&aacute;nh của n&oacute; quyền kh&ocirc;ng độc quyền, miễn ph&iacute; bản quyền, vĩnh viễn, c&oacute; thể chuyển nhượng, kh&ocirc;ng thể thu hồi v&agrave; ho&agrave;n to&agrave;n c&oacute; thể cấp ph&eacute;p lại để (a) sử dụng, t&aacute;i sản xuất, sửa đổi, điều chỉnh, dịch, ph&acirc;n phối, xuất bản, tạo c&aacute;c t&aacute;c phẩm ph&aacute;i sinh từ v&agrave; trưng b&agrave;y v&agrave; biểu diễn c&ocirc;ng khai C&aacute;c Đệ tr&igrave;nh như vậy tr&ecirc;n khắp thế giới tr&ecirc;n bất kỳ phương tiện truyền th&ocirc;ng n&agrave;o, hiện đ&atilde; được biết đến hoặc sau n&agrave;y được ph&aacute;t minh ra; v&agrave; (b) sử dụng t&ecirc;n m&agrave; bạn gửi li&ecirc;n quan đến Nội dung gửi đ&oacute;. Bạn x&aacute;c nhận rằng Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể chọn cung cấp c&aacute;c nhận x&eacute;t hoặc đ&aacute;nh gi&aacute; của bạn theo quyết định của ch&uacute;ng t&ocirc;i. Bạn cũng cấp cho Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh quyền truy cứu trước ph&aacute;p luật bất kỳ c&aacute; nh&acirc;n hoặc tổ chức n&agrave;o vi phạm c&aacute;c quyền của Bạn hoặc Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh trong c&aacute;c Đệ tr&igrave;nh do vi phạm Thỏa thuận n&agrave;y. Bạn thừa nhận v&agrave; đồng &yacute; rằng Nội dung đệ tr&igrave;nh l&agrave; kh&ocirc;ng b&iacute; mật v&agrave; kh&ocirc;ng độc quyền.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ứng dụng n&agrave;y c&oacute; thể chứa c&aacute;c diễn đ&agrave;n thảo luận, bảng th&ocirc;ng b&aacute;o, dịch vụ b&igrave;nh luận hoặc c&aacute;c diễn đ&agrave;n kh&aacute;c trong đ&oacute; bạn hoặc c&aacute;c b&ecirc;n thứ ba c&oacute; thể đăng đ&aacute;nh gi&aacute; về trải nghiệm du lịch hoặc nội dung, th&ocirc;ng điệp, t&agrave;i liệu hoặc c&aacute;c mục kh&aacute;c tr&ecirc;n Ứng dụng n&agrave;y (&ldquo;Khu vực tương t&aacute;c&rdquo;). Nếu HoChiMinh City Tourism cung cấp c&aacute;c V&ugrave;ng tương t&aacute;c như vậy, bạn ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm về việc sử dụng c&aacute;c V&ugrave;ng tương t&aacute;c đ&oacute; v&agrave; tự chịu rủi ro khi sử dụng. Bằng c&aacute;ch sử dụng bất kỳ Khu vực tương t&aacute;c n&agrave;o, bạn đồng &yacute; r&otilde; r&agrave;ng kh&ocirc;ng đăng, tải l&ecirc;n, truyền, ph&acirc;n phối, lưu trữ, tạo hoặc xuất bản th&ocirc;ng qua Ứng dụng n&agrave;y bất kỳ nội dung n&agrave;o sau đ&acirc;y:</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Bất kỳ tin nhắn, dữ liệu, th&ocirc;ng tin, văn bản, &acirc;m nhạc, &acirc;m thanh, ảnh, đồ họa, m&atilde; hoặc bất kỳ t&agrave;i liệu n&agrave;o kh&aacute;c (&ldquo;Nội dung&rdquo;) sai, bất hợp ph&aacute;p, g&acirc;y hiểu lầm, b&ocirc;i nhọ, phỉ b&aacute;ng, khi&ecirc;u d&acirc;m, khi&ecirc;u d&acirc;m, kh&ocirc;ng đứng đắn, d&acirc;m &ocirc;, kh&ecirc;u gợi, quấy rối hoặc ủng hộ việc quấy rối người kh&aacute;c, đe dọa, x&acirc;m phạm quyền ri&ecirc;ng tư hoặc quyền c&ocirc;ng khai, lạm dụng, k&iacute;ch động, lừa đảo hoặc bị phản đối;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung x&uacute;c phạm cộng đồng trực tuyến một c&aacute;ch thường xuy&ecirc;n, chẳng hạn như nội dung cổ vũ ph&acirc;n biệt chủng tộc, cố chấp, th&ugrave; hận hoặc tổn hại thể chất dưới bất kỳ h&igrave;nh thức n&agrave;o chống lại bất kỳ nh&oacute;m hoặc c&aacute; nh&acirc;n n&agrave;o;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung cấu th&agrave;nh, khuyến kh&iacute;ch, quảng b&aacute; hoặc cung cấp hướng dẫn để thực hiện một hoạt động bất hợp ph&aacute;p, phạm tội h&igrave;nh sự, dẫn đến tr&aacute;ch nhiệm d&acirc;n sự, vi phạm quyền của bất kỳ b&ecirc;n n&agrave;o ở bất kỳ quốc gia n&agrave;o tr&ecirc;n thế giới hoặc nếu kh&ocirc;ng sẽ tạo ra tr&aacute;ch nhiệm ph&aacute;p l&yacute; hoặc vi phạm bất kỳ luật ph&aacute;p địa phương, tiểu bang, quốc gia hoặc quốc tế, bao gồm nhưng kh&ocirc;ng giới hạn c&aacute;c quy định của Ủy ban Chứng kho&aacute;n v&agrave; Giao dịch Singapore (SEC) hoặc bất kỳ quy tắc n&agrave;o của bất kỳ s&agrave;n giao dịch chứng kho&aacute;n n&agrave;o;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung cung cấp th&ocirc;ng tin hướng dẫn về c&aacute;c hoạt động bất hợp ph&aacute;p như chế tạo hoặc mua vũ kh&iacute; bất hợp ph&aacute;p, vi phạm quyền ri&ecirc;ng tư của ai đ&oacute; hoặc cung cấp hoặc tạo vi r&uacute;t m&aacute;y t&iacute;nh;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung c&oacute; thể vi phạm bất kỳ bằng s&aacute;ng chế, nh&atilde;n hiệu, b&iacute; mật thương mại, bản quyền hoặc c&aacute;c quyền sở hữu hoặc tr&iacute; tuệ kh&aacute;c của bất kỳ b&ecirc;n n&agrave;o. Cụ thể, nội dung quảng b&aacute; bản sao bất hợp ph&aacute;p hoặc tr&aacute;i ph&eacute;p t&aacute;c phẩm c&oacute; bản quyền của người kh&aacute;c, chẳng hạn như cung cấp c&aacute;c chương tr&igrave;nh m&aacute;y t&iacute;nh vi phạm bản quyền hoặc li&ecirc;n kết đến ch&uacute;ng, cung cấp th&ocirc;ng tin để ph&aacute; vỡ c&aacute;c thiết bị chống sao ch&eacute;p được c&agrave;i đặt sẵn hoặc cung cấp nhạc vi phạm bản quyền hoặc li&ecirc;n kết đến c&aacute;c tệp nhạc vi phạm bản quyền ;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung mạo danh bất kỳ c&aacute; nh&acirc;n hoặc tổ chức n&agrave;o hoặc n&oacute;i c&aacute;ch kh&aacute;c l&agrave; xuy&ecirc;n tạc mối quan hệ của bạn với một c&aacute; nh&acirc;n hoặc tổ chức, bao gồm cả HoChiMinh City Tourism;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Khuyến mại kh&ocirc;ng được y&ecirc;u cầu, gửi thư h&agrave;ng loạt hoặc &quot;gửi thư r&aacute;c&quot;, truyền &quot;thư r&aacute;c&quot;, &quot;thư d&acirc;y chuyền&quot;, chiến dịch ch&iacute;nh trị, quảng c&aacute;o, cuộc thi, xổ số hoặc x&uacute;i giục;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung chứa c&aacute;c hoạt động thương mại v&agrave; / hoặc b&aacute;n h&agrave;ng m&agrave; kh&ocirc;ng c&oacute; sự đồng &yacute; trước bằng văn bản của ch&uacute;ng t&ocirc;i, chẳng hạn như c&aacute;c cuộc thi, r&uacute;t ​​thăm tr&uacute;ng thưởng, h&agrave;ng đổi h&agrave;ng, quảng c&aacute;o v&agrave; kế hoạch kim tự th&aacute;p;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Th&ocirc;ng tin c&aacute; nh&acirc;n của bất kỳ b&ecirc;n thứ ba n&agrave;o, bao gồm nhưng kh&ocirc;ng giới hạn, địa chỉ họ (t&ecirc;n gia đ&igrave;nh), số điện thoại, địa chỉ email, số nhận dạng quốc gia v&agrave; số thẻ t&iacute;n dụng.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Chứa c&aacute;c trang truy cập bị hạn chế hoặc chỉ c&oacute; mật khẩu, hoặc c&aacute;c trang hoặc h&igrave;nh ảnh ẩn (những trang kh&ocirc;ng được li&ecirc;n kết đến hoặc từ một trang c&oacute; thể truy cập kh&aacute;c);</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Vi r&uacute;t, dữ liệu bị hỏng hoặc c&aacute;c tệp c&oacute; hại, g&acirc;y rối hoặc ph&aacute; hoại kh&aacute;c;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung kh&ocirc;ng li&ecirc;n quan đến chủ đề của (c&aacute;c) Khu vực tương t&aacute;c m&agrave; Nội dung đ&oacute; được đăng; hoặc l&agrave;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nội dung hoặc li&ecirc;n kết đến nội dung, theo nhận định duy nhất của HoChiMinh City Tourism, (a) vi phạm c&aacute;c tiểu mục trước đ&acirc;y của t&agrave;i liệu n&agrave;y, (b) l&agrave; phản đối, (c) hạn chế hoặc ngăn cản bất kỳ người n&agrave;o kh&aacute;c sử dụng hoặc tận hưởng c&aacute;c Khu vực tương t&aacute;c hoặc điều n&agrave;y Ứng dụng, hoặc (d) c&oacute; thể khiến Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh hoặc c&aacute;c chi nh&aacute;nh của n&oacute; hoặc người d&ugrave;ng của n&oacute; phải chịu bất kỳ tổn hại hoặc tr&aacute;ch nhiệm ph&aacute;p l&yacute; n&agrave;o dưới bất kỳ h&igrave;nh thức n&agrave;o.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng chịu tr&aacute;ch nhiệm v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm ph&aacute;p l&yacute; đối với bất kỳ Nội dung n&agrave;o do bạn hoặc bất kỳ b&ecirc;n thứ ba n&agrave;o đăng tải, lưu trữ hoặc tải l&ecirc;n, hoặc đối với bất kỳ tổn thất hoặc thiệt hại n&agrave;o, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh cũng kh&ocirc;ng chịu tr&aacute;ch nhiệm về bất kỳ sai lầm, phỉ b&aacute;ng, vu khống, b&ocirc;i nhọ, thiếu s&oacute;t n&agrave;o , giả dối, tục tĩu, nội dung khi&ecirc;u d&acirc;m hoặc th&ocirc; tục m&agrave; bạn c&oacute; thể gặp phải. Với tư c&aacute;ch l&agrave; nh&agrave; cung cấp c&aacute;c dịch vụ tương t&aacute;c, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng chịu tr&aacute;ch nhiệm về bất kỳ tuy&ecirc;n bố, đại diện hoặc Nội dung n&agrave;o được cung cấp bởi người d&ugrave;ng của m&igrave;nh tr&ecirc;n bất kỳ diễn đ&agrave;n c&ocirc;ng cộng, trang chủ c&aacute; nh&acirc;n hoặc Khu vực tương t&aacute;c n&agrave;o kh&aacute;c. Mặc d&ugrave; Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng c&oacute; nghĩa vụ s&agrave;ng lọc, chỉnh sửa hoặc gi&aacute;m s&aacute;t bất kỳ Nội dung n&agrave;o được đăng tải l&ecirc;n hoặc ph&acirc;n phối qua bất kỳ Khu vực tương t&aacute;c n&agrave;o, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; quyền, v&agrave; c&oacute; to&agrave;n quyền quyết định loại bỏ, s&agrave;ng lọc hoặc chỉnh sửa m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o bất kỳ Nội dung n&agrave;o được đăng hoặc được lưu trữ tr&ecirc;n Ứng dụng n&agrave;y v&agrave;o bất kỳ l&uacute;c n&agrave;o v&agrave; v&igrave; bất kỳ l&yacute; do g&igrave;, v&agrave; bạn ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm về việc tạo c&aacute;c bản sao dự ph&ograve;ng v&agrave; thay thế bất kỳ Nội dung n&agrave;o bạn đăng hoặc lưu trữ tr&ecirc;n Ứng dụng n&agrave;y bằng chi ph&iacute; v&agrave; chi ph&iacute; duy nhất của bạn.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nếu được x&aacute;c định rằng bạn giữ c&aacute;c quyền nh&acirc;n th&acirc;n (bao gồm quyền ghi c&ocirc;ng hoặc quyền to&agrave;n vẹn) trong Nội dung hoặc Nội dung gửi, th&igrave; bạn tuy&ecirc;n bố rằng (a) bạn kh&ocirc;ng y&ecirc;u cầu sử dụng bất kỳ th&ocirc;ng tin nhận dạng c&aacute; nh&acirc;n n&agrave;o li&ecirc;n quan đến Nội dung hoặc Nội dung gửi, hoặc bất kỳ sản phẩm ph&aacute;i sinh n&agrave;o của hoặc n&acirc;ng cấp hoặc cập nhật từ đ&oacute;; (b) bạn kh&ocirc;ng phản đối việc xuất bản, sử dụng, sửa đổi, x&oacute;a v&agrave; khai th&aacute;c Nội dung hoặc B&agrave;i dự thi của HoChiMinh City Tourism hoặc những người được cấp ph&eacute;p, kế thừa v&agrave; chuyển nhượng; (c) bạn vĩnh viễn từ bỏ v&agrave; đồng &yacute; kh&ocirc;ng y&ecirc;u cầu hoặc khẳng định bất kỳ quyền lợi n&agrave;o đối với bất kỳ v&agrave; tất cả c&aacute;c quyền nh&acirc;n th&acirc;n của t&aacute;c giả trong bất kỳ Nội dung hoặc B&agrave;i gửi n&agrave;o; v&agrave; (d) bạn vĩnh viễn trả tự do cho HoChiMinh City Tourism, v&agrave; những người được cấp ph&eacute;p, kế thừa v&agrave; chuyển nhượng, khỏi bất kỳ khiếu nại n&agrave;o m&agrave; bạn c&oacute; thể khẳng định chống lại HoChiMinh City Tourism bằng bất kỳ quyền nh&acirc;n th&acirc;n n&agrave;o như vậy.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Bất kỳ việc sử dụng Khu vực tương t&aacute;c hoặc c&aacute;c phần kh&aacute;c của Ứng dụng n&agrave;y vi phạm những điều đ&atilde; n&oacute;i ở tr&ecirc;n đều vi phạm Thỏa thuận n&agrave;y v&agrave; c&oacute; thể dẫn đến việc bạn bị chấm dứt hoặc đ&igrave;nh chỉ quyền sử dụng Khu vực tương t&aacute;c v&agrave; / hoặc Ứng dụng n&agrave;y. Để hợp t&aacute;c với c&aacute;c y&ecirc;u cầu hợp ph&aacute;p của ch&iacute;nh phủ, tr&aacute;t đ&ograve;i hầu t&ograve;a hoặc lệnh của t&ograve;a &aacute;n, để bảo vệ hệ thống v&agrave; kh&aacute;ch h&agrave;ng của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, hoặc để đảm bảo t&iacute;nh to&agrave;n vẹn v&agrave; hoạt động của hệ thống v&agrave; kinh doanh của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể truy cập v&agrave; tiết lộ bất kỳ th&ocirc;ng tin n&agrave;o m&agrave; họ cho l&agrave; cần thiết hoặc th&iacute;ch hợp, bao gồm nhưng kh&ocirc;ng giới hạn, th&ocirc;ng tin hồ sơ người d&ugrave;ng (tức l&agrave; t&ecirc;n, địa chỉ email, v.v.), địa chỉ IP v&agrave; th&ocirc;ng tin lưu lượng, lịch sử sử dụng v&agrave; Nội dung đ&atilde; đăng. Quyền tiết lộ bất kỳ th&ocirc;ng tin n&agrave;o như vậy của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh sẽ được ưu ti&ecirc;n hơn bất kỳ điều khoản n&agrave;o trong Ch&iacute;nh s&aacute;ch Bảo mật của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">ĐIỂM DU LỊCH</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Mặc d&ugrave; hầu hết c&aacute;c chuyến du lịch, bao gồm cả du lịch đến c&aacute;c điểm đến quốc tế, được ho&agrave;n th&agrave;nh m&agrave; kh&ocirc;ng xảy ra sự cố, việc đi đến c&aacute;c điểm đến nhất định c&oacute; thể tiềm ẩn rủi ro lớn hơn những điểm kh&aacute;c. HoChiMinh City Tourism k&ecirc;u gọi h&agrave;nh kh&aacute;ch điều tra v&agrave; xem x&eacute;t c&aacute;c quy định cấm du lịch, cảnh b&aacute;o, th&ocirc;ng b&aacute;o v&agrave; tư vấn do Ch&iacute;nh phủ Vương quốc Anh, Li&ecirc;n minh Ch&acirc;u &Acirc;u (EU) v&agrave; ch&iacute;nh phủ c&aacute;c nước đến trước khi đặt chuyến du lịch đến c&aacute;c điểm đến quốc tế.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">BẰNG VIỆC LẮP ĐẶT TH&Ocirc;NG TIN LI&Ecirc;N QUAN ĐẾN VIỆC ĐI ĐẾN C&Aacute;C ĐIỂM ĐẾN QUỐC TẾ CỤ THỂ, CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG TUY&Ecirc;N BỐ HOẶC BẢO ĐẢM RẰNG VIỆC ĐI ĐẾN C&Aacute;C ĐIỂM Đ&Oacute; L&Agrave; C&Oacute; LỢI HOẶC KH&Ocirc;NG RỦI RO V&Agrave; KH&Ocirc;NG CHỊU TR&Aacute;CH NHIỆM ĐỐI VỚI C&Aacute;C THIỆT HẠI HOẶC TỔN THẤT C&Oacute; THỂ PH&Aacute;T SINH TỪ VIỆC ĐI ĐẾN C&Aacute;C ĐIỂM Đ&Oacute;.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">TUY&Ecirc;N BỐ MIỄN TRỪ TR&Aacute;CH NHIỆM</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ ĐƯỢC XUẤT BẢN TR&Ecirc;N ỨNG DỤNG N&Agrave;Y C&Oacute; THỂ BAO GỒM NHỮNG LỖI KH&Ocirc;NG CH&Iacute;NH X&Aacute;C HOẶC LỖI. CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG ĐẢM BẢO T&Iacute;NH CH&Iacute;NH X&Aacute;C V&Agrave; TỪ CHỐI TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; ĐỐI VỚI BẤT KỲ LỖI HOẶC KH&Ocirc;NG CH&Iacute;NH X&Aacute;C KH&Aacute;C LI&Ecirc;N QUAN ĐẾN TH&Ocirc;NG TIN V&Agrave; M&Ocirc; TẢ CỦA KH&Aacute;CH SẠN, H&Agrave;NG KH&Ocirc;NG, T&Agrave;U, XE V&Agrave; BẤT KỲ SẢN PHẨM DU LỊCH N&Agrave;O KH&Aacute;C ĐƯỢC HIỂN THỊ TR&Ecirc;N ỨNG DỤNG N&Agrave;Y (BAO GỒM, KH&Ocirc;NG GIỚI HẠN , CHỤP ẢNH, DANH S&Aacute;CH C&Aacute;C TIỆN &Iacute;CH CỦA KH&Aacute;CH SẠN, M&Ocirc; TẢ SẢN PHẨM CHUNG, V..V.).</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG TUY&Ecirc;N BỐ BẤT CỨ H&Igrave;NH THỨC N&Agrave;O VỀ SỰ PH&Ugrave; HỢP CỦA TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ LI&Ecirc;N HỆ TR&Ecirc;N ỨNG DỤNG N&Agrave;Y HOẶC BẤT KỲ CỔNG N&Agrave;O CHO BẤT KỲ MỤC Đ&Iacute;CH N&Agrave;O V&Agrave; SỰ BAO GỒM HOẶC CUNG CẤP BẤT KỲ SẢN PHẨM HOẶC DỊCH VỤ N&Agrave;O TR&Ecirc;N ỨNG DỤNG N&Agrave;Y KH&Ocirc;NG C&Oacute; BẤT KỲ HOẶC NHẬN ĐỊNH VỀ C&Aacute;C SẢN PHẨM HOẶC DỊCH VỤ CỦA CH&Uacute;NG T&Ocirc;I. TẤT CẢ TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ ĐỀU ĐƯỢC CUNG CẤP &ldquo;NGUY&Ecirc;N TRẠNG&rdquo; M&Agrave; KH&Ocirc;NG ĐƯỢC BẢO H&Agrave;NH BẤT KỲ H&Igrave;NH THỨC N&Agrave;O. CH&Uacute;NG T&Ocirc;I TỪ CHỐI TẤT CẢ C&Aacute;C ĐẢM BẢO V&Agrave; ĐIỀU KIỆN RẰNG ỨNG DỤNG N&Agrave;Y, C&Aacute;C M&Aacute;Y CHỦ CỦA N&Oacute; HOẶC BẤT KỲ EMAIL N&Agrave;O ĐƯỢC GỬI TỪ CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG C&Oacute; VIRUS HOẶC C&Aacute;C TH&Agrave;NH PHẦN C&Oacute; HẠI KH&Aacute;C. ĐỐI VỚI MỞ RỘNG TỐI ĐA ĐƯỢC PH&Eacute;P THEO LUẬT &Aacute;P DỤNG CỦA CH&Uacute;NG T&Ocirc;I TẠI Đ&Acirc;Y TỪ CHỐI TẤT CẢ C&Aacute;C BẢO ĐẢM V&Agrave; ĐIỀU KIỆN LI&Ecirc;N QUAN ĐẾN TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ N&Agrave;Y, BAO GỒM TẤT CẢ C&Aacute;C BẢO ĐẢM NGỤ &Yacute; V&Agrave; ĐIỀU KIỆN VỀ KHẢ NĂNG BẢO ĐẢM V&Agrave; MỤC Đ&Iacute;CH, PH&Ugrave; HỢP VỚI MỘT PHẦN.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CH&Uacute;NG T&Ocirc;I CŨNG TUY&Ecirc;N BỐ TỪ CHỐI BẤT KỲ BẢO ĐẢM HOẶC TUY&Ecirc;N BỐ N&Agrave;O ĐỐI VỚI T&Iacute;NH CH&Iacute;NH X&Aacute;C HOẶC SỞ HỮU CỦA NỘI DUNG ỨNG DỤNG.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">KH&Ocirc;NG C&Oacute; ĐIỀU G&Igrave; TRONG THỎA THUẬN N&Agrave;Y SẼ LOẠI TRỪ HOẶC GIỚI HẠN TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; CỦA CH&Uacute;NG T&Ocirc;I ĐỐI VỚI (I) C&Aacute;I CHẾT HOẶC THƯƠNG HẠI C&Aacute; NH&Acirc;N DO SỰ TI&Ecirc;U CỰC; (II) NGUỒN GỐC; HOẶC (III) TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; HOẶC BẤT CỨ HO&Agrave;N TO&Agrave;N (IV) BẤT KỲ TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; N&Agrave;O KH&Aacute;C KH&Ocirc;NG THỂ LOẠI TRỪ THEO LUẬT &Aacute;P DỤNG.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">THEO VIỆC BẮT ĐẦU, BẠN SỬ DỤNG ỨNG DỤNG N&Agrave;Y RỦI RO CỦA RI&Ecirc;NG BẠN V&Agrave; KH&Ocirc;NG SỰ KIỆN N&Agrave;O G&Acirc;Y RA CHO CH&Uacute;NG T&Ocirc;I (C&Aacute;C C&Aacute;N BỘ, GI&Aacute;M ĐỐC V&Agrave; LI&Ecirc;N QUAN ĐẾN CỦA N&Oacute;) CHỊU TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; VỀ BẤT KỲ SỰ CỐ, BẤT CỨ, ĐẶC BIỆT, HOẶC HẬU QUẢ N&Agrave;O MẤT BẤT KỲ THU NHẬP, LỢI NHUẬN, H&Oacute;A ĐƠN, DỮ LIỆU, HỢP ĐỒNG, VIỆC SỬ DỤNG TIỀN HOẶC MẤT HOẶC THIỆT HẠI PH&Aacute;T SINH TỪ HOẶC KẾT NỐI TRONG BẤT KỲ C&Aacute;CH N&Agrave;O ĐỐI VỚI DOANH NGHIỆP LI&Ecirc;N QUAN ĐẾN BẤT KỲ LOẠI H&Igrave;NH N&Agrave;O NGO&Agrave;I, HOẶC BẤT KỲ C&Aacute;CH N&Agrave;O ĐƯỢC KẾT NỐI VỚI VIỆC BẠN TRUY CẬP, HIỂN THỊ HOẶC SỬ DỤNG ỨNG DỤNG N&Agrave;Y HOẶC C&Oacute; SỰ TR&Igrave; HO&Atilde;N HOẶC KH&Ocirc;NG C&Oacute; KHẢ NĂNG TRUY CẬP, HIỂN THỊ HOẶC SỬ DỤNG ỨNG DỤNG N&Agrave;Y (BAO GỒM, NHƯNG KH&Ocirc;NG GIỚI HẠN ĐỐI VỚI, C&Aacute;C &Yacute; KIẾN LI&Ecirc;N KẾT CỦA BẠN XUẤT HIỆN TR&Ecirc;N ỨNG DỤNG N&Agrave;Y; BẤT KỲ VIRUS M&Aacute;Y T&Iacute;NH N&Agrave;O, TH&Ocirc;NG TIN, PHẦN MỀM, ỨNG DỤNG LI&Ecirc;N KẾT, SẢN PHẨM V&Agrave; DỊCH VỤ TH&Ocirc;NG QUA ỨNG DỤNG N&Agrave;Y; HOẶC C&Aacute;CH KH&Aacute;C PH&Aacute;T SINH NGO&Agrave;I VIỆC TRUY CẬP, HIỂN THỊ HOẶC SỬ DỤNG ỨNG DỤNG N&Agrave;Y) M&Agrave; DỰA TR&Ecirc;N L&Yacute; THUYẾT VỀ SỰ TI&Ecirc;U CỰC, HỢP ĐỒNG, KHẢ NĂNG, TR&Aacute;CH NHIỆM NGHI&Ecirc;M C THIỆT HẠI NHƯ VẬY.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C&Aacute;C ĐIỀU KHOẢN V&Agrave; ĐIỀU KIỆN N&Agrave;Y V&Agrave; BẮT ĐẦU TỪ CHỐI TR&Aacute;CH NHIỆM TR&Aacute;CH NHIỆM, KH&Ocirc;NG ẢNH HƯỞNG ĐẾN C&Aacute;C QUYỀN PH&Aacute;P L&Yacute; XỬ L&Yacute; KH&Ocirc;NG THỂ LOẠI TRỪ THEO LUẬT &Aacute;P DỤNG.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Giới hạn tr&aacute;ch nhiệm phản &aacute;nh sự ph&acirc;n bổ rủi ro giữa c&aacute;c b&ecirc;n. C&aacute;c giới hạn được chỉ định trong phần n&agrave;y sẽ tồn tại v&agrave; &aacute;p dụng ngay cả khi bất kỳ biện ph&aacute;p khắc phục hạn chế n&agrave;o được chỉ định trong c&aacute;c điều khoản n&agrave;y được ph&aacute;t hiện l&agrave; kh&ocirc;ng đạt được mục đ&iacute;ch thiết yếu của n&oacute;. C&aacute;c giới hạn tr&aacute;ch nhiệm ph&aacute;p l&yacute; được quy định trong c&aacute;c điều khoản n&agrave;y c&oacute; lợi cho Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; c&aacute;c c&ocirc;ng ty li&ecirc;n kết, kế thừa v&agrave; chuyển nhượng của c&ocirc;ng ty.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">SỰ BỒI THƯỜNG</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Bạn đồng &yacute; bảo vệ v&agrave; bồi thường cho HoChiMinh City Tourism v&agrave; c&aacute;c chi nh&aacute;nh của n&oacute; v&agrave; bất kỳ c&aacute;n bộ, gi&aacute;m đốc, nh&acirc;n vi&ecirc;n v&agrave; đại l&yacute; n&agrave;o của họ khỏi v&agrave; chống lại bất kỳ khiếu nại, nguy&ecirc;n nh&acirc;n của h&agrave;nh động, y&ecirc;u cầu, thu hồi, tổn thất, thiệt hại, tiền phạt, h&igrave;nh phạt hoặc c&aacute;c chi ph&iacute; hoặc chi ph&iacute; kh&aacute;c của bất kỳ h&igrave;nh thức hoặc bản chất n&agrave;o bao gồm nhưng kh&ocirc;ng giới hạn ở c&aacute;c khoản ph&iacute; ph&aacute;p l&yacute; v&agrave; kế to&aacute;n hợp l&yacute;, do c&aacute;c b&ecirc;n thứ ba đưa ra do:</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(i) bạn vi phạm Thỏa thuận n&agrave;y hoặc c&aacute;c t&agrave;i liệu được đề cập ở đ&acirc;y;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(ii) bạn vi phạm bất kỳ luật n&agrave;o hoặc quyền của b&ecirc;n thứ ba; hoặc l&agrave;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">(iii) việc bạn sử dụng Ứng dụng n&agrave;y.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">LI&Ecirc;N KẾT ĐẾN ỨNG DỤNG B&Ecirc;N THỨ BA</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ứng dụng n&agrave;y c&oacute; thể chứa c&aacute;c si&ecirc;u li&ecirc;n kết đến c&aacute;c ứng dụng được điều h&agrave;nh bởi c&aacute;c b&ecirc;n kh&ocirc;ng phải l&agrave; Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh. C&aacute;c đường dẫn n&agrave;y được cung cấp cho bạn chỉ để tham khảo. Ch&uacute;ng t&ocirc;i kh&ocirc;ng kiểm so&aacute;t c&aacute;c ứng dụng đ&oacute; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung của ch&uacute;ng hoặc quyền ri&ecirc;ng tư hoặc c&aacute;c hoạt động kh&aacute;c của c&aacute;c ứng dụng đ&oacute;. Hơn nữa, bạn phải thực hiện c&aacute;c biện ph&aacute;p ph&ograve;ng ngừa để đảm bảo rằng bất kỳ li&ecirc;n kết n&agrave;o bạn chọn hoặc phần mềm bạn tải xuống (cho d&ugrave; từ Ứng dụng n&agrave;y hay c&aacute;c ứng dụng kh&aacute;c) đều kh&ocirc;ng c&oacute; c&aacute;c mục như vi r&uacute;t, s&acirc;u, ngựa trojan, lỗi v&agrave; c&aacute;c mục kh&aacute;c c&oacute; thể ph&aacute; hoại Thi&ecirc;n nhi&ecirc;n. Việc ch&uacute;ng t&ocirc;i đưa c&aacute;c si&ecirc;u li&ecirc;n kết đến c&aacute;c ứng dụng như vậy kh&ocirc;ng ngụ &yacute; bất kỳ sự chứng thực n&agrave;o của t&agrave;i liệu tr&ecirc;n c&aacute;c ứng dụng đ&oacute; hoặc bất kỳ li&ecirc;n kết n&agrave;o với c&aacute;c nh&agrave; điều h&agrave;nh của ch&uacute;ng. Trong một số trường hợp, bạn c&oacute; thể được ứng dụng của b&ecirc;n thứ ba y&ecirc;u cầu li&ecirc;n kết hồ sơ của bạn tr&ecirc;n HoChiMinh City Tourism với hồ sơ tr&ecirc;n một ứng dụng của b&ecirc;n thứ ba kh&aacute;c. Việc chọn l&agrave;m như vậy ho&agrave;n to&agrave;n l&agrave; t&ugrave;y chọn v&agrave; quyết định cho ph&eacute;p li&ecirc;n kết th&ocirc;ng tin n&agrave;y c&oacute; thể bị v&ocirc; hiệu h&oacute;a (với ứng dụng của b&ecirc;n thứ ba) bất kỳ l&uacute;c n&agrave;o.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">PHẦN MỀM C&Oacute; TR&Ecirc;N ỨNG DỤNG N&Agrave;Y</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Trừ khi c&oacute; quy định kh&aacute;c, c&aacute;c t&agrave;i liệu tr&ecirc;n Ứng dụng n&agrave;y chỉ được tr&igrave;nh b&agrave;y để cung cấp th&ocirc;ng tin li&ecirc;n quan v&agrave; để quảng b&aacute; c&aacute;c dịch vụ, ứng dụng, đối t&aacute;c v&agrave; c&aacute;c sản phẩm kh&aacute;c của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh tại Việt Nam, c&aacute;c v&ugrave;ng l&atilde;nh thổ, t&agrave;i sản v&agrave; c&aacute;c quốc gia bảo hộ của Th&agrave;nh phố Hồ Ch&iacute; Minh. Ứng dụng n&agrave;y được kiểm so&aacute;t v&agrave; vận h&agrave;nh bởi HoChiMinh City Tourism từ c&aacute;c văn ph&ograve;ng của n&oacute; tại Việt Nam. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng tuy&ecirc;n bố rằng c&aacute;c t&agrave;i liệu tr&ecirc;n Ứng dụng n&agrave;y l&agrave; th&iacute;ch hợp hoặc c&oacute; sẵn để sử dụng b&ecirc;n ngo&agrave;i Việt Nam. Những người chọn truy cập Ứng dụng n&agrave;y từ b&ecirc;n ngo&agrave;i Việt Nam l&agrave;m như vậy theo s&aacute;ng kiến của họ v&agrave; chịu tr&aacute;ch nhiệm tu&acirc;n thủ luật ph&aacute;p địa phương, nếu v&agrave; trong phạm vi luật ph&aacute;p địa phương được &aacute;p dụng. Bằng c&aacute;ch sử dụng Ứng dụng n&agrave;y, bạn tuy&ecirc;n bố v&agrave; đảm bảo rằng bạn kh&ocirc;ng ở, dưới sự kiểm so&aacute;t của hoặc một c&ocirc;ng d&acirc;n hoặc cư d&acirc;n của bất kỳ quốc gia n&agrave;o như vậy hoặc trong bất kỳ danh s&aacute;ch n&agrave;o như vậy.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Phần mềm n&agrave;y l&agrave; sản phẩm c&oacute; bản quyền của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, hoặc c&aacute;c Chi nh&aacute;nh Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, hoặc c&aacute;c b&ecirc;n thứ ba kh&aacute;c như đ&atilde; được x&aacute;c định. Việc bạn sử dụng Phần mềm đ&oacute; chịu sự điều chỉnh của c&aacute;c điều khoản của thỏa thuận cấp ph&eacute;p người d&ugrave;ng cuối, nếu c&oacute;, đi k&egrave;m hoặc đi k&egrave;m với Phần mềm (&ldquo;Thỏa thuận cấp ph&eacute;p&rdquo;). Bạn kh&ocirc;ng được c&agrave;i đặt hoặc sử dụng bất kỳ Phần mềm n&agrave;o đi k&egrave;m hoặc bao gồm Thỏa thuận cấp ph&eacute;p trừ khi bạn đồng &yacute; trước với c&aacute;c điều khoản của Thỏa thuận cấp ph&eacute;p. Đối với bất kỳ Phần mềm n&agrave;o được cung cấp để tải xuống tr&ecirc;n Ứng dụng n&agrave;y kh&ocirc;ng k&egrave;m theo Thỏa thuận cấp ph&eacute;p, theo đ&acirc;y, ch&uacute;ng t&ocirc;i cấp cho bạn, người d&ugrave;ng, giấy ph&eacute;p c&oacute; giới hạn, c&aacute; nh&acirc;n, kh&ocirc;ng thể chuyển nhượng để sử dụng Phần mềm để xem v&agrave; sử dụng Ứng dụng n&agrave;y theo c&aacute;c điều khoản n&agrave;y v&agrave; điều kiện v&agrave; kh&ocirc;ng v&igrave; mục đ&iacute;ch n&agrave;o kh&aacute;c.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Xin lưu &yacute; rằng tất cả Phần mềm, bao gồm nhưng kh&ocirc;ng giới hạn, tất cả HTML, XML, m&atilde; Java v&agrave; c&aacute;c điều khiển Active X c&oacute; tr&ecirc;n Ứng dụng n&agrave;y, thuộc sở hữu của HoChiMinh City Tourism, c&aacute;c chi nh&aacute;nh v&agrave; / hoặc b&ecirc;n thứ ba v&agrave; được bảo vệ bởi luật bản quyền v&agrave; hiệp ước quốc tế điều khoản. Mọi việc sao ch&eacute;p hoặc ph&acirc;n phối lại Phần mềm đều bị nghi&ecirc;m cấm v&agrave; c&oacute; thể bị phạt nặng về d&acirc;n sự v&agrave; h&igrave;nh sự. Người vi phạm sẽ bị truy tố đến mức tối đa c&oacute; thể.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">KH&Ocirc;NG GIỚI HẠN VIỆC TẠO RA, SAO CH&Eacute;P HOẶC GIỚI THIỆU PHẦN MỀM CHO BẤT KỲ M&Aacute;Y CHỦ HOẶC VỊ TR&Iacute; N&Agrave;O KH&Aacute;C ĐỂ GIỚI THIỆU HOẶC PH&Acirc;N PHỐI TH&Ecirc;M ĐƯỢC CẤM R&Otilde; R&Agrave;NG. PHẦN MỀM ĐƯỢC BẢO H&Agrave;NH, NẾU C&Oacute;, CHỈ THEO ĐIỀU KHOẢN CỦA THỎA THUẬN GIẤY PH&Eacute;P.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">ĐIỀU KHOẢN SỬ DỤNG TR&Ecirc;N THIẾT BỊ DI ĐỘNG</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C&aacute;c phần của phần mềm di động của HoChiMinh City Tourism c&oacute; thể sử dụng t&agrave;i liệu c&oacute; bản quyền, việc sử dụng n&agrave;y được HoChiMinh City Tourism thừa nhận. Ngo&agrave;i ra, c&oacute; c&aacute;c điều khoản cụ thể &aacute;p dụng cho việc sử dụng một số ứng dụng di động của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">TH&Ocirc;NG B&Aacute;O VỀ BẢN QUYỀN V&Agrave; THƯƠNG HIỆU</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Tất cả nội dung của Ứng dụng n&agrave;y l&agrave;: &copy; 2015 Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh. Đ&atilde; đăng k&yacute; Bản quyền. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung tr&ecirc;n c&aacute;c ứng dụng do c&aacute;c b&ecirc;n kh&ocirc;ng phải Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh điều h&agrave;nh. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, biểu tượng v&agrave; tất cả c&aacute;c t&ecirc;n sản phẩm hoặc dịch vụ kh&aacute;c hoặc khẩu hiệu hiển thị tr&ecirc;n Ứng dụng n&agrave;y l&agrave; thương hiệu đ&atilde; đăng k&yacute; v&agrave; / hoặc thương hiệu th&ocirc;ng thường của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; / hoặc c&aacute;c nh&agrave; cung cấp hoặc người cấp ph&eacute;p của n&oacute;, v&agrave; kh&ocirc;ng được sao ch&eacute;p, bắt chước hoặc sử dụng, trong to&agrave;n bộ hoặc một phần, m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p trước bằng văn bản của HoChiMinh City Tourism hoặc chủ sở hữu nh&atilde;n hiệu hiện h&agrave;nh. Ngo&agrave;i ra, giao diện của Ứng dụng n&agrave;y, bao gồm tất cả c&aacute;c ti&ecirc;u đề trang, đồ họa t&ugrave;y chỉnh, biểu tượng n&uacute;t v&agrave; chữ viết, l&agrave; nh&atilde;n hiệu dịch vụ, nh&atilde;n hiệu v&agrave; / hoặc trang phục thương mại của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; kh&ocirc;ng được sao ch&eacute;p, bắt chước hoặc sử dụng, trong to&agrave;n bộ hoặc một phần m&agrave; kh&ocirc;ng được sự cho ph&eacute;p trước bằng văn bản của HoChiMinh City Tourism. Tất cả c&aacute;c nh&atilde;n hiệu kh&aacute;c, nh&atilde;n hiệu đ&atilde; đăng k&yacute;, t&ecirc;n sản phẩm v&agrave; t&ecirc;n c&ocirc;ng ty hoặc biểu tượng được đề cập trong Ứng dụng n&agrave;y l&agrave; t&agrave;i sản của chủ sở hữu tương ứng. Tham chiếu đến bất kỳ sản phẩm, dịch vụ, quy tr&igrave;nh hoặc th&ocirc;ng tin n&agrave;o kh&aacute;c, theo t&ecirc;n thương mại, nh&atilde;n hiệu, nh&agrave; sản xuất, nh&agrave; cung cấp hoặc c&aacute;ch kh&aacute;c kh&ocirc;ng cấu th&agrave;nh hoặc ngụ &yacute; x&aacute;c nhận, t&agrave;i trợ hoặc khuyến nghị của HoChiMinh City Tourism.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Th&ocirc;ng b&aacute;o v&agrave; Ch&iacute;nh s&aacute;ch gỡ xuống đối với nội dung bất hợp ph&aacute;p.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">HoChiMinh City Tourism hoạt động tr&ecirc;n cơ sở &ldquo;th&ocirc;ng b&aacute;o v&agrave; gỡ bỏ&rdquo;. Nếu bạn c&oacute; bất kỳ khiếu nại hoặc phản đối n&agrave;o đối với t&agrave;i liệu hoặc nội dung, hoặc nếu bạn tin rằng t&agrave;i liệu hoặc nội dung được đăng tr&ecirc;n Ứng dụng n&agrave;y vi phạm bản quyền m&agrave; bạn nắm giữ, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i ngay lập tức bằng c&aacute;ch thực hiện theo th&ocirc;ng b&aacute;o v&agrave; quy tr&igrave;nh gỡ xuống của ch&uacute;ng t&ocirc;i. Sau khi quy tr&igrave;nh n&agrave;y được tu&acirc;n thủ, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh sẽ nỗ lực hết sức hợp l&yacute; để loại bỏ nội dung bất hợp ph&aacute;p.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C&aacute;c sửa đổi</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể thay đổi, th&ecirc;m hoặc x&oacute;a c&aacute;c điều khoản v&agrave; điều kiện của Thỏa thuận n&agrave;y hoặc bất kỳ phần n&agrave;o của Thỏa thuận n&agrave;y v&agrave;o bất kỳ thời điểm n&agrave;o theo quyết định ri&ecirc;ng của m&igrave;nh khi thấy cần thiết v&agrave; hợp l&yacute; cho c&aacute;c mục đ&iacute;ch ph&aacute;p l&yacute;, quy định chung v&agrave; kỹ thuật, hoặc do những thay đổi trong dịch vụ được cung cấp hoặc bản chất hoặc bố cục của Ứng dụng n&agrave;y. Sau đ&oacute;, bạn ho&agrave;n to&agrave;n đồng &yacute; bị r&agrave;ng buộc bởi bất kỳ điều khoản v&agrave; điều kiện sửa đổi n&agrave;o như vậy.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể thay đổi, tạm ngừng hoặc ngừng bất kỳ kh&iacute;a cạnh n&agrave;o của dịch vụ Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave;o bất kỳ l&uacute;c n&agrave;o, kể cả t&iacute;nh khả dụng của bất kỳ t&iacute;nh năng, cơ sở dữ liệu hoặc nội dung n&agrave;o. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh cũng c&oacute; thể &aacute;p đặt c&aacute;c giới hạn đối với một số t&iacute;nh năng v&agrave; dịch vụ hoặc hạn chế quyền truy cập của bạn v&agrave;o tất cả hoặc c&aacute;c phần của Ứng dụng n&agrave;y hoặc bất kỳ ứng dụng Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh n&agrave;o kh&aacute;c m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o hoặc chịu tr&aacute;ch nhiệm v&igrave; l&yacute; do kỹ thuật hoặc bảo mật, để ngăn chặn việc truy cập tr&aacute;i ph&eacute;p, mất m&aacute;t, hoặc ph&aacute; hủy dữ liệu hoặc theo quyết định ri&ecirc;ng của ch&uacute;ng t&ocirc;i rằng bạn đang vi phạm bất kỳ điều khoản n&agrave;o của Thỏa thuận n&agrave;y hoặc bất kỳ luật hoặc quy định n&agrave;o v&agrave; nơi quyết định ngừng cung cấp dịch vụ.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">VIỆC BẠN TIẾP TỤC SỬ DỤNG CH&Uacute;NG T&Ocirc;I B&Acirc;Y GIỜ, HOẶC SAU KHI ĐĂNG BẤT KỲ TH&Ocirc;NG B&Aacute;O N&Agrave;O VỀ BẤT KỲ THAY ĐỔI N&Agrave;O SẼ CHỈ ĐỊNH BẠN CHẤP NHẬN C&Aacute;C SỬA ĐỔI N&Oacute;.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Tổng quan</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ứng dụng n&agrave;y được điều h&agrave;nh bởi một ph&aacute;p nh&acirc;n Singapore v&agrave; Thỏa thuận n&agrave;y chịu sự điều chỉnh của luật ph&aacute;p Singapore. Theo đ&acirc;y, bạn đồng &yacute; với quyền t&agrave;i ph&aacute;n v&agrave; địa điểm duy nhất của c&aacute;c t&ograve;a &aacute;n ở Singapore v&agrave; quy định về t&iacute;nh c&ocirc;ng bằng v&agrave; thuận tiện của thủ tục tố tụng tại c&aacute;c t&ograve;a &aacute;n đ&oacute; đối với tất cả c&aacute;c tranh chấp ph&aacute;t sinh từ hoặc li&ecirc;n quan đến việc sử dụng Ứng dụng n&agrave;y. Bạn đồng &yacute; rằng tất cả c&aacute;c khiếu nại m&agrave; bạn c&oacute; thể c&oacute; đối với Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh ph&aacute;t sinh từ hoặc li&ecirc;n quan đến Ứng dụng n&agrave;y phải được x&eacute;t xử v&agrave; giải quyết tại một t&ograve;a &aacute;n c&oacute; thẩm quyền về vấn đề c&oacute; thẩm quyền tại Singapore. Việc sử dụng Ứng dụng n&agrave;y l&agrave; tr&aacute;i ph&eacute;p ở bất kỳ khu vực t&agrave;i ph&aacute;n n&agrave;o kh&ocirc;ng c&oacute; hiệu lực đối với tất cả c&aacute;c quy định của c&aacute;c điều khoản v&agrave; điều kiện n&agrave;y, bao gồm nhưng kh&ocirc;ng giới hạn ở khoản n&agrave;y. Những điều đ&atilde; n&oacute;i ở tr&ecirc;n sẽ kh&ocirc;ng &aacute;p dụng trong phạm vi luật hiện h&agrave;nh ở quốc gia bạn cư tr&uacute; y&ecirc;u cầu &aacute;p dụng luật v&agrave; / hoặc quyền t&agrave;i ph&aacute;n kh&aacute;c v&agrave; điều n&agrave;y kh&ocirc;ng thể bị loại trừ bởi hợp đồng.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Bạn đồng &yacute; rằng kh&ocirc;ng c&oacute; mối quan hệ li&ecirc;n doanh, đại l&yacute;, đối t&aacute;c hoặc việc l&agrave;m n&agrave;o tồn tại giữa bạn v&agrave; HoChiMinh City Tourism v&agrave; / hoặc c&aacute;c chi nh&aacute;nh của n&oacute; do Thỏa thuận n&agrave;y hoặc việc sử dụng Ứng dụng n&agrave;y.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Việc thực hiện Thỏa thuận n&agrave;y của ch&uacute;ng t&ocirc;i tu&acirc;n theo luật hiện h&agrave;nh v&agrave; quy tr&igrave;nh ph&aacute;p l&yacute; v&agrave; kh&ocirc;ng c&oacute; điều g&igrave; trong Thỏa thuận n&agrave;y giới hạn quyền của ch&uacute;ng t&ocirc;i trong việc tu&acirc;n thủ c&aacute;c cơ quan thực thi ph&aacute;p luật hoặc c&aacute;c y&ecirc;u cầu hoặc y&ecirc;u cầu của ch&iacute;nh phủ hoặc ph&aacute;p luật kh&aacute;c li&ecirc;n quan đến việc bạn sử dụng Ứng dụng n&agrave;y hoặc th&ocirc;ng tin được cung cấp hoặc thu thập bởi ch&uacute;ng t&ocirc;i đối với việc sử dụng như vậy. Trong phạm vi luật hiện h&agrave;nh cho ph&eacute;p, bạn đồng &yacute; rằng bạn sẽ đưa ra bất kỳ khiếu nại hoặc nguy&ecirc;n nh&acirc;n dẫn đến h&agrave;nh động n&agrave;o ph&aacute;t sinh từ hoặc li&ecirc;n quan đến việc bạn truy cập hoặc sử dụng Ứng dụng n&agrave;y trong v&ograve;ng hai (2) năm kể từ ng&agrave;y ph&aacute;t sinh hoặc t&iacute;ch lũy khiếu nại hoặc h&agrave;nh động đ&oacute; hoặc khiếu nại hoặc nguy&ecirc;n nh&acirc;n h&agrave;nh động như vậy sẽ được từ bỏ một c&aacute;ch kh&ocirc;ng thể hủy ngang.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Nếu bất kỳ phần n&agrave;o của Thỏa thuận n&agrave;y được x&aacute;c định l&agrave; kh&ocirc;ng hợp lệ hoặc kh&ocirc;ng thể thi h&agrave;nh theo luật hiện h&agrave;nh bao gồm nhưng kh&ocirc;ng giới hạn ở những tuy&ecirc;n bố từ chối tr&aacute;ch nhiệm bảo h&agrave;nh v&agrave; giới hạn tr&aacute;ch nhiệm ph&aacute;p l&yacute; n&ecirc;u tr&ecirc;n, th&igrave; điều khoản kh&ocirc;ng hợp lệ hoặc kh&ocirc;ng thể thi h&agrave;nh sẽ được thay thế bằng một điều khoản hợp lệ, c&oacute; thể thực thi ph&ugrave; hợp nhất với &yacute; định của điều khoản ban đầu v&agrave; c&aacute;c điều khoản c&ograve;n lại trong Thỏa thuận n&agrave;y sẽ tiếp tục c&oacute; hiệu lực.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Thỏa thuận n&agrave;y (v&agrave; bất kỳ điều khoản v&agrave; điều kiện n&agrave;o kh&aacute;c được đề cập ở đ&acirc;y) cấu th&agrave;nh to&agrave;n bộ thỏa thuận giữa bạn v&agrave; HoChiMinh City Tourism đối với Ứng dụng n&agrave;y v&agrave; n&oacute; thay thế cho tất cả c&aacute;c th&ocirc;ng tin li&ecirc;n lạc v&agrave; đề xuất trước đ&acirc;y hoặc đương thời, d&ugrave; l&agrave; điện tử, bằng miệng hay bằng văn bản, giữa bạn v&agrave; HoChiMinh Du lịch Th&agrave;nh phố đối với Ứng dụng n&agrave;y. Phi&ecirc;n bản in của Thỏa thuận n&agrave;y v&agrave; của bất kỳ th&ocirc;ng b&aacute;o n&agrave;o được đưa ra dưới dạng điện tử sẽ được chấp nhận trong c&aacute;c thủ tục tố tụng tư ph&aacute;p hoặc h&agrave;nh ch&iacute;nh dựa tr&ecirc;n hoặc li&ecirc;n quan đến Thỏa thuận n&agrave;y ở c&ugrave;ng một mức độ v&agrave; tu&acirc;n theo c&aacute;c điều kiện tương tự như c&aacute;c t&agrave;i liệu v&agrave; hồ sơ kinh doanh kh&aacute;c được tạo v&agrave; duy tr&igrave; ban đầu trong mẫu in.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C&aacute;c Điều khoản v&agrave; Điều kiện n&agrave;y c&oacute; sẵn bằng ng&ocirc;n ngữ của Ứng dụng n&agrave;y. C&aacute;c điều khoản v&agrave; điều kiện cụ thể m&agrave; bạn k&yacute; kết thỏa thuận sẽ kh&ocirc;ng được lưu trữ ri&ecirc;ng bởi HoChiMinh City Tourism.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ứng dụng n&agrave;y kh&ocirc;ng phải l&uacute;c n&agrave;o cũng c&oacute; thể được cập nhật định kỳ hoặc thường xuy&ecirc;n v&agrave; do đ&oacute;, kh&ocirc;ng bắt buộc phải đăng k&yacute; l&agrave;m sản phẩm bi&ecirc;n tập theo bất kỳ luật li&ecirc;n quan n&agrave;o.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">T&ecirc;n hư cấu của c&aacute;c c&ocirc;ng ty, sản phẩm, con người, nh&acirc;n vật v&agrave; / hoặc dữ liệu được đề cập tr&ecirc;n Ứng dụng n&agrave;y kh&ocirc;ng nhằm đại diện cho bất kỳ c&aacute; nh&acirc;n, c&ocirc;ng ty, sản phẩm hoặc sự kiện thực sự n&agrave;o.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Bất kỳ quyền lợi kh&ocirc;ng được c&ocirc;ng nhận ở đ&acirc;y đều được bảo lưu.</span></span></span></p>', '2022-01-22 14:25:04');
INSERT INTO `la_config` (`id`, `name`, `value`, `updated_at`) VALUES
(49, 'ABOUT_US_CONTENT_VI', '<p>Th&agrave;nh phố Hồ Ch&iacute; Minh l&agrave; đ&ocirc; thị trẻ bởi lịch sử h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển chỉ mới hơn 300 năm.&nbsp;Được biết đến nhiều với t&ecirc;n gọi S&agrave;i G&ograve;n, Th&agrave;nh phố s&ocirc;i động n&agrave;y được v&iacute; như&nbsp;<em><strong>&ldquo;H&ograve;n ngọc Viễn Đ&ocirc;ng&rdquo;</strong></em>&nbsp;bởi những c&ocirc;ng tr&igrave;nh kiến tr&uacute;c di sản quyến rũ, kh&ocirc;ng kh&iacute; năng động, s&ocirc;i động, n&aacute;o nhiệt v&agrave; con người th&acirc;n thiện. Đ&acirc;y l&agrave; những đặc điểm gi&uacute;p Th&agrave;nh phố Hồ Ch&iacute; Minh trở th&agrave;nh một điểm đến thu h&uacute;t với du kh&aacute;ch trong nước v&agrave; quốc tế.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sự đa dạng nhiều m&agrave;u sắc, m&ugrave;i hương v&agrave; &acirc;m thanh l&agrave; những n&eacute;t đặc trưng của Th&agrave;nh phố Hồ Ch&iacute; Minh, những đặc điểm n&agrave;y gi&uacute;p Th&agrave;nh phố lu&ocirc;n được xếp hạng một trong những&nbsp;<strong>điểm đến du lịch được y&ecirc;u th&iacute;ch nhất tại Ch&acirc;u &Aacute;</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.visithcmc.vn/uploads/0000/6/2021/08/22/hcmc-tourism-at-a-glance-1.png\" /></p>\r\n\r\n<p>Ẩm thực&nbsp;tại&nbsp;Th&agrave;nh phố&nbsp;chưa bao giờ&nbsp;l&agrave;m du kh&aacute;ch thất vọng. CNN đ&atilde;&nbsp;gọi&nbsp;Th&agrave;nh phố Hồ Ch&iacute; Minh l&agrave;&nbsp;<strong>&quot;Hương vị Việt Nam&quot;</strong>, th&agrave;nh phố&nbsp;lu&ocirc;n&nbsp;khiến du kh&aacute;ch ngạc nhi&ecirc;n với nền ẩm thực đa dạng - từ thi&ecirc;n đường ẩm thực đường phố đến những tiệm b&aacute;nh thơm ngon đầy cảm hứng, ẩm thực Việt Nam ch&iacute;nh thống v&agrave; cả những qu&aacute;n ăn&nbsp;mang phong c&aacute;ch Ch&acirc;u &Aacute; hiện đại.</p>\r\n\r\n<p>Với nhiều trung t&acirc;m mua sắm&nbsp;nổi tiếng, điểm tham quan&nbsp;hấp dẫn, kh&aacute;ch sạn đẳng cấp thế giới v&agrave; cơ sở hạ tầng&nbsp;hiện đại&nbsp;gi&uacute;p Th&agrave;nh phố Hồ Ch&iacute; Minh&nbsp;trở&nbsp;th&agrave;nh điểm đến được y&ecirc;u th&iacute;ch của&nbsp;kh&aacute;ch du lịch&nbsp;tự t&uacute;c, c&aacute;c cặp đ&ocirc;i v&agrave; gia đ&igrave;nh.</p>\r\n\r\n<p>Th&ecirc;m v&agrave;o&nbsp;đ&oacute;, với nhiều&nbsp;lễ hội&nbsp;sắc m&agrave;u&nbsp;v&agrave; c&aacute;c sự kiện đẳng cấp thế giới, th&agrave;nh phố n&agrave;y được&nbsp;<strong>World MICE Awards</strong>&nbsp;c&ocirc;ng nhận l&agrave;&nbsp;<strong>&ldquo;Điểm đến MICE&nbsp;h&agrave;ng đầu&nbsp;ở Ch&acirc;u &Aacute;&rdquo;</strong>&nbsp;(2020).</p>', '2021-12-22 12:46:47'),
(50, 'ABOUT_US_CONTENT_EN', '<h2>About Ho Chi Minh City</h2>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">Known popularly as&nbsp;<strong style=\"box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline\"><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">Saigon</span></span></strong>, this&nbsp;<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">vibrant city</span></span>&nbsp;is&nbsp;<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">described as the&nbsp;<strong style=\"box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline\">&ldquo;Pearl of the Far East&rdquo;</strong></span></span>&nbsp;<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">because of</span></span>&nbsp;charming heritage buildings<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">, d</span></span>ynamic, vibrant, exciting<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">&nbsp;atmosphere and friendly people</span></span>. These are just some of the great qualities that make&nbsp;<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">Ho Chi Minh City</span></span>&nbsp;a dazzling destination for travelers.&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">A riot of colors, scents, and sounds characterize Ho Chi Minh City<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">&nbsp;which makes it&nbsp;</span></span>highly<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">-ranking</span></span>&nbsp;as<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">&nbsp;one of the</span></span>&nbsp;<strong style=\"box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline\">Best Destination<span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">s</span></span>&nbsp;in Asia</strong><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\">.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><img alt=\"\" src=\"https://www.visithcmc.vn/uploads/0000/6/2021/08/22/hcmc-tourism-at-a-glance.png\" style=\"box-sizing:border-box; vertical-align:middle; border-style:none; padding:0px; line-height:1; outline:none; height:auto; border-radius:3rem; width:1038.91px\" /></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\">&nbsp;</p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">Ho Chi Minh City&rsquo;s incredible food has never been short of admirers.&nbsp;CNN named Ho Chi Minh City as&nbsp;<strong style=\"box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline\">&ldquo;Taste of Vietnam&rdquo;</strong>, the city never fails to amaze visitors with its extensive variety of culinary &ndash; from a paradise of street foods to the inspiring and delicious bakery,&nbsp;</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">authentic Vietnamese cuisine&nbsp;</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">and</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;also</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;modern Asian eatery.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">With</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;many dazzling shopping centers, attractions,</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;world-class</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;hotels and&nbsp;</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">excellent</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;infrastructure make it&nbsp;</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">perfect</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">&nbsp;for solo travelers</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">, couples and families.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px\"><span style=\"font-size:15.372px\"><span style=\"box-sizing:border-box\"><span style=\"line-height:1.5 !important\"><span style=\"vertical-align:baseline\"><span style=\"color:#2a2a2a\"><span style=\"font-feature-settings:&quot;palt&quot;\"><span style=\"font-family:Roboto\"><span style=\"white-space:normal\"><span style=\"font-style:normal\"><span style=\"font-variant-ligatures:normal\"><span style=\"font-variant-caps:normal\"><span style=\"font-weight:400\"><span style=\"letter-spacing:normal\"><span style=\"orphans:2\"><span style=\"text-transform:none\"><span style=\"widows:2\"><span style=\"word-spacing:0px\"><span style=\"text-decoration-thickness:initial\"><span style=\"text-decoration-style:initial\"><span style=\"text-decoration-color:initial\"><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">Added with the long list of&nbsp;</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">colorful&nbsp;</span></span></span><span style=\"box-sizing:border-box; padding:0px\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">festivals, celebrations and world-class events, this city&nbsp;</span></span></span><span lang=\"vi\" style=\"box-sizing:border-box; padding:0px\" xml:lang=\"vi\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Roboto\">is recognized as&nbsp;<strong style=\"box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline\">&ldquo;The Best MICE Destination in Asia&rdquo;</strong>&nbsp;by&nbsp;<strong style=\"box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline\">World MICE Awards</strong>.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '2022-01-02 21:28:23'),
(51, 'VISA_CONTENT_EN', '<p>Vietnam offers visa exemptions to travellers from 24&nbsp;countries, and e-Visas to travellers from 80&nbsp;countries. Travellers can also easily apply for a visa on arrival&nbsp;online or in person at a Vietnamese embassy or consulate.&nbsp;Below is all the&nbsp;information you need on visas for&nbsp;Vietnam.&nbsp;</p>\r\n\r\n<hr />\r\n<h4>Vietnam Visa Exemptions</h4>\r\n\r\n<p>Vietnam offers visa exemptions ranging from 14&nbsp;to 90 days to citizens of&nbsp;24&nbsp;countries&nbsp;holding valid ordinary passports. The full list of countries with visa exemptions is below. To view visa exemptions for diplomatic and other&nbsp;passports, please visit&nbsp;<a href=\"https://visa.mofa.gov.vn/Homepage.aspx\" rel=\"noreferrer noopener\" target=\"_blank\">this link.</a></p>\r\n\r\n<p><strong>Notes on visa exemptions:</strong></p>\r\n\r\n<p>- As of Mar. 21, 2020, Vietnam will temporarily suspend visa exemptions&nbsp;for citizens from&nbsp;Belarus, Russia, and Japan.</p>\r\n\r\n<p>- Starting Mar. 8, 2020&nbsp;Vietnam has temporarily suspended visa exemptions for citizens of the European Union, the United Kingdom, and as well as other countries with more than 500 cases or grow more than 50 cases a day.&nbsp;</p>\r\n\r\n<p>- As of Feb. 29, 2020 visa exemptions for South Koreans will be temporarily suspended until further notice, and as&nbsp;of Mar. 2, 2020 visa exemptions for Italians will also be&nbsp;temporarily suspended.</p>\r\n\r\n<p>- The exemptions listed above for&nbsp;Sweden, Norway, Denmark, Belarus, Finland, Japan, South Korea, and Russia are valid until Dec.&nbsp;31, 2022.</p>\r\n\r\n<p>- The exemptions listed above for the United Kingdom, France, Germany, Spain, and Italy are valid until June 30, 2021.</p>\r\n\r\n<p>- Spouses or children of Vietnamese citizens are allowed to stay in the country without a visa for&nbsp;six months and must show&nbsp;papers proving their eligibility. For full requirements,&nbsp;please visit&nbsp;<a href=\"http://mienthithucvk.mofa.gov.vn/en\" rel=\"noreferrer noopener\" target=\"_blank\">this link.</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<h4>Vietnam Visa on Arrival</h4>\r\n\r\n<p>If you are&nbsp;planning a&nbsp;multiple-entry&nbsp;visit&nbsp;or a stay&nbsp;of&nbsp;more than 30 days, you will want to&nbsp;apply for a visa on arrival. To do this you&#39;ll need:</p>\r\n\r\n<p>1. A 4x6 passport photo with a white background and no glasses</p>\r\n\r\n<p>2. A filled-out&nbsp;<a href=\"https://visa.mofa.gov.vn/_layouts/registration/ApplicationForm.aspx\" rel=\"noreferrer noopener\" target=\"_blank\">visa application form</a></p>\r\n\r\n<p>3. A passport or substitute ID valid for six months from the date you plan to enter Vietnam</p>\r\n\r\n<p>4. Payment (25 USD to 50 USD) for&nbsp;visa fees, and</p>\r\n\r\n<p>5. A Letter of Approval from a Vietnamese embassy or consulate (if you are picking up your visa at the airport)</p>\r\n\r\n<p>If you are near a Vietnamese embassy or consulate, you can submit your photo, application form,&nbsp;passport, and visa fee&nbsp;in person.&nbsp;<a href=\"https://visa.mofa.gov.vn/Homepage.aspx\" rel=\"noreferrer noopener\" target=\"_blank\">This website</a>&nbsp;will&nbsp;guide you through the process.&nbsp;</p>\r\n\r\n<p>If you are unable to reach a Vietnamese embassy, or are short on time,&nbsp;there are trusted services online who can provide you a valid Letter of Approval for a fee.&nbsp;Bring this letter and together with a visa application form and your other documents to the Visa on Arrival counter at the airport when you land.&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<hr />\r\n<h4>Vietnam Electronic Visa (e-Visa)&nbsp;</h4>\r\n\r\n<p>Vietnam&#39;s e-Visa is now available to nationals of 80&nbsp;countries:&nbsp;</p>\r\n\r\n<p><em>Andorra, Argentina, Armenia, Australia, Austria, Azerbaijan, Belarus, Belgium, Bosnia and Herzegovina, Brazil, Brunei, Bulgaria, Canada, Colombia, Croatia, Cuba, Cyprus, Czech Republic, Chile, China (including Hong Kong and Macau passports), Denmark, Estonia, Fiji, Finland, France, Georgia, Germany, Greece, Hungary, Iceland, India, Ireland, Italy, Japan, Kazakhstan, Latvia, Liechtenstein, Lithuania, Luxembourg, Macedonia, Malta, Marshall Islands, Mexico, Micronesia, Moldova, Monaco, Montenegro, Mongolia, Myanmar, Nauru, Netherlands, New Zealand, Norway, Palau, Panama, Papua New Guinea, Peru, Poland, Portugal, Philippines, Qatar, Romania, Russia, Salomon Islands, San Marino, Serbia, Slovakia, Slovenia, South Korea, Spain, Sweden, Switzerland, Timor Leste, United Arab Emirates, United Kingdom, United States of America, Uruguay, Vanuatu, Venezuela, and Western Samoa.</em></p>\r\n\r\n<p><a href=\"https://vietnam.travel/plan-your-trip/official-vietnam-evisa-application\">Click here for a full guide on how to apply for Vietnam&#39;s e-Visa.</a></p>\r\n\r\n<p><br />\r\nThe e-Visa takes&nbsp;three working days&nbsp;to process, costs&nbsp;25 USD, and is&nbsp;a&nbsp;single-entry visa,&nbsp;valid for&nbsp;30 days.&nbsp;You can enter Vietnam on an e-Visa at any of the country&#39;s&nbsp;eight international airports,&nbsp;including Hanoi, Ho Chi Minh City and Danang,&nbsp;as well as&nbsp;14 land crossings&nbsp;and seven seaports.&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<hr />\r\n<h3>How to Apply for Vietnam&#39;s e-Visa:</h3>\r\n\r\n<p><strong>Step 1:</strong>&nbsp;Prepare the required materials:&nbsp;</p>\r\n\r\n<p>- One&nbsp;4x6 passport photo in .jpg format with a white background, without glasses</p>\r\n\r\n<p>- &nbsp;One photo in .jpg format of your passport data page</p>\r\n\r\n<p>- &nbsp;Passport valid for at least six months</p>\r\n\r\n<p>- Your temporary address in Vietnam and&nbsp;points of entry and exit&nbsp;</p>\r\n\r\n<p>- Debit or credit card for payment&nbsp;<br />\r\n<strong>Step 2:</strong>&nbsp;Click&nbsp;<a href=\"https://evisa.xuatnhapcanh.gov.vn/en_US/web/guest/khai-thi-thuc-dien-tu/cap-thi-thuc-dien-tu\" rel=\"noreferrer noopener\" target=\"_blank\">this link</a>&nbsp;or access&nbsp;<a href=\"https://www.immigration.gov.vn/\" rel=\"noreferrer noopener\" target=\"_blank\">www.immigration.gov.vn</a>&nbsp;and go to &#39;E-visa Issuance&#39; then click on the link for &#39;Outside Vietnam foreigners&#39;. &nbsp;<br />\r\n<strong>Step 3:&nbsp;</strong>Upload your .jpg images (passport data page and passport photo) and fill out the required fields on the&nbsp;form completely. Submit your form.&nbsp;<br />\r\n<strong>Step 4:&nbsp;</strong>Pay the e-Visa fee of 25 USD.&nbsp;Copy down the document&nbsp;code provided. &nbsp;<br />\r\n<strong>Step 5:&nbsp;</strong>Within three working days you should receive news of your e-Visa application via email. If not, you can also run a search for your e-Visa at&nbsp;<a href=\"https://evisa.xuatnhapcanh.gov.vn/tra-cuu-thi-thuc\" rel=\"noreferrer noopener\" target=\"_blank\">this link</a>.&nbsp;<br />\r\n<strong>Step 6:&nbsp;</strong>Use your document code to locate your e-Visa online. Download&nbsp;and print the e-Visa in two copies for extra safety.&nbsp;</p>', '2021-12-23 15:33:18'),
(52, 'VISA_CONTENT_VI', '<h4>Y&ecirc;u cầu về Visa khi đến Việt Nam</h4>\r\n\r\n<p>Hầu hết người nước ngo&agrave;i muốn đến thăm Việt Nam cần phải xin thị thực nhập cảnh trước. Ngoại lệ duy nhất l&agrave; nếu quốc gia của bạn c&oacute; thỏa thuận l&atilde;nh sự song phương về việc miễn thị thực. Bạn c&oacute; thể kiểm tra tr&ecirc;n trang web của ch&iacute;nh phủ để biết liệu của bạn c&oacute; phải l&agrave; một trong số &iacute;t đăng k&yacute; chương tr&igrave;nh n&agrave;y hay kh&ocirc;ng. Một thay đổi gần đ&acirc;y về ch&iacute;nh s&aacute;ch đ&atilde; cho ph&eacute;p kh&aacute;ch du lịch quốc tế được miễn thị thực 30 ng&agrave;y nếu họ đến đảo Ph&uacute; Quốc bằng đường biển hoặc qua ph&ograve;ng chờ trung chuyển quốc tế tại s&acirc;n bay T&acirc;n Sơn Nhất, th&agrave;nh phố Hồ Ch&iacute; Minh. Thị thực khi đến c&oacute; sẵn th&ocirc;ng qua c&aacute;c c&ocirc;ng ty du lịch kh&aacute;c nhau v&agrave; c&aacute;c dịch vụ thị thực trực tuyến, với một khoản ph&iacute;, sẽ điền v&agrave;o c&aacute;c thủ tục giấy tờ th&iacute;ch hợp cho một thư chấp thuận thị thực. N&oacute; kh&ocirc;ng hẳn l&agrave; &ldquo;visa khi đến&rdquo; nhưng điều n&agrave;y gi&uacute;p bạn dễ d&agrave;ng hơn so với việc gửi hộ chiếu đến cơ quan l&atilde;nh sự hoặc đại sứ qu&aacute;n Việt Nam tại quốc gia của bạn. Điều n&agrave;y chỉ d&agrave;nh cho những người bay v&agrave;o trong nước, v&igrave; vậy nếu bạn nhập cảnh qua đường bi&ecirc;n giới tr&ecirc;n bộ, bạn sẽ phải đăng k&yacute; tại nước sở tại hoặc một trong c&aacute;c quốc gia c&oacute; chung bi&ecirc;n giới với Việt Nam.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<h4>Chi ph&iacute; thị thực như thế n&agrave;o?</h4>\r\n\r\n<p>Thị thực du lịch c&oacute; gi&aacute; trị trong 30 hoặc 90 ng&agrave;y v&agrave; c&oacute; thể nhập cảnh một lần hoặc nhiều lần. Ph&iacute; đ&oacute;ng dấu thay đổi từ 25 đ&ocirc; la Mỹ cho thị thực một th&aacute;ng, đến 50 đ&ocirc; la Mỹ cho thị thực ba th&aacute;ng, nhiều lần. Đối với khoản ph&iacute; &ldquo;dịch vụ nhanh&rdquo; bổ sung, bạn c&oacute; thể bỏ qua thời gian xử l&yacute; th&ocirc;ng thường từ ba đến bốn ng&agrave;y l&agrave;m việc. Kiểm tra với đại sứ qu&aacute;n hoặc l&atilde;nh sự qu&aacute;n Việt Nam tại địa phương của bạn, hoặc với đại l&yacute; du lịch hoặc dịch vụ thị thực trực tuyến.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<h4><br />\r\nT&ocirc;i sẽ được hưởng những tiện &iacute;ch mở rộng g&igrave;?</h4>\r\n\r\n<p>Gia hạn thị thực c&oacute; sẵn với lệ ph&iacute; 10 đ&ocirc; la Mỹ nếu bạn đến trực tiếp văn ph&ograve;ng nhập cư. Tuy nhi&ecirc;n, điều n&agrave;y đ&ograve;i hỏi một số kỹ năng ng&ocirc;n ngữ địa phương v&agrave; một ch&uacute;t ki&ecirc;n nhẫn. Do đ&oacute;, hầu hết kh&aacute;ch du lịch dựa v&agrave;o c&aacute;c đại l&yacute; du lịch để giải quyết c&aacute;c phần mở rộng của họ. Điều n&agrave;y đi k&egrave;m với một khoản ph&iacute; nhưng chắc chắn tiết kiệm thời gian v&agrave; rắc rối. Hầu hết c&aacute;c đại l&yacute; du lịch đều cung cấp dịch vụ n&agrave;y với một khoản ph&iacute; v&agrave; c&oacute; thể mất đến 10 ng&agrave;y để xử l&yacute;. Thời gian gia hạn thị thực của bạn phụ thuộc v&agrave;o thị thực ban đầu của bạn. Bạn chỉ c&oacute; thể gia hạn số tiền bằng với thị thực ban đầu của m&igrave;nh - v&iacute; dụ: thị thực một th&aacute;ng chỉ c&oacute; thể được gia hạn th&ecirc;m một th&aacute;ng.</p>', '2021-12-22 12:45:15'),
(53, 'SAFETY_CONTENT_VI', '<p><strong>C&aacute;c biện ph&aacute;p ph&ograve;ng ngừa về sức khoẻ v&agrave; an to&agrave;n cho kh&aacute;ch du lịch</strong></p>\r\n\r\n<section>\r\n<p>Du kh&aacute;ch ở Việt Nam được khuyến kh&iacute;ch thực hiện c&aacute;c biện ph&aacute;p ph&ograve;ng ngừa hợp l&yacute; đối với COVID-19 trong c&aacute;c chuyến đi.&nbsp;Tổ chức Y tế Thế giới đưa ra những thực h&agrave;nh cơ bản n&agrave;y để giữ an to&agrave;n cho bản th&acirc;n v&agrave; những người th&acirc;n của bạn:</p>\r\n\r\n<p>1. Tr&aacute;nh đi du lịch nếu bạn bị sốt v&agrave; ho. Nếu bạn bị sốt, ho v&agrave; kh&oacute; thở, h&atilde;y th&ocirc;ng b&aacute;o cho c&aacute;c dịch vụ chăm s&oacute;c sức khoẻ v&agrave; chia sẻ với họ về lịch sử du lịch gần đ&acirc;y của bạn.</p>\r\n\r\n<p>2. Duy tr&igrave; gi&atilde;n c&aacute;ch x&atilde; hội. Tr&aacute;nh xa những người kh&aacute;c từ một m&eacute;t trở l&ecirc;n đặc biệt l&agrave; những người đang hắt hơi, hoặc ho, hoặc bị sốt.</p>\r\n\r\n<p>3. Thường xuy&ecirc;n rửa tay bằng x&agrave; ph&ograve;ng v&agrave; v&ograve;i nước. bạn cũng c&oacute; thể sử dụng chất khử tr&ugrave;ng tay chứa cồn để xịt tay thường xuy&ecirc;n nếu muốn.</p>\r\n\r\n<p>4.&nbsp; Che miệng v&agrave; mũi bằng khăn giấy khi ho hoặc hắt hơi. Vứt bỏ khăn giấy bẩn ngay lập tức v&agrave; rửa tay sau khi ho hoặc hắt hơi.</p>\r\n\r\n<p>5.&nbsp; Tr&aacute;nh tiếp x&uacute;c với động vật sống. Rửa tay bằng x&agrave; ph&ograve;ng v&agrave; nước nếu bạn chạm v&agrave;o động vật sống hoặc sản phẩm từ động vật ở chợ.</p>\r\n\r\n<p>6. Chỉ ăn thức ăn đ&atilde; được nấu ch&iacute;n kỹ. Đảm bảo rằng c&aacute;c bữa ăn của bạn đặc biệt l&agrave; protein động vật v&agrave; c&aacute;c sản phẩm từ sữa được nấu ch&iacute;n kỹ v&agrave; chuẩn bị trong một m&ocirc;i trường hợp vệ sinh.</p>\r\n\r\n<p>7. Bỏ khẩu trang sử dụng một lần. Nếu bạn chọn đeo khẩu trang sử dụng một lần, đảm bảo khẩu trang che mũi v&agrave; miệng của bạn, tr&aacute;nh chạm v&agrave;o khẩu trang v&agrave; rửa tay sau khi th&aacute;o khẩu trang.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>C&aacute;c trang web v&agrave; ứng dụng ch&iacute;nh thức về COVID-19 của ch&iacute;nh phủ Việt Nam:&nbsp;</strong></p>\r\n\r\n<p>Kh&aacute;ch du lịch đang t&igrave;m kiếm số liệu thống k&ecirc; cập nhật về COVID-19 c&oacute; thể sử dụng ứng dụng&nbsp;<a href=\"https://coronavirus.app/\" rel=\"noopener\" target=\"_blank\">Coronavirus app</a>.&nbsp;</p>\r\n\r\n<p>Cập nhật từ ch&iacute;nh phủ Việt Nam:&nbsp;<a href=\"https://ncov.moh.gov.vn/\">https://ncov.moh.gov.vn</a></p>\r\n\r\n<p>Cập nhật tin tức từ Du lịch Việt Nam:&nbsp;<a href=\"https://vietnam.travel/media-industry\">https://vietnam.travel/media-industry</a></p>\r\n</section>\r\n\r\n<section>\r\n<figure><img alt=\"\" src=\"https://visithcmc.vn/uploads/0000/6/2021/09/13/screen-shot-2021-09-13-at-150705.png\" style=\"width: 2422px; height: 1476px;\" /></figure>\r\n\r\n<p>&ldquo;Bất kỳ du kh&aacute;ch n&agrave;o gặp phải c&aacute;c triệu chứng của vi r&uacute;t &ndash; như sốt, ho v&agrave; kh&oacute; thở n&ecirc;n gọi ngay cho đường d&acirc;y n&oacute;ng của Bộ Y tế Việt Nam: 1900 3228&rdquo;</p>\r\n</section>', '2021-12-23 13:05:08'),
(54, 'SAFETY_CONTENT_EN', '<p><strong>Health and safety precautions for travellers</strong></p>\r\n\r\n<section>\r\n<p>Visitors in Vietnam are encouraged to take sensible precautions against COVID-19 during their trips.</p>\r\n\r\n<p>The&nbsp;<a href=\"https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public\" rel=\"noreferrer noopener\" target=\"_blank\">World Health Organization</a>&nbsp;outlines these basic practices to keep yourself and your loved ones safe:</p>\r\n\r\n<p>1.&nbsp;Avoid travelling if you have a fever and cough.&nbsp;If you have fever, cough, and difficulty breathing, alert health care services and share with them your recent travel history.</p>\r\n\r\n<p>2.&nbsp;Maintain social distancing.&nbsp;Stay a metre or more away from others, especially those who are sneezing or coughing, or have fever.&nbsp;</p>\r\n\r\n<p>3.&nbsp;Wash your hands regularly with soap and running water.&nbsp;You can also use an alcohol-based hand-sanitizer to spray your hands as often as you like.</p>\r\n\r\n<p>4.&nbsp;Cover your mouth and nose with tissue when you cough or sneeze.&nbsp;Dispose of dirty tissues immediately and wash your hands after coughing or sneezing.&nbsp;</p>\r\n\r\n<p>5.&nbsp;Avoid contact with live animals.&nbsp;Wash your hands with soap and water if you touch live animals or animal products in markets.</p>\r\n\r\n<p>6.&nbsp;Eat only well-cooked food.&nbsp;Make sure your meals especially animal proteins and dairy products are thoroughly cooked and prepared in a sanitary environment.&nbsp;</p>\r\n\r\n<p>7.&nbsp;Discard single-use masks.&nbsp;If you choose to wear a single-use mask, ensure it covers your nose and mouth, avoid touching the mask, and wash your hands after removing it.</p>\r\n\r\n<p><strong>Online trackers and official government sites</strong></p>\r\n\r\n<p>Travellers looking for updated statistics on COVID-19 can use the&nbsp;<a href=\"https://coronavirus.app/\" rel=\"noreferrer noopener\" target=\"_blank\">Coronavirus app</a>.&nbsp;</p>\r\n\r\n<p>Updates from the Vietnamese government:&nbsp;<a href=\"https://ncov.moh.gov.vn/\" rel=\"noreferrer noopener\" target=\"_blank\">https://ncov.moh.gov.vn</a></p>\r\n\r\n<p>News updates from Vietnam Tourism:&nbsp;<a href=\"https://vietnam.travel/media-industry\">https://vietnam.travel/media-industry</a></p>\r\n</section>\r\n\r\n<section><img alt=\"\" src=\"https://visithcmc.vn/uploads/0000/6/2021/09/13/screen-shot-2021-09-13-at-150705.png\" />\r\n<p>&ldquo;Any travellers experiencing symptoms of the virus &mdash; fever, cough and difficulty breathing &mdash; should immediately call Vietnam&rsquo;s health hotline: 19003228&rdquo;</p>\r\n</section>', '2021-12-23 13:04:36'),
(55, 'EMERGENCY_CONTENT_EN', '<p><strong>INTERNATIONAL SOS (24/24h)</strong><br />\r\nAdd: 167A Nam Ky Khoi Nghia, Dist 3<br />\r\nTel: +84 8 38298424<br />\r\nMap view: http://map.google.com<br />\r\nRegional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>\r\n\r\n<p><strong>COLOMBIA ASIA SAIGON (24/24h)</strong><br />\r\nAdd: 167A Nam Ky Khoi Nghia, Dist 3<br />\r\nTel: +84 8 38298424<br />\r\nMap view: http://map.google.com<br />\r\nRegional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>', '2022-01-12 07:23:31'),
(56, 'EMERGENCY_CONTENT_VI', '<p><strong>INTERNATIONAL SOS (24/24h)</strong><br />\r\nAdd: 167A Nam Ky Khoi Nghia, Dist 3<br />\r\nTel: +84 8 38298424<br />\r\nMap view: http://map.google.com<br />\r\nRegional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>\r\n\r\n<p><strong>COLOMBIA ASIA SAIGON (24/24h)</strong><br />\r\nAdd: 167A Nam Ky Khoi Nghia, Dist 3<br />\r\nTel: +84 8 38298424<br />\r\nMap view: http://map.google.com<br />\r\nRegional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>', '2022-01-12 07:24:02');
INSERT INTO `la_config` (`id`, `name`, `value`, `updated_at`) VALUES
(57, 'EMBASSY_CONTENT_VI', '<table style=\"background:white; border-collapse:collapse\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Anh</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">25 đường L&ecirc; Duẩn, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38251380</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://GeneralEnquiries.Vietnam@fco.gov.uk/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">GeneralEnquiries.Vietnam@fco.gov.uk</span></span></span></a></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Ấn Độ</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">5 đường Nguyễn Đ&igrave;nh Chiểu, Phường 6, Quận 3</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38237050</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://cgihcmc@hcm.vnn.vn/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">cgihcmc@hcm.vnn.vn</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Canada</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Ph&ograve;ng 1002 The Metropolitan, 235 đường Đồng Khởi, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38279899</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://HOCHIG@international.gc.ca/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">HOCHIG@international.gc.ca</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Campuchia</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">41 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38292751</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://cambocg@hcm.vnn.vn/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">cambocg@hcm.vnn.vn</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Cuba</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">45 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38297350</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://cubacons@hcm.fpt.vn/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">cubacons@hcm.fpt.vn</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Đức</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Lầu 4, Deustches Haus, 33 L&ecirc; Duẩn, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38291967</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://info@hoch.diplo.de/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">info@hoch.diplo.de</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">H&agrave; Lan</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">29 đường L&ecirc; Duẩn, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38235932</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://hcm@minbuza.nl/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">hcm@minbuza.nl</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">H&agrave;n Quốc</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">107 đường Nguyễn Du, Phường Bến Th&agrave;nh, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38225757</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://hcm02@mofa.go.kr/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">hcm02@mofa.go.kr</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Hoa Kỳ</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">4 đường L&ecirc; Duẩn, phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-35204200</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Hungary</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">22 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-36221001</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://hcm02@mofa.go.kr/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">mission.hcm@mfa.gov.hu</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Indonesia</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">18 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38251888/9</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://hochiminh.kjri@kemlu.go.id/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">hochiminh.kjri@kemlu.go.id</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Kuwait</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">24 đu&ograve;ng Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38270555</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://info@kuwaitconsulate-hochiminh.com/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">info@kuwaitconsulate-hochiminh.com</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">L&agrave;o</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">93 đường Pasteur, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38297667</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://cglaohcm@gmail.com/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">cglaohcm@gmail.com</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Malaysia</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"1\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">109 Nguyễn Văn Hưởng, Phường Thảo Điền, Quận 2</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-38299023, 028-38293132</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://mwhochiminh@kln.gov.my/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">mwhochiminh@kln.gov.my</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\">Nhật bản</td>\r\n			<td colspan=\"1\" rowspan=\"2\">\r\n			<p style=\"text-align: center;\">261 đường Điện Bi&ecirc;n Phủ, Phường 7, Quận 3</p>\r\n\r\n			<p style=\"text-align: center;\">028-39333510</p>\r\n\r\n			<p style=\"text-align: center;\">ryoujikan@vietnam-japan.net</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">Nga</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" rowspan=\"2\">\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">40 B&agrave; Huyện Thanh Quan, Phường 6, Quận 3</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:#212529\">028-39303936</span></span></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\"><span style=\"font-size:13pt\"><span style=\"line-height:normal\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"EN-US\" style=\"color:black\"><a href=\"http://cgrushcm@yandex.ru/\"><span style=\"font-size:11.5pt\"><span style=\"font-family:Roboto\"><span style=\"color:blue\">cgrushcm@yandex.ru</span></span></span></a></span></span></span></span></p>\r\n\r\n			<p align=\"center\" style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '2021-12-23 21:45:30'),
(58, 'EMBASSY_CONTENT_EN', '<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">England</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">25 Le Duan Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38251380</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">GeneralEnquiries.Vietnam@fco.gov.uk</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">India</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">5 Nguyen Dinh Chieu Street, Ward 6, District 3</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38237050</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">cgihcmc@hcm.vnn.vn</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Canada</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Room 1002 The Metropolitan, 235 Dong Khoi Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38279899</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">HOCHIG@international.gc.ca</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Cambodia</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">41 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38292751</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">cambocg@hcm.vnn.vn</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Cuba</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">45 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38297350</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">cubacons@hcm.fpt.vn</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Germany</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4th floor, Deustches Haus, 33 Le Duan, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38291967</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">info@hoch.diplo.de</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Netherlands</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">29 Le Duan Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38235932</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hcm@minbuza.nl</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">South Korea</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">107 Nguyen Du Street, Ben Thanh Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38225757</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hcm02@mofa.go.kr</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">USA</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4 Le Duan Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-35204200</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Hungary</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">22 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-36221001</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">mission.hcm@mfa.gov.hu</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Indonesia</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">18 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38251888/9</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hochiminh.kjri@kemlu.go.id</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Kuwait</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">24 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38270555</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">info@kuwaitconsulate-hochiminh.com</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Laos</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">93 Pasteur Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38297667</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">cglaohcm@gmail.com</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Malaysia</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">109 Nguyen Van Huong, Thao Dien Ward, District 2</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38299023, 028-38293132</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">mwhochiminh@kln.gov.my</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Russia</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">40 Ba Huyen Thanh Quan, Ward 6, District 3</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-39303936</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">cgrushcm@yandex.ru</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Japan</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">261 Dien Bien Phu Street, Ward 7, District 3</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-39333510</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">ryoujikan@vietnam-japan.net</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">New Zealand</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Room 804 The Metropolitan, 235 Dong Khoi Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38226907</span></span></span><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Panama</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">7 Le Thanh Ton Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38250334/38227550</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">panacons@hcm.fpt.vn</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">France</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">27 Nguyen Thi Minh Khai Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-35206800</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">info@consultrance-hcm.org</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Thailand</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">77 Tran Quoc Thao Street, Ward 7, District 3</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-39327637/8</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">thaihome@mfa.go.th</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">China</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">175 Hai Ba Trung Street, Ward 6, District 3</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38221327</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Switzerland</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Floor 37 Bitexco Financial Tower, 2 Hai Trieu, Ben Nghe +84862991200</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hochiminh.vertretung@eda.admin.ch</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Singapore</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">8th floor Saigon Center, 65 Le Loi Street, Ben Nghe Ward, District 1 028-38225174</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">singcg_hcm@mfa.sg</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Australia</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Floor 20 Vincom Center, 47 Ly Tu Trong Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-35218100</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hcmc.vietnam.embassy.gov.au</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Italy</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">10th Floor President Place, 93 Nguyen Du Street, Ben Nghe Ward, District 1</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">028-38275445</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hochiminh.consolato@esteri.it</span></span></span></p>\r\n\r\n<p style=\"text-align:justify; margin-bottom:11px\"><strong><span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Austria</span></span></span></strong><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">12/140 Nguyen Van Huong Street, Thao Dien Ward, District 2</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">08-35193128</span></span></span><br />\r\n<span style=\"font-size:13pt\"><span style=\"line-height:135%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">info@austriaconsulate.vn</span></span></span></p>', '2021-12-23 15:55:42'),
(59, 'THUMB_SIZE_USERS', '{\"width\":250,\"height\":250}', '2020-01-04 17:09:22'),
(60, 'THUMB_SIZE_NEWS', '{\"width\":400,\"height\":600}', '2020-01-04 17:09:22'),
(61, 'THUMB_SIZE_SLIDE', '{\"width\":600,\"height\":400}', '2020-01-04 17:09:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_failed_jobs`
--

CREATE TABLE `la_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_faq`
--

CREATE TABLE `la_faq` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_faq_id` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_faq`
--

INSERT INTO `la_faq` (`id`, `title`, `content`, `category_faq_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How does it work', 'The Stacks series of products: Stacks: Landing Page Kit, Stacks: Portfolio Kit, Stacks: eCommerce Kit. \"Stacks is a production-ready library of stackable content blocks built in React Native. Mix-and-match dozens of responsive elements to quickly configure your favorite landing page layouts or hit the ground running with 10 pre-built templates, all in light or dark mode.\"', 1, 1, '2022-02-17 15:30:02', '2022-02-17 15:30:02'),
(2, 'How to start with Stacks', 'The Stacks series of products: Stacks: Landing Page Kit, Stacks: Portfolio Kit, Stacks: eCommerce Kit. \"Stacks is a production-ready library of stackable content blocks built in React Native. Mix-and-match dozens of responsive elements to quickly configure your favorite landing page layouts or hit the ground running with 10 pre-built templates, all in light or dark mode.\"', 2, 1, '2022-02-18 09:40:56', '2022-02-18 09:40:56'),
(3, 'Dose it suppport Dark Mode', 'The Stacks series of products: Stacks: Landing Page Kit, Stacks: Portfolio Kit, Stacks: eCommerce Kit. \"Stacks is a production-ready library of stackable content blocks built in React Native. Mix-and-match dozens of responsive elements to quickly configure your favorite landing page layouts or hit the ground running with 10 pre-built templates, all in light or dark mode.\"', 1, 1, '2022-02-18 09:41:34', '2022-02-18 09:41:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_follows`
--

CREATE TABLE `la_follows` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_jobs`
--

CREATE TABLE `la_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_language`
--

CREATE TABLE `la_language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lang_code` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_language`
--

INSERT INTO `la_language` (`id`, `name`, `lang_code`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2021-12-15 10:43:53', '2021-12-15 10:43:53'),
(2, 'Tiếng việt', 'vi', '2021-12-15 10:43:53', '2021-12-15 10:43:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_maintain`
--

CREATE TABLE `la_maintain` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1:chuyển hướng',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_maintain`
--

INSERT INTO `la_maintain` (`id`, `users_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 89, 1, '2021-09-30 17:38:18', '2021-11-07 11:48:29'),
(2, 108, 1, '2021-09-30 17:38:18', NULL),
(3, 1, 0, '2021-09-30 17:38:18', '2021-10-06 09:26:00'),
(4, 111, 0, '2021-09-30 17:38:18', '2021-10-06 09:26:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_migrations`
--

CREATE TABLE `la_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `la_migrations`
--

INSERT INTO `la_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2022_01_05_104805_create_jobs_table', 2),
(7, '2022_01_05_110157_create_failed_jobs_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_nft_products`
--

CREATE TABLE `la_nft_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `conversion_usd` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `images` text NOT NULL,
  `stock` int(11) NOT NULL,
  `metadata_json` text DEFAULT NULL,
  `metadate_url` text DEFAULT NULL,
  `royalties` int(11) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `propertie` varchar(255) DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_nft_products`
--

INSERT INTO `la_nft_products` (`id`, `name`, `price`, `conversion_usd`, `status`, `images`, `stock`, `metadata_json`, `metadate_url`, `royalties`, `file_size`, `file_name`, `file_type`, `color`, `propertie`, `categories_id`, `users_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-01-30 15:49:56', '2022-01-30 15:49:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_oauth_access_tokens`
--

CREATE TABLE `la_oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_oauth_access_tokens`
--

INSERT INTO `la_oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('5b079111f6afe00b3f1c5ddda2c989e6aee55c22b54658cbb2bd60321129a35d630f0494f32e63c2', 1, 1, 'App_Tourism', '[]', 0, '2021-12-04 21:15:51', '2021-12-04 21:15:51', '2022-12-04 22:15:51'),
('7aac374a777be7acb9a516712f28c8a24d6052a6924b4e53383d42df1ed3993f23c37a338f4560fa', 1, 1, 'App_Tourism', '[]', 0, '2021-12-04 21:37:24', '2021-12-04 21:37:24', '2022-12-04 22:37:24'),
('8f57c267e63fc3ae17364110785ea4f7092612d87420f0aa0d6010f814f3801fe8f89923c43dfb7c', 3, 1, 'App_Tourism', '[]', 0, '2021-12-04 20:57:34', '2021-12-04 20:57:34', '2022-12-04 21:57:34'),
('a1a8c1d0dab9e6c3023a57258b30ad373665084772b5241fa48edd6f3eef453546f4935c70eff7db', 1, 1, 'App_Tourism', '[]', 0, '2021-12-04 21:37:26', '2021-12-04 21:37:26', '2022-12-04 22:37:26'),
('bd2cc67857e68f05a3d009c5d73641f5af81142903e0d028a27f3142919d66f19ecdad4a7a861876', 1, 1, 'App_Tourism', '[]', 0, '2021-12-04 21:37:25', '2021-12-04 21:37:25', '2022-12-04 22:37:25'),
('e7c4bc00865bb6482a2c34f6dfef8b1dc57f32041382ff31bd897788fcd27a30807f48c8bf93699c', 1, 1, 'App_Tourism', '[]', 0, '2022-01-24 15:56:28', '2022-01-24 15:56:28', '2023-01-24 15:56:28'),
('f1eed1fcf808203cdf93290db7dd8154d8c64984bf5fb57a391f42c7f6731d1ec99ee4672464758f', 1, 1, 'App_Tourism', '[]', 0, '2021-12-04 21:37:25', '2021-12-04 21:37:25', '2022-12-04 22:37:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_oauth_auth_codes`
--

CREATE TABLE `la_oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_oauth_clients`
--

CREATE TABLE `la_oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_oauth_clients`
--

INSERT INTO `la_oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'NiuwwBCi02kWR3FsPYbFbytiYUSkZ0Gb1AvtYuL8', NULL, 'http://localhost', 1, 0, 0, '2021-12-04 20:09:07', '2021-12-04 20:09:07'),
(2, NULL, 'Laravel Password Grant Client', 'JN9DhVqb1eDTxKbXLrrLvFMXYaOg7fl1AdB218k9', 'users', 'http://localhost', 0, 1, 0, '2021-12-04 20:09:07', '2021-12-04 20:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_oauth_personal_access_clients`
--

CREATE TABLE `la_oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_oauth_personal_access_clients`
--

INSERT INTO `la_oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-04 20:09:07', '2021-12-04 20:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_oauth_refresh_tokens`
--

CREATE TABLE `la_oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_permission`
--

CREATE TABLE `la_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Resources - được phép làm gì( tương tác ui)';

--
-- Đang đổ dữ liệu cho bảng `la_permission`
--

INSERT INTO `la_permission` (`id`, `name`, `note`) VALUES
(1, 'Dashboard', 'Xem tổng quan hệ thống, màn hình sau khi đăng nhập'),
(2, 'Sản phẩm', 'Quản lý sảnh phẩm'),
(3, 'Đơn hàng', 'Quản lý đơn hàng'),
(4, 'Blog', 'Quản lý blog, tin tức, bài viết,...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_region`
--

CREATE TABLE `la_region` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tỉnh/Thành phố' ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `la_region`
--

INSERT INTO `la_region` (`id`, `title`) VALUES
(1, 'Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Đà Nẵng'),
(4, 'An Giang'),
(5, 'Bà Rịa - Vũng Tàu'),
(6, 'Bắc Giang'),
(7, 'Bắc Kạn'),
(8, 'Bạc Liêu'),
(9, 'Bắc Ninh'),
(10, 'Bến Tre'),
(11, 'Bình Dương'),
(12, 'Bình Phước'),
(13, 'Bình Thuận'),
(14, 'Bình Định'),
(15, 'Cà Mau'),
(16, 'Cần Thơ'),
(17, 'Cao Bằng'),
(18, 'Gia Lai'),
(19, 'Hà Giang'),
(20, 'Hà Nam'),
(21, 'Hà Tĩnh'),
(22, 'Hải Dương'),
(23, 'Hải Phòng'),
(24, 'Hậu Giang'),
(25, 'Hoà Bình'),
(26, 'Hưng Yên'),
(27, 'Khánh Hòa'),
(28, 'Kiên Giang'),
(29, 'Kon Tum'),
(30, 'Lai Châu'),
(31, 'Lâm Đồng'),
(32, 'Lạng Sơn'),
(33, 'Lào Cai'),
(34, 'Long An'),
(35, 'Nam Định'),
(36, 'Nghệ An'),
(37, 'Ninh Bình'),
(38, 'Ninh Thuận'),
(39, 'Phú Thọ'),
(40, 'Phú Yên'),
(41, 'Quảng Bình'),
(42, 'Quảng Nam'),
(43, 'Quảng Ngãi'),
(44, 'Quảng Ninh'),
(45, 'Quảng Trị'),
(46, 'Sóc Trăng'),
(47, 'Sơn La'),
(48, 'Tây Ninh'),
(49, 'Thái Bình'),
(50, 'Thái Nguyên'),
(51, 'Thanh Hóa'),
(52, 'Thừa Thiên Huế'),
(53, 'Tiền Giang'),
(54, 'Trà Vinh'),
(55, 'Tuyên Quang'),
(56, 'Vĩnh Long'),
(57, 'Vĩnh Phúc'),
(58, 'Yên Bái'),
(59, 'Đắk Lắk'),
(60, 'Đắk Nông'),
(61, 'Điện Biên'),
(62, 'Đồng Nai'),
(63, 'Đồng Tháp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_role`
--

CREATE TABLE `la_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_role`
--

INSERT INTO `la_role` (`id`, `name`, `Note`) VALUES
(1, 'admin', 'Quản lý hệ thống'),
(2, 'dev', 'Toàn bộ hệ thống'),
(3, 'Giám đốc', 'Quản lý hệ thống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_role_permission`
--

CREATE TABLE `la_role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `ClassName` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `adds` int(11) NOT NULL,
  `deletes` int(11) NOT NULL,
  `edits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_role_permission`
--

INSERT INTO `la_role_permission` (`id`, `role_id`, `permission_id`, `ClassName`, `views`, `adds`, `deletes`, `edits`) VALUES
(1, 1, 1, 'Dashboard', 1, 0, 0, 0),
(2, 1, 4, 'Blog', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_users`
--

CREATE TABLE `la_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `devices` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `la_users`
--

INSERT INTO `la_users` (`id`, `email`, `name`, `bio`, `photo`, `banner`, `custom_url`, `website`, `password`, `password_reset`, `email_confirmed`, `remember_token`, `status`, `ip_address`, `location`, `devices`, `created_at`, `updated_at`) VALUES
(1, 'ngodinhluan1@gmail.com', 'Luan Ngo', '', 'a407d1b7-c503-44c3-afcb-7edbaf9d864f-1642347915.png', NULL, NULL, NULL, '$2y$10$W27qUTADqvLIKl/MvxXWieqbALBsGm77TWiP6lULIe0TA6ZXbZtOy', NULL, NULL, NULL, 1, '', NULL, NULL, '2021-12-04 23:46:12', '2022-01-16 22:45:16'),
(19, 'hasonbinh2004@gmail.com', 'Phạm Thanh Sơn', '', NULL, NULL, NULL, NULL, '$2y$10$1vDNnSslfz7uFJB0m/D96.4/ULAW2vS64fLaWmAIqTZzp5HIG3Eb2', NULL, NULL, NULL, 1, '', NULL, NULL, '2022-01-02 19:03:32', '2022-01-02 19:03:32'),
(21, 'yegane7922@vinopub.com', 'Giant', '', NULL, NULL, NULL, NULL, '$2y$10$cSLSME3dUpu1B2zCL6vNOO6FEPF.CGrVvoBwdsvHrD7DqDHULnLbK', NULL, NULL, NULL, 1, '', NULL, NULL, '2022-01-05 16:49:04', '2022-01-05 16:49:04'),
(22, 'hi@quanghuy.info', 'Quang Huy', '', NULL, NULL, NULL, NULL, '$2y$10$46Bz.4TcRsnrxZnxZ4/rJeYXUA04Rc97s96nvEDJum8.w/WDswgc6', NULL, NULL, NULL, 1, '', NULL, NULL, '2022-01-13 13:49:23', '2022-01-13 13:49:23'),
(15, 'account_test@gmail.com', 'Luan', '', NULL, NULL, NULL, NULL, '$2y$10$.gWY0fJMAKXn.WzvXHSQu./mAbVT6UUuF.FKm760N4UmmvHLs1DPG', NULL, NULL, NULL, 1, '', NULL, NULL, '2021-12-22 04:00:01', '2022-01-13 10:40:24'),
(16, 'vugiaquynhnhien@gmail.com', 'Vũ Gia Quỳnh Nhiên', '', NULL, NULL, NULL, NULL, '$2y$10$yYHdHal5ixLYvNbSZo4Q2ON9RsgX7j7e4DLWskYD8stll8W9qY.TC', NULL, NULL, NULL, 1, '', NULL, NULL, '2021-12-23 14:22:42', '2021-12-23 14:22:42'),
(17, 'sontungnguyen1703@gmail.com', 'lê Sơn Tùng', '', NULL, NULL, NULL, NULL, '$2y$10$t0dg52Lx.e/RACHb3k2T/uV6MqqWFvJ90E2RToKp9T1qMxrXZ2bSm', NULL, NULL, NULL, 1, '', NULL, NULL, '2021-12-23 16:41:10', '2021-12-23 16:41:10'),
(18, 'raymond.lv84@gmail.com', 'Raymond', '', NULL, NULL, NULL, NULL, '$2y$10$n0J5B7sXs9TGJH/J8PpOfOtT274NDRFHlL2LpoMC.dvj/7gWj3esW', NULL, NULL, NULL, 1, '', NULL, NULL, '2021-12-29 19:58:04', '2021-12-29 19:58:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_wallets`
--

CREATE TABLE `la_wallets` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `chain` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `la_wallets`
--

INSERT INTO `la_wallets` (`id`, `users_id`, `address`, `chain`, `network`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '0xD06170834c7A7AB6Ed0583d62884dEFeAB23a440', '1', 'ethereum', 1, '2022-02-15 07:29:12', '2022-02-15 07:29:12'),
(2, 1, '0x407d73d8a49eeb85d32cf465507dd71d507100c1', '1000', 'ethermum', NULL, '2022-02-15 10:42:59', '2022-02-15 10:42:59'),
(3, 0, NULL, NULL, NULL, 1, '2022-02-15 17:36:06', '2022-02-15 17:36:06'),
(4, 0, NULL, NULL, NULL, 1, '2022-02-15 17:36:57', '2022-02-15 17:36:57'),
(5, 1, '21424124124124124', '1', '1', 1, '2022-02-15 17:39:26', '2022-02-15 17:39:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_ward`
--

CREATE TABLE `la_ward` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Phường/xã';

--
-- Đang đổ dữ liệu cho bảng `la_ward`
--

INSERT INTO `la_ward` (`id`, `city_id`, `title`, `updated_at`, `created_at`) VALUES
(1, 1, 'Phường Bến Nghé', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(2, 1, '\r\nPhường Bến Thành', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(3, 1, '\r\nPhường Cầu Kho', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(4, 1, '\r\nPhường Cầu Ông Lãnh', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(5, 1, '\r\nPhường Cô Giang', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(6, 1, '\r\nPhường Đa Kao', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(7, 1, '\r\nPhường Nguyễn Cư Trinh', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(8, 1, '\r\nPhường Nguyễn Thái Bình', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(9, 1, '\r\nPhường Phạm Ngũ Lão', '2019-12-20 14:01:18', '2019-12-20 14:01:18'),
(10, 1, '\r\nPhường Tân Định', '2019-12-20 14:01:18', '2019-12-20 14:01:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `la_whishlist`
--

CREATE TABLE `la_whishlist` (
  `id` int(11) NOT NULL,
  `nft_product_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `la_admins`
--
ALTER TABLE `la_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `la_admins_role`
--
ALTER TABLE `la_admins_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_blog`
--
ALTER TABLE `la_blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_blog_category`
--
ALTER TABLE `la_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_categories`
--
ALTER TABLE `la_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_category_faq`
--
ALTER TABLE `la_category_faq`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_city`
--
ALTER TABLE `la_city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_config`
--
ALTER TABLE `la_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_failed_jobs`
--
ALTER TABLE `la_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `la_failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `la_faq`
--
ALTER TABLE `la_faq`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_follows`
--
ALTER TABLE `la_follows`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_jobs`
--
ALTER TABLE `la_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `la_jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `la_language`
--
ALTER TABLE `la_language`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_maintain`
--
ALTER TABLE `la_maintain`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_migrations`
--
ALTER TABLE `la_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_nft_products`
--
ALTER TABLE `la_nft_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_oauth_access_tokens`
--
ALTER TABLE `la_oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `la_oauth_access_tokens_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `la_oauth_auth_codes`
--
ALTER TABLE `la_oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `la_oauth_auth_codes_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `la_oauth_clients`
--
ALTER TABLE `la_oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `la_oauth_clients_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `la_oauth_personal_access_clients`
--
ALTER TABLE `la_oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_oauth_refresh_tokens`
--
ALTER TABLE `la_oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `la_oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Chỉ mục cho bảng `la_permission`
--
ALTER TABLE `la_permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_region`
--
ALTER TABLE `la_region`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_role`
--
ALTER TABLE `la_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_role_permission`
--
ALTER TABLE `la_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_users`
--
ALTER TABLE `la_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `custom_url` (`custom_url`);

--
-- Chỉ mục cho bảng `la_wallets`
--
ALTER TABLE `la_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_ward`
--
ALTER TABLE `la_ward`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `la_whishlist`
--
ALTER TABLE `la_whishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `la_admins`
--
ALTER TABLE `la_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `la_admins_role`
--
ALTER TABLE `la_admins_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `la_blog`
--
ALTER TABLE `la_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `la_blog_category`
--
ALTER TABLE `la_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `la_categories`
--
ALTER TABLE `la_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `la_category_faq`
--
ALTER TABLE `la_category_faq`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `la_city`
--
ALTER TABLE `la_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT cho bảng `la_config`
--
ALTER TABLE `la_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `la_failed_jobs`
--
ALTER TABLE `la_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `la_faq`
--
ALTER TABLE `la_faq`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `la_follows`
--
ALTER TABLE `la_follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `la_jobs`
--
ALTER TABLE `la_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `la_language`
--
ALTER TABLE `la_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `la_maintain`
--
ALTER TABLE `la_maintain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `la_migrations`
--
ALTER TABLE `la_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `la_nft_products`
--
ALTER TABLE `la_nft_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `la_oauth_clients`
--
ALTER TABLE `la_oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `la_oauth_personal_access_clients`
--
ALTER TABLE `la_oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `la_permission`
--
ALTER TABLE `la_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `la_region`
--
ALTER TABLE `la_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `la_role`
--
ALTER TABLE `la_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `la_role_permission`
--
ALTER TABLE `la_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `la_users`
--
ALTER TABLE `la_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `la_wallets`
--
ALTER TABLE `la_wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `la_ward`
--
ALTER TABLE `la_ward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `la_whishlist`
--
ALTER TABLE `la_whishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
