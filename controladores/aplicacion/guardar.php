<?php 
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/Aplicacion.php';

    $_POST['apli_nombre'] = htmlspecialchars( $_POST['apli_nombre']);
    $_POST['apli_dependencia'] = htmlspecialchars( $_POST['apli_dependencia']);
    $_POST['apli_descripcion'] = htmlspecialchars( $_POST['apli_descripcion']);

    // print_r($_POST);
    // exit;    
    if($_POST['apli_nombre'] == '' || $_POST['apli_dependencia'] == '' || $_POST['apli_descripcion'] == ''){
        
        $resultado = [
            'mensaje' => 'DEBE VALIDAR LOS DATOS',
            'codigo' => 2
        ];
    }else{
        try {
            
            $aplicacion = new Aplicacion($_POST);
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
            <a href="../../vistas/aplicacion/registar.php" class="btn btn-primary w-100"><i class="bi bi-backspace-fill"></i >Volver</a>
        </div>
        <div class="col-5"></div>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  