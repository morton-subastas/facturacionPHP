<?php
require_once '../Request.php';
echo "llega:";
$request = new HTTP_Request2('https://api.workbeat.com/v3/adm/empleados', HTTP_Request2::METHOD_GET);
echo "dos";
try {
    $response = $request->send();
    if (200 == $response->getStatus()) {
        echo $response->getBody();
    } else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
             $response->getReasonPhrase();
    }
} catch (HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

/*
$request->setUrl('https://api.workbeat.com/v3/adm/empleados');

$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'content-Type' => 'application/x-www-form-urlencoded',
  'content-Type' => 'application/x-www-form-urlencoded'
));
$request->addPostParameter(array(
  'grant_type' => 'client_credentials',
  'client_id' => '950C0B26-BA90-4EAE-83C6-9AA049865233',
  'client_secret' => '1F375BD6-E0AF-483A-893B-CC87619B143E'
));
echo "Generar informaciones..-";
*/
 ?>
