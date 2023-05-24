<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Cultivando-teC</title>
</head>


<body>
    <header class="header <?php echo $headerSinFoto ? "" : "principal" ?>">
        <nav class="header__navegacion">
            <a href="/" class="header__link">
                <img class="logo" src="build/img/agricultor.png" alt="logo Cultivando-teC">
            </a>

            <?php

            if ($_SESSION['usuario_nombre']) { ?>
                <a class="header__link usuario"> Bienvenido <?php echo $_SESSION['usuario_nombre'] ?> </a>
            <?php } ?>
            <a href="<?php echo $_SESSION['usuario_nombre'] ? "/logout" : "/login" ?>" class="header__link"> <?php echo $_SESSION['usuario_nombre'] ? "Cerrar Sesion" : "Iniciar Sesion" ?> </a>
        </nav>
        <?php
        if (!$headerSinFoto) {

        ?>
            <div class="header__titulo">

                <h1 class="header__titulo-nombre">Cultivando-te<span>C</span></h1>
                <p class="header__titulo-slogan">"cultura para la agricultura"</p>
            </div>

        <?php } ?>
    </header>