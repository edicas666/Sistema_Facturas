<?php
  $id=$_GET['id'];
  include_once "funciones.php";
  $link = Conectarse();
  $sql = sprintf("SELECT * FROM proveedores WHERE id='%s'",$id);
  $result = $link->query($sql);
  $fila = mysqli_fetch_assoc($result);
  $link->close();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reg_usuario.css">
  <script type="text/javascript" src="js/funciones.js"></script>
  <script src="js/funciones.js"></script>
  <script src="js/jquery-1.12.1.min.js"></script>
  <title>Modificar Proveedores</title>
</head>
<body>
    <form class="form-horizontal" action="modificar/modProveedor.php" method="post" id="form">
      <input type="hidden"  name="idmod" value="<?php echo "$id"; ?>">
      <h1>Modificar Proveedores</h1>
      <br>
      <div class="form-group">
        <label for="nombre" class="col-sm-2">* Rfc:</label>
        <div class="col-sm-10">
          <input type="text" id="id" name="id" value="<?php  echo "".$fila['rfc'];?>" placeholder="CUPU800825569"class="form-control" onkeypress="LetrasNumeros()" maxlength="15"  onkeyup="validarCaja()">
        </div>
      </div>
      <div class="form-group">
        <label for="apaterno" class="col-sm-2">* Nombre:</label>
        <div class="col-sm-10">
          <input type="text" id="nombre" name="nombre" value="<?php  echo "".$fila['nombre'];?>" placeholder="Persona u organización" class="form-control" onkeypress="LetrasEspacios()" maxlength="40"  onkeyup="validarCaja()">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button id="btnmod" type="button" class="btn btn-success" disabled onclick="Modificar()">Modificar</button>
          <button type="button" onclick="window.location='consultaGen.php?valor=proveedores&bus=no';" class="btn btn-default">Regresar</button>
        </div>
      </div>
      <div class="form-group">
        <p class="help-block">* Campos obligatorios</p>
      </div>
    </form>
</body>
</html>
<script type="text/javascript">
function validarCaja() {
			$(function() {
		    jQuery.fn.extend({
		        disable: function(state) {
		            return this.each(function() {
		                this.disabled = state;
		            });
		        }
		    });
		    if($("#id").val().length> 0 && $("#nombre").val().length> 0){
		    	 $('#btnmod').disable(false);
		    }else{
		    	$('#btnmod').disable(true);
        }
		});

		}

  function Modificar(){
    if(confirm("¿Esta seguro?")){
      document.getElementById('form').submit();
    }
  }
</script>
