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

$reg= isset ($_GET["regioneID"]) ? $_GET["regioneID"] : die();
$stmt = $provincia->leggiProvLista($reg);
if($stmt->rowCount()>0){
    $listaProvince=array();
    $listaProvince["provinciainarray"]=array();
    while($record=$stmt->fetch(PDO::FETCH_ASSOC)){
        $singolaProv=array(
            "sigla"=>$record["provID"],
            "nome"=>$record["nome"]
        );
        array_push($listaProvince["provinciainarray"], $singolaProv);
    }
    http_response_code(200);
    $listajson=json_encode($listaProvince);
    echo $listajson;
} else{
    http_response_code(404);
    echo json_encode(array("mex"=>"Nessuna provincia trovata in questa regione."));
}
?>