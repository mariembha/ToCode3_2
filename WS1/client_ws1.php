<?php
require_once('lib/nusoap.php');
$wsdl = "http://localhost/ToCode3_2/WS1/ws1.php?wsdl";


$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur est :</h2>' . $err;
   exit();
}

$result = $client->call('GetCountriesIsoOfContinent', array("asia"));
echo "Asia: ".$result;

?>