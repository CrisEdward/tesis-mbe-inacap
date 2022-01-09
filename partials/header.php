<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    
  </head>
<body>
    <div class="container-fluid navbar-dark bg-primary ">
      <nav class="navbar navbar-expand-lg navbar-light container">
      <img src="img/mbe.png" width="30" height="30" alt="">
         <a class="navbar-brand" href="index.php">Mail Boxes Etc.</a>
        <div class="collapse navbar-collapse navbar-text" id="navbarNav">
        <ul class="navbar-nav d-flex">
         <!-- La sesión existe -->
<?php 
    
    if(isset($_SESSION['user_id'])){
?>
        <li class="nav-item">
            <a class="nav-link active" href="cerrarsesion.php">Cerrar sesion</a>
        </li>
<?php
    }
    else{
?>
<!-- La sesión no existe, mostramos el registro y login -->
        <li class="nav-item active">
            <a class="nav-link active"  href="login.php">Iniciar sesion </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="registro.php">Registrarse</a>
        </li>
<?php
    } 
?>

    </ul>
  </div>
  </nav> 
</div>

