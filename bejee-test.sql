-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 11 2021 г., 20:34
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bejee-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `task` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `task`, `status`) VALUES
(1, 'Павел2222222222222', 'kinobasa777@gmail.com', 'Bootstrap включает в себя шесть предустановленных стилей кнопок, каждая из которых обслуживает свое собственное смысловое назначение.', 0),
(2, 'Игорь Иванович2', 'user38@gmail.com', 'Числовые строки могут содержать любое количество цифр, знаки (например, + или —), десятичные дроби и экспоненту. Следовательно, + 234.5e6 является допустимой числовой строкой. Двоичная и шестнадцатеричная запись не допускаются.', 1),
(4, 'Елена', 'mozer_pavel@mail.ru', 'Можем работать как напрямую с системами бронирования вроде Сирены, Амадеуса или Галилео, так и с API более высокого уровня, такими как Aviasales, Booking, Sletat.ru, AirBNB. ', 0),
(5, 'Ольга', 'alexey.osh@forsageholdings.com', '\r\nРазбираемся в физике и биологии. Работаем с Big Data и понимаем в машинном обучении. Нейронные сети, распознавание образов.\r\nПрототипируем на R, MatLab и Python.\r\n', 0),
(6, 'Иван', 'user383@gmail.com', 'Below is an example form built entirely with Bootstrap\'s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.', 0),
(7, 'Елена3', 'super_admi@femida.ru', 'Чтобы проверить, что переменная является числом или строкой, содержащей число (как поле ввода в форме, которое всегда является строкой), используйте', 0),
(8, 'Артем', 'user21@gmail.com', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dop_info` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `login`, `password`, `params`, `hash`, `email`, `name`, `phone`, `dop_info`, `image`) VALUES
(1, 'admin', 'admin', '6df1a592ef6ed7ec2794061ae5bf808d', '', '', 'itdeveloper0@gmail.com', 'Павел', '+375 (32)4444444444', 'обо мне sdfdsfsdfsdfsd', 'e096b51304f004d025a5e5ab110c4f7e.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
