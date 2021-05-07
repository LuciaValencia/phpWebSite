
-- --------------------------------------------------------

--
-- Struttura della tabella `Regioni`
--

CREATE TABLE `Regioni` (
  `ID-regione` int(20) NOT NULL,
  `nome-Regione` text NOT NULL,
  `label-zona` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Regioni`
--

INSERT INTO `Regioni` (`ID-regione`, `nome-Regione`, `label-zona`) VALUES
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
