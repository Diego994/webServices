<?php
    require_once 'model/user.php';

    class UserController{
        
        private $model;
        
        public function __CONSTRUCT(){
            $this->model = new User();
        }
        
        public function Index(){
            require_once 'view/header.php';
            require_once 'view/login.php';
            require_once 'view/footer.php';
        }
        
        public function Registrar(){
            $user = new User();
            
            if(isset($_REQUEST['id'])){
                $user = $this->model->Obtener($_REQUEST['id']);
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