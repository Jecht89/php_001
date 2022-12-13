-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 13, 2022 alle 21:13
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_calc_ffix`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `equipaggiamenti`
--

CREATE TABLE `equipaggiamenti` (
  `id_equip` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nome_equip` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `vel_equip` int(11) NOT NULL,
  `for_equip` int(11) NOT NULL,
  `mag_equip` int(11) NOT NULL,
  `spr_equip` int(11) NOT NULL,
  `indossabile_da` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `equipaggiamenti`
--

INSERT INTO `equipaggiamenti` (`id_equip`, `tipo`, `nome_equip`, `vel_equip`, `for_equip`, `mag_equip`, `spr_equip`, `indossabile_da`) VALUES
(1, 'Tutti', 'No Bonus', 0, 0, 0, 0, 'Gidan-Vivi-Daga-Steiner-Freija-Quina-Eiko-Amarant'),
(2, 'Arma', 'Masamune', 0, 0, 2, 0, 'Gidan'),
(3, 'Arma', 'Orichalcon', 1, 0, 0, 0, 'Gidan'),
(4, 'Arma', 'Asta stellare', 0, 0, 0, 2, 'Daga'),
(5, 'Arma', 'Magiracchetta', 0, 0, 2, 0, 'Daga,Eiko'),
(6, 'Arma', 'Defender', 0, 0, 0, 3, 'Steiner'),
(7, 'Testa', 'Colbacco', 0, 0, 0, 1, 'Gidan-Vivi-Daga-Quina-Eiko'),
(8, 'Testa', 'Cappello Merlino', 0, 1, 0, 0, 'Gidan-Vivi-Daga-Quina-Eiko'),
(9, 'Testa', 'Bandana', 1, 0, 0, 1, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(10, 'Testa', 'Cappello Magico', 0, 0, 1, 0, 'Vivi-Daga-Quina-Eiko'),
(11, 'Testa', 'Tiara di Lamia', 0, 0, 1, 1, 'Freija-Daga-Quina-Eiko'),
(12, 'Testa', 'Cappello Mikoshi', 0, 1, 0, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(13, 'Testa', 'Hachimaki', 0, 1, 0, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(14, 'Testa', 'Tiara Chakra', 0, 0, 1, 1, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(15, 'Testa', 'Basco Verde', 1, 1, 0, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(16, 'Testa', 'Forcina Dorata', 0, 0, 1, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(17, 'Testa', 'Astrocappello', 1, 0, 0, 0, 'Gidan-Vivi-Daga-Eiko-Amarant'),
(18, 'Testa', 'Passamontagna', 2, 0, 0, 0, 'Gidan'),
(19, 'Testa', 'Papalina', 0, 0, 1, 2, 'Vivi-Daga-Quina-Eiko'),
(20, 'Testa', 'Elmo Ayan', 0, 0, 0, 1, 'Steiner-Freija'),
(21, 'Testa', 'Barbuta', 0, 0, 0, 2, 'Steiner-Freija'),
(22, 'Testa', 'Elmo Mithril', 0, 0, 0, 1, 'Steiner-Freija'),
(23, 'Testa', 'Elmo Dorato', 0, 0, 1, 0, 'Steiner-Freija'),
(24, 'Testa', 'Elmo di Stoffa', 0, 1, 0, 0, 'Steiner-Freija'),
(25, 'Testa', 'Diamantelmo', 0, 0, 0, 1, 'Steiner-Freija'),
(26, 'Testa', 'Elmo Kaiser', 0, 1, 1, 0, 'Steiner-Freija'),
(27, 'Testa', 'Elmo Genji', 0, 0, 2, 0, 'Steiner-Freija'),
(28, 'Testa', 'Grand\'elmo', 1, 0, 0, 0, 'Steiner-Freija'),
(29, 'Braccia', 'Fascia di pelle', 0, 0, 0, 1, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(30, 'Braccia', 'Fascia d\'osso', 0, 1, 0, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(31, 'Braccia', 'Fascia di Mithril', 0, 0, 0, 1, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(32, 'Braccia', 'Magibracciale', 0, 0, 2, 0, 'Vivi-Daga-Quina-Eiko'),
(33, 'Braccia', 'Fascia di Sokai', 0, 0, 0, 2, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(34, 'Braccia', 'Manette', 1, 0, 0, 0, 'Gidan-Amarant'),
(35, 'Braccia', 'Dragon Wrist', 0, 0, 0, 1, 'Gidan-Vivi-Daga-Freija-Quina-Eiko-Amarant'),
(36, 'Braccia', 'Power Wrist', 0, 2, 0, 0, 'Gidan-Vivi-Daga-Freija-Quina-Eiko-Amarant'),
(37, 'Braccia', 'Fascia di Eolo', 0, 1, 0, 0, 'Gidan-Vivi-Daga-Freija-Quina-Eiko-Amarant'),
(38, 'Braccia', 'Guanti Bronzei', 0, 0, 0, 1, 'Steiner-Freija'),
(39, 'Braccia', 'Guanti di Mithril', 0, 0, 0, 1, 'Steiner-Freija'),
(40, 'Braccia', 'Fondina Veneta', 0, 1, 1, 0, 'Steiner-Freija'),
(41, 'Braccia', 'Guanti Genji', 0, 0, 2, 0, 'Steiner-Freija'),
(42, 'Braccia', 'Guntlet', 1, 0, 0, 0, 'Steiner-Freija'),
(43, 'Busto', 'Busto Bronzeo', 0, 0, 0, 1, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(44, 'Busto', 'Scamiciata', 0, 1, 0, 0, 'Gidan-Amarant'),
(45, 'Busto', 'Vestito Magico', 0, 0, 1, 0, 'Vivi-Daga-Quina-Eiko'),
(46, 'Busto', 'Salvagente', 0, 0, 0, 2, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(47, 'Busto', 'Giubbotto', 0, 1, 0, 0, 'Gidan-Amarant'),
(48, 'Busto', 'Dogi di Jujitsu', 0, 1, 0, 1, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(49, 'Busto', 'Bomber', 0, 2, 0, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(50, 'Busto', 'Magigilet', 0, 0, 1, 0, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(51, 'Busto', 'Body', 0, 1, 2, 0, 'Daga-Eiko-Freija'),
(52, 'Busto', 'Ninjafuku', 1, 0, 0, 0, 'Gidan-Amarant'),
(53, 'Busto', 'Mantello Nero', 0, 0, 0, 3, 'Gidan-Vivi-Daga-Quina-Eiko-Amarant'),
(54, 'Busto', 'T-shirt', 0, 1, 1, 0, 'Vivi-Daga-Quina-Eiko'),
(55, 'Busto', 'Spolverino', 0, 1, 1, 0, 'Vivi-Daga-Quina-Eiko'),
(56, 'Busto', 'Giacca Fatata', 0, 0, 2, 0, 'Vivi-Daga-Quina-Eiko'),
(57, 'Busto', 'Zinale', 0, 1, 1, 0, 'Quina'),
(58, 'Busto', 'Giacca Bianca', 0, 0, 2, 0, 'Daga-Eiko'),
(59, 'Busto', 'Giacca Nera', 0, 0, 2, 0, 'Vivi-Quina'),
(60, 'Busto', 'Giacca Pikapika', 0, 1, 1, 1, 'Vivi-Daga-Eiko-Quina'),
(61, 'Busto', 'Eolojacket', 1, 1, 1, 1, 'Vivi-Daga-Eiko-Quina'),
(62, 'Busto', 'Barda Magica', 0, 0, 1, 0, 'Steiner-Freija'),
(63, 'Busto', 'Corsaletto', 0, 0, 0, 1, 'Steiner-Freija'),
(64, 'Busto', 'Barda dorata', 0, 0, 1, 0, 'Steiner-Freija'),
(65, 'Busto', 'Diarmatura', 0, 1, 1, 0, 'Steiner-Freija'),
(66, 'Busto', 'Carabiniere', 1, 0, 0, 1, 'Steiner-Freija'),
(67, 'Busto', 'Dragon Armour', 0, 1, 1, 0, 'Steiner-Freija'),
(68, 'Busto', 'Armatura Genji', 0, 0, 2, 0, 'Steiner-Freija'),
(69, 'Busto', 'Maximilian', 0, 0, 0, 3, 'Steiner'),
(70, 'Busto', 'Gran Corazza', 0, 1, 0, 0, 'Steiner-Freija'),
(71, 'Accessorio', 'Galosce', 0, 0, 1, 1, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(72, 'Accessorio', 'Scarpe Rosse', 0, 0, 2, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(73, 'Accessorio', 'Moon Boot', 0, 1, 0, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(74, 'Accessorio', 'Stivali', 0, 2, 0, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(75, 'Accessorio', 'Pantofole', 2, 0, 0, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(76, 'Accessorio', 'Cavigliera', 0, 0, 1, 3, 'Daga-Freija-Eiko-Amarant'),
(77, 'Accessorio', 'Cinturone', 0, 3, 0, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(78, 'Accessorio', 'Cintura Nera', 0, 2, 0, 2, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(79, 'Accessorio', 'Marsupio', 0, 1, 1, 2, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(80, 'Accessorio', 'Anello Madain', 0, 0, 0, 2, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(81, 'Accessorio', 'Anello Rosetta', 0, 0, 1, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(82, 'Accessorio', 'Anello Reflex', 0, 1, 0, 1, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(83, 'Accessorio', 'Anello Coral', 0, 0, 0, 2, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(84, 'Accessorio', 'Anello di nozze', 0, 2, 0, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(85, 'Accessorio', 'Transmigranello', 0, 0, 0, 4, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(86, 'Accessorio', 'Anello Protex', 0, 0, 0, 1, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(87, 'Accessorio', 'Side/reo', 0, 2, 2, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(88, 'Accessorio', 'Sidereo', 1, 0, 1, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(89, 'Accessorio', 'Sciarpa gialla', 0, 2, 0, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(90, 'Accessorio', 'Foulard', 0, 0, 2, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(91, 'Accessorio', 'Spilla di gnomo', 0, 0, 0, 2, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(92, 'Accessorio', 'Spilla d\'angelo', 0, 2, 0, 0, 'Daga-Freija-Eiko'),
(93, 'Accessorio', 'Perle rosse', 0, 0, 2, 4, 'Daga-Freija-Eiko'),
(94, 'Accessorio', 'Cerchietto', 1, 0, 2, 1, 'Daga-Freija-Eiko'),
(95, 'Accessorio', 'Pettinino', 0, 3, 1, 1, 'Daga-Freija-Eiko'),
(96, 'Accessorio', 'Fermaglio', 0, 1, 2, 1, 'Daga-Freija-Eiko'),
(97, 'Accessorio', 'Fiocco', 0, 1, 3, 1, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant'),
(98, 'Accessorio', 'Incenso', 0, 0, 1, 0, 'Daga-Freija-Eiko'),
(99, 'Accessorio', 'Profumo', 0, 2, 0, 0, 'Daga-Freija-Eiko'),
(100, 'Accessorio', 'Materioscura', 0, 3, 2, 0, 'Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant');

-- --------------------------------------------------------

--
-- Struttura della tabella `personaggi`
--

CREATE TABLE `personaggi` (
  `id_personaggio` int(11) NOT NULL,
  `nome_personaggio` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `vel_base` int(11) NOT NULL,
  `for_base` int(11) NOT NULL,
  `mag_base` int(11) NOT NULL,
  `spr_base` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `personaggi`
--

INSERT INTO `personaggi` (`id_personaggio`, `nome_personaggio`, `vel_base`, `for_base`, `mag_base`, `spr_base`) VALUES
(1, 'Gidan', 23, 21, 18, 23),
(2, 'Daga', 21, 14, 23, 17),
(3, 'Vivi', 16, 12, 24, 19),
(4, 'Steiner', 18, 24, 12, 21),
(5, 'Freija', 20, 20, 16, 22),
(6, 'Quina', 14, 18, 20, 11),
(7, 'Eiko', 19, 13, 21, 18),
(8, 'Amarant', 22, 22, 13, 15);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `equipaggiamenti`
--
ALTER TABLE `equipaggiamenti`
  ADD PRIMARY KEY (`id_equip`);

--
-- Indici per le tabelle `personaggi`
--
ALTER TABLE `personaggi`
  ADD PRIMARY KEY (`id_personaggio`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `equipaggiamenti`
--
ALTER TABLE `equipaggiamenti`
  MODIFY `id_equip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT per la tabella `personaggi`
--
ALTER TABLE `personaggi`
  MODIFY `id_personaggio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
