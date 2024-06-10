<?php 
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/Tarea.php';

    $_POST['tarea_nombre'] = htmlspecialchars( $_POST['tarea_nombre']);
    $_POST['tarea_aplicacion'] = htmlspecialchars( $_POST['tarea_aplicacion']);
    $_POST['tarea_descripcion'] = htmlspecialchars( $_POST['tarea_descripcion']);
    
    if($_POST['tarea_nombre'] == '' || $_POST['tarea_aplicacion'] == '' || $_POST['tarea_descripcion'] == ''){
        
        $resultado = [
            'mensaje' => 'DEBE VALIDAR LOS DATOS',
            'codigo' => 2
        ];
    }else{
        try {
            
            $aplicacion = new Tarea($_POST);
            $guardar = $aplicacion->guardar();
            $resultado = [
                'mensaje' => 'APLICACION INSERTADA CORRECTAMENTE',
                'codigo' => 1
            ];
            
        } catch (PDOException $pe){
            $resultado = [
                'mensaje' => 'OCURRIO UN ERROR INSERTANDO LA APLICACION EN LA BD',
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
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-5"></div>
        <div class="col-lg-2">
            <a href="../../vistas/tarea/asignar.php" class="btn btn-primary w-100"><i class="bi bi-backspace-fill"></i >Volver</a>
        </div>
        <div class="col-5"></div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  