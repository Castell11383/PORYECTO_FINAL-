<?php include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">Registro de Tarea</h1>
<div class="row justify-content-center">
    <form action="../../controladores/tarea/buscar.php" method="GET" class="border bg-dark bg-gradient text-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col text-center">
                <label for="tarea_aplicacion">Nombre de la Aplicacion</label>
                <input type="text" name="tarea_aplicacion" id="tarea_aplicacion" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3"></div>
            <div class="col-6">
                <button type="submit" class="btn btn-warning w-100"><i class="bi bi-search me-2"></i>Buscar</button>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/header.php'; ?>