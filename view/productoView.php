<?php
require_once "helpers/authHelper.php";
require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class productoView {
    private $smarty;
 
    public function __construct() {
        $this->smarty = new Smarty();
        $this->helper = new authHelper();
        $this->smarty->assign('mostrarTodo', true);
        $this->smarty->assign('nombre_producto', ""); 
    }

    public function showHome($productos=""){
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('templates/index.tpl');
    }

    public function renderArticle($secciones, $nombre = ""){
        $this->smarty->assign('secciones', $secciones);
        $this->smarty->assign('nombre_producto', $nombre);
        $this->smarty->display('templates/secciones.tpl');
    }

    //   -------------------------------FORMULARIO---------------------------------------
    //   -------------------VISTAS AGREGAR-----------------------------------
    //vista producto
    public function formAddArticle($aviso="",$isAdmin=""){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('aviso', $aviso);
        $this->smarty->display("templates/ingresaproducto.tpl");
    }

     //   -----------------------------VISTA TABLAS PRODUCTO----------------------------------------
     public function renderTableArticles($isAdmin,$tablaProductos,$aviso=""){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('tablaProductos', $tablaProductos);
        $this->smarty->assign('aviso', $aviso);
        $this->smarty->display("templates/editarborrarproducto.tpl");
    }

      //   ----------------------------location productos----------------------------------------    
    public function renderTableOfLocationArticles(){
        header("Location: ".BASE_URL."tablaproductos");
    }

//   ----------------------------location----------------------------------------      
    public function showHomeLocation(){
        header("Location: ".BASE_URL."productos");
    }

    public function showLocationToAddFormArticle(){

        header("Location: ".BASE_URL."agregarproducto");   
    }
}