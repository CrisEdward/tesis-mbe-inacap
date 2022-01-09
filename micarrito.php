<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['user_id'])){
        header('Location: index.php');
    }
    else{
        // Estamos logueado    

        include('partials/header.php');

        $userId = $_SESSION['user_id'];

        $objeto = $_SESSION['producto'];
        
        if (isset($objeto)) {
            $json = array(
                'user_id'=> $userId,
                 'carrito' => array( 
                    'producto'=> $objeto
                 )
            );

        }
        

        echo json_encode($json);
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