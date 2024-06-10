<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require '../../modelos/Aplicacion.php';

try {
    $_GET['apli_nombre'] = htmlspecialchars($_GET['apli_nombre']);
    $_GET['apli_dependencia'] = htmlspecialchars($_GET['apli_dependencia']);

    
    $objAplicacion = new Aplicacion($_GET);
    $aplicaciones = $objAplicacion->buscar();
    $aplicacion = [
        'mensaje' => 'Datos encontrados',
        'codigo' => 1  
    ];

    

} catch (Exception $e) {
    $aplicacion = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
    
    // var_dump($_aplicacion);
    // exit;
     
} catch (PDOException $pe) {
    $aplicacion = [
        'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL REGISTRO A LA BD',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
}

$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$aplicacion['codigo']] ?>" role="alert">
        <?= $aplicacion['mensaje'] ?>
    </div>
</div>
<h1 class="text-center">Listado de Aplicaciones</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover text-center bg-dark bg-gradient text-light">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Dependencia</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($aplicacion['codigo'] == 1 && count($aplicaciones) > 0) : ?>
                    <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $aplicacion['apli_nombre'] ?></td>
                            <td><?= $aplicacion['apli_dependencia'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu bg-secondary bg-gradient text-light">
                                        <li><a class="dropdown-item" href=""></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href=""><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-device-ssd-fill"></i>Tareas</a></li>
                                    </ul>
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
                <a href="../../vistas/aplicacion/buscar.php" class="btn btn-danger text-light w-100"><i class="bi bi-backspace-fill"></i> Volver</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../controladores/templates/footer.php'; ?>