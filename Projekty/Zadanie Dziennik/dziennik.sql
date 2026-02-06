-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 16, 2025 at 05:56 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dziennik`
--

CREATE TABLE `dziennik` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `ocena1` decimal(3,1) DEFAULT NULL,
  `ocena2` decimal(3,1) DEFAULT NULL,
  `ocena3` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dziennik`
--

INSERT INTO `dziennik` (`id`, `imie`, `nazwisko`, `ocena1`, `ocena2`, `ocena3`) VALUES
(1, 'Anna', 'Kowalska', 4.5, 5.0, 4.0),
(2, 'Maria', 'Wiśniewska', 5.0, 4.5, 5.0),
(3, 'Piotr', 'Zieliński', 2.5, 3.0, 3.5),
(4, 'Katarzyna', 'Mazur', 4.0, 4.0, 4.5),
(5, 'Tomasz', 'Wójcik', 3.5, 3.0, 2.5),
(6, 'Agnieszka', 'Krawczyk', 5.0, 5.0, 4.5),
(7, 'Michał', 'Dąbrowski', 2.0, 2.5, 3.0),
(8, 'Ewa', 'Lewandowska', 4.0, 4.5, 4.0),
(9, 'Paweł', 'Kamiński', 3.0, 3.5, 3.0),
(10, 'Joanna', 'Szymańska', 5.0, 4.5, 5.0),
(11, 'Krzysztof', 'Woźniak', 2.5, 3.0, 2.0),
(12, 'Magdalena', 'Jankowska', 4.5, 4.0, 4.5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dziennik`
--
ALTER TABLE `dziennik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
