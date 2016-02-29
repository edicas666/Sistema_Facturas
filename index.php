<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/inicio_sesion.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="js/funciones.js"></script>
    <title>Acceso</title>
  </head>
  <body>
    <form class="form-horizontal" id="form" action="login.php" method="post">
      <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" class="form-control" id="usuario" name="user" placeholder="Gera23" onkeypress="LetrasNumeros()" maxlength="40">
      </div>
      <div class="form-group">
        <label for="pass">Contraseña:</label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="****" maxlength="80">
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <input type="submit" class="btn btn-primary col-sm-offset-1 form-control" id="" value="Entrar">
          <br>
          <br>
          <a type="button"  href="http://www.huetamo.com.mx" class="btn btn-default form-control col-sm-offset-1">Regresar</a>
        </div>
      </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
