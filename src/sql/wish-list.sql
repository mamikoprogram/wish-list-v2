-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: db
-- 生成日時: 2022 年 4 月 03 日 13:52
-- サーバのバージョン： 5.7.36
-- PHP のバージョン: 8.0.15

# メモ）カラム名を一部変更しました。

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `learning_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `wishes`
--

CREATE TABLE `wishes` (
                          `id` int(11) NOT NULL,
                          `my_wish` varchar(100) DEFAULT NULL,
                          `memo` varchar(300) DEFAULT NULL,
                          `completion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `wishes`
--

INSERT INTO `wishes` (`id`, `my_wish`, `memo`, `completion`) VALUES
                                                                 (53, '旅行に行く', '沖縄に行く', 0),
                                                                 (56, '遊びに行くぞ〜', '公園に行く〜', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wishes`
--
ALTER TABLE `wishes`
    ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `wishes`
--
ALTER TABLE `wishes`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
