<?php
 include_once "../funciones.php";
 $link = Conectarse();

 if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['director']) && !empty($_POST['director']) && isset($_POST['recibe']) && !empty($_POST['recibe']) ){
	  $nombre = $_POST['nombre'];
    $director =  $_POST['director'];
    $recibe = $_POST['recibe'];
    $idtab = $_POST['idmod'];
    $sql = "UPDATE oficinas SET nombre='$nombre', director='$director', recibe='$recibe' WHERE id='$idtab'";
    $link->query($sql);
    $link->close();
    print_r($_POST);
    header('Location: ../consultaGen.php?valor=oficinas&bus=no');
 }else{
    echo "debe de llenar todos los campos";
 }
?>
