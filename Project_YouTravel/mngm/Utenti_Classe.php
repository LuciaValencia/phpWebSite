<?php

class Utente {
    //Propietà
    public $nome; 
    public $anni; 
    public $sesso; 
    public $tipo; // > amore, avventura...
    public $posta; 
    public $pw; 
    public $luogo;      
    public $gruppo;     
    public $viaggio;
    public $regione;
    
    //Metodi
    public function __construct ($name){
        $this->nome = $name;
    }
    
    public function setAnni($aUt){
        $this->anni = $aUt;
    }
    
    public function setSesso ($sUt){
        $this->sesso = $sUt;
    }
    

    public function setTipo ($tUt){
        $this->tipo = $tUt;
    }
    
    public function setLuogo ($lUt){
        $this->luogo = $lUt;
    }
    
    public function setRegione($rUt){
        $this->regione=$rUt;
    }
    
    public function setGruppo ($gUt){
        $this->gruppo = $gUt++;
    }
    
    public function setPosta ($pUt){
        $this->posta = $pUt;
    }
    
    public function setPw ($pwUt){
        $this->pw = $pwUt;
    }
    
    public function inserisciInDB(){
            require("connessioneDB.php");
            if ($erroreDB!=""){
                echo $erroreDB;
            } else {
                $sql= $conn->exec("INSERT INTO Utenti(nome, anni, sex, persone, dove, trip_kind, email, password) VALUES ('$this->nome', '$this->anni', '$this->sesso', '$this->gruppo', '$this->luogo', '$this->tipo', '$this->posta', '$this->pw')");
                echo "<h5 align='right'>La tua registrazione è avvenuta correttamente, $this->nome!</h5>";
                
            }
    }
    
    public function setItinerario(){
        require ("connessioneDB.php");
        if($erroreDB!=""){
            echo $erroreDB;
        } else {
            if ($this->tipo=="avventura"){$tipologia="adventure";}
                else if ($this->tipo=="amore"){$tipologia="love";}
                else if ($this->tipo=="cultura"){$tipologia="culture";}
                else if ($this->tipo=="relax"){$tipologia="relax";}
                else if ($this->tipo=="storia"){$tipologia="history";}

            $sql = $conn->query("SELECT nome FROM Province WHERE idRegione='".$this->luogo."' AND ".$tipologia."=1"); //$this->luogo è un numero e $tipologia è tradotto in inglese
            $listaProv=array();
            while($provs=$sql->fetch(PDO::FETCH_ASSOC)){
                $provincia= $provs["nome"];
                array_push($listaProv,$provincia);
            }
            if(count($listaProv)==0){
                echo "<h1>Ci dispiace</h1><h4>Non ci sono province che rispecchino il tuo profilo.</h4>";
            } else {
                for($i=0; $i<count($listaProv); $i++){
                    $this->viaggio="<li><a style='color:#ffffff; text-transform:uppercase' id='provIter' data-value='".$listaProv[$i]."'>".$listaProv[$i]."</a></li>";
                    echo $this->viaggio;
                }
                
            }
        }
    }
 
}

?>
