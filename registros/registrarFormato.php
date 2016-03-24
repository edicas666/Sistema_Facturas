   <?php
    if(isset($_POST['ur']) && !empty($_POST['ur']) &&
       isset($_POST['acc']) && !empty($_POST['acc']) &&
       isset($_POST['oficio']) && !empty($_POST['oficio']) &&
       isset($_POST['anioFiscal']) && !empty($_POST['anioFiscal']) &&
       isset($_POST['codigo']) && !empty($_POST['codigo']) &&
       isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
       isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
       isset($_POST['oficina']) && !empty($_POST['oficina'])
         ){
      include_once "../funciones.php";
      $link = Conectarse();
      $ur = $_POST['ur'];
      $acc =  $_POST['acc'];
      $oficio = $_POST['oficio'];
      $anioFiscal = $_POST['anioFiscal'];
      $codigo = $_POST['codigo'];
      $descripcion = $_POST['descripcion'];
      $cantidad = $_POST['cantidad'];
      $oficina = $_POST['oficina'];
      $sql = "INSERT INTO formato(ur,acc,oficio,afiscal,id_cog,descripcion,cantidad,id_oficina) values('$ur','$acc','$oficio','$anioFiscal','$codigo','$descripcion','$cantidad','$oficina')";
      if(!mysqli_query($link,$sql)){
        echo "Error: ".mysqli_error($link);
      }
      $link->close();
        header('Location: ../consultaGen.php?valor=formato&bus=no');
    }else{
      echo "debe de llenar todos los campos";
    }
    ?>
