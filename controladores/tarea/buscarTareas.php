<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Tarea.php';

try {
    $_POST['progra_codigo'] = htmlspecialchars($_POST['progra_codigo']);

    // var_dump($_POST);
    // exit;
    $id_programador =  $_POST['progra_codigo'];
 
    $objTarea = new Tarea();
    $tareas = $objTarea->TareaAsignadaProgramador($id_programador);

    $objTarea2 = new Tarea();
    $tareasAsignada = $objTarea2->TareasAsignadas($id_programador);

    $tarea = [
        'mensaje' => 'Datos encontrados',
        'codigo' => 1
    ];
} catch (Exception $e) {
    $tarea = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
} catch (PDOException $pe) {
    $tarea = [
        'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL REGISTRO A LA BD',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
}

$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php'; ?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$tarea['codigo']] ?>" role="alert">
        <?= $tarea['mensaje'] ?>
    </div>
</div>
<h1 class="text-center text-black">Listado de Tareas</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover text-center bg-dark bg-gradient text-light rounded shadow">
            <thead>
                <tr>
                    <th>Programador</th>
                    <th>Aplicacion</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tarea['codigo'] == 1 && count($tareas) > 0) : ?>
                    <?php
                    $nombre_completo = $tareas[0]['nombre_completo'];
                    $apli_nombre = $tareas[0]['apli_nombre'];
                    ?>
                    <tr>
                        <td><?= $nombre_completo ?></td>
                        <td><?= $apli_nombre ?></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>

        <table class="table table-bordered table-hover text-center bg-dark bg-gradient text-light rounded shadow mt-4">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tarea</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tarea['codigo'] == 1 && count($tareas) > 0) : ?>
                    <?php foreach ($tareas as $key => $tarea) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $tarea['tarea_descripcion'] ?></td>
                            <td><?= $tarea['tarea_estado'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">No hay Tareas registradas</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>

        <div class="row mb-4 justify-content-center">
            <div class="col-lg-3">
                <a href="../../vistas/tarea/seleccionarProgramador.php" class="btn btn-danger text-light w-100"><i class="bi bi-backspace-fill"></i> Volver</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../controladores/templates/footer.php'; ?>
