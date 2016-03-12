<?php
 include_once "../funciones.php";
 $link = Conectarse();
  print_r($_POST);
 if(isset($_POST['ur']) && !empty($_POST['ur']) &&
 isset($_POST['acc']) && !empty($_POST['acc']) &&
 isset($_POST['oficio']) && !empty($_POST['oficio']) &&
 isset($_POST['afiscal']) && !empty($_POST['afiscal']) &&
 isset($_POST['id_cog']) && !empty($_POST['id_cog']) &&
 isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
 isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
 isset($_POST['id_oficina']) && !empty($_POST['id_oficina'])){
    echo "<script>alert('error')</script>";
	  $ur = $_POST['ur'];
    $acc =  $_POST['acc'];
    $oficio = $_POST['oficio'];
    $afiscal = $_POST['afiscal'];
    $id_cog = $_POST['id_cog'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $id_oficina = $_POST['id_oficina'];
    $idtab = $_POST['idmod'];
    $sql = "UPDATE formato SET ur='$ur', acc='$acc', oficio='$oficio', afiscal='$afiscal',
    id_cog='$id_cog', descripcion='$descripcion', cantidad='$cantidad', id_oficina='$id_oficina' WHERE id='$idtab'";
    $link->query($sql);
    $link->close();
   header('Location: ../consultaGen.php?valor=formato&bus=no');

 }else{
    echo "<script>alert('Debe llenar todos los campos')</script>";
 }

?>
