<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['user_id'])){
        header('Location: index.php');
    }
    else{
        // Estamos logueado    
        include('partials/header.php');

        // Obtengo sesiones
        $userId = $_SESSION['user_id'];
        $objeto = $_SESSION['producto'];
        $nomPro = $_POST['nombre'];
        $desPro = $_POST['descripcion'];
        $prePro= $_POST['precio'];
        // Genero arreglo de carrito
        

        if (!isset($_SESSION['carrito'])) {    
            $carrito = array(
                'user_id' => $userId,
                'carrito' => ''
            );
            json_encode($carrito);

        }
        
         echo 'nombre: ' . $nomPro . ' descripcion: ' . $desPro . 'prePro' . $prePro;

       /* $arr = json_decode($carrito, true);

        if (isset($objeto)) {
            $net['producto'] = $objeto;
            array_push( $arr['carrito'], $net);

          //  $_SESSION['producto'] = 'agregado';
            $_SESSION['carrito'] = $carrito;
        }

        echo json_encode($carrito);*/
?>
    <!-- Carrito HTML
    <div id="carrito">
        <div id="tarjeta">
        </div>
    </div>
    -->
<?php 
    }
?>