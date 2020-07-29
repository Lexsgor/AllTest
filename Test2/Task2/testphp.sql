-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2020 г., 15:10
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `category`) VALUES
(1, 'Инструменты', '1_'),
(2, 'Ручной инструмент', '1_1_'),
(3, 'Электроинструмент', '1_2_'),
(4, 'Топоры', '1_1_1_'),
(5, 'Молотки', '1_1_2_'),
(6, 'Перфораторы', '1_2_1_'),
(7, 'Электролобзики', '1_2_2_'),
(8, 'Топоры Fiskars', '1_1_1_1'),
(9, 'Топоры Intertool', '1_1_1_2'),
(10, 'Молотки Master Tool', '1_1_2_1'),
(11, 'Молотки Intertool', '1_1_2_2'),
(12, 'Перфораторы Bosch', '1_2_1_1'),
(13, 'Перфораторы Makita', '1_2_1_2'),
(14, 'Электролобзики DeWALT', '1_2_2_1'),
(15, 'Электролобзики Metabo', '1_2_2_2');

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `name`, `cost`) VALUES
(1, 'Топор Fiskars X7-XS', 124),
(2, 'Топор Fiskars Solid A6', 154),
(3, 'Топоры Intertool HT-0260', 165),
(4, 'Топоры Intertool HT-0273', 148),
(5, 'Молоток Intertool HT-0250', 56),
(6, 'Молоток Intertool HT-0243', 67),
(7, 'Молоток Master Tool 02-1312', 47),
(8, 'Молоток Master Tool 02-1305', 78),
(9, 'Перфоратор Bosch GBH 2-26 DFR Professional 061125476D', 957),
(10, 'Перфоратор Bosch GBH 2-26 DRE Professional 0615990L43', 1028),
(11, 'Перфоратор Makita HR2470X', 1135),
(12, 'Перфоратор Makita HR140DWAJ', 1216),
(13, 'Электролобзик DeWALT DW349', 346),
(14, 'Электролобзик DeWALT DCS335NT', 567),
(15, 'Электролобзик Metabo STEB 65 Quick 601030000', 678),
(16, 'Электролобзик Metabo STE 100 Quick 601100000', 564);

-- --------------------------------------------------------

--
-- Структура таблицы `link`
--

CREATE TABLE `link` (
  `itemId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `link`
--

INSERT INTO `link` (`itemId`, `categoryId`) VALUES
(1, 8),
(2, 8),
(3, 9),
(4, 9),
(5, 10),
(6, 10),
(7, 11),
(8, 11),
(9, 12),
(10, 12),
(11, 13),
(12, 13),
(13, 14),
(14, 14),
(15, 15),
(16, 15),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 7),
(14, 7),
(15, 7),
(16, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexCategoryName` (`name`(6)),
  ADD KEY `indexCategoryCategory` (`category`(6)),
  ADD KEY `indexCategoryId` (`id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indexsItemId` (`id`),
  ADD KEY `indexsItemName` (`name`(6));

--
-- Индексы таблицы `link`
--
ALTER TABLE `link`
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `itemId` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
