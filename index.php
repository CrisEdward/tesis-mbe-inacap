<?php include("conn.php")?>

<link rel="stylesheet" href="css/product-box.css">

<?php include("partials/header.php")?>

<div class="contenedor">
  <?php
  $query = "SELECT precio, nombre, img, id_producto, stock FROM producto INNER JOIN img_producto on producto.id = img_producto.id_producto";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  echo "<div id='productos'>";
  while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='product-box'>";
    $img = $arr['img'];
    echo '<div class="imgpro" ><img height="250px" width="200px" src="data:image/jpg; base64, '.base64_encode($img).'"/></div>';
    echo "<div class='namepro'><strong>".$arr['nombre']."</strong></div>";
    echo "<div class='stockpro'><label>Stock: </label> ".$arr['stock']."</div>";
    echo "<div class='preciopro'>$".$arr['precio']."</div>";
    echo '

      <form action="producto.php" class="fors" method="get">
        <input type="hidden" name="producto" value="'.$arr["id_producto"].'">
        <div class="formpro">
        <input type="submit" class="botonpro" value="ver producto">
        </div>
      </form>

    ';
    echo "</div>";

 }
 echo "</div>";
   ?>
</div>

<?php include("partials/footer.php")?>
