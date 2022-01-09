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
    <form class="" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td><input type="text" name="nombre" placeholder="nombre del producto"> </td>
        </tr>
        <tr>
          <td><input type="text" name="descripcion" placeholder="descripcion del producto"> </td>
        </tr>
        <tr>
          <td><input type="number" name="precio" placeholder="precio"> </td>
        </tr>
        <tr>
          <td><input type="number" name="stock" placeholder="stock disponible"> </td>
        </tr>
        <tr>
          <td><input type="file" name="img"> </td>
        </tr>
        <tr>
          <td><input type="submit" name="agregar" value="agregar producto"> </td>
        </tr>
      </table>
    </form>
    <?php
    if (isset($_POST['agregar'])) {
      $message = '';

      if(!empty($_POST['nombre']) || !empty($_POST['descripcion']) || !empty($_POST['stock']) || !empty($_POST['valor']) || !empty($_POST['img'])){
          $records = $conn->prepare('SELECT id FROM tienda WHERE id_usuario = :id');
          $records->bindParam(':id', $_SESSION['user_id']);
          $records->execute();
          $results = $records->fetch(PDO::FETCH_ASSOC);
          $user = null;
          if (count($results) > 0) {
            $user = $results;
          }

          $sql = "INSERT INTO producto(nombre, descripcion, precio, stock, id_tienda) VALUES (:nombre, :descripcion, :precio, :stock, :id_tienda)";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nombre', $_POST['nombre']);
          $stmt->bindParam(':descripcion', $_POST['descripcion']);
          $stmt->bindParam(':stock', $_POST['stock']);
          $stmt->bindParam(':precio', $_POST['precio']);
          $stmt->bindParam(':id_tienda', $user['id']);
          if ($stmt->execute()) {
              $query = "SELECT id FROM `producto` ORDER by id DESC LIMIT 1";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              $results = $stmt->fetch(PDO::FETCH_ASSOC);
              $user = null;
              if (count($results) > 0) {
                $user = $results;
              }
              $img = file_get_contents($_FILES['img']['tmp_name']);
              $query = "INSERT INTO img_producto(img, id_producto) VALUES (:img, :id)";
              $stmt = $conn->prepare($query);
              $stmt->bindParam(':id', $user['id']);
              $stmt->bindParam(':img', $img);
              if ($stmt->execute()) {
                echo "Tambien guardo la imagen";
              } else {
                echo "fallo la imagen";
              }
              $message = 'Producto agregado correctamente';
              echo json_encode(array('success' =>1, 'message' =>$message));
            } else {
              $message = 'Lo sentimos, el producto no se pudo crear';
              echo json_encode(array('success' => 0, 'message' => $message));
            }
      } else {
        echo "rellene los campos";
      }
    }

     ?>

  </body>
</html>
