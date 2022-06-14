<!DOCTYPE html>
<html>
<head>
        <!--CSS DA MODIFICARE-->
        <link rel="stylesheet" media="all" href="CSS/generalCSS.css">
    
        <link rel="stylesheet" type="text/css" href="CSS/css_formIscrizione.css">
    
        <!--LIBRERIA JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!--SCRIPT REST-->
        <script>
            $(document).ready(function(){
                //SCRIPT DI RICERCA
                $("#regioneID").on("change", function(){
                    var idReg = $("#regioneID").val();
                    //console.log("regione: "+idReg);
                    $.ajax({
                        url:"http://localhost:8080/YouTravel/Project_YouTravel/mngm/api/leggiProvLista.php?regioneID="+idReg,
                        type: "GET",
                        success: function(response){
                            html_list = "<option>Scegli...</option>";
                            for (i=0;i<response.provinciainarray.length;i++){
                                sigla = response.provinciainarray[i].sigla;
                                nomeProv = response.provinciainarray[i].nome;
                                html_list += "<option value='"+sigla+"'>"+nomeProv+" - "+ sigla+"</option>";
                            }
                            //html_list+="";
                            $("#nomeP").html(html_list);
                        },
                        error: function(xhr,err,exc){
                            console.log(xhr,err,exc);
                            $("#nomeP").html(xhr+err+exc);
                        }

                    });
                });
                
                //SCRIPT DI DESCRIZIONE
                $("#nomeP").on("change", function(){
                    sigla=$("#nomeP").val();
                    console.log(sigla);
                    $("#ricercaBTN").html("<a href='provincia.php?sigla="+sigla+"'><button type='button'>Visualizza scheda</button></a>");
                    
                    
                });
            });
        </script>
                
</head>      
<body>
    <header style="background-color: #66ff33">
        <div id="login" style="left:10%;">
            <a style="color: #000000; display:inline" href="home.php" ><strong>H O M E</strong>
            </a>
            <a style="color: #000000; display:inline; margin-left:67%" href="login.php" ><strong>L O G I N</strong>
            </a>
        </div>
    </header>
    <main>
            
        <!-- SCEGLI REGIONE > SCEGLI PROVINCIA -->
        <div class="primaRiga" style="height:612px; padding-top:15%;padding-left:2%; padding-right:2%" align="center">

            <h1 style="margin-top:2.5%; color: #ff5050;width:725px;">Cerca</h1>
            <h6 style="color: #ff5050">Quale provincia sei curioso di conoscere?</h6>
            </br></br>
            <label for= "regioneID">Regione</label></br>
            <select name="regioneID" id="regioneID" required style="width:200px; font-size:170px">
                <option>Scegli...</option>
                <option value="1">Valle D'Aosta</option>
                <option value="2">Lombardia</option>
                <option value="3">Trentino Alto Adige</option>
                <option value="4">Piemonte</option>
                <option value="5">Friuli-Venezia Giulia</option>
                <option value="6">Veneto</option>
                <option value="7">Liguria</option><option value="8">Emilia Romagna</option>
                <option value="9">Toscana</option>
                <option value="10">Marche</option>
                <option value="11">Umbria</option>
                <option value="12">Lazio</option>
                <option value="13">Abruzzo</option>
                <option value="14">Molise</option>
                <option value="15">Puglia</option>
                <option value="16">Campania</option><option value="17">Basilicata</option><option value="18">Calabria</option><option value="19">Sicilia</option>
                <option value="20">Sardegna</option>
            </select>

            </br></br>

            <label for= "nomeP">Province</label></br>
            <select name="nomeP" id="nomeP" required style="width:200px; font-size:170px">
                <option>Scegli...</option>

            </select>
            </br></br></br></br></br></br>
            <div id="ricercaBTN"></div>

            

        </div>

    </main>
</body>
</html>