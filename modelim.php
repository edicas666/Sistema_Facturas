<?php
  include_once "funciones.php";
  $opcion = $_POST['modelim'];
  $tabla = $_POST['tabla'];
  $id = $_POST['id'];
  $link=Conectarse();

  if($opcion==='elim'){
    $sql = sprintf("DELETE FROM %s WHERE id= %s",$tabla,$id);
    $link->query($sql);
  }else{
    switch ($tabla) {
      case 'cog':
          header('Location:formmodCog.php?id='.$id);
      break;
      case 'formato':
        header('Location:formmodFormato.php?id='.$id);
      break;
      case 'oficinas':
      header('Location:formmodOficinas.php?id='.$id);
      break;
      case 'proveedores':
      header('Location:formmodProveedores.php?id='.$id);
      break;
      default:
        # code...
        break;
    }
  }
  $link->close();
  header('Location:consultaGen.php?valor='.$tabla);
 ?>
