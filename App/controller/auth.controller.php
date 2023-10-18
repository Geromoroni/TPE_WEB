<?php
require_once './app/view/auth.view.php';
require_once './app/model/user.model.php';


class AuthController {
    private $view;
    private $model;

    function __construct() {
       // $this->model = new UserModel();
        $this->view = new AuthView();
        $this->model = new UserModel();
    }

    public function showLogin() {
        $this->view->showLogin();
    }


    public function auth() {
        $email = $_POST['email'];
        $password = $_POST['password'];

     
        if (empty($email) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->model->getByEmail($email);

            if ($user && password_verify($password, $user->password)) {
        
            // aca lo autentico
            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['EMAIL_USER'] = $user->email;

            
            header('Location: ' . BASE_URL . "listar");
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    

}

