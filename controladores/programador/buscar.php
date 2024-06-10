<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require '../../modelos/Programador.php';

try {
    $_GET['progra_nombre'] = htmlspecialchars($_GET['progra_nombre']);
    $_GET['progra_apellido'] = htmlspecialchars($_GET['progra_apellido']);
    $objProgramador = new Programador($_GET);
    $programadores = $objProgramador->buscar();
    $programador = [
        'mensaje' => 'Datos encontrados',
        'codigo' => 1
    ];

} catch (Exception $e) {
    $programador = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
} catch (PDOException $pe) {
    $programador = [
        'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL REGISTRO A LA BD',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$programador['codigo']] ?>" role="alert">
        <?= $programador['mensaje'] ?>
    </div>
</div>
<h1 class="text-center text-black">Listado de Programadores</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover text-center bg-dark bg-gradient text-light">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dependencia</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($programador['codigo'] == 1 && count($programadores) > 0) : ?>
                    <?php foreach ($programadores as $key => $programador) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $programador['progra_nombre'] ?></td>
                            <td><?= $programador['progra_apellido'] ?></td>
                            <td><?= $programador['progra_dependencia'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu bg-secondary bg-gradient text-light">
                                        <li><a class="dropdown-item" href="../../vistas/programador/modificar.php?progra_codigo=<?= base64_encode($programador['progra_codigo'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/programador/eliminar.php?progra_codigo=<?= base64_encode($programador['progra_codigo'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-device-ssd-fill"></i>Tareas</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No hay programdores registrados</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-3">
                <a href="../../vistas/programador/buscar.php" class="btn btn-danger text-light w-100"><i class="bi bi-backspace-fill"></i> Volver</a>
            </div>
        </div>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>