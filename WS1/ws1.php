<?php

 require_once('lib/nusoap.php'); 
 

function GetCountriesIsoOfContinent($Continent){

  if (strtoupper($Continent)=='AFRICA')
    return json_encode(array('Tunisia'=> 'TN', 'Algeria'=> 'DZ','Morocco'=>'MA'));

  elseif (strtoupper($Continent)=='ASIA') 
    return json_encode(array('China'=> 'CN','India'=>'IN','South Korea'=>'KR'));

  elseif (strtoupper($Continent)=='EUROPE') 
    return json_encode(array('France'=> 'FR', 'Spain'=> 'ES','United Kingdom'=>'GB'));

  elseif (strtoupper($Continent)=='NORTH AMERICA') 
    return json_encode(array('United States'=> 'US', 'Canada'=> 'CA','Mexico'=>'MX'));

  elseif (strtoupper($Continent)=='SOUTH AMERICA') 
    return json_encode(array('Argentina'=> 'AR', 'Brazil'=> 'BR','Uruguay'=>'UY'));


  elseif (strtoupper($Continent)=='AUSTRALIA')  
    return json_encode(array('Australia'=>'AU', 'New Zealand'=> 'NZ','Cook Islands'=>'CK'));

  }
function GetRandomCountriyIsoOfContinent($Continent){
  if (strtoupper($Continent)=='AFRICA')
  {
    $arr=array('Tunisia'=> 'TN', 'Algeria'=> 'DZ','Morocco'=>'MA');
    $key = array_rand($arr); 
    return json_encode($arr[$key]);}

  elseif (strtoupper($Continent)=='ASIA') 
  {
    $arr=array('China'=> 'CN','India'=>'IN','South Korea'=>'KR');
    $key = array_rand($arr); 
    return json_encode($arr[$key]);}

  elseif (strtoupper($Continent)=='EUROPE') 
  {
    $arr=array('France'=> 'FR', 'Spain'=> 'ES','United Kingdom'=>'GB');
    $key = array_rand($arr); 
    return json_encode($arr[$key]);}

  elseif (strtoupper($Continent)=='NORTH AMERICA') 
  {
    $arr=array('United States'=> 'US', 'Canada'=> 'CA','Mexico'=>'MX');
    $key = array_rand($arr); 
    return json_encode($arr[$key]);}

  elseif (strtoupper($Continent)=='SOUTH AMERICA') 
  {
    $arr=array('Argentina'=> 'AR', 'Brazil'=> 'BR','Uruguay'=>'UY');
    $key = array_rand($arr); 
    return json_encode($arr[$key]);}


  elseif (strtoupper($Continent)=='AUSTRALIA') 
  {
    $arr=array('Australia'=>'AU', 'New Zealand'=> 'NZ','Cook Islands'=>'CK');
    $key = array_rand($arr); 
    return json_encode($arr[$key]);}
}

$server = new nusoap_server();
$server->configureWSDL('CountriesIsoOfContinent', 'urn:localhost');
$server->wsdl->schemaTargetNamespace = 'urn:localhost';
$server->wsdl->addComplexType(
    'Continent', //complex type name
    'complexType', // type simple/complex
    'struct','all', // All-sequence
    '',
    array(
        'FirstCountryCode' => array('name' => 'FirstCountryCode', 'type' => 'xsd:string'),
        'SecondCountryCode' => array('name' => 'SecondCountryCode', 'type' => 'xsd:string'),
        'ThirdCountryCode' => array('name' => 'ThirdCountryCode', 'type' => 'xsd:string')) //tableau des elements 
);
$server->register('GetCountriesIsoOfContinent',
      array('Continent' => 'xsd:string'),  //parameter
      array('return' => 'xsd:Continent'),  //output
      'urn:localhost',   //namespace
      'urn:localhost#GetCountriesIsoOfContinent' //soapaction
      );  
$server->register('GetRandomCountriyIsoOfContinent',
      array('Continent'=> 'xsd:string'),  //parameter
      array('IsoCode' => 'xsd:string'),  //output
      'urn:localhost',   //namespace
      'urn:localhost#GetRandomCountriyIsoOfContinent' //soapaction
      );  
$server->service(file_get_contents("php://input"));

?>