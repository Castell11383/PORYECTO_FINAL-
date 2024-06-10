<?php
require_once 'Conexion.php';

class Cita extends Conexion{
    public $cita_codigo;
    public $cita_fecha;
    public $cita_nombre;
    public $cita_aplicacion;
    public $cita_tarea;
    public $cita_situacion;

    public function __construct($args = [])
    {
        $this->cita_codigo = $args['cita_codigo'] ?? null;
        $this->cita_fecha = $args['cita_fecha'] ?? null;
        $this->cita_nombre = $args['cita_nombre'] ?? null;
        $this->cita_aplicacion = $args['cita_aplicacion'] ?? null;
        $this->cita_tarea = $args['cita_tarea'] ?? null;
        $this->cita_situacion = $args['cita_situacion'] ?? 1;
    }

}