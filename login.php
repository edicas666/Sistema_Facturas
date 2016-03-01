<?php
  include_once "funciones.php";
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $link = Conectarse();
  //$pass = sha1(md5($pass));
  $query = sprintf("SELECT user FROM usuarios WHERE user='%s' AND pass='%s'", $user, $pass);
  $result = mysql_query($query,$link);

  if(mysql_num_rows($result) != 0){
    echo "<br><h1>Bienvenido ".mysql_fetch_assoc($result)['user']."</h1>";
  }else{
    echo"No encontrado";
  }
 ?>
