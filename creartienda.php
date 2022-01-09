<?php
  session_start();
  include("conn.php");


?>
    <link rel="stylesheet" href="css/form.css">
    <form method="post" id="formp">
      <table>
        <br>
        <tr>
          <td><label class="lbl1">Nombre:</label></td>
          <td><input type="text" name="nombre" placeholder="Ingrese un nombre"></td>
        </tr>
        <tr>
          <td><label class="lbl1">Descripcion: </label></td>
          <td><input type="text" name="descripcion" placeholder="Ingrese una descripcion"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="crear" value="crear" id="btnCrear"><a href="mitienda.php" id="link" > Mi tienda</a></td>
          
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
