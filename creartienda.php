<?php
  session_start();
  include("conn.php");


?>

    <form method="post" id="formp">
      <table>
        <tr>
          <td><label>Nombre:</label></td>
          <td><input type="text" name="nombre" placeholder="Ingrese un nombre"></td>
        </tr>
        <tr>
          <td><label>Descripcion: </label></td>
          <td><input type="text" name="descripcion" placeholder="Ingrese una descripcion"></td>
        </tr>
        <tr>
          <td><input type="submit" name="crear" value="crear"></td>
          <td><a href="mitienda.php"> mi tienda</a> </td>
        </tr>
      </table>
    </form>
      <script type="text/javascript">
           $(document).ready(function(){
               $("#formp").submit(function(event){
                   event.preventDefault();
                   $.ajax({
                       type:"post",
                       url: "tienda.php",
                       data: $(this).serialize(),
                       success: function(response){

                           var json_data = JSON.parse(response)
                           if(json_data.success==1){
                               $("input[name=nombre]").val("")
                               $("input[name=descripcion]").val("")
                           }
                           alert(json_data.message);
                       }
                   })
               })
           })

      </script>
