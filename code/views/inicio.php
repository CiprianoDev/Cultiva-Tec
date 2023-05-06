<?php

session_start();
$usuario_nombre = '';

if (!isset($_SESSION['usuario_nombre'])) {
    header('Location: /login');
} else {
    $usuario_nombre = $_SESSION['usuario_nombre'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CultivaTec</title>
</head>
<body>
    <h1>Bienvenido <?= $usuario_nombre ?></h1>

    <a href="/logout">Cerrar sesion</a>
</body>
</html>