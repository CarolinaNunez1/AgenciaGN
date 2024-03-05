<?php

class seccionModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=agencia_gn;charset=utf8', 'root', '');
    }

    public function __desconstruct(){
        $this->db = null;
    }

    //secciones por id
    public function getSectionById($id_seccion){
        $sentencia = $this->db->prepare('SELECT * FROM seccion WHERE id_seccion = ?');
        $sentencia->execute(array($id_seccion));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function getSection(){
        $sentencia = $this->db->prepare('SELECT tipo, id_seccion FROM seccion');
        $sentencia->execute(array());
        $secciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $secciones;
    }

    public function getSections(){
        $sentencia = $this->db->prepare('SELECT tipo, id_seccion FROM seccion');
        $sentencia->execute(array());
        $secciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $secciones;
    }

    public function searchForMatches($id_producto, $tipo){
        $sentencia = $this->db->prepare('SELECT id_producto, tipo FROM seccion WHERE id_producto = ? AND tipo = ?');
        $sentencia->execute(array($id_producto, $tipo));
        $productos = $sentencia->fetch(PDO::FETCH_OBJ);
        return $productos;
    }

    //insertar seccion
    public function addSection($id_producto, $tipo){
        $sentencia = $this->db->prepare('INSERT INTO seccion(id_producto, tipo) VALUES(?,?)');
        $sentencia->execute(array($id_producto, $tipo));
    }

    public function getTableOfSections(){
        $sentencia = $this->db->prepare('SELECT * FROM seccion');
        $sentencia->execute(array());
        $tablaSecciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $tablaSecciones;
    }

    //editar borrar secciones

    //borrar seccion
    public function deleteSections(){
        $sentencia = $this->db->prepare('DELETE FROM seccion WHERE id_seccion=?');
        $sentencia->execute(array($id_seccion));
    }

    public function editSection($tipo, $id_producto){
        $sentencia = $this->db->prepare('UPDATE seccion SET tipo=?, id_producto=? WHERE id_seccion=?');
        $sentencia->execute(array($tipo, $id_producto));
    }

    //buscarIdPorductoEnTablaSeccion
    public function searchIdArticleByTableSections($id_producto){
        $sentencia = $this->db->prepare('SELECT id_producto FROM seccion WHERE id_producto=?');
        $sentencia->execute(array($id_producto));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}