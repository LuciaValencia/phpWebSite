<?php
//stabilisco i permessi di lettura del file (anyone)
header("Access-Control-Allow-Origin: *");
// definisco il formato della risposta (json)
header("Content-Type: application/json; charset=UTF-8");
// definisco il metodo consentito per la request CONFERMA CON FORM 
header("Access-Control-Allow-Methods: DELETE");

include_once "/opt/lampp/htdocs/YouTravel/Project_YouTravel/mngm/Database_Classe.php";
include_once "/opt/lampp/htdocs/YouTravel/Project_YouTravel/mngm/Provincia_Classe.php";

$database=new Database();
$conn=$database->getConnection();
$provincia = new Provincia($conn);

$jsonD=file_get_contents("php://input");
$data = json_decode($jsonD);

if(!empty($data->prov) && !empty($data->utente)){
    $provincia->nomeProv = $data->prov;
    $provincia->user = $data->utente;
    
    if($provincia->cancellaRecensione()){
        http_response_code(200);
        echo json_encode(array("message" => "Hai cancellato le tue recensioni."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Non riesco a cancellare le tue recensioni"));
    }
} else{
    http_response_code(400);
    echo json_encode(array("message" => "Devi inserire quale provincia vuoi cancellare: provincia numero = ".$data->prov." dall'utente: ".$data->utente."."));
}
?>