<?php
require './code/functions/incluirTemplate.php';
incluirTemplate('header');
?>

<body>

    <div class="formulario__login">
        <h2>Iniciar Sesión</h2>
        <form class="formulario" action="" method="post" id="formulario">

            <fieldset>
                <legend for="">Ingresa Tus Datos:</legend>
                <br>

                <legend for="">Usuario:</legend>
                <input type="text" name="usuario_nombre" id="usuario_nombre">

                <br>

                <legend for="">Contraseña:</legend>
                <br>
                <input type="password" name="usuario_contra" id="usuario_contra">

                <br>
                <input class="boton" type="submit" value="Ingresar">
            </fieldset>

        </form>

    </div>


    <?php

    incluirTemplate('footer');
    ?>
    <script src="/code/js/inicio_sesion.js"></script>
</body>

</html>