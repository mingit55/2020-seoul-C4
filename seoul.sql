-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-08-24 08:58
-- 서버 버전: 10.1.30-MariaDB
-- PHP 버전: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `seoul`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `inventory`
--

INSERT INTO `inventory` (`id`, `pid`, `uid`, `count`) VALUES
(14, 2, 1, 7);

-- --------------------------------------------------------

--
-- 테이블 구조 `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `files` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `notices`
--

INSERT INTO `notices` (`id`, `title`, `content`, `files`, `created_at`) VALUES
(1, '테스트 제목', '테스트 내용\r\n\r\n🎈🎈🎈🎈🎈\r\n\r\n     ㅁㄴㅇㅁㄴㅇ', '[]', '2020-08-24 05:45:28');

-- --------------------------------------------------------

--
-- 테이블 구조 `papers`
--

CREATE TABLE `papers` (
  `id` int(11) NOT NULL,
  `paper_name` varchar(150) NOT NULL,
  `uid` int(11) NOT NULL,
  `width_size` int(11) NOT NULL,
  `height_size` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `hash_tags` text NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `papers`
--

INSERT INTO `papers` (`id`, `paper_name`, `uid`, `width_size`, `height_size`, `point`, `hash_tags`, `image`) VALUES
(1, '호랑이', 3, 100, 100, 10, '[]', '/images/papers/1598242788.jpg'),
(2, '푸른물결', 3, 200, 100, 10, '[\"파란_하늘\",\"멋있는\",\"웅장한\"]', '/images/papers/1598243893.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `paper_tags`
--

CREATE TABLE `paper_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `paper_tags`
--

INSERT INTO `paper_tags` (`id`, `name`, `pid`) VALUES
(1, '파란_하늘', 2),
(2, '멋있는', 2),
(3, '웅장한', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `sale_history`
--

CREATE TABLE `sale_history` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `sale_history`
--

INSERT INTO `sale_history` (`id`, `uid`, `point`) VALUES
(1, 3, 90),
(2, 3, 70),
(3, 3, 60),
(4, 3, 80),
(5, 3, 70),
(6, 3, 40),
(7, 3, 70),
(8, 3, 40),
(9, 3, 70),
(10, 3, 40),
(11, 3, 70),
(12, 3, 90),
(13, 3, 40),
(14, 3, 70),
(15, 3, 30);

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'normal',
  `point` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id`, `user_email`, `password`, `user_name`, `image`, `type`, `point`) VALUES
(1, 'user1@gmail.com', 'qweQWE123!@#', '일유저', '/images/users/1598241374.jpg', 'normal', 830),
(2, 'admin', '1234', '관리자', '', 'admin', 1000),
(3, 'company1@gmail.com', 'qweQWE123!@#', '일회사', '/images/users/1598242222.jpg', 'company', 1170);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `paper_tags`
--
ALTER TABLE `paper_tags`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `sale_history`
--
ALTER TABLE `sale_history`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 테이블의 AUTO_INCREMENT `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `paper_tags`
--
ALTER TABLE `paper_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `sale_history`
--
ALTER TABLE `sale_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
