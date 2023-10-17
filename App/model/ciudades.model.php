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

    function getInfoCiudades() {
        $query = $this->db->prepare('SELECT * FROM ciudades WHERE id_ciudad = 11');
        $query->execute();

        // $ciudades es un arreglo de tareas
        $ciudades = $query->fetchAll(PDO::FETCH_OBJ);

        return $ciudades;

    }
    
    function addCiudad($nombre_ciudad) {
        $query = $this->db->prepare('INSERT INTO ciudades (nombre) VALUES(?)');
        $query->execute([$nombre_ciudad]);

        return $this->db->lastInsertId();
    }


    function deleteCiudad($id_ciudad) {
        $query = $this->db->prepare('DELETE  FROM ciudades WHERE  id_ciudad = ?');
        $query->execute([$id_ciudad]);
    }
    


  


}