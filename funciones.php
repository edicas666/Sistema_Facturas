<?php
    function Conectarse(){
      $link = new mysqli("localhost","root","harrison","sistema",3307);
      if($link->connect_errno){
        echo "</script>alert('Error conectando a la Base de Datos: '".mysqli_connect_error()."'</script>";
        exit();
      }else{

      }
      return $link;
    }

     function consultarcampos($tabla){
	      $link=Conectarse();
        $sql = sprintf("describe %s",$tabla);
	      $atributos = $link->query($sql);
	      $link->close();
	      return $atributos;
    }

    function consulta($sql){
	      $link=Conectarse();
	      $atributos = $link->query($sql);
	      $link->close();
	      return $atributos;
    }
 ?>
