<?php session_start();?>
<?php include("conn.php")?>
<?php

require 'conn.php';

$message = '';


  if (!empty($_POST['nombre']) || !empty($_POST['apellido']) || !empty($_POST['email']) || !empty($_POST['telefono']) || !empty($_POST['password'])) {
    $sql = "INSERT INTO usuario (correo, nombre, apellido, telefono, calificacion, password, tipo) VALUES (:email, :nombre, :apellido, :telefono, '7', :password, '1')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado correctamente';
    } else {
      $message = 'Lo sentimos, no se pudo registrar el usuario';
    }
}
?>
<?php include("partials/header.php")?>
<link rel="stylesheet" href="css/registrar.css">
<div class="contenedor"">

  <?php if (!empty($message)):    ?>

    <div class="alert alert-success" role="alert" style="text-align:center;">
      <?=  $message  ?>

     <?php endif; ?>
</div>

    <div class="registro">

      <form action="registro.php" method="POST" class="formulario" style="border: 1px solid">
          <h2 id="h1Registro">Registrese</h2><br>

            <input type="text" name="nombre" class="txtRegistro" >
            <label class="lblRegistro">Nombre</label>
            <br>
            <input type="text" name="apellido" class="txtRegistro">
            <label class="lblRegistro">Apellido</label>
            <br>
            <input type="text" name="email" class="txtRegistro">
            <label class="lblRegistro">Correo</label>
            <br>
            <input type="text" name="telefono" class="txtRegistro">
            <label class="lblRegistro">Telefono</label>
            <br>
            <input type="password" name="password" class="txtRegistro">
            <label class="lblRegistro">Contraseña</label>
            <br>
            <input type="submit" name="btnRegistrar" value="Registrar" id="btnRegistro">
      </form>

      <script src="js/regForm.js"></script>
    </div>

  </div>

<?php include("partials/footer.php")?>
