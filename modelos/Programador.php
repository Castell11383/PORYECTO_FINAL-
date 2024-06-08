<?php
require_once 'Conexion.php';

class Programador extends Conexion{
    public $progra_codigo;
    public $progra_nombre;
    public $progra_apellido;
    public $progra_correo;
    public $progra_direccion;
    public $progra_telefono;
    public $progra_dependencia;
    public $progra_genero;

    public function __construct($args = [])
    {
        $this->progra_codigo = $args['progra_codigo'] ?? null;
        $this->progra_nombre = $args['progra_nombre'] ?? '';
        $this->progra_apellido = $args['progra_apellido'] ?? '';
        $this->progra_correo = $args['progra_correo'] ?? '';
        $this->progra_direccion = $args['progra_direccion'] ?? '';
        $this->progra_telefono = $args['progra_telefono'] ?? 0;
        $this->progra_dependencia = $args['progra_dependencia'] ?? '';
        $this->progra_genero = $args['progra_genero'] ?? '';
    }

    public function registrar(){
        $sql = "INSERT into programadores (progra_nombre, progra_apellido, progra_correo, progra_direccion, progra_telefono, progra_dependencia, progra_genero) values ('$this->progra_nombre','$this->progra_apellido','$this->progra_correo','$this->progra_direccion','$this->progra_telefono','$this->progra_dependencia','$this->progra_genero')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}