<?php
    require_once("lib/nusoap.php");
    $miURL = "http://localhost/webServices/webServer.php";
    $server = new soap_server();
    $server->configureWSDL('WSDLTST',$miURL);
    $server->wsdl->schemaTargetNamespace=$miURL;

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $server->register('saludar',
        array('nombre' => 'xsd:string', 'apellido' => 'xsd:string'),
        array('return' => 'xsd:string'),
        $miURL
    );

    $server->register('getAll',
        array('hostName' => 'xsd:string','dbName' => 'xsd:string','user' => 'xsd:string','password' => 'xsd:string', 'table' => 'xsd:string'),
        array('return' => 'xsd:string'),
        $miURL
    );

    $server->register('getById',
        array('hostName' => 'xsd:string','dbName' => 'xsd:string','user' => 'xsd:string','password' => 'xsd:string', 'table' => 'xsd:string', 'id' => 'xsd:int'),
        array('return' => 'xsd:string'),
        $miURL
    );

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function saludar($nombre, $apellido){
        $msg="hola ".$nombre." ".$apellido;
        return new soapval ('return', 'xsd:string', $msg);
    }

    function getAll($hostName,  $dbName,  $user,  $password, $table){
        $cn = mysqli_connect($hostName,$user,$password,$dbName);
        $query = $cn->query("SELECT * FROM ".$table);
        $data = [];
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
            $data[] = $row ;
        }
        return json_encode($data);
    }

    function getById($hostName,  $dbName,  $user,  $password, $table, $id){
        $cn = mysqli_connect($hostName,$user,$password,$dbName);
        $query = $cn->query("SELECT * FROM ".$table." WHERE id = ".$id);
        $data = [];
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
            $data[] = $row ;
        }
        return json_encode($data);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if(!isset($HTTP_RAW_POST_DATA))
    {
        $HTTP_RAW_POST_DATA = file_get_contents('php://input');
    }
    $server->service($HTTP_RAW_POST_DATA);
    
?>





    