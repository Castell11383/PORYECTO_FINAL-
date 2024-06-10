<?php

require '../../modelos/Programador.php';

$_GET['progra_codigo'] = filter_var(base64_decode($_GET['progra_codigo']), FILTER_SANITIZE_NUMBER_INT);

$programador = new Programador();



$programadorRegistrado = $programador->buscarPorId($_GET['progra_codigo']);

?>

<?php include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center text-black">Formulario para modificar Programadores</h1>
<div class="row justify-content-center">
    <form action="../../controladores/programador/modificar.php" method="POST" class="border shadow rounded p-4 col-lg-6 bg-dark bg-gradient text-light text-center">

        <input type="hidden" name="progra_codigo" id="progra_codigo" value="<?= $programadorRegistrado['progra_codigo'] ?>">
        <div class="row mb-3">
            <div class="col-4">
                <label for="progra_nombre">Nombre</label>
                <input type="text" name="progra_nombre" id="progra_nombre" class="form-control">
            </div>
            <div class="col-4">
                <label for="progra_apellido">Apellido</label>
                <input type="text" name="progra_apellido" id="progra_apellido" class="form-control">
            </div>
            <div class="col-4">
                <label for="progra_dependencia">Dependencia</label>
                <input type="text" name="progra_dependencia" id="progra_dependencia" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <button type="submit" class="btn btn-success w-100">Modificar</button>
            </div>
            <div class="col-6">
                <a href="../../controladores/programador/buscar.php" class="btn btn-primary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>