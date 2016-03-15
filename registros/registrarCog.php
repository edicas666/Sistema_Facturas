   <?php
   include_once "../funciones.php";
   $link = Conectarse();
   if(isset($_POST['cuenta']) && !empty($_POST['cuenta']) && isset($_POST['descripcion']) && !empty($_POST['descripcion']) && isset($_POST['capitulo']) && !empty($_POST['capitulo']) ){
   	  $cuenta = $_POST['cuenta'];
      $nombre =  $_POST['descripcion'];
      $capitulo = $_POST['capitulo'];
      $sql = "INSERT INTO cog(id,nombre,capitulo) values('$cuenta','$nombre','$capitulo')";
      $link->query($sql);
      $link->close();
      header('Location: ../formcog.php');
   }else{
      echo "debe de llenar todos los campos";
   }
    ?>
