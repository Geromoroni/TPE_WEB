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
        //obtiene las tareas del model
        $estaciones = $this->model->getEstaciones();


        //actualizo la vista
        $this->view->showEstaciones($estaciones);
    }
}