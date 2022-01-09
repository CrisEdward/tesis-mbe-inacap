<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['user_id'])){
        header('Location: index.php');
    }
    else{
        // Estamos logueado    

        include('partials/header.php');

        $userId = $_SESSION['user_id'];

        $objeto = $POST['producto'];
        
        if (isset($objeto)) {
            $json = {
                "user_id": $userId,
                "carrito:" {
                    "producto": $objeto
                }
            }

            json_encode($json);
        }
        

        echo json_decode($json);
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