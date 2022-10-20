-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Okt 20. 09:43
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `phptest`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osztalyok`
--

CREATE TABLE `osztalyok` (
  `osztalyid` int(11) NOT NULL,
  `osztalynev` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `osztalyok`
--

INSERT INTO `osztalyok` (`osztalyid`, `osztalynev`) VALUES
(1, '13.I'),
(2, '12.a');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sorok`
--

CREATE TABLE `sorok` (
  `sorid` int(11) NOT NULL,
  `nev1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nev2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nev3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nev4` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nev5` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `osztalyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `sorok`
--

INSERT INTO `sorok` (`sorid`, `nev1`, `nev2`, `nev3`, `nev4`, `nev5`, `osztalyid`) VALUES
(6, '', '', '', '1', '', 1),
(7, '2', '3', '4', '5', '6', 1),
(8, '7', '8', '9', '10', '11', 1),
(9, '', '', '12', '13', '14', 1),
(16, NULL, NULL, NULL, '15', '16', 2),
(17, '17', '18', '19', NULL, '20', 2),
(18, '21', '22', '23', '24', '25', 2),
(19, NULL, NULL, NULL, '26', '27', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemelyek`
--

CREATE TABLE `szemelyek` (
  `szemelyid` int(11) NOT NULL,
  `nev` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `szemelyek`
--

INSERT INTO `szemelyek` (`szemelyid`, `nev`) VALUES
(1, 'Bujdi'),
(2, 'Beni'),
(3, 'Erik'),
(4, 'Szabi'),
(5, 'Zoltán'),
(6, 'Horváth'),
(7, 'Korondi'),
(8, 'Tokrist'),
(9, 'Iványi'),
(10, 'Pintér'),
(11, 'Ede'),
(12, 'Bicsák'),
(13, 'Béla'),
(14, 'Cucu'),
(15, 'Géza'),
(16, 'János'),
(17, 'Beni'),
(18, 'Kriszitán'),
(19, 'Szabi'),
(20, 'Bence'),
(21, 'Korondi'),
(22, 'Tokrist'),
(23, 'Iványi'),
(24, 'Kristóf'),
(25, 'Ede'),
(26, 'Bicsák'),
(27, 'Cuc'),
(28, 'Bicsák'),
(29, 'Cucu');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `osztalyok`
--
ALTER TABLE `osztalyok`
  ADD PRIMARY KEY (`osztalyid`);

--
-- A tábla indexei `sorok`
--
ALTER TABLE `sorok`
  ADD PRIMARY KEY (`sorid`),
  ADD KEY `osztalyid` (`osztalyid`),
  ADD KEY `nev1` (`nev1`,`nev2`,`nev3`,`nev4`,`nev5`);

--
-- A tábla indexei `szemelyek`
--
ALTER TABLE `szemelyek`
  ADD PRIMARY KEY (`szemelyid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `osztalyok`
--
ALTER TABLE `osztalyok`
  MODIFY `osztalyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `sorok`
--
ALTER TABLE `sorok`
  MODIFY `sorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `szemelyek`
--
ALTER TABLE `szemelyek`
  MODIFY `szemelyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `sorok`
--
ALTER TABLE `sorok`
  ADD CONSTRAINT `ibfk_sorok_osztalyok` FOREIGN KEY (`osztalyid`) REFERENCES `osztalyok` (`osztalyid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sorok_ibfk_1` FOREIGN KEY (`sorid`) REFERENCES `szemelyek` (`szemelyid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
