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
        
        public function Crud(){
            $alm = new User();
            
            if(isset($_REQUEST['id'])){
                $alm = $this->model->Obtener($_REQUEST['id']);
            }
            
            require_once 'view/header.php';
            require_once 'view/user-edit.php';
            require_once 'view/footer.php';
        }
        
        public function Guardar(){
            $alm = new User();
            
            $alm->id = $_REQUEST['id'];
            $alm->name = $_REQUEST['name'];
            $alm->lastName = $_REQUEST['lastName'];
            $alm->password = $_REQUEST['password'];
            $alm->email = $_REQUEST['email'];
            $alm->telefon = $_REQUEST['telefon'];

            $alm->id > 0 
                ? $this->model->Actualizar($alm)
                : $this->model->Registrar($alm);
            
            header('Location: index.php');
        }
        
        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id']);
            header('Location: index.php');
        }
}