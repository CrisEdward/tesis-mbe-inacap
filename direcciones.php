<?php session_start();?>


<link rel="stylesheet" href="css/form.css">
<div id="agregarDireccion">
   <form id="regDireccion" method="POST">
        <table> <tr><td></td><td><h3> Agregar dirección</h3></td></tr>
        <tr><td><label class="lblDir"> Región: </label></td>
        <td><select class="cmbDir" name="region" id="cmbRegion">
            <option value=""><-Seleccione una region-></option>
            <option value="Santiago">Metropolitana de Santiago</option>
        </select></td>
        </tr>
        <tr><td><label class="lblDir">Comuna: </label></td>
        <td><select class="cmbDir" name="comuna" id="cmbComuna">
            <option value=""><-Seleccione una comuna-></option>
            <option value="Maipu">Maipú</option>
            <option value="PadreHurtado">Padre Hurtado</option>
            <option value="LaGranja">La Granja</option>
            <option value="LasCondes">Las Condes</option>
            <option value="Providencia">Providencia</option>
            <option value="LaDehesa">La Dehesa</option>
        </select></td>
        </tr>
        <tr><td><label class="lblDir">Direccion:</label></td>
        <td><input type="text" name="direccion" placeholder="calle, numero, etc" id="txtDireccion" ></td></tr>
        <tr><td></td><td><input type="submit" name="agregar" id="btnAgregar" value="Agregar"></td></tr>
    </table>
    
    </form>
</div>
<script type="text/javascript">
     $(document).ready(function(){
         $("#regDireccion").submit(function(event){
             event.preventDefault();
             $.ajax({
                 type:"post",
                 url: "regDireccion.php",
                 data: $(this).serialize(),
                 success: function(response){
                   
                     var json_data = JSON.parse(response)
                     if(json_data.success==1){
                         $("input[name=direccion]").val("")
                     }
                     alert(json_data.message);
                 }
             })
         })
     })

</script>