<?php
  include_once "funciones.php";
  $nombre = $_POST['nombre'];
  $apaterno = $_POST['apaterno'];
  $amaterno = $_POST['amaterno'];
  $email = $_POST['email'];
  $depto = $_POST['depto'];
  $user = $_POST['user'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];

  $error = false;
  $link = Conectarse();
  if($user!=""){
    $query = sprintf("SELECT user FROM usuarios WHERE usuarios.user = '%s'", $user);
    $result=mysql_query($query,$link);
    if(mysql_num_rows($result)){
      echo"<h2>Error: Este nombre de usuario ya existe por favor elija otro !!!</h2>";
      $error = TRUE;
    }else{
      mysql_free_result($result);
    }
  }else{
    echo"<h2>Error: No se dió un nombre de usuario!!!</h2>";
    $error = true;
  }

  if($pass1!="" && $pass2!=""){
    if($pass1!=$pass2) {
      echo"<h2>Error: Las contraseñas deben coincidir!!!</h2>";
      $error=TRUE;
    }else{
      $pass1=sha1(md5($pass1));
    }
  }else{
    echo"<h2>Error: No se dió una contraseña!!!</h2>";
  }

  if($error){
    echo "<br>";
    echo "<button type='button' class='btn btn-default' onclick='window.history.back();'>Regresar</button>";
  }else{
    $query = sprintf("INSERT INTO usuarios(user, nombre, apaterno, amaterno, pass, email, depto) VALUES ('%s', '%s', '%s', '%s', '%s', '%s','%s')", $user, $nombre, $apaterno,$amaterno, $pass1, $email, $depto);
    $result = mysql_query($query,$link);
    if(mysql_affected_rows()){
      echo "<h1>¡Registro Completo!</h1>";
      mysql_free_result($result);
    }else{
      echo "<h1>Ah ocurrido un error en la Base de Datos</h1>";
    }
  }

  mysql_close($link);
 ?>
