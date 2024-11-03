-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2023 г., 23:39
-- Версия сервера: 10.4.26-MariaDB
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `stresse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `action_logs`
--

CREATE TABLE `action_logs` (
  `id` int(11) NOT NULL,
  `uID` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `api`
--

CREATE TABLE `api` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(1024) NOT NULL,
  `slots` int(10) NOT NULL,
  `methods` varchar(9999) NOT NULL,
  `layer` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lastUsed` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `attack_logs`
--

CREATE TABLE `attack_logs` (
  `id` int(11) NOT NULL,
  `userID` varchar(15) NOT NULL,
  `target` varchar(1024) NOT NULL,
  `host` varchar(255) NOT NULL,
  `time` int(5) NOT NULL,
  `port` varchar(10) NOT NULL,
  `method` varchar(30) NOT NULL,
  `stopper` varchar(35) NOT NULL,
  `date` int(11) NOT NULL,
  `stopped` int(1) NOT NULL DEFAULT 0,
  `handler` varchar(50) NOT NULL,
  `where` varchar(16) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `bans`
--

CREATE TABLE `bans` (
  `username` varchar(15) NOT NULL,
  `reason` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `word` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `invoice`
--

CREATE TABLE `invoice` (
  `order_id` int(11) NOT NULL,
  `invoice_id` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_price` decimal(65,0) NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_created` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_expires` int(35) NOT NULL,
  `invoice_status` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `methods`
--

CREATE TABLE `methods` (
  `id` int(2) NOT NULL,
  `name` text NOT NULL,
  `hubname` varchar(64) NOT NULL,
  `apiname` varchar(255) NOT NULL,
  `layer` int(10) NOT NULL,
  `class` int(1) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `type` int(15) NOT NULL,
  `api` tinyint(1) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `title` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(3600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `plans`
--

CREATE TABLE `plans` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `unit` varchar(64) NOT NULL,
  `length` int(32) NOT NULL,
  `mbt` text NOT NULL,
  `price` float NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `concurrents` text NOT NULL,
  `private` tinyint(1) NOT NULL,
  `api` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(15) NOT NULL,
  `maintenance` tinyint(1) NOT NULL,
  `layer4` tinyint(1) NOT NULL,
  `layer7` tinyint(1) NOT NULL,
  `api` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `maintenance`, `layer4`, `layer7`, `api`) VALUES
(1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 5,
  `plan` int(15) NOT NULL,
  `expire` int(255) NOT NULL DEFAULT 2147483647,
  `money` int(65) NOT NULL,
  `addons` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `timestamp` int(35) NOT NULL,
  `reason` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `users_api`
--

CREATE TABLE `users_api` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `AttackTime` int(10) NOT NULL,
  `Slots` int(10) NOT NULL,
  `api_key` text NOT NULL,
  `WhiteList` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attack_logs`
--
ALTER TABLE `attack_logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID` (`id`);

--
-- Индексы таблицы `users_api`
--
ALTER TABLE `users_api`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `api`
--
ALTER TABLE `api`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attack_logs`
--
ALTER TABLE `attack_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `invoice`
--
ALTER TABLE `invoice`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `plans`
--
ALTER TABLE `plans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_api`
--
ALTER TABLE `users_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
