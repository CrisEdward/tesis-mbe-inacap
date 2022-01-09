<?php
    session_start();
    require 'conn.php';

    $message = '';
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descripcion'];
    $id = $_SESSION['user_id'];
    if(!empty($nombre) || !empty($descrip)){
        $sql = "INSERT INTO tienda(nombre, descripcion, id_usuario) VALUES ('$nombre', '$descrip', '$id')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "<a href='mitienda.php' > mi tienda </a>";

        if ($stmt->execute()) {
            header('Location: /proyectov2/mitienda.php');
            echo json_encode(array('success' =>1, 'message' =>$message));
          } else {
            $message = 'Lo sentimos, no se pudo agregar la direccion';
            echo json_encode(array('success' => 0, 'message' => $message));
          }
    }




 ?>
