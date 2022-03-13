-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: db
-- 生成日時: 2022 年 3 月 12 日 15:01
-- サーバのバージョン： 5.7.36
-- PHP のバージョン: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `learning_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `wishs`
--
DROP TABLE IF EXISTS wishs;
CREATE TABLE `wishs`
(
    `id`      INT(11) NOT NULL,
    `my_wish` VARCHAR(20)  DEFAULT NULL,
    `memo`    VARCHAR(100) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- テーブルのデータのダンプ `wishs`
--

INSERT INTO `wishs` (`id`, `my_wish`, `memo`)
VALUES (9, 'テスト２', 'テスト２'),
       (10, '遊びたーーい', '遊びたい〜〜〜〜'),
       (11, '旅行いきたーーい', '鳥取砂丘もいいな〜〜〜'),
       (12, '旅行に行く', '沖縄〜'),
       (13, '食事に行く', '唐揚げ'),
       (14, 'あれ〜', 'なんで表示できないの〜？'),
       (15, '今度こそ', '頼む！'),
       (16, 'もしかして', '凡ミス？'),
       (17, NULL, 'my Wishに原因があるはず！');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wishs`
--
ALTER TABLE `wishs`
    ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `wishs`
--
ALTER TABLE `wishs`
    MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
