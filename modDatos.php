<?php session_start();?>
<?php 

require 'conn.php';

$message = '';

$di = $_SESSION['user_id'];
if(!empty($_POST['ednombre']) || !empty($_POST['edapellido']) || !empty($_POST['edcorreo']) || !empty($_POST['edtelefono']) || !empty($_POST['region'])
|| !empty($_POST['comuna']) || !empty($_POST['direccion'])){
$sql = "UPDATE usuario SET nombre = enombre, apellido = eapellido, correo= ecorreo, telefono = etelefono WHERE id= $di";
$stm = $conn->prepare($sql);
$stm->bindParam('enombre', $_POST['ednombre']);
$stm->bindParam('eapellido', $_POST['edapellido']);
$stm->bindParam('ecorreo', $_POST['edcorreo']);
$stm->bindParam('etelefono', $_POST['edtelefono']);
if($stm->execute()){
    $message = 'Datos actualizados';
    echo json_encode(array('success' =>1, 'message' =>$message));
}
else{
    $message='Error!';
    echo json_encode(array('success' => 0 , 'message' =>$message));
}
}
?>