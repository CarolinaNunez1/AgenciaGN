<?php
require_once "controller/productoController.php";
require_once "controller/seccionController.php";
require_once "controller/userController.php";
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');



// lee la acción
if (!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'index';     // acción por defecto si no envían

$params = explode('/', $action);

$productoController = new productoController();
$seccionController = new seccionController();
$userController = new userController();

switch ($params[0]) {
    case 'index':
        //Verificacion para que no pasen parametros extra por la url
        if (!isset($params[1]))
            $productoController->showHome($params);
        else
            $productoController->showHome();
        break;

    case 'producto':
        if (isset($params[1]) && isset($params[2]))
            $productoController->filterArticle($params[1], $params[2]);
        else
        $seccionController->redirectHome();
        break;

    case 'secciones':
        if (!isset($params[1]))
            $seccionController->showSections();
        else
            $seccionController->redirectHome();
        break;

    case 'detalle':
        if (isset($params[2], $params[1]))
            $seccionController->filterSection($params[2], $params[1]);
        else
            $seccionController->redirectHome();
        break;

    case 'login':
        $userController->showLogin();
        break;

    case 'logout':
        $userController->logOut();
        break;

    case 'verify':
        $userController->verifyLogin();
        break;

    case 'registro':
        $userController->showRegistro();
        break;

    case 'signup':
        $userController->registrarUsuario();
        break;

    case 'modifyrol':
        if (isset($params[1])){
           $userController->modifyRol($params[1]); 
        }
        
    case 'panel':
        $userController->showPanel();
        break;
     case 'borrarusuario':
            $userController->borrarUsuario($params[1]);
            break;
        //   ------------------------------VISTA AGREGAR SECCION PRODUCTO------------------------------------------------

    case 'agregarproducto':
        $productoController->formArticle();
        break;
    case 'agregarseccion':
        $seccionController->formSection();
        break;
        //   ------------------------------AGREGAR PRODUCTO SECCION------------------------------------------------
    case 'agregar-producto':
        $productoController->addArticle();
        break;

    case 'agregar-seccion':
        $seccionController->addSection();
        break;
        //   ------------------------------EDITAR BORRAR PRODUCTO------------------------------------------------
    case 'tablaproductos':
        $productoController->showTableOfArticles();
        break;

    case 'borrarproducto':
        if (isset($params[1]))
            $productoController->deleteArticle($params[1]);
     
        break;

    case 'editarproducto':
        if (isset($params[1])) {
            $productoController->editArticle($params[1]);
        } else
            $productoController->redirectHome();
        break;
        //   ------------------------------EDITAR BORRAR SECCION------------------------------------------------
    case 'tablasecciones':
        $seccionController->showTableOfSections();
        break;

    case 'borrarseccion':
        if (isset($params[1]))
            $seccionController->deleteSection($params[1]);
        else
            $seccionController->redirectHome();
        break;

    case 'editarseccion':
        if (isset($params[1]))
            $seccionController->editSection($params[1]);
        else
            $seccionController->redirectHome();
        break;
        //   ------------------------------AGREGAR PRODUCTO SECCION------------------------------------------------

    case 'agregarproducto':
        $productoController->formArticle();
        break;
    case 'agregarseccion':
        $seccionController->formSection();
        break;


    default:
        echo "404 NOT FOUND";
        break;
}
