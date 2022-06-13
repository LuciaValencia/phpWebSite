<?php
//stabilisco i permessi di lettura del file (anyone)
header("Access-Control-Allow-Origin: *");
// definisco il formato della risposta (json)
header("Content-Type: application/json; charset=UTF-8");
// definisco il metodo consentito per la request
header("Access-Control-Allow-Methods: GET");

include_once "/opt/lampp/htdocs/YouTravel/Project_YouTravel/mngm/Database_Classe.php";
include_once "/opt/lampp/htdocs/YouTravel/Project_YouTravel/mngm/Provincia_Classe.php";


$database=new Database();
$conn=$database->getConnection();
$provincia = new Provincia($conn);

$prov=isset($_GET["provNome"])? $_GET["provNome"] : die(); 
$stmt = $provincia->leggiRecensione($prov);
if($stmt->rowCount()>0){
    $listaRecensioni=array();
    $listaRecensioni["receInArray"]=array();
    while ($record=$stmt->fetch(PDO::FETCH_ASSOC)){
        $singolaRece=array(
            "testo"=>$record["testo"],
            "stelle"=>$record["stelle"]
        );
         array_push($listaRecensioni["receInArray"], $singolaRece);
    }
    http_response_code(200);
    $listajson=json_encode($listaRecensioni);
    echo $listajson;
}else{
    http_response_code(404);
    echo json_encode(array("mex"=>"Nessuna recensione trovata in questa provincia."));
}
?>