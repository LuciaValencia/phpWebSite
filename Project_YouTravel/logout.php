<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
        <!--CSS DA MODIFICARE-->
        <link rel="stylesheet" media="all" href="CSS/generalCSS.css">
        
        <link rel="stylesheet" type="text/css" href="CSS/css_formIscrizione.css">
        
        <!--LIBRERIA JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

</head> 
<body>

    <header style="background-color: #66ff33" >
        <div id="login" style="left:10%">
        <a style="color: #000000;" href="home.php" ><strong>H O M E</strong></a>
        </div>
    </header>
    
    <main>
    <div class="primaRiga" > 
<?php 
    if (isset($_SESSION["user"])) {
        require ("mngm/connessioneDB.php");
        if ($erroreDB!=""){
            echo $erroreDB;
        } 
        else {
            $rs =  $conn->query("SELECT nome FROM Utenti WHERE email=".$_SESSION["user"]);
            $ut = $rs->fetch( PDO::FETCH_ASSOC);
            $nome = $ut["nome"];
        }

	if (isset($_SESSION["contrasto"])) { 
	  $contrasto = $_SESSION["contrasto"];
?>
    <script>
	$(document).ready(function() {
		var col = "<?php echo $contrasto ?>";
        if(col=="#000000"){
            $("body").css("background-color",col);
            $("main").css("background-color",col);
            $("body").css("color","#66ff33");
            $(".header").css("color", col);
            $("header").css("border-bottom", col);
        } 
	});
   </script>
<?php
	}
?>      

  <h1 style="color: #ff5050; width:800px; margin:100px 0 0 285px;" align="right">Ciao, <?= $nome ?>!</h1>
<?php 
        session_unset();
        session_destroy();
?>
      <h2 style="width:800px; margin:100px 0 0 285px;" align="right">Speriamo di rivederti presto!</h2>
<?php
    }
    else {
        echo "<h1 align='right'>Non so chi sei, ma è stato bello averti qui!</h1></br> <h2 align='right'>:D</h2>";
        header("location:home.php");
    }
?>
    </div>
    </main>
</body>
</html>