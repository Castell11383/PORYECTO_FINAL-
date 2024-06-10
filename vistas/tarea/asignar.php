<?php

require_once '../../modelos/Programador.php';
require_once '../../modelos/Aplicacion.php';

$programadores_modelo = new Programador;
$programadores = $programadores_modelo->buscar();
$aplicacion_modelo = new Aplicacion;
$aplicaciones = $aplicacion_modelo->buscar();

include_once '../templates/header.php'; ?>

<h1 class="text-center">Asignar Programador</h1>
<div class="row justify-content-center">
    <form action="../../controladores/tarea/guardar.php" method="POST" class="border shadow rounded p-4 col-lg-6 bg-dark bg-gradient text-light text-center">
        <div class="row mb-3">
            <div class="col-4">
                <label for="tarea_nombre">Programador</label>
                <select name="tarea_nombre" id="tarea_nombre" class="form-select" aria-label="Default select example">
                    <option value="#">Seleccione...</option>
                    <?php foreach ($programadores as $programador) : ?>
                        <option class="bg-secondary" value=" <?= $programador['progra_codigo'] ?>"> <?= $programador['progra_nombre'] . " " . $programador['progra_apellido']   ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-4">
                <label for="tarea_aplicacion">Aplicacion</label>
                <select name="tarea_aplicacion" id="tarea_aplicacion" class="form-select" aria-label="Default select example">
                    <option value="#">Seleccione...</option>
                    <?php foreach ($aplicaciones as $aplicacion) : ?>
                        <option class="bg-secondary" value="  <?= $aplicacion['apli_codigo'] ?>"> <?= $aplicacion['apli_nombre']   ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-4 dropdown">
                <label for="tarea_estado">Estado</label>
                <select name="tarea_estado" id="tarea_estado" class="form-select" aria-label="Default select example">
                    <option selected>Selecione...</option>
                    <option value="1" >Iniciada</option>
                    <option value="2">Finalizada</option>
                    <option value="3">Pendiente</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tarea_descripcion">Tarea</label>
                <input type="name" name="tarea_descripcion" id="tarea_descripcion" class="form-control" required>
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
<?php include_once '../templates/footer.php'; ?>>