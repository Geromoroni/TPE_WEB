<?php
class CiudadModel{
     //abre la conexion con la base de datos
     private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=agencia_viaje;charset=utf8', 'root', '');
    }


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


    function deleteCiudad($id_ciudad) {
        $query = $this->db->prepare('DELETE FROM `ciudades` WHERE `ciudades`.`id_ciudad` = ?');
        $query->execute([$id_ciudad]);
    }

    function updateCiudad($nombre_ciudad, $info_ciudad, $id_estacion){
        $query = $this->db->prepare('UPDATE ciudades SET nombre = ?, info_ciudad = ?, id_estacion - ? WHERE id_ciudad = ?,');
        $query->execute([$nombre_ciudad, $info_ciudad, $id_estacion]);
        return $query;
    }
    
}