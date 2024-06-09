<?php

require '../../modelos/Programador.php';

$_GET['progra_codigo'] = filter_var(base64_decode($_GET['progra_codigo']), FILTER_SANITIZE_NUMBER_INT);

$programador = new Programador();



$programadorRegistrado = $programador->buscarPorId($_GET['progra_codigo']);
// var_dump($programadorRegistrado);
?>

<?php include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">Formulario para modificar Programadores</h1>
<div class="row justify-content-center">
    <form action="../../controladores/programador/modificar.php" method="POST" class="border shadow rounded p-4 col-lg-6 bg-dark bg-gradient text-light text-center">
        <div class="row mb-3">
            <div class="col-5">
                <label for="progra_nombre">Nombre</label>
                <input type="text" name="progra_nombre" id="progra_nombre" class="form-control" required>
            </div>
            <div class="col-5">
                <label for="progra_apellido">Apellido</label>
                <input type="text" name="progra_apellido" id="progra_apellido" class="form-control" required>
            </div>
            <div class="col-2">
                <label for="progra_edad">Edad</label>
                <input type="number" name="progra_edad" id="progra_edad" step="1" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="progra_correo">Correo</label>
                <input type="email" name="progra_correo" id="progra_correo" class="form-control" required>
            </div>
            <div class="col-6">
                <label for="progra_direccion">Direccion</label>
                <input type="text" name="progra_direccion" id="progra_direccion" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="progra_telefono">Teléfono</label>
                <input type="number" name="progra_telefono" id="progra_telefono" step="1" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="progra_dependencia">Dependencia</label>
                <input type="text" name="progra_dependencia" id="progra_dependencia" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="progra_genero">Género</label>
                <select id="progra_genero" name="progra_genero" class="form-select" aria-label="Default select example" required>
                    <option value="" disabled selected>Seleccione</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <button type="submit" class="btn btn-success w-100">Modificar</button>
            </div>
            <div class="col-6">
                <a href="../../controladores/programador/modificar.php" class="btn btn-primary w-100">Cancelar</a>
            </div>           
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>