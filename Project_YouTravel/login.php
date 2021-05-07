<!DOCTYPE html>
<html>
    
    <head>
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="CSS/generalCSS.css">
        <link rel="stylesheet" type="text/css" href="CSS/css_formIscrizione.css">
    
    </head>
    
    <body>
    
        <header>
            <div id="login" style="left:10%;">
            <a class="header" "display:inline" href="home.php" ><strong>H O M E</strong></a>
            <a class="header" style=" display:inline; margin-left:67%" href="home.php" ><strong>S I  G N  U P</strong></a>
            </div>
    
        </header>
        <main>
        <div class="primaRiga">   
            <div id="home-form" style="height:60%;width:800px; margin:110px 270px 0 0"> 
                <form id="formDati" action="form-Dati.php" method="POST">
                    <h2 align="center" style="margin-top:20px">Fai il login con le tue credenziali!</h2>
                    </br>
                    <strong>Mail: </strong>
                    <input id="mail" type="mail" name="mail" style="margin-top: 2.5%; width:95%" required/> </br></br>
            
                    <strong>Password: </strong>
                    <input type="password" id="pass" name="pass" style="margin-top: 2.5%" required/>
                    <div style="overflow:auto; margin-top:15px">
                        <div align="center">
                            <input style="width:15%" type="submit" value="Daje!"/>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        </main>
    </body>
</html>
                    
            