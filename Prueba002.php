<?php

//PRUEBA PHP NUMERO 2

// AL INVOCAR LA URL http://ip-api.com/json/ MEDIANTE GET, SE RETORNA UN JSON CON LA INFORMACION RELATIVA A LA IP PUBLICA DESDE LA CUAL CONSULTA LA url 
// USANDO CURL, INVOQUE DICHA URL CON UNA IP CUALQUIERA
// EL JSON OBTENIDO, IMPRIMALO COMO ARRAY

function getIpInfo($ip) {
  $loc = "http://ip-api.com/json/";  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $loc);  
  curl_setopt($ch, CURLOPT_HEADER, 0);  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $res = curl_exec($ch);
  curl_close($ch);
  return json_decode($res, true);
}
$info = getIpInfo($_SERVER['REMOTE_ADDR']);
print_r($info);

?>