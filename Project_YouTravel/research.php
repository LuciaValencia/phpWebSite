<?php
 //echo $_GET["name"]; 
$connection = new mysqli('localhost', 'root', "", 'YouTravel');

$search = $_GET["name"];
//$search = $mysqli -> real_escape_string($search); //QUI INSERIAMO SQLinj

$query = "SELECT * FROM Province WHERE `nome` = '".$search."'";
$result = $connection->query($query);


?>

<?php
    
    if($row = $result -> fetch_object()){
    ?>
    <h1 id="<?= $row -> nome?>">You searched for: <? echo $row -> nome ?></h1>
    <?php 
    

    echo "<p>".$row -> descrizione."</p>";

    //echo "<p>".$row -> Year."</p>";
    //echo "<p>".$row -> Location."</p>";
    //echo "<p>".$row -> Description1."</p>";
    // echo "<p>".$row -> Description2."</p>";
    // echo "<p>".$row -> Description2a."</p>";
    // echo "<p>".$row -> Description3."</p>";
      
//$row -> ProjectTitle
} else {
    echo "non trovo niente";
}?>