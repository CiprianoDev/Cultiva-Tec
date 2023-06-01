<?php
require './code/functions/incluirTemplate.php';

session_start();

$usuario_nombre = "";


if (!isset($_SESSION['usuario_nombre'])) {
    header('Location: /login');
} else {
    $usuario_nombre = $_SESSION['usuario_nombre'];
}


incluirTemplate('header', true);

?>

<main>
    <a href="/inicio" class="boton boton-verde">Volver</a>
    <h1 class="administrador__titulo">Crear nueva fruta</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>

    <?php endforeach ?>

    <div class="centrar">

    

        <form action="/create" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="nombre">Nombre:</label>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre de Fruta" value="<?php echo $nombre ?>">


                <label for="imagen">Imagen:</label>
                <input name="imagen" type="file" id="imagen" accept="image/jpeg, image/png">

            </fieldset>

            <input type="submit" value="Crear Fruta" class="boton boton-verde-form">
        </form>
    </div>

</main>



<?php
incluirTemplate('footer');
?>