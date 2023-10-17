<?php 
include_once "App/model/estaciones.model.php";
include_once "App/view/estaciones.view.php";

class EstacionController{
    private $model;
    private $view;


     function __construct(){
    $this->model= new EstacionModel();
    $this->view= new EstacionView();

    }

    function showEstaciones(){
        //obtiene las estaciones del model
        $estaciones = $this->model->getEstaciones();
    

        //actualizo la vista
        $this->view->showEstaciones($estaciones);
    }

    public function addEstacion() {

        // obtengo los datos del usuario
        $nombre_estacion = $_POST['nombre_estacion'];
        

        // validaciones
        if (empty($nombre_estacion) ) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->addEstacion($nombre_estacion);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }



    function removeEstacion($id_estacion) {

            $this->model->deleteEstacion($id_estacion);
            header('Location: ' . BASE_URL);
        

            
        

            
    }




}