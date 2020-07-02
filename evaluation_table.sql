-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 02 日 15:49
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
(13, '1', 5, 5, 5, 'すごくよかた。');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `evaluation_table`
--
ALTER TABLE `evaluation_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `evaluation_table`
--
ALTER TABLE `evaluation_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
