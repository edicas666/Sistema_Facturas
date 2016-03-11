<?php
 include_once "../funciones.php";
 $link = Conectarse();

 if(isset($_POST['cuenta']) && !empty($_POST['cuenta']) &&
 isset($_POST['nombre']) && !empty($_POST['nombre']) &&
 isset($_POST['capitulo']) && !empty($_POST['capitulo']) ){
	  $cuenta = $_POST['cuenta'];
    $nombre =  $_POST['nombre'];
    $capitulo = $_POST['capitulo'];
    $idtab = $_POST['idmod'];
    $sql = "UPDATE oficinas SET cuenta='$cuenta', nombre='$nombre', capitulo='$capitulo' WHERE id='$cuenta'";
    $link->query($sql);
    $link->close();
    print_r($_POST);
    header('Location: ../consultaGen.php?valor=oficinas&bus=no');
 }else{
    echo "debe de llenar todos los campos";
 }
?>
