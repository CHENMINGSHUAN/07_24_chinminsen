-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-07-16 11:53:47
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `07_24`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `guidebook`
--

CREATE TABLE `guidebook` (
  `id` int(12) NOT NULL,
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `schedule` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `admit` int(2) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `guidebook`
--

INSERT INTO `guidebook` (`id`, `user_id`, `title`, `date`, `schedule`, `img`, `text`, `admit`, `created_at`, `updated_at`) VALUES
(13, '14', '大濠公園', '2020-04-27', '大濠公園', 'upload/980a26028ca7c484c738073c47401ae269fc89fe.jpg', '<p>今天去福岡城賞櫻花，</p>\r\n<p>肺炎期間，但人潮很多。</p>\r\n<p>&nbsp;</p>\r\n<p>正好是滿開的狀態所以非常美麗。</p>', 0, '2020-07-16 15:49:27.000000', '2020-07-16 15:49:27.000000'),
(14, '19', '博多車站', '2020-07-02', '吃當地名產', 'upload/e98d17a8ef06eec8988c61183b44bd79db42ac76.jpg', '<p>名產</p>', 0, '2020-07-16 16:22:50.000000', '2020-07-16 16:22:50.000000'),
(15, '19', '柳川', '2020-07-02', '搭船', 'upload/d957a5ec788eecb07caabb6ce0a17f85ce32697c.jpg', '<p>聽船夫唱歌</p>\r\n<p>介紹柳川</p>\r\n<p>吃鰻魚</p>\r\n<p>很開心</p>', 0, '2020-07-16 16:43:48.000000', '2020-07-16 16:43:48.000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `book_id` int(12) NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `book_id`, `created_at`) VALUES
(16, 14, 2, '2020-07-15 21:37:58.000000'),
(18, 14, 3, '2020-07-16 10:52:03.000000'),
(19, 14, 4, '2020-07-16 10:52:05.000000'),
(22, 14, 12, '2020-07-16 15:14:53.000000'),
(24, 19, 12, '2020-07-16 15:51:43.000000'),
(35, 19, 13, '2020-07-16 17:09:37.000000'),
(37, 19, 15, '2020-07-16 17:16:54.000000'),
(38, 19, 14, '2020-07-16 17:16:58.000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

CREATE TABLE `member` (
  `id` int(3) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `assertpassword` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`id`, `username`, `name`, `email`, `password`, `assertpassword`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(11, 'muro331331', '陳明瑄', 'muro331@gmail.com', 'mush3131', '', 0, 0, '2020-07-08 10:22:51', '2020-07-09 20:42:16'),
(12, 'muro331331', '陳明瑄', 'murooo331@outlook.co', '1234567', '0', 0, 0, '2020-07-08 20:11:55', '2020-07-08 20:11:55'),
(14, 'muro332', '陳明瑄', 'muro331@gmail.com', 'mush3131', '0', 0, 0, '2020-07-09 16:25:25', '2020-07-10 10:04:31'),
(15, 'muro331', '陳明瑄', 'muro331@gmail.com', 'mush3131', '0', 0, 0, '2020-07-09 20:43:42', '2020-07-09 20:43:42'),
(16, 'muro332444', 'チンミンセン', 'murooo331@outlook.com', 'mush3131', '0', 0, 0, '2020-07-10 10:03:58', '2020-07-10 10:03:58'),
(18, '1', '陳', 'muro331@gmail.com', 'mush3131', '0', 0, 0, '2020-07-16 15:50:54', '2020-07-16 15:50:54'),
(19, '2', 'チンミンセン', 'murooo331@outlook.com', 'mush3131', '0', 0, 0, '2020-07-16 15:51:13', '2020-07-16 15:51:13');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `guidebook`
--
ALTER TABLE `guidebook`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `guidebook`
--
ALTER TABLE `guidebook`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルのAUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- テーブルのAUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
