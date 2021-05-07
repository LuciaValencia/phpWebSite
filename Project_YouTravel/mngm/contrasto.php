<?php
session_start();
$mex="Non ho capito che contrasto preferisci";
if (isset($_POST["c"])){ //QUIIII E SOTTO
    $_SESSION["contrasto"]=$_POST["c"];
    
    $mex="Hai impostato uno sfondo di colore: ".$_SESSION["contrasto"].".";
}
echo $mex;
?>