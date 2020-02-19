<?php
    require_once("lib/nusoap.php");
    $miURL = "http://localhost/pwsdl/server2.php";
    $server = new soap_server();
    $server->configureWSDL('WSDLTST',$miURL);
    $server->wsdl->schemaTargetNamespace=$miURL;

    $server->register('saludar',
        array('nombre' => 'xsd:string'),
        array('return' => 'xsd:string'),
        $miURL);

    function saludar($nombre){
        $msg="hola ".$nombre;
        return new soapval ('return', 'xsd:string', $msg);
    }

    function conectar($hostName, $dbName, $user, $password){
        $pdo = new PDO('mysql:host='.$hostName.';dbname='.$dbName.';', '"'.$user.'"','"'.$password.'"');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }

    if(!isset($HTTP_RAW_POST_DATA))
    {
        $HTTP_RAW_POST_DATA = file_get_contents('php://input');
    }
    $server->service($HTTP_RAW_POST_DATA);
    ?>