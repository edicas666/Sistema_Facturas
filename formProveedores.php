<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reg_usuario.css">
  <script type="text/javascript" src="js/funciones.js"></script>
  <script src="js/jquery-1.12.1.min.js"></script>
  <title>Nuevo Registro Proveedores</title>
</head>
<body>
    <form class="form-horizontal" action="registros/registrarProveedor.php" method="post" id="form">
      <h1>Registrar Proveedores</h1>
      <br>
      <div class="form-group">
        <label for="nombre" class="col-sm-2">* RFC:</label>
        <div class="col-sm-10">
          <input type="text" id="rfc" name="rfc" value="" placeholder="CUPU800825569"class="form-control" onKeyUP="validarCaja()" onkeypress="LetrasNumeros()" maxlength="15">
        </div>
      </div>
      <div class="form-group">
        <label for="apaterno" class="col-sm-2">* Nombre:</label>
        <div class="col-sm-10">
          <input type="text" id="nombre" name="nombre" value="" placeholder="Persona u organización" class="form-control" onKeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="40 ">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button name="btnReg"  id="btnReg" disabled type="button" onclick="registrar()"  class="btn btn-success">Registrar</button>
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
		    if($("#rfc").val().length> 0 && $("#nombre").val().length> 0){
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
