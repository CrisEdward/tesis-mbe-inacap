
<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /proyectov2/index.php');
?>