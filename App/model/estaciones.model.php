<?php
class EstacionModel{
     //abre la conexion con la base de datos
    function connect(){
       $db = new PDO('mysql:host=localhost; dbname=agencia_viaje; charset=utf8', 'root', '');
       return $db;
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getEstaciones() {
        //abro conexion
        $db = $this->connect();
        //envia la consulta 
        $query = $this-> $db->prepare('SELECT * FROM estaciones');
        $query->execute();

        //obtiene un arreglo de tareas
        $estaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $estaciones;
    }


}