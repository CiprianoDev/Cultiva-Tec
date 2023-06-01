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

$idnorma = $_GET['idnorma'];
$idfruta = $_GET['idfruta'];




$sqlnorma = "SELECT * FROM norma WHERE idnorma = '$idnorma'";
$conexion = new \Tec\CultivaTec\classes\Conexion();
$conexion->conectar();
$consulta = "SELECT * FROM comercio";
$selectComercio = $conexion->ejecutarConsulta($consulta);
$consulta = "SELECT * FROM caracter";
$selectCaracter = $conexion->ejecutarConsulta($consulta);
$norma = $conexion->ejecutarConsulta($sqlnorma);
$conexion->desconectar();

$idnorma = $norma[0]['idnorma'];
$idfruta = $norma[0]['idfruta'];
$nombreCorto = $norma[0]['nombreCorto'];
$nombreLargo = $norma[0]['nombreLargo'];
$contenido = $norma[0]['contenido'];
$link = $norma[0]['link'];
$idcaracter = $norma[0]['idcaracter'];
$idcomercio = $norma[0]['idcomercio'];

if (empty($nombreCorto)) {
    
    $nombreCorto = $_GET['nombreCorto'];
    $nombreLargo = $_GET['nombreLargo'];
    $contenido = $_GET['contenido'];
    $link = $_GET['link'];
    $idcaracter = $_GET['idcaracter'];
    $idcomercio = $_GET['idcomercio'];
    $idnorma = $_GET['idnorma'];
    $idfruta = $_GET['idfruta'];
    $errores = isset($_GET['errores']) ? explode(',', $_GET['errores']) : [];
}



?>

<main>
    <a href="/normas?idfruta= <?php echo $idfruta ?>" class="boton boton-verde">Volver</a>
    <h1 class="administrador__titulo">Actualizar Norma</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>

    <?php endforeach ?>

    <div class="centrar">



        <form action="/updateN" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="nombreCorto">Nombre Corto:</label>
                <input name="nombreCorto" type="text" id="nombreCorto" placeholder="ej: -CODEX STAN 197-1995" value="<?php echo $nombreCorto ?>">

                <label for="nombreLargo">Nombre largo:</label>
                <input name="nombreLargo" type="text" id="nombreLargo" placeholder="ej: MODIFICACIÓN de la Norma Oficial..." value="<?php echo $nombreLargo ?>">

                <label for="contenido">Contenido:</label>
                <textarea name="contenido" id="contenido"><?php echo $contenido ?></textarea>

                <label for="link">link:</label>
                <input name="link" type="text" id="link" placeholder="ej: http://norma.org" value="<?php echo $link ?>">

                <input type="hidden" name="idfruta" id="idfruta" value="<?php echo $idfruta?>">
                <input type="hidden" name="idnorma" id="idnorma" value="<?php echo $idnorma;?>">

            </fieldset>

            <fieldset>
                <legend>Caracter</legend>

                <select name="idcaracter" id="caracter">
                    <option value="">--Selecionar--</option>
                    <?php
                    foreach ($selectCaracter as $fila) {
                        $id = $fila['idcaracter'];
                        $nombre = $fila['tipo'];
                    ?>

                        <option <?php echo $id == $idcaracter ? 'selected' : ''; ?> value="<?php echo $id ?>"> <?php echo $nombre ?> </option>
                    <?php }

                    ?>
                </select>


            </fieldset>

            <fieldset>
                <legend>Tipo de comercio</legend>

                <select name="idcomercio" id="comercio">
                    <option value="">--Selecionar--</option>
                    <?php
                    foreach ($selectComercio as $fila) {
                        $id = $fila['idcomercio'];
                        $nombre = $fila['tipocomercio'];
                    ?>

                        <option <?php echo $id == $idcomercio ? 'selected' : ''; ?> value="<?php echo $id ?>"> <?php echo $nombre ?> </option>
                    <?php }

                    ?>
                </select>


            </fieldset>

            <input type="submit" value="Actualizar Norma" class="boton boton-verde-form">
        </form>
    </div>

</main>



<?php
incluirTemplate('footer');
?>