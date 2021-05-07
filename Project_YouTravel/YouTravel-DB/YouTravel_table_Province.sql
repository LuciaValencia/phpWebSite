
-- --------------------------------------------------------

--
-- Struttura della tabella `Province`
--

CREATE TABLE `Province` (
  `prov-ID` varchar(108) NOT NULL,
  `nome` text NOT NULL,
  `id-Regione` int(20) NOT NULL,
  `descrizione` text NOT NULL,
  `link` text NOT NULL,
  `adventure` int(11) DEFAULT NULL,
  `love` int(11) DEFAULT NULL,
  `culture` int(11) DEFAULT NULL,
  `relax` int(11) DEFAULT NULL,
  `history` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
