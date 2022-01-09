<?php
  session_start();
  include('conn.php');
  include('partials/header.php');
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="contenedor">
      <div class="menu-lateral">
        <form action="crearproducto.php" method="post">
          <input type="submit" name="agregar" value="agregar producto">
        </form>
      </div>

    </div>

  </body>
</html>
