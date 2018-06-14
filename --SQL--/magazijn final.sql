-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 jun 2018 om 12:04
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazijn`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `voornaam` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `functie` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `app_users`
--

INSERT INTO `app_users` (`id`, `username`, `voornaam`, `achternaam`, `functie`, `password`, `isActive`, `roles`) VALUES
(29, 'Youssef', 'Youssef', 'Zekhnini', 'Admin', '$2y$12$jrf.LTZOadV48aIL.x1YfuiGcjccjO23s4zbX8WtXwbRYx2h5t64C', 0, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(30, 'Halit', 'Halit', 'Ozdogru', 'Inkoper', '$2y$13$gtoOef4GNlafNab8nRK43O0.FNgl9ikskdqJrIJrXlE5pAYcdYV/G', 0, 'a:1:{i:0;s:12:\"ROLE_INKOPER\";}'),
(31, 'Luca', 'Luca', 'van Beek', 'Magazijnmeester', '$2y$13$2Zql5pTYkcvm5Lv8OfkMbOp00cgsqX7L3gmA1jowkliN.AIBCJj46', 0, 'a:1:{i:0;s:20:\"ROLE_MAGAZIJNMEESTER\";}'),
(32, 'Hassan', 'Hassan Hassan', 'Mohammed', 'Inkoper', '$2y$13$ohFHJb0nXhyXvzNFJ.geVehHV5htOV7dNLg/FlDPp1FR5dxBIQEbS', 0, 'a:1:{i:0;s:12:\"ROLE_INKOPER\";}'),
(33, 'Bas', 'Bas', 'Villevoy', 'Verkoper', '$2y$13$YWSP5JiN14InTvwWViIXW.fphRZMWGj8TURkozmdcAZQILdptu7Ja', 0, 'a:1:{i:0;s:13:\"ROLE_VERKOPER\";}');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikel`
--

CREATE TABLE `artikel` (
  `artikelnr` int(10) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `technischeSpecificaties` varchar(255) DEFAULT NULL,
  `magazijnlocatie` varchar(100) DEFAULT NULL,
  `inkoopprijs` decimal(10,2) NOT NULL,
  `minimumVoorraad` int(20) NOT NULL,
  `voorraadInAantal` int(20) NOT NULL,
  `verkopen` int(10) DEFAULT NULL,
  `gereserveerdeVoorraad` int(10) DEFAULT NULL,
  `vrijeVoorraad` int(10) DEFAULT NULL,
  `bestelserie` int(20) NOT NULL,
  `bestelregels` int(11) DEFAULT NULL,
  `CVA` int(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `artikel`
--

INSERT INTO `artikel` (`artikelnr`, `omschrijving`, `technischeSpecificaties`, `magazijnlocatie`, `inkoopprijs`, `minimumVoorraad`, `voorraadInAantal`, `verkopen`, `gereserveerdeVoorraad`, `vrijeVoorraad`, `bestelserie`, `bestelregels`, `CVA`, `status`) VALUES
(1000000017, 'Samsung galaxy s7', '128gb', '04/A06', '450.00', 15, 300, 7, 200, NULL, 0, 895686, 1000000017, 1),
(1000000018, 'Samsung Galaxy S8', '32gb', '02/A01', '800.00', 150, 100, NULL, NULL, NULL, 50, 89273, 1000000017, 1),
(1000000546, 'Iphone X', '32gb', '02/C03', '1150.00', 10, 0, NULL, NULL, NULL, 10, 89273, 1000000017, 1),
(1000000875, 'Bosch WAB7I089', 'A+++ Energie', '04/D06', '333.00', 25, 20, 20, NULL, NULL, 5, 895686, 1000000017, 1),
(1000020017, 'Usb Handverwarmer', 'USB 3.0', '03/G02', '20.00', 15, 23, NULL, NULL, NULL, 0, 895686, NULL, 1),
(1000300018, 'Dell D40', '1080p, 4gb Ram', '02/B01', '600.00', 5, 8, 2, NULL, NULL, 0, 89273, NULL, 1),
(1000350018, 'hp-hd1092d', '1080p', '06/H05', '790.00', 5, 6, 4, NULL, NULL, 0, 89273, NULL, 1),
(1010110110, 'Laptop oplader', '1000 Watt', '03/G06', '10.10', 50, 20, NULL, NULL, NULL, 30, NULL, 1181028374, 1),
(1010293847, 'hy782 samsung', '1080p', '07/F09', '726.00', 13, 18, NULL, NULL, NULL, 0, 76432, NULL, 1),
(1020020017, 'Apple iMac 2015', '1080p', '03/J03', '1300.00', 15, 25, NULL, NULL, NULL, 0, 895686, NULL, 1),
(1029384765, 'AA battereijen', '', '09/N02', '5.00', 13, 17, NULL, NULL, NULL, 0, 76432, NULL, 1),
(1050020017, 'goed voor in de woonkamer', '1080p', '02/R04', '67.00', 15, 17, NULL, NULL, NULL, 0, 895686, NULL, 1),
(1181028374, 'AAA batterijen', '', '05/H01', '5.00', 15, 19, NULL, NULL, NULL, 0, 895686, 1029384765, 1),
(1234567890, 'MSI GL62 6QF', 'GTX 960M', '02/D01', '700.00', 20, 10, NULL, NULL, NULL, 10, NULL, 1020020017, 1),
(1239478263, 'mp4 speler hp 4gb', '1080p', '08/S02', '34.00', 13, 16, NULL, NULL, NULL, 0, 76432, NULL, 1),
(1246426482, 'JBL GO 2', 'waterdicht', '04/B03', '98.00', 4, 8, NULL, NULL, NULL, 0, 65765, NULL, 1),
(1247492649, '1968D sony', 'extra bass', '03/N04', '560.00', 2, 3, 500, NULL, NULL, 0, 1253263, NULL, 1),
(1273917394, 'hp pabilon 4500', 'usb 3.0', '04/A09', '670.00', 20, 13, NULL, NULL, NULL, 7, 87653645, NULL, 1),
(1287492864, 'mp4 speler', '1080p', '08/K06', '34.00', 13, 7, NULL, NULL, NULL, 5, 76432, NULL, 1),
(1298765432, 'HG678 Sony', '7.1 surround sound', '02/A01', '230.00', 5, 2, NULL, NULL, NULL, 3, 89273, NULL, 1),
(1309876543, 'logitech c520', 'full hd', '01/A09', '67.00', 15, 5, NULL, NULL, NULL, 10, 895686, NULL, 1),
(1412345678, 'logitech g789', '16000dpi', '02/A03', '80.00', 5, 2, NULL, NULL, NULL, 3, 89273, NULL, 1),
(1512345678, 'logitech k95', 'RGB', '06/H01', '120.00', 5, 2, NULL, NULL, NULL, 3, 89273, NULL, 1),
(1676128364, 'JBL FLIP 4', 'shock resistant', '01/L02', '250.00', 5, 2, NULL, NULL, NULL, 3, 89273, NULL, 1),
(1738945629, 'macbook 2018', '2300p', '04/C01', '3400.00', 13, 7, NULL, NULL, NULL, 5, 76432, NULL, 1),
(1782736183, 'philpis Blacklight ', 'Blacklight 30x5', '01/A01', '67.00', 15, 5, NULL, NULL, NULL, 10, 895686, NULL, 1),
(1782937462, 'mp4 spler hp 32 gb', '1080p', '02/A01', '34.00', 13, 7, NULL, NULL, NULL, 5, 76432, NULL, 1),
(1792015792, 'HP 1100', 'GTX 750M', '06/B03', '300.00', 200, 19, NULL, 10, NULL, 181, NULL, 1000000017, 1),
(1792015793, 'Sony 1200', '4K Ultra HD', '07/R04', '1000.00', 30, 15, NULL, NULL, NULL, 15, NULL, 1247492649, 1),
(1792015794, 'Intel i5 - 4e generatie', '2.4GHZ', '07/R02', '200.00', 30, 15, 6, NULL, NULL, 15, NULL, 1000300018, 1),
(1792015795, 'Intel i5 - 8e generatie', '3.2GHZ', '07/R03', '250.00', 30, 15, NULL, NULL, NULL, 15, NULL, 1000300018, 1),
(1792015796, 'Intel i7 - 5e generatie', '3.2GHZ', '06/R01', '250.00', 30, 15, NULL, NULL, NULL, 15, NULL, 1000300018, 1),
(1792015797, 'Intel i7 - 8e generatie', '3.8GHZ', '06/R02', '350.00', 30, 15, NULL, NULL, NULL, 15, NULL, 1000300018, 1),
(1792015798, 'Intel i3 - 6e generatie', '2.1GHZ', '06/B04', '100.00', 30, 15, 10, NULL, NULL, 15, NULL, 1000300018, 1),
(1792015799, 'Philips 49PUS6561/12', '4K Ultra HD', '03/G02', '600.00', 20, 15, NULL, NULL, NULL, 5, NULL, 1247492649, 1),
(1792015800, 'LG OLED55E7N', '4K Ultra HD', '03/G03', '2000.00', 20, 15, NULL, NULL, NULL, 5, NULL, 1247492649, 1),
(1792015801, 'Samsung QE49Q7FAMLXXM', '4K Ultra HD', '01/G04', '1200.00', 20, 15, NULL, NULL, NULL, 5, NULL, 1247492649, 1),
(1923654728, 'mp4 spler samsung 8mb', '1080p', '03/G03', '50.00', 13, 7, 4, NULL, NULL, 6, 76432, 1000000017, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelopdracht`
--

CREATE TABLE `bestelopdracht` (
  `leverancier` varchar(20) NOT NULL,
  `bestelordernummer` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelopdracht`
--

INSERT INTO `bestelopdracht` (`leverancier`, `bestelordernummer`) VALUES
('Logitech', 110),
('Sony', 118),
('Samsung', 120),
('Apple', 121),
('HP', 122),
('Philips', 130),
('JBL', 140),
('Intel', 160),
('Makro', 161),
('Bosch', 162);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelregel`
--

CREATE TABLE `bestelregel` (
  `id` int(11) NOT NULL,
  `bestellingid` int(11) DEFAULT NULL,
  `artikelnr` int(11) NOT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `ontvangstdatum` date DEFAULT NULL,
  `keuringseis` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelregel`
--

INSERT INTO `bestelregel` (`id`, `bestellingid`, `artikelnr`, `hoeveelheid`, `ontvangstdatum`, `keuringseis`) VALUES
(18, 121, 1000000546, 6, '2013-01-01', 1000),
(19, 140, 1246426482, 6, '2013-01-01', 1024),
(20, 120, 1000000018, 13, '2013-01-01', 5568),
(21, 118, 1247492649, 21, '2013-01-01', 5016);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ontvangengoederen`
--

CREATE TABLE `ontvangengoederen` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `leverancier` varchar(20) NOT NULL,
  `ordernummer` int(11) NOT NULL,
  `artikelnummer` int(11) NOT NULL,
  `omschrijving` varchar(20) NOT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `kwaliteit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelnr`),
  ADD KEY `CVA` (`CVA`);

--
-- Indexen voor tabel `bestelopdracht`
--
ALTER TABLE `bestelopdracht`
  ADD PRIMARY KEY (`bestelordernummer`);

--
-- Indexen voor tabel `bestelregel`
--
ALTER TABLE `bestelregel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikelnr` (`artikelnr`),
  ADD KEY `bestellingid` (`bestellingid`);

--
-- Indexen voor tabel `ontvangengoederen`
--
ALTER TABLE `ontvangengoederen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordernummer` (`ordernummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT voor een tabel `bestelopdracht`
--
ALTER TABLE `bestelopdracht`
  MODIFY `bestelordernummer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT voor een tabel `bestelregel`
--
ALTER TABLE `bestelregel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`CVA`) REFERENCES `artikel` (`artikelnr`);

--
-- Beperkingen voor tabel `bestelregel`
--
ALTER TABLE `bestelregel`
  ADD CONSTRAINT `bestelregel_ibfk_3` FOREIGN KEY (`artikelnr`) REFERENCES `artikel` (`artikelnr`),
  ADD CONSTRAINT `bestelregel_ibfk_4` FOREIGN KEY (`bestellingid`) REFERENCES `bestelopdracht` (`bestelordernummer`);

--
-- Beperkingen voor tabel `ontvangengoederen`
--
ALTER TABLE `ontvangengoederen`
  ADD CONSTRAINT `ontvangengoederen_ibfk_1` FOREIGN KEY (`ordernummer`) REFERENCES `bestelopdracht` (`bestelordernummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
