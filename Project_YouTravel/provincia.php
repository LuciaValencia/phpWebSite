<?php
$sigla=isset($_GET["sigla"])? $_GET["sigla"]:"error";

echo $sigla;
?>

<script>
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