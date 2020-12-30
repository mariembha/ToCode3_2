<form method="POST" >
<h3 style="text-align: center; color:#11C4C2;">## La devise de la ## </h3>
<h4 style="text-align: center;">Pays : <input type="text" name="pays">
<input type="submit" value="Devise">
</h4>
</form>
<?php
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$wsdl = "http://localhost/ToCode3-2/WS1/WS1.php?wsdl";
		if(!$error){
			
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				
			    exit();
			}
			 try {
				 
                  
				    $result1 = $client->call('countryTocodeCountry', array('country'=>$_POST['pays']));
                   
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	

?>
<?php
require_once('lib/nusoap.php');
$wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur est :</h2>' . $err;
   exit();
}

$result=$client->call('CountryCurrency', array('sCountryISOCode'=>$result1));
$res = ($result['CountryFlagResult']['sName']);
echo ($result['CountryFlagResult']['sName']);
if($res =='Country not found in the database'){

    echo '<h4 style="color:red;text-align:center;">Pays non trouve dans la base de donnees !!! Veuillez entrez un nom de pays valide </h4></br>';

}
else {
echo " <p style=\"text-align: center;\"> La devise de la <strong>".$_POST['pays']."</strong> : ".($result['CountryCurrencyResult']['sISOCode'])."(".($result['CountryCurrencyResult']['sName']).")"."</p></br>";

}
?>