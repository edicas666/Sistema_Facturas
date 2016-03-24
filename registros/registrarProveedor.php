   <?php
    include_once "../funciones.php";
   $link = Conectarse();
   if(isset($_POST['rfc']) && !empty($_POST['rfc']) && isset($_POST['nombre']) && !empty($_POST['nombre'])){
   	  $rfc = $_POST['rfc'];
      $nombre =  $_POST['nombre'];
      $sql = "INSERT INTO proveedores(rfc,nombre) values('$rfc','$nombre')";
      $link->query($sql);
      $link->close();
      header('Location: ../consultaGen.php?valor=proveedores&bus=no');
   }else{
      echo "debe de llenar todos los campos";
   }
    ?>
