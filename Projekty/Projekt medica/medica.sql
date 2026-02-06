-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Lis 23, 2025 at 12:16 AM
-- Wersja serwera: 10.11.14-MariaDB-0+deb12u2
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medica`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `badania`
--

CREATE TABLE `badania` (
  `id_badania` int(11) NOT NULL,
  `nazwa` varchar(255) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `choroba` varchar(255) DEFAULT NULL,
  `informacje_pacjenta` text DEFAULT NULL,
  `historia_zabiegow` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badania`
--

INSERT INTO `badania` (`id_badania`, `nazwa`, `opis`, `data`, `choroba`, `informacje_pacjenta`, `historia_zabiegow`) VALUES
(1, 'Morfologia krwi', 'Badanie podstawowe krwi', '2025-01-10', 'Niedokrwistość', 'Pacjent zgłasza zmęczenie', 'Brak'),
(2, 'USG jamy brzusznej', 'Kontrola narządów jamy brzusznej', '2025-02-15', 'Brak', 'Pacjent po operacji wyrostka', 'Wyrostek 2020'),
(3, 'RTG klatki piersiowej', 'Zdjęcie płuc i serca', '2025-03-05', 'Zapalenie płuc', 'Kaszel od 2 tygodni', 'Brak'),
(4, 'EKG', 'Badanie pracy serca', '2025-04-12', 'Nadciśnienie', 'Bóle w klatce piersiowej', 'Brak'),
(5, 'Badanie moczu', 'Analiza ogólna moczu', '2025-05-20', 'Infekcja dróg moczowych', 'Częste oddawanie moczu', 'Brak'),
(6, 'Test alergiczny', 'Panel wziewny', '2025-06-01', 'Alergia pyłkowa', 'Katar sienny', 'Brak'),
(7, 'Gastroskopia', 'Badanie żołądka', '2025-06-15', 'Refluks', 'Zgaga', 'Brak'),
(8, 'Kolonoskopia', 'Badanie jelita grubego', '2025-07-01', 'Polipy', 'Bóle brzucha', 'Usunięcie polipów 2023'),
(9, 'MRI głowy', 'Rezonans magnetyczny mózgu', '2025-07-20', 'Migrena', 'Silne bóle głowy', 'Brak'),
(10, 'Test glukozy', 'Krzywa cukrowa', '2025-08-05', 'Cukrzyca typu 2', 'Pragnienie, częste oddawanie moczu', 'Brak'),
(11, 'Badanie tarczycy', 'USG tarczycy', '2025-08-15', 'Niedoczynność tarczycy', 'Zmęczenie, senność', 'Brak'),
(12, 'Spirometria', 'Badanie pojemności płuc', '2025-09-01', 'Astma', 'Dusznosci', 'Brak'),
(13, 'Holter EKG', '24h monitoring serca', '2025-09-10', 'Arytmia', 'Kołatania serca', 'Brak'),
(14, 'Badanie słuchu', 'Audiometria', '2025-09-20', 'Niedosłuch', 'Problemy ze słuchem', 'Brak'),
(15, 'Badanie wzroku', 'Kontrola ostrości widzenia', '2025-10-01', 'Krótkowzroczność', 'Noszenie okularów', 'Brak'),
(16, 'Test PSA', 'Marker prostaty', '2025-10-15', 'Przerost prostaty', 'Częste oddawanie moczu', 'Brak'),
(17, 'Badanie cholesterolu', 'Lipidogram', '2025-11-01', 'Hipercholesterolemia', 'Dieta wysokotłuszczowa', 'Brak'),
(18, 'Badanie hormonów', 'Panel hormonalny', '2025-11-10', 'Zaburzenia hormonalne', 'Wahania nastroju', 'Brak'),
(19, 'Badanie krwi OB', 'Odczyn Biernackiego', '2025-11-15', 'Stan zapalny', 'Bóle stawów', 'Brak'),
(20, 'Badanie witaminy D', 'Poziom witaminy D', '2025-11-20', 'Niedobór witaminy D', 'Zmęczenie, bóle mięśni', 'Brak'),
(21, 'Morfologia krwi', 'Badanie podstawowe krwi', '2025-01-10', 'Niedokrwistość', 'Pacjent zgłasza zmęczenie', 'Brak'),
(22, 'USG jamy brzusznej', 'Kontrola narządów jamy brzusznej', '2025-02-15', 'Brak', 'Pacjent po operacji wyrostka', 'Wyrostek 2020'),
(23, 'RTG klatki piersiowej', 'Zdjęcie płuc i serca', '2025-03-05', 'Zapalenie płuc', 'Kaszel od 2 tygodni', 'Brak'),
(24, 'EKG', 'Badanie pracy serca', '2025-04-12', 'Nadciśnienie', 'Bóle w klatce piersiowej', 'Brak'),
(25, 'Badanie moczu', 'Analiza ogólna moczu', '2025-05-20', 'Infekcja dróg moczowych', 'Częste oddawanie moczu', 'Brak'),
(26, 'Test alergiczny', 'Panel wziewny', '2025-06-01', 'Alergia pyłkowa', 'Katar sienny', 'Brak'),
(27, 'Gastroskopia', 'Badanie żołądka', '2025-06-15', 'Refluks', 'Zgaga', 'Brak'),
(28, 'Kolonoskopia', 'Badanie jelita grubego', '2025-07-01', 'Polipy', 'Bóle brzucha', 'Usunięcie polipów 2023'),
(29, 'MRI głowy', 'Rezonans magnetyczny mózgu', '2025-07-20', 'Migrena', 'Silne bóle głowy', 'Brak'),
(30, 'Test glukozy', 'Krzywa cukrowa', '2025-08-05', 'Cukrzyca typu 2', 'Pragnienie, częste oddawanie moczu', 'Brak'),
(31, 'Badanie tarczycy', 'USG tarczycy', '2025-08-15', 'Niedoczynność tarczycy', 'Zmęczenie, senność', 'Brak'),
(32, 'Spirometria', 'Badanie pojemności płuc', '2025-09-01', 'Astma', 'Dusznosci', 'Brak'),
(33, 'Holter EKG', '24h monitoring serca', '2025-09-10', 'Arytmia', 'Kołatania serca', 'Brak'),
(34, 'Badanie słuchu', 'Audiometria', '2025-09-20', 'Niedosłuch', 'Problemy ze słuchem', 'Brak'),
(35, 'Badanie wzroku', 'Kontrola ostrości widzenia', '2025-10-01', 'Krótkowzroczność', 'Noszenie okularów', 'Brak'),
(36, 'Test PSA', 'Marker prostaty', '2025-10-15', 'Przerost prostaty', 'Częste oddawanie moczu', 'Brak'),
(37, 'Badanie cholesterolu', 'Lipidogram', '2025-11-01', 'Hipercholesterolemia', 'Dieta wysokotłuszczowa', 'Brak'),
(38, 'Badanie hormonów', 'Panel hormonalny', '2025-11-10', 'Zaburzenia hormonalne', 'Wahania nastroju', 'Brak'),
(39, 'Badanie krwi OB', 'Odczyn Biernackiego', '2025-11-15', 'Stan zapalny', 'Bóle stawów', 'Brak'),
(40, 'Badanie witaminy D', 'Poziom witaminy D', '2025-11-20', 'Niedobór witaminy D', 'Zmęczenie, bóle mięśni', 'Brak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `id_kontakt` int(11) NOT NULL,
  `imie` varchar(40) DEFAULT NULL,
  `nazwisko` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `numer` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarze`
--

CREATE TABLE `lekarze` (
  `id_lekarze` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `stanowisko` varchar(100) DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lekarze`
--

INSERT INTO `lekarze` (`id_lekarze`, `imie`, `nazwisko`, `stanowisko`, `opis`) VALUES
(1, 'Jan', 'Kowalski', 'Chirurg', 'Specjalista chirurgii ogólnej z wieloletnim doświadczeniem w operacjach jamy brzusznej.'),
(2, 'Piotr', 'Nowak', 'Kardiolog', 'Lekarz zajmujący się diagnostyką i leczeniem chorób serca oraz układu krążenia.'),
(3, 'Marek', 'Wiśniewski', 'Ortopeda', 'Specjalista w leczeniu urazów i schorzeń układu kostno-stawowego.'),
(4, 'Tomasz', 'Zieliński', 'Neurolog', 'Lekarz zajmujący się chorobami układu nerwowego, w tym migrenami i padaczką.'),
(5, 'Anna', 'Lewandowska', 'Pediatra', 'Specjalistka w opiece nad dziećmi i młodzieżą, z naciskiem na profilaktykę zdrowotną.'),
(6, 'Katarzyna', 'Wójcik', 'Dermatolog', 'Lekarka zajmująca się diagnostyką i leczeniem chorób skóry, włosów i paznokci.'),
(7, 'Magdalena', 'Kamińska', 'Ginekolog', 'Specjalistka w zakresie zdrowia kobiet, prowadząca konsultacje i badania profilaktyczne.'),
(8, 'Ewa', 'Dąbrowska', 'Psychiatra', 'Lekarka zajmująca się zdrowiem psychicznym, terapią i leczeniem zaburzeń emocjonalnych.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjenci`
--

CREATE TABLE `pacjenci` (
  `id_pacjenci` int(11) NOT NULL,
  `imie` varchar(255) DEFAULT NULL,
  `nazwisko` varchar(255) DEFAULT NULL,
  `wiek` int(11) DEFAULT NULL,
  `wzrost` int(11) DEFAULT NULL,
  `waga` int(11) DEFAULT NULL,
  `pesel` varchar(11) DEFAULT NULL,
  `data_ur` date DEFAULT NULL,
  `kontakt` varchar(255) DEFAULT NULL,
  `id_badania` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pacjenci`
--

INSERT INTO `pacjenci` (`id_pacjenci`, `imie`, `nazwisko`, `wiek`, `wzrost`, `waga`, `pesel`, `data_ur`, `kontakt`, `id_badania`) VALUES
(1, 'Jan', 'Kowalski', 30, 180, 80, '90010112345', '1990-01-01', 'jan.kowalski@example.com', 1),
(2, 'Anna', 'Nowak', 25, 165, 60, '95020254321', '1995-02-02', 'anna.nowak@example.com', 2),
(3, 'Piotr', 'Wiśniewski', 40, 175, 85, '85030367890', '1985-03-03', 'piotr.w@example.com', 3),
(4, 'Katarzyna', 'Lewandowska', 35, 170, 70, '90040498765', '1990-04-04', 'kasia.l@example.com', 4),
(5, 'Marek', 'Zieliński', 50, 178, 90, '75050512312', '1975-05-05', 'marek.z@example.com', 5),
(6, 'Magdalena', 'Szymańska', 28, 160, 55, '97060665432', '1997-06-06', 'magda.s@example.com', 6),
(7, 'Tomasz', 'Woźniak', 45, 182, 95, '80070732145', '1980-07-07', 'tomasz.w@example.com', 7),
(8, 'Agnieszka', 'Dąbrowska', 32, 168, 65, '93080887654', '1993-08-08', 'agnieszka.d@example.com', 8),
(9, 'Paweł', 'Kozłowski', 29, 177, 78, '96090923456', '1996-09-09', 'pawel.k@example.com', 9),
(10, 'Ewa', 'Jankowska', 34, 162, 58, '91010134567', '1991-01-10', 'ewa.j@example.com', 10),
(11, 'Robert', 'Mazur', 55, 180, 92, '70020245678', '1970-02-20', 'robert.m@example.com', 11),
(12, 'Joanna', 'Krawczyk', 27, 166, 59, '98030356789', '1998-03-30', 'joanna.k@example.com', 12),
(13, 'Grzegorz', 'Kubiak', 38, 174, 82, '87040467891', '1987-04-15', 'grzegorz.k@example.com', 13),
(14, 'Monika', 'Wójcik', 31, 169, 63, '94050578912', '1994-05-25', 'monika.w@example.com', 14),
(15, 'Adam', 'Kamiński', 42, 181, 88, '83060689123', '1983-06-12', 'adam.k@example.com', 15),
(16, 'Dorota', 'Piotrowska', 36, 167, 64, '89070791234', '1989-07-07', 'dorota.p@example.com', 16),
(17, 'Łukasz', 'Grabowski', 33, 176, 79, '92080812398', '1992-08-08', 'lukasz.g@example.com', 17),
(18, 'Beata', 'Pawlak', 26, 163, 57, '99090923487', '1999-09-09', 'beata.p@example.com', 18),
(19, 'Krzysztof', 'Michalski', 48, 179, 91, '77010134576', '1977-01-01', 'krzysztof.m@example.com', 19),
(20, 'Natalia', 'Czerwińska', 22, 164, 56, '03020245677', '2003-02-02', 'natalia.c@example.com', 20);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `badania`
--
ALTER TABLE `badania`
  ADD PRIMARY KEY (`id_badania`);

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indeksy dla tabeli `lekarze`
--
ALTER TABLE `lekarze`
  ADD PRIMARY KEY (`id_lekarze`);

--
-- Indeksy dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD PRIMARY KEY (`id_pacjenci`),
  ADD UNIQUE KEY `pesel` (`pesel`),
  ADD KEY `id_badania` (`id_badania`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badania`
--
ALTER TABLE `badania`
  MODIFY `id_badania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id_kontakt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lekarze`
--
ALTER TABLE `lekarze`
  MODIFY `id_lekarze` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pacjenci`
--
ALTER TABLE `pacjenci`
  MODIFY `id_pacjenci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD CONSTRAINT `pacjenci_ibfk_1` FOREIGN KEY (`id_badania`) REFERENCES `badania` (`id_badania`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
