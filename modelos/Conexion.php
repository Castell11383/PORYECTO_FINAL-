<?php

abstract class Conexion{
    protected static $conexion = null;

    public static function connectar() : PDO{
        if(!self::$conexion){

            try {
                self::$conexion = new PDO("informix:host=host.docker.internal; service=9088;database=cia_programadores; server=informix; protocol=onsoctcp;EnableScrollableCursors=1", "informix", "in4mix");
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // echo "conexion exitosa";

            } catch (PDOException $e) {
                echo "No hay conexion a la BD";
                echo $e->getMessage();
                self::$conexion = null;
                exit;
            }
        }

        return self::$conexion;
    }

    public function ejecutar($sql){
        $conexion = self::connectar();
        $sentencia = $conexion->prepare($sql);
        $resultado = $sentencia->execute();
        $idInsertado = $conexion->lastInsertId();
        return [
            "resultado" => $resultado,
            "id" => $idInsertado
        ];
        
    }

    public function servir($sql){
        $conexion = self::connectar();
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);    

        $datos = [];
        foreach ($data as $k => $v) {
            $datos[] = array_change_key_case($v, CASE_LOWER);
        }
    

        return $datos;
        
    }

}