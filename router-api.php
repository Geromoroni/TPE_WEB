<?php

require_once './libs/Router.php';
require_once './App/api/api-task.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo

$router->addRoute('ciudades', 'GET', 'ApiTaskController', 'getAll');
$router->addRoute('ciudades/:ID', 'GET', 'ApiTaskController', 'get');
$router->addRoute('ciudades/:ID', 'DELETE', 'ApiTaskController', 'delete');
$router->addRoute('ciudades', 'POST', 'ApiTaskController', 'add');
$router->addRoute('ciudades/:ID', 'PUT', 'ApiTaskController', 'update');
$router->addRoute('ciudades/:ID/:subrecurso', 'GET', 'ApiTaskController', 'get');


// rutea

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);

