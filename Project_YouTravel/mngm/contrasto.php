<?php
session_start();

if (isset($_POST["c"])){ //QUIIII E SOTTO
    $_SESSION["contrasto"]=$_POST["c"];
    
    $mex="Hai impostato uno sfondo di colore: ".$_SESSION["contrasto"].".";
} else{
    $mex="Non ho capito che contrasto preferisci";
}
echo $mex;
?>