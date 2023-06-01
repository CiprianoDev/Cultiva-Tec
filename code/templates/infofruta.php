<?php
require './code/functions/incluirTemplate.php';
session_start();

$usuario_nombre = "";


if (!isset($_SESSION['usuario_nombre'])) {
    //header('Location: /login');
} else {
    $usuario_nombre = $_SESSION['usuario_nombre'];
}
incluirTemplate('header', true);
$conexion = new \Tec\CultivaTec\classes\Conexion();
$conexion->conectar();
$idFruta = $_GET['idfruta'];
$consulta = "SELECT * FROM norma WHERE idfruta = '$idFruta' AND idcaracter= '1' AND idcomercio = '1'";
$obligatorioNacional = $conexion->ejecutarConsulta($consulta);
$consulta2 = "SELECT * FROM norma WHERE idfruta = '$idFruta' AND idcaracter= '1' AND idcomercio = '2'";
$obligatorioInternacional = $conexion->ejecutarConsulta($consulta2);
$consulta = "SELECT * FROM norma WHERE idfruta = '$idFruta' AND idcaracter= '2' AND idcomercio = '1'";
$nObligatorioNacional = $conexion->ejecutarConsulta($consulta);
$consulta2 = "SELECT * FROM norma WHERE idfruta = '$idFruta' AND idcaracter= '2' AND idcomercio = '2'";
$nObligatorioInternacional = $conexion->ejecutarConsulta($consulta2);
$consulta3 = "SELECT * FROM frutas WHERE idfruta = '$idFruta'";
$fruta = $conexion->ejecutarConsulta($consulta3);
$nombreFruta = $fruta[0]['nombre'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normas de <?php echo $nombreFruta ?></title>
</head>

<body class="contenedor-info">

    <main class="informacion-contenedor">
        <h2>Normativa y requerimientos para exportación e importación de <?php echo $nombreFruta ?> </h2>



        <div class="index">
            <h3>Indice:</h3>
            <ul>
                <li class="seccion"><a href="#obligatorios">Lineamientos de carácter OBLIGATORIO:</a></li>
                <li class="seccion"><a href="#obNacional">Comercio Nacional</a></li>
                <?php foreach ($obligatorioNacional as $fila) :
                    $nombreCorto = $fila['nombreCorto'];
                ?>
                    <ul>
                        <li><a href="#<?php echo $nombreCorto; ?>"> <?php echo $nombreCorto; ?></a></li>
                    </ul>
                <?php endforeach; ?>

                <li class="seccion"><a href="#obIntercional">Comercio Internacional</a></li>
                <?php foreach ($obligatorioInternacional as $fila) :
                    $nombreCorto = $fila['nombreCorto'];
                ?>
                    <ul>
                        <li><a href="#<?php echo $nombreCorto; ?>"> <?php echo $nombreCorto; ?></a></li>
                    </ul>
                <?php endforeach; ?>

                <li class="seccion"><a href="#nobligatorios">Lineamientos de carácter NO OBLIGATORIO:</a></li>
                <li class="seccion"><a href="#nobNacional">Comercio Nacional</a></li>
                <?php foreach ($nObligatorioNacional as $fila) :
                    $nombreCorto = $fila['nombreCorto'];
                ?>
                    <ul>
                        <li><a href="#<?php echo $nombreCorto; ?>"> <?php echo $nombreCorto; ?></a></li>
                    </ul>
                <?php endforeach; ?>

                <li class="seccion"><a href="#nobIntercional">Comercio Internacional</a></li>
                <?php foreach ($nObligatorioInternacional as $fila) :
                    $nombreCorto = $fila['nombreCorto'];
                ?>
                    <ul>
                        <li><a href="#<?php echo $nombreCorto; ?>"> <?php echo $nombreCorto; ?></a></li>
                    </ul>
                <?php endforeach; ?>
                <ul>
        </div>

        <div class="contenido-normas">
            <h4 id="#obligatorios">
                Lineamientos de carácter OBLIGATORIO:
            </h4>

            <h4 id="#obNacional">
                Comercio Nacional:
            </h4>
            <?php foreach ($obligatorioNacional as $fila) :
                $nombreCorto = $fila['nombreCorto'];
                $nombreLargo = $fila['nombreLargo'];
                $contenido = $fila['contenido'];
                $link = $fila['link'];                ?>
                <div class="norma-informacion">
                    <h5 id="<?php echo $nombreCorto; ?>"> <?php echo $nombreLargo; ?> </h5>
                    <p class="info-formateada">
                        <?php echo $contenido; ?>
                    </p>
                    <a target="_blank" href="<?php echo $link; ?>">Ver Sitio Oficial</a>
                </div>

            <?php endforeach; ?>

            <h4 id="#obInternacional">
                Comercio Internacional:
            </h4>
            <?php foreach ($obligatorioInternacional as $fila) :
                $nombreCorto = $fila['nombreCorto'];
                $nombreLargo = $fila['nombreLargo'];
                $contenido = $fila['contenido'];
                $link = $fila['link'];                ?>
                <div class="norma-informacion">
                    <h5 id="<?php echo $nombreCorto; ?>"> <?php echo $nombreLargo; ?> </h5>
                    <p class="info-formateada">
                        <?php echo $contenido; ?>
                    </p>
                    <a target="_blank" href="<?php echo $link; ?>">Ver Sitio Oficial</a>
                </div>

            <?php endforeach; ?>


        </div>

        <div class="contenido-normas">
            <h4 id="#nobligatorios">
                Lineamientos de carácter NO OBLIGATORIO:
            </h4>

            <h4 id="#nobNacional">
                Comercio Nacional:
            </h4>
            <?php foreach ($nObligatorioNacional as $fila) :
                $nombreCorto = $fila['nombreCorto'];
                $nombreLargo = $fila['nombreLargo'];
                $contenido = $fila['contenido'];
                $link = $fila['link'];                ?>
                <div class="norma-informacion">
                    <h5 id="<?php echo $nombreCorto; ?>"> <?php echo $nombreLargo; ?> </h5>
                    <p class="info-formateada">
                        <?php echo $contenido; ?>
                    </p>
                    <a target="_blank" href="<?php echo $link; ?>">Ver Sitio Oficial</a>
                </div>

            <?php endforeach; ?>

            <h4 id="#nobInternacional">
                Comercio Internacional:
            </h4>
            <?php foreach ($nObligatorioInternacional as $fila) :
                $nombreCorto = $fila['nombreCorto'];
                $nombreLargo = $fila['nombreLargo'];
                $contenido = $fila['contenido'];
                $link = $fila['link'];                ?>
                <div class="norma-informacion">
                    <h5 id="<?php echo $nombreCorto; ?>"> <?php echo $nombreLargo; ?> </h5>
                    <p class="info-formateada">
                        <?php echo $contenido; ?>
                    </p>
                    <a target="_blank" href="<?php echo $link; ?>">Ver Sitio Oficial</a>
                </div>

            <?php endforeach; ?>


        </div>

    </main>

</body>

</html>













<?php incluirTemplate('footer'); ?>