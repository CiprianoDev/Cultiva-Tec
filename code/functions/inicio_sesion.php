<?php
/*
namespace Tec\CultivaTec\functions;

use Tec\CultivaTec\classes\Usuario;

//$contra = password_hash('adm_contra', PASSWORD_DEFAULT);

// if (isset($_POST['submit'])) {
    echo "Submit";
    $usuario_nombre = trim($_POST['usuario_nombre']);
    $usuario_contra = trim($_POST['usuario_contra']);

    if (empty($usuario_nombre) || empty($usuario_contra)) {
        //echo json_encode("error: Valores no validos");
        header('Location: /code/login.php');
        //die();
    }

    $usuario = new Usuario();
    $usuario->__set('usuario_nombre', $usuario_nombre);
    echo $user->__get('usuario_nombre');
    $contra = $usuario->getUsuarioContra();

    if (password_verify($usuario_contra, $contra)) {
        session_start();
        $_SESSION['usuario_nombre'] = $usuario_nombre;
        header('Location: /code/views/inicio.php');
        //var_dump($_SESSION);
        //echo "Bienvenido";
    } else {
        echo "no eres bienvenido";
    }

// } else {
//     echo "No";
// }
*/