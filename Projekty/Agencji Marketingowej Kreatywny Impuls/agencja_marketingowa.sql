-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 04:34 PM
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
-- Database: `agencja_marketingowa`
--
CREATE DATABASE IF NOT EXISTS `agencja_marketingowa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agencja_marketingowa`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `nazwa_firmy` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `nazwa_firmy`, `email`, `telefon`) VALUES
(1, 'TechSolutions Sp. z o.o.', 'kontakt@techsolutions.pl', '+48 501 234 567'),
(2, 'MediCare Polska', 'biuro@medicare.pl', '+48 502 345 678'),
(3, 'EcoBuild SA', 'info@ecobuild.pl', '+48 503 456 789'),
(4, 'FoodExpress', 'support@foodexpress.pl', '+48 504 567 890'),
(5, 'EduSmart', 'kontakt@edusmart.pl', '+48 505 678 901');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `stanowisko` varchar(50) NOT NULL,
  `data_zatrudnienia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `imie`, `nazwisko`, `stanowisko`, `data_zatrudnienia`) VALUES
(1, 'Anna', 'Kowalska', 'Specjalista ds. HR', '2021-03-15'),
(2, 'Piotr', 'Nowak', 'Programista', '2020-07-01'),
(3, 'Maria', 'Wiśniewska', 'Księgowa', '2019-11-20'),
(4, 'Tomasz', 'Zieliński', 'Project Manager', '2022-01-10'),
(5, 'Ewa', 'Lewandowska', 'Grafik', '2023-05-05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projekty`
--

CREATE TABLE `projekty` (
  `id_projektu` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_uslugi` int(11) NOT NULL,
  `status_projektu` varchar(50) NOT NULL,
  `data_rozpoczecia` date NOT NULL,
  `szacowany_koszt` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projekty`
--

INSERT INTO `projekty` (`id_projektu`, `id_klienta`, `id_uslugi`, `status_projektu`, `data_rozpoczecia`, `szacowany_koszt`) VALUES
(1, 1, 1, 'W trakcie', '2023-09-01', 4500),
(2, 2, 2, 'Zakończony', '2023-05-15', 3200),
(3, 3, 3, 'Oczekujący', '2024-01-10', 2800),
(4, 4, 4, 'W trakcie', '2023-11-20', 4000),
(5, 5, 5, 'Zakończony', '2025-02-01', 6000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uslugi`
--

CREATE TABLE `uslugi` (
  `id_usługi` int(11) NOT NULL,
  `nazwa_uslugi` varchar(100) NOT NULL,
  `cena_netto` decimal(10,0) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uslugi`
--

INSERT INTO `uslugi` (`id_usługi`, `nazwa_uslugi`, `cena_netto`, `opis`) VALUES
(1, 'Kampania Google Ads', 4500, 'Tworzenie i optymalizacja kampanii reklamowych w Google Ads'),
(2, 'Social Media Marketing', 3200, 'Prowadzenie profili firmowych na Facebook, Instagram, LinkedIn'),
(3, 'Content Marketing', 2800, 'Pisanie artykułów, tworzenie treści blogowych i materiałów promocyjnych'),
(4, 'SEO i optymalizacja stron', 4000, 'Audyt SEO, pozycjonowanie i optymalizacja treści pod wyszukiwarki'),
(5, 'Branding i identyfikacja wizualna', 6000, 'Projektowanie logo, kolorystyki i materiałów firmowych');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `projekty`
--
ALTER TABLE `projekty`
  ADD PRIMARY KEY (`id_projektu`),
  ADD KEY `id_klienta` (`id_klienta`,`id_uslugi`);

--
-- Indeksy dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id_usługi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projekty`
--
ALTER TABLE `projekty`
  MODIFY `id_projektu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id_usługi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projekty`
--
ALTER TABLE `projekty`
  ADD CONSTRAINT `projekty_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projekty_ibfk_2` FOREIGN KEY (`id_uslugi`) REFERENCES `uslugi` (`id_usługi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
