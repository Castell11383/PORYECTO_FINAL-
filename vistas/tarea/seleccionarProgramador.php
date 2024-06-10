<?php

require_once '../../modelos/Programador.php';


$programadores_modelo = new Programador;
$programadores = $programadores_modelo->buscar();


include_once '../templates/header.php'; ?>

<h1 class="text-center text-black">Selecionar Programador</h1>
<div class="row justify-content-center">
    <form action="../../controladores/tarea/buscarTareas.php" method="POST" class="border shadow rounded p-4 col-lg-6 bg-dark bg-gradient text-light text-center">
        <div class="row mb-3">
            <div class="col">
                <label for="progra_codigo">Programador</label>
                <select name="progra_codigo" id="progra_codigo" class="form-select" aria-label="Default select example">
                    <option value="">Seleccione...</option>
                    <?php foreach ($programadores as $programador) : ?>
                        <option class="bg-secondary" value=" <?= $programador['progra_codigo'] ?>"> <?= $programador['progra_nombre'] . " " . $programador['progra_apellido']   ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-3"></div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100">Ver citas</button>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </form>
</div>
</form>
</div>
<?php include_once '../../vistas/templates/footer.php'; ?>