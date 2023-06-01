<?php
class Fruta {
    
    private $nombre;
    private $imagen;

    public function __construct($nombre, $imagen) {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
    }

    public function generarNombreImagenUnico() {
        $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";
        return $nombreImagen;
    }

    public function rutaImagenes(){
        $carpetaImagenes = __DIR__ . '/../imagenes/';

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        return $carpetaImagenes;
    }

    public function insertarEnBaseDeDatos() {
        $conexion = new \Tec\CultivaTec\classes\Conexion();
        $conexion->conectar();

        $tabla = 'frutas';

        // Generar el nombre único para la imagen
        $nombreImagenUnico = $this->generarNombreImagenUnico();

        $datos = array(
            'nombre' => $this->nombre,
            'imagen' => $nombreImagenUnico
        );

        $resultado = $conexion->insertarDatos($tabla, $datos);
        
        // Mover el archivo subido a la carpeta de destino
        $archivoTemporal = $this->imagen['tmp_name'];
        $rutaDestino = $this->rutaImagenes() . $nombreImagenUnico;
        
        move_uploaded_file($archivoTemporal, $rutaDestino);

        $conexion->desconectar();

        
            header('location: /inicio?resultado=1');
        
    }

    public function actualizarEnBaseDeDatos($nombreActual,$nuevoNombre, $nuevaImagen, $id) {
        $conexion = new \Tec\CultivaTec\classes\Conexion();
        $conexion->conectar();
    
        $tabla = 'frutas';
        $imagen =  $_FILES['imagen'];
        $nombreImagen = '';

        if ($imagen['name']) {
            
            unlink($this ->rutaImagenes() . $nombreActual);
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            move_uploaded_file($imagen['tmp_name'], $this->rutaImagenes() . $nombreImagen);
            
        } else {
            $nombreImagen = $nombreActual;
        }

        $datos = array(
            'nombre' => $nuevoNombre,
            'imagen' => $nombreImagen
        );
        
        $conexion->actualizar($tabla,$datos,"idfruta",$id);
    
        $conexion->desconectar();

        header('location: /inicio?resultado=1');
    }
    
    

    public function eliminar($id){
        $conexion = new \Tec\CultivaTec\classes\Conexion();
        $conexion->conectar();
        $conexion->eliminar("frutas","idfruta",$id);
        $conexion->desconectar();

    }
}
