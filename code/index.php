<?php
require './code/functions/incluirTemplate.php';
incluirTemplate('header');
$conexion = new \Tec\CultivaTec\classes\Conexion();
$conexion->conectar();

$consulta = "SELECT * FROM frutas";
$resultado = $conexion->ejecutarConsulta($consulta);
?>

<main class="contenido-principal">
    <section class="introduccion">

        <h2>¿Quiénes somos?</h2>
        <p class="principal-texto">

            Bienvenido a Cultivando-teC, una herramienta creada
            con la final idad de brindar información a aquel las
            personas involucradas en las actividades de la cadena
            de producción primaria, principalmente del sector
            agrícola, los cuales buscan comercial izar sus productos
            y no saben por dónde comenzar.

        </p>
        <br>
        <p class="principal-texto">
            Como se sabe, dentro de la industria de los al imentos,
            se deben l levar a cabo procedimientos que garanticen la
            cal idad e inocuidad de los productos que se destinarán
            para el consumo humano, esto l levando a cabo los
            procedimientos pertinentes desde la obtención de las
            materias primas, hasta que el producto l legue a su
            destino para ser distribuído y posteriormente
            consumido. Además, se deben de seguir rigurosos
            l ineamientos que se encuentran establecidos en función
            del tipo de al imentos, así como de los destinos a los
            que se diri jan, siendo regulados por distintas
            organizaciones, según sea el caso.
        </p>

        <br>

        <p class="principal-texto">
            En el caso del sector agrícola, es de suma importancia
            garantizar que los procesos implicados desde el cultivo
            hasta la cosecha, así como en el manejo post-cosecha,
            no representan riesgos fitosanitarios a los
            consumidores, ni perjudiquen o mermen procesos en
            algún eslabón de la cadena de comercial i zación, según
            sea el caso. Es por esto que existen diversos
            organismos o autoridades sanitarias que se encargan de
            regular y vigi lar las condiciones bajo las que se deben
            regir los productores y/o comercial i zadores de
            productos provenientes de las prácticas agrícolas, y
            así reducir al máximo los riesgos sanitarios que
            pudieran presentarse en las labores del rubro,
            optimi zando los factores que inhiben su desarrol lo y
            potenciando el alcance de los productos agrícolas en
            distintos ámbitos.

        </p>

        <br>

        <p class="principal-texto">
            El implementar sistemas que garanticen la calidad e
            inocuidad de los productos agrícolas puede repercutir
            de varias maneras, según los objetivos que se quieran
            alcanzar, entre el los encontramos:

        </p>
        <br>

        <div class="contenedor-ventajas">
            <div class="ventaja">

                <img class="ventaja-icono" src="build/img/icono_dinero.svg" alt="icono dinero">
                <p class="ventaja-texto">Disminuir los costos</p>

            </div>

            <div class="ventaja">

                <img class="ventaja-icono" src="build/img/icono_lista.svg" alt="icono dinero">
                <p class="ventaja-texto">Cumplir con las especificaciones</p>

            </div>

            <div class="ventaja">

                <img class="ventaja-icono" src="build/img/icono_salud.svg" alt="icono dinero">
                <p class="ventaja-texto">Proteger la salud publica</p>

            </div>

            <div class="ventaja">

                <img class="ventaja-icono" src="build/img/icono_check.svg" alt="icono dinero">
                <p class="ventaja-texto">Mayor eficiencia en el comercio</p>

            </div>

            <div class="ventaja">

                <img class="ventaja-icono" src="build/img/icono_caja.svg" alt="icono dinero">
                <p class="ventaja-texto">Transparencia en el comercio</p>

            </div>

            <div class="ventaja">

                <img class="ventaja-icono" src="build/img/icono_medalla.svg" alt="icono dinero">
                <p class="ventaja-texto">Garantizar la calidad</p>

            </div>


        </div>
        <br>
        <p class="principal-texto">
            Pese a que en cualquier parte del mundo los objetivos
            en cuanto a la materia de al imentación respecta son
            simi lares y buscan garanti zar la fitosanidad, las
            legislaciones o los requerimientos que se establecen
            para la comercial i zación de al imentos de origen
            agrícola son distintos, y se encuentran variantes debido
            a las distintas agencias y departamentos encargados de
            la protección de la salud públ ica a través de los
            estándares de cal idad, así como de otros intereses
            impl icados a través del comercio.
        </p>

        <p class="principal-texto">
            Aquí encontrarás la información necesaria para l levar a
            cabo los procedimientos pertinentes que aseguren la
            satisfacción bi lateral del comercio, así como lo
            necesario para garanti zar la inocuidad de los
            productos de acuerdo a las legislaciones de cada
            destino.
        </p>


        <p class="principal-texto">
            A continuación, selecciona el al imento de tu interés, e
            indaga en información sobre los l ineamientos que rigen
            su cadena de producción, así como los requisitos
            legales y recomendaciones que te ayudarán a optimi zar
            tu proceso y a obtener las características de cal idad e
            inocuidad indispensables para su comercial i zación, ya
            sea a través del comercio interior o exterior.
        </p>

    </section>

    <section class="seleccionar-frutas">
        <div class="contenedor">
            <?php foreach ($resultado as $fila) { 
                $nombre = $fila['nombre'];
                $imagen = $fila['imagen'];
            ?>
                <div class="fruta">
                    <a href="#aguacate">
                        <img class="imagen-fruta" src="/code/imagenes/<?php echo $imagen; ?>" alt="Imagen de aguacate">
                        <p class="nombre-fruta"> <?php echo $nombre ?></p>
                    </a>

                </div>

            <?php } ?>

        </div>
    </section>




</main>

<?php

incluirTemplate('footer');
?>