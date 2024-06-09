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

    public function buscar(...$columnas) {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM programadores where progra_situacion = 1 ";

        if($this->progra_nombre != ''){
            $sql .= " AND progra_nombre like '%$this->progra_nombre%' ";
        }
        if($this->progra_apellido != ''){
            $sql .= " AND progra_apellido like '%$this->progra_apellido%' ";
        }
        if($this->progra_dependencia != ''){
            $sql .= " AND progra_dependencia like '%$this->progra_dependencia%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarPorId($id){
     
        $sql = "SELECT * FROM programadores where progra_situacion = 1 and progra_codigo = $id ";

        $resultado = array_shift( self::servir($sql));
        return $resultado;
    }
    public function modificar(){
        $sql = "INSERT into programadores (progra_nombre, progra_apellido, progra_correo, progra_direccion, progra_telefono, progra_dependencia, progra_genero) values ('$this->progra_nombre','$this->progra_apellido','$this->progra_correo','$this->progra_direccion','$this->progra_telefono','$this->progra_dependencia','$this->progra_genero')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}