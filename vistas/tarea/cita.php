<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../../modelos/Programador.php';
require '../../modelos/Tarea.php';

$persona = new Programador();
$DatoProgramador = $persona->buscarPorId($_POST['progra_codigo']);

$tarea_codigo = $_POST['progra_codigo'];

$tareaAsignada = new Tarea();
$DatosTarea = $tareaAsignada->TareaAsignadaProgramador($tarea_codigo);

var_dump($DatosTarea);