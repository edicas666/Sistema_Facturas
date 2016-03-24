<?php
 include_once "../funciones.php";
 $link = Conectarse();

 if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['nombre']) && !empty($_POST['nombre'])){
	  $id = $_POST['id'];
    $nombre =  $_POST['nombre'];
    $idtab = $_POST['idmod'];
    $sql = "UPDATE proveedores SET rfc='$id', nombre='$nombre' WHERE id='$idtab'";
    $link->query($sql);
    $link->close();
    print_r($_POST);
    header('Location: ../consultaGen.php?valor=proveedores&bus=no');
 }else{
    echo "<script>alert('Debe llenar todos los campos')</script>";
 }
?>
