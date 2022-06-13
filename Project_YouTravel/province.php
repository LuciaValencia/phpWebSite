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
                                html_list += "<option value='"+nomeProv+"'>"+nomeProv+" - "+ sigla+"</option>";
                            }
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
                    var nomeProv=$("#nomeP").val();
                    //console.log("provincia: "+nomeProv);
                    $.ajax({
                        url:"http://localhost:8080/YouTravel/Project_YouTravel/mngm/api/leggiProvInfo.php?nomeP="+nomeProv,
                        type:"GET",
                        success:function(response){ 
                            html_desc ="<div>";
                            html_desc += "<div class='home-mainColumn' style='width:500px; padding-left:7%; padding-top:4%'>";
                            sigla = response.sigla;
                            nomeProv = response.nome;
                            regione = response.regione;
                            tipologia = response.tipoViaggio;
                            foto = response.foto;
                            html_desc+= "<div style='padding-top:20%'>";
                            html_desc += "<h5>"+regione+"</h5>";
                            html_desc += "<h1 style='text-transform:uppercase;color:#ff5050'>"+nomeProv+" ("+sigla+")</h1>";
                            for (i=0;i<tipologia.length;i++){
                                html_desc+="<ul>";
                                html_desc+="<li>"+tipologia[i]+"</li>";
                                html_desc+="</ul>";
                            }
                            html_desc+="</div>";
                            html_desc+="<div id='foto' style='margin-top:15%' align='center'>"+foto+"</div>";
                            html_desc+="<button id='recensioni' style='width:80%; margin-left:20%; margin-top:10%; border:2px solid #ff5050; color:#ff5050'>Leggi Esperienze</button>";
                            html_desc+= "</div>";
                            
                            html_desc +="<div class='home-mainColumn' style='width:500px;margin-left:15%; padding-top:15%; padding-right:5%'>";
                            descr = response.descrizione;
                            link = response.link;
                            html_desc+="<p align='right'>"+descr+"</p>";
                            html_desc+="<a href='"+link+"' style='color:#ff5050'> >> fonte</a></br></br></br>";
                            html_desc+= "</div>";
                            html_desc+= "</div>";
                            html_desc+= "<span></span>";
                            $("main").html(html_desc);
                            
                            //SCRIPT PER VISUALIZZARE RECE
                            $("#recensioni").on("click", function(){
                                console.log("recensioni di "+nomeProv);
                                $.ajax({
                                    url:"http://localhost:8080/YouTravel/Project_YouTravel/mngm/api/leggiRecensione.php?provNome="+nomeProv,
                                    type:"GET",
                                    success:function(response){
                                        html_rece="<div style='padding-left:20%'><hr><h6>Esperienze</h6><hr>";
                                        for(i=0; i<response.receInArray.length; i++){
                                            testo=response.receInArray[i].testo;
                                            stelle=response.receInArray[i].stelle;
                                        
                                            html_rece+="<hr></br>"+stelle+" su 5 stelle </br></br>";
                                            html_rece+="<p>≪ "+testo+" ≫</p></br>";
                                        }
                                        html_rece+="</div>";
                                        $("#foto").html(html_rece);
                                        $("#recensioni").html("Nuova Ricerca");
                                        $("#recensioni").on("click",function(){
                                            window.location.reload();
                                        
                                        });
                                    },
                                    error:function(xhr, err, exc){
                                        console.log("problemi con ajax per recensione: "+xhr+err+exc);
                                    }
                                });
                            });
                        },
                        error: function(xhr,err,exc){
                            console.log(xhr,err,exc);
                            $("main").html(xhr+err+exc);
                        }
                    });
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
            
        </div>

    </main>
</body>
</html>