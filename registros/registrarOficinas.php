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
   <?php
     include_once "../funciones.php";
   $link = Conectarse();
   if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['director']) && !empty($_POST['director']) && isset($_POST['recibe']) && !empty($_POST['recibe']) ){
   	  $nombre = $_POST['nombre'];
      $director =  $_POST['director'];
      $recibe = $_POST['recibe'];
      $sql = "INSERT INTO cog(id,nombre,director,recibe) values('','$nombre','$director','$recibe')";
      $link->query($sql);
      $link->close();
      header('Location: ../formOficinas.php');
   }else{
      echo "debe de llenar todos los campos";
   }
    ?>
  </body>
</html>
