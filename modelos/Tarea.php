<?php
require_once 'Conexion.php';

class Tarea extends Conexion
{
    public $tarea_codigo;
    public $tarea_nombre;
    public $tarea_estado;
    public $tarea_aplicacion;
    public $tarea_descripcion;


    public function __construct($args = [])
    {
        $this->tarea_codigo = $args['tarea_codigo'] ?? null;
        $this->tarea_nombre = $args['tarea_nombre'] ?? '';
        $this->tarea_aplicacion = $args['tarea_aplicacion'] ?? '';
        $this->tarea_estado = $args['tarea_estado'] ?? '';
        $this->tarea_descripcion = $args['tarea_descripcion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT into tarea (tarea_nombre, tarea_aplicacion, tarea_estado, tarea_descripcion) values ('$this->tarea_nombre','$this->tarea_aplicacion', '$this->tarea_estado','$this->tarea_descripcion')";

        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function buscar(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM tarea where tarea_situacion = 1 ";

        if ($this->tarea_nombre != '') {
            $sql .= " AND tarea_nombre like '%$this->tarea_nombre%' ";
        }
        if ($this->tarea_aplicacion != '') {
            $sql .= " AND tarea_aplicacion like '%$this->tarea_aplicacion%' ";
        }
        if ($this->tarea_descripcion != '') {
            $sql .= " AND tarea_descripcion like '%$this->tarea_descripcion%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function MostrarTarea()
    {
        $sql = "SELECT progra_nombre || ' ' || progra_apellido AS nombre_completo, apli_nombre, tarea_descripcion, tarea_estado, tarea_codigo FROM tarea INNER JOIN programadores ON  tarea_nombre = progra_codigo INNER JOIN aplicacion ON  tarea_aplicacion = apli_codigo WHERE tarea_situacion = 1;";
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function TareaAsignadaProgramador($id_programador)
    {
        $sql = "SELECT tarea_codigo, progra_nombre || ' ' || progra_apellido AS nombre_completo, apli_nombre, tarea_descripcion, tarea_estado, tarea_codigo
                FROM tarea INNER JOIN programadores ON  tarea_nombre = progra_codigo
                INNER JOIN aplicacion ON  tarea_aplicacion = apli_codigo
                WHERE tarea_situacion = 1 ";

        if ($id_programador != '') {
            $sql .= " AND tarea_nombre = $id_programador ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function TareasAsignadas($id_programador)
    {
        $sql = "SELECT tarea_descripcion, tarea_estado
                FROM tarea 
                WHERE tarea_situacion = 1 AND tarea_nombre = 1 ";

        if ($id_programador != '') {
            $sql .= " AND tarea_nombre = $id_programador ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE tarea SET tarea_situacion = 0 WHERE tarea_codigo = $this->tarea_codigo";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }
}
