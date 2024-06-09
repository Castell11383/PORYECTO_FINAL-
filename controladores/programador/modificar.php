<?php

require '../../modelos/Programador.php';

$_POST['progra_nombre'] = htmlspecialchars($_POST['progra_nombre']);
$_POST['progra_apellido'] = htmlspecialchars($_POST['progra_apellido']);
// $_POST['progra_edad'] = filter_var($_POST['progra_edad'], FILTER_VALIDATE_INT);
// $_POST['progra_correo'] = filter_var($_POST['progra_correo'], FILTER_VALIDATE_EMAIL);
// $_POST['progra_direccion'] = htmlspecialchars($_POST['progra_direccion']);
// $_POST['progra_telefono'] = filter_var($_POST['progra_telefono'], FILTER_VALIDATE_INT);
$_POST['progra_dependencia'] = htmlspecialchars($_POST['progra_dependencia']);
// $_POST['progra_genero'] = filter_var($_POST['progra_genero'], FILTER_VALIDATE_INT);

if ($_POST['progra_nombre'] == '' || $_POST['progra_apellido'] == '' || $_POST['progra_dependencia'] == '') {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];

    // var_dump($_POST);
    // exit;

} else {
    try {

        $programador = new Programador($_POST);

        $modificar = $programador->modificar();

        $resultado = [
            'mensaje' => 'EL PROGRAMADOR HA SIDO MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO A EL PROGRAMADOR EN LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];

    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}

$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-3">
        <a href="../../vistas/programador/buscar.php" class="btn btn-danger text-light w-100"><i class="bi bi-backspace-fill"></i> Volver</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>x