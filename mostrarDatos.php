<?php session_start();?>

<?php

require 'conn.php';
$ad = $_SESSION['user_id'];
$mensaje ='';
$sql= "SELECT * FROM direccion WHERE id_cliente = $ad";
$star = $conn->prepare($sql);
$star->execute();
$resultado = $star->fetch(PDO::FETCH_ASSOC);
$usuario = null;
if (count($resultado) > 0) {
$usuario = $resultado;
}
else{
    echo 'no hay direcciones';
}

$query = "SELECT * FROM usuario WHERE id = $ad";
$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$user = null;
if (count($results) > 0) {
$user = $results;
}
?>
<link rel="stylesheet" href="css/form.css">
<div id="editarInfo">
    <form id="modDatos" method="POST">
      <table>
          <tr><td></td><td><label id="tituloDatos">Mis Datos</label></td></tr>
          <tr><td><label class="lblEdit">Nombre: </label></td>
            <td><input type="text" name="ednombre" class="formEdit" id="editNombre" value="<?php echo $user['nombre'];?>"></td>
        </tr>
        <tr><td><label class="lblEdit">Apellido: </label></td>
            <td><input type="text" name="edapellido" class="formEdit" id="editApellido" value="<?php echo $user['apellido']; ?>"></td>
        </tr>
        <tr><td><label class="lblEdit">Correo:</label> </td>
            <td><input type="text" name="edcorreo" class="formEdit" id="editCorreo" value="<?php echo $user['correo']; ?>"></td>
        </tr>
        <tr><td><label class="lblEdit">Telefono: </label></td>
            <td><input type="text" name="edtelefono" class="formEdit" id="editTelefono" value="<?php echo $user['telefono']; ?>"></td>
        </tr>
        <tr><td><label class="lblEdit">Region: </label></td>
            <td><input type="text" class="formEdit" id="editRegion" value="<?php echo $usuario['region']; ?>"></td>
        </tr>
        <tr><td><label class="lblEdit">Comuna: </label> </td>
            <td><input type="text" class="formEdit" id="editComuna" value="<?php echo $usuario['comuna']; ?>"></td>
        </tr>
        <tr><td><label class="lblEdit">Direccion: </label></td>
            <td><input type="text" class="formEdit" id="editDireccion" value="<?php echo $usuario['direccion']; ?>"></td>
        </tr>
        <tr><td></td>
        </tr>
      </table>
    </form>
</div>
<script type="text/javascript">
     $(document).ready(function(){
         $("#modDatos").submit(function(event){
             event.preventDefault();
             $.ajax({
                 type:"post",
                 url: "modDatos.php",
                 data: $(this).serialize(),
                 success: function(response){

                     var json_data = JSON.parse(response);
                     alert(json_data.message);
                 }
             })
         })
     })
</script>
