<?php
include_once "./App/controller/estaciones.controller.php";
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'listar'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
// parsea la accion 
echo $action;
$params = explode('/', $action); // genera un arreglo

switch ($params[0]) {
    case 'listar':
        $controller = new EstacionController();
        $controller->showEstaciones();
        break;
    default:
        //header("Location: listar");
        break;
}

?>