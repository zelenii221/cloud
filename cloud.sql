-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 20 2019 г., 23:03
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cloud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, '123', '$2y$10$kJl4FRdfXGt268kEeOY.vOCG2IBZIkjCbdvRDftXYWru5oKJhmhNm'),
(2, '1232', '$2y$10$4Uvu7ZJeMr1bQOdsciYG/.S3H6K3rV0WGxxM49KPCG8EJhW5n2cCa'),
(3, '234', '$2y$10$lBMnnBbECxO3dpZxx47yYu7hKZbiczyR8Em5rblr48A61O5PSCcCO'),
(4, '345', '$2y$10$OOYyJdYR0WbzCfARiP9AxuT78RVSx30ytAaKcHsBqlFGBs3CORh4.'),
(5, '456', '$2y$10$r6ZRLwK0q3m6LQ8W7LxxfetPCmuwd6q88UCh0q/Jtms2U7s1mBzF.'),
(6, '987', '$2y$10$TwugUFI1wjwonV2Avh9It.T4JKYb0VVmkWgas1Oshc/LvJCsQ8FvO'),
(7, '1234', '$2y$10$rezDe15Usbfc7ELl0O/35eYsH4qeTDuG58.KkH/gON8bIOSDhf8rK'),
(8, '111', '$2y$10$eB2SEiPmrSAEKvqyNIpO1uYGmzM0G98HfCxHMFE5IldohrC7Ohaxa'),
(9, '22', '$2y$10$imISd0tb37gKMfbAEHQ9r.qmj95gWcPkfRD4sbl5FZwKvbTW7wrRa'),
(10, '2233', '$2y$10$7.oenigDH15h3nG3XcDTW.0SO2FSxUOepQokUBQa.Z9lx8Gt4vWk6'),
(11, '555', '$2y$10$F/2BjPu/uuOtylJKSLlcCukjRMgSJWkVNHUvOw4EXrNZF58Q1Nnqa'),
(12, '777', '$2y$10$9/54edNOXgrs4M3/iD9Sm.Fx1RQvGZcSJeV3u1u.ktBXt0xFdBv6.'),
(13, '888', '$2y$10$/J9IV0FRoKZjiU8bs5vyAuJ5BIMARxX7Nz3MDuwuKDwJ21c7CcHCS'),
(14, '999', '$2y$10$PyTenm.1a7wj56MXN5A4susVhvXdYwuqK.NMe/CaSVTtUvqLxvnHK'),
(15, '9999', '$2y$10$Lucr.PExT9Y5szdqMTy0nuBJu5oPZIDOWMxijTwmE6ladNTDKrLCm'),
(16, '89', '$2y$10$8FPxFvqnWU38XP3JGX3lcutQuFKP40kx721DIm5QuDTVYcj22.mD2'),
(17, '34', '$2y$10$ueycKm2CPCukABydyPUqruxEWYbGdK./O7I/g0dXCbvebZZTLE1cy'),
(18, '67', '$2y$10$fSqtu/Oqxweibowt8EqRke8d2PAHGFpSkLDqJOK/ofI1kRCMxpz6S'),
(19, '673', '$2y$10$BPkSQ1jBeUg.Vk2jYpPsfe8spLR/hZ6v/7Idx8fqV/TCNdLZkQ1zO'),
(20, '474565', '$2y$10$nP6f8DUuHDXuz.rzfA65lOOYgs2Bhzo.QWcOhTi36ohj7Ez83GU36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
