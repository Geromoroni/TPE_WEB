<?php
class EstacionModel{
     //abre la conexion con la base de datos
     private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=agencia_viaje;charset=utf8', 'root', '');
    }


    /**
     * Obtiene y devuelve de la base de datos todas las estaciones.
     */
    function getEstaciones() {
        $query = $this->db->prepare('SELECT * FROM estaciones');
        $query->execute();

        // $estaciones es un arreglo de tareas
        $estaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $estaciones;

    }
    
    function addEstacion($nombre_estacion) {
        $query = $this->db->prepare('INSERT INTO estaciones (nombre_estacion) VALUES(?)');
        $query->execute([$nombre_estacion]);

        return $this->db->lastInsertId();
    }


    function deleteEstacion($id_estacion) {
        $query = $this->db->prepare('DELETE  FROM estaciones WHERE  id_estacion = ?');
        $query->execute([$id_estacion]);
    }
    


  


}