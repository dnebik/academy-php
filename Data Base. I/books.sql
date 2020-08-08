-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 06 2020 г., 13:57
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `athor` text NOT NULL,
  `publication_date` int NOT NULL,
  `cover_color` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'красный',
  `readed` tinyint(1) NOT NULL DEFAULT '0',
  `pages` int NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `athor`, `publication_date`, `cover_color`, `readed`, `pages`, `rating`) VALUES
(1, 'ПОЛНОЕ СОБРАНИЕ ПРОИЗВЕДЕНИЙ О ШЕРЛОКЕ ХОЛМСЕ В ОДНОМ ТОМЕ', 'Артур Конан Дойл', 2017, 'чёрный', 1, 1154, 5),
(2, 'ТЕРНОВАЯ ВЕДЬМА ИЗОЛЬДА', 'Евгения Спащенко', 2017, 'зклёный', 1, 356, 3),
(3, 'ДОМ СТРАННЫХ ДЕТЕЙ', 'Ренсом Риггз', 2016, 'серый', 1, 452, 4),
(4, 'ГОРОД ПУСТЫХ ПОБЕГ ИЗ ДОМА СТРАННЫХ ДЕТЕЙ', 'Ренсом Риггз', 2016, 'серый', 1, 429, 4),
(5, 'БИБЛИОТЕКА ДУШ НЕТ ВЫХОДА ИЗ ДОМА СТРАННЫХ ДЕТЕЙ', 'Ренсом Риггз', 2016, 'серый', 1, 475, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
