<?php

namespace Tec\CultivaTec\classes;

use Tec\CultivaTec\classes\Conexion;

class Usuario {

    private int $usuario_id;
    private string $usuario_nombre;
    private string $usuario_correo;
    private string $usuario_contra;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function getUsuarioContra() {
        $conexion = new Conexion();
        $conexion->conectar();

        $sql = "SELECT usuario_contra FROM usuarios WHERE usuario_nombre='" . $this->usuario_nombre . "'";
        $resultado = $conexion->ejecutarConsulta($sql);
        $conexion->desconectar();

        return $resultado;

    }

    public function validarUsuario() {
    }
}