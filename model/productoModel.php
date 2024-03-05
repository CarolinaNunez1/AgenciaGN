<?php

class productoModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=agencia_gn;charset=utf8', 'root', '');
    }

    public function __descontruct(){
        $this->db = null;
    }

    //para la vista principal, y para el select 
    public function getArticle(){
        $sentencia = $this->db->prepare('SELECT nombre, precio, id_producto, descripcion FROM producto ');
        $sentencia->execute(array());
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    //mostrar tablas
    public function getTableArticle(){
        $sentencia = $this->db->prepare('SELECT * FROM producto');
        $sentencia->execute(array());
        $tablaProductos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $tablaProductos;
    }

    public function filterArticle($id_producto, $nombre_producto){
        $sentencia = $this->db->prepare('SELECT seccion.tipo, producto.id_producto, seccion.id_seccion FROM producto INNER JOIN seccion ON producto.id_producto = seccion.id_producto WHERE producto.id_producto = ? AND producto.nombre 0 ?');
        $sentencia->execute(array($id_producto, $nombre_producto));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

        public function getTableSections($id, $nombre){
            $sentencia = $this->db->prepare('SELECT nombre, id_producto FROM producto WHERE id_producto =? AND nombre=?');
            $sentencia->execute(array($id, $nombre));
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }

        //agregar producto

        public function addArticle($nombre, $descripcion, $precio){
            $sentencia = $this->db->prepare('INSERT INTO producto(nombre, descripcion, precio) VALUES(?,?, ?)');
            $sentencia->execute(array($nombre, $descripcion, $precio));
        }

        //editar - borrar producto

        //buscar IdProducto en tablaSeccion
        public function searchIdArticleByTableSections($id_producto){
            $sentencia = $this->db->prepare('SELECT id_producto FROM seccion WHERE id_producto=?');
            $sentencia->execute(array($id_producto));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        //borrar producto
        public function deleteArticle($id_producto){
            $sentencia = $this->db->prepare('DELETE FROM producto WHERE id_producto=?');
            $sentencia->execute(array($id_producto));
        }

        //editar producto
        public function editArticle($nombre, $descripcion, $precio, $id_producto){
            $sentencia = $this->db->prepare('UPDATE producto SET nombre=?, descripcion=?, precio=? WHERE id_producto =?');
            $sentencia->execute(array($nombre, $descripcion,$precio, $id_producto));
        }
}