<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
        <!--CSS DA MODIFICARE-->
        <link rel="stylesheet" media="all" href="CSS/generalCSS.css">
        
        <link rel="stylesheet" type="text/css" href="CSS/css_formIscrizione.css">
        
        <!--LIBRERIA JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!--SCRIPT-->
        <script type="text/javascript">
        $(document).ready(function(){
            //SCRIPT PER IL CONTRASTO Dark
            $("#contrastoD").on("click", function(){
                var col= "#000000";
                var colOK=col.replace("#", "%23");
                var T="inline";
                var F="none";
                var c1="2px solid #333";
                var c2="#66ff33";
                $.ajax({
                    url:"mngm/contrasto.php",
                    type:"POST",
                    data:"c="+colOK,
                    success: function(response){
                        //console.log(response);
                        $("body").css("background-color",col);
                        $("body").css("color",col);
                        $("main").css("background-color",col);
                        $("#contrastoL").css("display",T);
                        $("#contrastoD").css("display",F);
                        $("header").css("border-bottom", c1);
                        $(".header").css("color", col);
                        $("button").css("color",c2);
                    },
                    error: function(xhr, resp, text){
                        console.log(xhr, resp, text);
                    }
                }); //ajax
            }); //onclick
            
            //SCRIPT PER IL CONTRASTO Light
            $("#contrastoL").on("click", function(){
                var col= "#ffffff";
                var colOK=col.replace("#", "%23");
                var T="inline";
                var F="none";
                var c1="2px solid #EDEDEA";
                var c2="#333";
                $.ajax({
                    url:"mngm/contrasto.php",
                    type:"POST",
                    data:"c="+colOK,
                    success: function(response){
                        //console.log(response);
                        $("body").css("background-color",col);
                        $("body").css("color",c2);
                        $("main").css("background-color",col);
                        $("#contrastoD").css("display",T);
                        $("#contrastoL").css("display",F);
                        $("header").css("border-bottom", c1);
                        $(".header").css("color", c2);
                    },
                    error: function(xhr, resp, text){
                        console.log(xhr, resp, text);
                    }
                }); //ajax
            }); //onclick
            
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
                        
                        //SCRIPT NUOVA RECENSIONE
                        $("#caricaRece").on("click",function(){
                            var utente= <?php echo $_SESSION["user"] ?>;
                            var prov=$("#nomeP").val();
                            var txt=$("#testoRece").val();
                            var stelle=$("#pntRec").val();
                            var newOne='{"method": "POST", "utente": "'+utente+'", "prov": "'+prov+'", "txt": "'+txt+'", "stelle": "'+stelle+'"}';
                            console.log(newOne);
                             $.ajax({
                                 url: "http://localhost:8080/YouTravel/Project_YouTravel/mngm/api/newRecensione.php",
                                 type:"POST",
                                 contentType:"application/json",
                               
                                 data: newOne,
                                 success:function(response){
                                    html_code="<h4 style='padding-top:80%; margin-bottom:0px; color:#333'>"+response.message+"</h4>";
                                     console.log(html_code);
                                     $("#rece").html(html_code);
                                 },
                                 error: function(xhr,err,exc){
                                     console.log(xhr+"-"+err+"-"+exc);
                                 }
                             });
                        });  
                    },
                    error: function(xhr,err,exc){
                        console.log(xhr,err,exc);
                        $("#nomeP").html(xhr+err+exc);
                    }

                });
            });
            
            //SCRIPT CANCELLA RECE
            $("#cancellaRece").on("click", function(){
                $("#hGrigio").html("Cancella una tua esperienza");
                $("#cancellaRece").css("display","none");
                $("#uploadRece").css("display","none");
                $("#rece").css("margin-top", "50%");
                $("#rece").append("<input type='submit' id='cancelRece' name='cancelRece' value='Elimina' style='margin-top:2.5%;'/>");
                $("#nomeP").on("change", function(){
                    var nomeProv=$("#nomeP").val();
                    $("#rece").css("margin-top", "-5%");
                    $.ajax({
                        url:"http://localhost:8080/TECNOLOGIE_WEB/ESAME/PROVAVERA/mngm/api/leggiRecensione.php?provNome="+nomeProv,
                        type:"GET",
                        success:function(response){
                        html_rece="<h6>Verranno cancellate tutte queste esperienze</h6>";
                          for(i=0; i<response.receInArray.length; i++){
                              testo=response.receInArray[i].testo;
                              stelle=response.receInArray[i].stelle;
                              html_rece+="<hr></br>"+stelle+" su 5 stelle </br></br>";
                              html_rece+="<p>≪ "+testo+" ≫</p></br>";
                          }
                            html_rece+="</br></br>";
                        $("#recensione").html(html_rece);
                        },
                        error:function(xhr, err, exc){
                            console.log(xhr+err+exc);
                        }
                    });//ajax
                });//onnchange della provincia
                $("#cancelRece").on("click",function(){
                    var utente= <?php echo $_SESSION["user"] ?>;
                    var prov=$("#nomeP").val();
                    var deleteOne='{"utente": "'+utente+'", "prov": "'+prov+'"}';
                    //console.log(deleteOne);
                    $.ajax({
                        url:"http://localhost:8080/TECNOLOGIE_WEB/ESAME/PROVAVERA/mngm/api/cancellaRecensione.php",
                        type: "DELETE",
                        contentType: 'application/json',
                        data: deleteOne,
                        success:function(response){
                        html_delete="<h4 style='padding-top:80%; margin-bottom:0px; color:#333'>"+response.message+"</h4>";
                        html_delete+="<h6 style='color:#333'>Per raccontarne una nuova ricarica la pagina</h6>"
                        //console.log(html_delete);
                            $("#rece").html(html_delete);
                        },
                        error: function(xhr,err,exc){
                            console.log(xhr+"-"+err+"-"+exc);
                        }
                    });
                }); //onclick dell'input elimina
            }); //onclick del bottone cancella rece
        
            $("a#provIter").on("click",function(){
                var nomeProv=$(this).data("value"); 
                //console.log("provincia: "+nomeProv);
                $.ajax({
                    url:"http://localhost:8080/TECNOLOGIE_WEB/ESAME/PROVAVERA/mngm/api/leggiProvInfo.php?nomeP="+nomeProv,
                    type:"GET",
                    success:function(response){
                        sigla = response.sigla;
                        nomeProv = response.nome;
                        regione = response.regione;
                        tipologia = response.tipoViaggio;
                        html_desc = "<h5>"+regione+"</h5>";
                        html_desc += "<h1 style='text-transform:uppercase;color:#ff5050'>"+nomeProv+" ("+sigla+")</h1>";
                        for (i=0;i<tipologia.length;i++){
                            html_desc+="<ul>";
                            html_desc+="<li>"+tipologia[i]+"</li>";
                            html_desc+="</ul>";
                        }
                        
                        descr = response.descrizione;
                        link = response.link;
                        html_desc+="<p style='padding-top:5%;'>"+descr+"</p>";
                        html_desc+="</br><a href='"+link+"' style='color:#ff5050'> >> fonte</a>";
                        
                        $("#rs").css("display","block");
                        $("#rs").html(html_desc);
                    },
                    error: function(xhr,err,exc){
                        console.log(xhr+err+exc);
                    }
                }); //ajax
            });//click su elenco province
        }); //ready
        </script>  

</head>      
<body>
<header>
        <div id="login" style="left:10%;">
        <a class="header" style="display:inline; margin-left:72.5%" href="logout.php"><strong>BYE-BYE</strong></a>
        </div>
</header>
<main>
    <div class="primaRiga">
        <!--MAPPA-->
        <div class="home-mainColumn">
                    <iframe id="mappa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12344878.428305836!2d3.7241571053141707!3d40.94015826668297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItalia!5e0!3m2!1sit!2sit!4v1611331224957!5m2!1sit!2sit"></iframe>
                </div>

        <!--psudo-SPAZIO PERSONALE-->
        <div class="home-mainColumn">
            <div id="home-form">
                <?php

                $username = $_POST["mail"];
                $pw = $_POST["pass"];
                if (isset ($username ,$pw)){
                    require ("mngm/connessioneDB.php");
                    if ($erroreDB!=""){
                        echo $erroreDB;
                    } 
                    else {
                        $_SESSION["user"] = $conn->quote($username);
                        $tutto_ok = false;
                        $rs=$conn->query("SELECT*FROM Utenti WHERE email=".$_SESSION["user"]); //ossia l'email 
                        include("mngm/Utenti_Classe.php");

                        if($rs->rowCount()==0){
                            //se è un nuovo utente
                            $nome = htmlspecialchars($_POST["user"]);
                            $utente= new Utente($nome);
                            $anni = $_POST["età"];
                                $utente->setAnni($anni);
                            $sex = $_POST["genere"];
                                $utente->setSesso($sex);
                            $trip=$_POST["viaggio"];
                                $utente->setTipo($trip);
                            $luogo = $_POST["regione"]; //è un numero
                                $utente->setLuogo($luogo);
                            $utente->setPosta($username);
                            $utente->setPw($pw);
                            $ppl = $_POST["persone"]; //tutti meno utente
                                $utente->setGruppo($ppl);
                            $utente->inserisciInDB();
                            $res=$conn->query("SELECT*FROM Regioni WHERE IDregione=".$luogo);
                            $reg = $res->fetch(PDO::FETCH_ASSOC);
                            $luogo = $reg["nome-Regione"];
                                $utente->setRegione($luogo);
                            $tutto_ok=true;
                        }  
                        else {
                            //se è un utente già iscritto
                            $ut = $rs->fetch(PDO::FETCH_ASSOC);
                            if ($pw == $ut["password"] && $username == $ut["email"]){
                                $tutto_ok=true;
                                $nome = $ut["nome"];
                                    $utente= new Utente($nome);
                                $utente->setPosta($username);
                                $utente->setPw($pw);
                                $ppl = $ut["persone"];
                                    $utente->setGruppo($ppl);
                                $sex = $ut["sex"];
                                    $utente->setSesso($sex);
                                $anni = $ut["anni"];
                                    $utente->setAnni($anni);
                                $trip = $ut["trip_kind"];
                                    $utente->setTipo($trip);
                                $utente->setLuogo($ut["dove"]);
                                $res=$conn->query("SELECT*FROM Regioni WHERE IDregione=".$utente->luogo);
                                $reg = $res->fetch(PDO::FETCH_ASSOC);
                                $luogo = $reg["nome-Regione"];
                                $utente->setRegione($luogo);
                            }
                            else {
                                $tutto_ok=false;
                            }
                        }

                        if($tutto_ok){
                            $_SESSION["pw"]= $pw;
                            $_SESSION["mail"]=$username;
                            $_SESSION["sex"]=$utente->sesso;
                            $_SESSION["nome"]=$utente->nome;
                            $_SESSION["ppl"]=$utente->gruppo;
                            $_SESSION["anni"]=$utente->anni;
                            $_SESSION["luogo"]=$utente->regione;
                            $_SESSION["trip"]=$utente->tipo;
                            ?>
                            
                            </br><h1 align="right">Ciao, <?= $_SESSION["nome"] ?>, 
                                <?php  if ( $_SESSION["sex"] == "F"){echo "benvenuta";} else{echo "benvenuto";} ?>!
                            </h1>

                            <hr></br></br>
                            <p>Questi sono i dati che abbiamo salvato per aiutarti a scegliere dove andare in viaggio: 
                            <ul>
                            <li>Oltre a te, ci sono <?= $_SESSION["ppl"]?> <?= $_SESSION["anni"]?>.</li>
                            <li>Volete andare in <?=$_SESSION["luogo"]?> per un po' di <?=$_SESSION["trip"]?>.</li>
                            </ul>
                            </p>

                            </br></br></br>

                            <div>
                                <button align="left" type="button" style="width:25%; margin-left:10%; display:'inline'" id="DELETE" onclick="location.href='deleteAccount.php'">
                                    CANCELLA ACCOUNT
                                </button>
                                
                                <button style="width:25%; margin-left:30%;" id="contrastoD">
                                    DARK CONTRAST
                                </button>

                                <button  style="width:25%;margin-left:30%;display:none" id="contrastoL">
                                    LIGHT CONTRAST
                                </button>                                
                            </div>   
                             
            </div>
        </div>
    </div>

    <!--seconda riga-->
    <div class ="secondaRiga" id="secondariga">
        <div class="home-mainColumn">
            <h1 id="hGrigio" style="font-size:110px">Racconta la tua esperienza</h1>
            <button type="button" id="cancellaRece" style="width:300px; color:#ff5050; margin-top:15%; display:'inline'">Cancella vecchie esperienze</button>
        </div>
        <div class="home-mainColumn" align="right" style="padding-top:2.5%">
            <div id="rece">
                <span id="recensione"></span>
                <label for= "regioneID" style="color:#000000" >Regione</label></br>
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
                </select></br></br>
                <label for= "nomeP" style="color:#000000">Province</label></br>
                <select name="nomeP" id="nomeP" required style="width:200px; font-size:170px">
                    <option>Scegli...</option>
                </select></br></br>
                <div id="uploadRece" style="display:'inline'">
                <label for="pntRec" style="color:#000000">Che voto dai al tuo viaggio?</label></br><output id="voto" for="pntRec" style="margin-right:12px; font-size:17px; color:#000000"></output>
                <input type="range" min="0" max="5" name="pntRec" id="pntRec" style="width:400px; margin-left:115px; margin-top:2px" required value="0" onchange="voto.value=value+' stelle su 5'"/></br>
                <label for="testoRece" style="color:#000000">Recensione</label></br>
                <textarea id="testoRece" name="testoRece" required style="margin-top:6px ;width:500px; height:250px"></textarea>
                <input type="submit" id="caricaRece" name="caricaRece" style="margin-top:5%;"/>
                </div>
                
            </div>
        </div>
    </div>
    <div class ="terzaRiga">
        <div class="home-mainColumn" style="width:40%">
            <div style='margin-top:70%; padding-left:25%; color:#ffffff'><ul>
            <?php $utente->setItinerario();?>
            </ul></div>
        </div>
        <div class="home-mainColumn" align="right" style="width:60%">
            <div style="padding:10%; padding-right:25%">
            <h1 style="font-size:110px; color:#66ff33; margin-bottom:0%">Itinerario</h1>
            <h6 style="color:#66ff33; margin-right:-8%">⬇︎⬇︎ clicca sulla provincia per leggerne le informazioni ⬇︎⬇︎</h6>
            </div>
        </div>
    </div>

    <div class ="secondaRiga" id="rs" style="padding:10%; display:none"></div>
                                
                <?php
                            }
                            else {
                               echo "<h1 align='center' style='padding-top:37.5%'>Password errata</h1><h6 align='center'>riprova per favore.</h6></br></br>";
                                ?>
                                <button style="margin-left:41.5%" onclick="location.href='login.php'">ACCEDI</button>
                        <?php }
                    }
                    $conn= null;
                }
                else {?>
                    <h3>Sessione scaduta: prima devi entrare con le tue credenziali.</h3>
                    <button style="margin-top:41.5%" onclick="location.href='login.php'">ACCEDI</button>
                <?php }

                ?>
            

</main>                 
</body>
</html>


