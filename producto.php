<?php
  session_start();
  include("conn.php");
  include("partials/header.php");


  $dominio = $_SERVER["REQUEST_URI"];
  $idproducto = explode("producto=",$dominio);

  $query = "SELECT * FROM producto where id = ".$idproducto[1]." ";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $producto = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!$producto){
    echo "<h2>Producto no encontrado</h2>";
  }else{


  $query = "SELECT * FROM img_producto where id_producto = ".$idproducto[1]." ";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $imgproducto = $stmt->fetch(PDO::FETCH_ASSOC);
  
$_SESSION['producto'] = $producto;


 ?>
 <link rel="stylesheet" href="css/master.css">
 <link rel="stylesheet" href="css/producto.css">


 <div class="contenedor">
   <div class="producto">
     <div class="img">
       <img height="250px" width="200px" src="data:image/jpg; base64, <?php echo base64_encode($imgproducto['img']);?>"/>
     </div>
     <div class="info">
       <form class="" action="micarrito.php" method="post">
         
         <div class="nombre"><h3><?php echo $producto['nombre']; ?></h3></div>
         <div class="valor"> <label>PRECIO: $</label> <?php echo $producto['precio'];?> </div>
         <div class="cantpro">
           <div class="stock margen"> <label>STOCK DISPONIBLE: </label> <?php echo $producto['stock']; ?> </div>

           <div class="cantidad margen"> <input type="number" min="1" max="<?php echo $producto['stock']; ?>"> </div>
           <div class="agregarcarro margen"> <input type="submit" name="" value="Agregar al Carro"> </div>

         </div>
       </form>
     </div>
   </div>

   <div class="descripcion">
     <h2>DESCRIPCION DEL PRODUCTO</h2>
     <hr>
     <p><?php echo $producto['descripcion']; ?></p>
    </div>
   <div class="comentar">
     <form class="" action="index.html" method="post">
       <textarea name="comentario" rows="5" cols="50"> </textarea>
       <input type="submit" name="" value="comentar">
     </form>

   </div>
   <div class="comentarios">

   </div>
 </div>






  <?php
    }
  include("partials/footer.php");
  ?>
