-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 11, 2025 at 11:28 AM
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
-- Database: `piłkarze`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `id_kontakt` int(11) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `wiadomosc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecze`
--

CREATE TABLE `mecze` (
  `id_mecze` int(11) NOT NULL,
  `gospodarze` varchar(40) NOT NULL,
  `goscie` varchar(40) NOT NULL,
  `asysty` int(40) NOT NULL,
  `spalone` int(40) NOT NULL,
  `rzuty_rozne` int(40) NOT NULL,
  `rzuty_wolne` int(40) NOT NULL,
  `zolte_kartki` int(40) NOT NULL,
  `czerwone_kartki` int(40) NOT NULL,
  `gole` int(40) NOT NULL,
  `gole_przeciwnikow` int(40) NOT NULL,
  `wygrany_mecz` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mecze`
--

INSERT INTO `mecze` (`id_mecze`, `gospodarze`, `goscie`, `asysty`, `spalone`, `rzuty_rozne`, `rzuty_wolne`, `zolte_kartki`, `czerwone_kartki`, `gole`, `gole_przeciwnikow`, `wygrany_mecz`) VALUES
(1, 'Family Football', 'Red Lions', 3, 2, 5, 7, 1, 0, 2, 1, 'wygrany'),
(2, 'Blue Hawks', 'Family Football', 1, 1, 4, 6, 2, 1, 0, 3, 'przegrany'),
(3, 'Family Football', 'Green Storm', 2, 0, 3, 5, 0, 0, 1, 1, 'remis'),
(4, 'Yellow Tigers', 'Family Football', 0, 3, 6, 4, 3, 2, 2, 3, 'przegrany'),
(5, 'Family Football', 'Black Panthers', 4, 1, 2, 3, 1, 0, 3, 1, 'wygrany'),
(6, 'White Wolves', 'Family Football', 2, 2, 5, 6, 2, 1, 1, 2, 'przegrany'),
(7, 'Family Football', 'Orange Rockets', 3, 0, 4, 5, 0, 0, 2, 0, 'wygrany'),
(8, 'Purple Eagles', 'Family Football', 1, 1, 3, 4, 1, 0, 1, 1, 'remis'),
(9, 'Family Football', 'Silver Sharks', 2, 2, 6, 7, 2, 0, 4, 2, 'wygrany'),
(10, 'Golden Bears', 'Family Football', 0, 3, 2, 3, 3, 1, 0, 2, 'przegrany'),
(11, 'Family Football', 'Bronze Bulls', 1, 0, 4, 5, 0, 0, 2, 1, 'wygrany'),
(12, 'Crimson Foxes', 'Family Football', 2, 1, 5, 6, 1, 0, 1, 1, 'remis'),
(13, 'Family Football', 'Azure Falcons', 3, 2, 3, 4, 1, 0, 3, 0, 'wygrany'),
(14, 'Emerald Owls', 'Family Football', 1, 1, 2, 3, 2, 1, 0, 2, 'przegrany'),
(15, 'Family Football', 'Indigo Rhinos', 2, 0, 4, 5, 0, 0, 2, 2, 'remis'),
(16, 'Scarlet Tigers', 'Family Football', 0, 3, 6, 4, 3, 2, 2, 2, 'remis'),
(17, 'Family Football', 'Teal Dragons', 4, 1, 2, 3, 1, 0, 3, 1, 'wygrany'),
(18, 'Navy Wolves', 'Family Football', 2, 2, 5, 6, 2, 1, 1, 2, 'przegrany'),
(19, 'Family Football', 'Coral Comets', 3, 0, 4, 5, 0, 0, 2, 0, 'wygrany'),
(20, 'Lime Hawks', 'Family Football', 1, 1, 3, 4, 1, 0, 1, 1, 'remis');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnicy`
--

CREATE TABLE `zawodnicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `wiek` int(11) DEFAULT NULL CHECK (`wiek` >= 0),
  `pozycja` varchar(50) DEFAULT NULL,
  `wzrost_cm` int(11) DEFAULT NULL CHECK (`wzrost_cm` > 0),
  `waga_kg` int(11) DEFAULT NULL CHECK (`waga_kg` > 0),
  `data_urodzenia` date DEFAULT NULL,
  `numer_koszulki` int(11) DEFAULT NULL,
  `data_debiutu` date DEFAULT NULL,
  `liczba_meczy` int(11) DEFAULT 0,
  `liczba_goli` int(11) DEFAULT 0,
  `liczba_asyst` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zawodnicy`
--

INSERT INTO `zawodnicy` (`id`, `imie`, `nazwisko`, `wiek`, `pozycja`, `wzrost_cm`, `waga_kg`, `data_urodzenia`, `numer_koszulki`, `data_debiutu`, `liczba_meczy`, `liczba_goli`, `liczba_asyst`) VALUES
(1, 'Adam', 'Kowalski', 24, 'Napastnik', 182, 76, '2001-03-15', 9, '2020-08-12', 85, 34, 12),
(2, 'Mateusz', 'Nowak', 27, 'Pomocnik', 178, 72, '1998-06-22', 8, '2018-04-10', 120, 18, 30),
(3, 'Jakub', 'Wiśniewski', 22, 'Obrońca', 185, 80, '2003-01-05', 4, '2021-09-01', 60, 3, 5),
(4, 'Kamil', 'Wójcik', 30, 'Bramkarz', 190, 85, '1995-11-30', 1, '2015-03-20', 200, 0, 0),
(5, 'Paweł', 'Kaczmarek', 25, 'Napastnik', 180, 78, '2000-07-18', 11, '2019-07-01', 95, 27, 10),
(6, 'Tomasz', 'Mazur', 28, 'Pomocnik', 176, 70, '1997-02-14', 6, '2017-05-15', 130, 15, 25),
(7, 'Michał', 'Krawczyk', 23, 'Obrońca', 183, 77, '2002-10-10', 5, '2020-10-20', 70, 2, 7),
(8, 'Marcin', 'Piotrowski', 26, 'Bramkarz', 188, 82, '1999-04-04', 12, '2016-08-08', 150, 0, 0),
(9, 'Łukasz', 'Grabowski', 21, 'Napastnik', 179, 74, '2004-12-25', 10, '2022-03-03', 40, 12, 4),
(10, 'Grzegorz', 'Zieliński', 29, 'Pomocnik', 177, 73, '1996-09-09', 7, '2014-06-06', 180, 20, 35),
(11, 'Daniel', 'Szymański', 24, 'Obrońca', 186, 79, '2001-05-12', 3, '2020-07-07', 90, 4, 6),
(12, 'Rafał', 'Król', 27, 'Pomocnik', 175, 71, '1998-08-08', 14, '2018-09-09', 110, 10, 28),
(13, 'Sebastian', 'Jankowski', 22, 'Napastnik', 181, 75, '2003-02-02', 17, '2021-11-11', 55, 19, 8),
(14, 'Patryk', 'Duda', 30, 'Obrońca', 184, 81, '1995-01-01', 2, '2015-05-05', 190, 5, 10),
(15, 'Karol', 'Bąk', 25, 'Bramkarz', 187, 83, '2000-03-03', 13, '2019-10-10', 100, 0, 0),
(16, 'Wojciech', 'Lis', 28, 'Pomocnik', 179, 74, '1997-06-06', 15, '2017-12-12', 140, 16, 32),
(17, 'Artur', 'Czarnecki', 23, 'Obrońca', 182, 76, '2002-07-07', 16, '2020-01-01', 65, 3, 9),
(18, 'Damian', 'Sikora', 26, 'Napastnik', 180, 77, '1999-09-09', 18, '2016-06-06', 105, 25, 11),
(19, 'Maciej', 'Urban', 21, 'Pomocnik', 176, 72, '2004-04-04', 19, '2022-02-02', 35, 6, 14),
(20, 'Bartłomiej', 'Kubiak', 29, 'Obrońca', 185, 80, '1996-12-12', 20, '2014-04-04', 170, 7, 13),
(21, 'Igor', 'Lewandowski', 24, 'Napastnik', 180, 76, '2001-08-08', 21, '2020-09-01', 88, 22, 9),
(22, 'Oskar', 'Witkowski', 26, 'Pomocnik', 177, 73, '1999-05-05', 22, '2018-03-15', 115, 14, 27),
(23, 'Norbert', 'Zawadzki', 23, 'Obrońca', 184, 78, '2002-11-11', 23, '2021-07-07', 68, 2, 6),
(24, 'Szymon', 'Kubiś', 28, 'Bramkarz', 189, 84, '1997-01-01', 24, '2016-04-04', 160, 0, 0),
(25, 'Filip', 'Baran', 25, 'Napastnik', 181, 77, '2000-06-06', 25, '2019-06-06', 92, 26, 13),
(26, 'Emil', 'Kurek', 27, 'Pomocnik', 178, 72, '1998-02-02', 26, '2017-08-08', 125, 17, 29),
(27, 'Adrian', 'Mucha', 22, 'Obrońca', 185, 79, '2003-03-03', 27, '2021-10-10', 58, 1, 8),
(28, 'Dominik', 'Kozłowski', 30, 'Bramkarz', 190, 86, '1995-12-12', 28, '2015-02-02', 195, 0, 0),
(29, 'Julian', 'Sikorski', 21, 'Napastnik', 179, 75, '2004-07-07', 29, '2022-01-01', 42, 11, 5),
(30, 'Konrad', 'Borkowski', 29, 'Pomocnik', 176, 71, '1996-10-10', 30, '2014-05-05', 175, 19, 34),
(31, 'Ernest', 'Cieślak', 24, 'Obrońca', 183, 77, '2001-09-09', 31, '2020-11-11', 85, 3, 7),
(32, 'Mariusz', 'Rogowski', 27, 'Pomocnik', 175, 70, '1998-04-04', 32, '2018-06-06', 118, 12, 26),
(33, 'Arkadiusz', 'Tomczak', 22, 'Napastnik', 182, 76, '2003-05-05', 33, '2021-03-03', 50, 16, 10),
(34, 'Eryk', 'Wrona', 30, 'Obrońca', 186, 80, '1995-06-06', 34, '2015-07-07', 185, 6, 11),
(35, 'Krzysztof', 'Bielak', 25, 'Bramkarz', 188, 83, '2000-08-08', 35, '2019-09-09', 98, 0, 0),
(36, 'Leon', 'Kowalczyk', 28, 'Pomocnik', 179, 74, '1997-03-03', 36, '2017-01-01', 135, 15, 31),
(37, 'Aleksander', 'Sosnowski', 23, 'Obrońca', 182, 76, '2002-02-02', 37, '2020-02-02', 63, 2, 9),
(38, 'Nikodem', 'Krajewski', 26, 'Napastnik', 180, 78, '1999-11-11', 38, '2016-11-11', 108, 24, 12),
(39, 'Bartosz', 'Witczak', 21, 'Pomocnik', 177, 73, '2004-01-01', 39, '2022-04-04', 38, 7, 15),
(40, 'Cezary', 'Ratajczak', 29, 'Obrońca', 185, 81, '1996-05-05', 40, '2014-03-03', 172, 8, 14);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indeksy dla tabeli `mecze`
--
ALTER TABLE `mecze`
  ADD PRIMARY KEY (`id_mecze`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id_kontakt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mecze`
--
ALTER TABLE `mecze`
  MODIFY `id_mecze` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `zawodnicy`
--
ALTER TABLE `zawodnicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
