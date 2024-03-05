<?php
require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class seccionView{
    private $smarty; 

    public function __construct(){
        $this->smarty = new Smarty();
    }


    public function renderSection($id_seccion){
        $this->smarty->assign('seccion', $id_seccion);
        $this->smarty->display("templates/detalle.tpl");
    }

    //   --------------------------FORMULARIO---------------------------------------
    //   -------------------VISTAS AGREGAR-----------------------------------

    //VISTA FORMULARIO PARA INGRESAR SECCION ->ESTAN LOS PRODUCTOS PARA EL SELECT.
    public function renderFormSection($productos,$isAdmin){
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->display("templates/ingresaseccion.tpl");
    }
    
    public function showLocationToAddFormSections(){
        header("Location: " . BASE_URL . "agregarseccion");
    }

    //   -----------------------------VISTA TABLAS SECCION----------------------------------------
    public function renderTableSections($isAdmin,$tablasSecciones){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('tablasSecciones', $tablasSecciones);
        $this->smarty->display("templates/editarborrarseccion.tpl");
    }

    //   ----------------------------location seccion----------------------------------------    
    public function renderTableOfLocationSections(){
        header("Location: " . BASE_URL . "tablasecciones");
    }

    public function showHome(){
        header("Location: " . BASE_URL . "productos");
    }

    public function renderSections($secciones, $mostrarTodo = true){
        $this->smarty->assign('secciones', $secciones);
        $this->smarty->assign('mostrarTodo', $mostrarTodo);
        $this->smarty->display("templates/secciones.tpl");
    }
}
