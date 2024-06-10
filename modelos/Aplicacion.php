<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $apli_codigo;
    public $apli_nombre;
    public $apli_dependencia;
    public $apli_descripcion;

    public function __construct($args = [])
    {
        $this->apli_codigo = $args['apli_codigo'] ?? null;
        $this->apli_nombre = $args['apli_nombre'] ?? null;
        $this->apli_dependencia = $args['apli_dependencia'] ?? '';
        $this->apli_descripcion = $args['apli_descripcion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT into aplicacion (apli_nombre, apli_dependencia, apli_descripcion) values ('$this->apli_nombre','$this->apli_dependencia','$this->apli_descripcion')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
    
    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM aplicacion where apli_situacion = 1 ";

        if($this->apli_nombre != ''){
            $sql .= " AND apli_nombre like '%$this->apli_nombre%' ";
        }
        if($this->apli_dependencia != ''){
            $sql .= " AND apli_dependencia like '%$this->apli_dependencia%' ";
        }
        if($this->apli_descripcion != ''){
            $sql .= " AND apli_descripcion like '%$this->apli_descripcion%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE aplicacion SET apli_situacion = 0 WHERE apli_codigo = $this->apli_codigo";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

}