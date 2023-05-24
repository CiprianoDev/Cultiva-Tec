<?php

use Bramus\Router\Router;
use Tec\CultivaTec\classes\Usuario;
require './code/classes/Fruta.php';

$router = new Router();

$router->get('/', function () {
    require 'code/index.php';
});

$router->get('/login', function () {
    require 'code/views/login.php';
});

$router->post('/auth', function () {
    $usuario_nombre = trim($_POST['usuario_nombre']);
    $usuario_contra = trim($_POST['usuario_contra']);

    if (empty($usuario_nombre) || empty($usuario_contra)) {
        echo json_encode("error");
        header('Location: /login');
        //die();
    }
    $usuario = new Usuario($usuario_nombre, $usuario_contra);
    $usuario->validarUsuario();
    /*
    $usuario = new Usuario($usuario_nombre, $usuario_contra);
    $contra = $usuario->getUsuarioContra();

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
    }*/
    //require 'code/login.php';
});

$router->get('/inicio', function () {
    require 'code/views/inicio.php';
});

$router->get('/actualizar', function () {

    require 'code/views/editar.php';
});

$router->get('/normas', function () {

    require 'code/views/normas.php';
});

$router->post('/edit', function(){
   
   $id = $_POST['idfruta'];
   $imagenActual = $_POST['imagenActual'];
   $nuevoNombre = $_POST['nombre'];
   $nuevaImagen  = $_POST['imagen'];
   $fruta = new Fruta("","");
   $fruta ->actualizarEnBaseDeDatos($imagenActual,$nuevoNombre,$nuevaImagen,$id);
   require 'code/views/editar.php';
});

$router->get('/logout', function () {
    require 'code/functions/cerrar_sesion.php';
});

$router->get('/create', function () {
    require 'code/views/crear.php';
});

$router->get('/addnorma', function () {
    require 'code/views/agregarNorma.php';
});

$router->post('/create', function () {
    
    
    $errores = [];
    $nombre = '';
    $nombre = $_POST['nombre'];
    $imagen = $_FILES['imagen'];

    if (!$nombre) {
        $errores[] = "Debes añadir un nombre";
    }
    if (!$imagen['name']) {
        $errores[] = "La imagen es obligatoria";
    }

    if (empty($errores)) {
        $fruta = new Fruta($nombre, $imagen);
        $fruta->insertarEnBaseDeDatos();
    }

    require 'code/views/crear.php';
});

$router->post('/inicio', function(){
  $frutaElimnar = $_POST['delete'];
  $fruta = new Fruta("","");
  $fruta->eliminar($frutaElimnar);
  require require 'code/views/inicio.php';
});



$router->run();
