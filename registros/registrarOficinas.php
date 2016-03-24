<?php
 include_once "../funciones.php";
 $link = Conectarse();

 if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['director']) && !empty($_POST['director']) && isset($_POST['recibe']) && !empty($_POST['recibe']) ){
	  $nombre = $_POST['nombre'];
    $director =  $_POST['director'];
    $recibe = $_POST['recibe'];
    $sql = "INSERT INTO oficinas(nombre,director,recibe) values('$nombre','$director','$recibe')";
    $link->query($sql);
    $link->close();
      header('Location: ../consultaGen.php?valor=oficinas&bus=no');
 }else{
    echo "debe de llenar todos los campos";
 }
?>
