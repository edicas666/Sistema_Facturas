<?php
  $id=$_GET['id'];
  include_once "funciones.php";
  $link = Conectarse();
  $sql = sprintf("SELECT * FROM cog WHERE id='%s'",$id);
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
  <title>Modificar COG</title>
</head>
<body>
    <form class="form-horizontal" action="modificar/modoficinas.php" method="post" id="form">
      <h1>Modificar COG</h1>
      <br>
      <div class="form-group">
        <label for="idCuenta" class="col-sm-2">* Cuenta:</label>
        <div class="col-sm-10">
          <input id="idCuenta" type="text" name="nombre" value="<?php echo "$id"; ?>" placeholder="ejemplo: 10000-11301"class="form-control"
          onKeyUp="javascript:validarCuenta('idCuenta')" maxlength="50">
        </div>
      </div>
      <div class="form-group">
        <label for="descripcion" class="col-sm-2">* Descripción de cuenta:</label>
        <div class="col-sm-10">
          <input type="text" id="descripcion" name="descripcion" value="<?php  echo "".$fila['nombre'];?>" placeholder="ejemplo: Sueldos base" class="form-control" onkeypress="LetrasEspacios()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="capitulo" class="col-sm-2">* Capitulo:</label>
        <div class="col-sm-10">
          <input type="text" id="capitulo" name="capitulo" value="<?php  echo "".$fila['capitulo'];?>" placeholder="ejemplo: 1000" class="form-control" onkeypress="validarNumeros()" maxlength="6">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button id="btnmod" type="button" class="btn btn-success" onclick="Modificar()">Modificar</button>
          <button type="button" onclick="history.back()" class="btn btn-default">Regresar</button>
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
		    if($("#idCuenta").val().length> 0 && $("#descripcion").val().length> 0 &&  $("#capitulo").val().length> 0){
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
