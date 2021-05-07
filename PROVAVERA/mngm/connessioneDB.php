<?php
    $erroreDB="";
	try {
        $conn = new PDO("mysql:host=localhost;dbname=YouTravel", "root");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e){
        $erroreDB = "La connessione non ha funzionato: ".$e->getMessage();
    }
?>