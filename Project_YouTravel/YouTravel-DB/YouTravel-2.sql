-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 15, 2022 alle 16:02
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `YouTravel`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Province`
--

CREATE TABLE `Province` (
  `numProv` int(11) NOT NULL,
  `provID` varchar(108) NOT NULL,
  `nome` text NOT NULL,
  `idRegione` int(20) NOT NULL,
  `descrizione` text NOT NULL,
  `link` text NOT NULL,
  `adventure` int(11) DEFAULT NULL,
  `love` int(11) DEFAULT NULL,
  `culture` int(11) DEFAULT NULL,
  `relax` int(11) DEFAULT NULL,
  `history` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Province`
--

INSERT INTO `Province` (`numProv`, `provID`, `nome`, `idRegione`, `descrizione`, `link`, `adventure`, `love`, `culture`, `relax`, `history`) VALUES
(1, 'AT', 'Asti', 4, 'abcf', '', 1, 1, 1, NULL, 1),
(2, 'TO', 'Torino', 4, 'ergewrvewdr', '', NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Recensioni`
--

CREATE TABLE `Recensioni` (
  `idRece` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `testo` text NOT NULL,
  `stelle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Recensioni`
--

INSERT INTO `Recensioni` (`idRece`, `idUtente`, `idProvincia`, `testo`, `stelle`) VALUES
(1, 1, 1, 'fa schifo', 4),
(2, 1, 2, 'fantastico!!!', 5),
(3, 3, 1, '<script>alert(\"Tra sette giorni morirai\");</script>', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `Regioni`
--

CREATE TABLE `Regioni` (
  `IDregione` int(20) NOT NULL,
  `nome-Regione` text NOT NULL,
  `label-zona` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Regioni`
--

INSERT INTO `Regioni` (`IDregione`, `nome-Regione`, `label-zona`) VALUES
(1, 'Valle D\'Aosta', 'nord'),
(2, 'Lombardia', 'nord'),
(3, 'Trentino Alto Adige', 'nord'),
(4, 'Piemonte', 'nord'),
(5, 'Friuli-Venezia Giulia', 'nord\r\n'),
(6, 'Veneto', 'nord'),
(7, 'Liguria', 'nord'),
(8, 'Emilia Romagna', 'nord'),
(9, 'Toscana', 'centro'),
(10, 'Marche', 'centro'),
(11, 'Umbria', 'centro'),
(12, 'Lazio', 'centro'),
(13, 'Abruzzo', 'sud'),
(14, 'Molise', 'sud'),
(15, 'Puglia', 'sud'),
(16, 'Campania', 'sud'),
(17, 'Basilicata', 'sud'),
(18, 'Calabria', 'sud'),
(19, 'Sicilia', 'isole'),
(20, 'Sardegna', 'isole');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `utenteID` int(11) NOT NULL,
  `nome` text NOT NULL,
  `anni` text NOT NULL,
  `sex` text NOT NULL,
  `persone` int(11) NOT NULL,
  `dove` text NOT NULL,
  `trip_kind` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Utenti`
--

INSERT INTO `Utenti` (`utenteID`, `nome`, `anni`, `sex`, `persone`, `dove`, `trip_kind`, `email`, `password`) VALUES
(1, 'Lucia', 'giovani', 'F', 3, '4', 'avventura', 'dasd@sdv.cpom', 'abcd'),
(2, 'efhwuijods', 'giovani', 'M', 3, '1', 'amore', 'jwfef@dnvc.com', 'vgjhbkl'),
(3, '&lt;script&gt;alert(1);&lt;/script&gt;', 'giovani', 'F', 2, '1', 'avventura', 'fhgvjbkl@fcgh.cdwc', 'fghuji'),
(4, 'administrator', '', '', 1, '', '', 'admin@youtravel.com', 'sdfcghjkl'),
(5, 'hjkl', 'teenager', 'F', 8, '1', 'avventura', 'dfwdsf@ßfv.cds', 'dvwdf');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`provID`),
  ADD UNIQUE KEY `numProv` (`numProv`),
  ADD KEY `id-Regione` (`idRegione`);

--
-- Indici per le tabelle `Recensioni`
--
ALTER TABLE `Recensioni`
  ADD PRIMARY KEY (`idRece`),
  ADD KEY `idRece` (`idRece`) USING BTREE;

--
-- Indici per le tabelle `Regioni`
--
ALTER TABLE `Regioni`
  ADD PRIMARY KEY (`IDregione`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`utenteID`),
  ADD KEY `dove` (`dove`(768));

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Province`
--
ALTER TABLE `Province`
  MODIFY `numProv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `Recensioni`
--
ALTER TABLE `Recensioni`
  MODIFY `idRece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `Regioni`
--
ALTER TABLE `Regioni`
  MODIFY `IDregione` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `utenteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
