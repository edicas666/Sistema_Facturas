<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Acceso</title>
  </head>
  <body>
   <?php

    if(isset($_POST['ur']) && !empty($_POST['ur']) &&
       isset($_POST['acc']) && !empty($_POST['acc']) &&
       isset($_POST['oficio']) && !empty($_POST['oficio']) &&
       isset($_POST['anioFiscal']) && !empty($_POST['anioFiscal']) &&
       isset($_POST['codigo']) && !empty($_POST['codigo']) &&
       isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
       isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
       isset($_POST['oficina']) && !empty($_POST['oficina'])
         ){
      include_once "../funciones.php";
      $link = Conectarse();

      $ur = $_POST['ur'];
      $acc =  $_POST['acc'];
      $oficio = $_POST['oficio'];
      $anioFiscal = $_POST['anioFiscal'];
      $codigo = $_POST['codigo'];
      $descripcion = $_POST['descripcion'];
      $cantidad = $_POST['cantidad'];
      $oficina = $_POST['oficina'];

      $sql = "INSERT INTO formato(ur,acc,oficio,afiscal,id_cog,descripcion,cantidad,id_oficina) values('$ur','$acc','$oficio','$anioFiscal','$codigo','$descripcion','$cantidad','$oficina')";
      if(!mysqli_query($link,$sql)){
        echo "Error: ".mysqli_error($link);
      }
      $link->close();
      header('Location: ../formFormato.php');
    }else{
      echo "debe de llenar todos los campos";
    }


    ?>
  </body>
</html>
