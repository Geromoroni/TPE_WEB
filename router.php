<?php
include_once "./App/controller/estaciones.controller.php";
include_once "./App/controller/ciudades.controller.php";
include_once "./App/controller/auth.controller.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'login'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
// parsea la accion 

$params = explode('/', $action); // genera un arreglo

switch ($params[0]) {
    case 'listar':
        $controller = new EstacionController();
        $controller->showEstaciones();
        break; 

    case 'insertar':
        $controller = new EstacionController();
        $controller->addEstacion();
         break;    

    case 'insertarCiudad':
        $controller = new ciudadController();
        $controller->addCiudad();
         break;    

     case 'eliminar':
        $controller = new EstacionController();
        $controller->removeEstacion($params[1]);
            break;
    
     case 'eliminarCiudad':
        $controller = new CiudadController();
        $controller->removeCiudad($params[1]);
            break;

    case 'finalizar':
        $controller = new EstacionController();
        $controller->finishEstacion($params[1]);
            break;
        
    
    case 'ciudades':
        $controller = new CiudadController();
        $controller-> showCiudades();
        break;

    case 'infoCiudad':
        $controller = new CiudadController();
        $controller-> showInfoCiudades($params[1]);
        break;

    case 'login':
        $controller = new AuthController();
        $controller-> showLogin();
        break;     

    case 'auth':
        $controller = new AuthController();
        $controller-> auth();
        break;
<<<<<<< HEAD

    case 'logout':
        $controller = new AuthController();
        $controller-> logout();
        break;  


=======
    
    case 'editar':
        $controller = new EstacionController();
        $controller->modifyEstacion($params[1]);
        break;
        
>>>>>>> 8c3b8c9cab1383070bb9459076d9f6538e652985
    default:
        header("Location: login");
        break;
}

?>