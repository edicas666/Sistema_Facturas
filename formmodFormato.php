<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reg_usuario.css">
  <script type="text/javascript" src="js/funciones.js"></script>
  <title>Modificar Formato</title>
</head>
<body>
    <form class="form-horizontal" action="crear_usuarios.php" method="post" id="form">
      <h1>Formato</h1>
      <br>
      <div class="form-group">
        <label for="nombre" class="col-sm-2">Nombre(s):</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" value="" placeholder="Gerardo" class="form-control" onkeypress="LetrasEspacios()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="apaterno" class="col-sm-2">Apellido Paterno:</label>
        <div class="col-sm-10">
          <input type="text" name="apaterno" value="" placeholder="Ruiz" class="form-control" onkeypress="validarLetras()" maxlength="14">
        </div>
      </div>
      <div class="form-group">
        <label for="amaterno" class="col-sm-2">Apellido Materno:</label>
        <div class="col-sm-10">
          <input type="text" name="amaterno" value="" placeholder="Pérez" class="form-control" onkeypress="validarLetras()" maxlength="14">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2">Email:</label>
        <div class="col-sm-10">
          <input type="text" name="email" value="" placeholder="usuario@gmail.com"
           class="form-control" onKeyUp="javascript:validateMail('id_mail')" 
           required name="emailClie" id="id_mail" maxlength="50" 
           pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" 
           min="8">
        </div>
      </div>
      <div class="form-group">
        <label for="deptotxt" class="col-sm-2">* Departamento:</label>
        <div class="col-sm-10">
          <select class="form-control" name="depto" required>
            <option value="presidencia">Presidencia</option>
            <option value="tesoreria">Tesoreria</option>
            <option value="oficialia">Oficialia</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="usuario" class="col-sm-2">* Nombre de usuario:</label>
        <div class="col-sm-10">
          <input type="text" name="user" required value="" placeholder="gera23" class="form-control" onkeypress="LetrasNumeros()" maxlength="40" >
        </div>
      </div>
      <div class="form-group">
        <label for="pass" class="col-sm-2">* Contraseña:</label>
        <div class="col-sm-10">
          <input type="password" name="pass1" required class="form-control" id="pass" placeholder="*****" maxlength="80">
        </div>
      </div>
      <div class="form-group">
        <label for="pass2" class="col-sm-2">* Confirmar contraseña:</label>
        <div class="col-sm-10">
          <input type="password" name="pass2" required class="form-control" id="pass2" placeholder="*****" maxlength="80">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button id="registrarbtn" type="button" class="btn btn-success" onclick="Modificar()">Modificar</button>
          <button type="button" onclick="hitory.back()" class="btn btn-default">Regresar</button>
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
		    	 $('#btnReg').disable(false);

		    }else{
		    	$('#btnReg').disable(true);

		    }

		});
		}

  function Modificar(){
    if(confirm("¿Esta seguro?")){
      document.getElementById('form').submit();
    }
  }
</script>
