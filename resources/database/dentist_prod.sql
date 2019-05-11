-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Maj 2019, 20:25
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dentist_prod`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci_t`
--

CREATE TABLE `klienci_t` (
  `ID_KLIENTA` int(11) UNSIGNED NOT NULL,
  `IMIE` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `NAZWISKO` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `NR_TELEFONU` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci_t`
--

INSERT INTO `klienci_t` (`ID_KLIENTA`, `IMIE`, `NAZWISKO`, `EMAIL`, `NR_TELEFONU`) VALUES
(28, 'as', 'as', 'as@as.as', '123-123-123'),
(29, 'asd', 'sad', 'asd@dasda.pl', '123-132-123'),
(30, 'dsasaddsadsa', 'dsadsadsadsa', 'ddd@o2.pl', '123-123-123'),
(31, 'asd', 'asd', 'as@dsadsa.pl', '123-123-123'),
(32, 'asd', 'asd', 'assss@dsadsa.pl', '123-123-123'),
(33, 'asd', 'asd', 'assssssss@dsadsa.pl', '123-123-123'),
(34, 'ddd', 'dd', 'dddddd@dsaa.dd', '123-123-123'),
(35, 'aa', 'aa', 'aa@aa.aa', '123-123-123'),
(36, 'dd', 'ddddd', 'asdsad@dsa.dsds', '123-123-123'),
(37, 'ghg', 'gg', 'g@g.p', '123-123-123'),
(38, 'qq', 'qq', 'q@q.pq', '123-123-123'),
(39, 'ggg', 'gg', 'sad@dsadasdsa.pl', '123-123-123'),
(40, 'z', 'z', 'z@z.z', '123-123-123'),
(41, 'x', 'x', 'x@x.x', '123-123-123'),
(42, 'c', 'c', 'c@c.c', '123-123-123'),
(43, 'v', 'v', 'v@v.v', '123-123-123'),
(44, 'n', 'n', 'n@n.n', '111-111-111'),
(45, 'uu', 'u', 'u@u.u', '123-123-123'),
(46, 'r', 'r', 'r@r.r', '123-123-123'),
(47, 'cv', 'cv', 'cv@cv.cv', '123-123-123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy_t`
--

CREATE TABLE `pracownicy_t` (
  `ID_LEKARZA` int(11) UNSIGNED NOT NULL,
  `IMIE` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `NAZWISKO` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `PESEL` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `PW` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `NR_TELEFONU` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `SPECJALIZACJA` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy_t`
--

INSERT INTO `pracownicy_t` (`ID_LEKARZA`, `IMIE`, `NAZWISKO`, `PESEL`, `PW`, `NR_TELEFONU`, `SPECJALIZACJA`) VALUES
(1, 'Michal', 'Dudys', '95033108858', '4738244', '669390176', 'Stomatolog'),
(2, 'Natalia', 'Dobrowolska', '93746294877', '42334632', '746123987', 'Stomatolog');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyty_t`
--

CREATE TABLE `wizyty_t` (
  `ID_WIZYTY` int(11) UNSIGNED NOT NULL,
  `ID_KLIENTA` int(11) DEFAULT NULL,
  `ID_LEKARZA` int(11) DEFAULT NULL,
  `USLUGA` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `GODZINA` time NOT NULL,
  `CZY_PIERWSZA` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wizyty_t`
--

INSERT INTO `wizyty_t` (`ID_WIZYTY`, `ID_KLIENTA`, `ID_LEKARZA`, `USLUGA`, `DATA`, `GODZINA`, `CZY_PIERWSZA`) VALUES
(1, 1, 1, 'Wizyta kontrolna', '0000-00-00', '00:00:00', 'TAK'),
(2, 1, 2, 'Wizyta kontrolna', '0000-00-00', '00:00:00', 'TAK'),
(3, 0, 2, 'Wizyta kontrolna', '0000-00-00', '00:00:00', 'TAK'),
(4, 0, 2, 'Protezy', '0000-00-00', '00:00:00', 'TAK'),
(5, 0, 1, 'Implantologia stomatologiczna', '0000-00-00', '00:00:00', 'TAK'),
(6, 0, 1, 'LicÃ³wki porcelanowe', '0000-00-00', '00:00:00', 'TAK'),
(7, 0, 2, 'Odbudowa jamy ustnej', '0000-00-00', '00:00:00', 'TAK'),
(8, 28, 2, 'Korony', '0000-00-00', '00:00:00', 'TAK'),
(9, 29, 1, 'Wizyta kontrolna', '0000-00-00', '00:00:00', 'TAK'),
(10, 30, 1, 'Stomatologia kosmetyczna', '2019-05-12', '09:30:00', 'TAK'),
(11, 31, 1, 'Wizyta kontrolna', '2019-05-05', '10:00:00', 'TAK'),
(12, 32, 1, 'Wizyta kontrolna', '2019-05-05', '10:00:00', 'TAK'),
(13, 33, 1, 'Wizyta kontrolna', '2019-05-05', '10:00:00', 'TAK'),
(14, 34, 1, 'Wizyta kontrolna', '2019-05-11', '08:30:00', 'TAK'),
(15, 35, 1, 'Wizyta kontrolna', '2019-05-11', '08:00:00', 'TAK'),
(16, 36, 1, 'Wizyta kontrolna', '2019-05-18', '09:00:00', 'TAK'),
(17, 37, 1, 'Wizyta kontrolna', '2019-05-10', '08:00:00', 'TAK'),
(18, 38, 1, 'Wizyta kontrolna', '2019-05-25', '08:30:00', 'TAK'),
(19, 39, 1, 'Wizyta kontrolna', '2019-05-26', '08:00:00', 'TAK'),
(20, 40, 1, 'Wizyta kontrolna', '2019-05-17', '21:00:00', 'TAK'),
(21, 41, 1, 'Wizyta kontrolna', '2019-05-16', '09:00:00', 'TAK'),
(22, 42, 1, 'Wizyta kontrolna', '2019-05-19', '08:30:00', 'TAK'),
(23, 43, 1, 'Wizyta kontrolna', '2019-05-19', '20:30:00', 'TAK'),
(24, 44, 1, 'Wizyta kontrolna', '2019-05-16', '20:00:00', 'TAK'),
(25, 45, 1, 'Wizyta kontrolna', '2019-05-19', '08:30:00', 'TAK'),
(26, 46, 1, 'Wizyta kontrolna', '2019-06-01', '21:00:00', 'TAK'),
(27, 47, 1, 'Wizyta kontrolna', '2019-05-14', '11:30:00', 'TAK');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci_t`
--
ALTER TABLE `klienci_t`
  ADD PRIMARY KEY (`ID_KLIENTA`);

--
-- Indeksy dla tabeli `pracownicy_t`
--
ALTER TABLE `pracownicy_t`
  ADD PRIMARY KEY (`ID_LEKARZA`);

--
-- Indeksy dla tabeli `wizyty_t`
--
ALTER TABLE `wizyty_t`
  ADD PRIMARY KEY (`ID_WIZYTY`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci_t`
--
ALTER TABLE `klienci_t`
  MODIFY `ID_KLIENTA` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `pracownicy_t`
--
ALTER TABLE `pracownicy_t`
  MODIFY `ID_LEKARZA` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wizyty_t`
--
ALTER TABLE `wizyty_t`
  MODIFY `ID_WIZYTY` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
