<?php

namespace Tec\CultivaTec\classes;

use Tec\CultivaTec\classes\Conexion;

class Usuario {

    private int $usuario_id;
    private string $usuario_nombre;
    private string $usuario_correo;
    private string $usuario_contra;

    public function __construct(string $usuario_nombre, string $usuario_contra) {
        $this->usuario_nombre = $usuario_nombre;
        $this->usuario_contra = $usuario_contra;
    }

    public function __get(string $atributo) {
        return $this->$atributo;
    }

    public function __set(string $atributo, $valor) {
        $this->$atributo = $valor;
    }

    /**
     * Ejecuta una consulta a la base de datos y devuelve un string con el valor de la contraseña del usuario
     * @return string Contraseña del usuario
     */
    private function getUsuarioContra(): string {
        $conexion = new Conexion();
        $conexion->conectar();

        $sql = "SELECT usuario_contra FROM usuarios WHERE usuario_nombre='" . $this->usuario_nombre . "'";
        $resultado = $conexion->ejecutarConsulta($sql);
        $conexion->desconectar();

        return $resultado[0]['usuario_contra'];

    }

    public function validarUsuario() {
        $contra_hash = $this->getUsuarioContra();

        if ($this->contraCorrecta($contra_hash)) {
            session_start();
            $_SESSION['usuario_nombre'] = $this->usuario_nombre;
            echo json_encode("autorizado");

        } else {
            echo json_decode("error: No autorizado");
        }
    }
    
    private function contraCorrecta(string $contra_hash): bool {
        return password_verify($this->usuario_contra, $contra_hash);
    }
}