<?php

use Bramus\Router\Router;
use Tec\CultivaTec\classes\Usuario;

require './code/classes/Fruta.php';
require './code/classes/norma.php';

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

$router->post('/edit', function () {

    $id = $_POST['idfruta'];
    $imagenActual = $_POST['imagenActual'];
    $nuevoNombre = $_POST['nombre'];
    $nuevaImagen  = $_POST['imagen'];
    $fruta = new Fruta("", "");
    $fruta->actualizarEnBaseDeDatos($imagenActual, $nuevoNombre, $nuevaImagen, $id);
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

$router->post('/inicio', function () {
    $frutaElimnar = $_POST['delete'];
    $fruta = new Fruta("", "");
    $fruta->eliminar($frutaElimnar);
    require  'code/views/inicio.php';
});

$router->post('/agregarNorma', function () {

    $errores = [];
    $nombreCorto = $_POST['nombreCorto'];
    $nombreLargo = $_POST['nombreLargo'];
    $contenido = $_POST['contenido'];
    $link = $_POST['link'];
    $idcaracter = $_POST['idcaracter'];
    $idcomercio = $_POST['idcomercio'];
    $idfruta = $_POST['idfruta'];

    if (!$nombreCorto) {
        $errores[] = "Debes añadir un nombre corto";
    }
    if (!$nombreLargo) {
        $errores[] = "Debes añadir un nombre largo";
    }
    if (!$contenido) {
        $errores[] = "El contenido es obligatorio";
    }
    if (!$link) {
        $errores[] = "Debes añadir un link";
    }
    if (!$idcaracter) {
        $errores[] = "Debes seleccionar el caracter de la norma";
    }

    if (!$idcomercio) {
        $errores[] = "Debes seleccionar el tipo de comercio de la norma";
    }

    $params = [
        'nombreCorto' => $nombreCorto,
        'nombreLargo' => $nombreLargo,
        'contenido' => $contenido,
        'link' => $link,
        'idcaracter' => $idcaracter,
        'idcomercio' => $idcomercio,
        'idfruta' => $idfruta
    ];

    if (empty($errores)) {
        $norma = new norma($params);
        $norma->insertarEnBaseDeDatos();
        header('location: /normas?idfruta=' . $idfruta);
        exit;
    }

    $url = '/addnorma?idfruta=' . $idfruta . '&nombreCorto=' . urlencode($nombreCorto) . '&nombreLargo=' . urlencode($nombreLargo) . '&contenido=' . urlencode($contenido) . '&link=' . urlencode($link) . '&idcaracter=' . urlencode($idcaracter) . '&idcomercio=' . urlencode($idcomercio) . '&errores=' . urlencode(implode(',', $errores));
    header('Location: ' . $url);
});

$router->post('/updateN', function () {

    $errores = [];
    $nombreCorto = $_POST['nombreCorto'];
    $nombreLargo = $_POST['nombreLargo'];
    $contenido = $_POST['contenido'];
    $link = $_POST['link'];
    $idcaracter = $_POST['idcaracter'];
    $idcomercio = $_POST['idcomercio'];
    $idfruta = $_POST['idfruta'];
    $idnorma = $_POST['idnorma'];
    var_dump($_POST);

    if (!$nombreCorto) {
        $errores[] = "Debes añadir un nombre corto";
    }
    if (!$nombreLargo) {
        $errores[] = "Debes añadir un nombre largo";
    }
    if (!$contenido) {
        $errores[] = "El contenido es obligatorio";
    }
    if (!$link) {
        $errores[] = "Debes añadir un link";
    }
    if (!$idcaracter) {
        $errores[] = "Debes seleccionar el caracter de la norma";
    }

    if (!$idcomercio) {
        $errores[] = "Debes seleccionar el tipo de comercio de la norma";
    }

    $params = [
        'idnorma' => $idnorma,
        'nombreCorto' => $nombreCorto,
        'nombreLargo' => $nombreLargo,
        'contenido' => $contenido,
        'link' => $link,
        'idcaracter' => $idcaracter,
        'idcomercio' => $idcomercio,
        'idfruta' => $idfruta
    ];



    if (empty($errores)) {
        $norma = new norma($params);
        $norma->actualizarEnBaseDeDatos();
        header('location: /normas?idfruta=' . $idfruta);
        exit;
    }

    $url = '/updateNorma?idfruta='. $idfruta . '&idnorma=' . urlencode($idnorma) . $idfruta . '&nombreCorto=' . urlencode($nombreCorto) . '&nombreLargo=' . urlencode($nombreLargo) . '&contenido=' . urlencode($contenido) . '&link=' . urlencode($link) . '&idcaracter=' . urlencode($idcaracter) . '&idcomercio=' . urlencode($idcomercio) . '&errores=' . urlencode(implode(',', $errores));
    header('Location: ' . $url);
});

$router->post('/borrarNorma', function () {
    $params = [];
    $idnorma = $_POST['delete'];
    $idfruta = $_POST['idfruta'];
    $norma = new norma($params);
    $norma->eliminar($idnorma);
    header('Location: /normas?idfruta=' . $idfruta);
});

$router->get('/informacion', function () {
    require 'code/templates/infofruta.php';
});

$router->get('/updateNorma', function () {
    require 'code/views/updateNorma.php';
});




$router->run();
