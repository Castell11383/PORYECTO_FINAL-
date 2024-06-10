<?php
require_once 'Conexion.php';

class Tarea extends Conexion{
    public $tarea_codigo;
    public $tarea_nombre;
    public $tarea_aplicacion;
    public $tarea_descripcion;

    public function __construct($args = [])
    {
        $this->tarea_codigo = $args['tarea_codigo'] ?? null;
        $this->tarea_nombre = $args['tarea_nombre'] ?? '';
        $this->tarea_aplicacion = $args['tarea_aplicacion'] ?? '';
        $this->tarea_descripcion = $args['tarea_descripcion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT into tarea (tarea_nombre, tarea_aplicacion, tarea_descripcion) values ('$this->tarea_nombre','$this->tarea_aplicacion','$this->tarea_descripcion')";
        
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function modificar()
    {
        $sql = "UPDATE tarea SET tarea_nombre = '$this->tarea_nombre', tarea_aplicacion = '$this->tarea_aplicacion', tarea_descripcion = '$this->tarea_descripcion' WHERE tarea_codigo= $this->tarea_codigo";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }


}