<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Registro de Aplicaciones</h1>
<div class="row justify-content-center">
    <form action="../../controladores/aplicacion/guardar.php" method="POST" class="border shadow rounded p-4 col-lg-6 bg-dark bg-gradient text-light text-center">
        <div class="row mb-3">
            <div class="col-6">
                <label for="apli_nombre">Nombre</label>
                <input type="text" name="apli_nombre" id="apli_nombre" class="form-control" required>
            </div>
            <div class="col-6">
                <label for="apli_dependencia">Dependencia</label>
                <input type="text" name="apli_dependencia" id="apli_dependencia" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="apli_descripcion">Descripcion</label>
                <input type="name" name="apli_descripcion" id="apli_descripcion" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3"></div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
</div>
</form>
</div>
<?php include_once '../templates/footer.php'; ?>