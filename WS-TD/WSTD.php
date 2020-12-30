<?php
require "php2wsdl/src/PHPClass2WSDL.php";
require "vendor/autoload.php";
$class="Library";
$serviceURI="http://localhost/mywebservicces/topdown/library-server.php";
$expectedFile="library.wsdl";
require "Library.php";
$gen=new \PHP2WSDL\PHPClass2WSDL($class, $serviceURI);
$gen->generateWSDL();
file_put_contents($expectedFile,$gen->dump());
echo "Generated WSDL:";
echo "<a href='http://localhost/ToCode3_2/topdown/$expectedFile'>$expectedFile</a><br/>";
