-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 09 日 15:43
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
-- データベース: `06_36_yomodaarika`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `evaluation_table`
--

CREATE TABLE `evaluation_table` (
  `id` int(12) NOT NULL,
  `shop_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ambiance` int(12) NOT NULL,
  `facility` int(12) NOT NULL,
  `convenience` int(12) NOT NULL,
  `comment` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `evaluation_table`
--

INSERT INTO `evaluation_table` (`id`, `shop_name`, `ambiance`, `facility`, `convenience`, `comment`) VALUES
(13, '1', 5, 5, 5, 'すごくよかた。'),
(47, '1', 1, 1, 1, 'よかった！'),
(48, '1', 5, 5, 5, 'iiiii');

-- --------------------------------------------------------

--
-- テーブルの構造 `evaluation_table2`
--

CREATE TABLE `evaluation_table2` (
  `id` int(12) NOT NULL,
  `shop_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ambiance` int(12) NOT NULL,
  `facility` int(12) NOT NULL,
  `convenience` int(12) NOT NULL,
  `comment` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `evaluation_table2`
--

INSERT INTO `evaluation_table2` (`id`, `shop_name`, `ambiance`, `facility`, `convenience`, `comment`) VALUES
(1, '1', 5, 5, 5, 'やいやい');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test', '12345', 0, 0, '2020-07-09 21:37:01', '2020-07-09 21:37:01'),
(2, 'ariii46', 'aaaa', 0, 0, '2020-07-09 22:18:20', '2020-07-09 22:18:20'),
(3, 'yomoda', '1203', 0, 0, '2020-07-09 22:37:22', '2020-07-09 22:37:22');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `evaluation_table`
--
ALTER TABLE `evaluation_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `evaluation_table2`
--
ALTER TABLE `evaluation_table2`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `evaluation_table`
--
ALTER TABLE `evaluation_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- テーブルのAUTO_INCREMENT `evaluation_table2`
--
ALTER TABLE `evaluation_table2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
