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
        
    
            $user = new User();
            
            if(isset($_REQUEST['id'])){

                $req = $cliente->call(
                    "getById",
                    array('hostName' => 'localhost',
                            'dbName' => 'webServices',
                            'user' => 'root',
                            'password' => 'admin',
                            'table' => 'user',
                             'id' => 1),
                    "uri:$serverURL"
                );

                /*$req = json_decode($req);
                $user->id = $req->id;
                $user->name = $req->name;
                $user->lastName = $req->lastName;
                $user->password = $req->password;
                $user->email = $req->email;
                $user->telefon = $req->telefon;

                echo $user;*/

                
                echo $req;

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
            $user = new User();

            $dataEmail = $_REQUEST['email'];
            $dataPassword = $_REQUEST['password'];

            $user = $this->model->Autenticar(strval($dataEmail));

            if(strcmp($dataEmail,$user->email) == 0 && $dataEmail !== '')
            {
                if(strcmp($dataPassword,$user->password) == 0 && $dataPassword !== ''){
                require_once 'view/header.php';
                require_once 'view/user.php';
                require_once 'view/footer.php';
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