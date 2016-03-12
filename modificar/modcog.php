<?php
 include_once "../funciones.php";
 $link = Conectarse();
 if(isset($_POST['cuenta']) && !empty($_POST['cuenta']) &&
 isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
 isset($_POST['capitulo']) && !empty($_POST['capitulo']) ){
	  $cuenta = $_POST['cuenta'];
    $descripcion =  $_POST['descripcion'];
    $capitulo = $_POST['capitulo'];
    $idtab = $_POST['idmod'];
    $sql = "UPDATE cog SET id='$cuenta', nombre='$descripcion', capitulo='$capitulo' WHERE id='$idtab'";
    $link->query($sql);
    $link->close();
    print_r($_POST);
    header('Location: ../consultaGen.php?valor=cog&bus=no');
 }else{
    echo "<script>alert('Debe llenar todos los campos')</script>";
 }
?>
