<?php 
require_once './App/model/ciudades.model.php';
require_once './App/api/api.view.php';

class ApiTaskController{
    private $model;
    protected $view;
    private $data;

    function __construct() {
        $this->model = new CiudadModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }
    //lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData(){
        return json_decode($this->data);
    }

    public function getAll($params = null){

        $parametros = [];
        
        if(isset($_GET['sort'])){
            $parametros['sort'] = $_GET['sort'];
        }
        if(isset($_GET['order'])){
            $parametros['order'] = $_GET['order'];
        }

        $ciudades = $this->model->getCiudades($parametros);
        $this->view->response($ciudades, 200);
        }

    public function get($params = null){
        //$params es un array asociativo con los parametros de la ruta
        $idCiudad = $params[':ID'];
        $ciudad = $this->model->getInfoCiudades($idCiudad);

        if($ciudad){
            $this->view->response($ciudad, 200);

        } else {
            $this->view->response("La ciudad con el id=$idCiudad no existe", 404);
        }
    }

    

    public function add($params = null){
        $body = $this->getData();

        $nombre       =$body->nombre;
        $info_ciudad  =$body->info_ciudad;
        $id_estacion  =$body->id_estacion;

        $id = $this->model->addCiudad($nombre, $info_ciudad, $id_estacion);

        if ($id>0){
            $this->view->response("Se agrego la ciudad $id exitosamente", 200);
        }
        else {
            $this->view->response("No se pudo insertar", 500);

        }
    }

    public function delete($params = null){
        $idCiudad = $params[':ID'];
        $success =  $this->model->deleteCiudad($idCiudad);
        if ($success){
            $this->view->response("La ciudad con el id=$idCiudad se borro exitosamente", 200);

        }
        else {
            $this->view->response("La ciudad con el id=$idCiudad no existe", 404);

        }
    }

    public function update($params = []){
        $id_ciudad = $params[':ID'];
        $ciudad = $this->model->getCiudades($id_ciudad);
        if ($ciudad){
            $body = $this->getData();

            $nombre_ciudad=$body->nombre;
            $info_ciudad  =$body->info_ciudad;
            $id_estacion  =$body->id_estacion;
    
           $this->model->update($nombre_ciudad, $info_ciudad, $id_estacion, $id_ciudad);
            $this->view->response("La ciudad con el id=$id_ciudad ha sido modificadaexitosamente", 200);

        }
        else {
            $this->view->response("La ciudad con el id= $id_ciudad no se pudo modificar", 404);

        }
    }
}