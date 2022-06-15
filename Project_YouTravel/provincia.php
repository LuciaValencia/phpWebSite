<?php
$sigla=isset($_GET["sigla"])? $_GET["sigla"]:"error";
?>

<!DOCTYPE html>
<html>
<head>
        <!--CSS DA MODIFICARE-->
        <title><?=$sigla?></title>
        <link rel="stylesheet" media="all" href="CSS/generalCSS.css">
    
        <link rel="stylesheet" type="text/css" href="CSS/css_formIscrizione.css">
    
        <!--LIBRERIA JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!--SCRIPT REST-->
        <!--<script>
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
        </script>-->
                
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
            
        

    </main>
</body>
</html>


<script>
    
        $.ajax({
            url:"http://localhost:8080/YouTravel/Project_YouTravel/mngm/api/leggiProvInfo.php?sigla=<?=$sigla?>", 
            type:"GET",
            success:function(response){ 
                console.log(response);
                html_desc ="<div>";
                html_desc += "<div class='home-mainColumn' style='width:500px; padding-left:7%; padding-top:4%'>";
                sigla = response.sigla;
                nomeProv = response.nome;
                regione = response.regione;
                tipologia = response.tipoViaggio;
                //foto = response.foto;
                html_desc+= "<div style='padding-top:20%'>";
                html_desc += "<h5>"+regione+"</h5>";
                html_desc += "<h1 style='text-transform:uppercase;color:#ff5050'>"+nomeProv+" ("+sigla+")</h1>";
                for (i=0;i<tipologia.length;i++){
                    html_desc+="<ul>";
                    html_desc+="<li>"+tipologia[i]+"</li>";
                    html_desc+="</ul>";
                }
                html_desc+="</div>";
                //html_desc+="<div id='foto' style='margin-top:15%' align='center'>"+foto+"</div>";
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
                    //console.log("recensioni di "+nomeProv);
                    $.ajax({
                        url:"http://localhost:8080/YouTravel/Project_YouTravel/mngm/api/leggiRecensione.php?provNome="+nomeProv,
                        type:"GET",
                        success:function(response){
                            html_rece="<div style='padding-left:20%'><hr><h6>Esperienze</h6><hr>";
                            for(i=0; i<response.receInArray.length; i++){
                                testo=response.receInArray[i].testo;
                                stelle=response.receInArray[i].stelle;
                                console.log(stelle);

                                html_rece+="<hr></br>"+stelle+" su 5 stelle </br></br>";
                                html_rece+="<p>≪ "+testo+" ≫</p></br>";
                            }
                            html_rece+="</div>";
                            //$("#foto").html(html_rece);
                            $("span").html(html_rece);
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
</script>