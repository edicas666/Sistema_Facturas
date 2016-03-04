<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/inicio_sesion.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="../js/funciones.js"></script>
    <title>Acceso</title>
  </head>
  <body>
   <?php
   include_once "../funciones.php";
   $link = Conectarse();
   if(isset($_POST['cuenta']) && !empty($_POST['cuenta']) && isset($_POST['descripción']) && !empty($_POST['descripción']) && isset($_POST['capitulo']) && !empty($_POST['capitulo']) ){
   	  $cuenta = $_POST['cuenta'];
      $nombre =  $_POST['descripción'];
      $capitulo = $_POST['capitulo'];
      $sql = "INSERT INTO cog(id,nombre,capitulo) values('$cuenta','$nombre','$capitulo')";
      $link->query($sql);
      $link->close();
      header('Location: ../formcog.php');
   }else{
      echo "debe de llenar todos los campos";
   }
    ?>
  </body>
</html>
