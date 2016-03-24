<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reg_usuario.css">
  <script src="js/funciones.js"></script>
  <script src="js/jquery-1.12.1.min.js"></script>
  <title>Nuevo Registro COG</title>
</head>
<body>
    <form class="form-horizontal" action="registros/registrarCog.php" method="post" id="form">
      <h1>Registrar nuevo COG</h1>
      <br>
      <div class="form-group">
        <label for="nombre" class="col-sm-2">* Cuenta:</label>
        <div class="col-sm-10">
          <input id="idCuenta" type="text" name="cuenta"  placeholder="ejemplo: 10000-11301"
          class="form-control" onkeypress="validarCaja()" onKeyUp="javascript:validarCuenta('idCuenta')" maxlength="11">
        </div>
      </div>
      <div class="form-group">
        <label for="apaterno" class="col-sm-2">* descripcion de cuenta:</label>
        <div class="col-sm-10">
          <input type="text" id="descripcion" name="descripcion" value="" placeholder="ejemplo: Sueldos base" class="form-control" onKeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="amaterno" class="col-sm-2">* Capitulo:</label>
        <div class="col-sm-10">
          <input type="text"  id="capitulo" name="capitulo" value="" placeholder="ejemplo: 1000" class="form-control" onkeypress="validarNumeros()" onKeyUP="validarCaja()" maxlength="6">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button name="btnReg"  id="btnReg" disabled type="button" onclick="registrar()"  class="btn btn-success">Registrar</button>
          <button type="button" onclick="window.location='consultaGen.php?valor=cog&bus=no';" class="btn btn-default">Regresar</button>
        </div>
      </div>
      <div class="form-group">
        <p class="help-block">* Campos obligatorios</p>
      </div>
    </form>
</body>
</html>
<script>
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
		    	 $('#btnReg').disable(false);

		    }else{
		    	$('#btnReg').disable(true);

		    }

		});
		}

	  function registrar(){
	    if(confirm("¿Esta seguro de proceder?")){
	      document.getElementById('form').submit();
	    }
  }
</script>
