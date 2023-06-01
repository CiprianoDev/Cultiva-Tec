<?php
class norma{
    
    private $idnorma;
    private $nombreCorto;
    private $nombreLargo;
    private $contenido;
    private $link;
    private $idcaracter;
    private $idcomercio;
    private $idfruta;

    public function __construct($params = []) {
        $this->idnorma = $params['idnorma'];
        $this->nombreCorto = $params['nombreCorto'];
        $this->nombreLargo = $params['nombreLargo'];
        $this->contenido = $params['contenido'];
        $this->link = $params['link'];
        $this->idcaracter = $params['idcaracter'];
        $this->idcomercio = $params['idcomercio'];
        $this->idfruta = $params['idfruta'];
    }

    public function insertarEnBaseDeDatos() {
        $conexion = new \Tec\CultivaTec\classes\Conexion();
        $conexion->conectar();

        $tabla = 'norma';

        $datos = array(

            'nombreCorto' => $this->nombreCorto,
            'nombreLargo' => $this->nombreLargo,
            'contenido' => $this->contenido,
            'link' => $this->link,
            'idcaracter' => $this->idcaracter,
            'idcomercio' => $this->idcomercio,
            'idfruta' => $this->idfruta
                     
        );

        $resultado = $conexion->insertarDatos($tabla, $datos);

        $conexion->desconectar();

        
            header('location: /normas?resultado=1');
        
    }
    

    public function eliminar($id){
        $conexion = new \Tec\CultivaTec\classes\Conexion();
        $conexion->conectar();
        $conexion->eliminar("norma","idnorma",$id);
        $conexion->desconectar();

    }

    public function actualizarEnBaseDeDatos() {
        $conexion = new \Tec\CultivaTec\classes\Conexion();
        $conexion->conectar();

        $tabla = 'norma';

        $datos = array(
            'nombreCorto' => $this->nombreCorto,
            'nombreLargo' => $this->nombreLargo,
            'contenido' => $this->contenido,
            'link' => $this->link,
            'idcaracter' => $this->idcaracter,
            'idcomercio' => $this->idcomercio,
            'idfruta' => $this->idfruta
        );

        $campoCondicion = 'idnorma';
        $valorCondicion = $this->idnorma;

        $conexion->actualizar($tabla, $datos, $campoCondicion, $valorCondicion);

        $conexion->desconectar();

       
    }
}