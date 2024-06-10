<?php include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center text-black">Busqueda de Programadores</h1>
<div class="row justify-content-center text-center">
    <form action="../../controladores/programador/buscar.php" method="GET" class="border bg-dark bg-gradient text-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="progra_nombre">Nombre del Programador</label>
                <input type="text" name="progra_nombre" id="progra_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="progra_apellido">Apellido del Programador</label>
                <input type="text" name="progra_apellido" id="progra_apellido" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="progra_dependencia">Dependencia</label>
                <input type="text" name="progra_dependencia" id="progra_dependencia" class="form-control">
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

<?php include_once '../../vistas/templates/footer.php'; ?>