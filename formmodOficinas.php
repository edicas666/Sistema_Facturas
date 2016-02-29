<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reg_usuario.css">
  <script type="text/javascript" src="js/funciones.js"></script>
  <title>Modificar Oficinas</title>
</head>
<body>
    <form class="form-horizontal" action="crear_usuarios.php" method="post" id="form">
      <h1>Modificar Oficina</h1>
      <br>
      <div class="form-group">
        <label for="nombre" class="col-sm-2">* Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" value="" placeholder="Administración" class="form-control" onkeypress="LetrasEspacios()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="apaterno" class="col-sm-2">* Director:</label>
        <div class="col-sm-10">
          <input type="text" name="apaterno" value="" placeholder="ejemplo: PROFR. J GUADALUPE ENRIQUEZ VALDEZ" class="form-control" onkeypress="LetrasEspacios()" maxlength="60">
        </div>
      </div>
      <div class="form-group">
        <label for="amaterno" class="col-sm-2">   Recibe:</label>
        <div class="col-sm-10">
          <input type="text" name="amaterno" value="" placeholder="ejemplo: MANUEL GARCIA FLORES" class="form-control" onkeypress="LetrasEspacios()" maxlength="60">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <button id="registrarbtn" type="button" class="btn btn-success" onclick="Modificar()">Modificar</button>
          <button type="button" onclick="window.location='index.php'" class="btn btn-default">Regresar</button>
        </div>
      </div>
      <div class="form-group">
        <p class="help-block">* Campos obligatorios</p>
      </div>
    </form>
</body>
</html>
<script type="text/javascript">
  function Modificar(){
    if(confirm("¿Esta seguro?")){
      document.getElementById('form').submit();
    }
  }
</script>
