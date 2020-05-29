<?php
    require_once 'model/product.php';
    require_once 'model/user.php';
    

    class ProductController{
        
        public $model;
        
        public function __CONSTRUCT(){
            $this->model = new Product();
        }

        public function Index(){
            require_once("lib/nusoap.php");

            $serverURL = 'http://localhost/pwsdl/server2.php';
            $cliente = new nusoap_client("$serverURL?wsdl",'wsdl');
            $conexion = array('hostName' => 'localhost','dbName' => 'webServices','user' => 'root','password' => 'admin');
            $conexion = json_encode($conexion);
            $conexion = json_decode($conexion);

            $userEmail = $_REQUEST['email'];

            $reqUser = $cliente->call(
                "getByEmail",
                array('hostName' => 'localhost',
                        'dbName' => 'webServices',
                        'user' => 'root',
                        'password' => 'admin',
                        'table' => 'user',
                        'email' => ''.$userEmail),
                "uri:$serverURL"
            );
            $arrayUser = json_decode($reqUser, true);
            $idUser = $arrayUser[0]['id'];

            $reqSession = $cliente->call(
                "getSessionById",
                array('hostName' => 'localhost',
                        'dbName' => 'webServices',
                        'user' => 'root',
                        'password' => 'admin',
                        'id' => $idUser,
                        'idAdmin' => 1),
                "uri:$serverURL"
            );

            $req = $cliente->call(
                "getAll",
                array('hostName' => 'localhost',
                        'dbName' => 'webServices',
                        'user' => 'root',
                        'password' => 'admin',
                        'table' => 'product'),
                "uri:$serverURL"
            );

            $arrayProduct = json_decode($req, true);

            if($reqSession == 'true'){
                require_once 'view/header.php';
                //print_r($arrayProduct);
                require_once 'view/home.php';
                require_once 'view/footer.php';
            } else {
                require_once 'view/header.php';
                //print_r($arrayProduct);
                require_once 'view/homeClient.php';
                require_once 'view/footer.php';
            }
        }
        
        public function newProduct(){

            require_once("lib/nusoap.php");

            $serverURL = 'http://localhost/pwsdl/server2.php';
            $cliente = new nusoap_client("$serverURL?wsdl",'wsdl');
            $conexion = array('hostName' => 'localhost','dbName' => 'webServices','user' => 'root','password' => 'admin');
            $conexion = json_encode($conexion);
            $conexion = json_decode($conexion);
        
    
            $product = new Product();
            
            if(isset($_REQUEST['id'])){

                $req = $cliente->call(
                    "getById",
                    array('hostName' => 'localhost',
                            'dbName' => 'webServices',
                            'user' => 'root',
                            'password' => 'admin',
                            'table' => 'product',
                             'id' => $_REQUEST['id']),
                    "uri:$serverURL"
                );

                $arrayProduct = json_decode($req, true);
    
                $product->id = $arrayProduct[0]["id"];
                $product->name = $arrayProduct[0]["name"];
                $product->cost = $arrayProduct[0]["cost"];
                $product->description = $arrayProduct[0]["description"];
                $product->availability = $arrayProduct[0]["availability"];
                $product->stock = $arrayProduct[0]["stock"];
                $product->image = $arrayProduct[0]["image"];

                require_once 'view/header.php';
                require_once 'view/product.php';
                require_once 'view/footer.php';
//                $user = $this->model->Obtener($_REQUEST['id']);

            } else {
                require_once 'view/header.php';
                require_once 'view/product.php';
                require_once 'view/footer.php';
            }
        }
        
        
        public function Guardar(){
            $target_dir = "http://localhost/webServices/assets/images/products";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
         
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $product = new Product();
            
            $product->id = $_REQUEST['id'];
            $product->name = $_REQUEST['name'];
            $product->cost = $_REQUEST['cost'];
            $product->description = $_REQUEST['description'];
            $product->availability = $_REQUEST['availability'];
            $product->stock = $_REQUEST['stock'];
            $product->image = $_REQUEST['image'];

            $user->id > 0 
                ? $this->model->Actualizar($product)
                : $this->model->Registrar($product);
            
            header('Location: index.php?c=Product&a=Index&email=dguerrero@storecheck.com');
        }
        
        public function Eliminar(){

            require_once("lib/nusoap.php");

            $serverURL = 'http://localhost/pwsdl/server2.php';
            $cliente = new nusoap_client("$serverURL?wsdl",'wsdl');
            $conexion = array('hostName' => 'localhost','dbName' => 'webServices','user' => 'root','password' => 'admin');
            $conexion = json_encode($conexion);
            $conexion = json_decode($conexion);

            $productId = $_REQUEST['id'];

            $req = $cliente->call(
                "deleteById",
                array('hostName' => 'localhost',
                        'dbName' => 'webServices',
                        'user' => 'root',
                        'password' => 'admin',
                        'table' => 'product',
                         'id' => $productId),
                "uri:$serverURL"
            );

            if($req == 'true'){
                header('Location: index.php?c=Product&a=Index&email=dguerrero@storecheck.com');
            }
        }

}