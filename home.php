<?php session_start();?>
<?php include("conn.php")?>

<?php include("partials/header.php")?>
<?php

  require 'conn.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, correo, nombre, apellido, password FROM usuario WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
  ?>


  <?php if(!empty($user)): ?>
    <div id="msjBienvenida">
    <br> Bienvenido <?= $user['nombre'],' ', $user['apellido']; ?>
    <br>Usted esta logeado corrrectamente
    <a href="cerrarsesion.php">
      Cerrar sesion
    </a>
    </div>
  <?php else: ?>
    <h1>Por favor inicie sesion o registrese</h1>
  <?php endif; ?>
  <link rel="stylesheet" href="css/home.css">
  <div class="contenedor" id="contenedor">
    <div class="tittle" id="titulo">
        <h3>Mi Cuenta</h3>
    </div>
        <div id="botones">
            <ul>
                <button class="botonMenu" id="historial">Historial De Compras</button>
                <button class="botonMenu" id="btnDirecciones">Direcciones</button>
                <button class="botonMenu" id="menotdopago">Metodo de Pago</button>
                <button class="botonMenu" id="editar" >Mis Datos</button>
                <button class="botonMenu" id="creartienda">crear tienda</button>
                <button class="botonMenu" id="eliminar-cuenta">Eliminar cuenta</button>
            </ul>
        </div>
        <div id="cont-datos">



        </div>
  </div>
  <script type="text/javascript">

    $('#btnDirecciones').click(function(){

            $.ajax({
              url: "direcciones.php",
              success: function(data){
                $('#cont-datos').html(data);
              }
            });

    });
    $("#creartienda").click(function(){
      $.ajax({
        url:"creartienda.php",
        success: function(data){
          $('#cont-datos').html(data);
        }
        
      });

    });

  </script>
  <script type=text/javascript>
    $('#editar').click(function(){
      $.ajax({
        url: "mostrarDatos.php",
        success: function(data){
          $('#cont-datos').html(data);
        }
      })
    })
  </script>
<?php include("partials/footer.php")?>
