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
<header>
    <div id="login" style="left:82%">
        <a class="header" href="login.php"><strong>L O G I N</strong></a>
    </div>
</header>
    
<main>
        
    <!--prima riga del main-->
    <div class="primaRiga">   
        <!--MAPPA-->
        <div class="home-mainColumn">
          <iframe id="mappa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12344878.428305836!2d3.7241571053141707!3d40.94015826668297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItalia!5e0!3m2!1sit!2sit!4v1611331224957!5m2!1sit!2sit"></iframe>
        </div>

        <!--BENVENUTO+FORM-->
        <div class="home-mainColumn">
            <div id="home-form">
                <form id="form-Dati" action="form-Dati.php" method="post">
                    <!--STEP-->
                    <div style="text-align:center;margin-top:0px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span> <!--ultima finestra che veramente permette il submit-->
                    </div>

                    <!--tab n:0-->
                    <div class="tab">
                        </br></br>
                        <h1>Hey ciao!</h1>
                        <p>Questo è YouTravel, un programma che ti permetterà di avere, in una pagina sola, tutte le informazioni per un tuo viaggio in Italia in base ad un profilo personalizzato.</p>
                        <h6 style="margin-top:70px; margin-left: 0px">Per far questo abbiamo bisogno di alcuni dati</h6></br></br>
                    </div>

                    <!--tab n:1-->
                    <div class="tab">
                        </br>
                        <h1>Parlaci un po' di te!</h1>
                        <p>Come ti chiami?</p>
                        <input type="text" name="user" ONINPUT="this.className = ''" required/>
                        </br>
                        <p>In che genere ti riconosci?</p>
                        <input type="radio" id="F" ONINPUT="this.className = ''" name="genere" value="F" REQUIRED/>
                        <label for="F">Femminile</label>
                        <input type="radio" id="M" ONINPUT="this.className = ''" name="genere" value="M" REQUIRED>
                        <label for="M">Maschile</label>
                    </div>

                    <!--tab n:2-->
                    <div class="tab">
                        </br><h1>In media quanti anni hanno quelli del tuo gruppo?</h1>
                        <input ONINPUT="this.className = ''" REQUIRED type="radio" id="meno20" name="età" value="teenager"/>
                        <label for="meno20">Meno di 20 anni</label>
                        <input ONINPUT="this.className = ''" REQUIRED type="radio" id="20-40" name="età" value="giovani">
                        <label for="20-40">Tra i 20 ed i 40 anni</label>
                        <input ONINPUT="this.className = ''" REQUIRED type="radio" id="più40" name="età" value="adulti">
                        <label for="più40">Più di 40 anni</label></br>
                    </div>

                    <!--tab n:3-->
                    <div class="tab">
                        </br><h1>Domande sul tuo viaggio</h1>
                        </br>
                        <p>Oltre te, quante persone ci sono?</p>
                        <input ONINPUT="this.className = ''" style="width:450px; margin-top:5px;" type="number" min="0"max="254" id="persone" name ="persone" required/>
                        </br></br>
                        <p>Dove vorresti andare?</p>
                        <select ONINPUT="this.className = ''" style="width:200px; font-size:170px;" name="regione" id="regione" required>
                           <optgroup label="Nord">
                           <option value="1">Valle D'Aosta</option>
                           <option value="2">Lombardia</option>
                           <option value="3">Trentino Alto Adige</option>
                           <option value="4">Piemonte</option>
                           <option value="5">Friuli-Venezia Giulia</option>
                           <option value="6">Veneto</option>
                           <option value="7">Liguria</option>
                           <option value="8">Emilia Romagna</option>
                           </optgroup>
                           <optgroup label="Centro">
                           <option value="9">Toscana</option>
                           <option value="10">Marche</option>
                           <option value="11">Umbria</option>
                           <option value="12">Lazio</option>
                           </optgroup>
                           <optgroup label="Sud e Isole">
                           <option value="13">Abruzzo</option>
                           <option value="14">Molise</option>
                           <option value="15">Puglia</option>
                           <option value="16">Campania</option>
                           <option value="17">Basilicata</option>
                           <option value="18">Calabria</option>
                           <option value="19">Sicilia</option>
                           <option value="20">Sardegna</option>
                           </optgroup>
                       </select></br></br>
                    </div>

                    <!--tab n:4-->
                    <div class="tab">
                        <h1>Che tipo di viaggio fa più per voi?</h1>
                        <input style="margin-top:0%" ONINPUT="this.className = ''"  type="radio" name="viaggio" id="option1" value="avventura"/> Zaino in spalla
                        <input ONINPUT="this.className = ''"  type="radio" name="viaggio" id="option2" value="amore"/> Fuga romantica
                        <input ONINPUT="this.className = ''"  type="radio" name="viaggio" id="option3" value="cultura"/> Vacanza culturale
                        <input ONINPUT="this.className = ''"  type="radio" name="viaggio" id="option4" value="relax"/> Relax sulla neve
                        <input ONINPUT="this.className = ''"  type="radio" name="viaggio" id="option5" value="storia"/> Alla scoperta dei borghi
                    </div>

                    <!--tab n:5-->
                    <div class="tab">
                        </br><h1>Giuro, questa è l'ultima!</h1>
                        <p>Email:</p>
                        <input ONINPUT="this.className = ''" type="email" name="mail" required/>
                        </br>
                        <p>Password:</p>
                        <input ONINPUT="this.className = ''" type="password" name="pass" required/>
                        <h6>(SHH...MANTERREMO IL SEGRETO)</h6></br>
                    </div>

                    <!--BOTTONE AVANTI/INVIA E INDIETRO-->
                    <div style="overflow:auto;">
                      <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Indietro</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Avanti</button>
                      </div>
                    </div>



                    <!--JAVASCRIPT PER I TAB DEL FORM
                    https://stackoverflow.com/questions/11498068/how-to-use-external-js-files-->
                    <script type="text/javascript" language="javascript" src="script/script_formIscrizione.js"></script>

                </form>
            </div>
        </div>
    </div>

    <!--seconda riga del main-->
    <div class ="secondaRiga" style="height:600px">
        <div class="home-mainColumn">
            <h1 style="padding-left:10px;">"Cara Italia, perché</br>giusto o sbagliato che sia</br>questo è il mio paese</br>con le sue grandi qualità</br>ed i suoi grandi difetti."</h1>
            <p style="padding-left:10px">- Enzo Biagi -</p>
    
            <button id="provBtn" type="button"  onclick="location.href='province.php'">
                Province
            </button>
        </div>
                
        <div class="home-mainColumn" id="fotoDiv" onmouseover = "foto2()" onmouseout = "foto1()">
            <h2 style="padding-left:60%; padding-top:10%">Alpe Devero </br> VB, Italia</h2>
            <p style="padding-left:60%"><strong>Davide Sacchet</strong></p>
        </div> 

        <!--SCRIPT PER FOTO DIV -->
        <script type="text/javascript" language="javascript">
            function foto1(){
                document.getElementById("fotoDiv").style.backgroundImage= "url('https://images.unsplash.com/photo-1600599067176-1f47e3b6fe47?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1398&q=80')";
                document.getElementById("fotoDiv").innerHTML= "<h2 style='padding-left:60%; padding-top:10%'>Alpe Devero </br> VB, Italia</h2><p style='padding-left:60%'><strong>Davide Sacchet</strong></p>";
            }

            function foto2(){
                document.getElementById("fotoDiv").style.backgroundImage= "url('https://images.unsplash.com/photo-1606831688770-407af655348b?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1421&q=80')";
                document.getElementById("fotoDiv").innerHTML= "<h2 style='padding-left:30%; padding-top:55%'>Montalbano Elicona</br> ME, Italia</h2><p style='padding-left:55%; margin-top:2,5%'><strong>Federico Di Dio</strong></p>"
            }    
        </script>
                
    </div>

</main>
   
</body>
</html>
                    