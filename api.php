<?php
if(!isset($_SESSION['token']) && $_SESSION['token']!=="2297464fb85e872966df3e851d427db0"){
    http_response_code(401);
    echo 'NON AUTORIZZATO';
}else{
    $curl=curl_init('https://api.openbrewerydb.org/v1/breweries');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response=curl_exec($curl);
    curl_close($curl);
    header('Content-Type: application/json');
}
