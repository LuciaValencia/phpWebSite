<?php
session_start();
$msg="Devi andare sul tuo profilo per eliminare il tuo account.";
if(isset($_POST["email"]) && isset($_POST["password"])){
    
    if ($_POST["email"] == $_SESSION["mail"] && $_POST["password"]==$_SESSION["pw"]){
        require("connessioneDB.php");
            if ($erroreDB!=""){
                echo $erroreDB;
            } else {
                $exec= "DELETE FROM Utenti WHERE email='".$_POST["email"]."' AND password='".$_POST["password"]."'";
                $sql= $conn->exec($exec);
                $msg = "<h1 style='color:#ff5050; width:800px; margin:100px 0 0 285px;' align='right'>Hai cancellato il tuo account.</h1><h2  margin:100px 0 0 285px;' align='right'>Ci spiace che tu te ne vada...</h2>";
                $conn=NULL;
            }
    } else {
        $msg="Le credenziali non si possono cancellare perchè non corrispondono con i dati di sessione.";
    }
}
echo $msg;
 
session_unset();
session_destroy();
?>