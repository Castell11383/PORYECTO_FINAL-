<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Registro de Programadores</h1>
<div class="row justify-content-center">
    <form action="/crud_2024/controladores/cliente/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6 bg-dark bg-gradient text-light text-center">
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
                <input type="number" name="progra_edad" id="progra_edad" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="progra_telefono">Teléfono</label>
                <input type="tel" name="progra_telefono" id="progra_telefono" step="1" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="progra_depenencia">Dependencia</label>
                <input type="number" name="progra_depenencia" id="progra_depenencia" step="1" class="form-control" required>
            </div>
            <div class="col-4">
            <label for="progra_genero">Género</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Selecction</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
            </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <button type="submit" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-warning w-100 text-light">Buscar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>