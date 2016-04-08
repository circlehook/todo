-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2016 г., 15:13
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `todo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_task` int(10) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_task`, `username`, `comment`, `date_create`) VALUES
(1, 1, 'дмитрий', 'комент 1', '2016-04-05 18:29:19'),
(3, 1, 'вася', 'ываываы', '2016-04-05 18:42:49'),
(4, 1, 'вася', 'ываываы', '2016-04-05 18:43:23'),
(5, 1, 'вася', 'ываываы', '2016-04-05 18:43:31'),
(6, 1, 'sdfsdf', 'sdfsdfds', '2016-04-05 19:48:31'),
(7, 1, 'sdfsdf', 'sdfsdfds', '2016-04-05 19:48:58'),
(8, 1, 'sdfsdf', 'sdfsdfds', '2016-04-05 19:49:53'),
(14, 15, 'юзер', 'холивар', '2016-04-05 20:25:48');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deadline` date NOT NULL,
  `count` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `status`, `deadline`, `count`) VALUES
(1, 'задача', 0, '2030-04-20', 2),
(2, 'задача2', 0, '2031-04-20', 0),
(3, 'задача', 1, '2016-04-16', 0),
(7, 'задача', 0, '2016-04-16', 0),
(15, 'test', 1, '2016-04-26', 1),
(16, 'длинная задача', 1, '2016-04-26', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
