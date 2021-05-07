<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
        <!--CSS DA MODIFICARE-->
        <link rel="stylesheet" media="all" href="CSS/generalCSS.css">
        
        <link rel="stylesheet" type="text/css" href="CSS/css_formIscrizione.css">
        
        <!--LIBRERIA JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!--SCRIPT CANCELLA ACCOUNT-->
        <script>
        $(document).ready(function(){
            $("#invia").on("click",function(){
                var email=$("#mail").val();
                var password=$("#pass").val();
                //console.log(email+"+"+password);
               $.ajax({
                    url:"mngm/cancellazione.php",
                    type:"POST",
                    data:{"email":email, "password":password},
                    success: function(response){
                        console.log(response);
                        $(".primaRiga").html(response); $("#profilo").css("display","none");
                    },
                    error: function(xhr, resp, text){
                        console.log(xhr, resp, text);
                    }
                }); //ajax
            });
        });
    </script>
    
</head> 
<body>
    <?php
    if (isset($_SESSION["contrasto"])){
        $contrasto=$_SESSION["contrasto"];
    ?>
       <!--SCRIPT COLORI PAGINA-->
        <script>
            $(document).ready(function(){
                var col="<?php echo $contrasto ?>";
                if(col=="#000000"){
                    $("body").css("background-color",col);
                    $("main").css("background-color",col);
                    $(".header").css("color", col);
                    $("header").css("border-bottom", col);
                    $("#formDati").css("color", col);
                }
            });
        </script>
    <?php
    }
    ?>
    
    <header>
            <div id="login" style="left:10%;">
                <a class="header" "display:inline" href="home.php" ><strong>H O M E</strong></a>
                <a class="header" style=" display:inline; margin-left:67%" href="form-Dati.php" id="profilo"><strong>P R O F I L O</strong></a>
                
                </div>
    </header>
    <main>
        <div class="primaRiga">   
            <div id="home-form" style="height:60%;width:800px; margin:110px 270px 0 0"> 
                <form id="formDati">
                    <h2 align="center" style="margin-top:20px">Sei <?php if($_SESSION["sex"] == "F"){echo "sicura";}else {echo "sicuro";} ?> di volerci lasciare?</h2>
                    <h6 align="center">devi prima confermarci le tue credenziali</h6>
                    </br>
                    <strong>Mail: </strong>
                    <input id="mail" type="mail" name="mail" style="margin-top: 2.5%; width:95%" required/> </br></br>
            
                    <strong>Password: </strong>
                    <input type="password" id="pass" name="pass" style="margin-top: 2.5%" required/>
                    <div style="overflow:auto; margin-top:15px">
                        <div align="center">
                            <button id="invia" style="width:15%; margin-top:5%" type="button">bye-bye</button>
                            

                            
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </main>
</body>
</html>