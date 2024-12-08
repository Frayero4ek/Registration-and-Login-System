-- phpMyAdmin SQL Dump
-- версія 5.2.1
-- https://www.phpmyadmin.net/

-- Встановлення режиму SQL
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Збереження старих налаштувань набору символів та кодування
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 
-- База даних: `areaweb`
--

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,  
  `name` varchar(255) DEFAULT NULL,  
  `email` varchar(255) DEFAULT NULL,  
  `avatar` varchar(255) DEFAULT NULL,  
  `password` varchar(255) DEFAULT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси таблиці `users`
--

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),  
  ADD UNIQUE KEY `email` (`email`);  

--
-- Налаштування AUTO_INCREMENT для таблиці `users`
--

ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1; -- Налаштування AUTO_INCREMENT для поля `id`

COMMIT;

-- Відновлення старих налаштувань набору символів та кодування
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
