<?php 
include_once "App/model/ciudades.model.php";
include_once "App/view/ciudades.view.php";

class CiudadController{
    private $model;
    private $view;


     function __construct(){
    $this->model= new CiudadModel();
    $this->view= new CiudadView();
    
    //verifico si el usuario esta logeado
    $this->checkLogged();

    }

    function showCiudades(){
        //obtiene las ciudades del model
        $ciudades = $this->model->getCiudades();
    

        //actualizo la vista
        $this->view->showCiudades($ciudades);
    }

    public function addCiudad() {

        // obtengo los datos del usuario
        $nombre_ciudad = $_POST['nombre'];
        

        // valido
        if (empty($nombre_ciudad) ) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->addCiudad($nombre_ciudad);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }



    function removeCiudad($id_ciudad) {

            $this->model->deleteCiudad($id_ciudad);
            header('Location: ' . BASE_URL);
    }

    function showInfoCiudades(){
        //obtiene las ciudades del model
        $ciudades = $this->model->getInfoCiudades();
    

        //actualizo la vista
        $this->view->showInfoCiudades($ciudades);
    }

    //barrera de seguridad para administrador logeado
    function checkLogged(){
        session_start();
        if(!isset($_SESSION['ID_USER']))   {
            header("Location: " . BASE_URL . "login");
            die();
        }}


}