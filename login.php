<?php session_start();?>
<?php include("conn.php")?>

<?php include("partials/header.php")?>

<?php



if (isset($_SESSION['user_id'])) {
  header('Location: /Proyectov2/home.php');
}
require 'conn.php';

if (!empty($_POST['email']) || !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, correo, nombre, apellido, password FROM usuario WHERE correo = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: /proyectov2/home.php");
  } else {
    $message = 'Datos erroneos!';
  }
}

?>
<div id="contenedor">
    
    <br>
    <br>
    <div id="log-datos">
    <?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>
      
        
<link rel="stylesheet" href="css/registrar.css">
<div class="registro">

<form action="login.php" method="POST" class="formulario" style="border: 1px solid">
    <h2 id="hLogin">Login</h2><br>
   
      <input type="text" name="email" class="txtRegistro" >
      <label class="lblRegistro">Correo</label>
      <br>
      <input type="password" name="password" class="txtRegistro">
      <label class="lblRegistro">Contraseña</label>
      <br>
 
      <input type="submit" name="btnLogin" value="Iniciar" id="btnLogin">
</form>

<script src="js/regForm.js"></script>
</div>

      </div>
</div>



<?php include("partials/footer.php")?>