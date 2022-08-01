-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2022 lúc 03:25 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `=order_detail`
--

CREATE TABLE `=order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `=order_detail`
--

INSERT INTO `=order_detail` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 9, 4, 100, '2022-07-19 06:19:42', '2022-07-19 06:19:42'),
(7, 10, 4, 100, '2022-07-19 07:04:28', '2022-07-19 07:04:28'),
(8, 11, 4, 100, '2022-07-19 07:06:30', '2022-07-19 07:06:30'),
(9, 12, 4, 100, '2022-07-19 07:07:06', '2022-07-19 07:07:06'),
(10, 13, 4, 100, '2022-07-19 07:07:23', '2022-07-19 07:07:23'),
(11, 14, 4, 100, '2022-07-19 07:08:05', '2022-07-19 07:08:05'),
(12, 15, 35, 1, '2022-07-19 07:38:56', '2022-07-19 07:38:56'),
(15, 18, 36, 1, '2022-07-19 09:58:26', '2022-07-19 09:58:26'),
(16, 18, 38, 1, '2022-07-19 09:58:26', '2022-07-19 09:58:26'),
(17, 19, 36, 1, '2022-07-19 10:00:53', '2022-07-19 10:00:53'),
(18, 20, 36, 1, '2022-07-19 10:41:15', '2022-07-19 10:41:15'),
(19, 21, 36, 1, '2022-07-19 10:41:54', '2022-07-19 10:41:54'),
(20, 22, 36, 1, '2022-07-19 10:42:27', '2022-07-19 10:42:27'),
(21, 23, 36, 1, '2022-07-19 10:45:01', '2022-07-19 10:45:01'),
(22, 24, 36, 1, '2022-07-19 10:51:31', '2022-07-19 10:51:31'),
(23, 26, 36, 1, '2022-07-19 10:56:08', '2022-07-19 10:56:08'),
(24, 27, 36, 1, '2022-07-19 10:56:33', '2022-07-19 10:56:33'),
(25, 28, 36, 1, '2022-07-19 10:57:10', '2022-07-19 10:57:10'),
(26, 29, 35, 1, '2022-07-19 11:12:36', '2022-07-19 11:12:36'),
(27, 30, 35, 1, '2022-07-19 11:20:26', '2022-07-19 11:20:26'),
(28, 31, 38, 1, '2022-07-19 11:24:50', '2022-07-19 11:24:50'),
(29, 32, 35, 1, '2022-07-19 11:28:04', '2022-07-19 11:28:04'),
(30, 32, 38, 1, '2022-07-19 11:28:04', '2022-07-19 11:28:04'),
(31, 33, 35, 1, '2022-07-19 11:33:52', '2022-07-19 11:33:52'),
(32, 33, 38, 15, '2022-07-19 11:33:52', '2022-07-19 11:33:52'),
(33, 33, 41, 4, '2022-07-19 11:33:52', '2022-07-19 11:33:52'),
(34, 34, 35, 1, '2022-07-19 11:52:37', '2022-07-19 11:52:37'),
(35, 35, 35, 3, '2022-07-19 12:00:34', '2022-07-19 12:00:34'),
(36, 36, 35, 1, '2022-07-19 13:05:44', '2022-07-19 13:05:44'),
(37, 37, 41, 1, '2022-07-19 13:10:14', '2022-07-19 13:10:14'),
(38, 38, 35, 15, '2022-07-19 13:15:24', '2022-07-19 13:15:24'),
(39, 38, 38, 10, '2022-07-19 13:15:24', '2022-07-19 13:15:24'),
(40, 38, 21, 100, '2022-07-19 13:15:24', '2022-07-19 13:15:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `article_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_view_count` int(11) NOT NULL DEFAULT 0,
  `article_status` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`id`, `product_id`, `brand_id`, `category_id`, `employee_id`, `article_title`, `article_thumbnail`, `article_slug`, `article_content`, `article_view_count`, `article_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 1, 10, 'SNSD VÀ “CUỘC XÂM LĂNG” VÀO TỦ QUẦN ÁO CỦA THẾ HỆ 9X', 'snsd.jpg', 'mua-ba-tang-mot', 'Ở thời kỳ hoàng kim, có nhiều lời đồn đoán rằng nhóm nhạc nữ nhà SM sở hữu “bàn tay Midas”, hầu như những giai điệu, vũ đạo hay phong cách thời trang gắn với cái tên So Nyeo Shi Dae đều trở thành “hiện tượng”.\n\nGần đây, thông tin về màn tái hợp của Girls’ Generation đã nhận được sự quan tâm từ đông đảo người hâm mộ và cả những tín đồ của văn hóa đại chúng xứ sở kim chi. Trên tấm bản đồ K-pop muôn hình vạn trạng, nếu thế hệ đầu tiên là những người đặt nền móng, thì thế hệ thứ hai chính là những người đã góp phần đưa làn sóng Hallyu vươn tầm thế giới. Giai đoạn nở rộ này cũng chứng kiến sự ra đời của nhiều cái tên đã trở thành huyền thoại, trong đó không thể không nhắc đến SNSD, một trong những nhóm nhạc thế hệ 2 hiếm hoi còn giữ được sức nóng. Không phải hữu danh vô thực, danh xưng “nhóm nhạc quốc dân” đã gắn liền với Girls’ Generation suốt hơn một thập kỷ qua đều có lý do của nó. Bởi lẽ, hơn cả những thành tựu mà 8 cô nàng đạt được, cái tên “thiếu nữ thời đại” còn là nguồn cảm hứng cho nhiều người trẻ, là “từ điển sống” cho những nhóm nhạc đàn em, và là “bảo chứng” cho chặng đường thanh xuân tươi đẹp của biết bao thiếu niên 9X, đầu 10X.                Ngoài âm nhạc, những bộ cánh mà các cô nàng từng diện trong MV, trên sân khấu hay cả ở sân bay, đều ảnh hưởng mạnh mẽ đến phong cách thời trang của giới trẻ lúc bấy giờ. Đến hiện tại, dù có vô số idol được ra mắt, không ít kỷ lục bị phá vỡ, song di sản mà nhóm nhạc quốc dân xứ Hàn để lại vẫn là sự thật không thể chối cãi.              QUẦN SKINNY MÀU SẮC VÀ LẦN TRỞ LẠI SAU “BÓNG TỐI”\nKhi giai điệu “gây nghiện” của bản hit Gee vang lên trong đầu bạn, chắc hẳn bóng dáng của những chiếc quần skinny đủ màu sắc phối cùng áo thun in slogan cũng đồng thời xuất hiện. Năm 2009, hình ảnh các nữ sinh châu Á diện quần ôm cạp thấp có thể được bắt gặp ở bất kỳ đâu, từ trên đường phố, lớp học thêm đến các quán ăn vặt. Không cần là những item đính kết lấp lánh, cầu kỳ, chính bảng màu “ngọt như kẹo” đã phần nào tượng trưng cho sự tươi trẻ và sành điệu của các thiếu nữ.\nĐỒNG PHỤC THỦY THỦ VÀ HÀNH TRÌNH KHẲNG ĐỊNH “GIẤC MƠ”\nNăm 2010, Genie (Tell Me Your Wish) tạo nên “cơn sốt” bởi vũ điệu đá chân và những bộ đồng phục thủy thủ. Sự kết hợp giữa áo thủy quân và quần short tôn vinh đôi chân dài miên man của các cô gái đã tạo nên một tổng thể vừa mạnh mẽ, vừa gợi cảm. Ý tưởng táo bạo này đã giúp nhóm thu hút được lượng fan nam đáng kể.              ÁO KHOÁC BÓNG CHÀY CỦA NHỮNG “VẬN ĐỘNG VIÊN” CỪ KHÔI\nKhông dừng lại ở đó, trong những năm đỉnh cao của sự nghiệp, các “thiếu nữ thời đại” nhà SM tiếp tục “đốn tim” khán giả khi hóa thân thành những cô nàng cheerleader quyến rũ, tinh nghịch trong MV Oh!. Một trong những điểm thu hút của concept này là màn phối hợp “ăn tiền” giữa chiếc áo khoác bóng chày dáng croptop, quần siêu ngắn và boots cao cổ sành điệu.                          ', 0, 2, NULL, NULL, NULL),
(2, 12, 2, 1, 11, 'Áo sơ mi nam trơn tay dài cao cấp Lados', '', 'bai-viet-demo-tren-8671-luot-xem-cua-tran-van-huynh-duc', '-Chất liệu: vải kate lụa mịn mềm, thấm hút mồ hôi tốt.\n-Co giãn nhẹ, mặc cực thoải mái, ít nhăn\n-Chất vải đẹp, không xù lông, không phai màu\n-Đường may cực tỉ mỉ cực đẹp\n-Có thể mặc đi làm, đi chơi, dễ phối đồ, không kén người mặc\n-Kiểu dáng: Thiết kế theo form rộng vừa,đơn giản , dễ mặc ..Tôn lên được sự trẻ trung năng động cho các bạn nam, kèm vào đó là sự hoạt động thoải mái khi mặc sản phẩm.\n-Hoa lệ, vội vã và náo nhiệt, đó là những sắc màu đã tạo nên nét đặc trưng của Sài Gòn. Nhưng đã bao giờ bạn nghĩ, Sài Gòn cũng có thể đẹp theo một cách rất “thu” với gam màu nâu be trầm ấm, mà đôi khi phải hít thở thật sâu, ngắm nhìn thật kĩ ta mới cảm nhận được.\n– Draftsman chở mùa thu tới Sài Gòn, tìm tòi, khám phá và cảm nhận vị “mùa thu” giữa phố phường vội vã, để làm chất cảm cho những thiết kế của mình. \n-Trendyshop trở lại với SALE CỰC ĐẠI, GIÁ MỀM MẠI – tất cả sản phẩm đều được áp dụng mức giá mềm mại 99K – 199K – 299K trên toàn hệ thống cửa hàng và online. Hãy tận hưởng trọn vẹn niềm vui mua sắm cực đại, và lấp đầy những chiếc túi Blacknoss nhé.\n* Một số sản phẩm áp dụng mức đồng giá 399K – 499K.\n?Thông tin chương trình:\n– Thời gian: 20/11 – 29/11/2020;\n– Áp dụng tất cả sản phẩm;\n– Áp dụng trên toàn hệ thống cửa hàng và website;\n– Áp dụng tích điểm thành viên\n– Không áp dụng cùng lúc với ưu đãi VIP/Diamond, Voucher JUNO, Voucher 100k cho đơn hàng thứ 2 và CTKM khác;\n– Áp dụng chính sách đổi trả 2020;\n?Truy cập ngay website Trendy để mua ngay!', 8672, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(3, NULL, 5, 1, 10, 'Cặp đôi ÁO LEN & JEANS chưa bao giờ làm chị em thất vọng?', '', 'bai-viet-demo-tren-7883-luot-xem-cua-truong-duy', '- Một chiếc áo len kẻ ngang với màu sắc nổi bật mix cùng chân váy denim trẻ trung, năng động\n- Hay một chiếc áo len basic mix cùng quần jeans ống rộng sành điệu.\nBạn lựa chọn cách mix & match nào cho ngày đầu đông?\nTất cả sản phẩm đều được áp dụng mức giá mềm mại 99K – 199K – 299K trên toàn hệ thống cửa hàng và online. Hãy tận hưởng trọn vẹn niềm vui mua sắm cực đại, và lấp đầy những chiếc túi Blacknoss nhé.\n* Một số sản phẩm áp dụng mức đồng giá 399K – 499K.\n?Thông tin chương trình:\n– Thời gian: 20/11 – 29/11/2020;\n– Áp dụng tất cả sản phẩm;\n– Áp dụng trên toàn hệ thống cửa hàng và website;\n– Áp dụng tích điểm thành viên\n– Không áp dụng cùng lúc với ưu đãi VIP/Diamond, Voucher JUNO, Voucher 100k cho đơn hàng thứ 2 và CTKM khác;\n– Áp dụng chính sách đổi trả 2020;\n?Truy cập ngay website Trendy để mua ngay!', 7884, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(4, NULL, 6, 1, 10, 'Bạn lựa chọn cách mix & match nào cho ngày đầu đông?', '', 'bai-viet-demo-tren-3093-luot-xem-cua-truong-duy', 'THÔNG TIN SẢN PHẨM Áo polo Coolmax \n- một trong những dòng sản phẩm chủ đạo dành cho mùa hè tại Việt Nam Thành phần sợi: 95% Coolmax, 5% Spandex Tiết diện sợi dẹt, chạy dọc thên sợi nên áo siêu thoáng khí, hút ẩm tốt và nhanh khô hơn cotton tới 2 lần Vải áo nhẹ mềm mại, khi mặc cho cảm giác khoan khoái, dễ chịu vô cùng Co giãn tốt, bền màu và hạn chế nhăn nhàu trong quá trình sử dụng YODY - Look good. Feel good. \n- Màu sắc: xanh vỏ đỗ, hồng,xanh ngọc, tím than, tím,xanh coban,vàng, trắng \n- Size: XS-S-M-L-XL \n- Thương hiệu: YODY \n- Sản xuất: Việt Nam HƯỚNG DẪN CHỌN SIZE \n- Size XS: 35~38kg - 1m38-1m48 - Size S: 38~45kg - 1m48~1m55 - Size M: 46~53kg - 1m53~1m58 - Size L: 53~57kg - 1m55~1m62 - Size XL: 57~66kg - 1m55~1m66 \nLưu ý: Bảng size chỉ mang tính chất tương đối ƯU ĐIỂM SẢN PHẨM \n- Chất vải mềm, mịn, ít nhăn, thấm hút mồ hôi, thông thoáng. \n- Áo co giãn tốt, luôn giữ được form và bền màu. \n- Dễ phối đồ, sang trọng, lịch sự, trẻ trung, năng động\n-Trendyshop trở lại với SALE CỰC ĐẠI, GIÁ MỀM MẠI – tất cả sản phẩm đều được áp dụng mức giá mềm mại 99K – 199K – 299K trên toàn hệ thống cửa hàng và online. Hãy tận hưởng trọn vẹn niềm vui mua sắm cực đại, và lấp đầy những chiếc túi Blacknoss nhé.\n* Một số sản phẩm áp dụng mức đồng giá 399K – 499K.\n?Thông tin chương trình:\n– Thời gian: 20/11 – 29/11/2020;\n– Áp dụng tất cả sản phẩm;\n– Áp dụng trên toàn hệ thống cửa hàng và website;\n– Áp dụng tích điểm thành viên\n– Không áp dụng cùng lúc với ưu đãi VIP/Diamond, Voucher JUNO, Voucher 100k cho đơn hàng thứ 2 và CTKM khác;\n– Áp dụng chính sách đổi trả 2020;\n?Truy cập ngay website Trendy để mua ngay!', 3094, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(5, 22, 4, 1, 14, 'Quần jean nữ Lưng Cao Julido', '', 'bai-viet-demo-tren-6924-luot-xem-cua-tran-thi-yen-nhi', 'Ngày hội độc thân 11/11 đã đến, các cô gái đừng quên dành một chút thời gian yêu chiều bản thân cùng với chiếc DEAL 50% TOÀN BỘ SẢN PHẨM tại WEBSITE HNOSS nha.\n-Việc phân phối nội dung đến đúng đối tượng giúp mang lại nguồn khách hàng quan tâm đến sản phẩm, dịch vụ của bạn. Từ đó, bạn có thể dựa trên trải nghiệm của người dùng để đánh giá chất lượng nội dung và có những cải tiến website gia tăng hiệu quả.\n-Thông tin chương trình:\n– Ưu đãi 50% OFF tất cả sản phẩm, kể cả những thiết kế mới nhất;\n– Thời gian: duy nhất 11/11/2020;\n– Chỉ áp dụng mua ONLINE tại website;\n– Áp dụng tích điểm thẻ thành viên;\n– Không áp dụng cùng lúc với chương trình khuyến mãi khác;\n– Đổi trả theo chính sách 2020.\n?Truy cập ngay website TrendyShop để mua ngay!', 6925, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(6, 15, 2, 1, 14, '5 cách phối đồ siêu sang cho người mập', '', 'bai-viet-demo-tren-4241-luot-xem-cua-tran-thi-yen-nhi', 'Nàng béo nên thuộc nằm lòng các nguyên tắc cơ bản sau đây khi lựa chọn trang phục để bản thân luôn đẹp và tự tin nhé:\n\nChọn quần áo đúng kích cỡ để khoe đường cong cơ thể thay vì chọn đồ rộng để giấu dáng.\nNên chọn trang phục có họa tiết tối giản, không rườm rà, tối màu.\nChọn áo hoặc váy có cổ chữ V sẽ giúp người trong thon mảnh hơn, nếu là váy nên chọn những chiếc váy dài ngang hoặc qua gối một chút.       Nên phối đồ kèm thắt lưng để định hình dáng, cải thiện những trang phục rộng, giúp cân bằng vóc dáng, lộ rõ đường cong khiến cơ thể mềm mại hơn.\nPhối đồ với giày cao gót sẽ giúp người béo trông cao hơn và gầy hơn.Nàng béo chỉ cần khéo léo chọn cho mình một chiếc váy sơ mi tối màu, kiểu cách đơn giản kết hợp cùng thắt lưng ngang eo chắc chắn sẽ khiến bạn cực kỳ tôn dáng và trông gầy đi.\n\nNhững ngày thời tiết se lạnh, bạn hoàn toàn có thể chọn cho mình một chiếc đầm suông với họa tiết tươi mới, khoác ngoài áo gile có chất liệu denim sẽ khiến bạn trở nên vô cùng trẻ trung và năng động.', 4242, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(7, NULL, 3, 1, 14, 'Áo len nam dài tay phối cổ tròn cao cấp mẫu mới hot trend 2021', '', 'bai-viet-demo-tren-874-luot-xem-cua-tran-thi-yen-nhi', 'Áo len nam cổ tròn là món phụ kiện thời trang đơn giản nhưng không kém phần đẹp, thời trang. Các anh có thể mặc đi làm, đi chơi hay đi dự tiệc lại rất dễ phối đồ dù là với quần vải, quần jean, quần kaki hay với các sản phẩm áo măng tô, áo vest. \nHãy chọn cho mình 1 chiếc áo len cao cấp với tông màu phù hợp nhé Trong thế giới thời trang của phái mạnh chiếc áo len nam luôn chiếm một vị trí quan trọng. Từ những anh chàng bình thường nhất cho tới những ngôi sao hàng đầu, tất cả đều chia sẻ một tình yêu vĩ đại với áo len cổ trụ của mình Áo len nam cổ tròn hợp dáng người, hợp màu sắc làm tăng vẻ đẹp của trang phục bạn mặc và khẳng định ấn tượng của bạn trong mắt người đối diện. \nTuy nhiên, không phải ai cũng biết chọn một chiếc áo len ấm áp thực sự phù hợp với phom cơ thể của mình. Mang tới cho các anh chàng sự thoải mái khi đi dạo phố hoặc hẹn hò bè bạn , chiếc áo len nam cao cấp đã trở thành người bạn không thể thiếu các chàng. \nChúng có sự đa dạng từ kiểu cách tới màu sắc, size…tùy theo nhu cầu của mình mà các chàng lựa chọn một sản phẩm thích hợp. Và nếu bạn cũng đang đi tìm một chiếc áo len nam đẹp thời trang thể thể hiện được cá tính của bản thân một cách rõ nét nhất và đ lạc lối, thì hãy cùng khám phá và cảm nhận trên sản phẩm của MICADO chúng mình nhé THÔNG TIN SẢN PHẨM: - Áo len nam dài tay phối cổ tròn cao cấp mẫu hot 2021 Micado - Thương hiệu: Micado - Chất liệu áo len nam cổ tròn : vải len cotton thiên nhiên mềm mại có bề mặt mềm mịn, thoát mồ hôi giữ ấm.', 875, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(8, 23, 1, 1, 11, 'Bài viết demo trên 2545 lượt xem của Trần Văn Huỳnh Đức', '', 'bai-viet-demo-tren-2545-luot-xem-cua-tran-van-huynh-duc', 'Et error autem consequuntur dolore. Voluptatem est sint ad fugiat facilis. Sit et aut omnis eos fugiat. Hic pariatur illum mollitia esse expedita beatae nisi qui. Unde rerum excepturi non. Dolorum minima ex est quas consequatur aut quidem placeat. Ullam maxime molestias aut et quibusdam dolores perferendis minus. Quisquam in quibusdam velit exercitationem minima aut adipisci aliquid. Quis voluptas sunt ad ullam officia veniam. Optio id animi aliquid placeat voluptatem. Dolorem dolorem maxime voluptatem labore suscipit asperiores expedita consectetur. Atque et quaerat ipsa esse. Omnis quae ipsum ut architecto praesentium. Consectetur quo beatae vitae molestiae. Officia aut rerum qui. Reiciendis aspernatur nam modi libero. Doloremque alias hic voluptatem. Minus libero quis rerum incidunt perspiciatis quos sit. Qui laboriosam non ipsam eum quidem. Adipisci vero laborum soluta quasi. Vitae omnis tempore eos tenetur. Molestiae dolorem consequatur ullam non iure est eius. Similique sed corporis dolorum ad et neque suscipit. Enim culpa dolor consectetur et dolores. Neque incidunt tenetur consequatur modi laboriosam dolorem. Reiciendis nemo est et quaerat harum quia. Vel quis libero sed est. Odit quod quia rem et et. Numquam dolorum at dicta minima aliquid velit. Ullam dolor et in ut nesciunt blanditiis optio atque. Eum eligendi et vel quas magnam. Magnam ad ut quam autem a est inventore. Impedit non asperiores eveniet expedita delectus similique et. Porro molestias aut quia harum doloremque asperiores quo aspernatur. Dolor vitae sed deserunt assumenda et reiciendis velit enim. Aliquam rerum eum enim cumque ullam esse ut. Facere voluptate minima et quas iste illo deleniti. Non cum in magni pariatur quia. Aut qui possimus aut ut fugiat. Nemo molestiae soluta aut voluptas voluptatem nisi esse. Est vel rerum dolores error delectus quo odio. Et reprehenderit at illum. Dolores quia vitae nulla facilis et perferendis et. Soluta perspiciatis quod laborum ut illo id aut.', 2546, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(9, 12, 4, 1, 14, 'Bài viết demo trên 178 lượt xem của Trần Thị Yến Nhi', '', 'bai-viet-demo-tren-178-luot-xem-cua-tran-thi-yen-nhi', 'Et natus est nostrum id autem. Nisi modi sunt aliquam molestias. Qui vel sit vero asperiores veritatis repellat praesentium. Sunt rerum tempore incidunt omnis beatae ducimus. Nam exercitationem iste debitis dolor dolorum nihil et. Et voluptatem in rerum ut magnam suscipit. Ipsam dignissimos quia minus incidunt modi aut sit nam. Praesentium possimus id asperiores blanditiis. Quas qui ut quidem aspernatur aut rerum eum et. Accusamus temporibus dolore iste sapiente. Aut perspiciatis aliquam sint maxime incidunt non dolore. Earum beatae sapiente corrupti corrupti non perferendis corporis. Id est eos numquam. Aut cumque officiis voluptatem nulla rerum aut. Qui exercitationem est dolores eos sequi. Molestiae iste placeat dolor. Sed non eveniet consequuntur. Maiores quas ad et quis aspernatur ut. Recusandae aut cum enim consequuntur eos est in. Non cumque reprehenderit fuga exercitationem enim quia beatae numquam. Soluta qui ut numquam eaque. Excepturi veritatis dolorem non ipsa. Deleniti ducimus beatae corrupti tempore fugit quod. Numquam architecto quo ipsum molestias necessitatibus ipsa. Nemo aut voluptatem enim cupiditate vel. Aut necessitatibus eum illo aut ratione velit amet. Maxime quis quibusdam earum numquam perspiciatis alias. Praesentium ipsum rerum aut praesentium nihil quia. Veniam ut sit provident iste quia sint animi. Distinctio quia asperiores mollitia ullam et. Quidem dolorem rem et voluptatum. Cum quo perferendis distinctio hic officia qui. Qui consequuntur molestias vel eveniet. Minima praesentium dignissimos perspiciatis. Ipsam explicabo excepturi sapiente id maxime. Sed atque voluptatem qui quia. Et et at dolores ea necessitatibus ut. Aut assumenda quaerat aperiam a excepturi nostrum doloremque. Minus modi excepturi aut. Non sint velit quaerat ut temporibus. Perferendis quibusdam velit reiciendis repellendus ducimus. Sunt unde numquam quos odit.', 179, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(10, 17, 3, 2, 14, 'Bài viết demo trên 5461 lượt xem của Trần Thị Yến Nhi', '', 'bai-viet-demo-tren-5461-luot-xem-cua-tran-thi-yen-nhi', 'Ea aliquid maiores consequatur saepe voluptas incidunt itaque. Ut laborum sunt unde labore molestiae. Sint ratione illum quos quas consequuntur blanditiis. Quam labore sapiente voluptas et quae. Maxime labore ut necessitatibus quaerat dolorem. Ut sint et eveniet eveniet similique ipsam. Numquam a omnis possimus aut. Nesciunt atque culpa optio nisi maxime ea consequuntur. Et illo at aspernatur nihil omnis quis quibusdam. Accusamus porro natus quo eum eaque dolor eos velit. Eos tempora quia ea qui commodi consequatur omnis. Harum necessitatibus quae tenetur qui saepe unde provident. Labore quas necessitatibus sed aut voluptate dignissimos. Debitis a unde nihil quaerat assumenda ut molestiae. Sequi autem nam incidunt dolores ipsum qui. Nihil iste sint est quasi dolor. Voluptate necessitatibus excepturi repellat ea inventore qui. Hic fuga accusamus quia velit aut eos autem. Soluta soluta blanditiis ipsum qui sunt vitae. Ut enim at nam quis. Nemo dolore libero cupiditate eum reiciendis quaerat laborum consequuntur. Fuga impedit ut optio aperiam ducimus. Nesciunt explicabo officiis delectus architecto aut. Fugiat temporibus pariatur ut. Voluptas omnis ab voluptatem et nisi alias. Dolores voluptatum iusto unde reprehenderit doloremque nemo culpa. Nihil quibusdam voluptatem et non quasi non natus. Quia molestiae voluptates non eum alias consequuntur voluptas. Rerum facere porro molestiae atque. Fuga quia sapiente molestiae asperiores ex. Praesentium doloribus officia quos tempora. Et error soluta fugit consequatur ipsum quo qui. Aut est ea ea rerum earum. Ex porro est voluptatem optio non et. Adipisci ipsum vel nihil voluptatem. Recusandae doloribus natus voluptatem molestiae maxime in illo. Temporibus non voluptatem quam est facere saepe. Ipsam sit ex est dicta. Rem ex aliquam esse asperiores.', 5462, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(11, NULL, 6, 2, 14, 'Bài viết demo trên 7355 lượt xem của Trần Thị Yến Nhi', '', 'bai-viet-demo-tren-7355-luot-xem-cua-tran-thi-yen-nhi', 'Laboriosam doloremque omnis commodi ut et vitae impedit. A error consequatur nostrum non iusto dolor. Provident illum aspernatur amet. Et eum dolor esse porro maxime deleniti aut enim. Dolorem et veritatis impedit expedita dolorem est eligendi maiores. Soluta a dolor dolorum adipisci ex provident. Soluta aperiam libero accusamus nobis sit enim dolor. Error ea est atque tenetur recusandae hic rerum. Saepe ab ut ut id. Qui minima iusto porro quo labore. Harum excepturi consequatur aut dignissimos iste ut architecto voluptas. Et ratione eum facere ut distinctio. Sit assumenda vitae nulla. A dolor odio quam aperiam fugit quos perspiciatis. Necessitatibus nihil ut et accusamus. Nostrum voluptatem asperiores omnis quasi ut reiciendis delectus. Sunt quaerat tempora et deserunt rerum perferendis et. Quibusdam voluptate officiis tempora rem. Enim beatae et aut voluptate eos nihil accusantium exercitationem. Illo consequatur a rerum dolores ut dolorem. Ad blanditiis laborum rerum dolore dolores aut quia. Omnis et facilis maxime voluptas porro aut voluptatem. Temporibus repudiandae atque rerum. Est dolorem consequuntur rerum ipsam. Sed iusto cum non in maxime nihil optio. Optio perferendis est ratione illum et. Vero tempore et omnis inventore qui officiis culpa. Dolorem ut consequatur molestias quas et. Accusamus iste neque dolor. Voluptatem officiis sequi consequatur. Occaecati deleniti veniam voluptate et qui. Nostrum sequi dolorem rerum iure. Saepe excepturi omnis nam nulla qui. Libero blanditiis sint sapiente est tempora. Voluptatem voluptas in nostrum neque. Eaque exercitationem totam et deleniti et. Nostrum deleniti ea ducimus molestias est. Nihil corrupti est doloremque alias minus qui aliquam. Occaecati ea alias laudantium ea deserunt porro. Repudiandae necessitatibus quam fugiat beatae. Blanditiis ducimus aut qui autem dolorem laudantium. Sint voluptatem id dolorem non omnis.', 7356, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(12, 12, 5, 4, 10, 'Bài viết demo trên 5642 lượt xem của TRƯỜNG DUY', '', 'bai-viet-demo-tren-5642-luot-xem-cua-truong-duy', 'Phong cách thời trang thanh lịch có phải là yếu tố ảnh hưởng đến thành công của bạn hay không? Câu trả lời đã được chứng minh qua các thí nghiệm tâm lý. \n\nCó một sự thật là phong cách thời trang công sở có ảnh hưởng đến khả năng đạt được thành công của bạn. Mọi người thường đánh giá người khác thông qua vẻ bề ngoài, cụ thể là cách ăn mặc. Do đó, quần áo có tầm ảnh hưởng đáng kể đến cách người khác cảm nhận và cả cách họ đối xử với bạn.                 Chúng ta không thể đánh giá chất lượng công việc nếu chỉ dựa vào vẻ bề ngoài. Tuy nhiên, trên thực tế, người ta thường dựa vào yếu tố này để nhận định, một cách khái quát, năng lực hay địa vị của ai đó. Thời trang có sức ảnh hưởng mạnh mẽ đến người đối diện về nhận thức, làm thay đổi hành vi ứng xử của họ với bạn.              Lauren Messiah, stylist cá nhân nổi tiếng và hiện đang điều hành một doanh nghiệp thời trang riêng, chia sẻ: “Tôi vẫn nhớ đó là ngày tôi đến gặp đối tác để trao đổi công việc. Điều bất ngờ là họ nhất quyết đòi gặp cấp trên vì nhầm lẫn tôi là trợ lý nên không đủ thẩm quyền thảo thuận các điều khoản hợp đồng. Từ hôm đó, tôi đã lập tức bổ sung vào tủ quần áo của mình những bộ trang phục theo phong cách thanh lịch, sang trọng như đồ vest, đầm sơmi… Dù tôi là người yêu phong cách thời trang đường phố sành điệu, phóng khoáng và năng động nhưng không thể phủ nhận rằng bản thân nên thay đổi để phù hợp với từng hoàn cảnh, môi trường làm việc khác nhau. Thời trang không chỉ là những gì bạn thấy trên các sàn diễn mà còn là đời sống xung quanh chúng ta”.      Trên thực tế, phong cách thời trang có sức thao túng trực giác và tâm lý của bạn. Thuật ngữ tâm lý mô tả sự ảnh hưởng của phong cách thời trang đến quá trình chuyển biến tâm lý của người mặc được gọi là “nhận thức bị che khuất”.\n\nTheo kết quả nghiên cứu trên nhóm nhân viên văn phòng của các nhà khoa học thuộc hai trường đại học Columbia và đại học California, khi được mặc những bộ âu phục trang trọng, thanh lịch, nhóm đối tượng có xu hướng gia tăng năng lực tư duy trừu tượng. Đây là khía cạnh hết sức quan trọng trong sáng tạo, định hướng kế hoạch dài hạn và  kiểm soát tình hình công việc.Thí nghiệm của tạp chí Thí nghiệm Tâm lý học Tổng quát cũng cho thấy, nhóm phong cách lịch lãm sẽ gặt hái được thành công hơn vì họ tỏ ra quyết liệt, nhiều động thái thương thuyết hơn. Trái lại, nhóm phong cách đơn giản thường tỏ ra kém cạnh tranh, dễ buông xuôi.\n\nPhong cách thời trang không đơn giản chỉ là “quần áo”, chúng là biểu tượng thể hiện bạn là ai và bạn có thể làm những gì. Phong cách thời trang là công cụ làm cho người khác có cái nhìn tích cực về bạn, từ đó, hỗ trợ cho công việc hàng ngày cũng như sự thăng tiến trong sự nghiệp.                             ', 5643, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(13, 23, 1, 7, 14, 'PHONG CÁCH THỜI TRANG THANH LỊCH SẼ GIÚP BẠN THÀNH CÔNG HƠN TRONG SỰ NGHIỆP?', 'phong-cach-thanh-lich.jpg', 'bai-viet-demo-tren-3819-luot-xem-cua-tran-thi-yen-nhi', 'Quidem ducimus voluptas cum perspiciatis similique ipsum. Non sint inventore consectetur laudantium nulla. Et at qui commodi rerum aut. Laudantium fugiat magnam suscipit aliquam. Saepe et qui voluptate voluptatem et voluptatibus. Magni dolore rerum mollitia non aut consequatur itaque. Nesciunt consectetur officia repudiandae quasi. Harum sit et natus harum delectus eum. Voluptates omnis tempore itaque repellendus qui vitae. Dolorem est et voluptas qui labore. Veniam est sed quos non ut vel qui. Qui dolores itaque quaerat sed velit quia debitis cupiditate. Enim dolorem rerum nostrum voluptates voluptatibus odit laborum est. Ut et veniam omnis inventore consequatur est. Nemo cupiditate expedita quia ipsum. Animi adipisci ut aliquid. Minus labore amet deserunt. Optio est voluptas molestiae ea. Nam in fuga est dicta. Asperiores eius quia iure nobis. Et ipsam a nulla ratione doloribus omnis corporis. Adipisci officia enim voluptatem alias omnis velit vel qui. Enim neque incidunt et et ea. Sed voluptatibus ipsa amet veritatis blanditiis. Modi sed possimus reprehenderit omnis veritatis fugiat fuga corporis. Aspernatur illo autem modi blanditiis cum non ut doloremque. Enim sunt accusamus pariatur eum vero recusandae aliquam. Consectetur magni unde ratione et. Nihil amet exercitationem totam doloremque. Aliquid esse ratione unde. Tempore et iure et ullam dolores ex. Eius numquam omnis dolor esse similique. Recusandae perspiciatis doloremque eligendi voluptas. Dolores atque dolor tenetur voluptate. Esse maxime deleniti sit tempora voluptatibus non omnis. Consequatur quo est dolore voluptate. Corrupti reiciendis dignissimos odio rerum fuga. Aut nihil atque qui voluptatem sequi aut et aliquam. Est repellat quae delectus est illo facilis error repudiandae. Ipsum eos quas vitae rerum et error fugiat perferendis. Molestias suscipit debitis autem quibusdam. Veritatis doloremque non dolores omnis amet beatae.', 3820, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(14, 22, 4, 6, 14, 'CÁC CÔ GÁI ĐÃ “NẰM LÒNG” NHỮNG BÍ QUYẾT MẶC ĐẸP PHÙ HỢP CHO TỪNG DÁNG NGƯỜI CHƯA?', 'bi-quyet-mac-dep.jpg', 'bai-viet-demo-tren-8444-luot-xem-cua-tran-thi-yen-nhi', 'Không phải ai cũng có vóc dáng giống nhau nên việc mặc thế nào cho phù hợp với cơ thể, giúp che đi khuyết điểm, tôn lên ưu điểm là vấn đề được phái đẹp hết sức quan tâm.\n\nVậy làm sao để chọn trang phục phù hợp nhất cho bản thân? Bí quyết mặc đẹp đầu tiên, quan trọng nhất là bạn phải biết được mình thuộc vào dáng người nào và khéo léo sử dụng tốt những ưu điểm của bản thân và che đi khuyết điểm, khi đó thời trang sẽ hoàn toàn được bạn kiểm soát để tạo nên những phối đồ ăn ý nhất.                        Hãy nhìn vào những đường cong trên cơ thể, bạn sẽ biết được mình thuộc vào dáng người nào. Thông thường đối với người trưởng thành, hình dáng cơ thể sẽ chia theo 4 loại cơ bản nhất:\n\nDáng quả táo: Thân trên thường lớn hơn thân dưới. Có 14% phụ nữ trên thế giới sở hữu vòng 1 lớn hơn phần hông. Dễ nhận thấy nhất ở những người có dáng quả táo là cánh tay thường nhỏ nhưng vai rộng, trọng lượng hầu hết nằm ở phần ngực, và phía trên cơ thể.                      Dáng quả lê: Những người có thân hình đối nghịch với dáng quả táo là những người sở hữu dáng người quả lê. Trọng lượng dồn xuống thân dưới, từ hông trở xuống, trong khi phần trên nhỏ nhắn hơn, vai hẹp hơn. Đây là dáng người lý tưởng cho việc tập luyện squat để tăng sự chú ý vào phần mông, đùi khi chúng trở nên quyến rũ và săn chắc. Khoảng trên 20% phụ nữ sở hữu dáng người này.         Dáng chữ nhật: Có khoảng 46% phụ nữ có thân hình chữ nhật. Những người này thường có vòng eo tương đối ngang bằng với hông và ngực. Nếu bạn sở hữu dáng chữ nhật, bạn sẽ không có những đường cong rõ ràng như quả lê hay quả táo nếu không tập luyện.                    Dáng đồng hồ cát: Đây là dáng người ít phổ biến nhất và đang trở thành hình mẫu lý tưởng để phụ nữ đạt được. Vòng eo nhỏ, hông và ngực nở. Nếu bạn sở hữu thân hình đồng hồ cát, xin chúc mừng, bạn thuộc vào thiểu số phụ nữ “may mắn” rồi đó.                   Không có dáng người nào “xấu nhất” hay “đẹp nhất”. Đừng tự ti nếu bạn không sở hữu dáng người mà mình mong muốn. Có rất nhiều cách để khiến bạn đẹp nhất theo từng loại cơ thể, và dưới đây là một số gợi ý của ELLE:\n\nNếu bạn sở hữu dáng người quả táo:\n\nBạn hãy chia cơ thể làm 3 phần từ trên xuống sau đó tập trung sự chú ý vào phần thứ nhất và thứ 3. Sơmi, áo blouse, hoặc đầm chữ A là sự lựa chọn của bạn.                   Nếu bạn sở hữu dáng người quả lê:\n\nBí quyết mặc đẹp cho những người thuộc dáng quả lê là tập trung tạo sự chú ý ở phần trên cơ thể để giảm sự tập trung vào phần thân dưới.\n\nNếu bạn sở hữu dáng người chữ nhật:\n\nThường những người có dáng chữ nhật sẽ có thân hình mỏng, và ít đường cong. Vì vậy, bí quyết mặc đẹp cho hình dáng này là hãy ưu tiên những món quần áo tạo được đường cong cơ thể hết mức có thể. Mách nhỏ cho bạn là hãy nhấn vào phần hông bằng cách sử dụng đai, thắt lưng để tạo cảm giác bạn có một vòng eo nhỏ nhắn hơn.                       Các cô gái nên chọn những item có họa tiết in tràn, hoặc điểm nhấn họa tiết lớn. Ví dụ như một chiếc đầm có hình in lớn, thêm vào đó, tập trung nhiều vào tóc và make up để tăng thêm độ nữ tính, vì dáng chữ nhật thường nghiêng về “nam tính”, giống như hầu hết thân hình của phái mạnh.                     Nếu bạn không thích sự yểu điệu, hãy thử phong cách menswear. Một lợi thế cho thân hình chữ nhật là vô cùng phù hợp với phong cách này. Quần cạp cao, ống rộng và áo quá khổ, hoặc những món đồ mang hơi hướng thể thao khỏe khoắn sẽ là ý kiến hay.                                                                                                                                          ', 8445, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(15, 15, 1, 4, 9, 'TÌM KIẾM QUẦN JEANS HOÀN HẢO, ĐÂY LÀ 5 QUY TẮC “NẰM LÒNG” BẠN NÊN NHỚ', 'cach-chon-quan-jeans.jpg', 'bai-viet-demo-tren-1806-luot-xem-cua-nguyen-truong-vi', 'Lựa chọn quần jeans vừa tôn dáng vừa tạo cảm giác thoải mái không còn là bài toán khó với những 5 gợi ý hữu ích.\n\nNhờ độ bền và tính ứng dụng cao, những chiếc quần jeans chưa bao giờ “vắng bóng” trong tủ đồ thời trang của các cô nàng sành điệu. Tùy vào vóc dáng và đặc trưng hình thể, mỗi cô gái sẽ phù hợp với một kiểu quần jeans khác nhau. Để giúp bạn tìm được chiếc quần hoàn hảo, hãy cùng ELLE khám phá các bí quyết chọn quần chuẩn dáng được nhiều fashionista ứng dụng.                         Nguyên tắc “nằm lòng” đầu tiên mà bất kỳ cô gái nào cũng cần ghi nhớ chính là hiểu rõ bản thân. Bên cạnh sở thích và phong cách cá nhân, bạn cần nắm được các số đo hình thể và đặc trưng vóc dáng của mình. Để tôn lên những lợi thế và giấu đi nhược điểm trên cơ thể, bạn cần lựa chọn thiết kế quần jeans tương ứng với dáng người.                      Thông thường, hình dáng cơ thể sẽ được chia thành nhiều loại, từ đồng hồ cát, quả táo, quả lê, chữ nhật, nhỏ nhắn cho đến tam giác ngược, tam giác. Nhìn vào những đường cong cơ thể, bạn sẽ biết được mình thuộc dáng người nào.                     Tùy thuộc vào dáng người, các cô nàng sẽ có những lựa chọn quần jeans khác nhau. Nếu bạn sở hữu dáng người chữ nhật (vòng eo tương đối ngang bằng với hông và ngực), jeans cạp cao và cạp lỡ sẽ là thiết kế hoàn hảo. Bên cạnh đó, skinny jeans và jeans ống đứng cũng là những phương án tối ưu dành cho bạn.\n\nVới đặc điểm vai rộng, hông nhỏ và đôi chân thon, những cô nàng có dáng người tam giác ngược rất dễ chọn quần jeans. Jeans ống đứng, jeans ống rộng, jeans cạp cao và quần boyfriend sẽ giúp bạn “cân bằng” các đường cong trên cơ thể.                      Quần jeans ống đứng sẽ phù hợp với những cô nàng có thân hình quả táo. Đối nghịch với dáng quả táo là thân hình quả lê. Với đặc điểm thân trên nhỏ nhắn và trọng lượng dồn xuống thân dưới, boot-cut jeans (kiểu quần bó ở phần trên nhưng hơi loe ở ống) sẽ giúp bạn làm “thon gọn” vòng 3. Bên cạnh đó, lựa chọn jeans tối màu cũng là giải pháp tốt cho các cô nàng sở hữu thân hình quả lê.                       Nếu bạn có dáng người nhỏ nhắn, thấp bé (petite), cropped jeans (quần jeans có phần gấu được cắt ngắn hơn), jeans dáng baggy và quần boyfriend là thiết kế sinh ra dành cho bạn. Bên cạnh đó, bạn cũng nên hạn chế diện skinny jeans bởi chúng sẽ phô diễn các nhược điểm trên cơ thể bạn nhiều hơn.                                                                                                             ', 1807, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(16, NULL, 1, 4, 10, 'KHÔNG BỊ TỤT LẠI VỚI 6 XU HƯỚNG DENIM XUÂN-HÈ ĐƯỢC CÁC “ÔNG LỚN” LĂNG XÊ', 'demin.jpg', 'bai-viet-demo-tren-9204-luot-xem-cua-truong-duy', 'Cập nhật tủ đồ mùa mới với những món đồ denim sành điệu, ứng biến nhiều phong cách và sẽ đồng hành cùng bạn trên hành trình mặc đẹp năm nay. \n\nChỉ riêng chất liệu denim sẽ không bao giờ lỗi mốt nhưng mỗi mùa qua đi, các xu hướng mới vẫn khiến bạn phải tìm kiếm cho mình những thiết kế hợp thời hơn. Đường băng mùa Xuân-Hè năm nay đem tới hàng loạt những phom dáng “buông thả”, trang trí phức tạp, bảng màu trầm lại và hơn hết là tuyên ngôn của “denim on denim”.            Cuộc gặp gỡ giữa các vẻ đẹp trường tồn của thời trang đã được hiện thực trên những chiếc túi xách biểu tượng của Louis Vuitton. Từ chiếc túi tote Onthego đến Speedy, Loop và Dauphine, các thiết kế di sản của nhà mốt nước Pháp giờ đây đều khoác lên mình Monogram Jacquard Denim. Chất liệu có xuất thân bình dân trở nên thật sang trọng còn những thiết kế có tuổi đời hàng chục năm bỗng trẻ hóa lại theo làn gió phong trần mang tên denim. \n\nThiết kế quần phai màu của thập niên 90 có lẽ đã “làm mưa làm gió” trong một thời kỳ dài, nhưng năm 2022 này, cuộc chơi thuộc về những bảng màu màu tối, đậm và cũng “ngầu” hơn. Các tín đồ thời trang đón nhận quần jeans sẫm màu như một người bạn bí ẩn, sang trọng và cổ điển. Từ Gucci, Dior đến Saint Laurent,… rất nhiều nhà mốt lớn đang trải thảm cho sự trở lại xu hướng này. Màu xanh đen, navy, xám đen,… sẽ là “trợ thủ” đáng tin cậy để làm nổi bật sự vui tươi của những món phụ kiện màu neon mà ai cũng thích thú vào mùa Xuân-Hè.                   Hy vọng về sự trở lại của quần jeans skinny có lẽ là thật viển vông vào thời đại này vì sự thống trị của những phom dáng rộng rãi sẽ chỉ ngày càng bành trướng hơn. Như đã dự đoán trước từ làn sóng Y2K, mùa này, thiết kế cạp trễ sẽ đứng cùng những chiếc quần ống suông và baggy thùng thình. Không chỉ những thương hiệu trẻ như Missoni, Molly Goddard, MSGM,… những nhà mốt lâu đời như Valentino, Dolce&Gabbana,… cũng trở nên phóng khoáng hơn với các xu hướng tuổi teen. Tuy nhiên, có rất nhiều mức độ “trễ” mà bạn có thể lựa chọn, những chiếc quần khoe trọn phần xương hông hay chỉ một nửa đều hợp lệ.                     Sự rung cảm với các trào lưu thập niên 90 và những năm 2000 tiếp tục đưa váy midi denim trở lại thời hoàng kim. Tuy chân váy dáng dài vẫn luôn được xem là một đại diện không thể thiếu của thời trang Thu-Đông, năm nay, chiếc chân váy denim vững vàng trụ lại mùa Xuân-Hè với nguồn cảm hứng từ những bộ phim rom-com thời thơ ấu. Kết luận cho xu hướng năm nay sẽ là lời khẳng định về chiều dài, hoặc cực ngắn như chân váy mini, hoặc ít nhất sẽ dài quá đầu gối. Tuy chúng ta chẳng thể nào lả lướt với chất liệu denim cứng cáp, “cô gái denim” cũng đã trở nên nữ tính hơn rất nhiều.   Cuộc diễu hành denim nhộn nhịp và đông đúc hơn với sự gia nhập của những bản phối “nguyên cây” denim. Trong quá khứ, khởi đầu của phong cách denim on denim là những bộ đồ Canadian tuxedo (quần jeans cộng áo khoác hoặc sơmi denim) xuất hiện cùng ca sĩ huyền thoại người Mỹ – Bing Crosby vào năm 1951. Nó thực sự trở thành trào lưu thời trang nổi bật những năm 2000 nhờ hình ảnh của Britney Spears và Justin Timberlake tại American Music Awards 2001. Không chỉ là những nét chấm phá phụ họa hay đồng hành cùng các chất liệu khác, tại những sàn diễn của Saint Laurent, Balenciaga, Blumarien,… denim được trao tặng sân khấu riêng để phô diễn ma lực trên cả set đồ. Trong đó, sự kết hợp của áo crop top cùng quần cạp trễ sẽ là con đường nhanh nhất để chinh phục phong cách Y2K.         Cách đơn giản để khiến mọi thiết kế trở nên thú vị hơn chính là những hình họa bắt mắt. Những họa tiết động vật, hoa hay stickers sẽ thổi một làn gió tươi mới vào mọi thiết kế denim quen thuộc. Họa tiết hình bướm hay hoa luôn đem lại cảm giác sống động và khoan khoái đặc trưng của mùa Xuân. Bên cạnh đó, họa tiết chắp vải (patchwork) phổ biến từ mùa Thu-Đông vẫn tiếp tục được yêu thích bởi nguồn cảm hứng nghệ thuật bất tận.                                                       ', 9205, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(17, NULL, 2, 7, 10, '5 XU HƯỚNG THỜI TRANG ĐƯỜNG PHỐ LAN TỎA NÉT HÀO NHOÁNG CỦA THẬP NIÊN 70', 'street-style.jpg', 'bai-viet-demo-tren-682-luot-xem-cua-truong-duy', 'Loạt thiết kế đại diện cho những năm 1970 như quần ống loe, denim jumpsuit,… đã đưa ánh sáng từ quả cầu disco chiếu rọi xuống thời trang đường phố năm nay.\n\nLộng lẫy, bóng bẩy, nổi loạn,… thập niên 70 gợi nhớ về những cuộc chơi “thâu đêm suốt sáng” tại vũ trường, nơi khai sinh ra phong cách disco hay những phong trào chống đối số đông. Năm 2022, dấu ấn của thời kỳ này một lần nữa in bóng trên thời trang đương đại với phiên bản “cách tân” để trở nên dễ mặc và hợp thời hơn.      Quần ống loe đã “càn quét” các tuần lễ thời trang lớn tại Milan, Paris hay Copenhagen. Dạo quanh một vòng đường phố, không khó để nhận ra sự linh hoạt của kiểu quần ống loe bởi khả năng mix n’ match hòa hợp với nhiều món đồ. Nhưng vẫn luôn ở đó cái vẻ retro phóng khoáng – dấu ấn độc bản của thời 70s.         Không còn gò mình trong “màu jeans” quen thuộc, quần ống loe năm nay “nới rộng” biên độ, chạm đến các chất liệu và màu sắc đa dạng hơn như len tăm hay da bóng. Màu sắc cũng được tận dụng tối đa để cho ra những bản phối thuộc về riêng năm 2022.       Xuất hiện vào cuối những năm 60, cú huých đưa denim on denim trở thành xu hướng trong giữa những năm 70 chính là phong cách của bộ đôi Sonny và Cher. Kiểu trang phục “x2 denim” là dấu hiệu nhận biết của “leisure suit style”, một phong cách casual của phái nam được ưa chuộng thời bấy giờ bởi tính tươi mới mà nó đem lại.\n\nHơn cả một phong cách, hippie là một cuộc biểu tình. Sự pha trộn của họa tiết cỏ cây, paisley, patchwork nêu bật tuyên ngôn tự do mà người ngoài nhìn vào đều có thể cảm nhận. Hippie của năm 2022 vẫn “ngông” nhưng đã chỉn chu hơn trước. Hội tín đồ thể hiện tình yêu với phong cách này qua vô vàn những item khác nhau như suit, chân váy maxi,…              Vào thập niên 70, chiếc khăn choàng lông vũ là “con cưng” của rất nhiều huyền thoại như Elton John, Aretha Franklin,… Sang năm 2022, hội tín đồ ở mọi lứa tuổi cũng không ngần ngại mà rủ nhau gia nhập cuộc chơi lông vũ bằng một cách từ tốn hơn như điểm trên tay áo, dùng voan giả lông hay đính vào phụ kiện,…              Cuộc phục hưng của năm 70 sẽ khó mà vắng bóng những bộ trang phục “phát sáng”. Các chất liệu như sequin, da,… thâu tóm ánh nhìn trên đường phố như cách mà quả cầu disco tỏa sáng ở vũ trường. Với hy vọng lạc quan được tiếp nối từ năm trước, việc chưng diện những món đồ sáng, màu mè không còn được xem là sự “lố lăng”. Lên đồ cả bộ, hay chọn nhấn nhá vào một item; diện full đen, hay chơi hẳn những gam màu chói, tất cả đều nhận được cái gật đầu trên đường phố.                        ', 683, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(18, 21, 4, 3, 9, 'DƯỜNG NHƯ THỜI TRANG ĐANG LÀ CÔNG CỤ TIỀM NĂNG CHO CÁC HOẠT ĐỘNG CHÍNH TRỊ?', 'uraina.jpg', 'bai-viet-demo-tren-113-luot-xem-cua-nguyen-truong-vi', 'Thời gian gần đây, trang phục song hành với các hoạt động và yếu tố chính trị nổi lên ở mọi nơi. Song, có thực sự điều đó được định nghĩa là thời trang?\n\nXu hướng trang phục chính trị dường như đang thống lĩnh ở mọi lĩnh vực, từ nền công nghiệp điện ảnh cho đến thời trang. Tiêu biểu là sự kiện dàn sao Hollywood đồng loạt diện màu đen tại lễ trao giải Quả Cầu Vàng 2018 nhằm mục đích phản đối tình trạng lạm dụng và quấy rối tình dục. Ngay lập tức, truyền thông và dư luận gọi đó là “cuộc cách mạng của chính trị trong ngành thời trang”.                  Ảnh hưởng của Brexit cùng với tác động của Donald Trump và sự bùng nổ của các nhà hoạt động nhân quyền ở Châu Âu và Bắc Mỹ đã lan rộng qua các vùng nước văn hóa. Những người biểu tình, kể cả ủng hộ phong trào nữ quyền, ủng hộ công lý xã hội hay phản đối nạn phân biệt chủng tộc, đều chọn lựa phục trang chính trị theo dress code riêng.\n\nSong, loại trang phục chính trị hoàn toàn không phải dress code của các chính trị gia. Nhưng vấn đề là ngay cả những học giả về thời trang cũng nhận định đó là thời trang.\n\nTHỜI TRANG LÀ GÌ? TRANG PHỤC CHÍNH TRỊ CÓ PHẢI LÀ THỜI TRANG?\nKhía cạnh chính trị của thời trang được thấu hiểu ngay từ khi một cá nhân sinh ra. Bởi vì về cơ bản, cách con người ăn vận ra sao và khi nào chính là biểu hiện rõ rệt cho mức độ tự do và ảnh hưởng của xã hội.\n\nTrang phục dường như được thể hiện dàn trải trên phạm vi chính trị bao quát, từ sự tuân thủ cho đến cuộc nổi loạn. Đơn giản thì phong cách ăn mặc đã đưa ra thách thức mà trong đó yêu cầu về ý nghĩa chính trị được đặt lên hàng đầu. Do đó quyền lực xã hội của thời trang đã được tác động bởi yếu tố chính trị. Đồng thời, trang phục “black bloc” cho thấy sự sẵn lòng sử dụng bạo lực nếu cần thiết, giống như Black Panthers trong những năm 60s và 70s. Các Panthers đã lợi dụng lỗ hổng trong lần sửa đổi thứ hai của hiến pháp Hoa Kỳ nhằm hợp thức hóa việc mang vũ khí công khai.   Thời trang – như được định nghĩa – xảy ra khi một xã hội rộng lớn đồng ý với một phong cách, gu thẩm mỹ hay văn hóa trong một khoảng thời gian. Do đó, thời trang thay đổi theo thời gian ở quy mô xã hội. Thời trang xuất hiện trong bất kỳ lĩnh vực nào mà con người theo đuổi, bao gồm nghệ thuật, âm nhạc, công nghệ, thậm chí cả những học thuyết phức tạp.\n\nSỰ HỖN LOẠN VỀ ĐỊNH NGHĨA TRANG PHỤC CHÍNH TRỊ\nKhông có gì đáng ngạc nhiên khi thời đại ngày nay con người thường định nghĩa trang phục là thời trang. Từ thế kỷ 18 trở đi, một lĩnh vực lớn của nền công nghiệp được dùng để phục vụ cho nhu cầu làm đẹp của con người bao gồm: hàng may mặc, phụ kiện, dịch vụ làm đẹp. Ngành công nghiệp này, cùng với các hoạt động quảng cáo, hòa nhập vào một ngành công nghiệp thời trang toàn diện.\n\nTuy nhiên, điều đáng quan tâm là các học giả thời trang đang khiến dư luận hỗn loạn bởi định nghĩa sai lệch: phong cách chính trị là thời trang. Họ đã hoàn toàn sử dụng các từ ngữ trang phục, phong cách và thời trang mà không hề bận tâm đến sự khác biệt cơ bản về ngữ nghĩa của chúng.\nHay sự kiện các “ông lớn” như Tommy Hilfiger, Thakoon, Prabal Gurung, Phillip Lim, Dior và Diane von Furstenberg mang chiếc khăn bandana trắng lên sàn catwalk để ủng hộ cho tình đoàn kết, sự thống nhất của con người.                    Ngoài ra, tất cả các khẩu hiệu được in hoặc thêu trong một loạt các sản phẩm may mặc xuất hiện tại Ashish Gupta, Public School và Christian Siriano đều được đánh dấu như tuyên bố chính trị đầy mạnh mẽ.\nTuy nhiên, đây không hẳn là một tín hiệu tốt lành. Nguyên do là bởi các phong trào chính trị của ngành công nghiệp thời trang không thực sự được thể hiện như ý nghĩa tích cực vốn có. Thay vào đó, chúng có thể được sử dụng như công cụ thương mại hoặc quảng cáo hình ảnh.                                                              ', 114, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(19, 13, 6, 1, 14, 'ẢNH HƯỞNG VÔ HÌNH CỦA CHIẾN TRANG NGA – UKRAINE LÊN TÍN ĐỒ THỜI TRANG TRONG NƯỚC', 'chien-tranh-nga-ukraina.jpg', 'bai-viet-demo-tren-8442-luot-xem-cua-tran-thi-yen-nhi', 'Chiến trang Nga – Ukraine không chỉ đơn thuần là một cuộc xung đột địa chính trị bên kia bán cầu. Áp lực của nó lên ngành công nghiệp và thói quen tiêu dùng thời trang là điều không thể tránh khỏi.\n\nGần năm tháng kể từ khi bắt đầu chiến dịch quân sự đặc biệt của Nga tại Ukraine, thế giới đã, đang và sẽ tiếp tục đối phó với đa khủng khoảng từ kinh tế, năng lượng đến lương thực do hậu quả của cuộc xung đột. Dẫu ít được nhắc đến, song người tiêu dùng thời trang nước nhà đang được “trải nghiệm” các tác động mang tính vi mô của cuộc chiến. Dưới đây là góc nhìn toàn cảnh về nguyên nhân cũng như kịch bản có thể lường trước về sự thay đổi của của thị trường thời trang.                Nga là nhà xuất khẩu dầu mỏ lớn nhất thế giới khi cung cấp hơn 40% khí đốt và 25% dầu nhập khẩu cho châu Âu – nơi được coi là cái nôi của ngành thời trang cao cấp. Với lệnh trừng phạt của EU, nguồn cung dầu mỏ và khí dốt đang đối mặt với sự khan hiếm trầm trọng và giá cả leo thang. Ngoài ra, chiến sự căng thẳng dẫn đến gián đoạn thương mại và chuỗi cung ứng, cụ thể là hàng hoá vận chuyển bằng tàu bị tắc nghẽn, không được thông quan và đội chi phí ở các tuyến đường hàng hải xảy ra tranh chấp. Đối với đường hàng không, việc không phận Ukraine tạm đóng tuyến hàng không dân sự đã làm giá cước vận chuyển tăng mạnh. Lạm phát ở khu vực sử dụng đồng tiền chung châu Âu (Eurozone) cũng đã lên cao kỷ lục khi chạm mức 8.6% – cao đột biến ở châu lục này trong gần nửa thế kỷ qua. Như một hệ quả tất yếu, những thương hiệu thời trang cao cấp với trụ sở tại đây đang “lao đao” không nhẹ. Cụ thể hơn như ở Pháp – một trong những nền kinh tế lớn nhất Liên minh châu Âu và là đất nước sở hữu kinh đô thời trang hào nhoáng, nước này đang phải đối mặt với giá năng lượng tăng đến 33,1% – mức tăng cao nhất trong nhiều thập kỷ.                        Chiến sự Ukraine chưa kết thúc, lệnh phong toả nghiêm ngặt ở các thành phố lớn của Trung Quốc vì biến chủng Omicron lại góp phần làm nặng nề thêm cho chuỗi cung ứng vốn đã “vật lộn chống đỡ” suốt 2 năm dịch bệnh. Chúng ta sẽ chứng kiến việc chậm trễ giao hàng cũng như thông quan với các đơn hàng quốc tế.                Hậu quả của việc này là mẫu mã sản phẩm và nguồn hàng sẽ không được đa dạng và về đều như trước dịch. BST Thu – Đông sẽ không kịp “lên kệ” như dự kiến vì sự đình trệ kéo dài ở các cảng tàu châu Âu và Trung Quốc. Đặc biệt với các mặt hàng pre-order, made-to-order và made-to-measure không được gia công tại Việt Nam, khách hàng nên sẵn sàng cho việc ngày hàng về đến tay chậm trễ hơn trước kia. Như dự đoán trước được tình hình, các hệ thống trung tâm mua sắm thời trang cao cấp trong và ngoài nước đã lùi lại thời gian của đợt giảm giá mùa Hè.            Theo báo cáo của Zara, các mặt hàng thời trang sẽ tăng ít nhất 8% trong năm nay. Đặc biệt, túi từ các thương hiệu cao cấp sẽ tăng 22%, áo t-shirt nam đạt mức cao nhất 55%. Số liệu của DAZED chỉ ra, mẫu túi huyền thoại CHANEL Flap Bag đã tăng 40% một phần vì khan hiếm nguyên vật liệu, chi phí nhân công, vận chuyển và lạm phát. Ngoài ra, đối với khách hàng có thói quen “săn” hàng hiệu xách tay, việc tăng giá vé máy bay quốc tế vì phí xăng dầu cũng sẽ là một trở ngại ảnh hưởng đến giá thành và sự cạnh tranh của phương thức mua sắm này.\n\nĐiều này dẫn đến sự lựa chọn cắt giảm chi tiêu cho các mặt hàng không cần thiết và xa xỉ của người tiêu dùng Việt Nam, đặc biệt là tầng lớp trung lưu. Đây là hành động tất yếu như một hệ quả của việc tăng giá đồng loạt các nhu yếu phẩm hằng ngày, đã và đang đè nặng lên thu nhập của tệp khách hàng thời trang phổ thông này.                     Theo Forbes, xu hướng tăng giá của các thương hiệu cao cấp không những không làm giảm, mà còn thúc đẩy mạnh mẽ nhu cầu và ham muốn sở hữu của người tiêu dùng thuộc tầng lớp giàu có. Lý giải cho nhận định tưởng chừng như bất hợp lý này, theo Giáo sư Kapferer – nhà nghiên cứu và tư vấn thương hiệu xa xỉ, và Giáo sư marketing Valette-Florence: “Giá của một sản phẩm không chỉ đơn thuần là chất lượng hay chi phí sản xuất. Nó phản ánh khả năng cá nhân, năng lực tài chính và văn hoá của khách hàng khi chi trả cho một sản phẩm không thiết yếu.” Có thể nói, mua sắm xa xỉ phẩm thoả mãn nhu cầu tâm lý của người tiêu dùng về địa vị xã hội và sự độc quyền. Thông qua việc sở hữu những sản phẩm này, khách hàng muốn chứng tỏ họ thuộc về giới tinh anh và giàu có, sở hữu những đặc quyền kinh tế “miễn nhiễm” với cuộc khủng hoảng toàn cầu. \n\nTuy nhiên, chúng ta có lẽ sẽ phải chứng kiến khoảng cách ngày càng lớn hơn giữa tầng lớp thượng lưu (những người coi việc mua sắm xa xỉ như một thói quen và sở thích) và tầng lớp trung lưu có thu nhập khá (những người phải tiết kiệm để chi trả cho một sản phẩm cao cấp).                                        ', 8443, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL);
INSERT INTO `article` (`id`, `product_id`, `brand_id`, `category_id`, `employee_id`, `article_title`, `article_thumbnail`, `article_slug`, `article_content`, `article_view_count`, `article_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 22, 6, 5, 10, 'CÁ TÍNH THỜI TRANG CỦA NHỮNG “NỮ CƯỜNG” TRONG ITAEWON CLASS', 'phong-cach-thoi-trang-menswear.jpg', 'bai-viet-demo-tren-2859-luot-xem-cua-truong-duy', 'Vì sao dù sở hữu tính cách khác nhau nhưng cả “điên nữ” Jo Yi Seo, quản lý Oh Soo Ah hay đầu bếp Ma Hyun Ji đều trung thành với phong cách menswear?\n\nVới mức rating không ngừng tăng cao qua mỗi tuần phát sóng, Itaewon Class hiện đang là bộ phim truyền hình hàng đầu tại xứ sở kim chi. Bên cạnh câu chuyện về những người trẻ giàu nghị lực trong xã hội, bộ phim còn thể hiện sức mạnh của nữ quyền khi các nhân vật nữ trong phim đều có cá tính mạnh mẽ, độc lập và tài giỏi. Góp phần không nhỏ trong việc khắc họa thành công hình tượng này là những bộ trang phục đậm chất menswear như âu phục, áo khoác phom rộng, quần jeans boyfriend…\n\nLà một trong những hình tượng nữ chính mới lạ, độc đáo của màn ảnh nhỏ Hàn Quốc, nữ chính Jo Yi Seo của Itaewon Class khiến người xem thích thú với tính cách gai góc và phong cách thời thượng như một fashionista chính hiệu. Yi Seo hầu như không diện váy, thay vào đó cô sở hữu cả bộ sưu tập áo khoác phom rộng cá tính, dàn trải từ áo măng tô, áo blazer, áo khoác da…                  Kiểu phối đồ quen thuộc của Yi Seo chính là áo khoác dáng dài và hoodie. “Bộ đôi” này không chỉ có tác dụng giữ ấm mà còn khắc họa được một cô gái 20 tuổi cá tính và mạnh mẽ không thua kém bất kỳ một chàng trai nào.                              Ngoài áo khoác da, áo choàng phom rộng và hoodie, áo blazer là mảnh ghép không thể thiếu trong tủ đồ của Ji Seo. Cô yêu thích những mẫu blazer phom rộng, mặc cùng với quần da hoặc quần skinny jeans. Những chiếc túi đeo chéo là phụ kiện không thể thiếu của Yi Seo.                 Không diện áo sơmi voan, chân váy bút chì hay đầm chữ A quen thuộc, nữ phụ xinh đẹp Oh Soo Ah (Kwon Na Ra thủ vai) của Itaewon Class vẫn thu hút sự chú ý với muôn kiểu âu phục công sở theo phong cách menswear. Với cá tính kiên cường và độc lập từ bé, Soo Ah dồn hết tâm huyết vào sự nghiệp với khát vọng sẽ rũ bỏ được quá khứ đáng thương và nghèo khó. Hình tượng một cô nàng tự tin và mạnh mẽ được xây dựng thành công qua cách kết hợp quần âu với áo sơ mi, cà vạt.             Không chỉ diện âu phục được cắt may khéo léo, nhân vật Soo Ah còn làm mới phong cách với áo blazer và áo ghi lê cùng tông. Điểm nổi bật của bộ trang phục nằm ở chiếc khăn lụa màu sắc. Đây cũng là cách kết hợp bạn có thể áp dụng vào trang phục công sở hằng ngày.                 Mỗi nhân vật trong Itaewon Class, dù chính hay phụ, đều có câu chuyện cuộc đời gây ấn tượng mạnh với người xem. Cô nàng đầu bếp Ma Hyun Ji tuy không phải nhân vật chính nhưng lại là điểm nhấn đặc biệt ấn tượng của phim. Trước khi chuyển giới, Hyun Ji thường diện trang phục đơn giản như áo sweater phom rộng và quần jeans hay quần da bóng.\n\nNgoài đời, hình ảnh của nữ diễn viên Lee Joo Young cũng không quá khác biệt so với Ma Hyun Ji. Nổi lên với phong cách unisex từ bộ phim Weightlifting Fairy Kim Bok Joo, nhưng đến khi hóa thân thành đầu bếp Ma trong Itaewon Class, nữ diễn viên 28 tuổi mới gây được tiếng vang với hình tượng nhât vật này.               Sau khi chuyển giới, cô nàng Ma Hyun Ji xuất hiện với vẻ nggoài trưởng thành và dịu dàng hơn. Tuy nhiên, cô nàng đầu bếp của quán Dan Bam vẫn ưu tiên phong cách menswear với áo sơ mi nhung tăm kết hợp cùng áo khoác dáng dài.', 2860, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(21, NULL, 5, 7, 11, 'KIM DA MI VÀ FENDI – LIỆU ĐÂY CÓ PHẢI MỘT MÀN KẾT HỢP SÁNG GIÁ?', 'kim-dami-fendi.jpg', 'bai-viet-demo-tren-5893-luot-xem-cua-tran-van-huynh-duc', 'Nổi tiếng với các vai diễn đa sắc màu trong The Witch, Itaewon Class hay Our Beloved Summer, Kim Da Mi tiếp tục ghi dấu trên hành trình sự nghiệp của mình với một vai trò mới: Đại sứ thương hiệu Fendi khu vực Hàn Quốc.\n\nChia sẻ với báo chí về lần hợp tác này, nữ diễn viên bày tỏ: “Fendi luôn gắn liền với sự cách tân và những thử nghiệm táo bạo, đưa ra góc nhìn rất khác, rất sáng tạo trong thế giới thời trang. Đây quả thực là vinh dự của tôi khi được là một phần trong ngôi nhà chung Fendi”. Liệu Kim Da Mi và Fendi có thực sự là cặp bài ăn ý với nhau? Cùng ELLE điểm qua những tạo hình trong phim đình đám nhất của nữ diễn viên sinh năm 95 và một vài lần xuất hiện trước công chúng để hiểu hơn về phong cách thời trang của cô nàng.       Vào vai cô nàng Jo Yi Seo nổi loạn, bất cần nhưng đầy hoài bão, Kim Da Mi được dịp thử sức với một phong cách cá tính, bụi bặm đậm chất đường phố. Cô nàng có hẳn một BST những chiếc áo khoác da đa dạng kiểu dáng. Nhưng như thế vẫn chưa là gì so với sự phá cách của Jo Yi Seo, những bản “remix” nổi bật nhất có thể kể đến bản phối áo da đỏ và quần da báo táo bạo.             Tuy trung thành với “sách lược” tối đa hai gam màu, cô nàng vẫn khiến trang phục của mình trở nên thú vị hơn với những thiết kế có kiểu dáng hoặc họa tiết mới lạ. Đáng nhớ nhất chắc phải kể đến chiếc trench coat viền trắng với phần vạt áo đan chéo khá phức tạp hay chiếc blazer họa tiết trái tim phối cùng chân váy tua rua lạ mắt.        Tới Our Beloved Summer, hình ảnh của Kim Da Mi trở nên trưởng thành, giản dị hơn. Cô hóa thân thành Kook Yeon Su, một cô gái chăm chỉ và độc lập. “Người bạn đồng hành” quen thuộc của Da Mi trên màn ảnh nhỏ là những chiếc áo sơ mi đơn sắc phối cùng quần kẻ sọc hoặc chân váy dài.             Nhân vật của Kim Da Mi cũng dành sự ưu ái cho những kiểu áo măng tô, hoặc áo khoác dạ ngắn – một hình ảnh khá nghiêm túc và quen thuộc với dân văn phòng xứ Hàn. Phần lớn trang phục của nhân vật Yeon Su đều thiên hề tone trung tính, rất phù hợp với hình tượng cô gái 30 tuổi đang trên con đường phát triển sự nghiệp. Đôi khi cô nàng còn làm mới mình bằng áo chần bông, cardigan họa tiết, túi thổ cẩm,… trong những ngày nghỉ cuối tuần.            Kim Da Mi không phải một nữ diễn viên thường gây chú ý trên thảm đỏ. Cô nàng chủ yếu lựa chọn các thiết kế màu đen tối giản để thể hiện hình thượng thanh lịch, hiện đại của mình. Nhưng nếu để ý kỹ, trang phục của nữ diễn viên luôn có các chi tiết cách điệu tinh tế khẳng định sự thời thượng. Chẳng hạn như áo sơ mi với phần cổ được kéo dài ra, cầu vai hình chiếc nơ, hay set đồ đồng bộ với áo croptop và chân váy maxi,…                                                                            ', 5894, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(22, 22, 4, 7, 9, 'CÁCH CHỌN ĐỒ TINH TẾ CỦA CÔNG NƯƠNG KATE MIDDLETON XUYÊN SUỐT ĐẠI LỄ BẠCH KIM', 'Jubilee-Mark.jpg', 'bai-viet-demo-tren-2550-luot-xem-cua-nguyen-truong-vi', 'Sử dụng màu sắc yêu thích của Công nương Diana, trang sức thay cho sự hiện diện của Nữ hoàng hay ưu ái cho các NTK xứ Wales… nữ Công tước xứ Cambridge luôn có khả năng biến trang phục trở thành “phát ngôn viên” tài tình của mình.\n\nĐến hẹn lại lên, gu thời trang của Công nương Kate Middleton luôn là một trong những chủ đề được giới mộ điệu quan tâm vào mỗi sự kiện quan trọng của hoàng gia Anh. Vừa qua, sự xuất hiện của Công nương trong Đại lễ Bạch Kim (Platinum Jubilee) một lần nữa khiến mọi người ngưỡng mộ vì những ý nghĩa kín đáo.                     Tại cuộc diễu hành Trooping the Colour 2022 mở đầu chuỗi cho Đại lễ Bạch Kim, nữ công tước xứ Cambridge xuất hiện với phong cách thanh lịch, tao nhã. Trong khi Nữ hoàng, Nữ công tước xứ Cornwall và ba con của Kate đều mặc màu xanh lam, cô chọn cho mình bộ suit trắng đến từ thương hiệu Alexander McQueen để bày tỏ lòng kính trọng với người mẹ chồng quá cố – Công nương Diana. Đi kèm với đó là một chiếc túi màu xanh nước biển của Strathberry, nón đĩa bay (saucer hat) màu trắng và xanh navy mang hơi hướng hải quân của Philip Treacy.         Điểm nhấn của outfit này là bộ trang sức “gia truyền” mang nhiều ý nghĩa của công tước phu nhân. Theo đó, Kate đã diện đôi hoa tai được làm bằng đá sapphire và kim cương. Đây là món phụ kiện mà Công nương Diana từng rất yêu thích. Bà đã đeo nó trong chuyến thăm đến Ottawa (Canada) vào năm 1991 và Met Gala năm 1996. Ngoài ra, Kate lần đầu tiên đeo chiếc nhẫn đính hôn bằng đá sapphire cũng là kỷ vật của cố Công nương tại một sự kiện công cộng như Đại lễ Duyệt binh truyền thống.               Đến lễ Tạ ơn tại Nhà thờ St Paul, phu nhân của vương tôn William diện chiếc váy midi màu vàng pastel, có chi tiết đan chéo tạo điểm nhấn ở eo của nhà mốt Emilia Wickstead, phối với nón Philip Treacy, túi clutch dệt và đôi giày da lộn Gianvito Rossi cùng tone vàng. Nữ công tước cũng chuẩn bị cho mình một đôi găng tay nhưng có vẻ không dùng đến chúng.              Công nương Diana thường xuyên mặc màu này trong nhiều chuyến công du của mình suốt những năm 80 và 90. Đặc biệt là chuyến viếng thăm Australia và New Zealand cùng Thái tử Charles vào năm 1983. Màu vàng là một trong những màu sắc yêu thích của công nương quá cố. Bên cạnh đó, Wickstead cũng là một nhà thiết kế sinh ra ở New Zealand hiện đang làm việc tại London. Kate chỉ trùng hợp mặc như vậy? Chúng tôi nghĩ là không!       Chưa hết, để thay mặt nữ hoàng Elizabeth Đệ nhị – người không thể tham dự sự kiện do vấn đề di chuyển, Kate đã khéo léo đeo đôi hoa tai ngọc trai Bahrain của bà. Nó vốn được trao cho nữ hoàng như một món quà trong đám cưới năm 1947 với Hoàng thân Philip.            Khi tham dự lễ kỷ niệm được tổ chức ở xứ Wales, Kate mặc một chiếc áo khoác Eponine màu đỏ cam mà cô từng mặc vào năm ngoái. Đây là tone màu giúp mọi người dễ dàng liên tưởng đến hình tượng rồng đỏ trên quốc kỳ của xứ Wales. Nữ công tước cũng vốn nổi tiếng là người thường xuyên tôn vinh các quốc gia mà cô ghé thăm thông qua trang phục tương ứng với màu quốc kỳ của họ.  Để hoàn thiện outfit, Kate chọn thêm cho mình hoa tai bằng vàng của Spells of Love – một NTK người xứ Wales, đôi giày cao cổ màu đen của Gianvito Rossi và một chiếc túi DeMellier cùng màu. Cùng với chồng là hoàng tử William và hai người con lớn: Hoàng tử George và công chúa Charlotte, nữ công tước rạng rỡ tươi cười cũng như thoải mái tương tác với người dân nơi đây.\nTham dự buổi hòa nhạc Platinum Jubilee với hơn cho 22.000 người tại Cung điện Buckingham, Công nương Kate khoác áo vest trắng vải tweed bên ngoài váy xếp ly có giá 400 bảng (hơn 11,6 triệu đồng) của Self-Portrait. Nữ công tước từng diện chiếc váy này vào tháng 9/2021 trong một buổi tiệc chiêu đãi cho dự án Hold Still. Đi cùng với đó là clutch cầm tay, đôi hoa tai giọt nước màu bạc, vòng cổ hình thánh giá và kiểu tóc sóng nước giúp cô thêm phần đằm thắm, mặn mà.            Tại Platinum Jubilee Pageant – sự kiện cuối cùng trong chuỗi lễ kỷ niệm, Kate đã chọn một chiếc váy dài tay với tone màu hồng Phúc Bồn Tử được may đo riêng bởi Stella McCartney. Không chỉ vậy, nữ công tước xứ Cambridge còn tinh tế bày tỏ lòng hiếu kính với Nữ hoàng khi đeo hoa tai được làm bằng vàng và đá quý trong bộ sưu tập riêng của bà. Được biết, đôi hoa tai này là món quà mà Vua George VI và vợ tặng cho Nữ hoàng Elizabeth II nhân dịp sinh nhật lần thứ 19 của bà vào năm 1945. Kate cũng từng đeo nó vào năm 2018 khi tham dự một sự kiện tại tu viện Westminster.                                                                                                                           ', 2551, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(23, NULL, 3, 1, 9, '5 NGÔI SAO ẢNH HƯỞNG ĐẾN PHONG CÁCH THỜI TRANG CỦA GEN Z TOÀN CẦU ', 'ngoi-sao-thoi-trang-gen-z.jpg', 'bai-viet-demo-tren-6563-luot-xem-cua-nguyen-truong-vi', 'Thế hệ Z trẻ trung, sành công nghệ và khao khát chinh phục những thử thách mới. Nhưng trong thời trang họ có xu hướng tìm về những cảm hứng xưa cũ như Y2K.\n\nDua Lipa, Olivia Rodrigo, Billie Eilish, Sydney Sweeney hay Emma Chamberlain không chỉ là tương lai của âm nhạc, điện ảnh, nội dung số mà còn là hình mẫu về phong cách. Dù có chung đam mê thời trang vintage, mỗi người đều biến tấu với màu sắc riêng của mình. Các “nàng thơ” Gen Z đã mang đến làn gió mới cho những trào lưu hoài cổ.        Dua Lipa – ngôi sao nhạc pop đồng thời là gương mặt trong các chiến dịch quảng cáo và thậm chí còn catwalk trên sàn diễn mùa Xuân của Versace. Lipa nổi bật với những chiếc đầm gợi cảm trên thảm đỏ. Ngoài ánh đèn sân khấu, chủ nhân giải Grammy Album xuất sắc năm 2021 chính là một tín đồ thời trang Y2K. Những chiếc áo lửng đủ kiểu dáng, đủ màu sắc được cô kết hợp đầy phóng khoáng và sáng tạo. Bên cạnh đó, chân váy mini hay những chiếc đầm lấp lánh cũng giúp Dua Lipa “tỏa sáng”.         Oliva Rodrigo từng là diễn viên con cưng của Disney, nay trở thành ngôi sao nhạc pop quốc tế được yêu thích. Album đầu tay – Sour, đã đưa cô lên một tầm cao mới. Phong cách thời trang độc đáo của Olivia cũng mê hoặc người hâm mộ. Như bao cô gái trẻ, Olivia đã thử nghiệm phong cách của mình cho đến khi cô ấy tìm thấy thẩm mỹ phù hợp. Cô nàng yêu thích những chiếc áo corset, chân váy mini, hay đầm dạ hội đuôi cá. Cô đặc biệt thích mang những đôi giày, bốt đế xuồng (platform shoes). Dáng vẻ nhỏ nhắn dễ thương gắn với những đôi platform hầm hố tạo nên một ấn tượng riêng cho Olivia.          Sau series Euphoria, Sydney Sweeney trở thành cái tên hot của Hollywood rồi được săn đón nồng nhiệt bởi làng thời trang. Trên màn ảnh, nhân vật “Cassie” của cô sở hữu gu thời trang ngọt ngào đầy ấn tượng. Không quá khác biệt trong phim, những trang phục bó sát cơ thể, khoe trọn thân hình quyến rũ trong tone màu hồng, trắng, vàng,… đã làm nên thương hiệu cho cô nàng. Sắc thái Y2K của Sydney được pha trộn thêm một chút yếu tố cổ tích qua các chi tiết tay phồng, corset hay găng tay opera,…        Thời gian trước, không khó để bắt gặp Billie Eilish thả mình trong những chiếc áo thun “quá khổ” cùng quần short rồi ung dung sải bước từ đường phố đến thảm đỏ. Billie chia sẻ cô từng bị “body shaming” nên không đủ tự tin “xúng xính” với váy áo điệu đà. Nhưng ba năm trở lại đây, ta phải bất ngờ vì màn lột xác của cô ca sĩ – nhạc sĩ trẻ trong những chiếc đầm gợi cảm, nữ tính như một cách thể hiện sự trưởng thành và tự tin.        Tuy chỉ mới trong chạm đầu 20 nhưng Emma Chamberlain đã được gọi tên cho danh phận đại sứ thương hiệu Cartier. Xuất phát điểm là một youtuber nổi tiếng, cô nàng có tầm ảnh hưởng lớn trong phong cách ăn mặc của thiếu niên Bắc Mỹ. Emma mê mẩn nhiều aesthetic như VSCO, Preppy, Y2K,… nhưng không cố định ở một hình tượng cụ thể. Tuy nhiên, phần lớn tủ quần áo của cô nàng lại đến từ cửa hàng secondhand.                                                              ', 6564, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(24, NULL, 6, 2, 10, 'CÁCH CÔNG NƯƠNG DIANA THAY ĐỔI KHÁI NIỆM VỀ QUẦN ÁO THỂ THAO BẰNG PHONG CÁCH SPORTY CHIC', 'cong-nuong-diana.jpg', 'bai-viet-demo-tren-8872-luot-xem-cua-truong-duy', 'Gu thời trang năng động nhưng sang trọng của Công nương Diana đã trở thành một biểu tượng và tiên phong cho phong cách Sporty Chic được ưa chuộng ngày nay.\n\nSporty Chic là sự kết hợp giữa quần áo thể thao và những món đồ “trendy” nhưng vẫn giữ được nét thanh lịch và quyến rũ. Hay nói cách khác, Sporty Chic khiến sự nữ tính trở nên tự nhiên hơn bằng cách thổi vào đó một cái nhìn thoải mái, mềm mại. Công nương Diana – vị Vương phi xứ Wales từ thập niên 80 đã mở màn cho trào lưu mix & match tủ đồ phòng tập và sàn runway. Cùng ngắm nhìn những bản phối đã làm nên thương hiệu thời trang đầy cá tính của cố Công nương.     Nếu bạn là một người mến mộ phong cách thời trang của Lady Di, không khó để bắt gặp những lần Công nương diện chiếc quần biker phối cùng áo sweater xuống phố hay trở về từ sân quần vợt. Công thức này dần trở thành một hình ảnh “iconic” mỗi khi nhắc tới phong cách Sporty Chic. Nữ công tước xứ Wales còn khiến bản phối trở nên sang trọng hơn với điểm nhấn kính râm hay headband. Kiểu quần biker tiện dụng đến ngày nay vẫn được lăng xê bởi các IT-Girl như Hailey Bieber, Kendall Jenner, Kaia Gerber,…   Varsity jacket phối cùng chân váy bút chì, kết hợp tưởng từng chừng như không liên quan lại đem đến hiệu quả bất ngờ cho màn xuất hiện của Công nương Diana. Những chiếc áo bóng chày đi ngược quy tắc ăn mặc chỉn chu của Hoàng gia Anh không chỉ một, hai mà rất nhiều lần lọt vào ống kính của các tay săn ảnh như tuyên ngôn về sự phá cách của bà. Trong đó, chiếc áo khoác màu đỏ đã được chọn để xây dựng tạo hình cho nhân vật của Kristen Stewart ở đoạn đối thoại tìm lại bản năng tự do trong phim Spencer.       Nếu chiếc áo blazer khiến bạn trông khá trang trọng vào những dịp cuối tuần, thì sự kết hợp cùng phụ kiện như mũ lưỡi trai sẽ khiến bộ outfit của bạn trở nên thân thiện và thoải mái hơn bao giờ hết. Công nương ưa chuộng cách phối áo blazer kết hợp cùng quần jeans, giày boots, và không quên kèm một chiếc mũ xanh navy quen thuộc. Bản phối vừa không làm mất đi nét trang trọng chuẩn hoàng gia vừa thêm phần phù hợp cho các hoạt động ngoài trời.           Một tip đơn giản để khiến mọi loại trang phục trở nên trưởng thành và “chic” hơn là phủ lên màu đen bí ẩn. Cho dù mặc tracksuit nylon, Công nương cũng “hack” nó bằng màu sắc và những đường kẻ đơn giản. Sự mềm mại, ôm dọc phần chân của chiếc quần, cùng chiếc áo khoác vừa vặn với cơ thể không chỉ gọn gàng phù hợp với cương vị của bà mà còn giữ được chất thể thao linh hoạt.                                              ', 8873, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(25, 12, 3, 5, 11, 'HỌC KAIA GERBER MẸO PHỐI ĐỒ “CHẤT” THEO PHONG CÁCH MENSWEAR', 'kaia-gerber.jpg', 'bai-viet-demo-tren-4091-luot-xem-cua-tran-van-huynh-duc', 'Kết hợp giữa những món đồ cơ bản và dấu ấn thập niên 90, street style của người mẫu Kaia Gerber trở thành niềm cảm hứng cho các cô gái cùng theo đuổi phong cách menswear.\n\nRa mắt với tư cách người mẫu khi chỉ mới 16 tuổi, Kaia Gerber nhanh chóng trở thành gương mặt “đắt giá” nhất nhì làng thời trang, liên tục phủ sóng Tuần lễ thời trang từ New York đến Paris. Trái ngược với những bộ quần áo lộng lẫy trên sàn diễn, trang phục off-duty của nàng mẫu trẻ luôn nổi bật với vẻ trưởng thành đồng thời mang nhiều cảm hứng từ thập niên 90. Sự kết hợp tinh tế này là bí quyết đáng học hỏi nếu bạn yêu thích trang phục menswear phá cách hay những món đồ mang hơi thở hoài cổ.            Áo blazer, quần tây, áo sơmi là những món đồ không thể thiếu trong phong cách menswear của Kaia Gerber. Năng lượng tươi trẻ và sự phóng khoáng được cô khéo léo thể hiện qua những chiếc áo crop top và áo thun graphic. Nàng mẫu sinh năm 2001 hoàn toàn “làm chủ” phong thái chững chạc, đứng đắn, đồng thời giữ được vẻ tinh nghịch của Gen Z.\n\nTuy sở hữu phong cách khác hẳn mẹ – siêu mẫu Cindy Crawford, Kaia Gerber lại chịu nhiều ảnh hưởng từ thập niên 90 – thời hoàng kim của mẹ mình. Điều này được thể hiện rõ nhất qua cách Kaia lựa chọn phụ kiện. Từ chiếc kính mát màu sắc đến boots chiến binh cá tính, trang phục của Kaia phảng phất hơi thở cổ điển thường thấy ở các siêu mẫu thuộc thế kỷ trước. Một xu hướng của những năm 90 được Kaia Gerber tích cực “lăng-xê” chính là họa tiết kẻ carô. Cô sở hữu một  hẳn một bộ sưu tập các món đồ in họa tiết này, từ chiếc áo khoác blazer, chân váy chữ A đến quần ống loe đậm chất retro.     Trong những lần diện váy hiếm hoi, Kaia Gerber vẫn tìm kiếm sự thoải mái ở những đôi sneakers hoặc boots chiến binh. Giày converse cổ cao ở cả ba phiên bản trắng, đen và xanh thường đồng hành cùng Kaia trong những buổi dạo phố. Váy hoa điệu đà tương phản với giày thể thao đem lại vẻ ngoài vừa nhẹ nhàng, bay bổng vừa trẻ trung, năng động.                              ', 4092, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(26, 15, NULL, 4, 14, 'ÁO KHOÁC BLAZER BOYFRIEND VÀ ÁO HOODIE', 'elle-viet-nam-blazer.jpg', 'bai-viet-demo-tren-9628-luot-xem-cua-tran-thi-yen-nhi', 'Một trong những công thức kết hợp được các tín đồ thời trang yêu thích nhất chính là kết hợp blazer boyfriend và hoodie. Với phom dáng oversize, những chiếc áo khoác blazer boyfriend phủ ngoài hoodie cá tính sẽ rất thích hợp cho những ngày tiết trời trở lạnh. Hoàn thiện phong cách menswear cùng quần jeans và bốt cổ thấp, bạn đã sẵn sàng xuống phố với một diện mạo thật năng động.  Chiếc áo blazer boyfriend quen thuộc sẽ trở nên thú vị hơn khi bạn kết hợp cùng áo phông và quần jeans. Blazer họa tiết kẻ ô sẽ dễ dàng kết hợp cùng những thiết kế áo phông trơn tối giản và jeans cạp cao. Nếu bạn muốn thể hiện dấu ấn cá nhân nhiều hơn trong bộ trang phục, hãy thử nghiệm công thức áo phông họa tiết cùng blazer trơn và tạo điểm nhấn với mũ và túi xách.         Tương tự công thức kinh điển white-on-white, diện nguyên cây denim là xu hướng không bao giờ lỗi mốt. Thêm thắt những điểm nhấn thú vị cho tổng thể bộ trang phục bằng một chiếc áo blazer kẻ ô và phụ kiện đi kèm, bạn đã hô biến một diện mạo hoàn hảo cho những ngày giao mùa.      Để tạo nên một diện mạo theo đúng chuẩn xu hướng menswear, bạn nên diện áo khoác blazer boyfriend phủ ngoài áo sơmi và quần jeans phóng khoáng. Bộ trang phục sẽ hoàn hảo hơn nếu bạn thêm vào điểm nhấn phụ kiện mang đậm âm hưởng phong cách thời trang này như kính mát to bản, túi cầm tay hoặc trang sức kim loại… Đừng chỉ giới hạn sự lựa chọn trang phục của bạn trong những chiếc áo sơmi hay áo phông kinh điển khi muốn theo đuổi phong cách menswear. Thay vào đó, các quý cô hoàn toàn có thể biến tấu phong cách thời trang cá tính này theo hướng quyến rũ hơn bằng những chiếc áo bra-top. Vừa mạnh mẽ, vừa gợi cảm, công thức kết hợp áo khoác blazer boyfriend phủ ngoài bra-top sẽ là phép cộng hoàn hảo cho những cô nàng thích sự mới mẻ.      Những chiếc áo cổ lọ luôn là một trong những thiết kế sinh ra là để dành cho mùa Thu – Đông. Từ những chiếc áo len ấm áp cho đến chất liệu dệt kim hay cashmere, bạn có thể biến hóa linh hoạt cùng công thức kinh điển blazer và áo cổ lọ để diện hàng ngày. Đừng quên hoàn thiện phong cách thời trang menswear cùng giày lười, boots hoặc giày cao gót.                                          ', 9629, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(27, NULL, NULL, 4, 14, 'CHINH PHỤC PHONG CÁCH THỜI TRANG MENSWEAR CÙNG ÁO BLAZER BOYFRIEND', 'elle-blazer.jpg', 'bai-viet-demo-tren-6463-luot-xem-cua-tran-thi-yen-nhi', 'Mang đậm nét đẹp thành thị hiện đại, những chiếc áo khoác blazer boyfriend sẽ là thiết kế không thể thiếu trong tủ đồ thời trang Thu – Đông của mọi tín đồ của phong cách thời trang menswear.\n\nSở hữu những đường cắt đầy nam tính, những chiếc áo khoác blazer boyfriend luôn nằm trong danh sách các thiết kế yêu thích của mọi cô nàng sở hữu phong cách thời trang hơi hướng menswear cá tính. Khi tiết trời giao mùa từ Thu sang Đông, giới mộ điệu lại dành sự ưu ái cho blazer boyfriend vì tính năng giữ ấm và khả năng bắt nhịp cực “ngọt” cùng dòng chảy thời trang những ngày giao mùa.\n\nKhác với những chiếc áo blazer thông thường, blazer boyfriend “ghi điểm” trong mắt các cô nàng cá tính bởi đường nét thiết kế nam tính, mạnh mẽ, từ phom dáng oversize, phần cầu vai rộng và đứng cho đến chi tiết cổ áo cứng cáp.                ', 6464, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(28, NULL, NULL, 3, 14, 'ÁO BLAZER TAY NGẮN – LỰA CHỌN “GIẢI NHIỆT” CHO THỜI TRANG CÔNG SỞ', 'ao-blazer-ngan-tay.jpg', 'bai-viet-demo-tren-8811-luot-xem-cua-tran-thi-yen-nhi', 'Là lựa chọn thay thế hoàn hảo cho kiểu áo blazer truyền thống, thiết kế áo ngắn tay kết hợp với các món đồ cơ bản mang đến vẻ ngoài thanh lịch và thoải mái trong mùa Hè.\n\nKhí hậu mùa Hè có thể khiến cô nàng công sở băn khoăn khi chọn và phối đồ với áo blazer. Làm thế nào để giữ được vẻ chỉn chu, chuyên nghiệp khi đến các sự kiện quan trọng nhưng vẫn cảm thấy thoải mái, dễ chịu? Lúc này, áo blazer tay ngắn là “vị cứu tinh” cho bạn.             Áo blazer và áo thun là cách kết hợp đơn giản nhưng không kém phần năng động. Với cách phối layer này, bạn có thể linh hoạt thay đổi theo điều kiện thời tiết. Khi trời nóng, bạn nên chọn áo thun hai dây và để hở vài cúc áo blazer. Ngược lại, áo thun chất liệu dày hơn và blazer cài cúc sẽ phù hợp với những ngày se lạnh. Bạn có thể tạo điểm nhấn cho bộ trang phục smart casual bằng một số phụ kiện nổi bật như kính mát gọng vuông, vòng cổ to bản và đi boots thay vì giày cao gót.           Áo thun, croptop hoặc áo lụa hai dây là vài gợi ý phù hợp cho phần áo mặc bên trong. Ngoài ra, để tạo điểm nhấn cho phần cổ trống trải, bạn nên đeo thêm vòng cổ nhiều lớp hoặc hoa tai to bản. Quần shorts cạp cao thích hợp với những cô gái có vóc dáng nhỏ nhắn. Nếu làm việc trong môi trường năng động, bạn có thể phối short suit cùng giày sneakers hoặc sandals chiến binh phá cách.\n\nVới những bạn sở hữu chiều cao khiêm tốn, kết hợp thắt lưng với áo blazer tay ngắn là cách tăng chiều cao hiệu quả vì khoảng cách giữa eo và chân sẽ trông dài hơn. Nếu áo blazer của bạn không kèm dây eo, hãy tận dụng chiếc thắt lưng bản nhỏ có màu sắc tương đồng hoặc đối lập với áo khoác. Bạn có thể tham khảo thêm một số cách biến tấu blazer và thắt lưng khác để làm mới trang phục công sở.  Một gợi ý kết hợp dành cho những cô nàng phá cách, áo blazer và bralette. Để phù hợp với môi trường làm việc, hãy mặc bralette có chất liệu, màu sắc tương đồng với trang phục mặc ngoài và chỉ để hờ một cúc áo trên. Cuối cùng, một chiếc túi kẹp nách đồng điệu sẽ giúp tổng thể thêm phần sành điệu và ấn tượng.    Bạn có thể mặc blazaer phom rộng vạt chéo như một chiếc áo sơ mi và kết hợp với quần tây hoặc quần shorts. Đối với những chiếc áo khoác dáng dài, hãy biến chúng thành một chiếc váy ngắn trên gối (blazer dress) cho những buổi dạo phố cuối tuần. Các cô gái theo đuổi phong cách tối giản có thể kết thân với kiểu áo blazer kẻ ô hoặc họa tiết răng sói (houndstooth) màu trung tính. Sử dụng phụ kiện khác màu làm điểm nhấn cho bạn vẻ ngoài très chic như những quý cô Pháp.                                                                        ', 8812, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(29, 21, NULL, 2, 9, 'THỜI TRANG CÔNG SỞ MÙA HÈ – SĂN LÙNG NHỮNG ITEM “SIÊU GIẢI NHIỆT”', 'thoi-trang-cong-so.jpg', 'bai-viet-demo-tren-4798-luot-xem-cua-nguyen-truong-vi', 'Vừa thoáng mát vừa đảm bảo hình ảnh chuyên nghiệp, dưới đây là 3 món đồ thời trang công sở bạn không nên bỏ qua trong Hè này.\n\nThời trang công sở vào những ngày nắng nóng không chỉ cần đặc biệt thoáng mát mà còn giúp tăng hứng khởi làm việc. Vừa thoải mái khi đến văn phòng vừa có thể đồng hành trong chuyến du lịch sắp tới, dưới đây là 3 gợi ý bạn nên thêm vào tủ quần áo.   Vải lanh hay linen là chất liệu hoàn hảo dành cho mùa Hè. Có độ thấm hút cao và mềm mại, trang phục làm từ vải lanh không chỉ mang lại cảm giác thoáng mát, dễ chịu mà còn rất bền chắc, ít bị sờn. Linen cùng với lụa, len và bông là những loại vải tự nhiên, thân thiện với môi trường và ít gây dị ứng.      Vải linen thông thường sẽ có màu trắng ngà hoặc be, kem. Để tạo nên vẻ ngoài trang nhã, thanh lịch, bạn nên kết hợp bộ suit làm từ vải lanh cùng áo thun trắng và phụ kiện đơn giản.  Nếu như bạn muốn tạm gác chiếc áo thun hoặc sơmi quen thuộc, tại sao không thử khoác lên người chiếc áo ren điệu đà? Các chất liệu mềm mại khác như cotton, lụa… cũng là lựa chọn thoải mái cho ngày Hè.\n\nĐối với những tín đồ theo đuổi phong cách Bohemian, sự kết hợp giữa áo ren và chân váy ren là không thể bỏ qua. Vẻ ngoài thanh thoát, bay bổng làm dịu đi phần nào thời tiết nắng nóng ngày Hè.\n\nTủ đồ thời trang công sở không thể thiếu giày cao gót. Trong những ngày di chuyển nhiều, bạn có thể ưu tiên những lựa chọn thoải mái hơn như giày đế xuồng, sandals cao gót, giày mũi nhọn gót thấp.                                                                          ', 4799, 2, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(30, 14, NULL, 3, 9, '6 “KỊCH BẢN” BIẾN HOÁ TỦ ĐỒ CÔNG SỞ THỜI THƯỢNG TUYỆT ĐỐI VỚI SNEAKERS', 'AcielleStyleDuMonde.jpg', 'bai-viet-demo-tren-8489-luot-xem-cua-nguyen-truong-vi', 'Những đôi sneakers tưởng chừng sinh ra để “hủy diệt” để nét thanh lịch công sở nay đã trở thành bảo bối “nâng niu” đôi chân và chiều chuộng phong cách của các tín đồ thời đại mới.\n\nVăn phòng thời 4.0 dần ít đi những đôi cao gót “lênh khênh” mà thay vào đó là sự “lên ngôi” của sneakers. Không chỉ giúp phái đẹp dễ dàng di chuyển cả ngày, xu hướng này còn góp phần tạo nên cuộc cách mạng thời trang công sở ưu tiên tính thoải mái. Tuy nhiên, để giữ nguyên phong thái chỉn chu cần có và khiến sải bước của mỗi cô gái đều duyên dáng, ELLE sẽ mách bạn 5 bản phối đồ “sang trọng hóa” đôi sneakers. Nếu bạn e ngại mặc suit có phần cứng nhắc và làm mình “cộng tuổi”, hãy thử phối chúng với một đôi giày thể thao. Chắc chắc set đồ sẽ vừa đảm bảo sự đứng đắn, vừa mang hơi thở trẻ trung và sành điệu. Lựa chọn chunky sneakers siêu “hot” gần đây, layout thời trang của bạn sẽ trở nên trendy và cũng “gian dối” hơn trong khoản chiều cao vì vài centimet của phần đế độn. Trong tất cả các lựa chọn màu sắc, trắng cơ bản phù hợp nhất cho môi trường công sở bởi sự thanh lịch “vượt thời gian”.     Quá lười mix-and-match? Một chiếc đầm maxi và đôi sneakers sẽ giải quyết tất cả. Váy liền và giày thể thao chính là bộ đôi “trái dấu” bù trừ cho nhau. Đây là bản phối hoàn hảo cho những ngày “thèm thuồng” nét thướt tha nhưng vẫn cần đến sự linh hoạt và tính ứng dụng. Đầm maxi từ lâu đã là “bí quyết” giúp che đi những khuyết điểm đôi chân. Khi phối cùng sneakers, chiếc váy “thừa nữ tính” được “hô biến” để trở nên phá cách hơn.\n\nQuần tây và áo sơ mi có thể xem như “chuẩn mực” của thời trang công sở. Nếu còn đóng thùng và đi giày loafers, không còn nghi ngờ gì nữa, bạn có thể đi thẳng vào sách giáo khoa về lễ nghi ăn mặc! Tuy nhiên, đây là lúc để phá vỡ cảm giác nghiêm nghị đó bằng một đôi giày thể thao mang tín hiệu của những cuộc vui. Để tổng thể thêm phần thú vị hơn, hãy cân nhắc điểm thêm đôi khuyên tai, nhẫn hay khăn lụa,…     Màu đen toả ra sức cuốn hút mãnh liệt bởi nét huyền bí và mạnh mẽ. Gam màu này cũng cực kì được ưa chuộng nhờ sự linh hoạt, không lỗi thời và luôn “siêu cấp” sang trọng. Khi phối cùng sneakers sắc trắng, tổng thể trang phục trở nên thân thiện và trẻ trung hơn. Ngoài ra, đen cũng là màu cực kì phù hợp cho những nàng “đầy đặn” muốn trở nên thon gọn trong tích tắc.      Vừa cá tính, vừa năng động, sneakers khi được phối cùng jumpsuit chính là hiện thân của những cô gái phố thị cá tính. Đây là combo tuy “kín cổng cao tường” nhưng lại cực kì “hút mắt”. Một chiếc jumpsuit mang hơi hướng work wear (trang phục lao động) khi được kết đôi chunky sneakers sẽ đem lại nét nam tính đầy cuốn hút. Tuy nhiên, công thức này phù hợp hơn cho những cô nàng tự tin vào chiều cao và “mình hạc xương mai”. \n\nKhi sneakers và quần jeans có phần bụi bặm được “thuần hóa” bởi vẻ đẹp thanh lịch của blazer, phong cách công sở của bạn sẽ như được “thổi một làn gió mới”. Để khiến đồng nghiệp được một phen trầm trồ vì độ sành điệu, bạn có thể “chơi trội” bằng cách phối những màu sắc nổi bật đang như cam, hồng, xanh lá,…                                              ', 8490, 0, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL),
(31, NULL, NULL, 1, 9, 'CẢM HỨNG THỜI TRANG TỪ MAX (SADIE SINK) CÙNG DÀN SAO TRONG “SIÊU PHẨM” STRANGER THINGS', 'stranger-things-outfits-ideas.jpeg', 'bai-viet-demo-tren-1402-luot-xem-cua-nguyen-truong-vi', 'Trải qua bốn mùa, sức nóng của series Stranger Things vẫn chưa có dấu hiệu hạ nhiệt. Phong cách thời trang đầy màu sắc trong phim cũng là một điểm thu hút, đưa khán giả đến gần hơn với aesthetic thập niên 80.\n\nÝ tưởng cho Stranger Things bắt nguồn từ một dự án bắt cóc trẻ em có thật mang tên Montauk, ở Long Island (Mỹ) vào những năm 1980. Từng thước phim đều là một bức tranh lột tả sống động về văn hoá cũng như thời trang trong giai đoạn đầy hoài niệm này. Đây được xem là một trong những thời kỳ nhộn nhịp và sống động nhất của lịch sử thời trang với sự “lên ngôi” của chất liệu denim và quần áo đa sắc màu từ sản nhảy Disco.       Nhắc đến thập niên 80, không thể thiếu những chiếc áo khoác denim và quần jeans dáng suông, dáng baggy. Chất liệu bụi bặm này đã tạo nên phong cách thời trang học đường vô cùng đặc trưng thời bấy giờ. Stranger Things đã cho thấy cách “trưng diện” của giới trẻ 40 năm trước qua loạt bản phối item denim với áo thun hay chân váy họa tiết.     Phong cách menswear phổ biến ngày nay thật ra đã tồn tại từ rất lâu vào khoảng thập niên 30 của thế kỷ trước. Lối ăn mặc mang tinh thần mạnh mẽ, khẳng định nữ quyền lại “vô tình” hợp lý với nội dung của bộ phim ăn khách này. Hình ảnh cô nàng Robin (Maya Hawke thủ vai) trong bộ suit hay blazer cá tính đã làm “luỵ tim” biết bao chàng trai và cả cô gái.       Stranger Things được đánh khá cao về phần màu sắc. Có lẽ một phần do sự giàu có của lối thẩm mỹ trên sàn nhảy Disco, việc tô đậm vẻ đẹp hoài niệm của thập niên 80 bằng tạo hình và màu phim trở nên dễ dàng và có định hướng hơn. Trang phục sặc sỡ kết hợp cùng phụ kiện bản to kiểu hippie chính là những yếu tố chính để nhận diện phong cách thời trang này.\n\n               Không thể phủ nhận dàn sao nhí đã đóng góp rất lớn giúp Stranger Things trở thành một trong những bộ phim đắt giá nhất hiện nay. Tuy nhiên, trong mùa bốn, cô nàng Sadie Sink (trong vai Max) bỗng vụt sáng và trở thành tâm điểm không chỉ qua lối diễn xuất xuất thần mà còn ở phong cách ăn mặc old school năng động và cuốn hút.                                Nếu ai theo dõi từ những mùa đầu của series, chắc hẳn sẽ nhận ra Max chính là một fan girl chính hiệu của kẻ sọc. Khán giả không ít lần bắt gặp cô nàng xuất hiện trong những bản mix & match bao gồm quần shorts, quần jeans kết hợp cùng áo thun đa sắc màu mang hoạ tiết kẻ ngang.', 1403, 1, '2022-07-04 09:20:00', '2022-07-04 09:20:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_feedback`
--

CREATE TABLE `article_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(4) NOT NULL,
  `is_rejected` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_feedback`
--

INSERT INTO `article_feedback` (`id`, `article_id`, `customer_id`, `comment`, `rating`, `is_rejected`, `created_at`, `updated_at`) VALUES
(1, 22, NULL, 'Sunt dolor nobis est voluptatum in laborum reiciendis. Nobis ab rerum odit tempora velit pariatur voluptatum. Unde soluta omnis doloremque quas et.', 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(2, 27, NULL, 'Placeat repellat omnis aut dolorem ad nemo sint. Maiores in sint aliquid. Ducimus consequatur tempora voluptatem dolores minus.', 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(3, 5, 10, NULL, 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(4, 13, 11, 'Quod in quas voluptatum corporis. Dolorum sed asperiores tempora natus. Iste quia asperiores est voluptatem saepe.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(5, 4, 14, 'Libero dolores et dolores laudantium quasi. Ea ut dolores voluptatem et.', 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(6, 20, 9, 'Consequatur tempora facilis rem sint odio eaque deleniti. Suscipit aut quae ut dolores enim voluptas aut. Corporis at officiis porro id.', 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(7, 13, 10, 'Perferendis consequatur soluta quo sit. Et natus eum quia asperiores suscipit enim distinctio.', 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(8, 26, NULL, NULL, 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(9, 21, NULL, NULL, 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(10, 24, NULL, 'Ipsum beatae quasi et officiis earum temporibus vitae. Dolore iusto dolorum sequi eligendi quisquam. Quod odit dolor aut adipisci ducimus officia.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(11, 22, NULL, 'In et eum voluptatum debitis sit eius qui. Nisi impedit aut aut exercitationem eum.', 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(12, 28, NULL, 'Excepturi corrupti quia sit est magni qui est. Nostrum dicta perspiciatis quia suscipit vitae.', 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(13, 13, NULL, 'Assumenda sit consequatur voluptatem adipisci autem harum quia. Illum et sit molestiae neque. Rem est molestias cumque.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(14, 9, 14, NULL, 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(15, 22, 9, 'Voluptates consequuntur voluptatem distinctio tempore. Atque labore voluptatem rerum voluptatem corporis. At doloribus aut consequatur.', 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(16, 14, 11, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(17, 3, NULL, 'Impedit ut cum qui magni. Praesentium aut odio sit numquam sint et labore. At adipisci perspiciatis quia ut temporibus explicabo.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(18, 12, NULL, 'Numquam quidem qui fugiat porro sit vero sed. Culpa voluptatum qui nemo odit ut. Sint deleniti nam aperiam mollitia animi in.', 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(19, 31, 10, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(20, 7, 10, NULL, 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(21, 27, 14, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(22, 13, 10, NULL, 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(23, 27, 10, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(24, 4, NULL, NULL, 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(25, 10, NULL, 'Iste assumenda voluptate unde sequi sed. Beatae facilis quaerat est illum ea veritatis fugit.', 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(26, 20, NULL, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(27, 10, NULL, 'Rerum adipisci quia voluptatem qui. Blanditiis consequatur quia consequatur qui et eveniet vero. Voluptates ipsa soluta iure ea qui recusandae.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(28, 31, NULL, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(29, 20, NULL, 'Deserunt vel et sit voluptatibus. Error odit fuga ut eos sed. Praesentium at ab ea asperiores tempora. Enim sed et et maxime.', 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(30, 31, 11, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(31, 16, 11, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(32, 6, 10, 'Asperiores labore quia sunt dolores eum et voluptas. Harum aut sint quis. A ducimus dolores minima enim.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(33, 6, NULL, NULL, 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(34, 12, 14, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(35, 21, 9, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(36, 14, NULL, 'Cum tempora in inventore voluptatem. Rerum quaerat minima similique enim ipsa. Autem ut sit quia molestiae sed.', 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(37, 3, 10, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(38, 5, NULL, 'Et suscipit aliquid deserunt voluptates quidem. Aut cum consequatur voluptatem sunt minus impedit autem quia. Illum commodi sit quisquam quia libero.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(39, 31, 10, 'Eum inventore iste voluptas veniam. Rerum explicabo tempora vero officia. Quisquam delectus sit nostrum qui consequatur quibusdam voluptas.', 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(40, 12, NULL, NULL, 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(41, 13, NULL, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(42, 10, NULL, 'Magni repellat quia aut aut. Consequuntur aspernatur repudiandae delectus dicta consequuntur et. Est esse ea maxime eos dolores aut dolorem.', 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(43, 27, NULL, NULL, 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(44, 5, 11, 'Veniam consequatur aut tenetur atque consequuntur. Ea voluptas officia eos. Ad enim culpa est dolore non nulla.', 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(45, 26, NULL, NULL, 5, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(46, 14, 14, NULL, 2, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(47, 30, 10, 'Eaque alias recusandae ad non. Ipsa consequuntur in ullam. Consequatur non non qui rerum quae.', 1, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(48, 23, 10, NULL, 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(49, 9, 14, 'Rerum accusamus natus in quia. Est in et quis ut rerum fugit. Magnam et voluptas est omnis. Officia voluptates sit hic dolore.', 4, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14'),
(50, 22, 10, 'Corporis magnam a dicta consequatur nostrum. Nihil occaecati reiciendis est repellat exercitationem. Aut dolore id a iure.', 3, 0, '2022-07-04 09:26:14', '2022-07-04 09:26:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_status` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `employee_id`, `brand_name`, `brand_slug`, `brand_image`, `brand_description`, `brand_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 'Dior', 'dior', '', '...', 1, '2022-07-04 09:20:35', NULL, NULL),
(2, 11, 'Chanel', 'chanel', '', '...', 1, '2022-07-04 09:20:35', NULL, NULL),
(3, 14, 'Gucci', 'gucci', '', '...', 1, '2022-07-04 09:20:35', NULL, NULL),
(4, 11, 'Luis Vuitton', 'luis-vuitton', '', '...', 1, '2022-07-04 09:20:35', NULL, NULL),
(5, 9, 'Luôn vui tươi', 'luon-vui-tuoi', '', '...', 1, '2022-07-04 09:20:35', NULL, NULL),
(6, 10, 'Never gonna give you up', 'never-gonna-give-you-up', '', '...', 1, '2022-07-04 09:20:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `employee_id`, `parent_id`, `category_name`, `category_slug`, `category_image`, `category_description`, `category_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, NULL, 'Áo thun', 'ao-thun', '123456', '...', 1, NULL, NULL, NULL),
(2, 14, NULL, 'Áo sơ mi', 'ao-so-mi', '222222', '...', 1, NULL, NULL, NULL),
(3, 10, NULL, 'Đầm, váy', 'dam-vay', '1', '...', 0, NULL, NULL, NULL),
(4, 9, NULL, 'Quần tây', 'quan-tay', '1', '...', 0, NULL, NULL, NULL),
(5, 9, NULL, 'Quần kaki', 'quan-kaki', '123456', '...', 1, NULL, NULL, NULL),
(6, 14, NULL, 'Quần jean', 'quan-jean', '222222', '...', 1, NULL, NULL, NULL),
(7, 14, NULL, 'Áo khoác', 'ao-khoac', '123456', '...', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_user`
--

CREATE TABLE `customer_user` (
  `id` int(11) NOT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `approved` int(1) DEFAULT 0,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_user`
--

INSERT INTO `customer_user` (`id`, `email`, `password`, `image`, `status`, `approved`, `phone`, `address`, `create_at`, `update_at`, `fullname`) VALUES
(15, 'phuongdinh3100@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, 0, 1, '0356429869', '497 Phan Văn Trị P5, Gò Vấp Tp.HCM', '2022-07-02 18:17:02', '2022-07-02 18:17:02', 'Đinh Tiến Phương'),
(16, 'nguyentruongvi2203@gmail.com', '25f9e794323b453885f5181f1b624d0b', '600px-Talon_Esports_full_allmode.png', 0, 0, '0387758075', '40 Thống nhất', '2022-07-19 11:52:13', '2022-07-19 11:52:13', 'truongvi nguyen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cu_code`
--

CREATE TABLE `cu_code` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `code_expried` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cu_code`
--

INSERT INTO `cu_code` (`id`, `email`, `code`, `create_at`, `code_expried`) VALUES
(8, 'phuongdinh3100@gmail.com', '741c11719a07e33604edb1dd605e211e', '2022-07-02 23:05:03', NULL),
(9, 'phuongdinh3100@gmail.com', '2a2af1a09813c3af45797543fd2643bb', '2022-07-04 21:18:03', '2022-07-04 21:19:03'),
(10, 'phuongdinh3100@gmail.com', 'a227b2b9d51e22c24c6f53544e6dc9b9', '2022-07-04 21:19:21', '2022-07-04 21:20:21'),
(11, 'nguyentruongvi2203@gmail.com', 'c3991844e086ec085cbf013327569e3c', '2022-07-19 11:52:13', '2022-07-19 11:54:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cu_forgotpass`
--

CREATE TABLE `cu_forgotpass` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `code_expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cu_forgotpass`
--

INSERT INTO `cu_forgotpass` (`id`, `email`, `code`, `create_at`, `code_expired`) VALUES
(1, 'phuongdinh3100@gmail.com', '762935', '2022-07-13 16:04:31', '2022-07-13 16:05:31'),
(2, 'phuongdinh3100@gmail.com', '578440', '2022-07-13 16:04:48', '2022-07-13 16:05:48'),
(3, 'phuongdinh3100@gmail.com', '391206', '2022-07-13 16:05:18', '2022-07-13 16:06:18'),
(4, 'phuongdinh3100@gmail.com', '297717', '2022-07-13 16:05:20', '2022-07-13 16:06:20'),
(5, 'phuongdinh3100@gmail.com', '179228', '2022-07-13 16:05:20', '2022-07-13 16:06:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product_detail`
--

CREATE TABLE `image_product_detail` (
  `id` int(11) NOT NULL,
  `image_name` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `image_product_detail`
--

INSERT INTO `image_product_detail` (`id`, `image_name`, `image`, `product_id`) VALUES
(26, 'sản phẩm demo', 'received_267143777212585.png', 11),
(27, 'sản phẩm demo', 'IMG_20170819_112529.jpg', 11),
(31, 'Áo thun Polo nam phối sọc ATP0031', '3_5af2ae5a14b847a39805d957a4c4eaf1_master.jpg', 12),
(33, 'Sơ Mi Nam Tay Dài Đen Trơn SMD0082', '5_517cf77eb4304410925d793813aca947_master.jpg', 13),
(34, 'Sơ Mi Nam Tay Dài Đen Trơn SMD0082', '4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg', 13),
(35, 'Sơ Mi Nam Tay Dài Đen Trơn SMD0082', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 13),
(40, 'sản phẩm demo', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 14),
(45, 'sản phẩm demo', '8_2b1e75367172495097e5195fc7ce2a73_master.jpg', 14),
(46, 'sản phẩm demo', '5_517cf77eb4304410925d793813aca947_master.jpg', 14),
(47, 'sản phẩm demo', '4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg', 14),
(50, 'Áo Khoác Blazer Nam Premium AVE0004', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 15),
(70, 'sản phẩm demo1', '5_517cf77eb4304410925d793813aca947_master.jpg', 16),
(71, 'sản phẩm demo1', '4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg', 16),
(72, 'sản phẩm demo1', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 16),
(73, 'Áo Khoác Blazer Nam Premium AVE000', '4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg', 15),
(74, 'Áo Khoác Blazer Nam Premium AVE000', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 15),
(75, 'Áo Khoác Blazer Nam Premium AVE000', '1_546937fa454642cca5ffe1a3c3db5fda_master.jpg', 15),
(87, 'Áo Khoác Blazer Nam Premium AVE0004', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 19),
(88, 'Áo sơ mi đen trơn vải lụa', '8_2b1e75367172495097e5195fc7ce2a73_master.jpg', 17),
(89, 'Áo sơ mi đen trơn vải lụa', '5_517cf77eb4304410925d793813aca947_master.jpg', 17),
(90, 'Áo sơ mi đen trơn vải lụa', '4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg', 17),
(91, 'Áo sơ mi đen trơn vải lụa', '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 17),
(92, 'Áo sơ mi đen trơn vải lụa', '2_9f7cb51b60c6465ca7d32d21d9f2948e_master.jpg', 17),
(96, 'Quần Kaki Nam Dài Đen QKK0031', '5_4ee11d381fba405b954852b4c936974c_master.jpg', 20),
(97, 'Quần Kaki Nam Dài Đen QKK0031', '3_e47a2386c8bf461ea1598fe7904fb800_master.jpg', 20),
(101, 'Áo Thun Cổ Tròn In Hình ATN0139', '4_b9f36da2f6f94a6483c122c398894e29_master.jpg', 21),
(102, 'Áo Thun Cổ Tròn In Hình ATN0139', '2_d879caff2b064623b1cb072d9b53de5c_master.jpg', 21),
(103, 'Áo Thun Cổ Tròn In Hình ATN0137', '6_ccf7fd9ea65b4d11a266427b58c7a182_master.jpg', 22),
(104, 'Áo Thun Cổ Tròn In Hình ATN0137', '5_043103e7f3864e6e82f428112dd17956_master.jpg', 22),
(105, 'Áo Thun Cổ Tròn In Hình ATN0137', '4_9d07e47961a1466fb19c8c0cfede2de7_master.jpg', 22),
(106, 'Áo Thun Cổ Tròn In Hình ATN0137', '3_98799401dcc74226b5d04cd1cd07f8a8_master.jpg', 22),
(107, 'Áo Thun Cổ Tròn In Hình ATN0137', '2_8af810c5206d4fddb7f344db5edea74b_master.jpg', 22),
(108, 'Áo Thun Cổ Tròn In Hình ATN0135', '5_fd1abedf51c54486aa1d847c3eaca389_master.jpg', 23),
(109, 'Áo Thun Cổ Tròn In Hình ATN0135', '4_f4b13cd2ecae4606b7a4c1133695fc74_master.jpg', 23),
(110, 'Áo Thun Cổ Tròn In Hình ATN0135', '3_face0efc52f14d4aa17aa79287d915e0_master.jpg', 23),
(111, 'Áo Thun Cổ Tròn In Hình ATN0135', '2_6fd20e71c1ce479bb91ef8bf9d205b0b_master.jpg', 23),
(112, 'Áo Thun Cổ Tròn In Hình ATN0135', '1_10bd7541336a4a3794d0b1d17660f3a7_master.jpg', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_04_29_144210_product', 2),
(6, '2022_05_18_080037_create_category_table', 3),
(7, '2022_05_18_095504_create_brand_table', 4),
(8, '2022_05_19_103820_create_article_table', 4),
(9, '2022_05_20_030814_create_article_feedback_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(10) NOT NULL,
  `notification_name` varchar(225) NOT NULL,
  `notification_content` text NOT NULL,
  `notification_image` varchar(225) NOT NULL,
  `notification_status` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `notification_name`, `notification_content`, `notification_image`, `notification_status`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Đơn hàng mới', 'truongvi nguyenvừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 2, 14, '2022-07-19 07:08:05', '2022-07-19 07:08:05'),
(2, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 1, 15, '2022-07-19 07:38:56', '2022-07-19 07:38:56'),
(3, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 1, 16, '2022-07-19 08:44:18', '2022-07-19 08:44:18'),
(4, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 1, 17, '2022-07-19 08:54:38', '2022-07-19 08:54:38'),
(5, 'Đơn hàng mới', 'Nguyễn Văn Người Mua vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 18, '2022-07-19 09:58:26', '2022-07-19 09:58:26'),
(6, 'Đơn hàng mới', 'Duy Nguyễn vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 19, '2022-07-19 10:00:53', '2022-07-19 10:00:53'),
(7, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 28, '2022-07-19 10:57:14', '2022-07-19 10:57:14'),
(8, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 29, '2022-07-19 11:12:39', '2022-07-19 11:12:39'),
(9, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 30, '2022-07-19 11:20:29', '2022-07-19 11:20:29'),
(10, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 31, '2022-07-19 11:24:52', '2022-07-19 11:24:52'),
(11, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 32, '2022-07-19 11:28:07', '2022-07-19 11:28:07'),
(12, 'Đơn hàng mới', 'Trần Thị Yến Nhi vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 33, '2022-07-19 11:33:55', '2022-07-19 11:33:55'),
(13, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 34, '2022-07-19 11:52:40', '2022-07-19 11:52:40'),
(14, 'Đơn hàng mới', 'Vi Đẹp Trai vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '1', 1, 35, '2022-07-19 12:00:38', '2022-07-19 12:00:38'),
(15, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 1, 36, '2022-07-19 13:05:44', '2022-07-19 13:05:44'),
(16, 'Đơn hàng mới', 'truongvi nguyen vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 1, 37, '2022-07-19 13:10:17', '2022-07-19 13:10:17'),
(17, 'Đơn hàng mới', 'VAICACVU vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé', '600px-Talon_Esports_full_allmode.png', 1, 38, '2022-07-19 13:15:27', '2022-07-19 13:15:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_methods` int(11) NOT NULL,
  `ship_fee` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_note`, `payment_methods`, `ship_fee`, `total_quantity`, `total_price`, `status`, `customer_id`, `created_at`, `updated_at`) VALUES
(10, 'truongvi nguyen', '0387758075', '', '40 Thống nhất', 'fgtgtttg', 2, 0, 100, 25000000, 1, 16, '2022-07-19 07:04:28', '2022-07-19 07:04:28'),
(11, 'truongvi nguyen', '0387758075', '', '40 Thống nhất', 'fgtgtttg', 1, 0, 100, 25000000, 1, 16, '2022-07-19 07:06:30', '2022-07-19 07:06:30'),
(12, 'truongvi nguyen', '0387758075', '', '40 Thống nhất', 'fgtgtttg', 1, 0, 100, 25000000, 1, 16, '2022-07-19 07:07:06', '2022-07-19 07:07:06'),
(19, 'Duy Nguyễn', '0387758075', 'ti@hmail.com', 'Tiền Giang / Thị xã Cai Lậy / thạnh lộc', 'sdccdcdcc', 1, 30000, 1, 250000, 0, 0, '2022-07-19 10:00:53', '2022-07-19 10:00:53'),
(20, 'truongvi nguyen', '0387758075', 'nguyentruongvi2203@gmail.com', 'Tiền Giang / Huyện Trà Cú / thạnh lộc', 'uiugiugiug', 1, 30000, 1, 250000, 0, 0, '2022-07-19 10:41:15', '2022-07-19 10:41:15'),
(35, 'Vi Đẹp Trai', '0387758075', 'nguyentruongvi2203@gmail.com', 'Gia Lai / Quận Tân Phú / thạnh lộc', 'dcdcdcdcd', 1, 0, 3, 660000, 2, 0, '2022-07-19 12:00:34', '2022-07-19 12:00:50'),
(36, 'truongvi nguyen', '0387758075', 'nguyentruongvi2203@gmail.com', '40 Thống nhất', NULL, 1, 30000, 1, 250000, 1, 16, '2022-07-19 13:05:44', '2022-07-19 13:05:44'),
(37, 'truongvi nguyen', '0387758075', 'nguyentruongvi2203@gmail.com', '40 Thống nhất', NULL, 1, 30000, 1, 250000, 1, 16, '2022-07-19 13:10:14', '2022-07-19 13:10:14'),
(38, 'VAICACVU', '0999999999', 'bestphivu97@gmail.com', 'BINH THANH', NULL, 1, 0, 125, 100500000, 1, 16, '2022-07-19 13:15:24', '2022-07-19 13:15:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nguyentruongvi2203@gmail.com', '$2y$10$4AeuFXLnA4G35qJJc5wvpOreHLiFto04ylNU8fJ3eFMYFPA3IOTHO', '2022-05-01 00:41:12'),
('nhitty28@gmail.com', '$2y$10$tS9boWkel4.z6iCwkCRD4uy/ZSqLehVuM/vMVQtHjI7FS63xquDfS', '2022-05-04 05:04:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price_sale` double(8,2) DEFAULT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `product_status` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price_sale`, `product_price`, `product_content`, `category_id`, `brand_id`, `product_status`, `product_image`, `product_tag`, `product_user`, `created_at`, `updated_at`) VALUES
(12, 'Áo thun Polo nam phối sọc', NULL, 250000.00, '<div><h2>Mô tả</h2></div><div><div>Áo thun Polo Nam tại Kenta luôn đẹp và sang trọng, chất liệu vải&nbsp;siêu đẹp, mịn và mát. Với form dáng thoải mái, tôn dáng cho người mặc, đủ size từ 50kg đến 90kg cho các bạn nam. Tay áo và cổ áo được dệt riêng có bổ sung sợi Spandex để đảm bảo độ đàn hồi, chống nhão qua các lần giặt.&nbsp;Chất liệu: 95% cotton - 5% Spandex thấm hút và thoáng khí tốtHướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.</div></div>', 6, 1, 1, '2_09a076d0fc58443cb261674547cf6751_master.jpg', 'aothundep,aothunpolo,aothunnam', 'TRƯỜNG DUY', '2022-05-03 05:25:07', '2022-07-06 06:23:21'),
(13, 'Sơ Mi Nam Tay Dài Đen Trơn test', 275000.00, 255000.00, '<h2>Mô tả</h2><h2><div></div><div>Sơ mi tay dài phiên bản cải tiến, item&nbsp;luôn sang trọng và&nbsp;lịch lãm. Chất vải thoáng mát và ít nhăn, thấm hút cực tốt. Đường may cuốn sườn tinh tế, form cực chuẩn, chất vải co giãn nhẹ, mịn mát tối ưu.&nbsp;Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.</div></h2>', 2, 5, 1, '1_546937fa454642cca5ffe1a3c3db5fda_master.jpg', 'aothundep,aosomi,aosomidep', 'TRƯỜNG DUY', '2022-05-03 05:28:30', '2022-05-21 07:12:59'),
(14, 'sản phẩm demo', 290000.00, 250000.00, 'SÂSASASAS', 3, 6, 1, '2_9f7cb51b60c6465ca7d32d21d9f2948e_master.jpg', 'aothundep', 'TRƯỜNG DUY', '2022-05-03 21:18:33', '2022-05-03 21:18:33'),
(15, 'Áo Khoác Blazer Nam Premium AVE000 đẹp', NULL, 950000.00, 'Áo khoác Blazer là một trong nhưng món đồ không thể thiếu trong tủ đồ của các chàng trai thời trang. Ngoài việc dễ mặc, mẫu áo này còn cực kì dễ mix trong mọi dịp. Khác với áo Vest, Blazer sẽ có form dáng trẻ trung hơn, form thường qua eo một tí, nên dễ phối với nhiều loại quần tây, kaki và quần Jean. Sản phẩm được may thủ công từng chi tiết, đường may sắc nét và tỉ mỉ. Áo được may 1 lớp dễ phù hợp với thời tiết, nên độ tinh xảo rất cao ở phía trong. Túi ngực có thể để khăn hoặc cài hoa, mặt trong có 3 túi mổ để vật dụng quan trọng. Chất vải cao cấp, mềm mịn và ít nhăn, mau khô và thoáng mát. Form trẻ trung cực đẹp khi mặc.&nbsp;', 7, 1, 1, '5_517cf77eb4304410925d793813aca947_master.jpg', 'aokhoac,aovest,aodep', 'TRƯỜNG DUY', '2022-05-04 05:09:22', '2022-05-19 03:03:36'),
(17, 'Áo sơ mi đen trơn', 290000.00, 250000.00, '4effrfrfrf', 1, 4, 1, '3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg', 'aothundep', 'TRƯỜNG DUY', '2022-05-08 22:41:19', '2022-06-20 20:33:51'),
(20, 'Quần Kaki Nam Dài Đen QKK0031', NULL, 350000.00, 'Quần kaki nam Kenta với form dáng Slim trẻ trung và thời thượng. Chất kaki co giãn, vải siêu mát, thoải mái trong mọi chuyển động. Sản phẩm sẽ đem đến sự hài lòng nhất.Chất liệu: kaki cao cấp siêu mịn, co giãn.&nbsp;Dây kéo: YKK bền bỉHướng dẫn bảo quản:', 5, 1, 0, '2_9f7cb51b60c6465ca7d32d21d9f2948e_master.jpg', 'quankaki,quandai,quandep', 'TRƯỜNG DUY', '2022-05-25 02:41:56', '2022-06-20 20:08:17'),
(21, 'Áo Thun Cổ Tròn In Hình ATN0139', NULL, 220000.00, 'Áo thun cổ tròn, nổi bật với các hình in mạnh mẽ và cá tính, form chuẩn. Thoải mái và thoáng mát khi mặc.Chất liệu: cotton 100%, co giãn 2 chiều,&nbsp;mực in bền màu, bo cổ dệt riêng để giữ form.Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.', 4, 4, 1, '1_29147adedbbb442a80cb6fb6808efa6a_master.jpg', 'aothundep,aothungiamgia', 'TRƯỜNG DUY', '2022-06-20 20:12:40', '2022-06-20 20:12:40'),
(22, 'Áo Thun Cổ Tròn In Hình ATN0137', NULL, 220000.00, 'Áo thun cổ tròn, nổi bật với các hình in mạnh mẽ và cá tính, form chuẩn. Thoải mái và thoáng mát khi mặc.Chất liệu: cotton 100%, co giãn 2 chiều,&nbsp;mực in bền màu, bo cổ dệt riêng để giữ form.Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.', 1, 2, 1, '1_a07557407ef74ccd9aece96903990f11_master.jpg', 'aothundep', 'TRƯỜNG DUY', '2022-06-21 22:43:18', '2022-06-21 22:43:18'),
(23, 'Áo Thun Cổ Tròn In Hình ATN0135', 275000.00, 220000.00, 'Áo thun cổ tròn, nổi bật với các hình in mạnh mẽ và cá tính, form chuẩn. Thoải mái và thoáng mát khi mặc.Chất liệu: cotton 100%, co giãn 2 chiều,&nbsp;mực in bền màu, bo cổ dệt riêng để giữ form.Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.', 4, 3, 1, '1_10bd7541336a4a3794d0b1d17660f3a7_master.jpg', 'aothundep', 'TRƯỜNG DUY', '2022-06-21 22:48:53', '2022-06-21 22:48:53'),
(24, 'Áo Thun Cổ Tròn In Hình ATN0135', NULL, 220000.00, 'Áo thun cổ tròn, nổi bật với các hình in mạnh mẽ và cá tính, form chuẩn. Thoải mái và thoáng mát khi mặc.Chất liệu: cotton 100%, co giãn 2 chiều,&nbsp;mực in bền màu, bo cổ dệt riêng để giữ form.Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.', 1, 4, 1, '1_10bd7541336a4a3794d0b1d17660f3a7_master.jpg', 'aothundep', 'TRƯỜNG DUY', '2022-06-21 22:48:53', '2022-06-21 22:48:53'),
(25, 'Áo Thun Cổ Tròn In Hình đẹp quá', 275000.00, 220000.00, 'Áo thun cổ tròn, nổi bật với các hình in mạnh mẽ và cá tính, form chuẩn. Thoải mái và thoáng mát khi mặc.Chất liệu: cotton 100%, co giãn 2 chiều,&nbsp;mực in bền màu, bo cổ dệt riêng để giữ form.Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.', 6, 5, 1, '1_10bd7541336a4a3794d0b1d17660f3a7_master.jpg', 'aothundep', 'TRƯỜNG DUY', '2022-06-21 22:48:53', '2022-07-07 03:14:41'),
(27, 'sản phẩm demo', NULL, 250000.00, '7ukikikikiki', 3, 5, 1, '600px-Talon_Esports_full_allmode.png', 'aothundep', 'TRƯỜNG DUY', '2022-07-15 13:18:37', '2022-07-15 13:18:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(10) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `import_price` float NOT NULL,
  `price` float NOT NULL,
  `inventory` int(10) NOT NULL,
  `sold` int(10) DEFAULT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `product_size`, `import_price`, `price`, `inventory`, `sold`, `product_id`) VALUES
(3, 'S', 200000, 250000, 6, 0, 17),
(4, 'XXL', 200000, 250000, 11, 0, 17),
(10, 'S', 200000, 250000, 7, 0, 12),
(11, 'M', 200000, 250000, 7, 0, 12),
(12, 'L', 200000, 250000, 4, 0, 12),
(18, 'XL', 200000, 255000, 11, 0, 13),
(20, 'S', 200000, 950000, 50, 0, 15),
(21, 'M', 200000, 950000, 200, 0, 15),
(23, 'XL', 200000, 250000, 4, 0, 17),
(24, 'L', 200000, 950000, 33, 0, 15),
(25, 'M', 200000, 250000, 8, 0, 17),
(26, 'L', 200000, 250000, 3, 0, 17),
(27, 'S', 200000, 255000, 25, 0, 13),
(28, 'M', 200000, 255000, 29, 0, 13),
(29, 'L', 200000, 255000, 44, 0, 13),
(31, 'S', 250000, 350000, 30, 0, 20),
(32, 'M', 250000, 350000, 38, 0, 20),
(33, 'L', 250000, 350000, 35, 0, 20),
(34, 'XL', 250000, 250000, 20, 0, 12),
(35, 'S', 270000, 220000, 30, 0, 21),
(36, 'M', 270000, 220000, 10, 0, 21),
(37, 'L', 270000, 220000, 22, 0, 21),
(38, 'S', 270000, 220000, 20, 0, 22),
(39, 'M', 270000, 220000, 10, 0, 22),
(40, 'M', 100000, 220000, 12, 0, 23),
(41, 'L', 100000, 220000, 8, 0, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_rule` int(10) NOT NULL,
  `add_member` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_img`, `user_rule`, `add_member`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Nguyễn Trường Vi', 'nguyentruongvi2203@gmail.com', NULL, '$2y$10$B6J53AyOOF.gbC6DJIvMauasqmKxjpzIU2GqmUjsNPRXneycWREwm', 'myposter.jpg', 1, 'Nguyễn Trường Vi', NULL, '2022-05-01 04:51:47', '2022-05-01 04:51:47'),
(10, 'TRƯỜNG DUY', 'vintps14865@fpt.edu.vn', NULL, '$2y$10$AWovqijQBfEMrZtCZVICbOgm/7H0Dp1FRNjlD67tciYlCfxHfx2oq', 'z3365000135399_8f970424e54d4faf6530325e8ba3f0dc.jpg', 1, 'Nguyễn Trường Vi', NULL, '2022-05-02 07:50:45', '2022-05-02 07:50:45'),
(11, 'Trần Văn Huỳnh Đức', 'duc.hyunn@gmail.com', NULL, '$2y$10$B0B.DeZbtQLaS/SUkGGWbuu6IJmXasgzah7LuuQSxohhjw5cG50KW', '1_546937fa454642cca5ffe1a3c3db5fda_master.jpg', 1, 'TRƯỜNG DUY', NULL, '2022-05-03 06:32:07', '2022-05-03 06:32:07'),
(14, 'Trần Thị Yến Nhi', 'nhitty28@gmail.com', NULL, '$2y$10$8yA0xtSG6ZmnUyg8..74aeVuMH23sY2vNfXQdL1pnsRMX6F73QloG', '5_517cf77eb4304410925d793813aca947_master.jpg', 1, 'TRƯỜNG DUY', NULL, '2022-05-04 05:00:53', '2022-05-04 05:00:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `=order_detail`
--
ALTER TABLE `=order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_product_id_foreign` (`product_id`),
  ADD KEY `article_brand_id_foreign` (`brand_id`),
  ADD KEY `article_category_id_foreign` (`category_id`),
  ADD KEY `article_employee_id_foreign` (`employee_id`);

--
-- Chỉ mục cho bảng `article_feedback`
--
ALTER TABLE `article_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_feedback_article_id_foreign` (`article_id`),
  ADD KEY `article_feedback_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_employee_id_foreign` (`employee_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_employee_id_foreign` (`employee_id`);

--
-- Chỉ mục cho bảng `customer_user`
--
ALTER TABLE `customer_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cu_code`
--
ALTER TABLE `cu_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `cu_forgotpass`
--
ALTER TABLE `cu_forgotpass`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `image_product_detail`
--
ALTER TABLE `image_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `=order_detail`
--
ALTER TABLE `=order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `article_feedback`
--
ALTER TABLE `article_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer_user`
--
ALTER TABLE `customer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `cu_code`
--
ALTER TABLE `cu_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `cu_forgotpass`
--
ALTER TABLE `cu_forgotpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image_product_detail`
--
ALTER TABLE `image_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `article_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `article_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `article_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `article_feedback`
--
ALTER TABLE `article_feedback`
  ADD CONSTRAINT `article_feedback_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_feedback_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
