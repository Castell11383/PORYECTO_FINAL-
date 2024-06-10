<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Tarea.php';

try {
    $_GET['tarea_nombre'] = htmlspecialchars($_GET['tarea_nombre']);
    $_GET['tarea_aplicacion'] = htmlspecialchars($_GET['tarea_aplicacion']);
    $_GET['tarea_descripcion'] = htmlspecialchars($_GET['tarea_descripcion']);
    $_GET['tarea_estado'] = filter_var($_GET['tarea_estado'], FILTER_VALIDATE_INT);


    $objTarea = new Tarea();
    $tareas = $objTarea->MostrarTarea();

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
<h1 class="text-center">Listado de Tareas</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover text-center bg-dark bg-gradient text-light rounded shadow">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Programador</th>
                    <th>Aplicacion</th>
                    <th>Tarea</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tarea['codigo'] == 1 && count($tareas) > 0) : ?>
                    <?php foreach ($tareas as $key => $tarea) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $tarea['nombre_completo'] ?></td>
                            <td><?= $tarea['apli_nombre'] ?></td>
                            <td><?= $tarea['tarea_descripcion'] ?></td>
                            <td><?= $tarea['tarea_estado'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <form action="../../controladores/tarea/eliminar.php" method="GET" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta aplicación?');">
                                        <input type="hidden" name="tarea_codigo" value="<?= base64_encode($tarea['tarea_codigo']) ?>">
                                        <button class="btn btn-warning" type="submit"><i class="bi bi-trash me-2"></i>Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No hay Aplicaciones registrados</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-3">
                <a href="../../vistas/tarea/buscar.php" class="btn btn-danger text-light w-100"><i class="bi bi-backspace-fill"></i> Volver</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../controladores/templates/footer.php'; ?>