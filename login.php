<?php
  session_start();
  include_once "funciones.php";
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  //conexion
  $link = Conectarse();
  //$pass = sha1(md5($pass));
  //consulta
  $sql = sprintf("SELECT * FROM usuarios WHERE user='%s' AND pass='%s'",$user,$pass);
  //resultado de consulta
  if(!$res = $link->query($sql)){
    echo "Error en el sistema";
  }else{
    if($res->num_rows === 0) {
      echo "Acceso Denegado";
    }else{
      $fila = $res->fetch_assoc();
      $_SESSION['user'] = $fila['user'];
      $_SESSION['pass'] = sha1(md5($fila['pass']));
      $_SESSION['depto'] = $fila['depto'];
      echo "<h1>"."Bienvenido ".$_SESSION['user'].$_SESSION['pass']."</h1>";
      echo "<br>Usted esta siendo redireccionado";
      header('Location:consultaGen.php?valor=formato&bus=no');
    }
  }
  $link->close();
 ?>
