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
$idFruta = $_GET['idfruta'];
$consulta = "SELECT * FROM frutas WHERE idfruta = '$idFruta'";
$consulta2 = "SELECT * FROM norma";
$resultado = $conexion->ejecutarConsulta($consulta);
$nombreFruta = $resultado[0]['nombre'];
$normas = $conexion->ejecutarConsulta($consulta2);

?>

<main>
    <h1 class="administrador__titulo">Normas de <?php echo $nombreFruta ?></h1>
    <a href="/inicio" class="boton boton-verde">Volver</a>
    <a href="/addnorma" class="boton boton-verde">Agregar Una Nueva Norma</a>
    <table class="frutas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Link</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($normas  as $fila) {
                $id = $fila['idnorma'];
                $nombre = $fila['nombreCorto'];
                $link = $fila['link'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $link ?></td>
                    <td class="opciones">
                        <a class="boton-amarillo-block" href="">Actualizar</a>
                        <form action="" method="post">
                            <input type="hidden" name="delete" value="<?php echo $id ?>">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="linea"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>

<?php
incluirTemplate('footer');
?>