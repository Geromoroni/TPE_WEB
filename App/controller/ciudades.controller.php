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
        $info_ciudad = $_POST['info_ciudad'];
        $id_estacion = $_POST['id_estacion'];
        

        // valido
        if (empty($nombre_ciudad) || empty($info_ciudad) || empty($id_estacion) ) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->addCiudad($nombre_ciudad, $info_ciudad, $id_estacion);
        if ($id) {
            header('Location: ' . BASE_URL . "ciudades");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    public function updateCiudad($id) {

        // obtengo los datos del usuario
        $nombre_ciudad = $_POST['nombre'];
        $info_ciudad = $_POST['info_ciudad'];
        $id_estacion = $_POST['id_estacion'];
        

        // valido
        if (empty($nombre_ciudad) || empty($info_ciudad) || empty($id_estacion) ) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->addCiudad($nombre_ciudad, $info_ciudad, $id_estacion);
        if ($id) {
            header('Location: ' . BASE_URL . "ciudades");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }
    
    
    
    function removeCiudad($id_ciudad) {
        $this->model->deleteCiudad($id_ciudad);
        header('Location: ' . BASE_URL . 'ciudades');
    }

    function showInfoCiudades($id_ciudad){
        //obtiene las ciudades del model
        $ciudades = $this->model->getInfoCiudades($id_ciudad);
    

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