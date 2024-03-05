<?php
require_once "model/productoModel.php";
require_once "view/productoView.php";
require_once "model/seccionModel.php";
require_once "helpers/authHelper.php";
require_once "view/userView.php";

class productoController{

    private $model;
    private $view;
    private $model_seccion;
    private $helper;
    private $view_user;

    public function __construct(){
        $this->model = new productoModel();
        $this->view = new productoView();
        $this->model_seccion = new seccionModel();
        $this->helper = new authHelper();
        $this->view_user = new userView();
    }

    public function showHome(){
        $productos = $this->model->getArticle();
        $this->view->showHome($productos);
    }

    public function filterArticle($nombre_producto, $id_producto){
        $nombre_con_espacios = str_replace('-', ' ', $nombre_producto);
        $secciones = $this->model->filterArticle($id_producto, $nombre_con_espacios);
        if(!empty($secciones)){
            $this->view->renderArticle($secciones, $nombre_con_espacios);
        }else{
            $this->view->showHomeLocation();
        }
    }

    //muestra formulario agregar producto
    public function formArticle(){
        $isAdmin = $this->helper->checkLoggedIn();
        $this->view->formAddArticle("", $isAdmin);
    }

    //agregar producto
    public function addArticle(){
        $isAdmin = $this->helper->checkLoggedIn();
        if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio'])){
            $this->model->addArticle($_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
            $this->view->showLocationToAddFormArticle();
        }else{
            $this->view->formAddArticle('Faltan completar campos', $isAdmin);
        }
    }

    //tabla editar y borrar producto
    public function showTableOfArticles(){
        $isAdmin = $this->helper->checkLoggedIn();
        $tablaProductos = $this->model->getTableArticle();
        $this->view->renderTableArticles($isAdmin,$tablaProductos);
    }

    //borrar producto
    public function deletArticle($id_producto){
        $isAdmin = $this->helper->checkLoggedIn();
        if($isAdmin == true){
            $seccionesAsociados = $this->model_seccion->searchIdArticleByTableSections($id_producto);

            if(count($seccionesAsociados) == 0){
                $this->model->deleteArticle($id_producto);
                $this->view->renderTableOfLocationArticles();
            }else{
                $tablaProductos = $this->model->getTableArticle();
                $this->view->renderTableArticles($isAdmin, $tablaProductos, 'El producto seleccionado no se puede borrar porque tiene asociados secciones');
            }
        }else{
            $this->view_user->renderLogin();
        }
    }

    public function editArticle($id_producto){
        if($isAdmin == true){
            $this->model->editArticle($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $id_producto);
            $this->view->renderTableOfLocationArticles();
        }else{
            $this->view_user->renderLogin();
        }
    }
}