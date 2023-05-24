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

$conexion = new \Tec\CultivaTec\classes\Conexion();
$conexion->conectar();
$consulta = "SELECT * FROM comercio";
$selectComercio = $conexion->ejecutarConsulta($consulta);
$consulta = "SELECT * FROM caracter";
$selectCaracter = $conexion->ejecutarConsulta($consulta);
$conexion->desconectar();

?>

<main>
    <a href="/inicio" class="boton boton-verde">Volver</a>
    <h1 class="administrador__titulo">Agregar Nueva Norma</h1>


    <div class="centrar">

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>

    <?php endforeach ?>

    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="nombreCorto">Nombre Corto:</label>
            <input name="nombreCorto" type="text" id="nombreCorto" placeholder="ej: -CODEX STAN 197-1995" value="<?php echo $titulo ?>">

            <label for="nombreLargo">Nombre largo:</label>
            <input name="nombreLargo" type="text" id="nombreLargo" placeholder="ej: MODIFICACIÓN de la Norma Oficial..." value="<?php echo $precio ?>">

            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido"><?php echo $descripcion ?></textarea>

            <label for="link">link:</label>
            <input name="link" type="text" id="link" placeholder="ej: http://norma.org" value="<?php echo $precio ?>">

        </fieldset>

        <fieldset>
            <legend>Caracter</legend>

            <select name="caracter" id="caracter">
                <option value="">--Selecionar--</option>
                <?php 
                foreach ($selectCaracter as $fila) {
                    $id = $fila['idcaracter'];
                    $nombre = $fila['tipo'];
                    echo "<option value='$id'>$nombre</option>";
                }
                
                ?>
            </select>

        
        </fieldset>

        <fieldset>
            <legend>Tipo de comercio</legend>

            <select name="comercio" id="comercio">
                <option value="">--Selecionar--</option>
                <?php 
                foreach ($selectComercio as $fila) {
                    $id = $fila['idcomercio'];
                    $nombre = $fila['tipocomercio'];
                    echo "<option value='$id'>$nombre</option>";
                }
                
                ?>
            </select>

        
        </fieldset>

        <input type="submit" value="agregar norma" class="boton boton-verde-form">
    </form>
    </div>

</main>



<?php
incluirTemplate('footer');
?>