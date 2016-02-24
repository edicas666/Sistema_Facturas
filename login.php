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
      $SESSION['user'] = $fila['user'];
      $SESSION['pass'] = sha1(md5($fila['pass']));
      $SESSION['depto'] = $fila['depto'];
      echo "<h1>"."Bienvenido ".$SESSION['user'].$SESSION['pass']."</h1>";
      //header('Location:index.php');
    }
  }
 ?>
