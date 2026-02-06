-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 06:02 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `szkola25`
--
CREATE DATABASE IF NOT EXISTS `szkola25` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `szkola25`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE `osoby` (
  `id` int(11) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wojewodstwo` varchar(100) NOT NULL,
  `narodowosc` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osoby`
--

INSERT INTO `osoby` (`id`, `imie`, `nazwisko`, `email`, `wojewodstwo`, `narodowosc`, `created_at`) VALUES
(13, 'test', 'test', 'test', 'Polska', 'Wielkopolskie', '2025-12-06 16:51:54');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `osoby`
--
ALTER TABLE `osoby`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `osoby`
--
ALTER TABLE `osoby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
