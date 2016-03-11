<?php
  include_once "funciones.php";
  $link=Conectarse();
  $sql = sprintf("DELETE FROM %s WHERE id= %s",$tabla,$id);
  $link->query($sql);
  header('Location:consultaGen')
 ?>
