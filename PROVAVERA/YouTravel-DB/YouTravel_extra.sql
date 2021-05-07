
--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`prov-ID`),
  ADD KEY `id-Regione` (`id-Regione`);

--
-- Indici per le tabelle `Regioni`
--
ALTER TABLE `Regioni`
  ADD PRIMARY KEY (`ID-regione`);

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
-- AUTO_INCREMENT per la tabella `Regioni`
--
ALTER TABLE `Regioni`
  MODIFY `ID-regione` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `utenteID` int(11) NOT NULL AUTO_INCREMENT;
