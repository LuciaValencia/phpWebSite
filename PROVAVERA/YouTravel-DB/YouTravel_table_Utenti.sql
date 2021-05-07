
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
