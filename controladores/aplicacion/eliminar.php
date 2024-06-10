<?php

    require '../../modelos/Aplicacion.php';
    
    $_GET['apli_codigo'] = filter_var( base64_decode($_GET['apli_codigo']), FILTER_SANITIZE_NUMBER_INT);

    try{
        
        $aplicacion = new Aplicacion($_GET);
        $eliminar = $aplicacion->eliminar();

        $resultado = [
            'mensaje' => 'PRODUCTO ELIMINADO CORRECTAMENTE',
            'codigo' => 1
        ];

    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL REGISTRO A LA BD',
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

        

$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-3">
        <a href="../../controladores/aplicacion/buscar.php" class="btn btn-danger text-light w-100"><i class="bi bi-backspace-fill"></i> Volver</a>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>  
