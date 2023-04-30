<?php

use Bramus\Router\Router;
use Tec\CultivaTec\classes\Usuario;

$router = new Router();

$router->get('/', function() {
    require 'code/index.php';
});

$router->get('/login', function() {
    require 'code/views/login.php';
});

$router->post('/auth', function() {
    $usuario_nombre = trim($_POST['usuario_nombre']);
    $usuario_contra = trim($_POST['usuario_contra']);

    if (empty($usuario_nombre) || empty($usuario_contra)) {
        echo json_encode("error");
        header('Location: /login');
        //die();
    }

    $usuario = new Usuario();
    $usuario->__set('usuario_nombre', $usuario_nombre);
    $contra = $usuario->getUsuarioContra()[0]['usuario_contra'];

    // echo 'Nombre: ' . $usuario->__get('usuario_nombre') . "<br>";
    // echo 'Contra: ' . $contra;
    if (password_verify($usuario_contra, $contra)) {
        session_start();
        $_SESSION['usuario_nombre'] = $usuario_nombre;
        echo json_encode("autorizado");
        //header('Location: /inicio');
        //var_dump($_SESSION);
        //echo "Bienvenido";
    } else {
        echo "no eres bienvenido";
    }
    //require 'code/login.php';
});

$router->get('/inicio', function() {
    require 'code/views/inicio.php';
});

$router->get('/logout', function() {
    require 'code/functions/cerrar_sesion.php';
});

$router->run();