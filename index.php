<?php
    require_once 'model/database.php';
    require_once("lib/nusoap.php");

    $serverURL = "http://192.168.100.18:80/pwsdl/server2.php";
    $cliente = new nusoap_client("$serverURL?wsdl",'wsdl');

    $controller = 'user';

    if(!isset($_REQUEST['c']))
    {
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->Index();    
    }
    else
    {
        // Obtenemos controlñer
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
        
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        
        call_user_func( array( $controller, $accion ) );
}