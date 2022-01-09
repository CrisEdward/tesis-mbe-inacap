<?php session_start();?>
<?php 


require 'conn.php';

$message = '';

if(!empty($_POST['region']) || !empty($_POST['comuna']) || !empty($_POST['direccion'])){
    $message=$_POST['region'];
    $sql = "INSERT INTO direccion(direccion, comuna, region, id_cliente, id_tienda) VALUES (:direccion, :comuna, :region, :id_usuario, '0')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':region', $_POST['region']);
    $stmt->bindParam(':comuna', $_POST['comuna']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':id_usuario', $_SESSION['user_id']);
    if ($stmt->execute()) {
        $message = 'Direccion agregada correctamente';
        echo json_encode(array('success' =>1, 'message' =>$message));
      } else {
        $message = 'Lo sentimos, no se pudo agregar la direccion';
        echo json_encode(array('success' => 0, 'message' => $message));
      }
}
?>