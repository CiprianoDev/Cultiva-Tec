<?php
require './code/functions/incluirTemplate.php';

session_start();

$usuario_nombre = "";
$idfruta = $_GET['fruta'];
$conexion = new \Tec\CultivaTec\classes\Conexion();
$conexion->conectar();
$consulta = "SELECT * FROM frutas WHERE idfruta = '$idfruta'";
$resultado = $conexion->ejecutarConsulta($consulta);
$conexion->desconectar();
$nombreFruta = $resultado[0]['nombre'];
$nombreImagen = $resultado[0]['imagen'];

if (!isset($_SESSION['usuario_nombre'])) {
    header('Location: /login');
} else {
    $usuario_nombre = $_SESSION['usuario_nombre'];
}


incluirTemplate('header', true);

?>

<main>
    <a href="/inicio" class="boton boton-verde">Volver</a>
    <h1 class="administrador__titulo">Actualizar Fruta</h1>


    <div class="centrar">

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>

    <?php endforeach ?>

        <form action="/edit" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="nombre">Nombre:</label>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre de Fruta" value="<?php echo $nombreFruta ?>">


                <label for="imagen">Imagen:</label>
                <input name="imagen" type="file" id="imagen" accept="image/jpeg, image/png">

                <input type="hidden" name="idfruta" id="idfruta" value="<?php echo $idfruta?>">
                <input type="hidden" name="imagenActual" id="imagenActual" value="<?php echo $nombreImagen ?>">
                

            </fieldset>

            <input type="submit" value="Actualizar Fruta" class="boton boton-verde-form">
        </form>
    </div>

</main>



<?php
incluirTemplate('footer');
?>