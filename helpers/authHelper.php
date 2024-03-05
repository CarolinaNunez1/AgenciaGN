<?php

class authHelper{

    public function __construct(){

    }

    public function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location:' . BASE_URL . 'login');
            die();
        }else{
            $isAdmin = $this->checkIsAdmin();
            return $isAdmin;
        }
    }

    public function checkIsAdmin(){
        if(($_SERVER['rol']) == 'admin'){
            return true;
        }else{
            return false;
        }
        session_abort();
    }

    public function checkIdAdmin($id_usuario){
        //el id que quiero borrar tiene que ser distinto al id de la sesion actual
        if(($_SESSION['id_usuario']) == $id_usuario){
            return true;
        }else{
            return false;
        }
    }
}