<?php
class Provincia{
    private $conn;
    
    public $numProv;
    public $idProv;
    public $nomeProv;
    public $idRegione;
    public $nomeReg;
    public $desc;
    public $linkInfo;
    public $avventura;
    public $amore;
    public $cultura;
    public $relax;
    public $storia;
    public $tipologia;
    public $foto;
    public $txtR;
    public $votoR;
    public $user;
    
    public function __construct ($db){
        $this->conn = $db;
    }
    
    public function leggiProvLista($reg){
        $query = "SELECT * FROM Province WHERE idRegione='".$reg."'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function leggiProvInfo($provNome){ 
        $query = "SELECT * FROM Province JOIN Regioni ON Province.idRegione=Regioni.IDregione WHERE nome ='".$provNome."'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $prov=$stmt->fetch(PDO::FETCH_ASSOC); //array in cui le keys sono i nomi delle colonne della tabella
        $this->nomeProv=$provNome;
        $this->idProv = $prov["prov-ID"];
        $this->idRegione=$prov["idRegione"];
        $this->nomeReg= $prov["nome-Regione"];
        $this->desc=$prov["descrizione"];
        $this->linkInfo=$prov["link"];
        //$this->foto=$prov["foto"];
        $this->tipologia= array();
        $this->avventura=$prov["adventure"];
            if ($this->avventura==1) {
                $this->tipologia[]= "Avventura";
            }
        $this->amore=$prov["love"];
            if ($this->amore==1){
                $this->tipologia[]="Amore";
            }
        $this->cultura=$prov["culture"];
            if ($this->cultura==1){
                $this->tipologia[]="Cultura";
            }
        $this->relax=$prov["relax"];
            if ($this->relax==1){
                $this->tipologia[]="Relax";
            }
        $this->storia=$prov["history"];
            if ($this->storia==1){
                $this->tipologia[]="Storia";
            }
    }
    
    public function newRecensione(){
        $query = "INSERT INTO Recensioni(idUtente, idProvincia, testo, stelle) VALUES (?,?,?,?)";
        $stmt=$this->conn->prepare($query);
        
        $idUtente=$this->conn->query("SELECT utenteID FROM Utenti WHERE email='".$this->user."'");
        $rs= $idUtente->fetch(PDO::FETCH_ASSOC);
        $idUt=$rs["utenteID"];
        $stmt->bindParam(1,$idUt);
        
        $idProvincia=$this->conn->query("SELECT numProv FROM Province WHERE nome='".$this->nomeProv."'");
        $rs= $idProvincia->fetch(PDO::FETCH_ASSOC);
        $this->numProv = $rs["numProv"]; 
        $stmt->bindParam(2,$this->numProv);
        
        $stmt->bindParam(3,$this->txtR);
        
        $stmt->bindParam(4,$this->votoR);
        
        $stmt->execute();
        return $stmt;
    }
    
    public function cancellaRecensione(){
        $query="DELETE FROM Recensioni WHERE idUtente= ? AND idProvincia= ?";
        $stmt=$this->conn->prepare($query);
        
        //$_SESSION["user"]="lucia.valenciavas@edu.unito.it";  //PROVA
        $idUtente=$this->conn->query("SELECT utenteID FROM Utenti WHERE email='".$this->user."'");
        $rs= $idUtente->fetch(PDO::FETCH_ASSOC);
        $idUt=$rs["utenteID"];
        $stmt->bindParam(1,$idUt);
        
        
        $idProvincia=$this->conn->query("SELECT numProv FROM Province WHERE nome='".$this->nomeProv."'");
        $rs= $idProvincia->fetch(PDO::FETCH_ASSOC);
        $this->numProv = $rs["numProv"]; 
        $stmt->bindParam(2,$this->numProv);
        
        $stmt->execute();
        return $stmt;
    }
    
    public function leggiRecensione($provNome){
        $query="SELECT * FROM Recensioni JOIN Province ON Recensioni.idProvincia=Province.numProv WHERE nome = '".$provNome."'";
        
        $stmt=$this->conn->prepare($query);
    
        $stmt->execute();
        return $stmt;
    }
    
}
?>