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
  <title>Nuevo Registro Oficinas</title>
</head>
<body>
    <form class="form-horizontal" action="registros/registrarOficinas.php" method="post" id="form">
      <h1>Registrar Oficina</h1>
      <br>
      <div class="form-group">
        <label for="nombre" class="col-sm-2">* Nombre:</label>
        <div class="col-sm-10">
          <input type="text" id="nombre" name="nombre" value="" placeholder="Administración" class="form-control" onKeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="apaterno" class="col-sm-2">* Director:</label>
        <div class="col-sm-10">
          <input type="text" id="director" name="director" value="" placeholder="ejemplo: PROFR. J GUADALUPE ENRIQUEZ VALDEZ" class="form-control" onKeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="60">
        </div>
      </div>
      <div class="form-group">
        <label for="amaterno" class="col-sm-2">   Recibe:</label>
        <div class="col-sm-10">
          <input type="text" id="recibe" name="recibe" value="" placeholder="ejemplo: MANUEL GARCIA FLORES" class="form-control" onKeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="60">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button name="btnReg"  id="btnReg" disabled type="button" onclick="registrar()"  class="btn btn-success">Registrar</button>
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
      if($("#nombre").val().length> 0 && $("#director").val().length> 0 &&  $("#recibe").val().length> 0){
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
