<?php
//stabilisco i permessi di lettura del file (anyone)
header("Access-Control-Allow-Origin: *");
// definisco il formato della risposta (json)
header("Content-Type: application/json; charset=UTF-8");
// definisco il metodo consentito per la request CONFERMA CON FORM 
header("Access-Control-Allow-Methods: POST");

include_once "/opt/lampp/htdocs/YouTravel/Project_YouTravel/mngm/Database_Classe.php";
include_once "/opt/lampp/htdocs/YouTravel/Project_YouTravel/mngm/Provincia_Classe.php";

$database=new Database();
$conn=$database->getConnection();
$provincia = new Provincia($conn);

/* leggo i dati nel body della request (metodo POST):stream ("flusso") di raw data (dato "grezzi") proveniente dal body della HTTP request (dove ci sono i dati della POST!!)
    Se invio dati codificati in JSON (Content-Type: application/json) questi NON vengono inseriti nella variabile superglobale $_POST
*/
$jsonD=file_get_contents("php://input");
$data = json_decode($jsonD);

// controllo che i dati ci siano...
if(!empty ($data->prov) && !empty ($data->stelle) && !empty($data->utente)){
    //...e li inserisco come var di $provincia
    $provincia->nomeProv = $data->prov;
    $provincia->txtR = $data->txt;
    $provincia->votoR = $data->stelle;
    $provincia->user = $data->utente;
    
    if($provincia->newRecensione()){
        http_response_code(201);
        echo json_encode(array("message" => "Grazie per la tua recensione!"));
    } else{
        http_response_code(503);
        echo json_encode(array("message" => "Non riesco a pubblicare la tua recensione"));
    }
} else{
    http_response_code(400);
    echo json_encode(array("message" => "I dati della tua recensione sono incompleti: utente=".$data->utente.", provincia = ".$data->prov.", testo = ".$data->txt." oppure voto = ".$data->stelle."."));
}
?>