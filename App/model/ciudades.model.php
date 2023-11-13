<?php

require_once "config.php";
class CiudadModel{
     //abre la conexion con la base de datos
     private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);    }

    /**
     * Obtiene y devuelve de la base de datos todas las ciudades.
     */
    function getCiudades() {
        $query = $this->db->prepare('SELECT * FROM ciudades');
        $query->execute();

        // $ciudades es un arreglo de tareas
        $ciudades = $query->fetchAll(PDO::FETCH_OBJ);

        return $ciudades;

    }

    function getInfoCiudades($id_ciudad) {
        $query = $this->db->prepare('SELECT * FROM ciudades WHERE `ciudades`.`id_ciudad` = ?');
        $query->execute([$id_ciudad]);

        // $ciudades es un arreglo de tareas
        $ciudades = $query->fetchAll(PDO::FETCH_OBJ);

        return $ciudades;

    }
    
    function addCiudad($nombre_ciudad, $info_ciudad, $id_estacion) {
        $query = $this->db->prepare('INSERT INTO ciudades (nombre, info_ciudad, id_estacion) VALUES (?, ?, ?)');
        $query->execute(array($nombre_ciudad, $info_ciudad, $id_estacion));

        return $this->db->lastInsertId();
    }
    

    function update($nombre_ciudad, $info_ciudad, $id_estacion, $id_ciudad) {
        
        $query = $this->db->prepare('UPDATE ciudades SET nombre_ciudad = ?, info_ciudad = ?, id_estacion = ? WHERE id = ?');

        $query->execute([$nombre_ciudad, $info_ciudad, $id_estacion, $id_ciudad]);

    }


    function deleteCiudad($id_ciudad) {
        $query = $this->db->prepare('DELETE FROM `ciudades` WHERE `ciudades`.`id_ciudad` = ?');
        $query->execute([$id_ciudad]);
        return $query->rowCount();
    }

    function updateCiudad($id_ciudad) {    
        $query = $this->db->prepare('UPDATE ciudades SET finalizo_ciudad = 1 WHERE id = ?');
        $query->execute([$id_ciudad]);
    }
    
}