<?php
require_once "model/seccionModel.php";
require_once "view/seccionView.php";
require_once "helpers/authHelper.php";
require_once "view/userView.php";
require_once "model/productoModel.php";

class seccionController{

    private $model;
    private $view;
    private $helper;
    private $view_user;
    private $producto_model;

    public function __construct(){
        $this->model = new seccionModel();
        $this->view = new seccionView();
        $this->helper = new authHelper();
        $this->view_user = new userView();
        $this->producto_model = new productoModel();
    }

    //filtrar secciones 
    public function filterSection($id_seccion){
        $seccion = $this->model->getSectionById($id_seccion);
        if(isset($seccion)){
            $this->view->renderSection($seccion);
        }else{
            $this->redirectHome();
        }
    }

    //mostrar formulario insertar seccion
    public function formSection(){
        $isAdmin = $this->helper->checkLoggedIn();
        $productos = $this->producto_model->getArticle();
        $this->view->renderFormSection($productos, $isAdmin);
    }

    //agregar seccion
    public function addSection(){
        if(isset($_POST['id_producto'], $_POST['tipo'])){
            if(!$this->searchForMatches()){
                $this->model->addSection($_POST['id_producto'], $_POST['tipo']);
                $this->view->showLocationToAddFormSections();
            }
        }
    }

    //buscamos si hay coincidencias (un producto que tenga esa seccion)
    public function searchForMarches(){
        $producto = $this->model->searchForMatches($_POST['id_producto'], $_POST['tipo']);
        return !empty($producto);
    }

    //mostrar secciones
    public function showSections(){
        $secciones = $this->model->getSections();
        $this->view->renderSections($secciones, false);
    }

    //EDITAR BORRAR SECCIONES

    //mostrar tabla borrar editar secciones
    public function showTableOfSections(){
        $isAdmin = $this->helper->checkLoggedIn();
        $tablasSecciones = $this->model->getTableOfSections();
        //var_dump($tablasSecciones);
        $this->view->renderTableSections($isAdmin, $tablasSecciones);
    }

    //borrar seccion
    public function deleteSection($id){
        $isAdmin = $this->helper->checkLoggedIn();
        if($isAdmin == true){
            $this->model->delteSection($id);
            $this->view->renderTableOfLocationSections();
        }else{
            $this->view_user->renderLogin();
        }
    }

    //editar seccion
    public function editSection($id_seccion){
        $isAdmin = $this->helper->checkLoggedIn();
        if($isAdmin == true){
            $this->model->editSection($_POST['id_producto'], $_POST['tipo']);
            $this->view->renderTableOfLocationSections();
        }else{
            $this->view_user->renderLogin();
        }
    }

    public function redirectHome(){
        $this->view->showHome();
    }
}