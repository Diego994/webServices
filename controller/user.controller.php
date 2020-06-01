<?php
    require_once 'model/user.php';
    

    class UserController{
        
        public $model;
        
        public function __CONSTRUCT(){
            $this->model = new User();
        }
        
        public function Index(){
            require_once 'view/header.php';
            require_once 'view/login.php';
            require_once 'view/footer.php';
        }
        
        public function Registrar(){
            require_once("lib/nusoap.php");

            $serverURL = 'http://localhost/pwsdl/server2.php';
            $cliente = new nusoap_client("$serverURL?wsdl",'wsdl');
            $conexion = array('hostName' => 'localhost','dbName' => 'webServices','user' => 'root','password' => 'admin');
            $conexion = json_encode($conexion);
            $conexion = json_decode($conexion);
        
    
            $user = new User();
            
            if($_REQUEST['id']){

                $req = $cliente->call(
                    "getById",
                    array('hostName' => 'localhost',
                            'dbName' => 'webServices',
                            'user' => 'root',
                            'password' => 'admin',
                            'table' => 'user',
                             'id' => $_REQUEST['id']),
                    "uri:$serverURL"
                );

                $arrayUser = json_decode($req, true);

    
                $user->id = $arrayUser[0]["id"];
                $user->name = $arrayUser[0]["name"];
                $user->lastName = $arrayUser[0]["lastName"];
                $user->password = $arrayUser[0]["password"];
                $user->email = $arrayUser[0]["email"];
                $user->telefon = $arrayUser[0]["telefon"];

                require_once 'view/header.php';
                require_once 'view/user-edit.php';
                require_once 'view/footer.php';
//                $user = $this->model->Obtener($_REQUEST['id']);

            }
            require_once 'view/header.php';
            require_once 'view/user-edit.php';
            require_once 'view/footer.php';
            
        }
        
        public function Guardar(){
            $user = new User();
            
            $user->id = $_REQUEST['id'];
            $user->name = $_REQUEST['name'];
            $user->lastName = $_REQUEST['lastName'];
            $user->password = $_REQUEST['password'];
            $user->email = $_REQUEST['email'];
            $user->telefon = $_REQUEST['telefon'];

            $user->id > 0 
                ? $this->model->Actualizar($user)
                : $this->model->Registrar($user);
            
            header('Location: index.php');
        }
        
        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id']);
            header('Location: index.php');
        }

        public function Autenticar(){

            require_once("lib/nusoap.php");

            $serverURL = 'http://localhost/pwsdl/server2.php';
            $cliente = new nusoap_client("$serverURL?wsdl",'wsdl');
            $conexion = array('hostName' => 'localhost','dbName' => 'webServices','user' => 'root','password' => 'admin');
            $conexion = json_encode($conexion);
            $conexion = json_decode($conexion);
            
            $user = new User();

            $dataEmail = $_REQUEST['email'];
            $dataPassword = $_REQUEST['password'];


            $auth = $cliente->call(
                "authenticate",
                array('hostName' => $conexion->hostName,
                        'dbName' => $conexion->dbName,
                        'user' => $conexion->user,
                        'password' => $conexion->password,
                        'table' => 'user', 
                        'field' => 'email', 
                        'passwordField' => 'password',
                        'fieldVal' => $dataEmail,
                        'passwordVal' => $dataPassword
                    ),
                "uri:$serverURL"
            );
        

            if($dataEmail != '' && $dataPassword != ''){
                if($auth == 'true'){
                    header('Location: http://localhost/webServices/index.php?c=Product&a=Index&email='.$dataEmail);
                } else {
                    require_once 'view/header.php';
                    require_once 'view/login.php';
                    require_once 'view/footer.php';
                }
            } else {
                require_once 'view/header.php';
                require_once 'view/login.php';
                require_once 'view/footer.php';
            }
            
            
        }
}