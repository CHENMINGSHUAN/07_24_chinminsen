-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-07-02 15:51:36
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
-- テーブルの構造 `member`
--

CREATE TABLE `member` (
  `id` int(3) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `assertpassword` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`id`, `username`, `name`, `email`, `password`, `assertpassword`, `created_at`, `updated_at`) VALUES
(1, '', 'muroo', 'muro331@gmail.com', '0', '', '2020-06-30 11:37:04', '2020-06-30 11:37:04'),
(2, '', 'muroo', 'muro331@gmail.com', '0', '', '2020-06-30 11:37:23', '2020-06-30 11:37:23'),
(3, 'muro331', '陳明瑄', 'muro331@gmail.com', 'mush3131', 'mush3131', '2020-07-01 14:54:10', '2020-07-01 14:54:10'),
(4, 'muro331', 'チンミンセ', 'murooo331@outlook.co', '12345678', '', '2020-07-02 10:11:03', '2020-07-02 10:11:03'),
(5, 'muro331', '1234', 'muro331@gmail.com', 'mush3131', '', '2020-07-02 15:59:48', '2020-07-02 15:59:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
