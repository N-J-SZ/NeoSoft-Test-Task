-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2023. Okt 18. 20:21
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `Neosoft`
--
CREATE DATABASE IF NOT EXISTS `Neosoft` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `Neosoft`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `reg` datetime NOT NULL DEFAULT current_timestamp(),
  `last` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`, `reg`, `last`, `status`) VALUES
(16, 'Teszt Felhasználó', 'teszt@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2023-10-18 10:42:08', '2023-10-18 12:12:19', 1),
(17, 'Adminisztrátor', 'admin@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2023-10-18 10:42:21', '2023-10-18 12:08:38', 0),
(18, 'Teszt Felhasználó 2', 'teszt2@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2023-10-18 10:42:35', NULL, 1),
(19, 'Teszt Felhasználó 3', 'teszt3@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2023-10-18 10:42:47', NULL, 1),
(20, 'Teszt Felhasználó 4', 'teszt4@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2023-10-18 10:42:59', NULL, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
