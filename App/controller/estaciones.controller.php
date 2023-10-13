<?php 
include_once "App/model/estaciones.model.php";
include_once "App/view/view.model.php";

class EstacionController{
    private $model;
    private $view;


     function __construct(){
    $this->model= new EstacionModel();
    $this->$view= new EstacionView();

    }

    function showEstaciones(){
        //obtiene las tareas del model
        $tasks = $this->model->getEstaciones();


        //actualizo la vista
        $this->view->showEstaciones();
    }
}